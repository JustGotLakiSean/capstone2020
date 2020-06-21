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

  $fetchLoanDetailCiv = $db->get_loan_counts_civ($emp_search_id, $emp_search_fname, $emp_search_mname, $emp_search_lname, $emp_search_empType);
  $fetchLoanDetailOff = $db->get_loan_counts_off($emp_search_id, $emp_search_fname, $emp_search_mname, $emp_search_lname, $emp_search_empType);
  $fetchAccountCiv = $db->check_civ_account($emp_search_id, $emp_search_fname, $emp_search_mname, $emp_search_lname, $emp_search_empType);
  $fetchAccountOff = $db->check_off_account($emp_search_id, $emp_search_fname, $emp_search_mname, $emp_search_lname, $emp_search_empType);
  echo '<div id="ld_result">'; // 'ld' = loan details

  echo '<div id="result_5k">';
  echo '<h3 style="margin: 1px;">Loan details</h3>';

  if($emp_search_empType === 'civilian'){
    while($ress22 = $fetchLoanDetailCiv->fetch_array(MYSQLI_ASSOC)){
      $borrower_civ_id = $ress22['civilian_ID'];
      $la5kcount_civ = $ress22['la_5k_count'];
      $la10kcount_civ = $ress22['la_10k_count'];
      $penalty_count_civ = $ress22['penalty_count'];
      $downpayment_count_civ = $ress22['downpayment_count'];
      $fullpayment_count_civ = $ress22['fullpayment_count'];

      echo '<div style="display: grid; grid-auto-flow: row;">';
      echo '<div style="display: grid; grid-auto-flow: column; margin: 12px 0 0px 0;">';
      echo '<span span style="font-weight: bold; width: 154px;">Loan 5K count: </span>';
      echo '<p style="margin: 0; width: 300px;">' . $la5kcount_civ . '</p>';
      echo '</div>';
      echo '<hr style="height: 4px; width: ' . $la5kcount_civ . 'vw; border-radius: 5px; background: linear-gradient(118deg, rgba(255,158,30,1) 9%, rgba(222,44,229,1) 90%);">';
      echo '</div>';

      echo '<hr style="background: #ccc;">';

      echo '<div style="display: grid; grid-auto-flow: row;">';
      echo '<div style="display: grid; grid-auto-flow: column; margin: 12px 0 0px 0;">';
      echo '<span span style="font-weight: bold; width: 154px;">Loan 10K count: </span>';
      echo '<p style="margin: 0; width: 300px;">' . $la10kcount_civ . '</p>';
      echo '</div>';
      echo '<hr style="height: 4px; width: ' . $la10kcount_civ . 'vw; border-radius: 5px; background: linear-gradient(118deg, rgba(255,158,30,1) 9%, rgba(222,44,229,1) 90%);">';
      echo '</div>';

      echo '<hr style="background: #ccc;">';

      echo '<div style="display: grid; grid-auto-flow: row;">';
      echo '<div style="display: grid; grid-auto-flow: column; margin: 12px 0 0px 0;">';
      echo '<span span style="font-weight: bold; width: 154px;">Fullpayment count: </span>';
      echo '<p style="margin: 0; width: 300px;">' . $fullpayment_count_civ . '</p>';
      echo '</div>';
      echo '<hr style="height: 4px; width: ' . $fullpayment_count_civ . 'vw; border-radius: 5px; background: linear-gradient(118deg, rgba(255,158,30,1) 9%, rgba(222,44,229,1) 90%);">';
      echo '</div>';

      echo '<hr style="background: #ccc;">';

      echo '<div style="display: grid; grid-auto-flow: row;">';
      echo '<div style="display: grid; grid-auto-flow: column; margin: 12px 0 0px 0;">';
      echo '<span span style="font-weight: bold; width: 154px;">Downpayment count: </span>';
      echo '<p style="margin: 0; width: 300px;">' . $downpayment_count_civ . '</p>';
      echo '</div>';
      echo '<hr style="height: 4px; width: ' . $downpayment_count_civ . 'vw; border-radius: 5px; background: linear-gradient(118deg, rgba(255,158,30,1) 9%, rgba(222,44,229,1) 90%);">';
      echo '</div>';

      echo '<hr style="background: #ccc;">';

      echo '<div style="display: grid; grid-auto-flow: row;">';
      echo '<div style="display: grid; grid-auto-flow: column; margin: 12px 0 0px 0;">';
      echo '<span span style="font-weight: bold; width: 154px;">Penalty count: </span>';
      echo '<p style="margin: 0; width: 300px;">' . $penalty_count_civ . '</p>';
      echo '</div>';
      echo '<hr style="height: 4px; width: ' . $penalty_count_civ . 'vw; border-radius: 5px; background: linear-gradient(118deg, rgba(255,158,30,1) 9%, rgba(222,44,229,1) 90%);">';
      echo '</div>';
    }
  } else if($emp_search_empType === 'officer'){
    while($ress2 = $fetchLoanDetailOff->fetch_array(MYSQLI_ASSOC)){
      $borrowerID = $ress2['officer_ID'];
      $la5kcount = $ress2['la_5k_count'];
      $la10kcount = $ress2['la_10k_count'];
      $penalty_count = $ress2['penalty_count'];
      $downpayment_count = $ress2['downpayment_count'];
      $fullpayment_count = $ress2['fullpayment_count'];

      echo '<div style="display: grid; grid-auto-flow: row;">';
      echo '<div style="display: grid; grid-auto-flow: column; margin: 12px 0 0px 0;">';
      echo '<span span style="font-weight: bold; width: 154px;">Loan 5K count: </span>';
      echo '<p style="margin: 0; width: 300px;">' . $la5kcount . '</p>';
      echo '</div>';
      echo '<hr style="height: 4px; width: ' . $la5kcount . 'vw; border-radius: 5px; background: linear-gradient(118deg, rgba(255,158,30,1) 9%, rgba(222,44,229,1) 90%);">';
      echo '</div>';

      echo '<hr style="background: #ccc;">';

      echo '<div style="display: grid; grid-auto-flow: row;">';
      echo '<div style="display: grid; grid-auto-flow: column; margin: 12px 0 0px 0;">';
      echo '<span span style="font-weight: bold; width: 154px;">Loan 10K count: </span>';
      echo '<p style="margin: 0; width: 300px;">' . $la10kcount . '</p>';
      echo '</div>';
      echo '<hr style="height: 4px; width: ' . $la10kcount . 'vw; border-radius: 5px; background: linear-gradient(118deg, rgba(255,158,30,1) 9%, rgba(222,44,229,1) 90%);">';
      echo '</div>';

      echo '<hr style="background: #ccc;">';

      echo '<div style="display: grid; grid-auto-flow: row;">';
      echo '<div style="display: grid; grid-auto-flow: column; margin: 12px 0 0px 0;">';
      echo '<span span style="font-weight: bold; width: 154px;">Fullpayment count: </span>';
      echo '<p style="margin: 0; width: 300px;">' . $fullpayment_count . '</p>';
      echo '</div>';
      echo '<hr style="height: 4px; width: ' . $fullpayment_count . 'vw; border-radius: 5px; background: linear-gradient(118deg, rgba(255,158,30,1) 9%, rgba(222,44,229,1) 90%);">';
      echo '</div>';

      echo '<hr style="background: #ccc;">';

      echo '<div style="display: grid; grid-auto-flow: row;">';
      echo '<div style="display: grid; grid-auto-flow: column; margin: 12px 0 0px 0;">';
      echo '<span span style="font-weight: bold; width: 154px;">Downpayment count: </span>';
      echo '<p style="margin: 0; width: 300px;">' . $downpayment_count . '</p>';
      echo '</div>';
      echo '<hr style="height: 4px; width: ' . $downpayment_count . 'vw; border-radius: 5px; background: linear-gradient(118deg, rgba(255,158,30,1) 9%, rgba(222,44,229,1) 90%);">';
      echo '</div>';

      echo '<hr style="background: #ccc;">';

      echo '<div style="display: grid; grid-auto-flow: row;">';
      echo '<div style="display: grid; grid-auto-flow: column; margin: 12px 0 0px 0;">';
      echo '<span span style="font-weight: bold; width: 154px;">Penalty count: </span>';
      echo '<p style="margin: 0; width: 300px;">' . $penalty_count . '</p>';
      echo '</div>';
      echo '<hr style="height: 4px; width: ' . $penalty_count . 'vw; border-radius: 5px; background: linear-gradient(118deg, rgba(255,158,30,1) 9%, rgba(222,44,229,1) 90%);">';
      echo '</div>';
    }
  }

  echo '</div>'; // end result_5k

  echo '</div>'; // end ld_result

  echo '<hr style="background: #ccc;">';

  echo '<div id="account_result">';
  echo '<h3 style="margin: 1px;">Account details</h3>';

  if ($emp_search_empType === 'civilian') {
    // echo "CIVILAN";
    if ($hasAccount == 1) {
      while ($ress4 = $fetchAccountCiv->fetch_array(MYSQLI_ASSOC)) {
        $civ_username = $ress4['civilian_username'];

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
    if ($hasAccount == 1) {
      while ($ress4 = $fetchAccountOff->fetch_array(MYSQLI_ASSOC)) {
        $off_username = $ress4['officer_account_username'];

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
        <!-- <li class="nav-links"><a href="../loanmonitoring/general-ledger.php">General Ledger</a></li> -->
        <li class="nav-links"><a href="../../pages/admin/adminloanrequest.php">Loan request<span id="countNotif" style='height: 18px; width: 18px; border-radius: 5px; background: rgba(24, 24, 24, 1); position: absolute; top: 11px; right: -22px; font-size: 12px; font-weight: bold; padding-top: 2px;'></span></a></li>
        <li class="nav-links"><a type="button" onclick="document.querySelector('.search_box_container').style.display='block'" style="cursor: pointer;">Search</a></li>
        <li>
          <div>
            <input type="button" id="admin-button" value="Admin Button" onclick="document.getElementById('admin_menu_box').style.display='flex'" />
            <div id="admin_menu_box">
              <a href="../../pages/admin/adminSettings.php">Setting</a>
              <a href="logout.php">Sign Out</a>
            </div>
          </div>
        </li>
      </ul>
    </nav>
  </header>

  <script>
    function loadDoc() {
      setInterval(function() {
        var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function() {
          if (this.readyState == 4 && this.status == 200) {
            document.getElementById("countNotif").innerHTML = this.responseText;
          }
        };
        xhttp.open("GET", "../../gateway/notif.php", true);
        xhttp.send();
      }, 1000);
    }

    loadDoc();
  </script>

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
              <p class="amdp">View loan rates.</p>
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