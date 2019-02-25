<template>
    <div class="container">
        <div class="row">
            <div class=" is-7">
                <div class="panel panel-default">

                    <div class="panel-body">
					<h2>Movie Game
					</h2>
						<div id="login" v-show="!loggedIn">
						<input type="submit" @click="login" name="Login" value="Start">
                        
						</div>
						<div id="chat" v-show="loggedIn">
							#{{ game_id }}<br>
							<input type="submit" @click="logoff" name="LogOff" value="Leave"><br><br>
							<ul id="example-1">
							  <li v-for="item in messages">
								{{ item }}
							  </li>
							</ul>
							<input type="text" v-model="message">
							<input type="hidden" name="_token" :value="csrf">
							<input type="submit" @click="send" name="Send" value="Join Game">
						</div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</template>
<script>
    export default {
		methods: {
    		login: function (event) {
				
				window.axios.get('http://45.77.152.150/lara/info/public/home/moviegame/join').then((response)=>{
					this.loggedIn=true;
					this.game_id=response.data;
					this.channel=Echo.private('moviegame.'+this.game_id)
					.listen('JoinMovieGame', e => {
						console.log("Player " + e.data.data.name + " has joined the game");
						this.message="Player " + e.data.data.name + " has joined the game";
					});
		
					
				});
				
				
				
	
			},
			logoff: function (event) {
				this.loggedIn=false;
			},
			send: function(event) {
				
				window.axios.post('http://45.77.152.150/lara/info/public/home/moviegame/test').then((response)=>{
				//	console.log(response);
				});
				//this.messages.push(this.message);
				//this.message='';
			}, 
		},
        data(){
            return {
				csrf: document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
				loggedIn: false, 
                messages: [],
                message: '',
				game_id: 0, 
				channel: ''
            }
        }
    }
</script>
