<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<link rel='stylesheet' href='css/style.css' type='text/css' media='all' />
<title>Delete Product</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="css/styles.css" rel="stylesheet" type="text/css" />
</head>
<body>
    
     <style>
input[type="text"],textarea, select{
     outline:none;
        padding: 10px;
        display:block;
        width:300px;
        border-radius:3px;
        border:1px solid #eee;
        margin:20px auto;
        
        
    }
button {
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
         table{
          ;   
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

	<!--delete-->
            
                      
  <h1><br><br>Delete Product<br><br></h1>
            
    <form method='post' action=''>
    <?php 
$db=mysqli_connect("localhost","root","","flower_story");
    if(!$db){
 die("Cloud not connect to database");
} 
  if($query=mysqli_query($db,"select * from roses")){      
      
?><!-- query to retirve the needed information from the database-->
  <h2><center><table summery="This table discribes the delete function"
                     font-size="19px"
          border="2"
             width="100" 
             height="80">
      <thead><tr><th>ProducID</th>
        <th>ProdcutName</th></tr></thead>
      <tbody>
  <?php while($row=mysqli_fetch_assoc($query)){ ?>      
   
          <tr><td><?php echo $row['ProductID']; ?></td>
          <td><?php echo $row['ProdcutName']; ?></td></tr>
  
  <?php }?>
</tbody>
</table>   </center></h2>   
        

        <?php }
        ?>
    <!-- form for user to write the information -->
    <br><br><center><label style='color:black;font-size: 20px;' > Product ID : <input name="ProductID" type="text">
</label></center><br><br>
    
    <p>
  <button onclick="myFunction()" class="button" style="vertical-align:middle;font-size: 20px;"type ="reset"><span>Back</span></button>
    <script>
function myFunction() {
  window.location.href = "Admin.html";
}
</script>       
 <button class="button"   name="del" style="vertical-align:middle;font-size: 20px;" type="submit"><span>Delete </span></button>
         <button class="button" style="vertical-align:middle;font-size: 20px;" type="reset"><span>Clear</span></button>
   </p>

</form>
<?php 
            
   $nameErr=""; 
   $i="t";
?> 

<?php


 // check if theuser click on the delete button.
  if(isset($_POST['del'])) {
      if (empty($_POST['ProductID'])){
     settype($i , "string");
          if($i == "t"){
 
    $nameErr = "<div class='message_box' style='margin:10px 0px;'><center style='font-size: 20px;'> NOTE: you should enter the product id before you click delete </center></div>";
    $i="f";  
            
       
  }
    
     else if ($i == "f") {
           $nameErr = "<div class='message_box' style='margin:10px 0px;'><center style='font-size: 20px;'>Proudct ID requried</center></div>";  
     }
      }
      // if the condetion meet product will be deleted.
else if(isset($_POST['ProductID']) && $_POST['ProductID']!=""){
    // check if ID only contains letter followed by number\
    $product=$_POST['ProductID'];
if (preg_match("/\b^[a-zA-Z]+[[:digit:]]+$\b/i",$product)) {
         $id=$_POST['ProductID'];
if ($query=mysqli_query($db,"delete from roses where ProductID='$id'")){
  $nameErr="<div class='message_box' style='margin:10px 0px;'><center style=' font-size: 20px;'>product deleted</center></div>";

    }else{
        
                $nameErr="<div class='message_box' style='margin:10px 0px;'><center style='font-size: 20px;'>product not deleted </center> </div>";
    } }
  // if the user value not match with validation pattern this message will appear.
else if (!preg_match("/\b^[a-zA-Z]+[[:digit:]]+$\b/i",$product)) {
    $nameErr = "<div class='message_box'style='margin:10px 0px;'><center style='font-size: 20px;'>please, enter a valid product ID starting with a charachter followed <br><br> by numbers </center></div>"; 
    
        
  }}}
            
  
     ?>

  <?php 
            // display messages to user.
    echo $nameErr;
    
    ?>  
    
 
<div id="footer">
    <p><a href="login.php">
        <img src="images/looo.png" width="35" hight="35" alt="logout"></a>
        
        <a href="mailto:tayb-alqalb-e@hotmail.com">
        <img src="images/email.gif" width="35" hight="35" alt="email"></a>
        
        <a href="https://instagram.com/a_flower_story?utm_source=ig_profile_share&igshid=t25z1rnady9t">
        <img src="images/insta.gif" width="35" hight="35" alt="instagram"></a>
     
    </p>
        
        
        
</div>
		


        </div></div></div></div>
</body>
</html>
