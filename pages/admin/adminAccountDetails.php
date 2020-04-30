<?PHP
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="css/adminAccountDetails.css">
  <title>Admin Account Settings</title>
</head>
<body>
  <header id = "loan-navigation-container">
    <nav id = "loan-global-navigation">
      <ul>
        <li class = "nav-links"><a href = "../loanmonitoring/adminOverview.php">Overview</a></li>
        <li class = "nav-links"><a href = "../loanmonitoring/loanMonitoring.php">Loan Monitoring</a></li>
        <li class = "nav-links"><a href = "../loanmonitoring/950th-employee.php">Employee</a></li>
        <li class = "nav-links"><a href = "../loanmonitoring/general-ledger.php">General Ledger</a></li>
        <li class = "nav-links"><a href = "#">Balance Sheet</a></li>
        <li><input type="text" name = "txt_search_employee" id = "txt_search_employee" placeholder = "Search Employee"/></li>
        <li>
          <div>
            <input type="button" id = "admin-button" value="Admin Button" onclick="document.getElementById('admin_menu_box').style.display='flex'"/>
            <div id="admin_menu_box">
              <a href="#">View Loan Request</a>
              <a href="#">Admin Details</a>
              <a href="logout.php">Sign Out</a>
            </div>
          </div>
        </li>
      </ul>
    </nav>
  </header>

  <main onclick="document.getElementById('admin_menu_box').style.display='none'">
<?php
if(isset($_SESSION['admin_username'])){
  echo '<div class="account_box">';
  echo '<h3>Hello, ' . $_SESSION['fname'] . '</h3>';
  echo '</div>';
} else {
  header('location: ../../pages/admin/adminSignInForm.php');
}
?>
    <section class="adminAccountDetailsPanel">
      <div class="aad-container">
        <div class="aad-header-container">
          <div class="adminAccountDetailsTitleBox">
            <h1 id="adminAccountDetailsTitle">Admin Account Details</h1>
          </div>
          <div class="aadeditbuttoncontainer">
            <button type="button" class="edit-button">
              Edit
            </button>
          </div>
        </div>
        <div class="adminAccountDetailsFormContainer">
          <form action="" method="POST" id="adminAccountDetails">
            <div class="adminUsernameBox">
              <label>Username</label>
              <input type="text" name="txt_admin_username" class="disabled-field" id="txt_admin_username" />
            </div>
            <div class="adminPasswordBox">
              <label>Password</label>
              <input type="text" name="txt_admin_password" class="disabled-field" id="txt_admin_password" />
            </div>
            <div class="adminAccountCommandContainer">
              <div class="adminUpdateButtonContainer">
                <input type="submit" name="btn_up_password" id="btn_up_password" value="Update Password" disabled />
              </div>
            </div>
          </form>
        </div>
      </div>
    </section>
  </main>
</body>
</html>