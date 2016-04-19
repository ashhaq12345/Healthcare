<? ob_start(); ?>
<?php
	session_start();
	@$_SESSION['username'];
	?>
	<?php 

@$user=$_SESSION['username'];
@$donor=$_SESSION['donorname'];
 ?>
<?php
	$found=0;
	$print=0;
	if(isset($_POST['usersubmit'])){
		$username=$_POST['username'];
	    $password=$_POST['password'];
		//echo $username;
		//echo $password;
		if(!empty($username) && !empty($password)){
			$con=@mysqli_connect('localhost','root','','health') or die('Could Not Connect To Database');
			$query="select patientusername,password from patient";
			$result=mysqli_query($con,$query) or die('Wrong Query');
			while($row=mysqli_fetch_array($result)){
				if(strcmp($username,$row['patientusername'])==0){
				$pass=$row['password'];
				$found=1;
				break;
				}
			}
			if($found==1){
				if(strcmp($pass,$password)==0){
				$_SESSION['donorname']='';
				$_SESSION['username']=$username;
				header("location:index.php");
				}
				else{
				$print=1;
				}
			}
			else{
			$print=2;
			}
			mysqli_close($con);
		}
		else{
		$print=3;
		}
	}
	?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<style>
.signinfo{
	margin-left:100px;
	margin-top:20px;
	height:30px;
	width:200px;
	border-top-left-radius:5px;
	border-top-right-radius:5px;
	border-bottom-left-radius:5px;
	border-bottom-right-radius:5px;
	border:1px solid black;
	font-size:15px;
	box-shadow:1px 1px 1px 1px black;
	
}
.signinfo:focus{
	width:220px;
	box-shadow:2px 2px 2px 2px blue;
}

</style>
<title>HealthCare

