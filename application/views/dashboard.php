<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Welcome</title>
  <?php include('components/css-libraries.php'); ?>
  <link rel="stylesheet" href="<?= base_url('assets/css/home.css'); ?>">
</head>

<body>
  <h1>Welcome </h1>
  <div class="form-container-index">
    <h3> <span>Technos</span> Systems</h3>
    <div class="body">
      <h2>Welcome</h2>
      <h2>
        <?=$full_name ?>
      </h2>
      <form class="row g-3 needs-validation" novalidate method="post" action="">
        <a href="logout">
          <p class="btn btn-primary p">Logout</p>
        </a>
      </form>
    </div>
  </div>
  <?php include('components/js-libraries.php'); ?>
</body>

</html>