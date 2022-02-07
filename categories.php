<?php 
include 'dbConnection.php';?>

<ul>

<?php
$categories = $pdo->query('SELECT * FROM category');  /* to select from the table category*/
foreach ($categories as $category) { /* giving the variable to category*/
    $name = $category['name']; /* for category name*/
    $filename = strtolower($name) . '.php'; /* for the file name  */
    echo '<li>'; /* the link included*/
    echo '<a href="' . $filename . '">' . $name . '</a>'; /* for the name and the file name*/
    echo '</li>'; /*to echo li */
}
?>

</ul>