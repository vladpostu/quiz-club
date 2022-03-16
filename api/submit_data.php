<?php
session_start();
require_once(__DIR__ . './../model/db.php');

$conn = connect();

$id_user = $_SESSION['id_user'];
$username = $_SESSION['username'];
$user_score = $_POST['user_score'];

$query = "INSERT INTO scores(id_user, score) 
                    VALUES('$id_user', '$user_score')";

$conn->exec($query);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./../styles/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" integrity="sha512-9usAa10IRO0HhonpyAIVpjrylPvoDwiPUiKdWk5t3PyolY1cOd4DSE0Ga+ri4AuTroPR5aQvXU9xC6qOPnzFeg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Document</title>
</head>

<body>
    <div class="content">
        <img src="./../assets/imgs/Cloudy.svg" class="background" alt="">
        <div class="quiz">
            <a href="./../index.php" class="fs-6">GO BACK TO THE HOMEPAGE</a>
            <h2 class="mt-3">Your score is <?php echo $user_score; ?></h2>
            <div id="right_answers"></div>
        </div>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="./../scripts/js.js"></script>
</body>

</html>