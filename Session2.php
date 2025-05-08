<?php
    session_start();
?>
<html>
    <body>
        <?php
            echo $_SESSION["name"];
            echo $_SESSION["class"];
        ?>
    </body>
</html>