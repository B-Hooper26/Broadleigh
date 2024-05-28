<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
session_unset();

require_once './inc/functions.php';

$message = isset($_GET['error']) ? htmlspecialchars($_GET['error']) : '';
$email = null;
$password = null;

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = InputProcessor::processEmail($_POST['Email']);
    $password = InputProcessor::processPassword($_POST['Password']);

    $valid = $email['valid'] && $password['valid'];

    if ($valid) {
        $member = $controllers->members()->login_member($email['value'], $password['value']);

        if (!$member) {
            $message = "User details are incorrect."; // Error checking
        } else {
            $_SESSION['user'] = $member;
            $_SESSION['Is_Admin'] = $member['Is_Admin'] ? true : false; // Set admin status
            if ($_SESSION['Is_Admin']) {
                redirect('Admin'); // Redirect admin to admin page
            } else {
                $_SESSION['User_id'] = $member['User_id'];
                redirect('Home'); // Redirect regular user to home page
            }
        }
    } else {
        $message = "Please fix the above errors.";
    }
}
?>


<form method="post" action="<?= htmlspecialchars($_SERVER['PHP_SELF']) ?>">
    <section class="vh-100">
        <div class="container py-5 h-75">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-12 col-md-8 col-lg-6 col-xl-5">
                    <div class="card shadow-2-strong" style="border-radius: 1rem;">
                        <div class="card-body p-5 text-center">
                            <h3 class="mb-2">Sign in</h3>
                            <div class="form-outline mb-4">
                                <input type="email" id="Email" name="Email" class="form-control form-control-lg" placeholder="Email" required value="<?= htmlspecialchars($email['value'] ?? '') ?>" />
                                <span class="text-danger"><?= $email['error'] ?? '' ?></span>
                            </div>
                            <div class="form-outline mb-4">
                                <input type="password" id="Password" name="Password" class="form-control form-control-lg" placeholder="Password" required value="<?= htmlspecialchars($password['value'] ?? '') ?>" />
                                <span class="text-danger"><?= $password['error'] ?? '' ?></span>
                            </div>
                            <button class="btn btn-primary btn-lg w-100 mb-4" type="submit">Login</button>
                            <a class="btn btn-secondary btn-lg w-100" href="./register.php">Not Signed Up?</a>
                            <?php if ($message): ?>
                                <div class="alert alert-danger mt-4" role="alert">
                                    <?= $message ?? '' ?>
                                </div>
                            <?php endif ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</form>
