<?php require_once 'core/models.php'; ?>
<?php $application = getJobApplicationByID($pdo, $_GET['id']); ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Delete Job Application</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
<h1>Are you sure you want to delete this application?</h1>

<div style="border: 1px solid red; padding: 10px; background-color: #ffe6e6;">
    <p><strong>Applicant Name:</strong> <?php echo $application['applicant_name']; ?></p>
    <p><strong>Email:</strong> <?php echo $application['email']; ?></p>
    <p><strong>Phone:</strong> <?php echo $application['phone']; ?></p>
    <p><strong>Position:</strong> <?php echo $application['position']; ?></p>
</div>

<form action="core/handleForms.php?id=<?php echo $_GET['id']; ?>" method="POST">
    <input type="submit" name="deleteJobApplicationBtn" value="Delete">
</form>

</body>
</html>
