<?php

namespace App\Helpers;

if (!function_exists('getDistanceBetweenPoints')) {


    function getDistanceBetweenPoints(float $latitude1, float $longitude1, float $latitude2, float $longitude2): float
    {
        $theta = $longitude1 - $longitude2;
        $distance = (sin(deg2rad($latitude1)) * sin(deg2rad($latitude2))) + (cos(deg2rad($latitude1)) * cos(deg2rad($latitude2)) * cos(deg2rad($theta)));
        $distance = acos($distance);
        $distance = rad2deg($distance);
        $distance = $distance * 60 * 1.1515;
        $distance = $distance * 1.609344;
        return (round($distance, 2));
    }
}