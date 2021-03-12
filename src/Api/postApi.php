<?php 
function postData($param){
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
  //query insert data to database
  $insertValue = "insert into user(strTitle,flagStatus) values ('$param',false);"; 
  //check param and query 
  if(!empty($param) && mysqli_query($conn,$insertValue)){
      echo "add item successfully!";
      if($redis->get($keys)){
        $redis->DEL($keys);
      }
  }
  echo "error:" .$insertValue ."</br>" .mysqli_error($conn); // show error if condition false
  mysqli_close($conn);
}
postData($_POST['strTitle']);