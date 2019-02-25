<?php

/*
|--------------------------------------------------------------------------
| Broadcast Channels
|--------------------------------------------------------------------------
|
| Here you may register all of the event broadcasting channels that your
| application supports. The given channel authorization callbacks are
| used to check if an authenticated user can listen to the channel.
|
*/

Broadcast::channel('App.User.{id}', function ($user, $id) {
	return true;
    return (int) $user->id === (int) $id;
});

Broadcast::channel('globalchat', function ($user) {
	return true;
});

Broadcast::channel('moviegame.{id}', function ($user, $id) {
	return true;
	//return (int) $user->movie_game_id == (int) $id;
   // return (int) $user->id === (int) $id;
});
