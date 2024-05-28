<?php require __DIR__ . "/inc/header.php";
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

if (!isset($_SESSION['Is_Admin']) || !$_SESSION['Is_Admin']) {
    // Redirect non-admin users to a different page
    header("Location: index.php");
    exit();
}

require_once __DIR__ . '/classes/DatabaseController.php'; 
require_once __DIR__ . '/classes/MemberController.php';

$db = new DatabaseController("mysql:host=127.0.0.1;dbname=broadleigh_db;charset=utf8", "root", "");
$memberController = new MemberController($db);

if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST['delete_user'])) {
    $userId = $_POST['delete_user'];
    $memberController->delete_member($userId);
}

$users = $memberController->get_all_members();
?>

<h1 style="color: black; text-align: center; padding-top: 15px">Admin Dashboard - Manage Users</h1>
<section class="vh-100 text-center">
    <div class="container py-5 h-75">
        <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col-12">
                <table class="table table-bordered table-striped">
                    <thead class="table-dark">
                        <tr>
                            <th>User ID</th>
                            <th>First Name</th>
                            <th>Last Name</th>
                            <th>Username</th>
                            <th>Email</th>
                            <th>Phone Number</th>
                            <th>Address</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($users as $user): ?>
                            <tr class="table-row">
                                <td><?php echo htmlspecialchars($user['User_id']); ?></td>
                                <td><?php echo htmlspecialchars($user['F_name']); ?></td>
                                <td><?php echo htmlspecialchars($user['S_name']); ?></td>
                                <td><?php echo htmlspecialchars($user['Username']); ?></td>
                                <td><?php echo htmlspecialchars($user['Email']); ?></td>
                                <td><?php echo htmlspecialchars($user['Phone_number']); ?></td>
                                <td><?php echo htmlspecialchars($user['Address']); ?></td>
                                <td>
                                    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" onsubmit="return confirm('Are you sure you want to delete this user?');">
                                        <input type="hidden" name="delete_user" value="<?php echo $user['User_id']; ?>">
                                        <button type="submit" class="btn btn-danger">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</section>  
<?php require __DIR__ . "/inc/footer.php"; ?>

<style>
    body {
        font-family: Arial, sans-serif;
    }

    h1 {
        margin-bottom: 30px;
    }

    .container {
        max-width: 80%; /* Adjust to desired width */
        margin: auto;
    }

    .table {
        width: 100%;
        margin-top: 20px;
    }

    .table th, .table td {
        vertical-align: middle;
        text-align: center;
    }

    .table thead {
        background-color: #343a40;
        color: #fff;
    }

    .table tbody .table-row {
        background-color: #f2f2f2; /* Uniform background color for all rows */
    }

    .btn-danger {
        background-color: #dc3545;
        color: #fff;
        border: none;
        padding: 8px 12px;
        border-radius: 5px;
        cursor: pointer;
        transition: background-color 0.3s ease;
    }

    .btn-danger:hover {
        background-color: #c82333;
    }

    .btn-danger:focus {
        outline: none;
        box-shadow: 0 0 0 0.2rem rgba(220, 53, 69, 0.5);
    }

    @media (max-width: 768px) {
        .container {
            max-width: 95%;
        }

        .table th, .table td {
            font-size: 0.9rem;
        }

        .btn-danger {
            padding: 6px 10px;
        }
    }
</style>
