<template>
<table class="table" id="leaderboard">
			<tr>
    <td v-for="player in players">
      <span class="heading"> {{player.name}} </span>
      <span class="subheading[text-color-primary]">${{player.money}}</span>
<span class="subheading text-color-light">Fans:{{player.fans}}</span>
  
    </td>
			</tr>
</table>
</template>
<script>
    export default {
	      props: {
		  	'players': { type: Array, default: 'bar' }
		  }, 
        data(){
            return {
   				'focus': 0
            }
        }
    }
</script>
