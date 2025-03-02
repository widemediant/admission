<?php
    session_start();
    error_reporting(0);

    
    
    $detid=$_REQUEST["detid"];
    $uphn1 =$_REQUEST["uphn1"];
    $uphn2 =$_REQUEST["uphn2"];
    
    $ufname =$_REQUEST["ufname"];
    $ufocc=$_REQUEST["ufocc"];
    $ufphn=$_REQUEST["ufphn"];
    
    $umname=$_REQUEST["umname"];
    $umocc=$_REQUEST["umocc"];
    $umphn=$_REQUEST["umphn"];
    
    $inc=$_REQUEST["inc"];
    $gen=$_REQUEST["gen"];
    
    $cadr=$_REQUEST["cadr"];
    $cast=$_REQUEST["cast"];
    $capin=$_REQUEST["capin"];
    $camob=$_REQUEST["camob"];
    
    $padr=$_REQUEST["padr"];
    $past=$_REQUEST["past"];
    $papin=$_REQUEST["papin"];
    $pamob=$_REQUEST["pamob"];
    
    $rur=$_REQUEST["rur"];
    $natn=$_REQUEST["natn"];
    $relg=$_REQUEST["relg"];
    $catg=$_REQUEST["catg"];
    $oaco=$_REQUEST["oaco"];
    $oarank=$_REQUEST["oarank"];
    $oaroll=$_REQUEST["oaroll"];
    $oabrn=$_REQUEST["oabrn"];
    $brnc=$_REQUEST["brnc"];
    $col=$_REQUEST["col"];
    $cen=$_REQUEST["cen"];
    $crsty=$_REQUEST["crsty"];
    $pcm=$_REQUEST["pcm"];
    
    $nob1=$_REQUEST["nob1"];
    $yop1=$_REQUEST["yop1"];
    $tm1=$_REQUEST["tm1"];
    $mo1 =$_REQUEST["mo1"];
    $divs1=$_REQUEST["divs1"];
    $pom1  =$_REQUEST["pom1"];
    
    $nob2  =$_REQUEST["nob2"];
    $yop2=$_REQUEST["yop2"];
    $tm2=$_REQUEST["tm2"];
    $mo2  =$_REQUEST["mo2"];
    $divs2  =$_REQUEST["divs2"];
    $pom2  =$_REQUEST["pom2"];
   
    
    $moi  = $_REQUEST["moi"];
    $pay= $_REQUEST["pay"];
    
    $con=mysqli_connect("localhost","root","","oas");
    
    
    if(!isset($con))
    {
        die("Database Not Found");
    }
    
    
    if(isset($_REQUEST["frmnext"]))
    {
        if($detid== "")
        $detid = DetCode();
        $sql  = "insert into t_user values(";
        $sql .= "'" . $detid . "',";
        $sql .= "'" . $_SESSION['user'] ."',";
        $sql .= "'" . $uphn1 . "',";
        $sql .= "'" . $uphn2 . "',";
        $sql .= "'" . $ufname . "',";
        $sql .= "'" . $ufocc . "',";
        $sql .= "'" . $ufphn . "',";
        $sql .= "'" . $umname . "',";
        $sql .= "'" . $umocc . "',";
        $sql .= "'" . $umphn . "',";
        $sql .= "'" . $inc . "',";
        $sql .= "'" . $gen . "',";
        $sql .= "'" . $cadr . "',";
        $sql .= "'" . $cast . "',";
        $sql .= "'" . $capin . "',";
        $sql .= "'" . $camob . "',";
        $sql .= "'" . $padr . "',";
        $sql .= "'" . $past . "',";
        $sql .= "'" . $papin . "',";
        $sql .= "'" . $pamob . "',";
        $sql .= "'" . $rur . "',";
        $sql .= "'" . $natn . "',";
        $sql .= "'" . $relg . "',";
        $sql .= "'" . $catg . "',";
        $sql .= "'" . $oaco . "',";
        $sql .= "'" . $oarank . "',";
        $sql .= "'" . $oaroll . "',";
        $sql .= "'" . $oabrn . "',";
        $sql .= "'" . $brnc . "',";
        $sql .= "'" . $col . "',";
        $sql .= "'" . $cen . "',";
        $sql .= "'" . $crsty . "',";
        $sql .= "'" . $pcm . "',";
        $sql .= "'" . $nob1 . "',";
        $sql .= "'" . $yop1 . "',";
        $sql .= "'" . $tm1 . "',";
        $sql .= "'" . $mo1 . "',";
        $sql .= "'" . $divs1 . "',";
        $sql .= "'" . $pom1 . "',";
        $sql .= "'" . $nob2 . "',";
        $sql .= "'" . $yop2 . "',";
        $sql .= "'" . $tm2 . "',";
        $sql .= "'" . $mo2 . "',";
        $sql .= "'" . $divs2 . "',";
        $sql .= "'" . $pom2 . "',";
        $sql .= "'" . $moi . "',";
        $sql .= "'" . $pay . "')";

      
        mysqli_query($con, $sql);
        
        $sql1  = "insert into t_status values(";
        $sql1 .= "'" . $_SESSION['user'] ."',";
        $sql1 .= "'Applied')";
        
         mysqli_query($con, $sql1);
         
        header('location:documents.php');
        echo "<script type='text/javascript'>alert('Details Uploaded !!');</script>";
        
        
    }
    
    
    function DetCode()
{
      $con = mysqli_connect("localhost", "root", "", "oas");
      $rs  = mysqli_query($con,"select CONCAT('DE',LPAD(RIGHT(ifnull(max(s_detid),'DE00000000'),8) + 1,8,'0')) from t_user");
      return mysqli_fetch_array($rs)[0];
}

