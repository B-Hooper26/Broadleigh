<?php require __DIR__ . "/inc/header.php";
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Account Settings</title>
    <link rel="stylesheet" href="styles.css"> <!-- Link to your external stylesheet -->
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }
        h1 {
            text-align: center;
            margin-top: 50px;
        }
        form {
            max-width: 400px;
            margin: 0 auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
        }
        input[type="text"],
        input[type="email"],
        input[type="tel"],
        textarea {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 3px;
            box-sizing: border-box;
            font-size: 16px;
        }
        input[type="submit"] {
            padding: 10px 20px;
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 3px;
            cursor: pointer;
            font-size: 16px;
        }
        input[type="submit"]:hover {
            background-color: #0056b3;
        }
    </style>
</head>
</form>
<body>
    <h1>Account Settings</h1>
    <form method="post" action="update_settings.php">
        <label for="F_name">First Name:</label>
        <input type="text" id="F_name" name="F_name" value="<?= htmlspecialchars($user['F_name'] ?? '') ?>"><br>

        <label for="S_name">Last Name:</label>
        <input type="text" id="S_name" name="S_name" value="<?= htmlspecialchars($user['S_name'] ?? '') ?>"><br>

        <label for="Email">Email:</label>
        <input type="email" id="Email" name="Email" value="<?= htmlspecialchars($user['Email'] ?? '') ?>"><br>

        <label for="Phone_number">Phone Number:</label>
        <input type="tel" id="Phone_number" name="Phone_number" value="<?= htmlspecialchars($user['Phone_number'] ?? '') ?>"><br>

        <label for="Address">Address:</label>
        <textarea id="Address" name="Address"><?= htmlspecialchars($user['Address'] ?? '') ?></textarea><br>

        <input type="submit" value="Save Changes" style="background-color: #94BE96; color: black;border-radius: 3px; ">
                <!-- Sign-out button -->
        <form method="post" action="logout.php">
            <input type="submit" value="Sign Out" style="background-color: #E89797; color: black; border-radius: 3px;" >
        </form>
</body>
</html>

<?php require __DIR__ . "/inc/footer.php"; ?>