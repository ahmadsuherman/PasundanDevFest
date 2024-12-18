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

if(!function_exists('getAvatar')){
    function getAvatar($avatar)
    {
        return $avatar ? $avatar : asset('default-avatar.jpg');
    }
}

if(!function_exists('getImages')){
    function getImages($images)
    {
        return $images ? $images : asset('default-event.png');
    }
}

if(!function_exists('formatDateTime')){
    function formatDateTime($dateTime)
    {
        $date = date('F d, Y', strtotime($dateTime));

        // Format jam menjadi "H:i" (contoh: 11:00)
        $time = date('H:i', strtotime($dateTime));

        // Gabungkan format menjadi satu string
        return "{$date} — {$time} WIB";
    }
}


