<?php

use Carbon\Carbon;

if (!function_exists('formatRupiah')) {
    function formatRupiah($number)
    {
        return 'Rp ' . number_format($number, 0, ',', '.');
    }
}

if(!function_exists('formatDateUpdatedAt')){
    function formatDateUpdatedAt($date)
    {
        $carbonDate = Carbon::parse($date);

        $formattedDate = $carbonDate->format('M d, Y \a\t h:i');

        $timeAgo = $carbonDate->diffForHumans();

        return $formattedDate . ' · ' . $timeAgo;
    }
}

if(!function_exists('formatDate')){
    function formatDate($date)
    {
        $carbonDate = Carbon::parse($date);

        $formattedDate = $carbonDate->format('d F, Y H:i');

        return $formattedDate;
    }
}

