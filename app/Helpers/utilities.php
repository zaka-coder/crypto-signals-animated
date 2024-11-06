<?php

if (!function_exists('theme')) {
    function theme($file)
    {
        return asset("theme/{$file}");
    }
}

if (!function_exists('landingTheme')) {
    function landingTheme($file)
    {
        return asset("landingTheme/{$file}");
    }
}
