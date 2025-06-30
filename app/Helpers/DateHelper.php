<?php

namespace App\Helpers;

use Carbon\Carbon;

class DateHelper
{
    public static function timeSinceCreated($createdAt): string
    {
        $created = Carbon::parse($createdAt);
        $now = Carbon::now();

        $diff = $created->diff($now);

        return self::formatDiff($diff);
    }

    public static function deadlineRemaining($deadline): string
    {
        $deadlineDate = Carbon::parse($deadline);
        $now = Carbon::now();

        $diff = $now->diff($deadlineDate);

        $prefix = $now->gt($deadlineDate) ? 'Deadline passed by' : 'Remaining';

        return $prefix . ' ' . self::formatDiff($diff);
    }

    private static function formatDiff($diff): string
    {
        return sprintf('%d year(s) %d month(s) %d day(s)', $diff->y, $diff->m, $diff->d);
    }
}
