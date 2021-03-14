<?php 

include 'connection.php';
function getData_redis(){
 
  $redis = new Redis();
  $redis->connect("redis",6379);
  $keys = 'user';

  if(!$redis->get($keys)){
    try{
      $db_Factory = new connectionFactory();
      $db_Factory->setDriver('mariaDB');
      $conn = $db_Factory->connect("mariadb","root","root","Todolist2");
    //  echo "database";
      if (!$conn) {
             die('Could not connect: ' . mysqli_connect_errno());
      }
        //select all value from database
         $getValue = "select a.intId , a.strTitle ,a.flagStatus from user a;"; 
         $result = $conn->query($getValue);
         $arrRes=[];
         //checks the number of rows in the table
         if($result->num_rows > 0){
           while($row = $result->fetch_assoc()){
             //save the newly retrieved data
           $arrRes[] = [
               "intId" => $row["intId"],
               "strTitle" => $row["strTitle"],
               "flagStatus" => $row["flagStatus"]
             ];
           }
          
           //data response for client
           $arrResponse = [
            "success" => true,
            "code"=>200,
            "data" => $arrRes ,
            "error" => "",
            "message" => "Get data successfully."
           ];
            $redis->set($keys,serialize($arrResponse)); //set data first time
            $redis->expire($keys,36000); //remove after 10 hours
           echo json_encode( $arrResponse);
         }
        mysqli_close($conn);
    
     }catch(Exception $e){
      echo new Exception("Can't load data from server");
     }
  }else{
    $user = unserialize($redis->get($keys));
    $a = json_encode($user);
  }
  print_r($a);
}

 
getData_redis();




    