//This script is part of Ninique's Dollmaker Script (http://minidollz.ninique.net)

$(document).ready(function() {
		
		//Makes the pieces draggable & sets options
		$("#piecesArea > div > img").draggable({ 
				//Makes it so that the pieces' z-index can be reordered
				stack: { group: '#piecesArea > div > img', min: 500,scroll: false },
				distance: 0		
		});
		
		//Sets what happens when you release a piece
		$("#bodyArea").droppable({	
			drop: function(event, ui){
				//this is so that the element "sticks" even when tab is changed.
				ui.draggable.addClass("draggedout");			
			},
			//changes current tab to the tab the piece belongs to when dragged out of body area
			out: function(event, ui){
				ui.draggable.removeClass("draggedout");
				var whichTab = ui.draggable.parent().attr("id");
				$("#piecesArea").tabs('select' , whichTab);
			}
		});
		
		//tabs
		$("#piecesArea").tabs();
	
	//changes the body when thumbnails are clicked	
	$("#swatchesArea a").click( function() {
		var changeSrc = $(this).attr("href");
		$("#bodyArea>img").attr("src", changeSrc);
		return false;
	});
	
}); 
