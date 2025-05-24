<!DOCTYPE html>
<html>

<head>
    <title>Job Portal File Upload</title>
</head>

<body>
    <h2>Upload Your Resume and Photograph</h2>
    <form action="upload.php" method="POST" enctype="multipart/form-data">
        <label for="resume">Resume (PDF/DOC, max 500KB):</label><br>
        <input type="file" name="resume" id="resume" required><br><br>

        <label for="photo">Photograph (JPEG/JPG, max 1MB):</label><br>
        <input type="file" name="photo" id="photo" required><br><br>

        <input type="submit" value="Upload">
    </form>
</body>
<script>
document.getElementById("uploadForm").addEventListener("submit", function(event) {
    const resume = document.getElementById("resume").files[0];
    const photo = document.getElementById("photo").files[0];

    if (!resume || !photo) {
        alert("Please select both resume and photo.");
        event.preventDefault();
        return;
    }

    const resumeExt = resume.name.split('.').pop().toLowerCase();
    const photoExt = photo.name.split('.').pop().toLowerCase();

    if (!["pdf", "doc"].includes(resumeExt)) {
        alert("Resume must be a PDF or DOC file.");
        event.preventDefault();
        return;
    }

    if (resume.size > 500 * 1024) {
        alert("Resume must be under 500KB.");
        event.preventDefault();
        return;
    }

    if (!["jpg", "jpeg"].includes(photoExt)) {
        alert("Photo must be JPG or JPEG.");
        event.preventDefault();
        return;
    }

    if (photo.size > 1024 * 1024) {
        alert("Photo must be under 1MB.");
        event.preventDefault();
        return;
    }
});
</script>

</html>