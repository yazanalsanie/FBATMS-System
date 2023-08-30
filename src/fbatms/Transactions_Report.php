<?php
session_start();

include("includes/config.php");





?>
<!DOCTYPE html>
<html>

<head>


    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <title>Fingerprint Based ATM System - FBATMS | Transactions Report</title>

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
                  <center>  <h2>Fingerprint Based ATM System - FBATMS - Transactions Report</h2></center>
                    
                </div>
                
				
				
            </div>

 <div class="wrapper wrapper-content animated fadeInRight">
            <div class="row">
                <div class="col-lg-12">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>Transactions Report List Information </h5>
                        <div class="ibox-tools">



                        </div>
                    </div>





                          <div class="ibox-content">



                      <div class="table-responsive">
                    <table class="table table-striped table-bordered table-hover dataTables-example" >
                    <thead>
                    <tr>

                        <th>Customer Name</th>
                        <th>Account Number</th>
                        <th>Type</th>
                        <th>Amount</th>
                        <th>Status</th>
                        <th>Add Date / Time</th>
                     
                    </tr>
                    </thead>
                    <tbody>
                   <?php
					$sql1 = mysqli_query($dbConn,"select * from transactions order by ID DESC");
					while ($row1 = mysqli_fetch_assoc($sql1)){
						
						$T_ID = $row1['ID'];
						$Customer_ID = $row1['Customer_ID'];
						$Account_ID = $row1['Account_ID'];
						$Amount = $row1['Amount'];
						$Type = $row1['Type'];
						$Status = $row1['Status'];
						$Add_Date_Time = $row1['Add_Date_Time'];
					
					$sql2 = mysqli_query($dbConn,"select * from customers where ID='$Customer_ID'");
					$row2 = mysqli_fetch_array($sql2);
					$C_Name = $row2['Name'];
					
					$sql3 = mysqli_query($dbConn,"select * from accounts where ID='$Account_ID'");
					$row3 = mysqli_fetch_array($sql3);
					$Account_Number = $row3['Account_Number'];				
				

					?>
                    <tr class="grade">
                        <td><?php echo $C_Name; ?></td>
                        <td><?php echo $Account_Number; ?></td>
                        <td><?php echo $Type; ?></td>
                        <td><?php echo $Amount; ?></td>
                        <td><?php echo $Status; ?></td>
                        <td><?php echo $Add_Date_Time; ?></td>
                     
                       
              
     
 
 </tr>

                    <?php
					}
					?>


                    </tbody>

                    </table>
                        </div>







                        </div>
						
					



                    </div>
                </div>

   </div>   </div>
               
         
        </div>

       
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


      

    <script src="js/plugins/dataTables/datatables.min.js"></script>
    <!-- Page-Level Scripts -->
    <script>
        $(document).ready(function(){
            $('.dataTables-example').DataTable({
                dom: '<"html5buttons"B>lTfgitp',
                buttons: [
                   
 
                    {extend: 'excel', title: 'System Analysis Report'},
                    {extend: 'pdf', title: 'System Analysis Report'},

                    {extend: 'print',
                     customize: function (win){
                            $(win.document.body).addClass('white-bg');
                            $(win.document.body).css('font-size', '10px');

                            $(win.document.body).find('table')
                                    .addClass('compact')
                                    .css('font-size', 'inherit');
                    }
                    }    
                   
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

      
    </script>
   
</body>
</html>
