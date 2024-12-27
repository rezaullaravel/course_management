<?php
use Carbon\Carbon;
 if (!function_exists('convertToBanglaDate')) {
    function convertToBanglaDate($date)
    {
        $englishNumbers = ['0', '1', '2', '3', '4', '5', '6', '7', '8', '9'];
        $banglaNumbers = ['০', '১', '২', '৩', '৪', '৫', '৬', '৭', '৮', '৯'];

        $englishMonths = [
            'January', 'February', 'March', 'April', 'May', 'June',
            'July', 'August', 'September', 'October', 'November', 'December'
        ];
        $banglaMonths = [
            'জানুয়ারি', 'ফেব্রুয়ারি', 'মার্চ', 'এপ্রিল', 'মে', 'জুন',
            'জুলাই', 'অগাস্ট', 'সেপ্টেম্বর', 'অক্টোবর', 'নভেম্বর', 'ডিসেম্বর'
        ];

        // Format date with month names
        $formattedDate = date('d-F-Y', strtotime($date));

        // Convert month names and numbers to Bangla
        $dateWithBanglaMonths = str_replace($englishMonths, $banglaMonths, $formattedDate);
        $dateInBangla = str_replace($englishNumbers, $banglaNumbers, $dateWithBanglaMonths);

        return $dateInBangla;
    }
}//end if

if (!function_exists('convertToBanglaTimeAgo')) {
    function convertToBanglaTimeAgo($date, $lang = 'en') {
        $timeAgo = Carbon::parse($date)->diffForHumans();

        if ($lang == 'bn') {
            $englishNumbers = ['0', '1', '2', '3', '4', '5', '6', '7', '8', '9'];
            $banglaNumbers = ['০', '১', '২', '৩', '৪', '৫', '৬', '৭', '৮', '৯'];

            $englishUnits = [
                'second ago', 'seconds ago',
                'minute ago', 'minutes ago',
                'hour ago', 'hours ago',
                'day ago', 'days ago',
                'week ago', 'weeks ago',
                'month ago', 'months ago',
                'year ago', 'years ago',
            ];

            $banglaUnits = [
                'সেকেন্ড আগে', 'সেকেন্ড আগে',
                'মিনিট আগে', 'মিনিট আগে',
                'ঘন্টা আগে', 'ঘন্টা আগে',
                'দিন আগে', 'দিন আগে',
                'সপ্তাহ আগে', 'সপ্তাহ আগে',
                'মাস আগে', 'মাস আগে',
                'বছর আগে', 'বছর আগে',
            ];

            $timeAgo = str_replace($englishUnits, $banglaUnits, $timeAgo);
            $timeAgo = str_replace($englishNumbers, $banglaNumbers, $timeAgo);
        }

        return $timeAgo;
    }
}
