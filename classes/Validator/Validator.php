<?php

class Validator
{
    /**
     * Проверяет строку на то, что она корректный email
     * @param $str
     * @return false|int
     */
    public function isEmail($str)
    {
        return (bool)preg_match('#[\.\-_A-Za-z0-9]+?@[\.\-A-Za-z0-9]+?[\.A-Za-z0-9]{2,}#', $str);
    }

    /**
     * проверяет строку на то, что она корректное имя домена
     * @param $domain
     * @return bool
     */
    public function isDomain($domain)
    {
     return (bool)preg_match("/^[a-zA-Z0-9][a-zA-Z0-9-]{1,61}[a-zA-Z0-9](?:\.[a-zA-Z]{2,})+/", $domain);
    }

    /**
     * проверяет число на то, что оно входит в диапазон
     * @param $num
     * @param $from
     * @param $to
     */
    public function inRange($num, $from, $to, $textInfo = false)
    {
        if ( $num > $from && $num < $to ) {
           return ($textInfo) ? ("Число $num находится в диапазоне $from - $to") : true;
        } else {
           return ($textInfo) ? ("Число $num не попало в диапазоне $from - $to") : false;
        }
    }

    /**
     * проверяет строку на то, что ее длина входит в диапазон
     * @param $str
     * @param $from
     * @param $to
     */
    public function inLength($str, $from, $to)
    {
        if (mb_strlen($str) > $from && mb_strlen($str) < $to) {
            return "Длина строки $str входит в диапазон от $from до $to " . mb_strlen($str);
        } else {
            return "Длина строки $str не входит в диапазон от $from до $to" . mb_strlen($str);
        }
    }
}
