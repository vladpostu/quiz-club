
<?php 

    session_start();
    require_once(__DIR__ . './../model/User.php');

    $username = $_POST['username'];
    $password = $_POST['password'];

    $user = new User($username, password_hash($password, PASSWORD_DEFAULT));
    $user->insert();
    $id_user->id_user;

    $_SESSION['isLogged'] = true;
    $_SESSION['username'] = $username;
    $_SESSION['id_user'] = $id_user;

    header('Location: ./../index.php');
?>