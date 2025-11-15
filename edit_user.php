<?php
require "db.php";

// Get user id from URL: edit_user.php?id=1
$user_id = $_GET['id'];

$stmt = $conn->prepare("SELECT name, email FROM users WHERE id = ?");
$stmt->bind_param("i", $user_id);
$stmt->execute();
$stmt->store_result();
$stmt->bind_result($name, $email);

if ($stmt->num_rows == 0) {
    die("User not found.");
}

$stmt->fetch();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit User</title>
</head>
<body>

<h2>Edit User Profile</h2>

<form action="update_user.php" method="POST">
    <input type="hidden" name="id" value="<?= $user_id ?>">

    <label>Name:</label><br>
    <input type="text" name="name" value="<?= htmlspecialchars($name) ?>" required><br><br>

    <label>Email:</label><br>
    <input type="email" name="email" value="<?= htmlspecialchars($email) ?>" required><br><br>

    <button type="submit">Update</button>
</form>

</body>
</html>
