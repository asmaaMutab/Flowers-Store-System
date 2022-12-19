<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Shopping Cart</title>
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
  font-size: 18px;
  padding: 20px;
  width: 170px;
  transition: all 0.5s;
  cursor: pointer;
    font-family:sans-serif;
  margin: 15px;
}
.cart1{
   margin-right: 500px;         
           
       }
       .table1 {
         margin-left: 400px;    
       }
.button span {
  cursor: pointer;
  display: inline-block;
  position: relative;
  transition: 0.5s;
}
       .but{
            width="11px" Height="11px"
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
      <li class="sh"><a href="#">shopping cart</a></li>
      <li class="line"></li>
       <li class="contact"><a href="ContactUs.html">contact us</a></li>
    </ul>
  </div>
   
  <div id="header"> <img src="images/slogan2.gif" width="192" height="70" alt="" id="slogan2" /></div>
  <div id="content">
    <div id="leftPan">
     
         
        <div id="container">



 
   
            
	
</div>
      </div>
    </div>

    <div class="clear" id="end"></div>
  </div>

<?php 
// database connection.
$db=mysqli_connect("localhost","root","","flower_story");

if(!$db){
 die("Cloud not connect to database");
}
?>
<?php

session_start();
$status="";
// if user click on the remove button this query will ecxute.
if (isset($_POST['action']) && $_POST['action']=="remove"){
if(!empty($_SESSION["shopping_cart"])) {
	foreach($_SESSION["shopping_cart"] as $key => $value) {
		if($_POST["id"] == $key){
		unset($_SESSION["shopping_cart"][$key]);
		$status = "<div class='box' style='color:red;font-size: 15px;'>
		Product is removed from your cart!</div>";
		}
		if(empty($_SESSION["shopping_cart"]))
		unset($_SESSION["shopping_cart"]);
			}		
		}
}
// if user change the quantitiy this code will excute.
if (isset($_POST['action']) && $_POST['action']=="change"){
  foreach($_SESSION["shopping_cart"] as &$value){
    if($value['id'] === $_POST["id"]){
         $value['quantity'] = $_POST["quantity"];
        $id=$_POST["id"];
        $db=mysqli_connect("localhost","root","","flower_story");
        $stock=mysqli_query($db,"select * from roses where ProductID='$id' ");
        $row=mysqli_fetch_assoc($stock);
        settype($row['ProdcutStock'], "integer");
        if ($row['ProdcutStock'] >= $value['quantity'] ){
        settype($test, "integer");
            $test=1;
   
        break; // Stop the loop after we've found the product
            
    }// if user choose qauntity in the cart that above the stock this code will excute.
        else if( $row['ProdcutStock'] < $value['quantity']) {
              settype($test, "integer");
             $test=0;
            $status="<center style='font-size: 15px;'> the qauntity of ".$row['ProdcutName']." product above the stock </center>"; 
       
            break;
        }
    }
}
  	
}
    // if the user click on delete button this code will empty the cart.
if (isset($_POST['action']) && $_POST['action']=="del"){
if(!empty($_SESSION["shopping_cart"])) {
	foreach($_SESSION["shopping_cart"] as $key => $value) {
		
		unset($_SESSION["shopping_cart"][$key]);
		
		}
		if(empty($_SESSION["shopping_cart"]))
		unset($_SESSION["shopping_cart"]);
			}		
		} 

?>

<?php
    // counter to count how many products in the cart.
if(!empty($_SESSION["shopping_cart"])) {
$cart_count = count(array_keys($_SESSION["shopping_cart"]));
?>
<center class='cart1'><div class="cart_div">
<a href="cart.php">
<img src="images/cart-icon.png" /><sup><?php echo $cart_count; ?></sup>
</a>
</div></center>
<?php
}
?>

<div class="cart">
<?php
if(isset($_SESSION["shopping_cart"])){
    $total_price = 0;
?><!-- table display the cart information --> 	
<center class="table1"><table class="table" style="font-size: 15px;">
<tbody>
<tr>
<td></td>
<td>ITEM NAME</td>
<td>QUANTITY</td>
<td>UNIT PRICE</td>
<td>ITEMS TOTAL</td>
</tr>	
<?php		
foreach ($_SESSION["shopping_cart"] as $product){
?>
<tr>
<td><img src="images/<?php echo $product["image"]; ?>" width="50" height="40" /></td>
<td><?php echo $product["name"]; ?><br />
<form method='post' action=''>
<input type='hidden' name='id' value="<?php echo $product["id"]; ?>" />
<input type='hidden' name='action' value="remove" />
<button type='submit' class='remove'>Remove Item</button>

</form>
</td>
<td>
<form method='post' action=''>
<input type='hidden' name='id' value="<?php echo $product["id"]; ?>" />
<input type='hidden' name='action' value="change">                                      
 <select name='quantity' class='quantity' onchange="this.form.submit()">
<option <?php if($product["quantity"]==1) echo "selected";?> value="1">1</option>
<option <?php if($product["quantity"]==2) echo "selected";?> value="2">2</option>
<option <?php if($product["quantity"]==3) echo "selected";?> value="3">3</option>
<option <?php if($product["quantity"]==4) echo "selected";?> value="4">4</option>
<option <?php if($product["quantity"]==5) echo "selected";?> value="5">5</option>
<option <?php if($product["quantity"]==6) echo "selected";?> value="6">6</option>
<option <?php if($product["quantity"]==7) echo "selected";?> value="7">7</option>
<option <?php if($product["quantity"]==8) echo "selected";?> value="8">8</option>
<option <?php if($product["quantity"]==9) echo "selected";?> value="9">9</option>
<option <?php if($product["quantity"]==10) echo "selected";?> value="10">10</option>

</select> 
</form>
</td>
<td><?php echo "$".$product["price"]; ?></td>
<td><?php echo "$".$product["price"]*$product["quantity"]; ?></td>
</tr>
<?php
$total_price += ($product["price"]*$product["quantity"]);
}
?>
<tr>
<td colspan="5" align="right">
<strong>TOTAL: <?php echo "$".$total_price;  ?></strong>
</td>
</tr>
</tbody>
</table></center>	
<center>
  <?php
}else{
	echo "<h3>Your cart is empty!</h3>";
	}
?></center>
</div>
<center>
<div style="clear:both;"></div>

<div class="message_box" style="margin:10px 0px;">
<?php // display message to user.
    echo $status; ?>
</div>
</center>
  <center><form method='post' action=''>

<P><center>
    <button onclick="myFunction()" class="button" style="vertical-align:middle"type ="reset"><span class="but">continue shopping</span></button>
    <script>
function myFunction() {
  window.location.href ="Product.html";
}  </script>
<button onclick="myFunction1()" class="button" style="vertical-align:middle"type ="reset"><span>Checkout</span></button>
    <script>
function myFunction1() {
    <?php if(empty($_SESSION["shopping_cart"])){
   print('window.location.href = "Cart.php"');
   

}
    else if ($test == 0){
        print('window.location.href = "Cart.php"');   
    }
    else {
        print('window.location.href = "BuySummary.php"');
        }
    ?>
 
  
}  </script>
<input type='hidden' name='id' value="<?php echo $product["id"]; ?>" />
<input type='hidden' name='action' value="del" /> 
<input type="submit" class="button" value="clear cart">

</center></P></form>

 <?php
   // page footer.
    print('<div id="footer">
    <p><a href="mailto:tayb-alqalb-e@hotmail.com">
        <img src="images/email.gif" width="35" hight="35" alt="email"></a>
        
        <a href="https://instagram.com/a_flower_story?utm_source=ig_profile_share&igshid=t25z1rnady9t">
        <img src="images/insta.gif" width="35" hight="35" alt="instagram"></a>

        
</div> '); 
 ?>
  </center>    
<?php
mysqli_close($db);
?>
    </div>
   
   
    
    
    </body>

</html>
