<?php
  
  require_once './inc/functions.php';

  $message = isset($_GET['error']) ? htmlspecialchars($_GET['error']) : '';

  if ($_SERVER['REQUEST_METHOD'] == 'POST')
  {
    $fname = InputProcessor::processString($_POST['F_name']);
    $sname =  InputProcessor::processString($_POST['S_name']);
    $username =  InputProcessor::processString($_POST['Username']);
    $email =  InputProcessor::processEmail($_POST['Email']);
    $password =  InputProcessor::processPassword($_POST['Password'], $_POST['password-v']);
    $phonenumber =  InputProcessor::processString($_POST['Phone_number']);
    $address =  InputProcessor::processString($_POST['Address']);

    $valid = $fname['valid'] && $sname['valid'] && $username['valid'] && $email['valid'] && $password['valid'] && $phonenumber['valid'] && $address['valid'];

    $message = !$valid ? "Please fix the above errors:" : '';

    if ($valid)
    {

      $args = ['F_name' => $fname['value'],
               'S_name' => $sname['value'],
               'Username' => $username['value'],
               'Email' => $email['value'],
               'Password' => password_hash($password['value'], PASSWORD_DEFAULT),
               'Phone_number' => $phonenumber['value'],
               'Address' => $address['value']];
    
  
      $member = $controllers->members()->register_member($args);
      if ($member) {
        redirect("login", ["error" => "Please login with your new account"]);
      } else {
        $message = "Email already registered.";
      }
      
    }
    

  }
?>
<form method="post" action=" <?= htmlspecialchars($_SERVER['PHP_SELF']) ?>">
  <section class="vh-100">
    <div class="container py-5 h-75">
      <div class="row d-flex justify-content-center align-items-center h-100">
        <div class="col-12 col-md-8 col-lg-6 col-xl-5">
          <div class="card shadow-2-strong" style="border-radius: 1rem;">
            <div class="card-body p-5 text-center">

              <h3 class="mb-2">Register</h3>
              <div class="form-outline mb-4">
                <input required type="text" id="Fname" name="F_name" class="form-control form-control-lg" placeholder="Firstname" value="<?= htmlspecialchars($fname['value'] ?? '') ?>"/>
                <small class="text-danger"><?= htmlspecialchars($fname['error'] ?? '') ?></small>
              </div>

              <div class="form-outline mb-4">
                <input required type="text" id="Sname" name="S_name" class="form-control form-control-lg" placeholder="Surname" value="<?= htmlspecialchars($sname['value'] ?? '') ?>"/>
                <small class="text-danger"><?= htmlspecialchars($sname['error'] ?? '') ?></small>
              </div>
              <div class="form-outline mb-4">
                <input required type="text" id="username" name="Username" class="form-control form-control-lg" placeholder="Username" value="<?= htmlspecialchars($username['value'] ?? '') ?>"/>
                <small class="text-danger"><?= htmlspecialchars($username['error'] ?? '') ?></small>
              </div>


              <div class="form-outline mb-4">
                <input required type="email" id="email" name="Email" class="form-control form-control-lg" placeholder="Email" value="<?= htmlspecialchars($email['value']?? '') ?>" />
                <small class="text-danger"><?= htmlspecialchars($email['error'] ?? '') ?></small>
              </div>

              <div class="form-outline mb-4">
                <input required type="password" id="password" name="Password" class="form-control form-control-lg" placeholder="Password" />
              </div>
              
              <div class="form-outline mb-4">
                <input required type="password" id="password-v" name="password-v" class="form-control form-control-lg" placeholder="Password again" />
                <small class="text-danger"><?= htmlspecialchars($password['error'] ?? '') ?></small>
              </div>
              <div class="form-outline mb-4">
                <input required type="text" id="phonenumber" name="Phone_number" class="form-control form-control-lg" placeholder="Phone Number" value="<?= htmlspecialchars($phonenumber['value'] ?? '') ?>"/>
                <small class="text-danger"><?= htmlspecialchars($phonenumber['error'] ?? '') ?></small>
              </div>
              <div class="form-outline mb-4">
                <input required type="text" id="address" name="Address" class="form-control form-control-lg" placeholder="Address" value="<?= htmlspecialchars($address['value'] ?? '') ?>"/>
                <small class="text-danger"><?= htmlspecialchars($address['error'] ?? '') ?></small>
              </div>

              <button class="btn btn-primary btn-lg w-100 mb-4" type="submit">Register</button>
              <a class="btn btn-secondary btn-lg w-100" type="submit" href="./login.php" >Already got an account?</a>

              <?php if ($message): ?>
                <div class="alert alert-danger mt-4">
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