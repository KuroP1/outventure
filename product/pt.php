<?php
session_start();
if (!isset($_SESSION["currentUser"])) {
    header("Location: ../authentication/login.php");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Outventure</title>
    <link rel="stylesheet" href="../global.css">
    <link rel="stylesheet" href="pt.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <script src="../navbar.js"></script>
</head>

<body>
    <?php
    ini_set('display_errors', 1);
    error_reporting(E_ALL);
    require("../config/database.php");
    $viewSQL = "SELECT * FROM images ORDER BY ImageID";
    $res = mysqli_query($conn, $viewSQL);

    // image array
    $imageArray = array();

    if (mysqli_num_rows($res) > 0) {
        while ($images = mysqli_fetch_assoc($res)) {
            if ($images["ProductName"] == $_GET["name"]) {
                array_push($imageArray, $images["ImagePath"]);
            }
        }
    }
    ?>
    <!-- whole container -->
    <div class="main-container">
        <!-- slide show container -->
        <div class="slide-show-container">
            <!-- left react button -->
            <div class="left-react-button">
            </div>
            <!-- image -->
            <img class="slide" src="" alt="" width="500" height="500">
            <!-- right react button -->
            <div class="right-react-button">
            </div>
        </div>
    </div>
</body>

</html>

<script>
    // imageArray from php
    var imageArray = <?php echo json_encode($imageArray); ?>;

    // all array index
    var currentImageArrayIndex = 0

    // set first image
    document.querySelector(".slide").src = "../" + imageArray[currentImageArrayIndex]

    // handle image next or prev with passed action
    function handleImage(action) {
        if (action === "next") {
            if (currentImageArrayIndex < imageArray.length - 1) {
                currentImageArrayIndex++;
                document.querySelector(".slide").src = "../" + imageArray[currentImageArrayIndex]
            } else {
                currentImageArrayIndex = 0;
                document.querySelector(".slide").src = "../" + imageArray[currentImageArrayIndex]
            }
        } else {
            if (currentImageArrayIndex > 0) {
                currentImageArrayIndex--;
                document.querySelector(".slide").src = "../" + imageArray[currentImageArrayIndex]
            } else {
                currentImageArrayIndex = imageArray.length - 1;
                document.querySelector(".slide").src = "../" + imageArray[currentImageArrayIndex]
            }
        }
    }

    // add event listener to next and prev button
    var slideNext = document.querySelector(".right-react-button")
    slideNext.addEventListener("click", function() {
        handleImage("next")
    })
    var slidePrev = document.querySelector(".left-react-button")
    slidePrev.addEventListener("click", function() {
        handleImage("prev")
    })
</script>