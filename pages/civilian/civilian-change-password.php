<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="css/civilian-change-password.css">
  <title>Change your Password</title>
</head>
<body>

  <header id="cl-header">
    <nav>
      <ul>
        <li>
          <a href="../index.php" class="ce-home-link">950th CEISG</a>
        </li>
        <li>
          <input type="button" name="cl-btnaction" id="cl-btnaction" onclick="document.getElementById('ce_menu_box').style.display='flex'" value="Your Account" />
          <div id="ce_menu_box">
            <a href="#">Account Details</a>
            <a href="#">Sign Out</a>
          </div>
        </li>
      </ul>
    </nav>
  </header>
  
  <article onclick="document.getElementById('ce_menu_box').style.display='none'">
    <section class="cecp-content">
      <div class="cecp-panel">
        <div class="cecp-titlecontainer">
          <h1>Change Password</h1>
        </div>
        <form method="POST" action="" id="ce-change-password">
          <div class="ce-change-password-fields">
            <label>Enter Current Password</label>
            <input type="password" name="ce-current-password" id="ce-current-password" />
            <label>Enter New Password</label>
            <input type="password" name="ce-new-password" id="ce-new-password" />
            <label>Confirm New Password</label>
            <input type="password" name="ce-confirmnew-password" id="ce-confirmnew-password" />
          </div>
          <div class="ce-changepassword-commands">
            <input type="submit" name="btn_up_password" disabled id="btn_up_password" value="Update Password" />
          </div>
        </form>
      </div>
    </section>
  </article>

</body>
</html>