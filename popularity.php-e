<?php
include("functions.php");

//This script works with AJAX to increment the popularity of the items when they are dragged onto the bodyArea

$pieceId = $_POST["pieceId"];

$sql="SELECT * FROM pieces WHERE id ='{$pieceId}'";
$result = fReadSql($sql);

$newPopularity = $result[0][5]+1;

$sql="UPDATE pieces SET popularity='{$newPopularity}' WHERE id='{$pieceId}'";
fWriteSql($sql);
?>
