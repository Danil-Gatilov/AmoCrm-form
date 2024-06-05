<?php

namespace App\Service;

class SessionTimeService
{
    public function checkSessionTime(string $sessionTime): bool
    {
        $flag = false;
        $timeParts = explode(':', $sessionTime);
        (int)$sessionTimeSeconds = $timeParts[0] * 3600 . $timeParts[1] * 60 . $timeParts[2];

        if ($sessionTimeSeconds > 30) {
            $flag = true;
        }
        return $flag;
    }
}
