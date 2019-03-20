<template>
    <div class="container">
        <div class="row">
            <div>
                <div class="panel panel-default">

                    <div class="panel-body">
						<div id="login" v-show="!gameId">
						<input class="is-danger button" type="submit" @click="login" name="Login" value="Start">
						

 <!--         <h5>Number of players</h5>

							 <input type="radio" id="any" value="0" v-model="numPlayers" checked>
<label for="any">Any</label>
						 <input type="radio" id="one" value="1" v-model="numPlayers">
<label for="one">1</label>
						 <input type="radio" id="two" value="2" v-model="numPlayers">
<label for="two">2</label>
							
						 <input type="radio" id="three" value="3" v-model="numPlayers">
<label for="three">3</label>
						 <input type="radio" id="four" value="4" v-model="numPlayers">
<label for="four">4</label>
						
						<input type="radio" v-model="" value="1"
 -->                     
						</div>
						<div id="chat" v-show="gameId">
						
						 <div class="columns is-gapless">
    <div class="column is-1"> 
<input type="submit" @click="exit" name="Exit" class="is-small button is-info" value="Exit/Save"> 
<input type="submit" @click="forefit" name="Forefit" value="Forefit" class="is-small button is-danger"> 
      </div>
<div class="column is-1"> 							<div>{{message}}</div>
      </div>
		</div>
						
						
							<div id="gamearea">
								<leaderboard-component v-bind:players="players"></leaderboard-component>
							
							</div>
							 
							 	<main-component></main-component>
								
							<input type="hidden" name="_token" :value="csrf">
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
				
				window.axios.get('http://45.77.152.150/lara/info/public/home/moviegame/join/'+this.numPlayers).then((response)=>{
					this.gameId=response.data.id;
					this.players=response.data.currentPlayers;
				
					this.mychannel=Echo.private('moviegameprivate.'+this.game_id)
					.listen('MessageMovieGame', e => {
						this.players=e.data.data.currentPlayers;
						this.message="Player " + e.data.data.name + " has joined the game";
					});
					
					this.channel=Echo.private('moviegame.'+this.game_id)
					.listen('JoinMovieGame', e => {
						alert('jion');
						this.players=e.data.data.currentPlayers;
						this.message="Player " + e.data.data.name + " has joined the game";
					})
					.listen('LeaveMovieGame', e => {
						this.players=e.data.data.currentPlayers;
						this.message="Player " + e.data.data.name + " has left the game";
					});
					
				});		
	
			},
			forefit: function (event) {
				this.gameId=false;
				window.axios.get('http://45.77.152.150/lara/info/public/home/moviegame/leave').then((response)=>{
					console.log(response);	
				});
			},
			exit: function(event){
				this.gameId=false;
			}, 
		},
    data(){
       return {
				csrf: document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
       messages: [],
				players: [],
       message: '',
				gameId: null, 
				numberPlayers: 0,
				channel: '', 
				mychannel: ''
            }
        }
    }
</script>
