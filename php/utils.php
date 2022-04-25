<?php
function randomColor($minVal = 0, $maxVal = 255)
{
    $minVal = $minVal < 0 || $minVal > 255 ? 0 : $minVal;
    $maxVal = $maxVal < 0 || $maxVal > 255 ? 255 : $maxVal;
    $r = mt_rand($minVal, $maxVal);
    $g = mt_rand($minVal, $maxVal);
    $b = mt_rand($minVal, $maxVal);
    return sprintf('#%02X%02X%02X', $r, $g, $b);
}

function normalize_path($path)
{
    $start_path = preg_replace("/^(\.?\/+)/i", "", $path) . "//";
    return str_replace("//", "/", $start_path);
}

function my_url_param_parser($url, $key, $value)
{
    $regex = "/($key.+&)|($key.+)/i";
    if (preg_match($regex, $url)) {
        return preg_replace($regex, "&$key=$value&", $url);
    } else if (preg_match("/\?/i", $url)) {
        return  $url . "&$key=$value";
    } else {
        return  $url . "?$key=$value";
    }
}

function delTree($dir)
{
    $files = array_diff(scandir($dir), array('.', '..'));

    foreach ($files as $file) {
        (is_dir("$dir/$file")) ? delTree("$dir/$file") : unlink("$dir/$file");
    }

    return rmdir($dir);
}


function zipDir($dir, $zip)
{
    $files = array_diff(scandir($dir), array('.', '..'));
    foreach ($files as $file) {
        $full_path = str_replace("//", "/", $dir . "/" . $file);
        if (is_dir($full_path)) {
            zipDir($full_path, $zip);
        } else {
            $zip->addFile($full_path, $full_path[0] == "/" ? ltrim($full_path, $full_path[0]) : $full_path);
        }
    }
}

function ext_name($path, $dot = true)
{
    $splits = explode(".", $path);
    if (count($splits) > 1) {
        $ext =  $splits[count($splits) - 1];
        return  $dot ? "." . $ext : $ext;
    } else {
        return  "";
    }
}

$file_index = 0;

function resolve_file_name($target_dir, $file_name, $ext)
{
    $name = $file_name . $ext;
    $target_file = $target_dir . $name;

    if (file_exists($target_file)) {
        $GLOBALS["file_index"] += 1;
        $index = "-" . $GLOBALS["file_index"];
        echo preg_match("/-[1-9]$ext\$/", $name);
        if (preg_match("/-[1-9]$ext\$/", $name)) {
            return resolve_file_name($target_dir, preg_replace("/-[1-9]$ext\$/", $index, $name), $ext);
        }
        return resolve_file_name($target_dir, $file_name . $index, $ext);
    } else {
        return $name;
    }
}
