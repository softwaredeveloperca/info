<template>
<div id="main">

<div class="tabs is-small is-left">
  <ul>
    <li v-bind:class="{ 'is-active': tabsel == 'home' }" @click="tabsel = 'home'"><a>Home</a></li>
    <li v-bind:class="{ 'is-active': tabsel == 'schedule' }" @click="tabsel = 'schedule'"><a>Schedule</a></li>
    <li v-bind:class="{ 'is-active': tabsel == 'movies' }" @click="tabsel = 'movies'"><a>Movies</a></li>
    <li v-bind:class="{ 'is-active': tabsel == 'stations' }" @click="tabsel = 'stations'"><a>Stations</a></li>
    <li v-bind:class="{ 'is-active': tabsel == 'ads' }" @click="tabsel = 'ads'"><a>Ads</a></li> 
  </ul>
</div>

<!-- Tab panes -->
<div class="content">
  <div v-show="tabsel == 'home'">	<home-component v-bind:game="game" @eventname="updateTab"></home-component>  </div>
  <div v-show="tabsel == 'schedule'">  	<schedule-component v-bind:game="game"></schedule-component>   </div>
  <div v-show="tabsel == 'movies'"> 	<movies-component v-bind:game="game"></movies-component> </div>
  <div v-show="tabsel == 'stations'"> <stations-component v-bind:game="game"></stations-component> </div>
  <div v-show="tabsel == 'ads'"> <stations-component v-bind:game="game"></stations-component> </div>
</div>
</div>
</template>
<script>
    export default {
	  mounted:function(){
        this.get()
    },
		methods: {
    	send: function(event) {
		
			}, 
			get: function(event){
				window.axios.get('http://45.77.152.150/lara/info/public/home/moviegame/info').then((response)=>{
				   this.game=response.data;
				});
			}, 
			updateTab: function(data){
				this.tabsel = data;
			}, 
		},
       data(){
            return {
                messages: [],
									 tabsel: "home", 
                message: '',
									 game: [], 
            }
        }
    }
</script>

