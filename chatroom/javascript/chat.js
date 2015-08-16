$(function(){
	$("#chatForm").submit(function(){
		var room= $("#room").val();
		var message= $("#message").val();
		var name= $("#name").val();

		if(message !=""){
			$.post( "ChatPoster.php",{room: room, message: message, name: name}, function( data ) {
 				$( ".chatMessages" ).append( data );
			});
		}
	});

	function getURLParameter(name) {
  return decodeURIComponent((new RegExp('[?|&]' + name + '=' + '([^&;]+?)(&|#|;|$)').exec(location.search)||[,""])[1].replace(/\+/g, '%20'))||null
	}

	function getMessages(){
		$.get('GetMessages.php?room='+getURLParameter('room'),function(data){
			$(".chatMessages").html(data);
		});
	}

	setInterval(function(){
		getMessages();
	},500);
});
