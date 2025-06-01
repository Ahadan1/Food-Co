<?php
include("connection/connect.php");

// First, let's verify the database connection
if (!$db) {
    die("Database connection failed: " . mysqli_connect_error());
}
echo "Database connection successful!\n";

// Check if admin_users table exists
$table_check = mysqli_query($db, "SHOW TABLES LIKE 'admin_users'");
if (mysqli_num_rows($table_check) == 0) {
    die("admin_users table does not exist!");
}
echo "admin_users table exists!\n";

// Delete existing admin user
$delete_admin = "DELETE FROM admin_users WHERE username = 'admin'";
if (mysqli_query($db, $delete_admin)) {
    echo "Existing admin user deleted\n";
} else {
    echo "Error deleting admin user: " . mysqli_error($db) . "\n";
}

// Create new admin user with fresh password hash
$admin_username = "admin";
$admin_password = "admin123";
$hashed_password = password_hash($admin_password, PASSWORD_DEFAULT);

$insert_admin = "INSERT INTO admin_users (username, password) VALUES (?, ?)";
$stmt = mysqli_prepare($db, $insert_admin);
mysqli_stmt_bind_param($stmt, "ss", $admin_username, $hashed_password);

if (mysqli_stmt_execute($stmt)) {
    echo "\nNew admin account created successfully!\n";
    echo "----------------------------------------\n";
    echo "Username: admin\n";
    echo "Password: admin123\n";
    echo "----------------------------------------\n";
    echo "Please try logging in with these credentials.\n";
} else {
    echo "Error creating admin user: " . mysqli_error($db) . "\n";
}

// Verify the user was created
$verify = "SELECT * FROM admin_users WHERE username = 'admin'";
$result = mysqli_query($db, $verify);
if ($row = mysqli_fetch_assoc($result)) {
    echo "\nVerification successful - admin user exists in database\n";
}
?> 