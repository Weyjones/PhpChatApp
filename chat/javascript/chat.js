$(function(){
	$("#chatForm").submit(function(){
		var text= $("#text").val();
		var name= $("#name").val();

		if(text !=""){
			$.post( "ChatPoster.php",{text: text, name: name}, function( data ) {
 				$( ".chatMessages" ).append( data );
			});
		}
	});

	function getMessages(){
		$.get('GetMessages.php',function(data){
			$(".chatMessages").html(data);
		});
	}

	setInterval(function(){
		getMessages();
	},500);
});
