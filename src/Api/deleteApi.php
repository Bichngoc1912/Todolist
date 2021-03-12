<?php 
function delete($value_to_delete){
    $redis = new Redis();
    $redis->connect("redis",6379);
  
    $keys = 'user';

    $serverName = "mariadb";
    $userName = "root";
    $passWord = "root";
    $dbName = "Todolist2";
  
    $conn = mysqli_connect($serverName, $userName, $passWord, $dbName);
    //check connection to database
    if (!$conn) {
           die('Could not connect: ' . mysqli_connect_errno());
    }
    //query delete data
    $delQuery = "DELETE FROM user WHERE intId = $value_to_delete";
      if(!empty($value_to_delete) && mysqli_query($conn,$delQuery)){
          
          if($redis->get($keys)){
            echo "Delete item succesfully";
              $redis->DEL($keys);
          }
      }
      echo "Error deleting item :" . mysqli_errno($conn); //show error if condition false
    mysqli_close($conn);
}
delete($_POST['intId']);
