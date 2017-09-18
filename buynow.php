<?php
include'db.php';
session_start();
$email_check = $_SESSION['email'];

$qu = mysqli_query($conn,"select fname1 as name3 from sign where email = '$email_check'");
$qu1 = mysqli_fetch_array($qu,MYSQLI_ASSOC);
if($qu1['name3']=='')
{
    header('location:index.php');
}
else
{
$sa=$_SESSION['pa'];
$pro_select = "select * from movi_upload where (id='$sa')";
$result = mysqli_query($conn,$pro_select) ;
$rowcount= mysqli_num_rows($result);
?>
<!DOCTYPE html>
<html>
<head>
	<title>purchase</title>
	<link rel="stylesheet" href="css/main_search.css">
	<link rel="stylesheet" href="css/purchase.css">
	<link rel="stylesheet" type="text/css" href="font-awesome/css/font-awesome.min.css" />
	<script>
    function myFunction() {
    document.getElementById("demo").innerHTML = "<div>heifffffftiruyoiuty</div>";
}
</script>
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
        <input type="text" name="item" style="width:50%; height: 35px; position: absolute; top:20%; left:0%;" placeholder="Search Movi Name" />
        <input type="submit" name="search" value="search" style="width: 20%; height: 40px; position: absolute; top:17%;left:50%; color: red;" />
    </form>
    <div id="logout">
    <a href="logout.php" style="position: absolute;top: 5px; left: 20px; color: black;text-decoration: none;">LOGOUT</a>
</div>
</div>
<!--Second-->
<div style="width: 700px; height:400px; background-color: white; position: relative;top:150px; left: 350px;">
<table style="width:70%;height: 100%;top:0px;left: 15%;border-top: 5px solid; border-bottom: 5px solid; border-left: 5px solid;border-right: 5px solid;">
    <tr>
    <?php
    if($rowcount==1)
            {
                 while($row = mysqli_fetch_array($result)) 
               {
       ?>
    <td colspan="2" align="center" bgcolor="#00283a"><font size="10" color="white">Billing Reciept for <?php
    echo $qu1['name3'];
    ?></font></td></tr>
    <tr><td align="center">Movie Name:</td><td><?php echo $row['movi_name'];?></td></tr>
    
    <tr><td align="center">Type:</td><td><?php echo $row['movi_type'];?></td></tr>
    <tr><td align="center">Amount Payable:</td><td><?php echo $row['movi_price'];?></td></tr>
</table>
<?php
$qt=$row['quantity']-1;
$nm=$row['movi_name'];
$q=mysqli_query($conn,"update movi_upload set quantity=$qt where movi_name='$nm'");
}
}
} 
?>
</div>
</body>
</html>