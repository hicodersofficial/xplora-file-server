<?php
// default timezone
date_default_timezone_set("Asia/Kolkata");

// root directory
$ROOT_PATH = "./";

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
    if ($ROOT_PATH == "./" && in_array($src, XFS_EXC)) {
        continue;
    }
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

usort($files, function ($item1, $item2) {
    if ($item1['created_at'] == $item2['created_at']) return 0;
    return ($item1['created_at'] < $item2['created_at']) ? 1 : -1;
});

$json = json_decode(file_get_contents(ROOT . "/data/files.json"), true);
