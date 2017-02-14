<?php

class Validate
{
    /**
     * @param $date
     * @param string $format
     * @return bool
     */
    public static function date($date, $format = 'd/m/Y')
    {
        $d = DateTime::createFromFormat($format, $date);
        return $d && $d->format($format) == $date;
    }

    /**
     * @param $number
     * @return bool
     */
    public static function isNaturalNumber($number)
    {
        //echo (float)$number;
        //echo !(filter_var((float)$number, FILTER_VALIDATE_INT) === false);


        return is_numeric($number) && $number >= 0 && !(filter_var((float)$number, FILTER_VALIDATE_INT) === false);
    }


}