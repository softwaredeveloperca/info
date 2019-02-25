<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Events\UserSearch;
use App\Events\SendChatMessage;
use Log;

class Order {
	public $id;
	public function __construct($id)
	{
		$this->id=$id;
	}
}
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
	    Log::error('fail2');
	    UserSearch::dispatch(new Order(1));
//	event(new UserSearch);
	Log::error('after');	
        return view('home');
    }
	
	public function event()
	{
		UserSearch::dispatch(new Order(5));
	}
	
	public function createChatMessage(Request $request)
	{
		SendChatMessage::dispatch(new SendChatMessage($request->input('message')));
	}
}
