<html>
<body>
    <form action="" method="post" enctype="multipart/form-data">
        <input type="file" name="myFile"><br>
        <input type="submit" value="submit">
    </form>
    </body>
</html>
    <?php
        // echo $_FILES['myFile'];
        // print_r($_FILES['myFile']);
        
        $fileName = $_FILES['myFile']['name'];
        $tempName = $_FILES['myFile']['tmp_name'];
        $target_dir = "testing/";
        move_uploaded_file($tempName,$target_dir.$fileName);
    ?>
    