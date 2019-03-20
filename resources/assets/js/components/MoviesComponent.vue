<template>
<div>

<div class="card" v-for="movie in movies">
  <header class="card-header">
    <p class="card-header-title">
      {{movie.name}}
    </p>
  </header>
  <div class="card-content">
    <div class="content">
		
			
			 <span class="tag is-danger">
			 Male: {{movie.demo_male}}%
			   </span>
			 <span class="tag is-white">
			 Female: {{movie.demo_female}}%
			   </span>
			 <span class="tag is-primary">
			 Senior: {{movie.demo_senior}}%
			   </span>
			 <span class="tag is-success">
			 Adult: {{movie.demo_adult}}%
			   </span>
			 <span class="tag is-warning">
			 Young: {{movie.demo_young}}%
			   </span>
			<span class="tag is-info">
			 Blue Coller: {{movie.demo_bluecoller}}%
			   </span>  
				 			<span class="tag is-dark">
			 White Coller: {{movie.demo_bluecoller}}%
			   </span>  						
    </div>
  </div>
</div>

"demo_male": "35", "demo_senior": "35", "demo_adult": "3", "demo_young": "59", "demo_bluecoller": "50", "name": "ERcpFVMq7mD4GUGvPVed9MoyN", "category": "", "last_shown": "-1", "created_at": "2019-03-05 04:40:31", "updated_at": "2019-03-05 04:40:31" }, { "id": 202, "game_id": "65", "player_id": "2", "demo_male": "43", "demo_senior": "31", "demo_adult": "25", "demo_young": "88", "demo_bluecoller": "59", "name": "RX4nqPwpCPwZnYZgWL0j1JW9K", "category": "", "last_shown": "-1", "created_at": "2019-03-05 04:40:31", "updated_at": "2019-03-05 04:40:31" 

</div>
</template>
<script>
    export default {
	 mounted:function(){
        this.get()
  },
		methods: {
    	get: function(event) {
		    window.axios.get('http://45.77.152.150/lara/info/public/home/moviegame/movies').then((response)=>{
					this.movies=response.data;
			  });
			}, 
		},
       data(){
            return {
                movies: [],
										 tabsel: "home", 
                message: '',
            }
        }
    }
</script>