<?php
include'db.php';
session_start();
$email_check = $_SESSION['username'];
$qu = mysqli_query($conn,"select user_type as name3 from login where email = '$email_check'");
$qu1 = mysqli_fetch_array($qu,MYSQLI_ASSOC);
if($qu1['name3']=='')
{
header('location:log_sig.php');
}
else
{
if(isset($_POST['submit']))
{   
	$type = $_POST['mov_type'];
	$name = $_POST['mov_name'];
	$price = $_POST['price'];
   $quantity = $_POST['quant'];
	$pic='upload/'.$_FILES['your_imagename']['name'];
	if(move_uploaded_file($_FILES['your_imagename']['tmp_name'],$pic))
	{
		$img1=$_FILES['your_imagename']['name'];
		$sql = "insert into movi_upload(movi,movi_name,movi_type,movi_price,quantity ) values ('$img1','$name ','$type',$price,$quantity)";
	         if(!mysqli_query($conn,$sql))
              {
               die(mysqli_error($conn));
               }
               else
              {   
    	        if(move_uploaded_file($f_tmp,$store))
      	        {
      		        echo'uploaded';
      	        }
    	       header('location:upload.php');
    	   }
	}
}
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="css/upload.css">
   <link rel="stylesheet" href="css/main_search.css">
</head>
<body background="photo/backcover.jpg" style="background-size: cover; background-repeat: no-repeat;">
<div id="logo">
<!--logo-->
<img src="photo/images6.jpg">
</div>
<div class="head">
<marquee>
<h2>
<?php
echo $qu1['name3'];
?>
</h2>
</marquee>
</div>
<div id="search">
    <div id="logout">
    <a href="logout.php" style="position: absolute;top: 5px; left: 20px; color: black;text-decoration: none;">LOGOUT</a>
</div>
</div>
	<div style="width:20%;height:100px;background-color:red; position: absolute;top:200px; left:15%;"><a href="admin_view.php" style="position: relative;top: 40px;left: 80px;">VIEW</a></div>
	<div style="width:20%;height:100px;background-color:red; position: absolute;top:200px; left: 45%;"><a href="upload.php" style="position: relative;top: 40px;left: 80px;">ADD NEW MOVIE</a></div>
	<div style="width:20%;height:100px;background-color:red; position: absolute;top:200px; left: 80%;"><a href="admin_update.php" style="position: relative;top: 40px;left: 80px;">UPDATE QUANTITY</a></div>
<?php
}
?>
</body>
</html>