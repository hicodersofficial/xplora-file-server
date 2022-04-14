<?php
// default timezone
date_default_timezone_set("Asia/Kolkata");

// Images extensions
define("IMG_EXTS", ["png", "jpg", "jpeg", "tiff", "tif", "svg", "webp", "gif", "ico"]);
define("VIDEOS_EXTS", ["mp4", "3gp", "mov", "webm"]);
define("AUDIO_EXTS", ["mp3", "ogg", "pcm", "aiff", "wav", "acc", "wma", "flac"]);
define("EXCL_EXTS", ["dockerfile", "conf", "config", "configuration"]);
define("EXCLUDES", [".", "..", '$recycle.bin', "system volume information", ".htaccess", "app", "index.php"]);

// root directory
$ROOT_PATH = "/";

$scan = [];
$keyword;
$notFound = false;
$files = [];

if (isset($_GET["dir"]) && !empty($_GET["dir"]) && $_GET["dir"] !== "/") {
    $ROOT_PATH =  normalize_path($_GET["dir"]);
}

if (isset($_GET["s"]) && !empty($_GET["s"])) {
    $keyword = $_GET["s"];
}
if (is_dir($ROOT_PATH)) {
    $scan  = scandir($ROOT_PATH,);
} else {
    $notFound = true;
}

for ($i = 0; $i < count($scan); $i++) {
    $src = strtolower($scan[$i]);
    if (!in_array($src, EXCLUDES)) {
        $path = $ROOT_PATH . $scan[$i];
        $created_at = stat($path)[10];
        $size = stat($path)[7];
        $file_name = $scan[$i];
        $ext_name = ext_name($src, false);
        $is_dir = is_dir($path);
        $is_file = is_file($path);

        if (!empty($keyword)) {
            if (preg_match_all("/" . $keyword . "/i", $src)) {
                array_push(
                    $files,
                    [
                        "created_at" => $created_at,
                        "size" => $size,
                        "src" => $src,
                        "file_name" => $file_name,
                        "path" => $path,
                        "ext" => $ext_name,
                        "is_dir" => $is_dir,
                        "is_file" => $is_file
                    ]
                );
            } else {
                continue;
            }
        } else {
            array_push(
                $files,
                [
                    "created_at" => $created_at,
                    "size" => $size,
                    "src" => $src,
                    "file_name" => $file_name,
                    "path" => $path,
                    "ext" => $ext_name,
                    "is_dir" => $is_dir,
                    "is_file" => $is_file
                ]
            );
        }
    }
}

$json = json_decode(file_get_contents("/app/data/files.json"), true);
