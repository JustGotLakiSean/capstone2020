<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="css/civilian-account-details.css">
  <title>Civilian Account Details</title>
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
    <section class="cead-content">
      <div class="cead-panel">
        <div class="cead-title-container">
          <h1>Account Details</h1>
        </div>
        <form method="POST" action="" id="ce-account-details">
          <div class="ce-accountdetails-fields">
            <label>Username</label>
            <input type="text" name="ce-username" id="ce-username" />
            <label>Password</label>
            <input type="password" name="ce-password" id="ce-password" />
          </div>
          <div class="admin-cp-link-container">
            <a href="civilian-change-password.php" id="cecp-link"><i>Change Your Password</i></a>
          </div>
        </form>
      </div>
    </section>

</body>
</html>