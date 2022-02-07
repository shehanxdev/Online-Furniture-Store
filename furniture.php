<!DOCTYPE html>
<html>
	<head>
		<link rel="stylesheet" href="styles.css"/>
		<title>RR's Furniture- Our Furniture</title>
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
<img src="images/randombanner.php"/>
	<main class="admin">

	<section class="left">
		<?php include 'categories.php';?>
	</section>

	


	<?php
include 'dbConnection.php';
$categoryQuery = $pdo->prepare('SELECT * FROM category');
$categoryQuery->execute();

$categories = [];
foreach ($categoryQuery as $category) {
    $categories[$category['id']] = $category['name'];
}

$categoryId = isset($_POST['categoryId']) ? $_POST['categoryId'] : 0;
$condition = isset($_POST['condition']) ? $_POST['condition'] : 0;

?>

<section class="right">

<h1><?php echo $categoryId == 0 ? "Furniture" : $categories[$categoryId]; ?></h1>


<ul class="furniture" style="clear: left;">

<?php
$furnitureQuerySQL = 'SELECT * FROM furniture WHERE hide = 0';
if ($categoryId != 0) {
    $furnitureQuerySQL .= ' AND categoryId = ' . $categoryId;
}
if ($condition != 0) {
    $furnitureQuerySQL .= ' AND `condition` = ' . $condition;
}
$furnitureQuery = $pdo->prepare($furnitureQuerySQL);
$furnitureQuery->execute();

$numResults = $furnitureQuery->rowCount();
if ($numResults > 0) {
    echo "<p>Number of items: " . $numResults . "</p>";
    foreach ($furnitureQuery as $furniture) {  /*total number of results */ 
        echo '<li>';

        if (file_exists('images/furniture/' . $furniture['id'] . '.jpg')) {
            echo '<a href="images/furniture/' . $furniture['id'] . '.jpg"><img src="images/furniture/' . $furniture['id'] . '.jpg" /></a>';
			 
					}

        echo '<div class="details">';  /*for details */ 
        echo '<h2>' . $furniture['name'] . ($furniture['condition'] == 1 ? '(New)' : '(Second hand)') . '</span></h2>';
        echo '<h3>' . $categories[$furniture['categoryId']] . '</h3>';
        echo '<h4>£' . $furniture['price'] . '</h4>';
        echo '<p>' . $furniture['description'] . '</p>';  /*for description */ 
        echo '<form action="payment.php" method="GET">
		<input type="number" name="quantity" id="quantity" placeholder="quantity you want to buy" required>
		<input type="hidden" name="price" id="price" value='.$furniture["price"].' >
		<input style="margin-left:0" type="submit" value="Buy">
	</form>';
	echo '<form action="cart.php" method="GET">
	<input type="hidden" name="id" value='.$furniture["id"].'>
	<input type="hidden" name="hidden_name" value='.$furniture["name"].'>
	<input type="hidden" name="hidden_price" value='.$furniture["price"].'>
	<input type="number" name="quantity" placeholder="enter the quantity">
	<input type="submit" name="add_to_cart" >
	</form>';
        echo '</div>';
        echo '</li>';
		}
	
} else {
    echo "<h2>No products match your filters. TRY AGAIN. </h2>";
}


?>

</ul>

</section>
	</main>


	<footer>
		&copy; RR's Furniture <?php

echo date("Y");

?>
	</footer>
</body>
</html>
