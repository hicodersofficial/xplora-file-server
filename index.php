<!DOCTYPE html>
<html lang="en">
<!-- Root Folder Name -->
<?php define("ROOT", "xplora-file-server") ?>
<?php require_once ROOT . "/php/constant.php"; ?>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel=" shortcut icon" href="<?php echo ROOT ?>/favicon.ico" type="image/x-icon">
    <link rel=" shortcut icon" href="<?php echo ROOT ?>/logo.png" type="image/png">
    <title>Hi Coders' Server</title>
    <link rel="stylesheet" href="<?php echo ROOT ?>/styles/styles.css">
    <link rel="stylesheet" href="<?php echo ROOT ?>/vendor/bootstrap.css">
    <link rel="stylesheet" href="<?php echo ROOT ?>/vendor/bootstrap-icons.css">
    <link rel="stylesheet" href="<?php echo ROOT ?>/vendor/css.gg.all.css">
    <script src="<?php echo ROOT ?>/vendor/bootstrap.js"></script>
    <script src="<?php echo ROOT ?>/vendor/axios.min.js"></script>
</head>

<body>
    <?php require_once ROOT . "/php/include.php"; ?>
    <?php require_once ROOT . "/php/body.php" ?>
</body>

</html>