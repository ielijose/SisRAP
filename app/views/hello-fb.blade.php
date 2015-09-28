<!doctype html>
  <html lang="en" class="login page">
  <head>
    <meta charset="8-UTF">
    <title>Login</title>
  </head>
  <body>
    <div class="container">
      <div class="login-social">
      </div>
    </div>

    <pre>
      <?php if (Social::check('facebook')): ?>
      	<?php $user = Social::facebook('user'); ?>
      	<img src="https://graph.facebook.com/<?= $user->id ?>/picture?type=small">

        <?= print_r( $user )?>
      <?php endif; ?>
    </pre>

  </body>
  </html>