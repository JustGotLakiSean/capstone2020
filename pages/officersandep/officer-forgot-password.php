<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Forgot Password Page</title>
</head>
<body>
  <div id = "oaep-nav-home">
    <div id = "oaep-home-container">
      <button type="button" id = "oaep-nav-home" onclick="location.href='../index.php'">
        950th WLMS
      </button>
    </div>
  </div>
  <div class="oaep-forgot-password-form-container">
    <div class="oaep-forgot-password-title-container">
      <h4>Forgot Password</h4>
    </div>
    <form action="" method="POST" id="oaep-forgot-password-form">
      <div class="oaep-new-password-container">
        <label>Enter New Password</label>
        <input type="password" id="oaep-new-password" name="oaep-new-password" required/>
        <label>Confirm New Password</label>
        <input type="password" id="oaep-confirm-new-password" name="oaep-confirm-new-password" required />
      </div>
      <div class="oaep-new-password-command-container">
        <input type="submit" name="update-oaep-password" id="update-oaep-password" value="Update Password" />
      </div>
    </form>
  </div>
</body>
</html>