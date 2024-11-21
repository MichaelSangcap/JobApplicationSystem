<?php require_once 'core/handleForms.php'; ?>
<?php $application = getJobApplicationByID($pdo, $_GET['id']); ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Job Application</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
<h1>Edit Job Application</h1>

<form action="core/handleForms.php?id=<?php echo $_GET['id']; ?>" method="POST">
    <p>
        <label for="applicant_name">Applicant Name:</label>
        <input type="text" name="applicant_name" value="<?php echo $application['applicant_name']; ?>" required>
    </p>
    <p>
        <label for="email">Email:</label>
        <input type="email" name="email" value="<?php echo $application['email']; ?>" required>
    </p>
    <p>
        <label for="phone">Phone:</label>
        <input type="text" name="phone" value="<?php echo $application['phone']; ?>" required>
    </p>
    <p>
        <label for="position">Position:</label>
        <input type="text" name="position" value="<?php echo $application['position']; ?>" required>
    </p>
    <p>
        <input type="submit" name="editJobApplicationBtn" value="Save">
    </p>
</form>

</body>
</html>
