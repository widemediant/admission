<?php

    session_start();
    error_reporting(0);

$con=mysqli_connect("localhost","root","","oas");
$q=mysqli_query($con,"select s_name from t_user_data where s_id='".$_SESSION['user']."'");
$n=  mysqli_fetch_assoc($q);
$stname= $n['s_name'];
$id=$_SESSION['user'];

$result = mysqli_query($con,"SELECT * FROM t_user WHERE s_id='".$_SESSION['user']."'");
                    
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
        <link type="text/css" rel="stylesheet" href="css/admform.css"></link>
        
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
    <body>
        <div class="container-fluid">
                            <div class="row">
                               <div class="col-sm-10.1">
      <center>  <table class="table table-bordered" style="font-family: Verdana">
                
                <tr>
                 <td style="width:3%;"><br><br><img src="./images/Logo-T.gif" width="50%"> </td>
                 <td style="width:8%;"><center><font style="font-family:Arial Black; font-size:20px;">
                     <br><br>
                    KWA KALUSYA SECONDARY SCHOOL, P.O BOX 26 - 90100, MACHAKOS, KENYA</font></center>
                
                <center><font style="font-family:Verdana; font-size:18px;">
                    Phone : (0674)2492496, Fax : (0674)2490480
                    </font></center>
                
                <br>
                <br>
                <center><font style="font-family:Arial Black; font-size:16px;">
                    ADMISSIONS (2024-2025)</font></center>
                </td>
                    <td colspan="2" width="2%" >
                   <?php
                  
                    $picfile_path ='studentpic/';
                    
                    $result1 = mysqli_query($con,"SELECT * FROM t_userdoc where s_id='".$_SESSION['user']."'");
                        
                    while($row1 = mysqli_fetch_array($result1))
                      {                  
                        $picsrc=$picfile_path.$row1['s_pic'];
                        
                        echo "<img src='$picsrc.' class='img-thumbnail' width='140px' style='height:140px;'>";
                        echo"<div>";
                      }
                      
                    
                      
                      
                        $resdata = mysqli_query($con,"SELECT * FROM t_user_data WHERE s_id='".$_SESSION['user']."'");
                    
                    while($rowdata = mysqli_fetch_array($resdata))
                      {
                        
                    
                   ?>
                        </td>
                 </tr>       
                 
                 <tr>
                 <td style="width:4%;"> <font style="font-family: Verdana;">Name  </font> </td>
                    <td style="width:8%;" colspan="3"> <?php echo $stname;?> </td>
                 </tr>
                 
                 
                <tr>
                    <td> <font style="font-family: Verdana;">ID  </font> </td>
                    <td colspan="3"> <?php echo $id ?> </td>
                </tr>
                  
                
                <tr>
                    <td> <font style="font-family: Verdana;">Date of Birth  </font> </td>
                    <td colspan="3"> <?php echo $rowdata[2] ?> </td>
                </tr>
                
                <tr>
                    <td> <font style="font-family: Verdana;">Email  </font> </td>
                      <td colspan="3"> <?php echo $rowdata[4]  ?> </td>
                </tr>
                  <?php
                      }
                      ?>
                
                
                  <tr>
                    <td > <font style="font-family: Verdana;"> Mobile No.</font>  </td>
                    <td colspan="3"> <?php echo 'Telephone - '. $row[2]. '   ' ?> | 
                    <?php echo ' Mobile - '.$row[3] ?></td>
                  </tr>
                
                  <tr>
                    <td><font style="font-family: Verdana;"> Father's Name</font></td>
                    <td  colspan="3"><?php echo $row[4] ?> </td>
                   </tr>
                 
                  <tr>
                    <td> <font style="font-family: Verdana;">Father's Occupation</font></td>
                    <td> <?php echo $row[5] ?></td>
                    <td><font style="font-family: Verdana;"> Mobile No.</font></td>
                    <td> <?php echo $row[6] ?> </td>
                  </tr>
                
                <tr>
                    <td> <font style="font-family: Verdana;">Mother's Name</font> </td>
                    <td colspan="3"> <?php echo $row[7] ?></td>
                </tr>
                
                <tr>
                    <td> <font style="font-family: Verdana;">Mother's Occupation</font></td>
                    <td> <?php echo $row[8] ?> </td>
                     <td> <font style="font-family: Verdana;">Mobile No.</font></td>
                    <td> <?php echo $row[9] ?></td>
                </tr>
                
                <tr>
                    <td><font style="font-family: Verdana;"> Income of Parents </font>
                     <td  colspan="3"><?php echo $row[10] ?></td>
                </tr>
                
                <tr>
                    <td> <font style="font-family: Verdana;">Sex </font>
                    <td colspan="3"><?php echo $row[11] ?></td><br>
                </tr>
                <tr>
                <td> <font style="font-family: Verdana;">Form </font>
                <td colspan="3"><?php echo $row[23] ?></td><br>
                </tr>
                
                <tr>
                    <td><font style="font-family: Verdana;"> Correspondent Address</font>
                    <td colspan="3"><?php echo 'Address :'. $row[12] ?><br>
                          <?php echo 'State :'. $row[13] ?> | <?php echo 'Pin :'. $row[14] ?> | <?php echo 'Mobile :'. $row[15] ?><br>
                </td>
                
                <tr>
                    <td> <font style="font-family: Verdana;">Permanent Address</font>
                    <td colspan="3"><?php echo 'Address :'. $row[16] ?><br>
                          <?php echo 'State :'. $row[17] ?> |
                          <?php echo 'Pin :'. $row[18] ?> |
                          <?php echo 'Mobile :'. $row[19] ?><br>
                </td>
                </tr>   
               
                <tr>
                    <td> <font style="font-family: Verdana;">From</font>
                    <td colspan="3">  <?php echo  $row[20] ?>
                </td>
                </tr>  
                                
                <tr>
                    <td><font style="font-family: Verdana;"> Nationality</font>
                    <td> <?php echo $row[21] ?></td>
                    <td><font style="font-family: Verdana;"> Religion</font>
                    <td> <?php echo $row[22] ?></td>
                </tr>    
                           
                 <tr>
                    <td><font style="font-family: Verdana;">Mode of Payment</font></td>
                               
                    <td colspan="2"><?php echo $row[46] ?></td>
                               
                    <td colspan="2">
                    <center><font style="font-family: Verdana;">Signature</font></center> 
                    </td>
                     </tr>
                       </table></center>
                               </div>
                            </div>
            </div>
        <?php
              }
        ?>
             <center> <input type="submit" id="print" class="toggle btn btn-primary" value="Print" onclick="printpage();">
             <a href="logout.php">Logout</a> | <a href="homepageuser.php">Dashboard</a></center>
    </body>
</html>


                     