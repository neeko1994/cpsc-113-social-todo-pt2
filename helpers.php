<?php
 
    /**
     * Apologizes to user with message.
     */
    function apologize($message)
    {
        render("apology.php", ["message" => $message]);
    }
 
    /**
     * Facilitates debugging by dumping contents of argument(s)
     * to browser.
     */
    function dump()
    {
        $arguments = func_get_args();
        require("../views/dump.php");
        exit;
    }
 
    /**
     * Logs out current user, if any.  Based on Example #1 at
     * http://us.php.net/manual/en/function.session-destroy.php.
     */
    function logout()
    {
        // unset any session variables
        $_SESSION = [];
 
        // expire cookie
        if (!empty($_COOKIE[session_name()]))
        {
            setcookie(session_name(), "", time() - 42000);
        }
 
        // destroy session
        session_destroy();
    }
    
    /**
     * Redirects user to location, which can be a URL or
     * a relative path on the local host.
     *
     * http://stackoverflow.com/a/25643550/5156190
     */
    function redirect($location)
    {
        if (headers_sent($file, $line))
        {
            trigger_error("HTTP headers already sent at {$file}:{$line}", E_USER_ERROR);
        }
        header("Location: {$location}");
        exit;
    }