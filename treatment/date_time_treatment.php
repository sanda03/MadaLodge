<?php
    $timezone = new DateTimeZone('Africa/Addis_Ababa');
    $todayDATETIMEwithoutFormat = new DateTime('now', $timezone);
    $formatDATETIME = 'Y-m-d H:i:s';
    $todayDATETIME = $todayDATETIMEwithoutFormat->format($formatDATETIME);

    $formatDATE = 'Y-m-d';
    $todayDATE = $todayDATETIMEwithoutFormat->format($formatDATE);
?>
