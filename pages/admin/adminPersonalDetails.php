<?PHP
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!-- <link rel="stylesheet" href="css/adminPersonalDetails.css"> -->
  <link rel="stylesheet" href="css/adminPersonalDetails.css">
  <title>Admin Personal Details</title>
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
    <section class="adminPersonalDetailsPanel">
      <div class="apd-inner-section">
        <div class="adp-header">
          <div class="adminPersonalDetailstitleBox">
            <h3 id="adminPersonalDetailsTitle">Admin Personal Details</h1>
          </div>
          <div class="paneleditbuttoncontainer">
            <button type="button" id="paneleditbutton">
              Edit
            </button>
          </div>
        </div>
        <section class="adminPersonalDetailsFormContainer">
          <form action="" method="POST" id="adminPersonalDetailsForm">
            <div class="adminfirstnamebox">
              <label>Firstname</label>
              <input type="text" name="txt_admin_firstname" class="disabled-field" id="txt_admin_firstname" />
            </div>
            <div class="adminmiddlenamebox">
              <label>Middle Name</label>
              <input type="text" name="txt_admin_middlename" class="disabled-field" id="txt_admin_middlename" />
            </div>
            <div class="adminlastnamebox">
              <label>Lastname</label>
              <input type="text" name="txt_admin_lastname" class="disabled-field" id="txt_admin_lastname" />
            </div>
            <div class="adminemailbox">
              <label>Email</label>
              <input type="text" name="txt_admin_email" class="disabled-field" id="txt_admin_email" />
            </div>
            <div class="admincontactnumberbox">
              <label>Contact Number</label>
              <input type="text" name="txt_admin_contactnumber" class="disabled-field" id="txt_admin_contactnumber" /> 
            </div>
            <div>
              <hr>
            </div>
            <div class="admincommandcontainer">
              <div class="adminupdatebuttoncontainer">
                <button type="submit">
                  Update Details
                </button>
              </div>
              <div class="admincancelbuttoncontainer">
                <button type="button">
                  Cancel
              </div>
            </div>
          </form>
        </section>
      </div>
    </section>
  </main>
</body>
</html>