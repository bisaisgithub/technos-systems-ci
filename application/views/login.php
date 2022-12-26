<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login</title>
  <?php include('components/bootstrap.php'); ?>
  <link rel="stylesheet" href="<?= base_url('assets/css/login.css'); ?>">
</head>

<body>
  <h2>Login</h2>
  <div class="form-container">
    <h3> <span>Technos</span> Systems</h3>
    <div class="body">
      <p>Sign in to start your session</p>
      <form class="row g-3"  method="post" action="" autocomplete="new-password">
        <div class="input-group has-validation">
          <input type="text" placeholder="Email" name="email" class="form-control" id="email" value="<?= isset($_COOKIE['email']) ? $_COOKIE['email'] : '' ?>" autocomplete="new-password" aria-describedby="inputGroupPrepend" required>
          <span class="input-group-text" id="inputGroupPrepend"><i class="fa fa-envelope" aria-hidden="true"></i>
          </span>
          <div class="invalid-feedback">
            Please enter email.
          </div>
        </div>
        <div class="input-group has-validation">
          <input type="password" placeholder="Password" name="password" class="form-control" id="password" value="<?= isset($_COOKIE['password']) ? $_COOKIE['password'] : '' ?>" autocomplete="new-password" aria-describedby="inputGroupPrepend" required>
          <span class="input-group-text" id="inputGroupPrepend"><i class="fa fa-lock" aria-hidden="true"></i>
          </span>
          <div class="invalid-feedback">
            Please enter password
          </div>
        </div>
        <div class="remember">
          <div>
            <input class="form-check-input-no" type="checkbox" name="rememberMe" value="" id="rememberMe" <?= (isset($_COOKIE['email']) && isset($_COOKIE['password'])) ? "checked" : '' ?>>
            <label class="form-check-label" for="rememberMe">
              Remember Me
            </label>
          </div>
          <button class="btn btn-primary" name="submit" type="submit">Sign In</button>
        </div>
        <a href="register">
          <p>Register a new membership</p>
        </a>
        <?php if (isset($_SESSION['msg']) && !empty($_SESSION['msg'])) : ?>
          <div class="alert alert-success">
            <?= $_SESSION['msg'] ?>
          </div>
          <?php unset($_SESSION['msg']); ?>
        <?php elseif (isset($_SESSION['err']) && !empty($_SESSION['err'])) : ?>
          <div class="alert alert-danger" id="alertmessage">
            <?= $_SESSION['err'] ?>
          </div>
          <?php unset($_SESSION['err']); ?>
          <?php else : ?>
        <?php endif; ?>
      </form>
    </div>
  </div>
</body>

</html>