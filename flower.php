<?php
 // connection Database
include('Flower.html');
$db=mysqli_connect("localhost","root","","flower_story");

if(!$db){
 die("Cloud not connect to database");
}
//sesstion start and query to retrieve information about each product from database
session_start();
$status="";


?>
<!-- start code HTML -->
<html>
<head>
   <!-- CSS code -->  
    <style>
     
          .cartNum{

  font-size:20px;
  color: hotpink;
  font-weight:bold;

}
        .pName{
            text-align: center;
            font-weight:bold;
            margin-left: 450px;
            
        
        }
        .pQttyField{
            margin-left: 600px;
            
        }
        .pQttyText{
             margin-left: 600px;
            font-weight:bold;
            color: deeppink;
        }
        .cart{
    position:absolute;
    top:400px;
    left: 10px;
    
    
        }
        .topcorner{
  position:absolute;
  top:10;
  right:15;
  }
        .error {
    background:#ffecec url('images/error.png') no-repeat 10px 50%;
    border:1px solid #f5aca6;
}
        
        .alert-box {
    color:#555;
    border-radius:10px;
    font-family:Tahoma,Geneva,Arial,sans-serif;font-size:11px;
    padding:10px 10px 10px 36px;
    margin:10px;
    position:absolute;
    top:375px;
    right: 500px;

}
        .alert-box span {
    font-weight:bold;
    text-transform:uppercase;
    
}
        .success {
    background:#e9ffd9 url('images/success.png') no-repeat 10px 50%;
    border:1px solid #a6ca8a;
}

       .im{
            width: 200px;
            height: 200px;
            
        }
        .cen{
            margin-left: 620px;
            text-align: center;
        }
        .cen1 {
            
         margin-left: 700px;
        }
    </style>
<title>Flower Story</title>
<link rel='stylesheet' href='css/style.css' type='text/css' media='all' />
</head>
<body>
<div style="width:700px; margin:50 auto;">
  

<?php
    // number of products added to the shopping cart
if(!empty($_SESSION["shopping_cart"])) {
$cart_count = count(array_keys($_SESSION["shopping_cart"]));
    
?>
 <!-- shopping cart icon with counter based on the number of produtcs add to cart, also contain herf attribute linking to cart page  -->  
<div class="cart_div">
<a class='im' href="cart.php"><img src="images/cart-icon.png" /><sup><?php echo $cart_count; ?></sup></a>
</div>

<?php
}
// Display the image of products and detiles from database
$result = mysqli_query($db,"SELECT * FROM roses where ProductID LIKE 'F%' ");
while($row = mysqli_fetch_assoc($result)){
  $price=$row['ProductPrice']; ?>
      <div class='product_wrapper'>
          <form method='post' action=''>
			  <input type='hidden' name='id' value='<?php echo $row['ProductID']?>' />
              <?php 
      // include alt attribute in img element to support the usbility.
             print("<label class='cen'><img class='im' src='images/".$row['ProdcutPic']." '</label>"); ?>
              <details class="pQttyField"><summary>Name : <?php echo $row['ProdcutName']?></summary>
                  <center><br>Color: <?php echo '&nbsp &nbsp'.$row['ProdcutColor']?><br><br> Price:<?php echo '&nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp'.$price ?><br><br>Size:<?php echo '&nbsp&nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp'.$row['ProdcutSize']?><br><br>Stock: <?php echo '&nbsp &nbsp &nbsp&nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp'.$row['ProdcutStock']?><br><br>Type: <?php echo '&nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp'.$row['ProdcutType']?><br><br></center></details><br><center class="pQttyField">Product Qunatity:</center><center class="pQttyText"><input type="text"  name="qun"></center>
<!-- hellp button to display more detiles of products from database in pop up format -->
    <p class="cen"><button onclick="myFunction()" class="button" style="vertical-align:middle"type ="reset"><span>Help</span></button>
    <script>
function myFunction() {
 window.alert(" this product is <?php print($row['ProdcutType']); ?> also for more information you can send an email to flower@story.com ");

} 
       //display and hidden ADD to cart botton based on the product stock value. 
    </script>
    <?php  $stockdata=$row['ProductID'];
      $stock= mysqli_query($db,"SELECT ProdcutStock FROM roses where ProductID='$stockdata'"); 
    $row=mysqli_fetch_assoc($stock); 

    if ($row['ProdcutStock'] >= 1){
        print('<button type="submit" class="button">ADD to cart</button></p>
              <P><center>');
    }
              ?>
              
          
          </form></div>
    
  
 
   


    <?php

        }
    // check if user enter the product qunatity.
    if (isset($_POST['id']) && $_POST['id']!=""){
        if (empty($_POST['qun'])){
   print('<div class="alert-box error"><span>error: </span>Enter the product qauntity in the field</div>');
            
}
        // if user enter the qunaitiy then retierve the product's information.
        else if (isset($_POST['qun'])){
$id =$_POST['id'];
$result =mysqli_query($db,"SELECT * FROM roses WHERE ProductID ='$id'");
$row = mysqli_fetch_assoc($result);
$idp=$row['ProductID'];
$name=$row['ProdcutName'];
$color=$row['ProdcutColor'];
$size=$row['ProdcutSize'];
$stock=$row['ProdcutStock'];
$image=$row['ProdcutPic'];
$detail=$row['ProdcutDetailes'];
$price=$row['ProductPrice'];
$type=$row['ProdcutType'];
// store products details into array .
$stock=mysqli_query($db,"select * from roses where ProductID='$id' ");
$row=mysqli_fetch_assoc($stock);
settype($row['ProdcutStock'], "integer");
$q=$_POST['qun'];
settype($q, "integer");
    if ($q < $row['ProdcutStock']){
$cartArray = array(
	$id=>array(
    'idp'=>$idp, 
	'name'=>$name,
	'id'=>$id,
	'price'=>$price,
	'quantity'=>$q,
	'image'=>$image,
	'stock'=>$row['ProdcutStock'],

   )
);

// add the selected products to cart

if(empty($_SESSION["shopping_cart"])) {
	$_SESSION["shopping_cart"] = $cartArray;
	 print('<div class="alert-box success"><span>success: </span>Product is added to your cart successfully!</div>');
}else{
    // check if the prodcts already added to cart 
	$array_keys = array_keys($_SESSION["shopping_cart"]);
	if(in_array($id,$array_keys)) {
        print('<div class="alert-box error"><span>error: </span>Product is already added to your cart!</div>');
	} else {
    // if the produtcs check based on the previous if and it's not in the cart then add the products in cart 
	$_SESSION["shopping_cart"] = array_merge($_SESSION["shopping_cart"],$cartArray);
	print('<div class="alert-box success"><span>success: </span>Product is added to your cart successfully!</div>');
        
	}

	}
}// if the user enter qunitity above the stock then this message will appear.
            else if ($q > $row['ProdcutStock']){
    $status= "</center><div class='box'>Out of the stock</div></center>";
}
        }
}
// discconect the database connection
mysqli_close($db);
?>

<div style="clear:both;"></div>

<div class="message_box" style="margin:10px 0px;">
<!-- show the message indicate tow state first, if the products add to cart. second,if the products already add to cart -->
<?php echo $status; ?>
</div>
</div></body></html>

