<?PHP
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="css/adminSettings.css">
  <title>Admin Setting</title>
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
    <section class="account-settings-detailsbox">
      <div class="as-inner">
        <div class="as-header">
          <h1>Admin Settings</h1>
        </div>
        <div class="first-detailbox personal-details">
          <div class="firstinner">
            <div class="first-detailsbox-title-container">
              <h3>Admin's Personal Detail Page</h3>
            </div>
            <div class="first-detailsbox-description">
              <p>View, modify your personal information such as
                your name, contact, and email.</p>
            </div>
          </div>
          <div class="viewbutton-container pd-viewbtn">
            <button type="button" onclick="window.location.href='adminPersonalDetails.php'">
              View
            </button>
          </div>
        </div>
        <hr>
      
        <div class="second-detailbox account-details">
          <div class="firstinner">
            <div class="second-detailsbox-title-container">
              <h3>Admin's Account Detail Page</h3>
            </div>
            <div class="second-detailsbox-description">
              <p>View, modify your Log in Account such as your
                Username and Password.</p>
            </div>
          </div>
          <div class="viewbutton-container pd-viewbtn">
            <button type="button" onclick="window.location.href='adminAccountDetails.php'">
              View
            </button>
          </div>
        </div>
        <hr>
      
        <div class="third-detailbox loanrates-details">
          <div class="firstinner">
            <div class="third-detailsbox-title-container">
              <h3>Loan Detail Page</h3>
            </div>
            <div class="third-detailsbox-description">
              <p>View, modify loan rates.</p>
            </div>
          </div>
          <div class="viewbutton-container pd-viewbtn">
            <button type="button" onclick="window.location.href='adminLoanMonitoringPage.php'">
              View
            </button>
          </div>
        </div>
        <hr>
      </div>
    </section>

  </main>
</body>
</html>