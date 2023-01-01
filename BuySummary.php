<?php
// start the session.
session_start();?>

<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Fllower</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="css/styles.css" rel="stylesheet" type="text/css" />
</head>
<body>
   <style>
       input[type="text"],select,textarea,summary{
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
  font-size: 18px;
  padding: 20px;
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

       .row{display: flex;
           flex-wrap: wrap;
           padding: 0 4px

       }

       .col{
           flex: 50%;
           padding: 0 4px

       }

         .col img{
           margin-top: 8px;
          vertical-align: middle;
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

            <!--Fllower Page-->

     <div class ="row" >

    <div class ="col" >



            </div>


            </div>



</div>
      </div>
    </div>

    <div class="clear" id="end"></div>
  </div>
<!-- table display the summary of the order.-->
<center><table class="table" style=" font-size: 15px;">
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
</td>
<td>
<?php echo $product["quantity"]; ?>
</td>
# print the product price 
<td><?php echo "$".$product["price"]; ?></td>
<td><?php echo "$".$product["price"]*$product["quantity"]; ?></td>
</tr>
<?php
$total_price=0;
$total_price += ($product["price"]*$product["quantity"]);
}
?>
<tr>
<td colspan="5" align="right">
<strong>TOTAL: <?php echo "$".$total_price; ?></strong>
</td>
</tr>
</tbody>
</table>

<button onclick="myFunction()" class="button" style="vertical-align:middle"type ="reset"><span>Buy</span></button>
    <script>
function myFunction(){
    <?php // after user click buy then stock will decrease and the session will be destored.
    foreach($_SESSION['shopping_cart'] as $key => $value) {
    $id1=$value['idp'];
    $db=mysqli_connect("localhost","root","","flower_story");

    $stock1= $value['stock'] - $value['quantity'];
    $q="UPDATE roses SET ProdcutStock='$stock1' WHERE ProductID='$value[idp]'";
    $query=mysqli_query($db,$q);

	unset($_SESSION["shopping_cart"][$key]);

		}
    ?>
  window.location.href = "Product.html";
}  </script></center>
</body>


</html>
