<?php
require_once ROOT . "/php/utils.php";
require_once ROOT . "/php/app.php";

if (isset($_FILES["file"]) && isset($_POST["filename"])) {
    $files = $_FILES['file']['name'];
    $file_counts = count($files);
    for ($i = 0; $i < $file_counts; $i++) {
        $file = $_FILES['file']['tmp_name'][$i];
        $basename =  str_replace(ext_name($files[$i]), "", $files[$i]);
        $file_name = !empty($_POST["filename"]) ? $_POST["filename"] : $basename;
        $target_file = $ROOT_PATH . resolve_file_name($ROOT_PATH, $file_name, ext_name($files[$i]));
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

if (!empty(isset($_POST["select"])) && !empty(isset($_POST["download"]))) {
    $paths = $_POST["select"];
    $zip = new ZipArchive();
    $zip_path = '/download_' . random_int(100, 1000000) . '.zip';
    if ($zip->open($zip_path, ZIPARCHIVE::CREATE | ZIPARCHIVE::OVERWRITE) != true) {
        die("Could not open archive");
    };
    $allPaths = [];
    foreach ($paths as $path) {
        if (is_dir($path)) {
            zipDir($path, $zip);
        } else {
            $zip->addFile($path, basename($path));
        }
    }
    $zip->close();

    if (file_exists($zip_path)) {
        header('Content-Description: File Transfer');
        header('Content-Type: application/octet-stream');
        header('Content-Disposition: attachment; filename=' . basename($zip_path));
        header('Content-Transfer-Encoding: binary');
        header('Expires: 0');
        header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
        header('Pragma: public');
        header('Content-Length: ' . filesize($zip_path));
        ob_clean();
        flush();
        readfile($zip_path);
        if (file_exists($zip_path)) {
            unlink($zip_path);
        }
        exit;
    }
}


if (!empty(isset($_POST["select"])) && !empty(isset($_POST["delete"]))) {
    $paths = $_POST["select"];
    if ($_POST["delete"] == "true") {
        foreach ($paths as $path) {
            if (is_dir($path)) {
                delTree($path);
            } else {
                unlink($path);
            }
        }
        header('Location: ' . $_SERVER['REQUEST_URI']);
        exit();
    }
}

if (!empty(isset($_POST["select"])) && !empty(isset($_POST["rename"]))) {
    $paths = $_POST["select"];
    $name = $_POST["rename"];
    foreach ($paths as $path) {
        $target_dir = str_replace(basename($path), "", $path);
        rename(
            $path,
            $target_dir . resolve_file_name($target_dir, $name, ext_name(basename($path)))
        );
    }
    header('Location: ' . $_SERVER['REQUEST_URI']);
    exit();
}