$q=mysqli_query($con,"select s_name from t_user_data where s_id='".$_SESSION['user']."'");
$n=  mysqli_fetch_assoc($q);
$stname= $n['s_name'];


 if (!isset($_SESSION['user']))
{
        echo "<br><h2>You are not Logged On Please Login to Access this Page</div></h2>";
        echo "<a href=index.php><h3 align=center>Click Here to Login</h3></a>";
        exit();
}



?>

<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title></title>
        
        <link type="text/css" rel="stylesheet" href="css/admform.css"></link>
         <script language="javascript" type="text/javascript" src="jquery/jquery-1.10.2.js"></script>
        
       

        <script type="text/javascript">
        function validate()
        {
            $('#adform input[type="text"]').each(function() {
                if(this.required)
                {
                    if(this.value=="")
                        $(this).addClass("inpterr");
                    else
                        $(this).addClass("inpterrc");
                }
              
                if($(this).attr("VT")=="NM")
                {
                    if((!isAlpha(this.value)) && this.value!="")
                    {
                       alert("Only Aplhabets Are Allowed . . .");
                       $(this).focus();
                    }
                }

                        if($(this).attr("VT")=="PH")
                        {
                                if((!isPhone(this.value)) && this.value!="")
                                {
                                        alert("Check the phone number format . . .");
                                        $(this).focus();
                                }
                        }

                        if($(this).attr("VT")=="EML")
                        {
                                if(!IsEmail($(this).val()) && this.value!="")
                                {
                                        alert("Invalid Email . . . .");
                                        $(this).focus();
                                }
                        }	

                        if($(this).attr("VT")=="PIN")
                        {
                                if((!IsPin(this.value)) && this.value!="")
                                {
                                        alert("Invalid Pin Code . . . .");
                                        $(this).focus();
                                }
                        }

            });
        }
        
                function isAlpha(x)
                {
                    var re = new RegExp(/^[a-zA-Z\s]+$/);
                    return re.test(x);
                }
        
		function isPhone(x)
		{
			
			var ph = new RegExp (/\(?([0-9]{3})\)?([ .-]?)([0-9]{3})\2([0-9]{4})/);  
			//if(!ph.length<10)
			return ph.test(x);
		}
                
                
		
		function IsEmail(x) 
		{
  			var em = new RegExp(/^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/);
  			return em.test(x);
		}
		
		function IsPin(x) 
		{
  			var pin = new RegExp (/^\d{6}$/);
			
  			return pin.test(x);
		}		
        </script>
        
        <style type="text/css">
            .inpterr
            {
                border: 1px solid red;
                background: #FFCECE;

            }
            
            .inpterrc
            {
                border: 1px solid black;
                background: white;
            }
        </style>
            
        
        
        
    </head>
     <body style="background-image:url('./images/inbg.jpg');">
        <form id="adform" action="admsnform.php" method="post">
            <div class="container-fluid">    
                <div class="row">
                  <div class="col-sm-12">
                        <img src="images/cutm.jpg" width="100%" style="box-shadow: 1px 5px 14px #999999; "></img>
                  </div>
                 </div>    
             </div>
            <div id="dmid" class="container-fluid">  
                
                 <div class="row">
                    <div class="col-sm-12">
                        <font style="color:white; margin-left:520px; font-family: Verdana; width:100%; font-size:30px;">
                        <b>ADMISSION FORM</b> </font>
                      </div>
                 </div>
                
             </div>
            
            <table class="frmtbl">
                
                <tr border="1" class="hdrow">
                    
                 </tr>       
                 
                  <tr>
                          <td> <font style="font-family: Verdana;"><h4>Welcome, <?php echo $stname;?></h4> </font> </td>
                    <td colspan="2"> 
                        <input type="hidden" id="detid" name="detid"></td>
                    
                    
                  </tr>
                  
                  <tr>
                    <td><font style="font-family: Verdana;"> Father's Name</font></td>
                    <td  colspan="3"> <input type="text" id="ufname" name="ufname" required="true" VT="NM"> </td>
                   </tr>
                 
                  <tr>
                    <td> <font style="font-family: Verdana;">Father's Occupation</font></td>
                    <td> <input type="text" id="ufocc" name="ufocc" required="true" VT="NM"> </td>
                    <td><font style="font-family: Verdana;"> Mobile No.</font></td>
                    <td> <input type="tel" id="ufphn" name="ufphn" required="true" VT="PH"> </td>
                  </tr>
                
                <tr>
                    <td> <font style="font-family: Verdana;">Mother's Name</font> </td>
                    <td colspan="3"> <input type="text" id="umname" name="umname" required="true" VT="NM"></td>
                </tr>
            
                <tr>
                    <td> <font style="font-family: Verdana;">Mother's Occupation</font></td>
                    <td> <input type="text" id="umocc" name="umocc" required="true" VT="NM"> </td>
                     <td> <font style="font-family: Verdana;">Mobile No.</font></td>
                    <td> <input type="tel" id="umphn" name="umphn" required="true" VT="PH"></td>
                </tr>
                
                <tr>
                    <td><font style="font-family: Verdana;"> Income of Parents </font>
                     <td  colspan="3"><input type="text" id="inc" name="inc" required="true" ></td>
                </tr>
                
                <tr>
                    <td> <font style="font-family: Verdana;">Student's Sex </font></td>
                    <td><input type="radio" id="gen" name="gen" value="Male"><font style="font-family: Verdana;">Male</font>
                     <input type="radio" id="gen" name="gen" value="Female"><font style="font-family: Verdana;">Female </font></td>       
                </tr>
                <tr>
                    <td><font style="font-family: Verdana;"> County</font>
                    <td colspan="3"><input type="text" id="cast" name="cast" class="ad" placeholder="County" style="margin-top: 4px;" required="true"><br>             
        </td>
                <tr>
                    <td> <font style="font-family: Verdana;">Subcounty</font></td>
                    <td colspan="3"><input type="text" id="past" name="past" class="ad" placeholder="Subcounty" style="margin-top: 4px;" required="true"><br>        
                    </td>
                </tr>   
               
                <tr>
                    <td colspan="4"><input type="radio" id="rur" name="rur" value="Rural"><font style="font-family: Verdana;">
                        Rural
                        <input type="radio" id="rur" name="rur" value="Urban"><font style="font-family: Verdana;">Urban</font>
                        <input type="radio" id="rur" name="rur" value="City"><font style="font-family: Verdana;">City</font></td>
                 </tr>
                
                <tr>
                    <td><font style="font-family: Verdana;"> Nationality</font>
                    <td><input type="text" id="natn" name="natn" required="true"></td>
                    <td><font style="font-family: Verdana;"> Religion</font>
                    <td><input type="text" id="relg" name="relg" required="true"></td>
                </tr>    
               
                 <tr>
                    <td><font style="font-family: Verdana;">Admission No</font></td>
                    <td><input type="text" id="cadr" name="cadr" required="true"></td>        
                    </td>
                    <td><font style="font-family: Verdana;">Form/Grade</font></td>
                    <td><select id="catg" name="catg" required="true">
                            <option>--------------------Select--------------------</option>
                            <option>Form 1</option>
                            <option>Form 2</option>
                            <option>Form 3</option>
                            <option>Form 4</option>
                            <option>Grade 10</option>
                            <option>Grade 11</option>
                            <option>Grade 12</option>
                            
                        </select>
               </tr>  
               
               <tr>
                    <td><font style="font-family: Verdana;">NEMIS No.</font></td>
                    <td><input type="text" id="oaroll" name="oaroll" required="false"></td>
               </tr> 
                <tr>
                <td><font style="font-family: Verdana;">Main Language</font></td>
                               <td colspan="3">
                                    <input type="radio" id="moi" name="moi" value="Odia">English
                                    <input type="radio" id="moi" name="moi" value="Hindi"><font style="font-family: Verdana;">Hindi</font>
                                    <input type="radio" id="moi" name="moi" value="English"><font style="font-family: Verdana;">Chinese</font>
                                    <input type="radio" id="moi" name="moi" value="Telugu"><font style="font-family: Verdana;">French</font>
                                    <input type="radio" id="moi" name="moi" value="Bengali"><font style="font-family: Verdana;">German</font>
                                    <input type="radio" id="moi" name="moi" value="Others"><font style="font-family: Verdana;">Others</font>
                               </td>
                           </tr>
                           
                           
                           <tr>
                               <td><font style="font-family: Verdana;">Mode of School Fees Payment</font></td>
                               <td colspan="3">
                                    <input type="radio" id="pay" name="pay" value="Loan"><font style="font-family: Verdana;">Sponsorship</font>
                                    <input type="radio" id="pay" name="pay" value="Self"><font style="font-family: Verdana;">Parent/Guardian</font>
                                    <input type="radio" id="pay" name="pay" value="Self"><font style="font-family: Verdana;">Both</font>
                               </td>
                           </tr>
                 
                 
                           
                           <tr>
                                <td colspan="4">
                                   <center> <input type="submit" onclick="validate();" id="frmnext" name="frmnext" value="Next"></center>
                                </td>
                           </tr>
                       </table>
            <br>
                       
                            
            <br>
                       
                  </form>
            </body>
</html>
