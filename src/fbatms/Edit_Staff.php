<?php
session_start();

include("includes/config.php"); 



$S_ID = $_GET['S_ID'];



$sql1 = mysqli_query($dbConn,"select * from staff where ID='$S_ID'");
$row1 = mysqli_fetch_array($sql1);


$Name = $row1['Name'];
$Username = $row1['Username'];
$Password = $row1['Password'];





if(isset($_POST['Submit']))
{

$S_ID = mysqli_real_escape_string($dbConn,$_POST['S_ID']);
$Name = mysqli_real_escape_string($dbConn,$_POST['Name']);
$Username = mysqli_real_escape_string($dbConn,$_POST['Username']);
$Password = mysqli_real_escape_string($dbConn,$_POST['Password']);
$Status = mysqli_real_escape_string($dbConn,$_POST['Status']);


$sql1 = mysqli_query($dbConn,"select * from staff where Username='$Username' AND ID!='$S_ID'");
if (mysqli_num_rows($sql1)>0){
	
	
echo "<script language='JavaScript'>
			  alert ('Sorry ... This Username Already Used ! !');
      </script>";
	
}else{

$update = mysqli_query($dbConn,"update staff set Password='$Password', Username='$Username', Name='$Name', Status='$Status' where ID='$S_ID'");



echo "<script language='JavaScript'>
			  alert ('Staff Information Has Been Updated !');
      </script>";

	echo "<script language='JavaScript'>
document.location='Manage_Staff';
        </script>";

}
}

?>
<html>

<head>


    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <title>Fingerprint Based ATM System - FBATMS | Edit Staff</title>

   <link href="css/bootstrap.min.css" rel="stylesheet">
	    <link href="css/plugins/bootstrap/bootstrap.min.css" rel="stylesheet">

    <link href="font-awesome/css/font-awesome.css" rel="stylesheet">
	    <link href="css/plugins/dataTables/datatables.min.css" rel="stylesheet">


    <!-- Toastr style -->
    <link href="css/plugins/toastr/toastr.min.css" rel="stylesheet">

    <!-- Gritter -->
    <link href="js/plugins/gritter/jquery.gritter.css" rel="stylesheet">

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

