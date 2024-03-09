<?php

use Carbon\Carbon;

if (! function_exists('dueDateStatus')) {
    function dueDateStatus($date)
    {
        $parsedDate = Carbon::parse($date);
        $currentDate = Carbon::today();
        if ($parsedDate->isToday()) {
            return 'Due today';
        } elseif ($parsedDate->isTomorrow()) {
            return 'Due tomorrow';
        } elseif ($parsedDate->isCurrentWeek() && $parsedDate->isAfter($currentDate)) {
            return 'Due'.$parsedDate->format('l');
        } elseif ($parsedDate->lessThan($currentDate)) {
            return 'overdue';
        } else {
            return $parsedDate->format('d M Y');
        }
    }
}

if (! function_exists('dueToday')) {
    function dueToday($date)
    {
        return Carbon::parse($date)->isToday();
    }
}

if (! function_exists('dueTomorrow')) {
    function dueTomorrow($date)
    {
        return Carbon::parse($date)->isTomorrow();
    }
}

if (! function_exists('dueThisWeek')) {
    function dueThisWeek($date)
    {
        return Carbon::parse($date)->isCurrentWeek() && Carbon::parse($date)->isAfter(Carbon::today());
    }
}

if (! function_exists('formatDate')) {
    function formatDate($date, $format)
    {
        return Carbon::parse($date)->format($format);
    }
}
