<!--HTML code-->

<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Admin Functions</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="css/styles.css" rel="stylesheet" type="text/css" />
</head>
<body>
    <!--CSS code-->
   <style>
.button {
  display: inline-block;
  border-radius: 4px;
  background-color: #ffe867;
  border: none;
  color: black;
  text-align: center;
  font-size: 18px;
  padding: 20px 10px 10px 10px;
  width: 170px;
  transition: all 0.5s;
  cursor: pointer;
    font-family:sans-serif;
  margin: 15px;
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
      <!--User menu-->
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
   
         
        <center><div id="container">

            <!--login COOKIS -->
            <div id=""><center width="35" hight="35" style='color:black;font-size: 20px;'><?php  print("Welcome ".$_COOKIE['name']." choose one of the option ");  ?></center>
                <br><br><br> <br><br> <br></div>

    
    <a href="ADD.php"> <button class="button"> Add Product</button></a>
    
    <a href="update.html"><button class="button"> Update Product</button></a>
    
	<a href="delete_dmin.php"><button class="button">Delete Product</button></a>
            

	
</div></center>
      </div>
    </div>

    <div class="clear" id="end"></div>
  </div>

    <!--footer with directly pass to email and instegram and admin logout-->
<div id="footer">
    <p>
        <a href="login.php">
        <img src="images/looo.png" width="35" hight="35" alt="logout"></a>
        
        <a href="mailto:tayb-alqalb-e@hotmail.com">
        <img src="images/email.gif" width="35" hight="35" alt="email"></a>
        
        <a href="https://instagram.com/a_flower_story?utm_source=ig_profile_share&igshid=t25z1rnady9t">
        <img src="images/insta.gif" width="35" hight="35" alt="instagram"></a>
     
        
    </p>
        
        
</div>
    
    
    
    
    
</body>
</html>