<body style="back">
    <div id="wrapper">
        


       
         <div class="row wrapper border-bottom white-bg page-heading">
                <div class="col-lg-12">
                  <center>  <h2>Fingerprint Based ATM System - FBATMS - Edit Staff</h2></center>
                    
                </div>
                
				  <center><a href="Manage_Staff" class="btn btn-primary">Manage Staff</a>
				
				
				
            </div>
            
 <div class="wrapper wrapper-content animated fadeInRight">
            <div class="row">
                <div class="col-lg-12">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>Edit Staff </h5>
                        <div class="ibox-tools">
                            
                          
                           
                        </div>
                    </div>
                   
                        
                        
                        
                        
                          <div class="ibox-content">

                  
                  
                  
                  
                     <form method="post" action="Edit_Staff?S_ID=<?php echo $S_ID; ?>" class="form-horizontal" enctype="multipart/form-data">
                                
											<input type="hidden" name="S_ID" value="<?php echo $S_ID; ?>"/>
				
								
						

								
								
								
								
								 <div class="form-group"><label class="col-sm-2 control-label">Name *</label>

                                    <div class="col-sm-10"><input value="<?php echo $Name; ?>"  type="text" name="Name" class="form-control" required></div>
                                </div>
                                <div class="hr-line-dashed"></div>
								
								
								
								
								
								
								 <div class="form-group"><label class="col-sm-2 control-label">Username *</label>

                                    <div class="col-sm-10"><input value="<?php echo $Username; ?>"  type="text" name="Username" class="form-control" required></div>
                                </div>
                                <div class="hr-line-dashed"></div>
								
								
								
								
								 <div class="form-group"><label class="col-sm-2 control-label">Password *</label>

                                    <div class="col-sm-10"><input value="<?php echo $Password; ?>"  type="password" name="Password" class="form-control" required></div>
                                </div>
                                <div class="hr-line-dashed"></div>
								
								
								
								<div class="form-group"><label class="col-sm-2 control-label">Status *</label>

                                    <div class="col-sm-10">
									
									
		<select name="Status" class="form-control" required>
			<option value="<?php echo $Status; ?>"><?php echo $Status; ?></option>
	
		<option value="Active">Active</option>
		<option value="Deactive">Deactive</option>
		
		
		</select>
		</div>
                                
								
								
								</div>
                                <div class="hr-line-dashed"></div>
								
								
								
								
								
                                
                                <div class="form-group">
                                    <div class="col-sm-8 col-sm-offset-2">
																	<center>	                                        <button class="btn btn-primary" type="submit" name="Submit">Edit</button>

									<button class="btn btn-danger" type="reset" name="Reset">Clear</button>

                                    </div>
                                </div>
                            </form>
                  
     
                        </div>

						
                        
                    </div>
                </div>
             
                 </div> </div>
               
            </div>
        </div>

        </div>
       



        </div>
    </div>

   <!-- Mainly scripts -->
    <script src="js/jquery-2.1.1.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/plugins/metisMenu/jquery.metisMenu.js"></script>
    <script src="js/plugins/slimscroll/jquery.slimscroll.min.js"></script>

    <!-- Flot -->
    <script src="js/plugins/flot/jquery.flot.js"></script>
    <script src="js/plugins/flot/jquery.flot.tooltip.min.js"></script>
    <script src="js/plugins/flot/jquery.flot.spline.js"></script>
    <script src="js/plugins/flot/jquery.flot.resize.js"></script>
    <script src="js/plugins/flot/jquery.flot.pie.js"></script>

    <!-- Peity -->
    <script src="js/plugins/peity/jquery.peity.min.js"></script>
    <script src="js/demo/peity-demo.js"></script>

    <!-- Custom and plugin javascript -->
    <script src="js/inspinia.js"></script>
    <script src="js/plugins/pace/pace.min.js"></script>

    <!-- jQuery UI -->
    <script src="js/plugins/jquery-ui/jquery-ui.min.js"></script>

    <!-- GITTER -->
    <script src="js/plugins/gritter/jquery.gritter.min.js"></script>

    <!-- Sparkline -->
    <script src="js/plugins/sparkline/jquery.sparkline.min.js"></script>

    <!-- Sparkline demo data  -->
    <script src="js/demo/sparkline-demo.js"></script>

    <!-- ChartJS-->
    <script src="js/plugins/chartJs/Chart.min.js"></script>

    <!-- Toastr -->
    <script src="js/plugins/toastr/toastr.min.js"></script>


      
    <script src="js/plugins/jeditable/jquery.jeditable.js"></script>

    <script src="js/plugins/dataTables/datatables.min.js"></script>
    <!-- Page-Level Scripts -->
    <script>
        $(document).ready(function(){
            $('.dataTables-example').DataTable({
                dom: '<"html5buttons"B>lTfgitp',
                buttons: [
                   
 
 /*                   {extend: 'excel', title: 'ExampleFile'},
                    {extend: 'pdf', title: 'ExampleFile'},

                    {extend: 'print',
                     customize: function (win){
                            $(win.document.body).addClass('white-bg');
                            $(win.document.body).css('font-size', '10px');

                            $(win.document.body).find('table')
                                    .addClass('compact')
                                    .css('font-size', 'inherit');
                    }
                    }    */
                   
                ]

            });

            /* Init DataTables */
            var oTable = $('#editable').DataTable();

            /* Apply the jEditable handlers to the table */
            oTable.$('td').editable( 'example_ajax', {
                "callback": function( sValue, y ) {
                    var aPos = oTable.fnGetPosition( this );
                    oTable.fnUpdate( sValue, aPos[0], aPos[1] );
                },
                "submitdata": function ( value, settings ) {
                    return {
                        "row_id": this.parentNode.getAttribute('id'),
                        "column": oTable.fnGetPosition( this )[2]
                    };
                },

                "width": "90%",
                "height": "100%"
            } );


        });

        function fnClickAddRow() {
            $('#editable').dataTable().fnAddData( [
                "Custom row",
                "New row",
                "New row",
                "New row",
                "New row" ] );

        }
    </script>
</body>
</html>
