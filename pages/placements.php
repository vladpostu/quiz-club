<?php
session_start();
require_once(__DIR__ . './../model/db.php');
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Quiz Club - Placements</title>
</head>

<body>

    <h2>Best solo ranking</h2>
    <?php

    $conn = connect();

    $ranking_query = "SELECT * FROM scores INNER JOIN users ON users.id_user = scores.id_user ORDER BY score DESC";
    $ranking = $conn->query($ranking_query);

    if ($ranking->rowCount() > 0) {
        while ($row = $ranking->fetch()) {
            echo $row['username'] . $row['score'] . "<br>";
        }
    }
    ?>

    <h2>Best solo raking combined</h2>
    <?php

    $best_ranking_query = "SELECT username, SUM(scores.score) AS score FROM scores INNER JOIN users ON users.id_user = scores.id_user GROUP BY (users.id_user) ORDER BY score DESC";
    $best_ranking = $conn->query($best_ranking_query);

    if ($best_ranking->rowCount() > 0) {
        while ($row = $best_ranking->fetch()) {
            echo $row['username'] . $row['score'] . "<br>";
        }
    }

    ?>
    <!-- SELECT username, SUM(scores.score) FROM scores INNER JOIN users ON users.id_user = scores.id_user GROUP BY (users.id_user) ORDER BY score DESC -->


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>

</html>