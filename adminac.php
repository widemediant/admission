<?php
error_reporting(0);
$getid= $_GET["id"];
$con=mysqli_connect("localhost","root","","oas");
if(!isset($con))
{
    die("Database Not Found");
}


$q=mysqli_query($con,"select s_name from t_user_data where s_id='".$getid."'");
$n=  mysqli_fetch_assoc($q);
$stname= $n['s_name'];

$p=mysqli_query($con,"select s_signupdate from t_user_data where s_id='".$getid."'");
$m=  mysqli_fetch_assoc($p);
$stsignupdate= $m['s_signupdate'];

$t=mysqli_query($con,"select s_cadr from t_user where s_id='".$getid."'");
$v=  mysqli_fetch_assoc($t);
$stadm= $v['s_cadr'];

$result = mysqli_query($con,"SELECT * FROM t_user WHERE s_id='".$getid."'");
                    
                    while($row = mysqli_fetch_array($result))
                      {

?>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title></title>
        
         <link rel="stylesheet" href="bootstrap/bootstrap.min.css">
         <link rel="stylesheet" href="bootstrap/bootstrap-theme.min.css">
       <script src="bootstrap/jquery.min.js"></script>
        <script src="bootstrap/bootstrap.min.js"></script>
        
        <script type="text/javascript">
            function printpage()
            {
            var printButton = document.getElementById("print");
            printButton.style.visibility = 'hidden';
            window.print()
             printButton.style.visibility = 'visible';
             }
        </script>
        
    </head>
    <body style="background-image:url(./images/inbg.jpg) ">
      <form id="adminac" action="adminac.php" method="post">
            
          <div class="container-fluid">
                            <div class="row">
                               <div class="col-sm-8">
      <center>  <table class="table table-bordered" style="font-family: Verdana">
                
                <tr>
                 <td style="width:6%;"><center><img src="./images/Logo-T.gif" width="50%"></center></td>
                 <td style="width:8%;"><center><font style="font-family:Arial Black; font-size:20px;">
                 KWA KALUSYA SECONDARY SCHOOL, P.O BOX 26 - 90100, MACHAKOS, KENYA</font></center>
                
                <center><font style="font-family:Verdana; font-size:18px;">
                    Phone : (0674)2492496, Fax : (0674)2490480
                    </font></center>
                <center><font style="font-family:Arial Black; font-size:16px;">
                ADMISSION  CARD (2024-25)</font></center>
                </td>
                    <td colspan="2" width="3%" >
                        <?php
                  
                    $picfile_path ='studentpic/';
                    
                    $result1 = mysqli_query($con,"SELECT * FROM t_userdoc where s_id='".$getid."'");
             
                    while($row1 = mysqli_fetch_array($result1))
                      {                  
                        $picsrc=$picfile_path.$row1['s_pic'];
                        
                        echo "<img src='$picsrc.' class='img-thumbnail' width='180px' style='height:180px;'>";
                        echo"<div>";
                      }
                   ?>
                        </td>
                 </tr> 
                 <tr>
                 <td style="width:4%;"> <font style="font-family: Verdana;">Adm Date</font> </td>
                    <td style="width:8%;" colspan="3"><font style="font-family: Verdana; font-weight: bold">
                    <?php echo $stsignupdate ?>   </font> </td>
                 </tr>
                 
                 <tr>
                 <td style="width:4%;"> <font style="font-family: Verdana;">Adm No </font> </td>
                    <td style="width:8%;" colspan="3"> <font style="font-family: Verdana; font-weight: bold">
                    <?php echo $stadm ?>    </font></td>
                 </tr>
                 
                <tr>
                    <td> <font style="font-family: Verdana;">Online ID. </font> </td>
                    <td colspan="3"><font style="font-family: Verdana; font-weight: bold">
                     <?php echo $getid ?></font> </td>
                </tr>
                
                <tr>
                 <td style="width:4%;"> <font style="font-family: Verdana;">Name  </font> </td>
                    <td style="width:8%;" colspan="3"><font style="font-family: Verdana; font-weight: bold">
                     <?php echo $stname;?></font> </td>
                 </tr>
                 <tr>
                 <td style="width:4%;"> <font style="font-family: Verdana;">Form </font>
                 <td style="width:8%;" colspan="3"><font style="font-family: Verdana; font-weight: bold">
                <?php echo $row[23] ?></font></td>
                </tr>
                <?php
                }
                ?>
                 
                    </table>
                </div>
             </div>
          </div>
          
          <font style="margin-left: 40px; margin-right: 100px; font-family: Verdana; font-weight: bold; font-size: 16px;"> Instructions to the Candidate</font><br>
          <font style="font-family: Verdana;  font-size: 10px;"> 
            <p style="margin-left: 40px; margin-right: 100px; font-family: Verdana;">
                1. This Admit Card must be presented for verification at the time of examination,<br> along with at least one
                   original(not photocopied or scanned copy) of National ID
            </p>
            
            <p style="margin-left: 40px; margin-right: 100px; font-family: Verdana;">
                2. This Admit Card is valid only if the candidate's photograph and signature images<br> are <b> legibly printed</b>.
                   Print this on an A4 sized paper using a laser printer<br> preferably a color photo printer.
            </p>
          </font>
          
          <input type="button" id="print" class="toggle btn btn-primary" value="Print" onclick="printpage();">
          <a href="adlogout.php">Logout</a> | <a href="admin.php">Dashboard</a>
          </font>
      </form>
    </body>
</html>
