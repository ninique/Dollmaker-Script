//This script is part of Ninique's Dollmaker Script (http://minidollz.ninique.net)

$(document).ready(function() {
	//Only disable right-click on images
	$("img").bind("contextmenu", function(e) {
		e.preventDefault();	
		
		var offsetY = $('#dollmaker_container').position().top;
		var offsetX = $('#dollmaker_container').position().left;
		
		//display an unobstrusive tooltip if you right-click on an image
		$('#anti-rightclick').css({
			left:e.pageX-offsetX,
			top :e.pageY-offsetY
		}).fadeIn('fast', function(){
			
			//clear the tooltip if you click somewhere else on the page.
			$(document,"img").click(function(){
				$('#anti-rightclick').fadeOut()
			});
		});
		
	});
}); 