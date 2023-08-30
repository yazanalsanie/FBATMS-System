<?php
session_start();

$S_ID=$_GET['S_ID'];

require_once('includes/config.php');


mysqli_query($dbConn,"delete from staff where ID='$S_ID'");

	  
echo "<script language='JavaScript'>
			  alert ('This Staff Has Been Deleted Successfully !');
      </script>";
	  

	echo "<script language='JavaScript'>
document.location='Manage_Staff';
        </script>";

?>