<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Forgot Password Page</title>
</head>
<body>
  <div id = "ce-nav-home">
    <div id = "ce-home-container">
      <button type="button" id = "ce-nav-home" onclick="location.href='../index.php'">
        950th WLMS
      </button>
    </div>
  </div>
  <div class="ce-forgot-password-form-container">
    <div class="ce-forgot-password-title-container">
      <h4>Forgot Password</h4>
    </div>
    <form action="" method="POST" id="ce-forgot-password-form">
      <div class="ce-new-password-container">
        <label>Enter New Password</label>
        <input type="password" id="ce-new-password" name="ce-new-password" required/>
        <label>Confirm New Password</label>
        <input type="password" id="ce-confirm-new-password" name="ce-confirm-new-password" required />
      </div>
      <div class="ce-new-password-command-container">
        <input type="submit" name="update-ce-password" id="update-ce-password" value="Update Password" />
      </div>
    </form>
  </div>
</body>
</html>