<?php
    session_start();
    require_once(__DIR__ . './../model/db.php');
    require_once(__DIR__ . './../model/User.php');

    $conn = connect();

    $username = $_POST['username'];
    $password = $_POST['password'];

    $query = "SELECT * FROM users";
    $result = $conn->query($query);

    while($row = $result->fetch()){
        if(password_verify($password, $row['password'])) {
            $_SESSION['isLogged'] = true;
            $_SESSION['id_user'] = $row['id_user'];
            $_SESSION['username'] = $row['username'];
        }
    }

    header("Location: ../index.php");
    
?>
