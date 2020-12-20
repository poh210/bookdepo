<?php
include_once("dbconnect.php");
$id = $_GET['id'];
$title = $_GET['title'];
$author = $_GET['author'];
$price = $_GET['price'];
$description = $_GET['description'];
$publisher = $_GET['publisher'];
$isbn10 = $_GET['isbn10'];

if(isset($_GET['operation'])){
    try{
      $sqlupdate = "UPDATE book SET title='$title', author='$author', price='$price', description='$description', publisher='$publisher', isbn10='$isbn10' WHERE id='$id' ";
      //use exec() because no results are ruturned
      $conn->exec($sqlupdate);
      echo "<script> alert('Edited Successfully');</script>";
      echo "<script> window.location.replace('mainpage.php') </script>";
      
    } catch(PDOException $e) {
      echo "<script> alert('Failed to edit');</script>";
      
    
    }

}    

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Main Page</title>
</head>  

<body>
<h2>Edit New Details for <br> "<?php echo $title; ?>"</h2>

<form action="update.php" >
  <input type="hidden" id="id" name="id" value="<?php echo $id; ?>"><br> 

  <input type="hidden" id="operation" name="operation" value="update"><br>

  <label for="title">Tittle:</label><br>
  <input type="text" id="title" name="title" value="<?php echo $title; ?>" required><br>

  <label for="author">Author:</label><br>
  <input type="text" id="author" name="author" value="<?php echo $author; ?>" required><br>

  <label for="price">Price(RM):</label><br>
  <input type="text" id="price" name="price" value="<?php echo $price; ?>" required><br>

  <label for="description">Description:</label><br>
  <input type="text" id="description" name="description" value="<?php echo $description; ?>" required><br>


  <label for="publisher">Publisher:</label><br>
  <input type="text" id="publisher" name="publisher" value="<?php echo $publisher; ?>" required><br>

  <label for="isbn10">ISBN10:</label><br>
  <input type="text" id="isbn10" name="isbn10" value="<?php echo $isbn10; ?>" required><br><br>
  <input type="submit" value="Submit"><br><br>
  <a href="index.html">Back to Homepage</a>


</body>
</html>