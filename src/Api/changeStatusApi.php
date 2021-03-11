<?php
   
     function changeStatus($itemId){
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
         }else{
            $flagStatus = "SELECT flagStatus FROM user WHERE intId = $itemId"; 
            $res = $conn->query($flagStatus);
            $row = $res->fetch_assoc();
            if($row['flagStatus'] == 1 ){
               $changeStatus = "UPDATE user SET flagStatus = false WHERE flagStatus=true and intId = $itemId";
               if(mysqli_query($conn,$changeStatus)){
                  echo "change success.";
               }else{
                  echo "error:" . mysqli_errno($conn);
               }
            }else{
               $changeStatus = "UPDATE user SET flagStatus = true WHERE flagStatus=false and intId = $itemId";
               if(mysqli_query($conn,$changeStatus)){
                  echo "change success.";
               }else{
                  echo "error:" . mysqli_errno($conn);
               }   
            }
            
         }
      }
     }
     
     changeStatus($_POST['intId']);