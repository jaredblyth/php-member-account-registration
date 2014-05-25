<?php ob_start(); ?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
	"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">

<head>

<!--This dynamic website template was written by Jared Blyth in 2012. It incorporates HTML, CSS, Javascript and PHP. Please visit my site at www.jaredblyth.com for more information.-->

	<meta http-equiv="content-type" content="text/html; charset=utf-8" />


<?php include("stylesheet.php"); ?>



<Title>

<?php include("page_index.php"); ?>

</Title>




<?php include("head.php"); ?>





</head>





<body>

<div id="page-background">
<?php include("background_image.php"); ?>
</div>




<div id="container">




<div id="header">
<?php include("header.php"); ?>
</div>





<div id="widemenu">
<?php include("wide_menu.php"); ?>
</div>





<div id="menu">
<?php include("menu.php"); ?>
</div>




<div id="content">
<?php include("plugin01.php"); ?>


<?php // 
/* This page lets users log into their account. */

// Set two variables with default values:
$loggedin = false;
$error = false;



// Check if the form has been submitted:
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

include("mysql_connect.php");



	// Handle the form:
	if (!empty($_POST['email']) && !empty($_POST['password'])) {


	// Define the query.
	$query = "SELECT member_id, first_name, member_email, member_password, member_subdirectory FROM members WHERE member_email='{$_POST['email']}'";
	if ($r = mysql_query($query, $dbc)) { // Run the query.
	
		$row = mysql_fetch_array($r); // Retrieve the information.



$useremail = $row['member_email'];
$userpassword = $row['member_password'];
$userid = $row['member_id'];
$userfirstname = $row['first_name'];
$usersubdirectory = $row['member_subdirectory'];

	}
		if ( (strtolower($_POST['email']) == $useremail) && ($_POST['password'] == $userpassword) ) { // Correct!
	
			// Create the login cookie:
			setcookie('Diggity', 'Jones', time()+3600);

			// Create the personalisation cookies:
			setcookie('Email', $useremail, time()+3600);
			setcookie('Firstname', $userfirstname, time()+3600);
			setcookie('Subdirectory', $usersubdirectory, time()+3600);
			
			// Indicate they are logged in:
			$loggedin = true;
		
		} else { // Incorrect!

			$error = '<p align="center">The submitted email address and password do not match those on file!</p>';

		}

	} else { // Forgot a field.

		$error = '<p align="center">Please make sure you enter both an email address and a password!</p>';

	}
	mysql_close($dbc); // Close the connection.
}



// Print an error if one exists:
if ($error) {
	print '<p class="error">' . $error . '</p>';
}

// Indicate the user is logged in and then redirect to members page, or show the form:
if ($loggedin) {
	
	print '<p align="center">You are now logged in!</p>';


	header('Location: /member-account.php'); 


	
} else {

	print '<p><div align="center"><h2>Member Login</h2>
	<form action="member-account-login.php" method="post">
	<p><label>Email <input type="text" name="email" /></label></p>
	<p><label>Password <input type="password" name="password" /></label></p>
	<p><input type="submit" name="submit" value="Log In!" /></p>
	</form><br/><a href="member-register.php" "title="Register so that you can access our members area and take advantage of our special features."><b>Register</a> as a member</b><p><p></div>';

} 


?>



<?php include("plugin02.php"); ?>
</div>






<div id="sidebar">
<?php include("sidebar.php"); ?>
</div>




<div id="footer">
<?php include("footer.php"); ?>
</div>



</div>

</body>
</html>

<?php ob_end_flush(); ?>