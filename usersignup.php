<?php 
session_start();
@$user=$_SESSION['username'];
@$donor=$_SESSION['donorname'];
 ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>HealthCare</title>
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
	  <h1 style="margin-left:100px; color:green"><a href="#"><span>USER</span> <small>SIGN UP</small></a></h1>
        <?php
	$found=0;
	$print=0;
	if(isset($_POST['usersubmit'])){
		$id=$_POST['username'];
	    $fname=$_POST['fname'];
		$lname=$_POST['lname'];
		$pass=$_POST['pass'];
	    $rpass=$_POST['rpass'];
		$blood=$_POST['blood'];
		$location=$_POST['location'];
	    $age=$_POST['age'];
		$phone=$_POST['phone'];
		//echo $id;
		//echo $fname;
		//echo $lname;
		//echo $pass;
		//echo $rpass;
		//echo $blood;
		//echo $location;
		//echo $age;
		//echo $phone;
		
	if(!empty($id) && !empty($fname) && !empty($lname)&& !empty($pass) && !empty($rpass) && !empty($blood)&& !empty($location) && !empty($age)&& !empty($phone)){
			if(strcmp($pass,$rpass)==''){
			$con=@mysqli_connect('localhost','root','','health') or die('Could Not Connect To Database');
			$query="INSERT INTO patient VALUES ('$id', '$pass', '$fname', '$lname', '$location', '$phone', '$age', '$blood');";
			$result=mysqli_query($con,$query) or die('<h3 style="margin-left:100px;color:red;">User Name Already Exist</h3>');
			echo '<h3 style="margin-left:100px;color:blue;">Registration Successful</h3>';}
			else{
				echo '<h3 style="margin-left:100px; color:red;">Password does not match</h3>';
		
			}
			
			}
			
		
		else{
		echo '<h3 style="margin-left:100px;color:red;">Please Insert All The Fields</h3>';
		}
	}
	?>

		<form action="#" method="post">
			   <input type="text" name="username" placeholder="User Name" class="signinfo" autofocus></input><br>
               <input type="text" name="fname" placeholder="First Name" class="signinfo"></input><br>
			   <input type="text" name="lname" placeholder="Last Name" class="signinfo"></input><br>
			   <input type="password" name="pass" placeholder="Enter Password" class="signinfo"></input><br>
			   <input type="password" name="rpass" placeholder="ReEnter Password" class="signinfo"></input><br>
			   <select name="blood" class="signinfo" >
               <option value="A+">A+ </option>
               <option value="B+">B+</option>
               <option value="O+">O+</option>
               <option value="AB+">AB+</option>
               <option value="A-">A- </option>
               <option value="B-">B-</option>
               <option value="O-">O-</option>
               <option value="AB-">AB-</option>
               </select>
			   </br>
			    <select name="location" class="signinfo">
               <option value="Dhanmondi">Dhanmondi </option>
               <option value="Mirpur">Mirpur</option>
               <option value="Gulshan">Gulshan</option>
               <option value="Motijheel">Motijheel</option>
               </select>
			   </br>
			   <input type="text" name="age" placeholder="Age" class="signinfo"></input></br>
			   <input type="text" name="phone" placeholder="Phone Number" class="signinfo"></input></br>
			   <input type="submit" name="usersubmit"value="Register" class="signinfo"></input>
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
