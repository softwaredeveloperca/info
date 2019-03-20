<template>
<div>
<table class="table">
  <thead>
    <tr>
      <th><abbr title="Position">Time</abbr></th>
      <th>Movie</th>
     </tr>
   </thead>
<tbody>
			 <tr v-for="schedule in game.schedule">
			 <th>{{schedule.slot_name}}</th>
      <td>{{schedule.movie[0].name}} <strong>(Comedy)</strong> 
				<a class="delete is-small"></a> 
				</td>
     </tr>
			
			<tr>
			 <th>7:00</th>
      <td>

<div class="field">
  <div class="control">
    <div class="select is-primary is-small">
      <select v-model="selectedMovie">
        <option v-for="movie in movies">aaa{{movie.name}}</option>
        <option>With options</option>
      </select>
    </div>
  </div>
</div>
      </td>
    
			</tr>
    
			 
</tbody>
</table>


</div>
</template>
<script>
    export default {
	 props: {
	  'game': { type: Array, default: []  }
	 },
	 mounted:function(){
        this.get()
  },
		methods: {
    	get: function(event) {
				window.axios.get('http://45.77.152.150/lara/info/public/home/moviegame/schedule').then((response)=>{
					this.schedule=response.data;
			  });
			 window.axios.get('http://45.77.152.150/lara/info/public/home/moviegame/movies').then((response)=>{
					this.movies=response.data;
			  });
			}, 
		},
       data(){
            return {
                schedule: [], 
										 tabsel: "home",
										nestableItems: [{'id': 'Early', 'text': 'test'},{'id': 'Feature', 'text': 'gfffd'}, {'id': 'Late', 'text': 'gf'} ],
                selectedMovie: 0,
									movies: [],
            }
        }
    }
</script>