<?php
require_once 'dbConfig.php';

function getAllJobApplications($pdo) {
    $sql = "SELECT * FROM job_applications ORDER BY applicant_name ASC";
    $stmt = $pdo->prepare($sql);
    $executeQuery = $stmt->execute();

    if ($executeQuery) {
        return $stmt->fetchAll();
    }
}

function getJobApplicationByID($pdo, $id) {
    $sql = "SELECT * FROM job_applications WHERE id = ?";
    $stmt = $pdo->prepare($sql);
    $executeQuery = $stmt->execute([$id]);

    if ($executeQuery) {
        return $stmt->fetch();
    }
}

function insertNewJobApplication($pdo, $applicant_name, $email, $phone, $position, $resume) {
    $sql = "INSERT INTO job_applications (applicant_name, email, phone, position, resume) VALUES (?, ?, ?, ?, ?)";
    $stmt = $pdo->prepare($sql);
    $executeQuery = $stmt->execute([$applicant_name, $email, $phone, $position, $resume]);

    return $executeQuery;
}

function editJobApplication($pdo, $applicant_name, $email, $phone, $position, $resume, $id) {
    $sql = "UPDATE job_applications SET applicant_name = ?, email = ?, phone = ?, position = ?, resume = ? WHERE id = ?";
    $stmt = $pdo->prepare($sql);
    $executeQuery = $stmt->execute([$applicant_name, $email, $phone, $position, $resume, $id]);

    return $executeQuery;
}

function deleteJobApplication($pdo, $id) {
    $sql = "DELETE FROM job_applications WHERE id = ?";
    $stmt = $pdo->prepare($sql);
    $executeQuery = $stmt->execute([$id]);

    return $executeQuery;
}

function searchJobApplications($pdo, $searchQuery) {
    $sql = "SELECT * FROM job_applications WHERE applicant_name LIKE ?";
    $stmt = $pdo->prepare($sql);
    $stmt->execute(["%$searchQuery%"]);
    return $stmt->fetchAll();
}

?>
