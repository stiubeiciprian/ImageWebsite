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
            $this->openSession();
    }

    /**
     * Initialize session.
     */
    public function openSession()
    {
        session_start();
    }

    /**
     * @param string $key
     * @param string $value
     */
    public function setSessionValue(string $key, string $value)
    {
        $_SESSION[$key] = $value;
    }

    /**
     * Returns
     * @param string $key
     * @return mixed
     */
    public function getSessionValue(string $key)
    {
        return $_SESSION[$key];
    }

    /**
     * Checks if the session key is set.
     * @return bool
     */
    public function isSessionKeySet(string $key) : bool
    {
        return isset($_SESSION[$key]);
    }

    /**
     * Unset session.
     */
    public function closeSession()
    {
        session_destroy();
    }
}