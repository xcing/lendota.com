/* 
Created by: Kenrick Beckett

Name: Chat Engine
*/

var instanse = false;
var state;
var mes;
var file;
var clanId;


function Chat (id) {
    this.update = updateChat;
    this.send = sendChat;
	this.getState = getStateOfChat;
	clanId = id;
}

//gets the state of the chat
function getStateOfChat(){
	if(!instanse){
		 instanse = true;
		 var d = new Date();
		 $.ajax({
			   type: "GET",
			   url: "/chat/process.php?_="+d.getTime(),
			   data: {  
			   			'function': 'getState',
			   			'clanId': clanId,
						'file': file
						},
			   dataType: "json",
			
			   success: function(data){
				   state = data.state;
				   instanse = false;
			   }
			});
	}	 
}

//Updates the chat
function updateChat(){
	 if(!instanse){
		 instanse = true;
		 var d = new Date();
	     $.ajax({
			   type: "GET",
			   url: "/chat/process.php?_="+d.getTime(),
			   data: {  
			   			'function': 'update',
			   			'clanId': clanId,
						'state': state,
						'file': file
						},
			   dataType: "json",
			   success: function(data){
				   if(data.text){
						for (var i = 0; i < data.text.length; i++) {
                            $('#chat-area').append($("<p>"+ data.text[i] +"</p>"));
                        }								  
				   }
				   document.getElementById('chat-area').scrollTop = document.getElementById('chat-area').scrollHeight;
				   instanse = false;
				   state = data.state;
			   }
			});
	 }
	 else {
		 setTimeout(updateChat, 1500);
	 }
}

//send the message
function sendChat(message, nickname)
{       
    updateChat();
    var d = new Date();
     $.ajax({
		   type: "GET",
		   url: "/chat/process.php?_="+d.getTime(),
		   data: {  
		   			'function': 'send',
		   			'clanId': clanId,
					'message': message,
					'nickname': nickname,
					'file': file
				 },
		   dataType: "json",
		   success: function(data){
			   updateChat();
		   }
		});
}
