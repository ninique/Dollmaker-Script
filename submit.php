<?php
include("functions.php");

$sql="SELECT * FROM pieces";
$result = fReadSql($sql);

if(isset($_POST['Submit'])){
	$dollerName = $_POST["name"]; //this must be a string 250 chars or less
	$dollerURL = $_POST["site"];//this must be a string 250 chars or less
	$type = $_POST["type"]; //this must be anumber 1-6
	
	//Validate Name
	if (($dollerName == "") ||(strlen($dollerName)) > 250){
	$errorMessage.= "You need to enter a name that is less than 250 characters.<br>";
	}
	
	//Validates URL, but allows for a blank field
	if (($dollerURL != "") && (!isValidURL($dollerURL))){
	$errorMessage.= "Your URL is not valid<br>";
	}
	
	//Inserts "none" if url is not specified
	if ($dollerURL == ""){
	$dollerURL = "none";
	}
	
	//Validates type
	if ($type > 6 || $type < 0){
	$errorMessage.= "You did not choose a type<br>";
	} 
	

	
	//To upload the file onto the server---------------------------
	//This code is modified http://www.reconn.us/content/view/30/51/
	$image=$_FILES['image']['name'];
	
	if ($image){ // Makes sure there is an image
		//Gets extension
		$filename = stripslashes($_FILES['image']['name']);
		$extension = getExtension($filename);
		$extension = strtolower($extension);
		
		//Makes sure it is the right format
		if ($extension != "png"){
			$errorMessage.= 'You need to save your image as .png<br>';
		}
		
		//makes sure filesize is not too big
		$size=filesize($_FILES['image']['tmp_name']); // Gets Size
		if ($size > 100*1024){ 
			$errorMessage.= 'Your image needs to be under 100kb<br>';
		}
		
		//Checks dimensions		
		$dimensions = getimagesize($_FILES['image']['tmp_name']); // gets Dimensions
		if(($dimensions[1] > 200) || ($dimensions[2] > 300)){
			$errorMessage.= 'Your image cannot be bigger than 200px by 300px<br>';
		}
		
		
		//Saves image on the server
		if (is_null($errorMessage)){
		
			//Creates a unique name for image
			$imageName=time().'.'.$extension; //this will be also stored in the database

			//Assigns unique filename (based on ID in database, perhaps ?)
			$newname="images/".$imageName;
			
			//we verify if the image has been uploaded, and print error instead
			$copied = copy($_FILES['image']['tmp_name'], $newname);
			if (!$copied){
				$errorMessage.= 'The image has not properly uploaded on the server<br>';
			}
		}		
	} else {
		$errorMessage.= 'You need to select an image from your computer<br>';
	}
	
	//Complete request and write to database if no error message encountered. 
	if(is_null($errorMessage)){
		$sql ="INSERT INTO pieces (imageURL,type,dollerName,dollerURL) VALUES ('{$imageName}',{$type},'{$dollerName}','{$dollerURL}')"; 
		fWriteSql($sql);	
		$message = "You have successfully uploaded the following piece:<br>";
		$message .= "<img src=\"images/".$imageName."\"><br>";
		$message .= "You can submit another piece below";
	} else {
		$message = "<b>Your submission could not be completed because:</b><br>";
		$message .= $errorMessage;
	}
}
?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<title>Submit</title>
	<link rel="stylesheet" type="text/css" href="styles/submit.css" charset="utf-8">
</head>
<body>
	<div id="container">
		<h1>Submit your own clothing</h1>
		<div id="instructions">
		<?php 
		if(isset($_POST['Submit'])){
			echo "<p>".$message."</p>";
		} else {
			echo "<p>Grab your favourite graphic program and a copy of the <a href=\"images/BaseBody.gif\">Body Template</a> and create your own pieces to add to the wardrobe. </p><p>When you submit your pieces, make sure they are cropped so that there isn't any extra space around them, and that they are saved as transparent gif or png.</p>";
		}
		?>
		
		</div>
		<form name="newad" method="post" enctype="multipart/form-data" action="">
		<label for "name">Your Name:</label><input type="text" name="name" id="name" value="<?php if(isset($_POST['name'])){echo $_POST['name']; }?>">
		<label for "site">Your Site URL (optional):</label><input type="text" name="site" id="site" value="<?php if(isset($_POST['site'])){echo $_POST['site']; }?>"> 
		<label for="image">Your submission:</label><input type="file" name="image" id="image">
		<label for "type">The type of object:</label>
		<select name="type" id="type">
			<option value="choose">--Chose--</option>
			<option value="0">Hair</option>
			<option value="1">Tops</option>
			<option value="2">Bottoms</option>
			<option value="3">Dresses</option>
			<option value="4">Shoes</option>
			<option value="5">Accessories</option>
		</select>

		<input name="Submit" id="submit" type="submit" value="Submit">
	</form>	<div id="back"><a href="index.php">Back to main page</a></div>

	</div><!--container-->
</body>
</html>


<!--next comes the form, you must set the enctype to "multipart/frm-data" and use an input type "file" -->

