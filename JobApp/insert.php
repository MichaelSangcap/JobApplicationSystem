<?php require_once 'core/handleForms.php'; ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Insert Job Application</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
<h1>Add New Job Application</h1>

<form action="core/handleForms.php" method="POST">
    <p>
        <label for="applicant_name">Applicant Name:</label>
        <input type="text" name="applicant_name" required>
    </p>
    <p>
        <label for="email">Email:</label>
        <input type="email" name="email" required>
    </p>
    <p>
        <label for="phone">Phone:</label>
        <input type="text" name="phone" required>
    </p>
    <p>
        <label for="position">Position:</label>
        <input type="text" name="position" required>
    </p>
    <p>
        <input type="submit" name="insertJobApplicationBtn" value="Submit">
    </p>
</form>

</body>
</html>
