<?php
require_once "utils.php";
require_once "./app/php/app.php";

if (isset($_FILES["file"]) && isset($_POST["filename"])) {
    $file_counts = count($_FILES['file']['name']);
    for ($i = 0; $i < $file_counts; $i++) {
        $file = $_FILES['file']['tmp_name'][$i];
        $target_dir = $ROOT_PATH;
        $exts = explode('.', $_FILES['file']['name'][$i]);
        $target_file;
        $date = date('m-d-Y_h-i-s');
        if (!empty($_POST["filename"])) {
            $target_file = $target_dir . $_POST["filename"] . "." . $exts[count($exts) - 1] . '__' . $date . '__' . random_int(1000, 10000000) . '.' . $exts[count($exts) - 1];
        } else {
            $basename =
                basename($_FILES["file"]["name"][$i]);
            $target_file = $target_dir . $basename . '__' . $date . '__' . random_int(1000, 10000000) . '.' . $exts[count($exts) - 1];
        }
        move_uploaded_file($_FILES['file']['tmp_name'][$i],  $target_file);
    }
    header('Location: ' . $_SERVER['REQUEST_URI']);
    exit();
}

if (isset($_POST["dirname"]) && !empty($_POST["dirname"])) {
    $dirname = $_POST["dirname"];
    mkdir(normalize_path($ROOT_PATH . $dirname), 0777, true);
    if (!empty(isset($_POST["navigate"])) && $_POST["navigate"] == "true") {
        header('Location: ' . $_SERVER['PHP_SELF'] . "?dir=" . $ROOT_PATH . $dirname);
    } else {
        header('Location: ' . $_SERVER['REQUEST_URI']);
    }
    exit();
}
