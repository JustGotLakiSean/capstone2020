<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/adminsigninform-styles.css">
    <?php include('css/adminsigninform-styles.php'); ?>
    <title>Admin Sign In</title>
  </head>
  <script type="text/javascript">
  function validateLogin() {
    var valid = true;

    var username = document.getElementById('txt_admin_username').value;
    var password = document.getElementById('txt_admin_password').value;

    // var username_error = document.getElementById('username_error');
    // var password_error = document.getElementById('password_error');

    if(username == "") {
      document.getElementById('username_error').innerHTML = '*';
      valid = false;
    }

    if(password == "") {
      document.getElementById('password_error').innerHTML = '*';
      valid = false;
    }

    return valid;
  }
  </script>
  <body>
    
    <header id="asf-header">
      <nav>
        <ul>
          <li>
            <a href="../index.php">Home</a>
          </li>
        </ul>
      </nav>
    </header>

    <section id = "admin-signin-container">
      <form action = "../../gateway/validateUser.php" method = "POST" id = "admin-signin-form" onsubmit="return validateLogin()">
        <div class="asf-section-header">
          <h1>Admin Sign in Form</h1>
        </div>
        <hr>
        <div id="asf-inputbox">
          <input type="text" name = "txt_admin_username" id = "txt_admin_username" required placeholder = "Enter Username" /><span id="username_error"></span>
          <input type="password" name = "txt_admin_password" id = "txt_admin_password" required placeholder = "Enter Password" /><span id="password_error"></span>
          <input type="submit" name = "btn_submit_login" id = "btn_submit_login" value="Sign In" />
        </div>
        <hr class="hr-or">
        <div id = "admin-signin-as-options">
          <label>Sign In As</label>
          <div id="asf-btn-option">
            <button type="button" class="btn-ce" onclick="window.location.href='../civilian/civilian-login.php'" style="cursor: pointer;">Civilian Employee</button>
            <button type="button" class="btn-oaep" onclick="window.location.href='../officersandep/officer-ep-login.php'" style="cursor: pointer;">Officers and EP</button>
          </div>
        </div>
        <hr>
        <div id = "admin-options">
          <!-- <a href = "adminForgotPassword.php">Forgot Password</a> -->
          <a href = "registerAdminAccount.php">Create New Account</a>
        </div>
      </form>
    </section>
  </body>
</html>