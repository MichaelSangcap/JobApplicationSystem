<?php require_once 'core/dbConfig.php'; ?>
<?php require_once 'core/models.php'; ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Job Application System</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>

<?php if (isset($_SESSION['message'])) { ?>
    <h1 style="color: green; text-align: center; background-color: ghostwhite; border-style: solid;">
        <?php echo $_SESSION['message']; ?>
    </h1>
<?php } unset($_SESSION['message']); ?>

<h1>Job Application System</h1>

<!-- Search Bar -->
<form method="GET" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>">
    <input type="text" name="searchInput" placeholder="Search by applicant name" value="<?php echo isset($_GET['searchInput']) ? $_GET['searchInput'] : ''; ?>">
    <input type="submit" name="searchBtn" value="Search">
</form>

<p><a href="index.php">Clear Search</a> | <a href="insert.php">Add New Job Application</a></p>

<table style="width:100%; margin-top: 20px; border-collapse: collapse;">
    <tr>
        <th>Applicant Name</th>
        <th>Email</th>
        <th>Phone</th>
        <th>Position</th>
        <th>Date Applied</th>
        <th>Action</th>
    </tr>

    <?php
    // Handle search query
    if (isset($_GET['searchBtn']) && !empty($_GET['searchInput'])) {
        $searchResults = searchJobApplications($pdo, $_GET['searchInput']);
        if (count($searchResults) > 0) {
            foreach ($searchResults as $application) {
                echo "<tr>
                    <td>{$application['applicant_name']}</td>
                    <td>{$application['email']}</td>
                    <td>{$application['phone']}</td>
                    <td>{$application['position']}</td>
                    <td>{$application['date_applied']}</td>
                    <td>
                        <a href='edit.php?id={$application['id']}'>Edit</a> | 
                        <a href='delete.php?id={$application['id']}'>Delete</a>
                    </td>
                </tr>";
            }
        } else {
            echo "<tr><td colspan='6' style='text-align:center;'>No applications found.</td></tr>";
        }
    } else {
        // Display all applications if no search query
        $applications = getAllJobApplications($pdo);
        foreach ($applications as $application) {
            echo "<tr>
                <td>{$application['applicant_name']}</td>
                <td>{$application['email']}</td>
                <td>{$application['phone']}</td>
                <td>{$application['position']}</td>
                <td>{$application['date_applied']}</td>
                <td>
                    <a href='edit.php?id={$application['id']}'>Edit</a> | 
                    <a href='delete.php?id={$application['id']}'>Delete</a>
                </td>
            </tr>";
        }
    }
    ?>
</table>

</body>
</html>
