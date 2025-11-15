<?php
require "db.php";

$id = $_POST['id'];
$name = $_POST['name'];
$email = $_POST['email'];

$stmt = $conn->prepare("UPDATE users SET name = ?, email = ? WHERE id = ?");
$stmt->bind_param("ssi", $name, $email, $id);

if ($stmt->execute()) {
    echo "<h3>User updated successfully!</h3>";
    echo "<a href='edit_user.php?id=$id'>Go Back</a>";
} else {
    echo "<h3>Update failed: " . $stmt->error . "</h3>";
}
?>
