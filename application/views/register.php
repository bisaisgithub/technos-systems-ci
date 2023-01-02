<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Register</title>
  <?php include_once 'components/css-libraries.php';?>
  <link rel="stylesheet" href="<?=base_url('assets/css/register.css');?>">
  <script>
    function onFocus(){
      var element = document.getElementById('register_notif');
      element.parentNode.removeChild(element);
    }
  </script>
</head>

<body>
  <h2>Registration</h2>
  <div class="form-container-register">
    <h3> <span>Technos</span> Systems</h3>
    <div class="body">
      <p>Register a new membership</p>
      <form class="row g-3 needs-validation" novalidate method="post" action="">
        <div class="input-group has-validation">
          <input onfocus="onFocus()" value="<?php echo set_value('full_name'); ?>" type="text" placeholder="Full name" name="full_name" class="form-control" id="full_name" aria-describedby="inputGroupPrepend" required>
          <span class="input-group-text" id="inputGroupPrepend"><i class="fa fa-user" aria-hidden="true"></i>
          </span>
          <div class="invalid-feedback">
            Please enter Full name.
          </div>
        </div>
        <div class="input-group has-validation">
          <input type="email" placeholder="Email" value="<?php echo set_value('email'); ?>" name="email" class="form-control" id="email" aria-describedby="inputGroupPrepend" required>
          <span class="input-group-text" id="inputGroupPrepend"><i class="fa fa-envelope" aria-hidden="true"></i>
          </span>
          <div class="invalid-feedback">
            Please enter a valid email.
          </div>
        </div>
        <div class="input-group has-validation">
          <input type="password" placeholder="Password" value="<?php echo set_value('password'); ?>" name="password" class="form-control" id="password" autocomplete="new-password" pattern="^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*[!@#$%^&*_=+-]).{8,24}$" aria-describedby="inputGroupPrepend" required>
          <span onclick="passwordToggle('password')" class="input-group-text cursor" id="inputGroupPrepend">
            <i id="passwordEye"  class="fa fa-eye" aria-hidden="true"></i>
          </span>
          <span class="input-group-text" id="inputGroupPrepend">
            <i class="fa fa-lock" aria-hidden="true"></i>
          </span>
          <div class="invalid-feedback">
            <!-- Please enter password -->
            Password is atleast 8 characters with one lowercase, uppercase, number and symbol.
          </div>
        </div>
        <div class="input-group has-validation">
          <input type="password" placeholder="Retype password" value="<?php echo set_value('confirmpassword'); ?>" name="confirmpassword" class="form-control" pattern="^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*[!@#$%^&*_=+-]).{8,24}$" id="confirmpassword" aria-describedby="inputGroupPrepend" required>
          <span onclick="passwordToggle('confirmpassword')" class="input-group-text cursor" id="inputGroupPrepend">
            <i id="confirmpasswordEye"  class="fa fa-eye" aria-hidden="true"></i>
          </span>
          <span class="input-group-text" id="inputGroupPrepend">
            <i class="fa fa-lock" aria-hidden="true"></i>
          </span>
          <div class="invalid-feedback">
            <!-- Please Retype your password. -->
            Password is atleast 8 characters with one lowercase, uppercase, number and symbol.
          </div>
        </div>
        <div class="remember">
          <div class="form-check">
            <input required class="form-check-input" type="checkbox" id="agreeCheck" name="terms" value="true" <?= (isset($_POST['terms'])) ? "checked" : '' ?>>
            <label class="form-check-label" for="agreeCheck"> 
              I agree to the <a href="#">terms</a>
            </label>
            <div class="invalid-feedback">
              You must agree before submitting.
            </div>
          </div>
          <button class="btn btn-primary" name="register" value="true" type="submit">Register</button>
        </div>
        <a href="login" id="alreadyhave">
          <p class="p">I already have a membership</p>
        </a>
        <?php if ($this->session->flashdata('register_success')): ?>
          <div id="register_notif" class="alert alert-success">
            <?=$this->session->flashdata('register_success')?>
          </div>
        <?php elseif ($this->session->flashdata('register_error')): ?>
          <div id="register_notif" class="alert alert-danger" id="alertmessage">
            <?=$this->session->flashdata('register_error')?>
            <?php
              if (!empty(validation_errors())) {
                ?>
                    <?=validation_errors(); ?>
                <?php
              }
            ?>
          </div>
        <?php endif;?>
        
      </form>
    </div>
  </div>
  <?php include_once 'components/css-libraries.php';?>
  <script src="<?=base_url('assets/js/script.js');?>"></script>
</body>

</html>