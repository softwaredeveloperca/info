<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Events\JoinMovieGame;
use Log;
use App\MovieGame;
use Auth;
use App\User;


class MovieGameController extends Controller
{
	protected $MovieGame;
    public function __construct()
    {
        $this->middleware('auth');
		$this->MovieGame=new MovieGame();
    }
	
	public function index()
	{
        return view('game/moviegame/home');
	}
	
	public function test()
	{
		JoinMovieGame::dispatch(new JoinMovieGame((object) ['game_id' => Auth::user()->movie_game_id, 'name' => Auth::user()->name]));
		
	}
	
	public function join()
	{
		if(Auth::user()->movie_game_id > 0)
		{
		//	$Game=$this->MovieGame::where('id', Auth::user()->movie_game_id)->first();
		}
		
		if(!isset($Game->id))
		{
			$Game=$this->MovieGame::where('players', '<', 4)->first();
			if(!isset($Game->id))
			{
				$Game=$this->MovieGame::create(['status' => 'Pause']);	
			}
		}
				
		$Game->players++;
		$Game->save();
		$user=User::where('id', Auth::user()->id)
				   ->update(['movie_game_id' => $Game->id]);
				   
		//JoinMovieGame::dispatch(new JoinMovieGame((object) ['game_id' => Auth::user()->movie_game_id, 'name' => Auth::user()->name]));
		
		return $Game->id;
			
	}
}
