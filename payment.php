<?php
if(isset($_GET['total'])){
    $total=$_GET['total'];
}
else{
    $price=$_GET['price'];
$quantity=$_GET['quantity'];
$total=$quantity*$price;
}
?>
<!DOCTYPE html>
<html>
	<head>
    

		<link rel="stylesheet" href="./payment.css"/>
		<title> RR's Furniture - Home</title>
	</head>
	<body>
	<header>
		<section>
			<aside>
				<h3>Opening Hours:</h3>
				<p>Mon-Fri: 09:00-17:30</p>
				<p>Sat: 09:00-17:00</p>
				<p>Sun: 10:00-16:00</p>
			</aside>
			<h1>RR Furniture</h1>
		</section>
	</header>
	<nav>
		<ul>
			<li><a href="index.php">Home</a></li>
			<li><a href="furniture.php">Our Furniture</a></li>
			<li><a href="about.php">About Us</a></li>
			<li><a href="contact.php">Contact us</a></li>
			<li><a href="faq.php">FAQs</a></li>


		</ul>

	</nav>


<br>
    <div class="pay">

     <center> 
        <br> <a class="aa" href="#" >Back</a><br><br> <br> 
        <h2>Total Amount</h2>
        
        <div> <img src="./images/banners/cards.png"   </div>
        
        <br> <br>
        
        <input type="text" name="" id="" value=&#36;<?php echo $total; ?>>
        <br><br><br><br>
        <div class="des"><p>All transfers are subject to review and could be delayed or stopped if we or your bank identify an issue.</p></div>

        <br><br>
        <button type="submit" name="paynow" id="" > Pay Now</button>

        



    </center>   


     </div>  
    <br> 


 






    
	<footer>
		&copy; RR's Furniture <?php

echo date("Y");

?>
	</footer>
</body>
</html>
