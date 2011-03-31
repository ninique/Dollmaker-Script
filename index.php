<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" >
	<title>Dollmaker</title>
	<link rel="stylesheet" type="text/css" href="styles/mainstylesheet.css" charset="utf-8">
	
	<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.3/jquery.min.js"></script>
	<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.7.2/jquery-ui.min.js"></script>
	
	<!--remove the following line if you do not want anti-rightclick on images-->
	<script type="text/javascript" src="scripts/anti-rightclick.js"></script>
</head>

<?php

$ignore = Array(".", "..", ".htaccess", ".DS_Store");

function displayBase($path, $ignore){
$images = scandir("$path/thumbnails");
foreach($images as $curimg){
				if(!in_array($curimg, $ignore)) {
					echo "<a href=\"$path/full/".$curimg."\"><img src=\"$path/thumbnails/".$curimg."\" alt=\"swatch\"></a>";
				}
			}; 
}
?>

<body>

<!-- You can put your own content up here. You can move the dollmaker on the page using CSS (see mainstylesheet.css for details) -->


<div id="dollmaker_container">
	<div id="bodyArea" class="ui-corner-all">
	<img id="skintone" src="base/skintone/full/2European.png" alt="BaseBody">
	<img id="eyes" src="base/eyes/full/06DarkBlue.png" alt="Eyes">
	</div>
	<div id="swatchesArea" class="ui-corner-all">
		<div id="skinSwitch">
			<h3>Skintone:</h3>
			<?php displayBase("base/skintone", $ignore);?>
		</div>	
		<div id="eyeSwitch">
			<h3>Eyes:</h3>
			<?php displayBase("base/eyes", $ignore);?>
		</div>
	</div>
	<div id="piecesArea">

	<?php 
		$folders = scandir("images/");
		
		/*Display the tabs according to folder names*/
		echo "<ul id=\"tabsbar\">";
		foreach($folders as $key => $curfol){
			if(!in_array($curfol, $ignore)) {
				$curfol=ltrim($curfol,'1234567890');
				$key = $key-1;
				echo "<li><a href=\"#tabs-".$key."\">".$curfol."</a></li>\n";
			}
		}; 
		
		echo "</ul>";
		
		/*For each tab, display the props*/
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
		
<!--The message for anti-rightclick-->
<div id="anti-rightclick">Please do not steal the images from this dollmaker</div>	
	
</div><!--container-->
</body>
</html>