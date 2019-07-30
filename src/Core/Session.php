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
    public function getSessionValue(string $key) : mixed
    {
        return $_SESSION[$key];
    }

    /**
     * Checks if the session is set.
     * @return bool
     */
    public function isSessionSet() : bool
    {
        return isset($_SESSION);
    }

    /**
     * Unset session.
     */
    public function closeSession()
    {
        unset($_SESSION);
    }
}