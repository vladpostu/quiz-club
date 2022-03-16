<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./../styles/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css"
        integrity="sha512-9usAa10IRO0HhonpyAIVpjrylPvoDwiPUiKdWk5t3PyolY1cOd4DSE0Ga+ri4AuTroPR5aQvXU9xC6qOPnzFeg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Quiz Page - Quiz Club</title>
</head>

<body>

    <?php 
        session_start();
        if(($_SESSION['token'] != '')) {
            echo "<input id='token' class='hidden' value=".$_SESSION['token'].">";
        }
    ?>

    <div class="content">
        <img src="./../assets/imgs/Cloudy.svg" class="background" alt="">
        <div class="quiz">
            <a href="./../index.php" class="fs-6">GO BACK TO THE HOMEPAGE</a>
            <form id="container" method="post" class="mt-4" action="../api/submit_data.php">
                <div id="question_id_text">Question n. <span id="question_id"></span></div>
                <div id="question_text"></div>
                <div id="question_container"></div>
                <div class="control-buttons mt-3">
                    <button type="button" id="prev_question_button" class="control-button">PREVIOUS</button>
                    <button type="button" id="next_question_button" class="control-button">NEXT</button>
                </div>

                <!-- Button trigger modal -->
                <button type="button" class="btn btn-primary mt-3" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                    Finish Quiz
                </button>

                <div class="danger mt-5">
                    <p class="ps-2"><strong>Info</strong> <br> When you go back to the previous question the answer is refreshed but is still stored unitil you change it</p>
                  </div>

                <!-- Modal -->
                <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false"
                    tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="staticBackdropLabel">Answers</h5>
                            </div>
                            <div class="modal-body">
                                
                            </div>
                            <div class="modal-footer">
                                <button type="submit" class="btn btn-primary mt-4" id="submit_button" name="user_score"
                                    value="0">Submit
                                    Quiz</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>


    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
        crossorigin="anonymous"></script>
    <script src="./../scripts/js.js"></script>
</body>

</html>