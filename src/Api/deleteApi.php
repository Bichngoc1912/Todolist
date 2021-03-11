<?php 
function delete($value_to_delete){
 

 $serverName = "mariadb";
  $userName = "root";
  $passWord = "root";
  $dbName = "Todolist2";

  $conn = mysqli_connect($serverName, $userName, $passWord, $dbName);
  if (!$conn) {
         die('Could not connect: ' . mysqli_connect_errno());
  }else{
     
     if($value_to_delete=="" || empty($value_to_delete)){
          echo "param empty!";
     }else{
        $delQuery = "DELETE FROM user WHERE intId = $value_to_delete";
        if(mysqli_query($conn,$delQuery)){
            echo "Delete item succesfully";
        }else{
            echo "Error deleting item :" . mysqli_errno($conn);
        }
     }
  }
  mysqli_close($conn);
}
delete($_POST['intId']);

