<?php
    include 'components/mysql_connect.php';

    $data = json_decode(file_get_contents('php://input'), true);
    $userID = $data["username"];
    $userPassword = $data["password"];
    $userName = $data["name"];
    $userGender = $data["gender"];

    $query = "INSERT INTO user VALUES (?,?,?,?)";
    $statement = mysqli_prepare($con, $query);

    if($statement === false){
        //echo 'error2 <br>';
        echo json_encode($response);
        exit();
    }

    $bind = mysqli_stmt_bind_param($statement, "ssss", $userID, $userPassword, $userName, $userGender);

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

    mysqli_commit($con);

    $response["success"] = true;
    echo json_encode($response);
?>