<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="css/oep-login.css">
  <title>Officers and EP Sign In</title>
</head>
<body>

  <header id="oep-header">
    <nav>
      <ul>
        <li>
          <a href="../index.php">Home</a>
        </li>
      </ul>
    </nav>
  </header>

  <section id = "oep-signin-container">
    <div id = "oep-signin-label-container">
      <h1>Officers Sign In Form</h1>
    </div>
    <form action = "" method = "POST" id = "oep-signin-form">
      <div id = "oep-credentials-container">
        <input type="text" name = "txt_oep_username" id = "txt_oep_username" placeholder="Username"/>
        <input type="password" name = "txt_oep_password" id = "txt_oep_password" placeholder="Password" />
        <input type="submit" name = "btn_oepsubmit_login" disabled id = "btn_oepsubmit_login" value="Login" />
      </div>
      <hr class="hr-or">
      <div id = "oep-signin-as-options">
        <label>Sign In As</label>
        <div class="oep-btn-option">
          <input type="button" name="btn-al-link" id="btn-al-link" value="Admin" />
          <input type="button" name="btn-ce-link" id="btn-ce-link" value="Civilian Employee" />
        </div>
      </div>
      <hr>
      <div id = "oep-options">
        <a href = "adminForgotPassword.php" id = "oepforgotpasslink">Forgot Password</a>
        <a href = "register_oep_account.php" id = "new_oep_acclink">Don't have an account?</a>
      </div>
    </form>
  </section>
</body>
</html>