<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
require_once './inc/functions.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $user_id = $_SESSION['user']['User_id'] ?? null;

    if ($user_id) {
        $memberController = $controllers->members();
        
        $member = [
            'User_id' => $user_id,
            'F_name' => $_POST['F_name'],
            'S_name' => $_POST['S_name'],
            'Email' => $_POST['Email'],
            'Phone_number' => $_POST['Phone_number'],
            'Address' => $_POST['Address']
        ];

        // Update user details
        $result = $memberController->update_member($member);

        if ($result) {
            // Update successful
            // Redirect the user to a success page or back to the settings page with a success message
            redirect('account_settings.php?success=1');
        } else {
            // Update failed
            // Redirect the user back to the settings page with an error message
            redirect('account_settings.php?error=1');
        }
    } else {
        // User not logged in
        // Redirect the user to the login page
        redirect('login.php');
    }
} else {
    // If the request method is not POST, redirect the user to the settings page
    redirect('account_settings.php');
}
?>
