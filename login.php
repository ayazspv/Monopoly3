<?php
include "connect.php";

if (isset($_POST['username'])) {

    function validate($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    $username = validate($_POST['username']);

    if (empty($username)) {
        return  ;
    }
    else {
        $sql = "SELECT * FROM `user` WHERE gameName=?";
        $stmt = mysqli_prepare($db, $sql);
    
        // Assuming $username is the user input
        mysqli_stmt_bind_param($stmt, "s", $username);
        mysqli_stmt_execute($stmt);
    
        $result = mysqli_stmt_get_result($stmt);
    
        if (mysqli_num_rows($result)) {
            header("Location: home.php");
            exit();
        }
    
        mysqli_stmt_close($stmt);
    }
    
    
}
else {
    header("Location: index.php");
    exit();
}

include __DIR__ . 'Monopoly.js';

?>