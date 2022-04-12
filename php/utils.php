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
    return str_replace("//", "/", "/" . $path . "/");
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
