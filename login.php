
<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
    <meta charset="utf-8">
    <title>Welcome to Reeceflix!</title>
    <link rel="stylesheet" type="text/css" href="assets/style/style.css" />
</head>
<body>
    <div class="signInContainer">
    <div class="column">
        <div class="header">
        <img src="assets/images/logo.png" title="Logo" alt="Site logo">
        <h3>Sign In</h3>
        <span>to continue to Reeceflix</span>
        </div>
        <form class="" method="POST">
        <?php/*  echo $account->getError(Constants::$loginFailed);  */?>
        <!-- <input type="text" name="username" placeholder="Username" value="<?php /* getInputValue("username"); */?>" required> -->
        <input type="text" name="username" placeholder="Username" value="" required>
        <input type="password" name="password" placeholder="Password" required>
        <input type="submit" name="submitButton" value="SUBMIT">
        </form>
        <a href="register.php" class="signInMessage">Need an account? Sign in here</a>
    </div>
    </div>
</body>
</html>
