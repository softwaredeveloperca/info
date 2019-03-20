<template>
<div>
<span class="tag is-info">
Day: {{game.day}}
</span>
<span class="tag is-light">

Max Bonus: ${{game.day_rate}}
</span>
<br><br>
<br><br>

<a class="button button-danger button-large" v-on:click="endTurn" :disabled="!game.schedule">End Day</a>

<span class="tag is-danger">
Bonus: ${{timerRate}}
</span>
</div>
</template>
<script>
    export default {
	  props: {
	   'game': { type: Array, default: [] }
	  },
	  mounted:function(){
		    this.interval = setInterval(this.increaseTime, 1000);
    //    this.get();
   },
computed: {
    // a computed getter
    timerRate: function () {
	     const amountLeft = this.game.day_rate+this.game.counter;
			 return amountLeft < 0 ? 0 : this.game.day_rate+this.game.counter;
    }
  }, 
		methods: {
    	get: function(event) {
				 window.axios.get('http://45.77.152.150/lara/info/public/home/moviegame/info').then((response)=>{
					this.game=response.data;
					
		
			  });
			}, 
			endTurn: function(event) {
				 window.axios.get('http://45.77.152.150/lara/info/public/home/moviegame/endTurn').then((response)=>{
				 this.game=response.data;
			  });
			}, 
			increaseTime: function(event) {
					this.game.counter--;
			}, 
			selectTab: function(event) {
				 this.$emit('setTab', 'schedule');
			}
		},
       data(){
            return {
				tabsel: "home", 
                message: '',
				interval: null,
            }
        }
    }
</script>