<?php 
// phpinfo();
function postData($param){
  $serverName = "mariadb";
  $userName = "root";
  $passWord = "root";
  $dbName = "Todolist2";

  $conn = mysqli_connect($serverName, $userName, $passWord, $dbName);
  //if connection is not successful you will see text error
  if (!$conn) {
         die('Could not connect: ' . mysqli_connect_errno());
  }else{
     $insertValue = "insert into user(strTitle,flagStatus)
     values ('$param',false);"; 
     if($param==""){
          echo "param empty!";
     }else{
        if(mysqli_query($conn,$insertValue)){
          echo "add item successfully!";
        }else{
          echo "error:" .$insertValue ."</br>" .mysqli_error($conn);
        }
     }
  }
  mysqli_close($conn);
   }
   postData($_POST['strTitle']);
