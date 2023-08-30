<?php
session_start();

include 'includes/config.php';

	$Error ='';




if(isset($_POST['Submit']))
{
	
$Account_Number=mysqli_real_escape_string($dbConn,$_POST['Account_Number']);
$PIN_Code=mysqli_real_escape_string($dbConn,$_POST['PIN_Code']);




$query = mysqli_query($dbConn,"SELECT * FROM accounts WHERE Account_Number='$Account_Number' AND PIN_Code='$PIN_Code'"); 
		

if (mysqli_num_rows($query)>0)
{

$row=mysqli_fetch_array($query);
$A_ID=$row['ID'];
$C_ID=$row['Customer_ID'];
$_SESSION['C_Log'] = $C_ID;
$_SESSION['A_Log'] = $A_ID;




echo '<script language="JavaScript">
            document.location="Customer_Account/index";
        </script>';













	  

	
}
else
{




$Error = 'Error ... Please Check Account Number Or PIN Code !';
     
	  


}
}



?>
<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Fingerprint Based ATM System - FBATMS | Customer Login</title>

    <link href="css/bootstrap.min.css" rel="stylesheet">
	    <link href="css/plugins/bootstrap/bootstrap.min.css" rel="stylesheet">

    <link href="font-awesome/css/font-awesome.css" rel="stylesheet">

    <link href="css/animate.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
	        	<link rel="shortcut icon" href="img/icon.png"/>
	
	<style>
@font-face {
   font-family: myFirstFont;
   src: url(fonts/NotoKufiArabic-Regular.ttf);
   font-size:8px;
}
body {
   font-family: myFirstFont;
}






</style>





</head>

<body class="white-bg" class="" style="background-color:#fff">

    <div class="middle-box text-center loginscreen animated fadeInDown">
        <div>
            <div>
            
       
                <img src="img/logo.png" class="img-rounded" width="80%"/>

            </div>
                    <h2 class="font-bold">Customer Account Login</h2>
            
            </p>
            <form class="m-t" role="form" method="post" action="Customer_Account_Login.php">
                <div class="form-group">
                   Account Number <input type="text" class="form-control" placeholder="Account Number" name="Account_Number" required="">
                </div>
				



                <div class="form-group">
                  PIN Code  <input type="password" id="password" class="form-control" placeholder="PIN Code" name="PIN_Code" required="">

				</div>
					
                <button type="submit" name="Submit" class="btn btn-primary block full-width m-b">Enter</button>
                <button type="reset" name="Reset" class="btn btn-danger block full-width m-b">Clear</button>
			
				<font style="color:red"><?php echo $Error; ?></font>
				
				
			   </div>

			</form>




        </div>
    </div>

    <!-- Mainly scripts -->
    <script src="js/jquery-2.1.1.js"></script>
    <script src="js/bootstrap.min.js"></script>

</body>

</html>



