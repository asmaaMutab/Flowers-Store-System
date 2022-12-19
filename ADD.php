<?php

$db=mysqli_connect("localhost","root","","flower_story");

if(!$db){
 die("Cloud not connect to database");
}
?> 
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Add New Product</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="css/styles.css" rel="stylesheet" type="text/css" />
</head>
<body>
<style>
.button {
  display: inline-block;
  border-radius: 4px;
  background-color: #ffe867;
  border: none;
  color: black;
  text-align: center;
  font-size: 28px;
  padding: 20px;
  width: 200px;
  transition: all 0.5s;
  cursor: pointer;
    font-family:sans-serif;
  margin: 5px;
}
    input[type="text"],textarea{
     outline:none;
        padding: 10px;
        display:block;
        width:300px;
        border-radius:3px;
        border:1px solid #eee;
        margin:20px auto;
        
        
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

	<!--add new producte-->
<h2><center><table summery="This table discribes the ADD function"
                   font-size="19px"
          border="2"
             width="100" 
             height="80">
      <thead><tr><th>ProducID</th>
        <th>ProdcutName</th>
          <th>roduct Type</th>
          <th>Product Size</th>
          <th>Product Color</th>
          <th>Product Stock </th>
          <th>Product Price</th>
          <th>Product Picture</th>
          <th>Details</th></tr></thead><tbody>
    <tr><td><center>Letters</center></td>
      <td><center>Letters</center></td>
      <td><center>Letters</center></td>
      <td><center>Letters</center></td>
      <td><center>Letters</center></td>
    <td><center>Numbers</center></td>
    <td><center> Numbers</center></td>
    <td><center>Letters</center></td>
    <td><center>Letters</center></td></tr>
      
</tbody>
            </table><center></h2>      
        

        <!-- html form to get prodcut inforamtion -->     
  <h1><br><br>Information Of The New Product<br><br></h1>
    
<form method = "post" action ="">
   
<p><label> Product ID : <input name="ProductID" type="text"  /></label>
    
<label>Product Name : <input name="name" type="text"/> </label></p><br><br>
    
<p><label>Product Type : <input name="type" type="text"  /> </label> 
    
<label>Product Size : <input name="size" type="text" /> </label></p><br><br>
    
<p><label>Product Color : <input name="color" type="text"/></label>
   
<label>Product Stock : <input name="productStock" type="text"/></label></p><br><br>

<p><label>Product Price : <input name="price"  type="text" /></label>
    
<label>Product Picture : <input name="image" type="text" placeholder="picture name.extension"/><div color="red"></div></label></p><br><br> 

<p><label> Details : <textarea name = "Details" rows = "4" cols = "38" placeholder="Please write the product details .."></textarea></label></p><br><br>
<p>
<button onclick="myFunction()" class="button" style="vertical-align:middle"type ="reset"><span>Back</span></button>
    <script>
function myFunction() {
  window.location.href = "Admin.html";
}
</script>
<button class="button" name="add" style="vertical-align:middle" type="submit"><span>Add </span></button>
<button class="button" style="vertical-align:middle"type ="reset"><span>Clear </span></button>
</p>

    </form>
            
<?php
$status="";
$status1="";
$status2="";
$t="t";
?>
            
<?php 
// check if the field empty or no.
if (empty($_POST['ProductID']) || empty($_POST['name']) || empty($_POST['type']) || empty($_POST['size']) || empty($_POST['color']) || empty($_POST['Details']) || empty($_POST['productStock']) || empty($_POST['price']) || empty($_POST['image'])){
 $status="<div class='message_box' style='margin:10px 0px;'><center style='font-size: 20px;'> NOTE : all the filed requeird </center></div>";
    
}else{
// chech if the filed conatin data then the follwing code will excute.
if (isset($_POST['ProductID']) && is_numeric($_POST['ProductID'])){
    $t="f";
    $status2="<div class='message_box' style='margin:10px 0px;'><center style='font-size: 20px;'> Please, Enter a valid product ID starting with a charachters followed <br><br> by numbers , </center> </div>";   
}
if(isset($_POST['name']) && is_numeric($_POST['name'])){
    $t="f";
   $status1="<div class='message_box' style='margin:10px 0px;'><center style='font-size: 20px;'> The Following Fields : Name , Type , Size , Color , Details , Picture <br><br> should contain charcters only  </center> </div>";  
} 
 if(isset($_POST['type']) && is_numeric($_POST['type'])){
$t="f";
$status1="<div class='message_box' style='margin:10px 0px;'><center style='font-size: 20px;'> The Following Fields : Name , Type , Size , Color , Details , Picture <br><br> should contain charcters only  </center> </div>";   
}
if (isset($_POST['size']) && is_numeric($_POST['size'])){
  $t="f";
$status1="<div class='message_box' style='margin:10px 0px;'><center style='font-size: 20px;'> The Following Fields :Name , Type , Size , Color , Details , Picture <br><br>should contain charcters only  </center> </div>";               
            }
 if (isset($_POST['color']) && is_numeric($_POST['color'])){
  $t="f";
$status1="<div class='message_box' style='margin:10px 0px;'><center style='font-size: 20px;'> The Following Fields : Name , Type , Size , Color , Details , Picture <br><br>should contain charcters only  </center> </div>";         
            }
if(isset($_POST['Details']) && is_numeric($_POST['Details'])){
 $t="f"; 
$status1="<div class='message_box' style='margin:10px 0px;'><center style='font-size: 20px;'> The Following Fields :  Name , Type , Size , Color , Details , Picture <br><br> should contain charcters only  </center> </div>";     
} 
if(isset($_POST['image']) && is_numeric($_POST['image'])){
  $t="f";
 $status1="<div class='message_box' style='margin:10px 0px;'><center style='font-size: 20px;'> The Following Fields : Name , Type , Size , Color , Details , Picture <br><br>should contain charcters only  </center> </div>";    
}
 if ( (!is_numeric($_POST['productStock'])) ||  
         (! is_numeric($_POST['price'])) ){
             
$status="<div class='message_box' style='margin:10px 0px;'><center style='font-size: 20px;'> The Following Fields : Price , Stock should contain numbers only  </center> </div>"; 
                
}
    // if the condetion meet then the follwing query will excute.
 if (is_numeric($_POST['productStock']) && is_numeric($_POST['price']) && ($t=="t")){
$id=$_POST['ProductID'];
$name=$_POST['name'];
$type=$_POST['type'];
$size=$_POST['size'];
$color=$_POST['color'];
$Details=$_POST['Details'];
$stock=$_POST['productStock'];
$price=$_POST['price'];
$pic=$_POST['image'];
              
 $q="INSERT INTO roses Values('$id','$name','$color','$size','$stock','$pic','$price','$Details','$type')";
if($query=mysqli_query($db,$q)){
$status="<center style='font-size: 20px;'> Product added </center> ";   
                    
 }
}
    else {
        $status="<center style='font-size: 20px;'> Product not added </center> "; 
    }              
            }

?>
            
 <?php 
    // varible to display messages for user
    echo $status2;
    echo $status1;
    echo $status;
 

            ?>           
            
</div>
      </div>
    </div>

    <div class="clear" id="end"></div>
  </div>
<!-- page footer -->
<div id="footer">
    <p><a href="login.php">
        <img src="images/looo.png" width="35" hight="35" alt="logout"></a>
        
        <a href="mailto:tayb-alqalb-e@hotmail.com">
        <img src="images/email.gif" width="35" hight="35" alt="email"></a>
        
        <a href="https://instagram.com/a_flower_story?utm_source=ig_profile_share&igshid=t25z1rnady9t">
        <img src="images/insta.gif" width="35" hight="35" alt="instagram"></a>
     
    </p>
        
        
        
</div>
    
</body>
</html>


