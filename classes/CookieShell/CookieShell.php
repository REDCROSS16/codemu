<?php

class CookieShell
{
    /**
     * Метод установливает куку
     * @param string $name
     * @param string $value
     * @param int $time
     *
     */
    public function set(string $name, string $value, int $time) : void
    {
        setcookie($name, $value, time() + $time);
        $_COOKIE[$name] = $value;
    }

    /**
     * Получает значение куки
     * @param $name
     * @return mixed
     */
    public function get($name)
    {
        return $_COOKIE[$name];
    }

    /**
     * Метод для удаления куки
     * @param $name
     */
    public function del($name)
    {
        setcookie($name, '', time() - 10000);
        unset($_COOKIE[$name]);
    }

    /**
     * Проверяет установлена ли кука
     * @param $name
     * @return bool
     */
    public function exists($name) : bool
    {
        return isset($_COOKIE[$name]);
    }
}
