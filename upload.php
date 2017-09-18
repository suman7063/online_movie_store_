<?php
include'db.php';
session_start();
$email_check = $_SESSION['username'];
$qu = mysqli_query($conn,"select user_type as name3 from login where email = '$email_check'");
$qu1 = mysqli_fetch_array($qu,MYSQLI_ASSOC);
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
    <div id="home">
    <a href="admin.php" style="position: absolute;top: 5px; left:20px; color: black;text-decoration: none;">Home</a>
    <div id="logout">
    <a href="logout.php" style="position: absolute;top: 5px; left: 20px; color: black;text-decoration: none;">LOGOUT</a>
</div>
</div>
</div>
<div id="main">
 <form method="POST"  enctype="multipart/form-data" id="form">
 <table >
 <tr> 
 <td align="center">Movie</td>
 <td><input  type="file" name="your_imagename"></td>
 </tr>
 <tr> 
 <td align="center">Movie_name</td>
 <td><input type="text" name="mov_name" ></td>
 </tr>
 <tr> 
 <td align="center">Movie_type</td>
 <td><input type="text" name="mov_type" ></td>
 </tr>
 <tr> 
 <td align="center">Price</td>
 <td><input type="text" name="price" ></td>
 </tr>
 <tr> 
 <td align="center">Quantity</td>
 <td><input type="text" name="quant" ></td>
 </tr>
 <tr> 
 <td colspan="2" align="center"><input type="submit" name="submit" value="Upload"></td>
 </tr>
 </table>
</form>
</div>
</body>
</html>