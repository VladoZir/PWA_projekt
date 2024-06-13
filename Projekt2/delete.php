<?php
include 'connect.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Delete the record
    $query = "DELETE FROM vijesti WHERE id=?";
    $stmt = mysqli_prepare($dbc, $query);
    mysqli_stmt_bind_param($stmt, 'i', $id);
    mysqli_stmt_execute($stmt);

    header("Location: administrator.php");
} else {
    header("Location: administrator.php");
}

mysqli_close($dbc);
?>
