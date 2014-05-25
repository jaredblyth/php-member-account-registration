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
/* This is the logout page. It destroys the cookie. */

// Destroy the cookie, but only if it already exists:
if (isset($_COOKIE['Diggity'])) {
	setcookie('Diggity', FALSE, time()-300);
}

// Destroy the cookie, but only if it already exists:
if (isset($_COOKIE['Email'])) {
	setcookie('Email', FALSE, time()-300);
}

// Destroy the cookie, but only if it already exists:
if (isset($_COOKIE['Firstname'])) {
	setcookie('Firstname', FALSE, time()-300);
}


// Destroy the cookie, but only if it already exists:
if (isset($_COOKIE['Subdirectory'])) {
	setcookie('Subdirectory', FALSE, time()-300);
}

// Print a message:
echo '<p><h2><p align="center"><font color="red">You are now logged out.</font></p></h2><p>';

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