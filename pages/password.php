<?php
session_start();
ob_start();
@$Fname=$_POST['fname'];
@$Mname=$_POST['mname'];
@$Lname=$_POST['lname'];
@$staff=$_POST['staffn'];
@$dept=$_POST['dept'];
@$gender=$_POST['gender'];
@$position=$_POST['pstn'];
@$address=$_POST['address'];
@$email=$_POST['mail'];
@$tel=$_POST['telno'];
@$Uname=$_POST['uname'];
@$Pswd=$_POST['pswd'];
@$register=$_POST['register'];
include($_SERVER['DOCUMENT_ROOT']."/COLS1/dbconnect/dbconnect.php");
$q=mysql_query("SELECT *FROM departments");
$results=mysql_fetch_assoc($q);

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Staff Modification Details</title>


<link href="http://localhost/COLS1/templatemo_style.css" rel="stylesheet" type="text/css" />
<script src="http://localhost/COLS1/jQuery/jquery.js"></script>
<link rel="stylesheet" href="http://localhost/COLS1/nivo-slider.css" type="text/css" media="screen" />

<script language="javascript" type="text/javascript">
function clearText(field)
{
    if (field.defaultValue == field.value) field.value = '';
    else if (field.value == '') field.value = field.defaultValue;
}

</script>

 <script type="text/javascript">
       $(document).ready(function() {
           $(".delete").click(function() {
                var conf = confirm("Are you sure you want to delete this employee?");
                if(conf) {
                    window.location.href='http://localhost/COLS1/pages/delete.php';
                    return true;
                } else {
                    window.location.href ="http://localhost/COLS1/pages/modify.php";
                    return false;
                }
           });
       });

   </script>
      

  
<link rel="stylesheet" type="text/css" href="http://localhost/COLS1/ddsmoothmenu.css" />

<script type="text/javascript" src="http://localhost/COLS1/js/jquery.min.js"></script>
<script type="text/javascript" src="http://localhost/COLS1/js/ddsmoothmenu.js">



</script>

<script type="text/javascript">

ddsmoothmenu.init({
	mainmenuid: "templatemo_menu", //menu DIV id
	orientation: 'h', //Horizontal or vertical menu: Set to "h" or "v"
	classname: 'ddsmoothmenu', //class added to menu's outer DIV
	//customtheme: ["#1c5a80", "#18374a"],
	contentsource: "markup" //"markup" or ["container_id", "path_to_menu_file"]
})

</script>
  
</head>
<body>

<div id="templatemo_menu_wrapper">
    <div id="templatemo_menu" class="ddsmoothmenu">
        <ul>
            <li><a href="http://localhost/COLS1/index.php">Home</a></li>
            
             <li><a href="http://localhost/COLS1/pages/plogout.php" class="selected">Log out</a>   
            </li>
          
        </ul>
        <br style="clear: left" />
    </div> <!-- end of templatemo_menu -->
</div> <!-- end of templatemo_menu_wrapper -->

<div id="templatemo_header_wrapper">
    <div id="templatemo_header" class="header_sub">
        <div id="templatemo_sitetitle_bar">
            <div id="site_title"><h1><a href="#"></a></h1></div>
            <div id="templatemo_search">
                <form action="#" method="get">
    <input type="text" value="" name="keyword" id="keyword" title="keyword" onfocus="clearText(this)" onblur="clearText(this)" class="txt_field" />
    <input type="submit" name="Search" value="" alt="Search" id="searchbutton" title="Search" class="sub_btn"  />
                </form>
            </div>
            <div class="cleaner"></div>
        </div>
    </div> <!-- end of header -->
</div> <!-- end of header_wrapper -->

<div id="templatemo_main">
	
    <div id="content">
	<a href="http://localhost/COLS1/pages/modify.php"><button style="margin-left:-180px; ">Back</button></a>
	<table>
	
		<form method="post" style="margin-bottom:40px;">
		<tr>
		<td><label>Enter The Staff No:</label></td>
		<td><input type="text" name="staffid" value=""></td><td><input type="submit" name="go" value="Go"></td>
		</tr>
		
		</form>
	</table>	
	<?php
	@$search=$_POST['go'];
	@$staffid=$_POST['staffid'];
	if(isset($search)){
	
	$Qre="SELECT * FROM staff WHERE staffno='{$_POST['staffid']}'";
			$Qque=mysql_query($Qre);
			$re=mysql_fetch_array($Qque);
			$numrows=mysql_num_rows($Qque);
			if($numrows==0){
				echo "No staff with such Id.check the Number again.";
			}else{
				@$o=$re['password'];
				@$n=$_POST['Npswd'];
				@$s=$_POST['sbt'];
				if(isset($s)){
				if(empty($no)){
					echo "type the new password";
				}else{
				$u=mysql_query("update staff set password = '$n' where staffno='{$re['staffno']}'")or die(mysql_error());
			    echo "password changed";
				}
			
				}
			?>
			<form method="post">
			<table>
			<tr>
			<td><label>Staff Name:</label></td>
			<td><?php echo $re['Fname']." ".$re['Mname']." ".$re['Lname']; ?></td>
			</tr>
			<tr><td><label>Old password:</label></td><td><?php echo $re['password'];?></td></tr>
			<tr><td><label>New password:</label></td><td><input type="password" name="Npswd" value=""></td></tr>
			<tr><td><input type="submit" name="sbt" value="Change"></td><td><input type="reset" name="rst" value="Reset"></td></tr>
			</table>
			</form>
			<?php
			}
			}
			@$pswd=$_POST['Npswd'];
			@$opswd=$_POST['pswd'];
			@$repswd=$re['password'];
			if(isset($_POST['sbt'])){
							
			  if($repswd==$opswd){
			  	  $changeQ = "UPDATE `leave`.`staff` SET `password` = '$pswd' WHERE `staff`.`Id` = 24;";
			      $fetchpswd=mysql_query($changeQ)or die(mysql_error());
			
				echo "password succesfully changed";
			  }else{
			  	echo "Wrong old password";
			  }
			
			}
			
			
			
		    
	      
	
	?>
	
    </div>
    
    <div id="sidebar">
    	
    </div> <!-- end of sidebar -->
    
    <div class="cleaner"></div>
</div>

<div id="templatemo_footer_wrapper">
	<div id="templatemo_footer">
    	<div class="col_3">
        	
        </div>
        <div class="col_3">
        	
            <div class="footer_social_button">
                <a href="#"><img src="http://localhost/COLS1/images/facebook-32x32.png" alt="facebook" title="facebook" /></a>
                <a href="#"><img src="http://localhost/COLS1/images/flickr-32x32.png" alt="flickr" title="flickr" /></a>
                <a href="#"><img src="http://localhost/COLS1/images/twitter-32x32.png" alt="twitter" title="twitter" /></a>
                <a href="#"><img src="http://localhost/COLS1/images/youtube-32x32.png" alt="youtube" title="youtube" /></a>
                <a href="#"><img src="http://localhost/COLS1/images/rss-32x32.png" alt="rss" title="rss" /></a>
			</div>
        </div>
        <div class="col_3 col_l">
					
        </div>
        <div class="cleaner"></div>
    </div>
</div>

<div id="templatemo_cr_bar_wrapper">
	<div id="templatemo_cr_bar">
    	Copyright &copy 2016 <a href="#">ONLINE LEAVE APPLICATION</a> | Designed by Francis Mwakidoshi
    </div>
</div>

</body>
</html>
<?php
ob_end_flush();
?>