</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="css/style.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" type="text/css" href="css/coin-slider.css" />
<script type="text/javascript" src="js/cufon-yui.js"></script>
<script type="text/javascript" src="js/cufon-titillium-600.js"></script>
<script type="text/javascript" src="js/jquery-1.4.2.min.js"></script>
<script type="text/javascript" src="js/script.js"></script>
<script type="text/javascript" src="js/coin-slider.min.js"></script>
</head>
<body>
<div class="main">
  <div class="header">
    <div class="header_resize">
      <div class="searchform">
        <form id="formsearch" name="formsearch" method="post" action="#">
          <span>
          <input name="editbox_search" class="editbox_search" id="editbox_search" maxlength="80" value="Search our ste:" type="text" />
          </span>
          <input name="button_search" src="images/search.gif" class="button_search" type="image" />
        </form>
      </div>
      <div class="menu_nav">
        <ul>
          <li class="active"><a href="index.php"><span>Home</span></a></li>
          <li><a href="#"><span>Hospital</span></a></li>
          <li><a href="#"><span>Vaccination</span></a></li>
          <li><a href="#"><span>Services</span></a></li>
          <li><a href="contact.html"><span>Mail Us</span></a></li>
        </ul>
      </div>
      <div class="clr"></div>
      <div class="logo">
        <h1><a href="#"><span>Health Manager</span> <small>Your Health Our Care</small></a></h1>
      </div>
      <div class="clr"></div>
      <div class="slider">
        <div id="coin-slider"> <a href="#"><img src="images/baby.jpg" width="912" height="304" alt="" /> </a> <a href="#"><img src="images/slide2.jpg" width="912" height="304" alt="" /> </a> <a href="#"><img src="images/slide3.jpg" width="912" height="304" alt="" /> </a> </div>
        <div class="clr"></div>
      </div>
      <div class="clr"></div>
    </div>
  </div>
  <div class="content">
    <div class="content_resize">
      <div class="mainbar">
		<h1 style="margin-left:100px; color:green"><a href="#"><span>USER</span> <small>Log In</small></a></h1>
      	<?php
	if($print==1){
	echo '<h3 align="center" style="color:blue;">Incorrect Password</h3>';
	}else if($print==2){
	echo '<h3 align="center" style="color:blue;">Incorrect Username</h3>';
	}else if($print==3){
	echo '<h3 align="center" style="color:blue;">Fill In All The Field</h3>';
	}
	?>
	  <form action="userlogin.php" method="post">
			   <input type="text" name="username" placeholder="User Name" class="signinfo" autofocus></input><br>
               <input type="password" name="password" placeholder="Password" class="signinfo"></input><br>
			   <a href="usersignup.php" ><h3 style="margin-left:100px">Register</h3></a>
			   <input type="submit" name="usersubmit"value="Log In" class="signinfo"></input>
            </form>
      </div>
      <div class="sidebar">
        <div class="gadget">
          <h2 class="star"><span>Sidebar</span> Menu</h2>
          <div class="clr"></div>
          <ul class="sb_menu">
            <li><a href="index.php">Home</a></li>
            <li><a href="userlogin.php">User LogIn</a></li>
            <li><a href="usersignup.php">User SignUp</a></li>
            <li><a href="#">Donor LogIn</a></li>
            <li><a href="#">Donor SignUp</a></li>
            <li><a href="#">Admin LogIn</a></li>
          </ul>
        </div>
        <div class="gadget">
          
          <div class="clr"></div>
          <ul class="ex_menu">
            <li><a href="#">FAQ</a><br />
              </li>
            <li><a href="#">General Tips</a><br />
              </li>
            <li><a href="#">24/7 Care System</a><br />
              </li>
            <li><a href="#">Talk to a Doctor</a><br />
              </li>
            <li><a href="#">Child Care</a><br />
              </li>
            <?php 
			if(strcmp($user,'')!=0){
			echo '<li><a href="patientlogout.php">Patient Log Out</a><br /></li>';
			echo '<li><a href="patientrecord.php">Patient Record</a><br /></li>';
			echo '<li><a href="patientlogout.php">Enter your Problem</a><br /></li>';
			echo '<li><a href="patientlogout.php">Child vaccin</a><br /></li>';
			echo '<li><a href="patientlogout.php">Blood Request</a><br /></li>';
			}
			?>
            
          </ul>
        </div>
      </div>
      <div class="clr"></div>
    </div>
  </div>
  <div class="fbg">
    <div class="fbg_resize">
      <div class="col c1">
        <h2><span>Image</span> Gallery</h2>
        <a href="#"><img src="images/gal1.jpg" width="75" height="75" alt="" class="gal" /></a> <a href="#"><img src="images/gal2.jpg" width="75" height="75" alt="" class="gal" /></a> <a href="#"><img src="images/gal3.jpg" width="75" height="75" alt="" class="gal" /></a> <a href="#"><img src="images/gal4.jpg" width="75" height="75" alt="" class="gal" /></a> <a href="#"><img src="images/gal5.jpg" width="75" height="75" alt="" class="gal" /></a> <a href="#"><img src="images/gal6.jpg" width="75" height="75" alt="" class="gal" /></a> </div>
      <div class="col c2">
        <h2><span>Services</span> Overview</h2>
        <p>Curabitur sed urna id nunc pulvinar semper. Nunc sit amet tortor sit amet lacus sagittis posuere cursus vitae nunc.Etiam venenatis, turpis at eleifend porta, nisl nulla bibendum justo.</p>
        <ul class="fbg_ul">
          <li><a href="#">Lorem ipsum dolor labore et dolore.</a></li>
          <li><a href="#">Excepteur officia deserunt.</a></li>
          <li><a href="#">Integer tellus ipsum tempor sed.</a></li>
        </ul>
      </div>
      <div class="col c3">
        <h2><span>Contact</span> Us</h2>
        <p>Nullam quam lorem, tristique non vestibulum nec, consectetur in risus. Aliquam a quam vel leo gravida gravida eu porttitor dui.</p>
        <p class="contact_info"> <span>Address:</span> 1458 TemplateAccess, USA<br />
          <span>Telephone:</span> +8801683777887<br />
          <span>FAX:</span> +88029144003<br />
          <span>Others:</span> +8801753328289<br />
          <span>E-mail:</span> <a href="#">tarana.mms@gmail.com</a> </p>
      </div>
      <div class="clr"></div>
    </div>
  </div>
  <div class="footer">
    <div class="footer_resize">
      <p class="lf">Copyright &copy; <a href="http://www.facebook.com/swarnolota">Maksura and Co.</a>. All Rights Reserved</p>
      <p class="rf">Design by <a target="_blank" href="http://www.facebook.com/swarnolota">Tarana Mehzabeen</a></p>
      <div style="clear:both;"></div>
    </div>
  </div>
</div>
</body>
</html>
