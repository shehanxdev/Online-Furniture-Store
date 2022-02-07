<!DOCTYPE html>
<html>
	<head>
		<link rel="stylesheet" href="styles.css"/>
		<title>Fran's Furniture - Tables</title>
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
		<ul>
		<li><a href="beds.php">Beds</a></li>
        <li><a href="sofas.php">Sofas</a></li>

			<li><a href="wardrobes.php">Wardrobes</a></li>

            <li class="current"><a href="tables.php">Tables</a></li>
		<li><a href="chairs.php">Chairs</a></li>

		
		</ul>
	</section>

	<section class="right">

		<h1>Tables</h1>

	<ul class="furniture">


	<?php
	include 'dbConnection.php';
	$furnitureQuery = $pdo->prepare('SELECT * FROM furniture WHERE categoryId = 4 AND hide= 0');

	$furnitureQuery->execute();


	foreach ($furnitureQuery as $furniture) {
		echo '<li>';

		if (file_exists('images/furniture/' . $furniture['id'] . '.jpg')) {
			echo '<a href="images/furniture/' . $furniture['id'] . '.jpg"><img src="images/furniture/' . $furniture['id'] . '.jpg" /></a>';
		}

		echo '<div class="details">';
		echo '<h2>' . $furniture['name'] . '</h2>';
		echo '<h3>£' . $furniture['price'] . '</h3>';
		echo '<p>' . $furniture['description'] . '</p>';

		echo '</div>';
		echo '</li>';
	}

	?>

</ul>

</section>
	</main>


	<footer>
	&copy; Fran's Furniture <?php

echo date("Y");

?>
	</footer>
</body>
</html>
