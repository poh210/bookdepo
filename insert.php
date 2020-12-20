<?php
include_once("dbconnect.php");

if(isset($_GET['title'])){
    $title = $_GET['title'];
    $author = $_GET['author'];
    $price = $_GET['price'];
    $description = $_GET['description'];
    $publisher = $_GET['publisher'];
    $isbn10 = $_GET['isbn10'];

  try{
    $sql = "INSERT INTO book (title, author, price, description, publisher, isbn10)
    VALUES ('$title','$author','$price','$description','$publisher','$isbn10')";
    //use exec() because no results are returned
    $conn->exec($sql);
    echo "<script> alert('Insert Successfully');</script>";
    echo "<script> window.location.replace('mainpage.php') </script>;";
  } catch(PDOException $e) {
    echo "<script> alert('Insert Error');</script>";
      
  }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Main Page</title>
</head>  

<body>
<h2>Insert New Book</h2>

<form action="insert.php" >
  <label for="title">Title:</label><br> 
  <input type="text" id="title" name="title" required><br>

  <label for="author">Author:</label><br>
  <input type="text" id="author" name="author" required><br>

  <label for="price">Price(RM):</label><br>
  <input type="text" id="price" name="price" required><br>

  <label for="description">Description:</label><br>
  <input type="text" id="description" name="description" required><br>


  <label for="publisher">Publisher:</label><br>
  <input type="text" id="publisher" name="publisher" required><br>

  <label for="isbn10">ISBN10:</label><br>
  <input type="text" id="isbn10" name="isbn10" required><br><br>
  <input type="submit" value="Submit"><br><br>
  <a href="index.html">Back to Homepage</a>


</body>
</html>