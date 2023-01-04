<?php
// database connection.
$db=mysqli_connect("localhost","root","","flower_story");

if(!$db){
 die("Cloud not connect to database");
}
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Update Product</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="css/styles.css" rel="stylesheet" type="text/css" />
</head>
<body>
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

	<!--update-->

    <!-- form to retirve information from the user. -->
  <h1><br><br>Update Product<br><br></h1>
  <form method='post' action=''>
    <?php
$db=mysqli_connect("localhost","root","","flower_story");
    if(!$db){
 die("Cloud not connect to database");
}
  if($query=mysqli_query($db,"select * from roses")){

?>


  <h2><center><table summery="This table discribes the update function"
                     font-size="19px"
          border="2"
             width="80"
             height="80">
      <thead><tr><th>ProducID</th>
        <th>ProdcutName</th>
          <th>ProdcutStock</th>
          <th>ProdcutSize</th>
          <th>ProductPrice</th></tr></thead>
      <tbody>
          <!-- looping read from the database the needed inforamtion. -->
  <?php while($row=mysqli_fetch_assoc($query)){ ?>
   <!--fetch product info -->
          <tr><td><?php echo $row['ProductID']; ?></td>
          <td><?php echo $row['ProdcutName']; ?></td>
          <td><?php echo $row['ProdcutStock']; ?></td>
          <td><?php echo $row['ProdcutSize']; ?></td>
          <td><?php echo $row['ProductPrice']; ?></td></tr>

  <?php }?>
</tbody>
      </table></center></h2>


        <?php }
        ?>
            </form>
<form method = "post" action ="">



<br><p> <label> Product ID : <br><br><input name="ProductID" type="text" size "25"  /> </label>
</p><br><br>


<p><label><strong >Catogery </strong>: <br><br>
<select name="category">
<option></option>
<option>Size</option>
<option>Stock</option>
<option>Price</option>
</select></label></p><br><br>

<p><label><strong>New Value of Product </strong>: <br><br>
<input name = "value" type="text"></label></p><br><br>

<p>


 <button onclick="myFunction()" class="button" style="vertical-align:middle"type ="reset"><span>Back</span></button>
    <script>
function myFunction() {
  window.location.href = "Admin.html";
}
</script>

<button class="button" style="vertical-align:middle" name="update" type="submit"><span>Update </span></button>
<button class="button" style="vertical-align:middle"type ="reset"><span>Clear </span></button>
</p>

    </form>

<?php $nameErr="";
      $nameErr1=""?>

 <?php



       // check if user enter value or no.
if(empty($_POST['ProductID']) || empty($_POST['value']) || empty($_POST['category'])){
 $nameErr = "<div class='message_box'style='margin:10px 0px;'><center style='font-size: 20px;'>NOTE : you should fill all the failed and shoose one option of category </center></div>";
}
// if the user enter data the following code will ecxute.
else if (isset($id) && isset($value) && isset($category)){

$id=$_POST['ProductID'];
$value=$_POST['value'];
$category=$_POST['category'];

if(($_POST['category']=="Size")){
     if(is_numeric($id)){
    $nameErr1 = "<div class='message_box'style='margin:10px 0px;'><center style='font-size: 20px;'>please, enter a valid product ID starting with a charachter followed <br><br> by numbers , </center></div>";
  }
if(is_numeric($value)){
  $nameErr=$nameErr1."<div class='message_box'style='margin:10px 0px;'><center style='font-size: 20px;'> the size must filled by character only  </center></div>";
}
else if (!is_numeric($id) && !is_numeric($value)){


    if($query=mysqli_query($db,"UPDATE roses SET ProdcutSize='$value' WHERE ProductID='$id'")) {
          $nameErr="<div class='message_box'style='margin:10px 0px;'><center style='font-size: 20px;'> successfully update the size </center></div>";
     }
else {
    $nameErr="<div class='message_box'style='margin:10px 0px;'><center style='font-size: 20px;'>  size not updated </center></div>";
}
}}




//cehck the stock

else if (($_POST['category']=="Stock")){
       if(is_numeric($id)){
    $nameErr1 = "<div class='message_box'style='margin:10px 0px;'><center style='font-size: 20px;'>please, enter a valid product ID starting with a charachter followed <br><br> by numbers , </center></div>";
  }
        if (!is_numeric($value)){
    $nameErr=$nameErr1."<div class='message_box'style='margin:10px 0px;'><center style='font-size: 20px;'> the stock filled with numbers only </center></div>";
        }
    else if (! is_numeric($id) && is_numeric($value)){
    if ($query=mysqli_query($db,"UPDATE roses SET ProdcutStock='$value' WHERE ProductID='$id'")){
    $nameErr="<div class='message_box'style='margin:10px 0px;'><center style='font-size: 20px;'> successfully update the stock </center></div>";
}
            else {
               $nameErr="<div class='message_box'style='margin:10px 0px;'><center style='font-size: 20px;'> stock not updated </center></div>";
            }

        }
}



// check the price

    else if (($_POST['category']=="Price")){
           if(is_numeric($id)){
    $nameErr1 = "<div class='message_box'style='margin:10px 0px;'><center style='font-size: 20px;'>please, enter a valid product ID starting with a charachter followed <br><br> by numbers , </center></div>";
  }
        if(!is_numeric($value)){

    $nameErr=$nameErr1."<div class='message_box'style='margin:10px 0px;'><center style='font-size: 20px;'> the price must filled with numbers only</center></div>";
        }
     else if (!is_numeric($id) && is_numeric($value)){
     if($query=mysqli_query($db,"UPDATE roses SET ProductPrice='$value' WHERE ProductID='$id'")){
         $nameErr="<div class='message_box'style='margin:10px 0px;'><center style='font-size: 20px;'> successfully update the price </center></div>";
     }
        else {
     $nameErr="<div class='message_box'style='margin:10px 0px;'><center style='font-size: 20px;'> the price not updated </center></div>";
}

    }}



}




   ?>

  <?php
   // display message to user.
    echo $nameErr;
$nameErr="";

    ?>

</div>
      </div>
    </div>
<!--  display footer to the page-->
    <div class="clear" id="end"></div>
  </div>

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
