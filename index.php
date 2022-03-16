<?php 

session_start();
require_once('./model/db.php');
$conn = connect();

$token_url = "https://opentdb.com/api_token.php?command=request";
$handle = curl_init();

curl_setopt($handle, CURLOPT_RETURNTRANSFER, true);
curl_setopt($handle, CURLOPT_URL, $token_url);

$result = curl_exec($handle);

$result = file_get_contents($token_url);
$array = json_decode($result, true);
$token = $array['token'];

$_SESSION['token'] = '';
$_SESSION['token'] = $token;

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel='icon' href='https://cdn-icons.flaticon.com/png/512/3261/premium/3261259.png?token=exp=1647426186~hmac=d0fe57159ea696a9c589e19ad4c03143'/>
    <link rel="stylesheet" href="./styles/style.css">
    <title>Quiz Club Application</title>
</head>

<body>

    <div class="content">
        <div class="header">
            <nav class="navbar">
                <div class="left">
                    <div class="navbar-element" id="logo">Quiz Club</div>
                    <div class="navbar-element">by Vlad Postu</div>
                </div>
                <div class="right">
                    <?php if ($_SESSION['isLogged'] && isset($_SESSION['isLogged'])) { ?>
                        <div class="navbar-element">Hello <?php echo $_SESSION['username']; ?></div>
                        <form action="./api/logout.php"><button class="btn btn-danger navbar-element" type="submit">Logout</button></form>
                    <?php } else { ?>
                        <a href="./pages/login.html" class="navbar-element" id="login">Login</a>
                        <a href="./pages/register.html" class="navbar-element" id="register">Register</a>
                    <?php } ?>
                </div>
            </nav>
        </div>

        <div class="presentation">
            <img src="./assets/imgs/5.svg" id="svg_5" alt="">
            <div style="font-size: 1.5rem;">welcome to</div>
            <div class="display-1" style="font-size: 7rem;">Quiz Club Project</div>
            <div style="font-size: 1.5rem;" class="pt-3">A space to unleash your general culture</div>

            <div class="mt-4">you must be logged to play</div>
            <button class="m-3">
                <span class="shadow"></span>
                <span class="edge"></span>
                <?php if($_SESSION['isLogged']) {?>
                    <a class="front text" href="./pages/quiz-page.php"> Test yourself</a>
                <?php } else { ?>
                    <a class="front text" style="pointer-events: none;" href="./pages/quiz-page.php"> Test yourself</a>
                <?php }?>
            </button>
            <img class="mt-5 pt-2" src="./assets/imgs/1.svg" alt="">
        </div>

        <div class="ranking">
            <h2 class="display-5">Ranking Placements</h2>
            <img src="./assets/imgs/9.svg" id="svg-9" alt="">
            <div class="ranking-container pt-5">
                <div class="best-ranking ranking-element">
                    <h4>Best solo ranking</h4>
                    <div class="d-flex flex-column">
                        <?php
                        $ranking_query = "SELECT * FROM scores INNER JOIN users ON users.id_user = scores.id_user ORDER BY score DESC";
                        $ranking = $conn->query($ranking_query);

                        if ($ranking->rowCount() > 0) {
                            while ($row = $ranking->fetch()) {
                                echo "<div class='d-flex flex-row justify-content-between border-bottom'>";
                                echo '<div> ' . $row['username'] . '</div>';
                                echo '<div> ' . $row['score'] . '</div>';
                                echo "</div>";
                            }
                        }
                        ?>
                    </div>
                </div>
                <div class="best-ranking ranking-element">
                    <h4>Best users ranking</h4>
                    <?php
                    $best_ranking_query = "SELECT username, SUM(scores.score) AS score FROM scores INNER JOIN users ON users.id_user = scores.id_user GROUP BY (users.id_user) ORDER BY score DESC";
                    $best_ranking = $conn->query($best_ranking_query);

                    if ($best_ranking->rowCount() > 0) {
                        while ($row = $best_ranking->fetch()) {
                            echo "<div class='d-flex flex-row justify-content-between border-bottom'>";
                            echo '<div> ' . $row['username'] . '</div>';
                            echo '<div> ' . $row['score'] . '</div>';
                            echo "</div>";
                        }
                    }
                    ?>
                </div>
            </div>
            <?php
            ?>
        </div>

        <footer class="footer">
            made by Vlad Postu
        </footer>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
                    <script src="./scripts/js.js"></script>
</body>

</html>
