<?php
include("connection/connect.php");

// Create admin_users table if it doesn't exist
$create_table_sql = "CREATE TABLE IF NOT EXISTS admin_users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(255) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL
)";

if (mysqli_query($db, $create_table_sql)) {
    echo "Admin table created successfully\n";
} else {
    echo "Error creating table: " . mysqli_error($db) . "\n";
}

// Add default admin user if it doesn't exist
$admin_username = "admin";
$admin_password = "admin123"; // You should change this password
$hashed_password = password_hash($admin_password, PASSWORD_DEFAULT);

// Check if admin user exists
$check_admin = "SELECT * FROM admin_users WHERE username = ?";
$stmt = mysqli_prepare($db, $check_admin);
mysqli_stmt_bind_param($stmt, "s", $admin_username);
mysqli_stmt_execute($stmt);
$result = mysqli_stmt_get_result($stmt);

if (mysqli_num_rows($result) == 0) {
    // Add admin user
    $insert_admin = "INSERT INTO admin_users (username, password) VALUES (?, ?)";
    $stmt = mysqli_prepare($db, $insert_admin);
    mysqli_stmt_bind_param($stmt, "ss", $admin_username, $hashed_password);
    
    if (mysqli_stmt_execute($stmt)) {
        echo "Admin user created successfully\n";
        echo "Username: admin\n";
        echo "Password: admin123\n";
    } else {
        echo "Error creating admin user: " . mysqli_error($db) . "\n";
    }
} else {
    echo "Admin user already exists\n";
}
?> 