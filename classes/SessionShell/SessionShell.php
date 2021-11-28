<?php


class SessionShell
{
    /**
     * SessionShell constructor.
     * запускает сессию
     */
    public function __construct()
    {
        if (!isset($_SESSION)) {
            session_start();
        }
    }

    /**
     * Устанавливает переменную в сессию
     * @param $name
     * @param $value
     */
    public function set ($name, $value) : SessionShell
    {
        if (isset($_SESSION)) {
            $_SESSION[$name] = $value;
        }
        return $this;
    }

    public function get ($name)
    {
        return $_SESSION[$name];
    }

    /**
     * Удаляет переменную из сессии
     */
    public function del ($name): SessionShell
    {
        unset($_SESSION[$name]);
        return $this;
    }

    /**
     * Проверяет есть ли данная переменная в сессии
     */
    public function exists ($name) : bool
    {
        return (bool)$_SESSION[$name];
    }

    /**
     * Метод разрушает сессию
     */
    public function destroy ()
    {
        session_destroy();
    }

}