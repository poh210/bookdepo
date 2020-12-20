<?php
include_once("dbconnect.php");

//delete operation
if(isset($_GET['operation'])){
   $id = $_GET['id'];
    try{
      $sql = "DELETE FROM book WHERE id='$id'";
      //use exec() because no results are ruturned
      $conn->exec($sql);
      echo "<script> alert('Deleted Successfully');</script>";
      
    } catch(PDOException $e) {
      echo "<script> alert('Failed to delete!');</script>";
      
     }
}




try {

    $sql = "SELECT * FROM book ORDER BY title ASC";
    $stmt = $conn->prepare($sql );
    $stmt->execute();
    // set the resulting array to associative
    $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
    $book = $stmt->fetchAll(); 

    echo "<h2>Your Books</h2>" ;
    echo "<table border='3'>
    <tr>
       <th>Tittle</th>
       <th>Author</th>
       <th>Price(RM)</th>
       <th>Description</th>
       <th>Publisher</th>
       <th>ISBN10</th>
       <th>Operation</th>
    </tr>";
   
    //loop for data
    foreach($book as $book) {
        echo"<tr>";
        echo"<td>".$book['title']."</td>";
        echo"<td>".$book['author']."</td>";
        echo"<td>".$book['price']."</td>";
        echo"<td>".$book['description']."</td>";
        echo"<td>".$book['publisher']."</td>";
        echo"<td>".$book['isbn10']."</td>";
        "<td>".$book['id']."</td>";
        echo "<td><a href='update.php?id=".$book['id']."&title=".$book['title']."&author=".$book['author']."&price=".$book['price']."&description=".$book['description']."&publisher=".$book['publisher']."&isbn10=".$book['isbn10']."'>Update</a><br>
        <a href='mainpage.php?id=".$book['id']."&operation=del' onclick=\"javascript:return confirm('Confirm to delete?');\">Delete</a></td>";
        echo"</tr>";
      }
      echo"</table>";  
      echo "<p><a href='insert.php'>Insert new book</a></p>";
   
      }catch(PDOException $e){
          echo "Error: " . $e->getMessage();
      }  
       
      $conn = null;  



?>