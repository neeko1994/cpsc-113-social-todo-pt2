<?php
 
    // configuration
    require("../config.php");
    
    if ($_SERVER["REQUEST_METHOD"] == "POST")
    {
        if (empty($_POST["name"]))
        {
            apologize("You must provide a name.");
        }
        else if (empty($_POST["email"]))
        {
            apologize("You must provide a valid email address.");
        }
        else if (empty($_POST["password"]))
        {
            apologize("You must provide a password.");
        }
        else if (empty($_POST["confirmation"]))
        {
            apologize("You must provide your password confirmation.");
        }
        else if ($_POST["password"] == $_POST["confirmation"])
        {
            $currentuser_name = $_POST["name"];
            $currentuser_email = $_POST["email"];
            $currentuser_password = $_POST["password"];
            $result = ("INSERT IGNORE INTO users (username, email, password) VALUES ($currentuser_name, $currentuser_email, $currentuser_password)");
            if ($result === 0)
            {
                apologize("Username already exists. Please try another.");
            }
            else
            {
                $rows = ("SELECT LAST_INSERT_ID() AS id");
                $id = $rows[0]["id"];
                $_SESSION["id"] = $row["id"];
                redirect("/tasks.html");
            }
        }
        else
        {
            apologize("Passwords do not match. Please try again.");
        }
    }
    
?>