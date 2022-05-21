<?php
    include 'components/mysql_connect.php';

    $data = json_decode(file_get_contents('php://input'), true);
    $userID = $data["username"];
    $userPassword = $data["password"];

    $query = "SELECT username, name, gender FROM user WHERE username = ? AND password = ?";
    $statement = mysqli_prepare($con, $query);

    if($statement === false){
        //echo 'error2 <br>';
        echo json_encode($response);
        exit();
    }

    $bind = mysqli_stmt_bind_param($statement, "ss", $userID, $userPassword);

    if($bind === false){
        //echo 'error3 <br>';
        echo json_encode($response);
        exit();
    }

    $exec = mysqli_stmt_execute($statement);

    if($exec === false){
        //echo 'error4 <br>';
        echo json_encode($response);
        exit();
    }

    $statement->bind_result($userID, $name, $gender);

    if(mysqli_stmt_fetch($statement)) {
        $response["username"] = $userID;
        $response["name"] = $name;
        $response["gender"] = $gender;
        $response["success"] = true;
    }

    echo json_encode($response);
?>