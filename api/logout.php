
<?php 

    session_start();

    $_SESSION['isLogged'] = false;
    $_SESSION['username'] = "";

    header('Location: ./../index.php');
?>