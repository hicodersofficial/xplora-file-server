<!DOCTYPE html>
<html lang="en">

<?php define("ROOT", "xplora-file-server") ?>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/<?php echo ROOT ?>/styles/styles.css">
    <link rel="stylesheet" href="/<?php echo ROOT ?>/vendor/bootstrap.css">
    <title>Page Not Found | 404</title>
</head>

<body>
    <section class="container-404">
        <img src="/<?php echo ROOT ?>/assets/images/404.png" alt="404" srcset="" class="error-img">
        <br />
        <h1>Oops!</h1>
        <h5 class="error-msg">The item you are looking for was not found.</h5>
        <br />
        <a href="/" class="btn btn-danger" type="button">Back to home</a>
    </section>
</body>

</html>