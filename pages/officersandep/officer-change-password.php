<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=devioaep-width, initial-scale=1.0">
  <link rel="stylesheet" href="css/officer-change-password.css">
  <title>Change your Password</title>
</head>
<body>

  <header id="oep-header">
    <nav>
      <ul>
        <li>
          <a href="../index.php" class="oaep-home-link">950th CEISG</a>
        </li>
        <li>
          <input type="button" name="oep-btnaction" id="oep-btnaction" onclick="document.getElementById('oaep_menu_box').style.display='flex'" value="Your Account" />
          <div id="oaep_menu_box">
            <a href="#">Account Details</a>
            <a href="#">Sign Out</a>
          </div>
        </li>
      </ul>
    </nav>
  </header>

  <article onclick="document.getElementById('oaep_menu_box').style.display='none'">
    <section class="oaepcp-content">
      <div class="oaepcp-panel">
        <div class="oaepcp-titlecontainer">
          <h1>Change Password</h1>
        </div>
        <form method="POST" action="" id="oaep-change-password">
          <div class="oaep-change-password-fields">
            <label>Enter Current Password</label>
            <input type="password" name="oaep-current-password" id="oaep-current-password" />
            <label>Enter New Password</label>
            <input type="password" name="oaep-new-password" id="oaep-new-password" />
            <label>Confirm New Password</label>
            <input type="password" name="oaep-confirmnew-password" id="oaep-confirmnew-password" />
          </div>
          <div class="oaep-changepassword-commands">
            <input type="submit" name="btn_up_password" id="btn_up_password" disabled value="Update Password" />
          </div>
        </form>
      </div>
    </section>
  </article>

</body>
</html>