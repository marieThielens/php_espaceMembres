<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Document</title>
  	<!--<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">-->
<link rel="stylesheet" href="assets/style.css">

</head>
<body>


<?php
session_start();

if (isset($_SESSION['user_username'])) //isset($_SESSION['user_id']) AND 
{
    echo 'Bonjour ' . $_SESSION['user_username'];
}
?>

<header>
<section id="sectionHeader">

    <div id="nav">
      <nav>
        <ul>
          <li><a href="inscription.php">S'inscrire</a></li>
          <li><a href="minichat.php">Chat</a></li>
        </ul>
      </nav>
      </div>

</section>

</header>

