<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="css/civilian-login.css" />
  <title>Civilian Sign In</title>
</head>
<body>

  <header id="cl-header">
    <nav>
      <ul>
        <li>
          <a href="../index.php">Home</a>
        </li>
      </ul>
    </nav>
  </header>

  <section id = "civilian-signin-container">
    <div id = "civilian-signin-label-container">
      <h1>Civilian Sign In Form</h1>
    </div>
    <form action = "" method = "POST" id = "civilian-signin-form">
      <div id = "civilian-credentials-container">
        <input type="text" name = "txt_civilian_username" id = "txt_civilian_username" placeholder="Username"/>
        <input type="password" name = "txt_civilian_password" id = "txt_civilian_password" placeholder="Password"/>
        <input type="submit" name="btn-cl-submit" disabled id="btn-cl-submit" value="Log In" />
      </div>
      <hr class="hr-or">
      <div id = "civ-signin-as-options">
        <label>Sign In As</label>
        <div id="cl-btn-option">
          <input type="button" name="btn-al-link" id="btn-al-link" value="Admin" />
          <input type="button" name="btn-oaep-link" id="btn-oaep-link" value="Officers And EP" />
        </div>
      </div>
      <hr>
      <div id = "civilian-options">
        <a href = "adminForgotPassword.php" id = "civforgotpasslink">Forgot Password</a>
        <a href = "registerCivilianEmployeeAccount.php" id = "newcivacclink">Don't have an account?</a>
      </div>
    </form>
  </section>
</body>
</html>