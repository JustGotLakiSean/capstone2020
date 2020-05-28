<?PHP

session_start();

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Admin Overview</title>
  <link rel="stylesheet" href="css/adminOverview.css">
</head>
<body>
  <header id = "loan-navigation-container">
    <nav id = "loan-global-navigation">
      <ul>
        <li class = "nav-links"><a href = "adminOverview.php">Overview</a></li>
        <li class = "nav-links"><a href = "loanMonitoring.php">Loan Monitoring</a></li>
        <li class = "nav-links"><a href = "950th-employee.php">Employee</a></li>
        <li class = "nav-links"><a href = "general-ledger.php">General Ledger</a></li>
        <li class = "nav-links"><a href = "#">Balance Sheet</a></li>
        <li>
          <div>
            <input type="button" id = "admin-button" value="Admin Button" onclick="document.getElementById('admin_menu_box').style.display='flex'"/>
            <div id="admin_menu_box">
              <a href="../../pages/admin/adminSettings.php">Setting</a>
              <a href="../../pages/admin/adminloanrequest.php">View Loan Request</a>
              <a href="logout.php">Sign Out</a>
            </div>
          </div>
        </li>
      </ul>
    </nav>
  </header>

  <main onclick="document.getElementById('admin_menu_box').style.display='none'">
    <div id = "overview-container">
<?php
if(isset($_SESSION['admin_username'])){
  echo '<div class="account_box">';
  echo '<h3>Hello, ' . $_SESSION['fname'] . '</h3>';
  echo '</div>';
} else if(!isset($_SESSION['admin_username'])) {
  // header('location: ../../pages/admin/adminSignInForm.php');
  echo '<script>
  window.location.href="../../pages/admin/adminSignInForm.php"
  </script>';
}
?>
      <h1>Overview</h1>
      <div id = "transaction-cards" class = "card-container">
        <div id = "borrower_number_cards" class = "cards first-card">
          <div id = "first-card-label-container">
            <p id = "first-card-label">Number of Borrowers</p>
          </div>
          <div id = "first-card-value-container">
            <p id = "first-card-value">0</p>
          </div>
        </div>
        <div id = "loan_received_cards" class = "cards second-card">
          <div id = "second-card-label-container">
            <p id = "second-card-label">Loan Received</p>
          </div>
          <div id = "second-card-value-container">
            <p id = "second-card-value">0</p>
          </div>
        </div>
        <div id = "collectibles_cards" class = "cards third-card">
          <div id = "third-card-label-container">
            <p id = "third-card-label">Collectibles</p>
          </div>
          <div id = "third-card-value-container">
            <p id = "third-card-value">0</p>
          </div>
        </div>
        <div id = "openloan_cards" class = "cards fourth-card">
          <div id = "fourth-card-label-container">
            <p id = "fourth-card-label">Open Loans</p>
          </div>
          <div id = "fourth-card-value-container">
            <p id = "fourth-card-value">30</p>
          </div>
        </div>
        <div id = "currentbalance_cards" class = "cards fifth-card">
          <div id = "fifth-card-label-container">
            <p id = "fifth-card-label">Current Balance</p>
          </div>
          <div id = "fifth-card-value-container">
            <p id = "fifth-card-value">50000</p>
          </div>
        </div>
        <div id = "totalinterest_cards" class = "cards sixth-card">
          <div id = "sixth-card-label-container">
            <p id = "sixth-card-label">Total Interest</p>
          </div>
          <div id = "sixth-card-value-container">
            <p id = "sixth-card-value">13000</p>
          </div>
        </div>
        <div id = "totalemployee_cards" class = "cards seventh-card">
          <div id = "seventh-card-label-container">
            <p id = "seventh-card-label">Total Employee</p>
          </div>
          <div id = "seventh-card-value-container">
            <p id = "seventh-card-value">400</p>
          </div>
        </div>
        <div id = "totalamountpayment_cards" class = "cards eigth-card">
          <div id = "eigth-card-label-container">
            <p id = "eigth-card-label">Total Amount Payment</p>
          </div>
          <div id = "eigth-card-value-container">
            <p id = "eigth-card-value">30</p>
          </div>
        </div>
        <div id = "totalcontributions_cards" class = "cards ninth-card">
          <div id = "ninth-card-label-container">
            <p id = "ninth-card-label">Contribution Total</p>
          </div>
          <div id = "ninth-card-value-container">
            <p id = "ninth-card-value">11000</p>
          </div>
        </div>
      </div>
    </div>
  </main>
</body>
</html>