<template>
    <div class="container">
        <div class="row">
            <div class=" is-7">
                <div class="panel panel-default">

                    <div class="panel-body">
					<h2>Chat</h2>
						<div id="login" v-show="!loggedIn">
						<input type="submit" @click="login" name="Login" value="Start">
                        
						</div>
						<div id="chat" v-show="loggedIn">
							<input type="submit" @click="logoff" name="LogOff" value="End"><br><br>
							<ul id="example-1">
							  <li v-for="item in messages">
								{{ item }}
							  </li>
							</ul>
							<input type="hidden" name="_token" :value="csrf">
							<input type="text" name="message" v-model="message" value="">
							<input type="submit" @click="send" name="Send" value="Send">
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
				Echo.channel('searches')
				.listen('UserSearch', e => {
					this.messages.push(e.order.id);
					console.log('search');
				});
				
				Echo.private('globalchat')
				.listen('SendChatMessage', e => {
					console.log(e);
					console.log('heard');
					this.messages.push(e.message.message);
				});
				
				this.loggedIn=true;
			},
			logoff: function (event) {
				this.loggedIn=false;
				this.messages=[];
				this.message='';
			},
			send: function(event) {
			
				var message={'message': this.message};
				
				window.axios.post('http://45.77.152.150/lara/info/public/home/chat/message', 
				  { 
					message: this.message
				  }
				).then((response)=>{
					console.log(response);
				})
				this.messages.push(this.message);
				this.message='';
			}, 
		},
        data(){
            return {
				csrf: document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
				loggedIn: false, 
                messages: [],
                message: '',
            }
        }
    }
</script>
