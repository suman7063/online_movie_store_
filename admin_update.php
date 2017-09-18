
<?php
include'db.php';
session_start();
$email_check = $_SESSION['username'];
$qu = mysqli_query($conn,"select fname1 as name3 from sign where email = '$email_check'");
$qu1 = mysqli_fetch_array($qu,MYSQLI_ASSOC);
?>
<!DOCTYPE html>
<html>
<head>
    <title></title>
    <link rel="stylesheet" href="css/main_search.css">
    <link rel="stylesheet" type="text/css" href="font-awesome/css/font-awesome.min.css" />
    <link rel="stylesheet" type="text/css" href="css/demo.css" />
        <link rel="stylesheet" type="text/css" href="css/style_common.css" />
        <link rel="stylesheet" type="text/css" href="css/style10.css" />
          <link rel="stylesheet" type="text/css" href="css/osewal.css" />
</head>
<body>
<div id="logo">
<!--logo-->
<img src="photo/images6.jpg">
</div>
<form method="POST" action="admin_update.php">
<div class="head">
<input type="text" name="item" style="width:50%; height: 35px; position: absolute; top:20%; left:0%;" placeholder="Movi Name" />
</div>
<div id="search">
    
        <input type="text" name="quan" style="width:50%; height: 35px; position: absolute; top:20%; left:0%;" placeholder="Quantity" />
        <input type="submit" name="search" value="update" style="width: 20%; height: 40px; position: absolute; top:17%;left:50%; color: red;" />
    </form>
    
</div>
<!--Second-->
<div id="body">
<div id="pro">
<?php
if(isset($_POST['search']))
{
$search_name=$_POST['item'];
$qt=$_POST['quan'];
$up_qr="update movi_upload set quantity=$qt where movi_name='$search_name'";
$res = mysqli_query($conn,$up_qr);
$pro_select = "select * from movi_upload where (movi_name='$search_name')";
$result = mysqli_query($conn,$pro_select);
$rowcount= mysqli_num_rows($result);
if($rowcount>=1)
{
 while($row = mysqli_fetch_array($result)) 
 {
 $qut=$row['quantity'];
 if($qut<=0)
 {
?>
<div style="width: 150px;height:150px; position: absolute;left: 300px;">
<div class="view view-main" style="background: #fff url(photo/rupee_foradian_one.png) no-repeat center center;background-size:cover;width: 150px;height:150px;border-radius: 100%;">
                   <img src="upload/<?php echo  $row['movi'] ?> " style="width: 150px;height: 150px;border-radius: 100%">
</div>
</div>
<div style="width: 500px;height: 300px; position: absolute;left:200px;top:160px;">
<?php
echo "<font size='15'color='white'>OUT OF STOCK</font> ";
 }
 else
 {
?>
</div>
<table height="auto" width="100%">
 <tr>
 <th width="20%"><font color="blue" size="5px"><div style="background-color: #FF5733;width:45%; position: relative;top:0px;left: 35%;box-shadow: 0 0 3px #ccc, 0 10px 15px #ebebeb inset;
        border-radius: 10%;">Movie</div></font></th>

 <th width="25%"><font color="blue" size="5px"><div style="background-color: #FF5733;width:45%; position: relative;top:0px;left: 35%;box-shadow: 0 0 3px #ccc, 0 10px 15px #ebebeb inset;
        border-radius: 10%;">Name</div></font></th>

 <th width="25%"><font color="blue" size="5px"><div style="background-color: #FF5733;width:45%; position: relative;top:0px;left: 35%;box-shadow: 0 0 3px #ccc, 0 10px 15px #ebebeb inset;
        border-radius: 10%;">Type</div></font></th>

 <th width="10%"><font color="blue" size="5px"><div style="background-color: #FF5733;width:45%; position: relative;top:0px;left: 35%;box-shadow: 0 0 3px #ccc, 0 10px 15px #ebebeb inset;
        border-radius: 10%;">Price</div></font></th>

<th width="20%"><font color="blue" size="5px"><div style="background-color: #FF5733;width:45%; position: relative;top:0px;left: 35%;box-shadow: 0 0 3px #ccc, 0 10px 15px #ebebeb inset;
        border-radius: 10%;">Qty</div></font></th>
 </tr>
 <tr>
     <th width="20%"><div class="container">
            <div class="main"> 
                <div class="view view-main" style="background: #fff url(photo/rupee_foradian_one.png) no-repeat center center; background-size:cover;width: 150px;height: 150px;border-radius: 100%;">
                   <img src="upload/<?php echo  $row['movi'] ?> " style="width: 150px;height: 150px;border-radius: 100%;">
                   <?php 
                        $_SESSION['id']=$row['id'];
                    ?>
                </div>
                </div>
            </th>
     <th width="20%" ><font color="white" size="4px"><?php echo $row['movi_name']?></font></th>
     <th width="20%"><font color="white" size="4px"><?php echo $row['movi_type']?></font></th>
     <th width="17%"><font color="white" size="4px"><?php echo $row['movi_price']?></font></th>
     <th width="23%"><font color="white" size="4px"><?php echo $row['quantity']?></font></th>
 </tr>
 </table>
 </div>
 </div>
 <?php
 $na=$row['id'];
 $_SESSION['id']=$na;
}
}
}
else
{
  echo'<i class="fa fa-user-times" aria-hidden="true"  style="font-size: 200px; color: black;position: absolute;top: 100px;left: 300px; "></i>';
}
}
?>

 </table>
 </div>
</div>
</div>
</body>
</html>
