$(document).ready(function() {

		//Makes the pieces draggable & sets options
		$("#piecesArea > div > div > img").draggable({ 
				//Makes it so that the pieces' z-index can be reordered
				stack: { group: '#piecesArea > div > div > img', min: 1 },
				
				//This displays the doller information inside #infoArea
				start: function() {
					var info = $(this).siblings().html();
					var picURL = $(this).attr("src");
					var info = "<img src=\""+picURL+"\" class=\"thumbnail\">"+info;
					$("#infoArea > div").hide();
					$("#infoArea > div").html(info).fadeIn("slow");
				},
		});
		
		//This makes it so that the popularity increases when the piece is dropped unto the bodyArea. 
		//It uses AJAX to accomplish this without reloading the page and without the user really knowing.
		$("#bodyArea").droppable({	
			drop: function(event, ui){
				var pieceID = ui.draggable.attr("id");
				$.ajax({
					type: "POST", url: "popularity.php", data: "pieceId="+pieceID,
					success: function(html){
						$("#ajaxArea").html(html);
					}
				});				
			}
		});
		
		//$("#piecesArea").tabs();

		//This is to make it so that the objects on the page are not selectable (text-select), which would produce a weird behaviour. 
		//this code is from http://chris-barr.com/entry/disable_text_selection_with_jquery/
		$(function(){
			$.extend($.fn.disableTextSelect = function() {
				return this.each(function(){
					if($.browser.mozilla){//Firefox
						$(this).css('MozUserSelect','none');
					}else if($.browser.msie){//IE
						$(this).bind('selectstart',function(){return false;});
					}else{//Opera, etc.
						$(this).mousedown(function(){return false;});
					}
				});
			});
			$('.noSelect').disableTextSelect();
		});
		
	
	
}); 
