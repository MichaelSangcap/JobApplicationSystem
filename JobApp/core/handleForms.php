<?php
require_once 'dbConfig.php';
require_once 'models.php';

if (isset($_POST['insertJobApplicationBtn'])) {
    $insertJobApplication = insertNewJobApplication($pdo, $_POST['applicant_name'], $_POST['email'], $_POST['phone'], $_POST['position'], $_POST['resume']);

    if ($insertJobApplication) {
        $_SESSION['message'] = "Successfully added a new job application!";
        header("Location: ../index.php");
    }
}

if (isset($_POST['editJobApplicationBtn'])) {
    $editJobApplication = editJobApplication($pdo, $_POST['applicant_name'], $_POST['email'], $_POST['phone'], $_POST['position'], $_POST['resume'], $_GET['id']);

    if ($editJobApplication) {
        $_SESSION['message'] = "Successfully updated the job application!";
        header("Location: ../index.php");
    }
}

if (isset($_POST['deleteJobApplicationBtn'])) {
    $deleteJobApplication = deleteJobApplication($pdo, $_GET['id']);

    if ($deleteJobApplication) {
        $_SESSION['message'] = "Successfully deleted the job application!";
        header("Location: ../index.php");
    }
}
?>
