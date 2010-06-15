<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" >
	<title>Dressmaker</title>
	<link rel="stylesheet" type="text/css" href="styles/mainstylesheet.css" charset="utf-8">
	
	<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.3/jquery.min.js"></script>
	<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.7.2/jquery-ui.min.js"></script>
	<script type="text/javascript" src="scripts/drag.js"></script>
</head>

<body>

<div id="container">
	<div id="bodyArea" class="ui-corner-all">
	<img class="skintone" src="base/1European.png" alt="BaseBody" width="80" height="261">
	</div>
	<div id="swatchesArea" class="ui-corner-all">
		<h3>Skintone:</h3>
		<?php
					$images = scandir("base");
					$ignore = Array(".", "..", ".htaccess");
					foreach($images as $curimg){
						if(!in_array($curimg, $ignore)) {
							echo "<a href=\"base/".$curimg."\"><img src=\"base/".$curimg."\" alt=\"swatch\"></a>";
						}
					}; 
		?>	
	</div>
	<div id="piecesArea">
<?php 
		echo "<ul id=\"tabsbar\">";
		$folders = scandir("images/");
		$ignore = Array(".", "..", ".htaccess", "BaseBody.gif", "title.png");
		foreach($folders as $key => $curfol){
			if(!in_array($curfol, $ignore)) {
				$curfol=ltrim($curfol,'1234567890');
				$key = $key-1;
				echo "<li><a href=\"#tabs-".$key."\">".$curfol."</a></li>\n";
			}
		}; 
		
		echo "</ul>";
		
		foreach($folders as $key => $curfol){
			if(!in_array($curfol, $ignore)) {
				$key = $key-1;
				echo "<div id=\"tabs-".$key."\">\n";
				
				$images = scandir("images/".$curfol);
				foreach($images as $curimg){
					if(!in_array($curimg, $ignore)) {
						echo "<img alt=\"\" src=\"images/".$curfol."/".$curimg."\">";
					}
				}; 
				
				
				echo "</div>\n";
			}
		}; 
?>
		</div>
		<!--PiecesArea-->		
</div><!--container-->
</body>
</html>
