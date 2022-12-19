<?php

// Database Connection
$db=mysqli_connect("localhost","root","","flower_story");

 

if(!$db){

die("Cloud not connect to database");

}?>
<!--HTML code-->
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>login</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="css/styles.css" rel="stylesheet" type="text/css" />
<link href="https://fonts.googleapis.com/css?family=Comfortaa" rel="stylesheet">
<script type="text/javascript" src="https://gc.kis.v2.scr.kaspersky-labs.com/242ACCF9-F8A4-B54A-B097-885AE670F7A1/main.js" charset="UTF-8"></script><link rel="stylesheet" crossorigin="anonymous" href="https://gc.kis.v2.scr.kaspersky-labs.com/41800EBF-373B-7F42-8360-1A1EA1D6BC48/abn/main.css"/></head>
<body>
    <!--CSS code-->
    <style>
      
input[type="text"],select,textarea{
     outline:none;
        padding: 10px;
        display:block;
        width:300px;
        border-radius:3px;
        border:1px solid #eee;
        margin:20px auto;
        
        
    }
        input[type="password"]{
            outline:none;
        padding: 10px;
        display:block;
        width:300px;
        border-radius:3px;
        border:1px solid #eee;
        margin:20px auto;    
        }
        input[type="radio"]{
            outline:none;
        padding: 10px;
        display:block;
        width:300px;
        border-radius:3px;
        border:1px solid #eee;
        margin:20px auto;
      
        }
.button {
  display: inline-block;
  border-radius: 4px;
  background-color: #ffe867;
  border: none;
  color: black;
  text-align: center;
  font-size: 20px;
  padding: 20px;
  width: 190px;
  transition: all 0.5s;
  cursor: pointer;
    font-family:sans-serif;
  margin: 5px;
}

.button span {
  cursor: pointer;
  display: inline-block;
  position: relative;
  transition: 0.5s;
}

.button span:after {
  content: '\00bb';
  position: absolute;
  opacity: 0;
  top: 0;
  right: -20px;
  transition: 0.5s;
}

.button:hover span {
  padding-right: 25px;
}

.button:hover span:after {
  opacity: 1;
  right: 0;
}
</style>
<div id="container">
  <div id="topLine"></div>
  <div id="logoPan"> <img src="images/R.png" width="330" height="92" alt="" id="logo" /> <img src="images/slogan.gif" width="297" height="46" alt="" id="slogan" /> </div>
  <div id="menuPan">
      <!--user menu-->
    <ul class="menu">
      <li class="home"><a href="A Flower Story.html">home page</a></li>
      <li class="line"></li>
      <li class="adm"><a href="login.php">Admain</a></li>
      <li class="line"></li>
      <li class="pro"><a href="Product.html">product</a></li>
      <li class="line"></li>
      <li class="sh"><a href="Cart.php">shopping cart</a></li>
      <li class="line"></li>
       <li class="contact"><a href="ContactUs.html">contact us</a></li>
    </ul>
    </div>
   
  <div id="header"> <img src="images/slogan2.gif" width="192" height="70" alt="" id="slogan2" /></div>
  <div id="content">
    <div id="leftPan">
     
         
        <div id="container">

 <!--Admin login -->
            
 <form name="myform" method ="post" action="" onsubmit="return login()" >
       <br>
    <p><Label><strong>UserName</strong></Label><br><br><input Name="Name" Type="text" size= "24" maxlength="15"></p><br>
    <p><Label> Password </Label><br><br><input Name="pass" Type = "password" 
  size = "24" maxlength="15"></p><br>
     <!--<P><label><input type="checkbox" name="rem">Remeber me</label></P>-->
  <p><button class="button" name="submit" style="vertical-align:middle" type="submit"  ><span>Login</span></button></p>
       
   
    
     
 </form>
            

</div>
      </div>
    </div>

    <div class="clear" id="end"></div>
  </div>
<!--footer with directly pass to email and instegram-->
<div id="footer">
    <p><a href="mailto:tayb-alqalb-e@hotmail.com">
        <img src="images/email.gif" width="35" hight="35" alt="email"></a>
        
        <a href="https://instagram.com/a_flower_story?utm_source=ig_profile_share&igshid=t25z1rnady9t">
        <img src="images/insta.gif" width="35" hight="35" alt="instagram"></a>
     
        
        
        
        
</div>
    
    
  <!-- Function to check if it is Empty or not using java script   -->
    
 <script>
function login(){
    var name=document.forms["myform"]["Name"].value;
    var pass=document.forms["myform"]["pass"].value;
    
    if(name==""){
            window.alert("All Field Requried");
        return false;
       
    }
    if (pass == ""){
       window.alert("All Field Requried");
        return false;
    }

     else {
     
         return true;
     }
     
}
     
</script>
  
    <!--  Check the validation for the Admin login with database using PHP code-->
    
  <?php 
$nameErr="";
$nameErr1="";
$match="";
settype($match , "string");
if((isset($_POST['Name']) && $_POST['Name']!="") || (isset($_POST['pass']) && $_POST['pass']!="") ){
    
    //Display Error message when username is number or password is characters
if(is_numeric($_POST['Name']) || ! is_numeric($_POST['pass'])){
    $nameErr="<div class='message_box' style='margin:10px 0px;'><center style='font-size: 20px;'>UserName should conatin characters only and numbers for Password </center></div>";
}
   
 // Query to check the username and password for admin is correct   
 else if ( !is_numeric($_POST['Name']) && is_numeric($_POST['pass'])) {  


$query="select * from admin where UserName='".$_POST['Name']."'";

$result=mysqli_query($db,$query);
     
    //Display Error message when username or password are not correct
  while($row=mysqli_fetch_assoc($result)){
  if( $row['Password'] != $_POST['pass'] ||   $row['UserName'] != $_POST['Name'] ){
       
           $nameErr="<div class='message_box' style='margin:10px 0px;'><center style='font-size: 20px;'>UserName or Password not match </center></div>";
      }
   
   
      //code for the COOKIS 
else if (($row['UserName']==$_POST['Name']) && ($row['Password'] ==$_POST['pass'])) {
           setcookie("name", $_POST['Name'] , time()+3600);
      
  

    ?> 
   <script>
    window.location.href ="Admin.php";
   </script>
  <?php    
}
     
  }}

 


  }

?>
    
<?php echo $nameErr ;

    // discconect the database connection
mysqli_close($db);

?>  
</body>
</html>


