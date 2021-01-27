<?php

function age($date1, $date2): int
{
    if (!is_string($date1)) {
        trigger_error("Type error {$date1}", E_USER_ERROR);
    }
    if (!is_string($date2)) {
        trigger_error("Type error {$date2}", E_USER_ERROR);
    }

    $age = ceil((abs(strtotime($date1) - strtotime($date2))) / ((365 * 60 * 60 * 24)));
    return $age;
}
