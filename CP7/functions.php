<?php

function age($date1, $date2): int
{
    if (!is_date($date1)) {
        trigger_error("Type error {$date1}", E_USER_WARNING);
    }
    if (!is_date($date2)) {
        trigger_error("Type error {$date2}", E_USER_WARNING);
    }
    $age = floor((abs(strtotime(date($date1)) - strtotime(date($date2)))) / ((365.25 * 60 * 60 * 24)));
    return $age;
}


/**
 *@param{string}$arg - arugent a tester
 *@return {boolean}
 */

function is_date($arg): bool
{
    return (bool)strtotime($arg);
}


function ttc($mt, $taux = 0.2): float
{
    $values = [0.2, 0.021, 0.051];
    if ((!is_float($mt) && !is_numeric($mt)) || is_null($mt)  || $mt < 0) {
        trigger_error("Check the value 1:  {$mt}", E_USER_ERROR);
    }
    if ((!is_float($taux) && !is_numeric($taux)) || is_null($taux) || !in_array($taux, $values, true) || $taux < 0) {
        trigger_error("Check the value 2 : {$taux}", E_USER_ERROR);
    }
    return $mt * (1 + $taux);
}
/**
 * @param int length
 * @return string random password
 */
function generatePassword(int $len = 8): string
{
    $shuffleString = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789+*/$#";
    $randPwdArray = [];
    $randPwd = "";
    for ($i = 0; $i < $len; $i++) {
        $randNos = rand(0, strlen($shuffleString));
        $randPwdArray = randGenerator($shuffleString[$randNos - 1], $randPwd);
        if (!$randPwdArray[1]) {
            if ($i !== $len) {
                $i--;
            }
        }
    }
    return $randPwd;
}


function randGenerator($unique = "", &$tResult): array
{
    $concat = false;
    $tresult = strpos($tResult, $unique);
    if (!$tresult) {
        $tResult .= $unique;
        $concat = true;
    }
    return [$tResult, $concat];
}


function average(...$val)
{
    $result = 0;
    for ($i = 0; $i < count($val); $i++) {
        $result += $val[$i];
    }
    return ($result / count($val));
}

function averageSansargs()
{
    $result = 0;
    $ct = 0;
    $fullist = func_get_args();
    $fullFinalresult = [];
    //$res = array_flatten($fullist, array());
    for ($i = 0; $i < count($fullist); $i++) {
        echo $fullist[$i];
        if (is_array($fullist[$i])) {
            $t = array_flatten($fullist[$i], array());
            array_combine($t, $fullFinalresult);
        } else {
            array_push($fullist[$i], $fullFinalresult);
        }
        // if (is_numeric($fullist[$i]) || is_float($fullist[$i])) {
        //     $result += $fullist[$i];
        //     $ct++;
        // }
        var_dump($fullFinalresult);
    }
    //return ($result / $ct);
}


function array_flatten($array, $return)
{
    for ($x = 0; $x <= count($array); $x++) {
        if (is_array($array[$x])) {
            $return = array_flatten($array[$x], $return);
        } else {
            if (isset($array[$x])) {
                $return[] = $array[$x];
            }
        }
    }

    return $return;
}

function generateOption($val)
{
    $res = "";
    foreach ($val as $c => $v) {
        $res .= "<option value={$c}>{$v}</option>";
    }
    return $res;
}
