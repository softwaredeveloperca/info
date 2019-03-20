<?php

namespace App\Http\Controllers;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Events\JoinMovieGame;
use App\Events\LeaveMovieGame;
use Log;
use App\MovieGame;
use Auth;
use App\User;
use App\MovieList;

use App\MovieGameStations;
use App\MovieGameMovies;
use App\MovieGameSchedule;


class MovieGameController extends Controller
{
	protected $MovieGame;
  public function __construct()
  {
     $this->middleware('auth');
		  $this->MovieGame=new MovieGame();
		 $this->MovieGameStations=new MovieGameStations();
		 $this->MovieGameMovies=new MovieGameMovies();
		 $this->MovieGameSchedule=new MovieGameSchedule();
		 $this->MovieList=new MovieList();
		 
		  }
	
	public function index()
	{
     return view('game/moviegame/home');
	}
	
	public function station()
	{
		return $this->MovieGameStations::where('game_id', Auth::user()->movie_game_id)
					->where('player_id', Auth::user()->id)
					->get()
					->last()
					->toArray();
	}
	
	public function movies()
	{
		return $this->MovieGameMovies::where('game_id', Auth::user()->movie_game_id)
					->where('player_id', Auth::user()->id)
					->get()
					->toArray();
	}
	
	public function schedule()
	{
		return $this->MovieGameSchedule::where('game_id', Auth::user()->movie_game_id)
					->where('player_id', Auth::user()->id)
					->get()
					->toArray();
	}
	
	public function endTurn()
	{
		$this->MovieGame::where('id', Auth::user()->movie_game_id)->increment('day');
		$Game=$this->MovieGame::where('id', Auth::user()->movie_game_id)->get()->last()->toArray();
	
		$Movies=$this->MovieGameMovies::where('game_id', Auth::user()->movie_game_id)
					->where('player_id', Auth::user()->id)
					->take(10)
					->inRandomOrder()
					->get()
					->toArray();
		$Slots = [
		 1 => '6:00',
		 2 => '7:00',
		 3 => '8:00',
		 4 => '9:00',
		 5 => '10:00',
		 6 => '11:00',
		 7 => '12:00',
		 8 => '1:00',  
		];
		foreach($Slots as $SlotID => $Slot)
		{
			if($SlotID % 2 === 1)
				$Movie=array_pop($Movies);
		
			$this->MovieGameSchedule::create([
			  "day" => $Game['day'],
			  "movie_id" => $Movie['id'],
			  "player_id" =>  auth::user()->movie_game_id, 
			  "game_id" => $Movie['game_id'],
			  "slot_id" => $SlotID, 	
			  "slot_name" => $Slot, 
			]);
		}
	
		return $this->MovieGame::where('id', Auth::user()->movie_game_id)
						->with('schedule')
						->with('playerList')
						->get()
						->last()
						->toArray();

	}
	
	public function test()
	{
		JoinMovieGame::dispatch(new JoinMovieGame((object) ['game_id' => Auth::user()->movie_game_id, 'name' => Auth::user()->name]));
		
	}
	
	public function info()
	{
		$Game=$this->MovieGame::where('id', Auth::user()->movie_game_id)->get()->last();
		
		
		return $this->MovieGame::where('id', Auth::user()->movie_game_id)
				->with(['schedule' => function ($query) use ($Game) {
    				$query->where('day', '=', $Game->day);
				   $query->with('movie');
				}])
			->with('playerList')
			->get()
			->last()
			->toArray();	
	}
	
	public function leave()
	{
		if(Auth::user()->movie_game_id > 0)
		{
			 	$Game=$this->MovieGame::where('id', Auth::user()->movie_game_id)->get()->last();
       $Game->players=$Game->PlayerList()->count();
		   $Game->save();
				
		   User::where('id', Auth::user()->id)
				   ->update(['movie_game_id' => 0]);
		   LeaveMovieGame::dispatch(new LeaveMovieGame((object) ['game_id' => Auth::user()->movie_game_id, 'name' => Auth::user()->name]));
		}
	}
	
	public function join($numPlayers=0)
	{
		if(Auth::user()->movie_game_id > 0)
		{

			$Game=$this->MovieGame::where('id', Auth::user()->movie_game_id)->get()->last();
	   $Game->existing=true;
		}
		
		if(!isset($Game->existing))
		{
		
			if($numPlayers < 1) $numPlayers=4;
		//	$Game=$this->MovieGame::where('players', '<', $numPlayers)->last();
			if(!isset($Game->id))
			{
				$Game=$this->MovieGame::create(['status' => 'Pause', 'day' =>  0]);	
				
				//for($x=0; $x<100; $x++)
				//{
					
					
					
					$this->MovieList::where("color", "color")->inRandomOrder()->take(100)->get()
					->map(function($item) use ($Game) {
						
						
						
						$game_array=['game_id' => $Game->id,
									'name' => substr($item['movie_title'],0,255),
									'player_id' => 0, 
									'demo_female' => rand(0, 100), 
									'demo_male' => rand(0, 100),
									'demo_bluecoller' => rand(0, 100),
									'demo_whitecoller' => rand(0, 100), 
									'demo_senior' => rand(0, 100),  
									'demo_young' => rand(0, 100),  
									'demo_adult' => rand(0, 100)];
									
								
									
						if($item['content_rating'] == "r" )
						{
							$game_array['demo_young']=0;
							$game_array['demo_adult']=$game_array['demo_adult']+20;
							$game_array['demo_senior']=$game_array['demo_senior']-5;
						}
						if($item['content_rating'] == "PG-13" || $item['content_rating'] == "G" )
						{
							$game_array['demo_adult']=$game_array['demo_adult']-5;
							$game_array['demo_young']=$game_array['demo_young']+20;
						}
							
						
						$this->MovieGameMovies::create($game_array);
					});
				
					
					
				   
			//	}
														
					
			}
			
			$demo_senior=rand(10, 30);
			$demo_young=rand(10, 30);
			$this->MovieGameStations::create([
														'game_id' => $Game->id,
														'player_id' => Auth::user()->id,
														'demo_male' => rand(20, 80), 
														 'demo_bluecoller' => rand(20, 80), 
													 	'demo_senior' => $demo_senior,  
														 'demo_young' => $demo_young,  
														 'demo_adult' => round(100-$demo_senior-$demo_young), 
														]);
     
			$this->MovieGameMovies::where('game_id', $Game->id)
			                       ->where('player_id', 0)
									->inRandomOrder()
			                       ->take(5)
			                        ->update([
			                         'player_id' => Auth::user()->id,
			                         ]);
																									
		  $user=User::where('id', Auth::user()->id)
				   ->update(['movie_game_id' => $Game->id]);
				   
		  $Game->players=$Game->PlayerList()->count();
		  $Game->save();
		}
		
		
		$Game->currentPlayers=$Game->PlayerList()
								->get()
								->map(function ($user) {
									return collect($user->toArray())
										->only(['id', 'name','money','fans'])
										->all();
								});
								
		JoinMovieGame::dispatch(new JoinMovieGame((object) ['game_id' => Auth::user()->movie_game_id, 'name' => Auth::user()->name,
		 'currentPlayers' => $Game->currentPlayers
		  ]));
		
		return $Game->toArray();
			
	}
}
