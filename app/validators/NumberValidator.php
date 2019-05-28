<?php
/**
 * Created by PhpStorm.
 * User: Stas
 * Date: 25/05/19
 * Time: 16:16
 */

class NumberValidator
{

    /**
     * @var string
     */
    private static $NUMBER_REGEXP = "/^([0-9]+)$/";
    /**
     * @var string
     */
    private static $EXAM_SCORE_REGEXP = "/^([0-9]+)\.?([0-9]*)$/";

    /**
     * @param $value
     * @return bool
     */
    public static function validateNumber($value)
    {
        return $value != null && preg_match(self::$NUMBER_REGEXP, $value) == 1;
    }


    /**
     * @param $value
     * @return bool
     */
    public static function validateExamScore($value)
    {
        if ($value < 0 or $value == null) {
            return false;
        }
        return preg_match(self::$EXAM_SCORE_REGEXP, $value) == 1;
    }
}

//tests
//echo NumberValidator::validateExamScore("asfd") ? 1 : 0;
//echo NumberValidator::validateExamScore("") ? 1 : 0;
//echo NumberValidator::validateExamScore("1") ? 1 : 0;
//echo NumberValidator::validateExamScore("123") ? 1 : 0;
//echo NumberValidator::validateExamScore("13.5") ? 1 : 0;