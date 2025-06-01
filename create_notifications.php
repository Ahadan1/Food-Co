<?php
include("connection/connect.php");

// Create notifications table
$create_table_sql = "CREATE TABLE IF NOT EXISTS admin_notifications (
    id INT AUTO_INCREMENT PRIMARY KEY,
    type VARCHAR(50) NOT NULL,
    message TEXT NOT NULL,
    reference_id INT NOT NULL,
    is_read BOOLEAN DEFAULT FALSE,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
)";

if (mysqli_query($db, $create_table_sql)) {
    echo "Notifications table created successfully\n";
} else {
    echo "Error creating notifications table: " . mysqli_error($db) . "\n";
}
?> 