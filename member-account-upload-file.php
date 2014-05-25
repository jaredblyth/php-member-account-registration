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


<?php include("member-registration/functions-members-accounts.php"); ?>




<?php include("member-registration/member-account-details.php"); ?>


<div id="menu">
<?php include("menu.php"); ?>
</div>




<div id="content">
<?php include("plugin01.php"); ?>


<p align="left">



<?php //
/* This script displays and handles an HTML form. This script takes a file upload and stores it on the server. */

if ($_SERVER['REQUEST_METHOD'] == 'POST') { // Handle the form.

	// Try to move the uploaded file:
	if (move_uploaded_file ($_FILES['the_file']['tmp_name'], "members/{$_COOKIE["Subdirectory"]}/{$_FILES['the_file']['name']}")) {
	
		print '<p>Your file has been uploaded.</p>';
	
	} else { // Problem!

		print '<p style="color: red;">Your file could not be uploaded because: ';
		
		// Print a message based upon the error:
		switch ($_FILES['the_file']['error']) {
			case 1:
				print 'The file exceeds the upload_max_filesize setting in php.ini';
				break;
			case 2:
				print 'The file exceeds the MAX_FILE_SIZE setting in the HTML form';
				break;
			case 3:
				print 'The file was only partially uploaded';
				break;
			case 4:
				print 'No file was uploaded';
				break;
			case 6:
				print 'The temporary folder does not exist.';
				break;
			default:
				print 'Something unforeseen happened.';
				break;
		}
		
		print '.</p>'; // Complete the paragraph.

	} // End of move_uploaded_file() IF.
	
} // End of submission IF.

// Leave PHP and display the form:
?>

<form action="member-account-upload-file.php" enctype="multipart/form-data" method="post">
	<p>Upload a file:</p>
	<input type="hidden" name="MAX_FILE_SIZE" value="300000" />
	<p><input type="file" name="the_file" /></p>
	<p><input type="submit" name="submit" value="Upload This File" /></p>
</form>


<p align="left"><a href="member-account.php">Back to account homepage</a>


<?php
// So image titles display with full absolute URLs:
 include("client.php");
?>







<?php
// So image titles display with full absolute URLs:
 include("file_library.php");
?>



</p>


		


<?php include("plugin02.php"); ?>
</div>






<div id="sidebar">
<?php include("sidebar.php"); ?>
</div>




<div id="footer">
<?php include("footer.php"); ?>

<p align="left"><a href="member-account.php">Back to account homepage</a>

</div>



</div>

</body>
</html>