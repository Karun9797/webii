<?php
    $resumeDir = "uploads/resumes/";
    $photoDir = "uploads/photos/";
    if (!is_dir($resumeDir)) mkdir($resumeDir, 0777, true);
    if (!is_dir($photoDir)) mkdir($photoDir, 0777, true);

    $resumeValid = false;
    $photoValid = false;

    if (isset($_FILES['resume']) && is_uploaded_file($_FILES['resume']['tmp_name'])) {
        $resume = $_FILES['resume'];
        $resumeName = basename($resume['name']);
        $resumePath = $resumeDir . $resumeName;
        $resumeExt = strtolower(pathinfo($resumeName, PATHINFO_EXTENSION));
        $resumeSize = $resume['size'];

        if (!in_array($resumeExt, ['pdf', 'doc'])) {
            echo "Resume must be PDF or DOC.<br>";
        } elseif ($resumeSize > 500 * 1024) {
            echo "Resume exceeds 500KB.<br>";
        } elseif (file_exists($resumePath)) {
            echo "Resume already exists.<br>";
        } else {
            $resumeValid = true;
        }
    } else {
        echo "Resume not uploaded properly.<br>";
    }

    if (isset($_FILES['photo']) && is_uploaded_file($_FILES['photo']['tmp_name'])) {
        $photo = $_FILES['photo'];
        $photoName = basename($photo['name']);
        $photoPath = $photoDir . $photoName;
        $photoExt = strtolower(pathinfo($photoName, PATHINFO_EXTENSION));
        $photoSize = $photo['size'];

        if (!in_array($photoExt, ['jpg', 'jpeg'])) {
            echo "Photo must be JPG or JPEG.<br>";
        } elseif ($photoSize > 1024 * 1024) {
            echo "Photo exceeds 1MB.<br>";
        } elseif (file_exists($photoPath)) {
            echo "Photo already exists.<br>";
        } else {
            $photoValid = true;
        }
    } else {
        echo "Photo not uploaded properly.<br>";
    }

    if ($resumeValid && $photoValid) {
        move_uploaded_file($_FILES['resume']['tmp_name'], $resumePath);
        move_uploaded_file($_FILES['photo']['tmp_name'], $photoPath);
        echo "Both files uploaded successfully.";
    } else {
        echo "Upload failed. Fix the errors above.";
    }
?>