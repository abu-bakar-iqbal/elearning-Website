<?php
session_start();
include '../includes/db.php';

// Security: Must be admin
if (!isset($_SESSION['user_id']) || !isset($_SESSION['role']) || $_SESSION['role'] !== 'admin') {
    die("Access Denied");
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    // Delete User
    if (isset($_POST['action']) && $_POST['action'] == 'delete') {
        $id = $_POST['user_id'];
        // Prevent deleting yourself
        if ($id == $_SESSION['user_id']) {
            $_SESSION['admin_msg'] = "You cannot delete yourself!";
            $_SESSION['admin_msg_type'] = "danger";
        } else {
            $stmt = $conn->prepare("DELETE FROM users WHERE id = ?");
            $stmt->bind_param("i", $id);
            if ($stmt->execute()) {
                $_SESSION['admin_msg'] = "User deleted successfully.";
                $_SESSION['admin_msg_type'] = "success";
            } else {
                $_SESSION['admin_msg'] = "Error deleting user.";
                $_SESSION['admin_msg_type'] = "danger";
            }
        }
        header("Location: users.php");
        exit();
    }

    // Change Role
    if (isset($_POST['action']) && $_POST['action'] == 'change_role') {
        $id = $_POST['user_id'];
        $new_role = $_POST['new_role'];
        
        $stmt = $conn->prepare("UPDATE users SET role = ? WHERE id = ?");
        $stmt->bind_param("si", $new_role, $id);
        
        if ($stmt->execute()) {
            $_SESSION['admin_msg'] = "User role updated to " . ucfirst($new_role) . ".";
            $_SESSION['admin_msg_type'] = "success";
        } else {
            $_SESSION['admin_msg'] = "Error updating role.";
            $_SESSION['admin_msg_type'] = "danger";
        }
        header("Location: users.php");
        exit();
    }
}
?>
