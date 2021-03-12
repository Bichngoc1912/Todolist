<?php
 
     function changeStatus($itemId){
      $redis = new Redis();
      $redis->connect("redis",6379);
     
       $keys = 'user';
      if(empty($itemId)){
         echo "id empty!";
      }else{
         $serverName = "mariadb";
         $userName = "root";
         $passWord = "root";
         $dbName = "Todolist2";

         $conn = mysqli_connect($serverName, $userName, $passWord, $dbName);
         if(!$conn){
            die('Could not connect: ' . mysqli_connect_errno());
         }
         //query select item to delete
         $flagStatus = "SELECT flagStatus FROM user WHERE intId = $itemId"; 
         $res = $conn->query($flagStatus);
         $row = $res->fetch_assoc();
       
         $changeStatus_0 = "UPDATE user SET flagStatus = false WHERE flagStatus=true and intId = $itemId"; //if status = 1 -> change = 0
         $changeStatus_1 = "UPDATE user SET flagStatus = true WHERE flagStatus=false and intId = $itemId"; //if status = 0 -> change = 1
         if($redis->get($keys)){
            $redis->DEL($keys);
            if($row['flagStatus'] == 1 && mysqli_query($conn,$changeStatus_0) ){
               echo "change success.";
            }else if($row['flagStatus'] == 0 && mysqli_query($conn,$changeStatus_1)){
               if($redis->get($keys)){
                  $redis->DEL($keys);
                  echo "change success.";
               }
            }else{
               echo "error:" . mysqli_errno($conn);
            }
      }
      }
     }
  
     
     changeStatus($_POST['intId']);