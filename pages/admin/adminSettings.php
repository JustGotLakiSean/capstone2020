<?PHP
namespace loan950;

use \loan950\db_access;

include('../../dbaccess/db_access.php');
session_start();
$db = new db_access();
?>

<?php
if (isset($_GET['emp_search_id']) && isset($_GET['emp_search_fname']) && isset($_GET['emp_search_mname']) && isset($_GET['emp_search_lname']) && isset($_GET['emp_search_empType'])) {
  $emp_search_id = '';
  $emp_search_empType = '';
  $emp_search_fname = '';
  $emp_search_mname = '';
  $emp_search_lname = '';
  $emp_office = '';
  $emp_email = '';
  $emp_conNumber = '';
  $emp_birthDate = '';
  $emp_address = '';
  $emp_rank = '';
  $hasAccount = '';

  $con = $db->getConnection();
  $fetchResult = $db->search_emp_panel($_GET['emp_search_id'], $_GET['emp_search_fname'], $_GET['emp_search_mname'], $_GET['emp_search_lname'], $_GET['emp_search_empType']);
  // echo '
  // <script type="text/javascript">
  // document.querySelector(".search_box_container").style.display="none";
  // document.getElementById("result_container").style.display="block";
  // </script>';

  echo '<div id="result_container">';
  echo '<div id="search_emp_result">';

  echo <<<BUTTON
  <button type='button' id='search_close' onclick="window.location.href='adminSettings.php'">X</button>
BUTTON;

  echo '<div id="search_header">';
  echo '<p style="font-size: 18px; margin: 0; padding-bottom: 8px; text-align: center;">Employee Profile</p>';
  echo '</div>';

  echo '<div id="result_con">';


  while ($ress = $fetchResult->fetch_array(MYSQLI_ASSOC)) {
    $emp_search_id = $ress['s_emp_id'];
    $emp_search_empType = $ress['emp_type'];
    $emp_search_fname = $ress['s_emp_fname'];
    $emp_search_mname = $ress['s_emp_mname'];
    $emp_search_lname = $ress['s_emp_lname'];
    $emp_office = $ress['s_emp_office'];
    $emp_email = $ress['s_emp_email'];
    $emp_conNumber = $ress['emp_no'];
    $emp_birthDate = $ress['emp_bdate'];
    $emp_address = $ress['emp_address'];
    $emp_rank = $ress['emp_rank'];
    $hasAccount = $ress['hasAccount'];
    $empFull = "$emp_search_fname $emp_search_mname $emp_search_lname";

    echo '<h2 style="margin: 15px 0 15px 8px;">' . $emp_search_fname . '\'s profile</h2>';
    echo '<hr style="background: #ccc;">';

    echo '<div id="pd_result">'; // 'pd' = 'personal details';
    echo '<h3 style="margin: 1px;">Personal details</h3>';
    echo '<div style="display: grid; grid-auto-flow: column; margin: 12px 0 12px 0;">';
    echo "<span style='font-weight: bold; width: 134px;'>Name:</span>";
    echo "<p style='margin: 0; width: 300px'>$empFull</p>";
    echo '</div>';
    echo '<div style="display: grid; grid-auto-flow: column; margin: 12px 0 12px 0;">';
    echo "<span style='font-weight: bold; width: 134px;'>Email: </span>";
    echo "<p style='margin: 0; width: 300px;'>$emp_email</p>";
    echo '</div>';
    echo '<div style="display: grid; grid-auto-flow: column; margin: 12px 0 12px 0;">';
    echo "<span style='font-weight: bold; width: 134px;'>Contact: </span>";
    echo "<p style='margin: 0; width: 300px;'>$emp_conNumber</p>";
    echo '</div>';
    echo '<div style="display: grid; grid-auto-flow: column; margin: 12px 0 12px 0;">';
    echo "<span style='font-weight: bold; width: 134px;'>Birthdate: </span>";
    echo "<p style='margin: 0; width: 300px;'>$emp_birthDate</p>";
    echo '</div>';
    echo '<div style="display: grid; grid-auto-flow: column; margin: 12px 0 12px 0;">';
    echo "<span style='font-weight: bold; width: 134px;'>Address:</span>";
    echo "<p style='margin: 0; width: 300px;'>$emp_address</p>";
    echo '</div>';
    echo '<div style="display: grid; grid-auto-flow: column; margin: 12px 0 12px 0;">';
    echo "<span style='font-weight: bold; width: 134px;'>Office: </span>";
    echo "<p style='margin: 0; width: 300px;'>$emp_office</p>";
    echo '</div>';
    echo '</div>';

    echo '<hr style="background: #ccc;">';
  }

  $fetchLoanDetail5k = $db->show_active_loan($emp_search_id, $emp_search_fname, $emp_search_mname, $emp_search_lname, $emp_search_empType);
  $fetchLoanDetail10k = $db->show_active_loan_10k($emp_search_id, $emp_search_fname, $emp_search_mname, $emp_search_lname, $emp_search_empType);
  $fetchAccountCiv = $db->check_civ_account($emp_search_id, $emp_search_fname, $emp_search_mname, $emp_search_lname, $emp_search_empType);
  $fetchAccountOff = $db->check_off_account($emp_search_id, $emp_search_fname, $emp_search_mname, $emp_search_lname, $emp_search_empType);
  echo '<div id="ld_result">'; // 'ld' = loan details

  echo '<div id="result_5k">';
  echo '<h3 style="margin: 1px;">Loan details</h3>';

  while ($ress2 = $fetchLoanDetail5k->fetch_array(MYSQLI_ASSOC)) {
    if ($ress2 > 0) {
      $loanStatus = $ress2['loanStatus'];

      if ($loanStatus === 0) {
        $loanID = $ress2['loanID'];
        $borrowerID = $ress2['borrowerID'];
        $transactionPrefix = $ress2['loanPrefix'];
        $type_of_loan = $ress2['typeOfLOAN'];
        $transactionID = "$transactionPrefix-000$loanID";
        $isFullPaid = (($ress2['loanStatus'] == 0) ? 'Not fully paid' : 'Fully paid');


        echo '<div style="display: grid; grid-auto-flow: column; margin: 12px 0 12px 0;">';
        echo '<span span style="font-weight: bold; width: 134px;">Active loan:</span>';
        echo '<p style="margin: 0; width: 300px;">Yes</p>';
        echo '</div>';

        echo '<div style="display: grid; grid-auto-flow: column; margin: 12px 0 12px 0;">';
        echo '<span span style="font-weight: bold; width: 134px;">Type of loan:</span>';
        echo '<p style="margin: 0; width: 300px;">' . $type_of_loan . '</p>';
        echo '</div>';

        echo '<div style="display: grid; grid-auto-flow: column; margin: 12px 0 12px 0;">';
        echo '<span span style="font-weight: bold; width: 134px;">Status:</span>';
        echo '<p style="margin: 0; width: 300px;">' . $isFullPaid . '</p>';
        echo '</div>';

        echo '<div style="display: grid; grid-auto-flow: column; margin: 12px 0 12px 0;">';
        echo '<span span style="font-weight: bold; width: 134px;">Transaction ID:</span>';
        echo '<p style="margin: 0; width: 300px;">' . $transactionID . '</p>';
        echo '</div>';
      } else {
        echo '<p>No active 5k loan</p>';
      }
    } else {
    }
  }

  echo '<hr style="background: #ccc;">';

  while ($ress3 = $fetchLoanDetail10k->fetch_array(MYSQLI_ASSOC)) {
    if ($ress3 > 0) {
      $loanStatus10k = $ress['loan_status_10k'];

      if ($loanStatus10k === 0) {
        $loanID10k = $ress3['loan_id_10k'];
        $borrowerID10k = $ress3['borrower_id'];
        $transactionPrefix10k = $ress3['ctrl_no_prefix'];
        $type_of_loan_10k = $ress3['type_of_loan'];
        $transactionID10k = "$transactionPrefix10k-000$loanID10k";
        $isFullPaid10k = (($ress3['loan_status_10k'] == 0) ? 'Not fully paid' : 'Fully paid');

        echo '<div style="display: grid; grid-auto-flow: column; margin: 12px 0 12px 0;">';
        echo '<span span style="font-weight: bold; width: 134px;">Active loan:</span>';
        echo '<p style="margin: 0; width: 300px;">Yes</p>';
        echo '</div>';

        echo '<div style="display: grid; grid-auto-flow: column; margin: 12px 0 12px 0;">';
        echo '<span span style="font-weight: bold; width: 134px;">Type of loan:</span>';
        echo '<p style="margin: 0; width: 300px;">' . $type_of_loan . '</p>';
        echo '</div>';

        echo '<div style="display: grid; grid-auto-flow: column; margin: 12px 0 12px 0;">';
        echo '<span span style="font-weight: bold; width: 134px;">Status:</span>';
        echo '<p style="margin: 0; width: 300px;">' . $isFullPaid10k . '</p>';
        echo '</div>';

        echo '<div style="display: grid; grid-auto-flow: column; margin: 12px 0 12px 0;">';
        echo '<span span style="font-weight: bold; width: 134px;">Transaction ID:</span>';
        echo '<p style="margin: 0; width: 300px;">' . $transactionID10k . '</p>';
        echo '</div>';
      } else {
        echo '<p>No active 10k loan</p>';
      }
    } else {
    }
  }

  echo '</div>'; // end result_5k

  echo '</div>'; // end ld_result

  echo '<hr style="background: #ccc;">';

  echo '<div id="account_result">';
  echo '<h3 style="margin: 1px;">Account details</h3>';

  if ($emp_search_empType === 'civilian') {
    // echo "CIVILAN";
    if ($hasAccount === 1) {
      while ($ress4 = $fetchAccountCiv->fetch_array(MYSQLI_ASSOC)) {
        $civ_username = $ress['civilian_username'];

        echo '<div style="display: grid; grid-auto-flow: column; margin: 12px 0 12px 0;">';
        echo '<span span style="font-weight: bold; width: 134px;">Username:</span>';
        echo '<p style="margin: 0; width: 300px;">' . $civ_username . '</p>';
        echo '</div>';
      }
    } else {
      echo '<p>No account</p>';
    }
  } else if ($emp_search_empType === 'officer') {
    // echo "OFFICER";
    if ($hasAccount === 1) {
      while ($ress4 = $fetchAccountOff->fetch_array(MYSQLI_ASSOC)) {
        $off_username = $ress['officer_account_username'];

        echo '<div style="display: grid; grid-auto-flow: column; margin: 12px 0 12px 0;">';
        echo '<span span style="font-weight: bold; width: 134px;">Username:</span>';
        echo '<p style="margin: 0; width: 300px;">' . $off_username . '</p>';
        echo '</div>';
      }
    } else {
      echo '<p>No account</p>';
    }
  }
  echo '</div>'; // close account_result;

  echo '</div>'; // end result_con;
  echo '</div>'; // close search_emp_result;
  echo '</div>'; // close result_container;
} else {
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!-- <link rel="stylesheet" href="css/adminSettings.css"> -->
  <?php include('css/adminSettingsStyle.php'); ?>
  <title>Admin Setting</title>
</head>

<script src="src/searchempprofile.js">

</script>

<body>
  <header id="loan-navigation-container">
    <nav id="loan-global-navigation">
      <ul>
        <li class="nav-links"><a href="../loanmonitoring/adminOverview.php">Overview</a></li>
        <li class="nav-links"><a href="../loanmonitoring/loanMonitoring.php">Loan Monitoring</a></li>
        <li class="nav-links"><a href="../loanmonitoring/950th-employee.php">Employee</a></li>
        <li class="nav-links"><a href="../loanmonitoring/general-ledger.php">General Ledger</a></li>
        <li class="nav-links"><a type="button" onclick="document.querySelector('.search_box_container').style.display='block'" style="cursor: pointer;">Search</a></li>
        <li>
          <div>
            <input type="button" id="admin-button" value="Admin Button" onclick="document.getElementById('admin_menu_box').style.display='flex'" />
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

  <div class="search_box_container">
      <div id="search_container">
        <div class="search_box">
          <!-- <form action="search_employee.php" method="POST"> -->
          <form method="get" action="">
            <div id="search_control">
              <div>
                <input type="text" name="txt_emp_search" id="txt_emp_search" oninput="search_employee(this.value)" placeholder="Search" />
              </div>
              <div>
                <button type="button" class="btn_search_close" onclick="document.querySelector('.search_box_container').style.display='none'">Close</button>
              </div>
            </div>
            <div id="search_result_container">
              <div id="search_result_box">
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>

  <main onclick="document.getElementById('admin_menu_box').style.display='none'">

    <!-- <div class="search_box_container">
      <div id="search_container">
        <div class="search_box">
          <form method="get" action="">
            <div id="search_control">
              <div>
                <input type="text" name="txt_emp_search" id="txt_emp_search" oninput="search_employee(this.value)" placeholder="Search" />
              </div>
              <div>
                <button type="button" class="btn_search_close" onclick="document.querySelector('.search_box_container').style.display='none'">Close</button>
              </div>
            </div>
            <div id="search_result_container">
              <div id="search_result_box">
              </div>
            </div>
          </form>
        </div>
      </div>
    </div> -->
    <?php
    if (isset($_SESSION['admin_username'])) {
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
          <h1 class="f_header">Admin Settings</h1>
        </div>
        <hr>
        <!-- <div class="first-detailbox personal-details">
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
        <hr> -->

        <div class="third-detailbox loanrates-details">
          <div class="firstinner">
            <div class="third-detailsbox-title-container">
              <h3 class="amdh">Loan Detail Page</h3>
            </div>
            <div class="third-detailsbox-description">
              <p class="amdp">View, modify loan rates.</p>
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