<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <?php include('components/bootstrap.php'); ?>
  <link rel="stylesheet" href="<?= base_url('assets/css/register.css'); ?>">
</head>

<body>
  <h2>Registration</h2>
  <div class="form-container-register">
    <h3> <span>Technos</span> Systems</h3>
    <div class="body">
      <p>Register a new membership</p>
      <form class="row g-3 needs-validation" novalidate method="post" action="">
        <div class="input-group has-validation">
          <input type="text" placeholder="Full name" name="full_name" class="form-control" id="full_name" aria-describedby="inputGroupPrepend" required>
          <span class="input-group-text" id="inputGroupPrepend"><i class="fa fa-user" aria-hidden="true"></i>
          </span>
          <div class="invalid-feedback">
            Please enter Full name.
          </div>
        </div>
        <div class="input-group has-validation">
          <input type="email" placeholder="Email" name="email" class="form-control" id="email" aria-describedby="inputGroupPrepend" required>
          <span class="input-group-text" id="inputGroupPrepend"><i class="fa fa-envelope" aria-hidden="true"></i>
          </span>
          <div class="invalid-feedback">
            Please enter a valid email.
          </div>
        </div>
        <div class="input-group has-validation">
          <input type="text" placeholder="Password" name="password" class="form-control" id="password" autocomplete="new-password" pattern="^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*[!@#$%^&*_=+-]).{8,24}$" aria-describedby="inputGroupPrepend" required>
          <span class="input-group-text" id="inputGroupPrepend"><i class="fa fa-lock" aria-hidden="true"></i>
          </span>
          <div class="invalid-feedback">
            <!-- Please enter password -->
            Password is atleast 8 characters with one lowercase, uppercase, number and symbol.
          </div>
        </div>
        <div class="input-group has-validation">
          <input type="text" placeholder="Retype password" name="confirmpassword" class="form-control" pattern="^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*[!@#$%^&*_=+-]).{8,24}$" id="confirmpassword" aria-describedby="inputGroupPrepend" required>
          <span class="input-group-text" id="inputGroupPrepend"><i class="fa fa-lock" aria-hidden="true"></i>
          </span>
          <div class="invalid-feedback">
            <!-- Please Retype your password. -->
            Password is atleast 8 characters with one lowercase, uppercase, number and symbol.
          </div>
        </div>
        <div class="remember">
          <div class="form-check">
            <input required class="form-check-input" type="checkbox" value="" id="agreeCheck">
            <label class="form-check-label" for="agreeCheck">
              I agree to the <a href="#">terms</a>
            </label>
            <div class="invalid-feedback">
              You must agree before submitting.
            </div>
          </div>
          <button class="btn btn-primary" name="submit" type="submit">Register</button>
        </div>
        <a href="login.php" id="alreadyhave">
          <p class="p">I already have a membership</p>
        </a>
        <?php if (isset($_SESSION['success_msg']) && !empty($_SESSION['success_msg'])) : ?>
          <div class="alert alert-success">
            <?= $_SESSION['success_msg'] ?>
          </div>
          <?php unset($_SESSION['success_msg']); ?>
        <?php else : ?>
        <?php endif; ?>
        <?php if (isset($err) && !empty($err)) : ?>
          <div class="alert alert-danger" id="alertmessage">
            <?= $err ?>
          </div>
        <?php endif; ?>
      </form>
    </div>
  </div>
  <script src="<?= base_url('assets/js/script.js'); ?>"></script>
</body>

</html>