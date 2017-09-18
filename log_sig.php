<!DOCTYPE html>
<html >
<head>
  <title>Sign-Up/Login Form</title>
  <link rel="stylesheet" href="css/style2.css">
  <link rel="stylesheet" type="text/css" href="font-awesome/css/font-awesome.min.css" />
  </head>
<body background="photo/backcover.jpg" style="background-size: cover; background-repeat: no-repeat; width: 100%;">
<div style="width: 112px; height: 38px; background-color:#92C50D; position: absolute; right: 16px; top: 21px;"><a href="index.php" style="position: absolute; top: 10px; left: 31px; color:rgba(231,217,219,1.00)">HOME</a></div>
<div class="form">
<?php 
include'db.php';
if(isset($_POST['submit1']))
{
  $name1=$_POST['fname'];
  $name2=$_POST['lname'];
  $ename=$_POST['Ename'];
  $pass1=$_POST['password'];
  $pass2=$_POST['cpassword'];
   if($name1=='')
  {
    echo"<script>alert('Please Enter Your First Name')</script>";
  }
  if($name2=='')
  {
    echo"<script>alert('Please Enter Your Last Name')</script>";
  }
  
  if($ename=='')
  {
    echo"<script>alert('Please Enter Your Email')</script>";
  }
  if($pass1=='')
  {
    echo"<script>alert('Please Enter Your Password ')</script>";
  }
  if($pass2=='')
  {
    echo"<script>alert('Please Enter  Your Conform Password ')</script>";
  }
  elseif ($pass1!=$pass2) 
  {
    echo"<script>alert('Please Enter same Password')</script>";
  }
  else
  {
    $query = "insert into sign(fname1,lname2,email,pass,cpass) values('$name1','$name2','$ename','$pass1','$pass2')";
    if(!mysqli_query($conn,$query))
    {
      die(mysqli_error($conn));
    }
    else
    {
      $usertype="Candidate";
     $sql="insert into login(email,pass,user_type) values('$ename','$pass1','$usertype')";
     if(!mysqli_query($conn,$sql))
    {  
      die(mysqli_error($conn));
    }
    }
    echo"<font color='white' style='position:relative;top:0px;left:0px;size='18' face='Arial''><marquee><i class='fa fa-thumbs-up' aria-hidden='true' style='font-size: 35px; color: blue'></i> &nbsp &nbsp Successful &nbsp Register</marquee></font>";
  }
}
else
{
  echo"<font color='white' style='position:relative;top:0px;left:0px;size='18' face='Arial''><marquee><i class='fa fa-user' aria-hidden='true' style='font-size: 35px; color: #92C50D'></i> &nbsp &nbsp Fill The Following Form</marquee></font>";
}

 ?>
      <ul class="tab-group">
        <li class="tab active"><a href="#signup">Sign Up</a></li>
        <li class="tab"><a href="#login">Log In</a></li>
      </ul>
      
      <div class="tab-content">
        <div id="signup">   
          <h1>Sign Up </h1>
          
          <form method="POST">
          
          <div class="top-row">
            <div class="field-wrap">
              <label>
                First Name [A-Z,a-z]<span class="req">*</span>
              </label>
              <input type="text" autocomplete="off" name="fname" pattern="[A-Z,a-z]*" />
            </div>
        
            <div class="field-wrap">
              <label>
                Last Name [A-Z,a-z]<span class="req">*</span>
              </label>
              <input type="text" autocomplete="off" name="lname" pattern="[A-Z,a-z]*"/>
            </div>
          </div>

          <div class="field-wrap">
            <label>
              Email Address (xyz@gmail.com)<span class="req">*</span>
            </label>
            <input type="email" autocomplete="off" name="Ename" />
          </div>
          
          <div class="field-wrap">
            <label>
              Password (0-9 and size-3-8)<span class="req">*</span>
            </label>
            <input type="password" autocomplete="off" name="password" />
          </div>
          
          <div class="field-wrap">
            <label>
              Conform Password<span class="req">*</span>
            </label>
            <input type="password" autocomplete="off" name="cpassword" />
          </div>

          <button type="submit" class="button button-block" name="submit1">Submit</button>
          
          </form>

        </div>
<?php 
include'db.php';
if(isset($_POST['Log']))
{ 
  $ename=$_POST['user_email'];
  $pass1=$_POST['user_pass'];
  if($ename=='')
  {
    echo"<script>alert('Please Enter Your Email Name')</script>";
  }
  if($pass1=='')
  {
    echo"<script>alert('Please Enter Your Password Name')</script>";
  }

  $sql = "SELECT * FROM login WHERE email = '$ename' and pass = '$pass1'";
  $record = mysqli_query($conn,$sql);
  $rowcount= mysqli_num_rows($record);
  if($rowcount==1)
  {
    $row=mysqli_fetch_array($record);
    $type=$row['user_type'];
    if($type=="admin")
    {
      session_start();
      $_SESSION['username']=$ename;
      header("Location:admin.php");
    }
    else
    {
      session_start();
      $_SESSION['email']=$ename;
      header("Location:search.php");
    }
  }
  else
  {
    echo'Invalide';
  }
     
}
 ?>
        <div id="login">   
          <h1>Welcome Back!</h1>
          
          <form  method="POST">
          
            <div class="field-wrap">
            <label>
              Email Address<span class="req">*</span>
            </label>
            <input type="email" name="user_email" autocomplete="off"/>
          </div>
          
          <div class="field-wrap">
            <label>
              Password<span class="req">*</span>
            </label>
            <input type="password"  name="user_pass" autocomplete="off"/>
          </div>
          
          <p class="forgot"><a href="#" style="color: white;">Forgot Password?</a></p>
          
          <input type="submit" name="Log" class="button button-block" value="Login">
          
          </form>

        </div>
        
    </div><!-- tab-content -->
      
</div> <!-- /form -->
<script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
<script src="js/index.js"></script>

</body>
</html>
