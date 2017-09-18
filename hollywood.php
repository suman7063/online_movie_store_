<?php
include'db.php';
?>
<!DOCTYPE html>
<html>
<head>
	<title>search</title>
     <style type="text/css">
      .upper
    {
        width: 100%;
        height: 70px;
        background-color:#92C50D;
        position: absolute;
        top:0px;
        left: 0px;

    }
    #home
{
        width: 100px;
        height: 30px;
        position: absolute;
        top:12px;
        right:5px;
        background-color:#FF5733;
        box-shadow: 0 0 3px #ccc, 0 10px 15px #ebebeb inset;
        border-radius: 10%;
        text-align: center;
}
#pro
{
        width: 100%;
        height:auto;
        position:absolute;
        top:100px;
        right:0px;
        background-color: #00283a;
        opacity: 0.8;
}
</style>
	<link rel="stylesheet" type="text/css" href="font-awesome/css/font-awesome.min.css" />
	<link rel="stylesheet" type="text/css" href="css/demo.css" />
        <link rel="stylesheet" type="text/css" href="css/style_common.css" />
        <link rel="stylesheet" type="text/css" href="css/style10.css" />
		  <link rel="stylesheet" type="text/css" href="css/osewal.css" />
</head>
<body>
<!--first-->
<div class="upper">
<img src="photo/images6.jpg" width="20" height="93" style="width: 70px;height:70px; border-radius: 100%;position:relative;left: 50px;">
    <div id="home">
    <a href="index.php" style="position: relative;top:5px;">Home</a>
    </div>
</div>
<!--Second-->
<div id="pro">
<table height="auto" width="100%">
 <tr>
 <th width="25%"><font color="#92C50D" size="5px">------Movi------</font></th>
 <th width="25%"><font color="#92C50D" size="5px">------Movi_Name------</font></th>
 <th width="25%"><font color="#92C50D" size="5px">------Movi_type------</font></th>
 <th width="25%"><font color="#92C50D" size="5px">------Price------</font></th>
 </tr>
  <hr style="position:relative;top:50px;">
<?php
$pro_select = "select * from movi_upload where movi_type='Hollywood'";
$result = mysqli_query($conn,$pro_select) ;
 while($row = mysqli_fetch_array($result)) 
 {?>
 <tr>
     <th width="25%"><div class="container">
            <div class="main"> 
                <div class="view view-main" style="background: #fff url(photo/wooden_floor_texture_background_vector_291517.jpg) no-repeat center center;">
                   <img src="upload/<?php echo  $row['movi'] ?> " style="width: 100px;height: 100px;border-radius: 100%">
                </div></th>
     <th width="25%" ><font color="white" size="4px"><?php echo $row['movi_name']?></font></th>
     <th width="25%"><font color="white" size="4px"><?php echo $row['movi_type']?></font></th>
     <th width="25%"><font color="white" size="4px"><?php echo $row['movi_price']?></font></th>
 </tr>
 <?php
}
 ?>
 </table>
</div>

<!--third-->

</div>
</body>
</html>