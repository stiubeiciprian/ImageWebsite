<?php


namespace App\Core;


/**
 * Class Session
 * @package App\Core
 */
class Session
{
    /**
     * Session constructor.
     */
    public function __construct()
    {
        if (!isset($_SESSION)) {
            $this->openSession();
        }
    }

    /**
     * Initialize session.
     */
    public static function openSession()
    {
        session_start();
    }

    /**
     * @param string $key
     * @param string $value
     */
    public static function setSessionValue(string $key, string $value)
    {
        $_SESSION[$key] = $value;
    }

    /**
     * Returns
     * @param string $key
     * @return mixed
     */
    public static function getSessionValue(string $key) : mixed
    {
        return $_SESSION[$key];
    }

    /**
     * Checks if the session key is set.
     * @return bool
     */
    public static function isSessionKeySet(string $key) : bool
    {
        return isset($_SESSION[$key]);
    }

    /**
     * Unset session.
     */
    public static function closeSession()
    {
        session_destroy();
    }
}