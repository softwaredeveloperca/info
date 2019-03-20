<template>
<div>
<div class="box subtitle">
Station 1 - Pop. 100,000
</div>
<div class="card">
  <header class="card-header">
   
    <p class="card-header-title">
      Demographics
    </p>
  </header>
  <div class="card-content">
    <div class="content">   

     <div>
				<progress class="progress is-danger" :value="station.demo_male" label="male" max="100">Male</progress> Male
		  </div>	
		  <br>
			<div>
				<progress class="progress is-primary" :value="station.demo_senior" max="100">Seniors</progress> Seniors
			</div>	
			<br>
			<div>
				<progress class="progress is-success" :value="station.demo_adult" max="100">Adult</progress> Adult
			</div>	
			<br>
			<div>
				<progress class="progress is-warning" :value="station.demo_young" max="100">Young</progress> Young
			</div>	
			<br>
			<div>
				<progress class="progress is-info" :value="station.demo_bluecoller" max="100">Blue Coller</progress> Blue Coller
			</div>	
			
     </div>
  </div>
  <!--
	<footer class="card-footer">
    <a href="#" class="card-footer-item">Buy Station</a>
    <a href="#" class="card-footer-item" disabled>Sell Station</a>
  </footer>
	-->
</div>


</div>
</template>
<script>
    export default {
	 mounted:function(){
        this.get()
  },
		methods: {
    	get: function(event) {
		 		window.axios.get('http://45.77.152.150/lara/info/public/home/moviegame/station').then((response)=>{
					this.station=response.data;
			  });
			}, 
		},
       data(){
            return {        
										 station: []
            }
        }
    }
</script>