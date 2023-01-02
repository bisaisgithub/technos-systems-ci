<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login</title>
  <?php include_once 'components/css-libraries.php';?>
  <link rel="stylesheet" href="<?=base_url('assets/css/login.css');?>">
</head>

<body>
  <h2>Login</h2>
  <div class="form-container">
    <h3> <span>Technos</span> Systems</h3>
    <div class="body">
      <p>Sign in to start your session</p>
      <form class="row g-3"  method="post" action="" autocomplete="new-password">
        <div class="input-group has-validation">
          <input type="text" placeholder="Email" name="email" class="form-control" id="email" value="<?=isset($_COOKIE['email']) ? $_COOKIE['email'] : ''?>" autocomplete="new-password" aria-describedby="inputGroupPrepend" required>
          <span class="input-group-text" id="inputGroupPrepend"><i class="fa fa-envelope" aria-hidden="true"></i>
          </span>
          <div class="invalid-feedback">
            Please enter email.
          </div>
        </div>
        <div class="input-group has-validation">
          <input type="password" placeholder="Password" name="password" class="form-control" id="password" value="<?=isset($_COOKIE['password']) ? $_COOKIE['password'] : ''?>" autocomplete="new-password" aria-describedby="inputGroupPrepend" required>
          <span onclick="passwordToggle('password')" class="input-group-text cursor" id="inputGroupPrepend">
            <i id="passwordEye"  class="fa fa-eye" aria-hidden="true"></i>
          </span>
          <span class="input-group-text" id="inputGroupPrepend">
            <i class="fa fa-lock" aria-hidden="true"></i>
          </span>
          <div class="invalid-feedback">
            Please enter password
          </div>
        </div>
        <div class="remember">
          <div>
            <input class="form-check-input-no" type="checkbox" name="rememberMe" value="true" id="rememberMe" <?=(isset($_COOKIE['email']) && isset($_COOKIE['password'])) ? "checked" : ''?>>
            <label class="form-check-label" for="rememberMe">
              Remember Me
            </label>
          </div>
          <button class="btn btn-primary" name="SignIn" value="true" type="submit">Sign In</button>
        </div>
        <a href="register">
          <p>Register a new membership</p>
        </a>
        <?php if ($this->session->flashdata('login_err')): ?>
          <div class="alert alert-danger">
            <?=$this->session->flashdata('login_err')?>
          </div>
        <?php endif;?>
      </form>
    </div>
  </div>
  <?php include_once 'components/js-libraries.php';?>
  <script>
    function passwordToggle(element) {
      if (element === "password") {
        var eye = document.getElementById("passwordEye");
        var password = document.getElementById("password");
        if (password.type === "password") {
          password.type = "text";
          eye.classList.add("fa-eye-slash");
        } else {
          password.type = "password";
          eye.classList.remove("fa-eye-slash");
        }
      }
    }
  </script>
</body>

</html>