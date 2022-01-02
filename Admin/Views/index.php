<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link rel="icon" href="Public\images\logo2.png">
    <link rel="stylesheet" href="Public\style.css">
    <link rel="stylesheet" href="Public\dist\css\bootstrap.min.css">
    <title>ShopQR</title>
    <style>
        .cover-container {
            max-width: fit-content;
        }
    </style>
</head>

<body class="d-flex h-100 text-center text-white bg-dark">

    <div class="cover-container d-flex w-100 h-100 p-3 mx-auto flex-column">

        <?php 
        require_once("header_footer/header.php");
        ?>

        <?php 
        require_once("direct.php");
        ?>

        <?php 
        require_once("header_footer/footer.php");
        ?>

    </div>

    <script src="Public\dist\js\bootstrap.bundle.min.js"></script>
    <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script> -->
    <script src="Public\js\select.js"></script>
</body>

</html>