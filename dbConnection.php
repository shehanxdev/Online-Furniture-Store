<?php
  $host='127.0.0.1';
  $username='root';
  $password='';
  $db_name='furniture';
  try{
    $pdo=new PDO("mysql:host=$host;dbname=$db_name",$username,$password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
  }
  catch(PDOException $e){
    echo "Connection failed: " . $e->getMessage();
  }

?>