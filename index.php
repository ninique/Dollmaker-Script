<?php 
include("functions.php");

if(isset($_GET["order"])) {
	$sort= $_GET['order'];
	
	if($sort == "popularity") {
		$order = "ORDER BY popularity DESC";
	} else if($sort == "random")  {
		$order = "ORDER BY RAND() LIMIT 500";
	} else {
		$order = "ORDER BY id DESC";
	}
	
	$sql="SELECT * FROM pieces $order";
	$result = fReadSql($sql);
}
?>		

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>Collaborative Pixel Wardrobe</title>
	<link rel="stylesheet" type="text/css" href="styles/mainstylesheet.css" charset="utf-8">
	
	<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.3/jquery.min.js"></script>
	<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.7.2/jquery-ui.min.js"></script>
	<script type="text/javascript" src="javascript/jquery.cookie.js"></script>
	<!--<script type="text/javascript" src="javascript/drag_n_drop.js"></script>-->
	<script type="text/javascript">
	$(document).ready(function() {

		//Makes the pieces draggable & sets options
		$("#piecesArea > div > div > img").draggable({ 
				//Makes it so that the pieces' z-index can be reordered
				stack: { group: '#piecesArea > div > div > img', min: 1 },
				
				//This displays the doller information inside #infoArea
				start: function() {
					var info = $(this).siblings().html();
					var picURL = $(this).attr("src");
					var info = "<img src=\""+picURL+"\" class=\"thumbnail\">"+"<div>"+info+"</div>";
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
				
				//this is so that the element "sticks" even when tab is changed.
				ui.draggable.addClass("draggedout");			
			},
			//changes current tab to the tab the piece belongs to when dragged out of body area
			out: function(event, ui){
				ui.draggable.removeClass("draggedout");
				var whichTab = ui.draggable.parent().parent().attr("id");
				$("#piecesArea").tabs('select' , whichTab);
			}
		});
		
		
		$("#piecesArea").tabs();
		
	
	
}); 

	</script>
</head>

<body>
<div id="container">
<div id="header"><h1>Collaborative Pixel Wardrobe</h></div>
	<div id="bodyArea"><img src="images/BaseBody.gif" alt="BaseBody" width="80" height="261"/></div>
	<div id="infoArea"><div>Information about the selected piece will display here</div></div>
	<div id="addYourOwn"><a href="submit.php">Submit your own clothing</a></div>
	<div id="secondColumn">
		<div id="order">
		
			<form method="get" action="?">
			<label>
				<?php 
				if(isset($_GET["order"])) {
					echo "Order by:";
				}else {
					echo "Please choose which order to display the pieces:";
				}
				?>
			</label>
				<select name="order" id="type">
						<option value="latest" <?php if ( (isset($_GET["order"])) && ($_GET["order"] == "latest") ) {echo "selected=\"selected\"";}?>>Latest</option>
						<option value="popularity" <?php if ( (isset($_GET["order"])) && ($_GET["order"] == "popularity") ) {echo "selected=\"selected\"";}?>>Popularity</option> 
						<option value="random" <?php if ( (isset($_GET["order"])) && ($_GET["order"] == "random") ) {echo "selected=\"selected\"";}?>>Random</option>
				</select>
				<input name="Submit" id="submit" type="submit" value="Reload">
			</form>
		</div><!--order-->
		
		<?php if(isset($_GET["order"])) {?>
		<div id="piecesArea">
			<ul>
				<li><a href="#tabs-1">Hair</a></li>
				<li><a href="#tabs-2">Tops</a></li>
				<li><a href="#tabs-3">Bottoms</a></li>
				<li><a href="#tabs-4">Dresses</a></li>
				<li><a href="#tabs-5">Shoes</a></li>
				<!--<li><a href="#tabs-6">Accessories</a></li>-->
			</ul>
			<div id="tabs-1">
				<?php displayPieces($result, 0); ?>
				<div class="clearfix">.</div>
			</div>
			<div id="tabs-2">
				<?php displayPieces($result, 1); ?>
				<div class="clearfix">.</div>
			</div>
			<div id="tabs-3">
				<?php displayPieces($result, 2); ?>
				<div class="clearfix">.</div>
			</div>
			<div id="tabs-4">
				<?php displayPieces($result, 3); ?>
				<div class="clearfix">.</div>
			</div>
			<div id="tabs-5">
				<?php displayPieces($result, 4); ?>
				<div class="clearfix">.</div>
			</div>
			<div id="tabs-6">
				<?php displayPieces($result, 5); ?>
				<div class="clearfix">.</div>
		</div><!--PiecesArea-->		
			<?php } ?>
	</div><!--SecondColumn-->
</div><!--container-->
</body>
</html>
