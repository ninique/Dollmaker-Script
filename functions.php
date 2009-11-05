<?php

function fConnect(){
	mysql_connect("localhost", "root", "root") or die("Could not connect: " . mysql_error());
	mysql_select_db("dollmaker");
	return mysql_connect("localhost", "root", "root");
}

function fReadSql($sql){
		
	$connection = fConnect();

	$result = mysql_query($sql);
	$a = 0;
	$array = Array(); 
	while ($row = mysql_fetch_array($result, MYSQL_NUM)) {
		$array[$a] = Array(); 
		for($i=0; $i<mysql_num_fields($result); $i++){
			$array[$a][$i] = $row[$i];
		}
		
	$a ++; 
	}
	return $array;
	mysql_close($connection);

}

function fWriteSql($sql){
	$connection = fConnect();
	mysql_query($sql);	
	mysql_close($connection);
}

function getExtension($str) {
$i = strrpos($str,".");
if (!$i) { return ""; }
$l = strlen($str) - $i;
$ext = substr($str,$i+1,$l);
return $ext;
}

function isValidURL($url)
{
 return preg_match('|^http(s)?://[a-z0-9-]+(.[a-z0-9-]+)*(:[0-9]+)?(/.*)?$|i', $url);
}  

function displayPieces($result, $category){
	for($i=0;$i<count ($result);$i++) { 
		if($result[$i][2]==$category){
			echo "<div class=\"piececontainer\">";
			echo "<img id=\"".$result[$i][0]."\" src=\"images/".$result[$i][1]."\">";
			echo "	<div class=\"txt\">";
			echo "		<p>by: ".$result[$i][3]."</p>";
			if ($result[$i][4] != "none"){
				echo "<a href=\"".$result[$i][4]."\">[go to website]</a><br>";
			}else {
				echo "[no website]<br>";
			}
			echo "Popularity Index: ".$result[$i][5];
			echo "	</div>";
			echo "</div>";
		}
	}
} 

?>
