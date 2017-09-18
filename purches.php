<?php
include'db.php';
session_start();
$email_check = $_SESSION['email'];

$qu = mysqli_query($conn,"select fname1 as name3 from sign where email = '$email_check'");
$qu1 = mysqli_fetch_array($qu,MYSQLI_ASSOC);
if($qu1['name3']=='')
{
    header('location:log_sig.php');
}
else
{
?>
<!DOCTYPE html>
<html>
<head>
	<title>purchase</title>
	<link rel="stylesheet" href="css/main_search.css">
	<link rel="stylesheet" href="css/purchase.css">
	<link rel="stylesheet" type="text/css" href="font-awesome/css/font-awesome.min.css" />
	z
</head>
<body background="photo/kyleabaker-2560x1024-collage.jpg">

<div id="logo">
<!--logo-->
<img src="photo/images6.jpg">
</div>
<div class="head">
<marquee>
<h2>
<font color="#00283a">
<?php
echo "Hello__".$qu1['name3'];
?>
</font>
</h2>
</marquee>
</div>
<div id="search">
    <form method="POST" action="search.php">
        <input type="text" name="item" style="width:30%; height: 35px; position: absolute; top:17%; left:0%;" placeholder="Search Movi Name" />
        <input type="submit" name="search" value="search" style="width: 20%; height: 40px; position: absolute; top:17%;left:30%; color: red;" />
        <div style="position: absolute; top:17%; left:60%;">
        <i class="fa fa-shopping-cart" aria-hidden="true" style="font-size:50px;"></i>cart</div>
    </form>
    <div id="logout">
    <a href="logout.php" style="position: absolute;top: 5px; left: 20px; color: black;text-decoration: none;">LOGOUT</a>
</div>
</div>
<!--Second-->
<div id="div_table">
<table >
	<tr>
    <td><?php
         $sa = $_SESSION['id'];
         echo $sa;
            if(isset($_GET['id']))
            {
              $_SESSION['pa']=$product_check ;
            $pro_select = "select * from movi_upload where (id='$sa')";
            $result = mysqli_query($conn,$pro_select) ;
            $rowcount= mysqli_num_rows($result);
            if($rowcount>=1)
            {
                 while($row = mysqli_fetch_array($result)) 
               {


                ?>
                <img src="upload/<?php echo  $row['movi']?>" style="width: 200px;height: 200px;position: absolute;left: 350px;top:80px;">
                <div style="width: 200px;height:30px;position:relative;top:90px;left:350px; background-color:#92C50D;"><a href="buynow.php" style="text-decoration: none;color: black;"><i class="fa fa-youtube-play" aria-hidden="true" style="font-size: 25px; color:black;position: absolute;top: 3px;left: 3px;"></i><h3 style="position:relative;left:40px;top:5px;">Buy Now</h3></a></div>
                <?php
               }

}
            }
        ?></td>
		<td width="30%" height="400px">
			<?php
			$product_check = $_SESSION['id'];
              $_SESSION['pa']=$product_check ;
			$pro_select = "select * from movi_upload where (id='$product_check')";
			$result = mysqli_query($conn,$pro_select) ;
            $rowcount= mysqli_num_rows($result);
            if($rowcount==1)
            {
            	 while($row = mysqli_fetch_array($result)) 
               {

               	?>
                <img src="upload/<?php echo  $row['movi']?>" style="width: 200px;height: 200px;position: absolute;left: 350px;top:80px;">
                <div style="width: 200px;height:30px;position:absolute;top:300px;left:350px; background-color:#92C50D;"><a href="buynow.php" style="text-decoration: none;color: black;"><i class="fa fa-youtube-play" aria-hidden="true" style="font-size: 25px; color:black;position: absolute;top: 3px;left: 3px;"></i><h3 style="position:absolute;left:40px;top:-15px;">Buy Now</h3></a></div>
               	<?php
               }

            }
        ?>
        <!-- add cart -->
      <div style="width:200px;height:30px;position:absolute;top:350px;left:350px; background-color:#92C50D;"><a href="" style="text-decoration: none;color: black;">
      <i class="fa fa-shopping-cart" aria-hidden="true" style="font-size: 25px; color:black;position: absolute;top: 3px;left: 3px;"></i><h3 style="position:absolute;left:40px;top:-15px;">Add to Cart</h3></a>
        </div>         
		</td>
	</tr>
</table>
</div>
</body>
</html>
<?php
}
?>