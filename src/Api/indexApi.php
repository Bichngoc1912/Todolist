<?php 
 try{
  $serverName = "mariadb";
  $userName = "root";
  $passWord = "root";
  $dbName = "Todolist2";

  $conn = mysqli_connect($serverName, $userName, $passWord, $dbName);
 
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
        echo json_encode( $arrResponse);
     }
  mysqli_close($conn);

 }catch(Exception $e){
  echo new Exception("Can't load data from server");
 }
    




    