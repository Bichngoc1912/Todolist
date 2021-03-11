<?php 
 try{
  $serverName = "mariadb";
  $userName = "root";
  $passWord = "root";
  $dbName = "Todolist2";

  $conn = mysqli_connect($serverName, $userName, $passWord, $dbName);
 
  if (!$conn) {
         die('Could not connect: ' . mysqli_connect_errno());
  }else{
     $getValue = "select a.intId , a.strTitle ,a.flagStatus 
     from user a;"; 
     $result = $conn->query($getValue);
     $arrRes=[];
     if($result->num_rows > 0){
       while($row = $result->fetch_assoc()){
       $arr = [
           "intId" => $row["intId"],
           "strTitle" => $row["strTitle"],
           "flagStatus" => $row["flagStatus"]
         ];
       $a = array_push($arrRes,$arr);
         
       }
       $arrResponse = [
        "success" => true,
        "code"=>200,
        "data" => $arrRes ,
        "error" => "",
        "message" => "Get data successfully."
       ];
        echo json_encode( $arrResponse);
     }else{
       echo "0 result";
     }
  }
   
  mysqli_close($conn);

 }catch(Exception $e){
  echo new Exception("Can't load data from server");
 }
    




    