
<!DOCTYPE html>
<html>
<head>
	<title>search</title>
	<link rel="stylesheet" href="css/main_search.css">
	<link rel="stylesheet" type="text/css" href="font-awesome/css/font-awesome.min.css" />
	<link rel="stylesheet" type="text/css" href="css/demo.css" />
        <link rel="stylesheet" type="text/css" href="css/style_common.css" />
        <link rel="stylesheet" type="text/css" href="css/style10.css" />
		  <link rel="stylesheet" type="text/css" href="css/osewal.css" />
</head>
<body>
<!-- include submit and logout -->
<?php
include'search.php';
?>
<!--Second-->
<div id="body">
<div id="pro">
<table height="auto" width="100%">
 <tr>
 <th width="25%"><font color="blue" size="5px"><div style="background-color: #FF5733;width:45%; position: relative;top:0px;left: 35%;box-shadow: 0 0 3px #ccc, 0 10px 15px #ebebeb inset;
        border-radius: 10%;">Movie</div></font></th>

 <th width="25%"><font color="blue" size="5px"><div style="background-color: #FF5733;width:45%; position: relative;top:0px;left: 35%;box-shadow: 0 0 3px #ccc, 0 10px 15px #ebebeb inset;
        border-radius: 10%;">MovieName</div></font></th>

 <th width="25%"><font color="blue" size="5px"><div style="background-color: #FF5733;width:45%; position: relative;top:0px;left: 35%;box-shadow: 0 0 3px #ccc, 0 10px 15px #ebebeb inset;
        border-radius: 10%;">Movie_type</div></font></th>

 <th width="25%"><font color="blue" size="5px"><div style="background-color: #FF5733;width:45%; position: relative;top:0px;left: 35%;box-shadow: 0 0 3px #ccc, 0 10px 15px #ebebeb inset;
        border-radius: 10%;">Price</div></font></th>
 </tr>
 <!--php code for view all view-->
<?php
$pro_select = "select * from movi_upload";
$result = mysqli_query($conn,$pro_select) ;
 while($row = mysqli_fetch_array($result)) 
 {?>
 <tr>
     <th width="25%"><div class="container">
            <div class="main"> 
                <div class="view view-main" style="background: #fff url(photo/rupee_foradian_one.png) no-repeat center center; background-size:cover;width: 150px;height: 150px;border-radius: 100%;">
                   <img src="upload/<?php echo  $row['movi'] ?> " style="width: 150px;height: 150px;border-radius: 100%;">
                    <div class="mask" style="position:absolute;top: 10px;left: 30px;">
                        <a href="purches.php"><h1 >Purchase</h1></a>
                    </div>
                </div>
                </div>
            </th>
     <th width="25%" ><font color="white" size="4px"><?php echo $row['movi_name']?></font></th>
     <th width="25%"><font color="white" size="4px"><?php echo $row['movi_type']?></font></th>
     <th width="25%"><font color="white" size="4px"><?php echo $row['movi_price']?></font></th>
 </tr>
 <?php
 $pro_name=$row['movi_name'];
 $_SESSION['movi_name']=$pro_name;
}
 ?>
 </table>
 </div>
</div>

<!--third-->
</body>
</html>