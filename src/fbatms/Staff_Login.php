<?php
session_start();

include 'includes/config.php';

	$Error ='';




if(isset($_POST['Submit']))
{
	
$Username=mysqli_real_escape_string($dbConn,$_POST['Username']);
$Password=mysqli_real_escape_string($dbConn,$_POST['Password']);




$query = mysqli_query($dbConn,"SELECT * FROM staff WHERE Username='$Username' AND Password='$Password'"); 
		

if (mysqli_num_rows($query)>0)
{

$row=mysqli_fetch_array($query);
$S_ID=$row['ID'];
$_SESSION['S_Log'] = $S_ID;




echo '<script language="JavaScript">
            document.location="Staff/index";
        </script>';













	  

	
}
else
{




$Error = 'Error ... Please Check Staff Username Or Password !';
     
	  


}
}



?>
<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Fingerprint Based ATM System - FBATMS | Staff Login</title>

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
                    <h2 class="font-bold">Staff Login</h2>
            
            </p>
            <form class="m-t" role="form" method="post" action="Staff_Login">
                <div class="form-group">
                   Username <input type="text" class="form-control" placeholder="Username" name="Username" required="">
                </div>
				



                <div class="form-group">
                  Password  <input type="password" id="password" class="form-control" placeholder="Password" name="Password" required="">

				</div>
					
                <button type="submit" name="Submit" class="btn btn-primary block full-width m-b">Login</button>
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



