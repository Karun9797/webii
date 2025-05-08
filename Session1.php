<?php
    session_start();
?>
<html>
    <body>
        <?php
            $_SESSION["name"] = "lagrandee";
            $_SESSION["class"] = "WEB-II";
            echo "session variables are set";
        ?>
    </body>
</html>