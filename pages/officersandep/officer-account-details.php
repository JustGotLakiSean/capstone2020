<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="css/oep-accountdetails.css">
  <title>Officers and EP Account Details</title>
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
    <section class="oaep-content">
      <div class="oaep-panel">
        <div class="oaep-title-container">
          <h1>Account Details</h1>
        </div>
        <form action="" method="POST" id="oaep-account-details">
          <div class="oaep-accountdetails-fields">
            <label>Username</label>
            <input type="text" name="txt_oaep_username" id="txt_oaep_username" />
            <label>Password</label>
            <input type="text" name="txt_oaep_password" id="txt_oaep_password" />
          </div>
          <div class="admin-cp-link-container">
            <a href="officer-change-password.php" id="oaep-link"><i>Change Your Password</i></a>
          </div>
        </form>
      </div>
    </section>
  </article>
</body>
</html>