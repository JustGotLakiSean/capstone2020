<?PHP

namespace loan950;

use \loan950\db_access;

include('../../dbaccess/db_access.php');
session_start();
date_default_timezone_set('Asia/Manila');
$db = new db_access();
$get_total_num_borrower = $db->total_num_borrowers();
$typeOfLoanCount = $db->get_type_of_loan_count();

$getTotalNumberOfEmployee = $db->getTotalNumberOfEmployee();
$getTypeOfEmployee = $db->getTypeOfEmployee();

$getOverallTotalOfCreditRate = $db->getOverallTotalOfCreditRate();
$getSumOfEachCreditRate = $db->getSumOfEachCreditRate();

$get_5k_credit_rate_sum = $db->get_5k_credit_rate_sum();
$get_10k_credit_rate_sum = $db->get_10k_credit_rate_sum();

$getTotalActiveLoan = $db->getTotalActiveLoan();
$getOverallActiveLoan = $db->getOverallActiveLoan();

$getActiveLoanList = $db->getActiveLoanList();
// $getHighestLoanCount = $db->getHighestLoanCount();

$getLoanReleasedPerMonth = $db->getLoanReleasedPerMonth();
$get5KLoanReleasedPerMonth = $db->get5KLoanReleasedPerMonth();

// $getOverallPaymentReceived = $db->getOverallPaymentReceived();

$getFirstPaymentAmountPaid = $db->getFirstPaymentAmountPaid();
$get5KAmountPaidFirstPayment = $db->get5KAmountPaidFirstPayment();
$get5KAmountPaidSecondPayment = $db->get5KAmountPaidSecondPayment();
$get5KAmountPaidThirdPayment = $db->get5KAmountPaidThirdPayment();
$get5KAmountPaidFourthPayment = $db->get5KAmountPaidFourthPayment();
$get5KAmountPaidFifthPayment = $db->get5KAmountPaidFifthPayment();
$get5KAmountPaidSixthPayment = $db->get5KAmountPaidSixthPayment();
$get5KAmountPaidFullPayment = $db->get5KAmountPaidFullPayment();

$get10KAmountPaidFirstPayment = $db->get10KAmountPaidFirstPayment();
$get10KAmountPaidSecondPayment = $db->get10KAmountPaidSecondPayment();
$get10KAmountPaidThirdPayment = $db->get10KAmountPaidThirdPayment();
$get10KAmountPaidFourthPayment = $db->get10KAmountPaidFourthPayment();
$get10KAmountPaidFifthPayment = $db->get10KAmountPaidFifthPayment();
$get10KAmountPaidSixthPayment = $db->get10KAmountPaidSixthPayment();
$get10KAmountPaidFullPayment = $db->get10KAmountPaidFullPayment();

$getSecondPaymentAmountPaid = $db->getSecondPaymentAmountPaid();
$getThirdPaymentAmountPaid = $db->getThirdPaymentAmountPaid();
$getFourthPaymentAmountPaid = $db->getFourthPaymentAmountPaid();
$getFifthPaymentAmountPaid = $db->getFifthPaymentAmountPaid();
$getSixthPaymentAmountPaid = $db->getSixthPaymentAmountPaid();
$getFullPaymentAmountPaid = $db->getFullPaymentAmountPaid();

$getTopLoaner = $db->getTopLoaner();

$getOverallFullpaymentCount = $db->getOverallFullpaymentCount();
$getOverallDownpaymentCount = $db->getOverallDownpaymentCount();

$getHighestPenalty = $db->getHighestPenalty();

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
  <button type='button' id='search_close' onclick="window.location.href='adminOverview.php'">X</button>
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

  while($ress3 = $fetchLoanDetail10k->fetch_array(MYSQLI_ASSOC)){
    if($ress3 > 0){
      $loanStatus10k = $ress['loan_status_10k'];

      if($loanStatus10k === 0){
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

  if($emp_search_empType === 'civilian'){
    // echo "CIVILAN";
    if($hasAccount === 1){
      while($ress4 = $fetchAccountCiv->fetch_array(MYSQLI_ASSOC)){
        $civ_username = $ress['civilian_username'];

        echo '<div style="display: grid; grid-auto-flow: column; margin: 12px 0 12px 0;">';
        echo '<span span style="font-weight: bold; width: 134px;">Username:</span>';
        echo '<p style="margin: 0; width: 300px;">' . $civ_username . '</p>';
        echo '</div>';
      }
    } else {
      echo '<p>No account</p>';
    }
  } else if($emp_search_empType === 'officer'){
    // echo "OFFICER";
    if($hasAccount === 1){
      while($ress4 = $fetchAccountOff->fetch_array(MYSQLI_ASSOC)){
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
  <title>Admin Overview</title>
  <!-- <link rel="stylesheet" href="css/adminOverview.css"> -->
  <?php include('css/adminOverviewStyle.php'); ?>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
  <script src="../../gateway/src/canvasjs-2.3.2/canvasjs.min.js"></script>
</head>

<!-- <script src="src/search5.js"></script> -->
<script src="src/searchempprofile.js">

</script>

<body>
  <header id="loan-navigation-container">
    <nav id="loan-global-navigation">
      <ul>
        <li class="nav-links"><a href="adminOverview.php">Overview</a></li>
        <li class="nav-links"><a href="loanMonitoring.php">Loan Monitoring</a></li>
        <li class="nav-links"><a href="950th-employee.php">Employee</a></li>
        <li class="nav-links"><a href="general-ledger.php">General Ledger</a></li>
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

  <main onclick="document.getElementById('admin_menu_box').style.display='none'">

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

    <div id="overview-container">
      <?php
      if (isset($_SESSION['admin_username'])) {
        echo '<div class="account_box">';
        echo '<h3>Hello, ' . $_SESSION['fname'] . '</h3>';
        echo '</div>';
      } else if (!isset($_SESSION['admin_username'])) {
        // header('location: ../../pages/admin/adminSignInForm.php');
        echo '<script>
  window.location.href="../../pages/admin/adminSignInForm.php"
  </script>';
      }
      ?>
      <h1>Overview</h1>
      <div id="transaction-cards" class="card-container">

        <div id="borrower_number_cards" class="cards first-card">
          <h5 style="margin: 0; color: #666666;">LOAN RECORD</h5>
          <div id="first-card-label-container">
            <?php
            while ($count = $get_total_num_borrower->fetch_array(MYSQLI_ASSOC)) {
              $bID = $count['totSum'];
            }
            ?>
            <?php echo "<p style='color: #333333;'><span style='font-size: 32px;'>$bID <span style='font-size: 18px;'>overall loan</span></span></p>"; ?>
          </div>
          <hr>
          <div id="first-card-value-container">

            <?php
            $dataPoint = array();

            foreach ($typeOfLoanCount as $row) {
              array_push($dataPoint, array("Type Of Loan" => $row['type_of_loan'], "y" => $row['totalNum']));
            }

            // echo json_encode($dataPoint, JSON_NUMERIC_CHECK);
            ?>

            <?php
            $emp_result = array();
            foreach ($getTypeOfEmployee as $res1) {
              array_push($emp_result, array("Employee Type" => $res1['type_of_employee'], "y" => $res1['totalEMP']));
            }

            // echo json_encode($emp_result, JSON_NUMERIC_CHECK);

            ?>

            <?php
            $credit_rate_result = array();
            foreach ($getSumOfEachCreditRate as $res2) {
              array_push($credit_rate_result, array("label" => $res2['type_of_loan'], "y" => $res2['credit_rate_sum']));
            }

            // echo json_encode($credit_rate_result, JSON_NUMERIC_CHECK);
            ?>

            <?php
            $creditByMonth = array();
            foreach ($getLoanReleasedPerMonth as $res3) {
              array_push($creditByMonth, array("label" => $res3['date_of_loan'], "y" => $res3['creditRate'], "typeOfLoan" => $res3['type_of_loan']));
            }

            // echo json_encode($creditByMonth, JSON_NUMERIC_CHECK);
            ?>

            <?php
            $LoanReleased5KPerMonth = array();
            foreach ($get5KLoanReleasedPerMonth as $res4) {
              array_push($LoanReleased5KPerMonth, array("label" => $res4['date_of_loan'], "y" => $res4['credit_5k_rate'], "typeOfLoan" => $res4['type_of_loan']));
            }

            // echo json_encode($LoanReleased5KPerMonth, JSON_NUMERIC_CHECK);
            ?>

            <script type="text/javascript">
              window.onload = function() {
                CanvasJS.addColorSet("colorSet1",
                  [
                    '#007aff',
                    '#38dbdc',
                    '#1a1a1a',
                    '#009245'
                  ]);
                CanvasJS.addColorSet("colorSet2",
                  [
                    '#1a1a1a',
                    '#009245'
                  ]);
                var chart = new CanvasJS.Chart("chartContainer", {
                  // backgroundColor: "rgba(255, 255, 255, 0)",
                  title: {
                    text: "Percentage per Loan Account",
                    fontFamily: 'Helvetica',
                    fontWeight: 'bold',
                    fontColor: '#1558f4',
                    // verticalAlign: "center",
                    // dockInsidePlotArea: true,
                    fontSize: 14
                  },
                  legend: {
                    fontFamily: 'Helvetica',
                    fontWeight: 'lighter',
                    fontSize: 14
                  },
                  toolTip: {
                    content: "{Type Of Loan} = #percent%",
                    fontFamily: 'Helvetica',
                    fontWeight: 'lighter',
                    fontSize: 14,
                    backgroundColor: '#87edf5'
                  },
                  data: [{
                    type: 'pie',
                    showInLegend: true,
                    legendText: "{Type Of Loan} - {y}",
                    indexLabel: "#percent%",
                    indexLabelFontSize: 15,
                    indexLabelFontFamily: 'Helvetica',
                    indexLabelPlacement: "inside",
                    fontColor: "#fff",
                    dataPoints: <?php echo json_encode($dataPoint, JSON_NUMERIC_CHECK); ?>
                  }]

                });

                var total_borrower_chart = new CanvasJS.Chart("totalBorrowerBox", {
                  title: {
                    text: "Total number of Employee",
                    fontFamily: 'Helvetica',
                    fontWeight: 'bold',
                    fontColor: '#1558f4',
                    fontSize: 14,
                  },
                  legend: {
                    fontFamily: 'Helvetica',
                    fontWeight: 'lighter',
                    fontSize: 14
                  },
                  toolTip: {
                    content: "{Employee Type} = #percent%",
                    fontFamily: 'Helvetica',
                    fontWeight: 'lighter',
                    fontSize: 14,
                    backgroundColor: '#87edf5'
                  },
                  data: [{
                    type: 'doughnut',
                    showInLegend: true,
                    legendText: "{Employee Type} - {y}",
                    indexLabel: "#percent%",
                    indexLabelFontSize: 15,
                    indexLabelFontFamily: 'Helvetica',
                    colorSet: "colorSet1",
                    dataPoints: <?php echo json_encode($emp_result, JSON_NUMERIC_CHECK); ?>
                  }]
                });

                var loan_released_chart = new CanvasJS.Chart("loan_released_chart", {
                  title: {
                    text: "Overall Loan Released",
                    fontFamily: 'Helvetica',
                    fontWeight: 'bold',
                    fontColor: '#1558f4',
                    fontSize: 14
                  },
                  axisY: {
                    prefix: "₱",
                  },
                  toolTip: {
                    content: "{label} : ₱{y}",
                    fontFamily: 'Helvetica',
                    fontWeight: 'lighter',
                    fontSize: 14,
                    backgroundColor: '#87edf5',
                  },
                  data: [{
                    type: "column",
                    indexLabel: "₱{y}",
                    indexLabelPlacement: "inside",
                    indexLabelFontSize: 15,
                    indexLabelFontFamily: 'Helvetica',
                    dataPoints: <?php echo json_encode($credit_rate_result, JSON_NUMERIC_CHECK); ?>
                  }]

                });

                var loan_released_per_month_chart = new CanvasJS.Chart("loan_released_per_month_chart", {
                  title: {
                    text: "Loan Released Per Month of Transaction",
                    fontFamily: 'Helvetica',
                    fontWeight: 'bold',
                    fontColor: '#1558f4',
                    fontSize: 14
                  },
                  axisY: {
                    prefix: "₱"
                  },
                  toolTip: {
                    content: "{typeOfLoan} : ₱{y}",
                    fontFamily: 'Helvetica',
                    fontWeight: 'lighter',
                    fontSize: 14,
                    backgroundColor: '#87edf5',
                  },
                  data: [{
                    type: "spline",
                    indexLabel: "₱{y}",
                    dataPoints: <?php echo json_encode($creditByMonth, JSON_NUMERIC_CHECK); ?>
                  }]
                })

                // {
                //   type: "spline",
                //   indexLabel: "₱{y}",
                //   dataPoints: <?php echo json_encode($LoanReleased5KPerMonth, JSON_NUMERIC_CHECK); ?>
                // }

                chart.render();
                total_borrower_chart.render();
                loan_released_chart.render();
                loan_released_per_month_chart.render();

              }
            </script>

            <div id="chartContainer" style="width: 385px; height: 260px;"></div>
            <!-- <canvas id="chartContainer" width="400px" height="270px"></canvas> -->
          </div>
        </div>

        <div id="loan_received_cards" class="cards second-card">
          <h5 style="margin: 0; color: #666666;">LOAN RELEASED</h5>
          <div id="second-card-label-container">
            <?php
            while ($get5kCreditRate = $get_5k_credit_rate_sum->fetch_array(MYSQLI_ASSOC)) {
              if ($get5kCreditRate > 0) {
                $currCredit5kRate = $get5kCreditRate['currCredit5kRate'];
              } else {
                $currCredit5kRate = 0;
              }
            }

            while ($get10kCreditRate = $get_10k_credit_rate_sum->fetch_array(MYSQLI_ASSOC)) {
              if ($get10kCreditRate > 0) {
                $currCredit10kRate = $get10kCreditRate['currCredit10kRate'];
              } else {
                $currCredit10kRate = 0;
              }
            }

            $overallLoanReleased = $currCredit5kRate + $currCredit10kRate;
            echo "<p style='color:#333333;'><span style='font-size: 32px;'>₱$overallLoanReleased <span style='font-size: 18px;'> loan released</span></span></p>";
            ?>
          </div>
          <hr>

          <div id="second-card-value-container">
            <!-- <p id = "second-card-value">0</p> -->
            <div id="loan_released_chart" style="width: 385px; height: 260px;"></div>
          </div>
        </div>

        <div id="collectibles_cards" class="cards third-card">
          <h5 style="margin: 0; color: #666666;">NUMBER OF EMPLOYEE</h5>
          <div id="third-card-label-container">
            <?php
            while ($count = $getTotalNumberOfEmployee->fetch_array(MYSQLI_ASSOC)) {
              $empID = $count['totalBorrower'];
              $if_one = (($empID == 1) ? 'total employee' : 'total employees');
            }
            ?>
            <?php echo "<p style='color: #333333;'><span style='font-size: 32px;'>$empID <span style='font-size: 18px;'>$if_one</span></span><br>"; ?></p>
          </div>
          <hr>
          <div id="third-card-value-container">

            <div id="totalBorrowerBox" style="width: 385px; height: 260px;"></div>
          </div>
        </div>

        <!-- ACTIVE LOAN CHART -->
        <!-- Get the total of active loan -->
        <div id="active_cards" class="fourth-card">
          <h5 style="margin: 0; color: #666666;">ACTIVE LOAN</h5>
          <div id="fourth-card-label-container">
            <?php
            while ($get_total_active_loan = $getTotalActiveLoan->fetch_array(MYSQLI_ASSOC)) {
              $allActiveLoan = $get_total_active_loan['allActiveLoan'];
              echo "<p class = 'fourth-card-label active_inner'><span style='font-size: 32px;'>$allActiveLoan</span> <span style='font-size: 18px;'>active loan</span></p>";
            }
            ?>
            <hr>
            <div class="active_inner_container" style="width: 300px;">
              <?php
              while ($get_overall_active_loan = $getOverallActiveLoan->fetch_array(MYSQLI_ASSOC)) {
                if ($get_overall_active_loan) {
                  $typeOfLoan = $get_overall_active_loan['type_of_loan'];
                  $loanStatusCount = $get_overall_active_loan['loanStatusCount'];
                } else {
                  $typeOfLoan = "";
                  $loanStatusCount = 0;
                }
                echo "<div class='active_inner_value'>";
                echo "<p class='loanStatusCount active_inner'>" . strrev(ucfirst(strrev($typeOfLoan))) . "</p>";
                echo "<span style='font-size: 22px;'>$loanStatusCount <span style='font-size: 12px;'>active loans</span></span>";
                echo "</div>";
              }
              ?>
            </div>
          </div>
        </div>

        <div id="totalpayment_cards" class="seventh-card">
          <?php
          echo '<h5 style="margin: 0; color: #666666;"><span>PAYMENT RECEIVED</span> <span style="float: right; font-weight: lighter; font-size: 12px;"> Today at ' . date("h:i A") . '</span></h5>';

          while ($getData = $getFirstPaymentAmountPaid->fetch_array(MYSQLI_ASSOC)) {
            if ($getData > 0) {
              $overallFirstAmountPaid = $getData['overallFirstAmountPaid'];
            } else {
              $overallFirstAmountPaid = 0;
            }
          }

          // echo "$overallFirstAmountPaid<br>";

          while ($getData = $get5KAmountPaidFirstPayment->fetch_array(MYSQLI_ASSOC)) {
            if ($getData > 0) {
              $total5KFirstPayment = $getData['total5KFirstPayment'];
            } else {
              $total5KFirstPayment = 0;
            }
          }

          // echo "$total5KFirstPayment<br>";

          while ($getData = $get10KAmountPaidFirstPayment->fetch_array(MYSQLI_ASSOC)) {
            if ($getData > 0) {
              $total10KFirstPayment = $getData['total10KFirstPayment'];
            } else {
              $total10KFirstPayment = 0;
            }
          }

          // echo "$total10KFirstPayment<br>";

          while ($getData = $getSecondPaymentAmountPaid->fetch_array(MYSQLI_ASSOC)) {
            if ($getData > 0) {
              $overallSecondAmountPaid = $getData['overallSecondAmountPaid'];
            } else {
              $overallSecondAmountPaid = 0;
            }
          }

          // echo "$overallSecondAmountPaid<br>";

          while ($getData = $get5KAmountPaidSecondPayment->fetch_array(MYSQLI_ASSOC)) {
            if ($getData > 0) {
              $total5KSecondPayment = $getData['total5KSecondPayment'];
            } else {
              $total5KSecondPayment = 0;
            }
          }

          // echo "$total5KSecondPayment<br>";

          while ($getData = $get10KAmountPaidSecondPayment->fetch_array(MYSQLI_ASSOC)) {
            if ($getData > 0) {
              $total10KSecondPayment = $getData['total10KSecondPayment'];
            } else {
              $total10KSecondPayment = 0;
            }
          }

          // echo "$total10KSecondPayment<br>";

          while ($getData = $getThirdPaymentAmountPaid->fetch_array(MYSQLI_ASSOC)) {
            if ($getData > 0) {
              $overallThirdAmountPaid = $getData['overallThirdAmountPaid'];
            } else {
              $overallThirdAmountPaid = 0;
            }
          }

          // echo "$overallThirdAmountPaid<br>";

          while ($getData = $get5KAmountPaidThirdPayment->fetch_array(MYSQLI_ASSOC)) {
            if ($getData > 0) {
              $total5KThirdPayment = $getData['total5KThirdPayment'];
            } else {
              $total5KThirdPayment = 0;
            }
          }

          // echo "$total5KThirdPayment<br>";

          while ($getData = $get10KAmountPaidThirdPayment->fetch_array(MYSQLI_ASSOC)) {
            if ($getData > 0) {
              $total10KThirdPayment = $getData['total10KThirdPayment'];
            } else {
              $total10KThirdPayment = 0;
            }
          }

          // echo "$total10KThirdPayment<br>";

          while ($getData = $getFourthPaymentAmountPaid->fetch_array(MYSQLI_ASSOC)) {
            if ($getData > 0) {
              $overallFourthAmountPaid = $getData['overallFourthAmountPaid'];
            } else {
              $overallFourthAmountPaid = 0;
            }
          }

          // echo "$overallFourthAmountPaid<br>";

          while ($getData = $get5KAmountPaidFourthPayment->fetch_array(MYSQLI_ASSOC)) {
            if ($getData > 0) {
              $total5KFourthPayment = $getData['total5KFourthPayment'];
            } else {
              $total5KFourthPayment = 0;
            }
          }

          // echo "$total5KFourthPayment<br>";

          while ($getData = $get10KAmountPaidFourthPayment->fetch_array(MYSQLI_ASSOC)) {
            if ($getData > 0) {
              $total10KFourthPayment = $getData['total10KFourthPayment'];
            } else {
              $total10KFourthPayment = 0;
            }
          }

          // echo "$total10KFourthPayment<br>";

          while ($getData = $getFifthPaymentAmountPaid->fetch_array(MYSQLI_ASSOC)) {
            if ($getData > 0) {
              $overallFifthAmountPaid = $getData['overallFifthAmountPaid'];
            } else {
              $overallFifthAmountPaid = 0;
            }
          }

          // echo "$overallFifthAmountPaid<br>";

          while ($getData = $get5KAmountPaidFifthPayment->fetch_array(MYSQLI_ASSOC)) {
            if ($getData > 0) {
              $total5KFifthPayment = $getData['total5KFifthPayment'];
            } else {
              $total5KFifthPayment = 0;
            }
          }

          // echo "$total5KFifthPayment<br>";

          while ($getData = $get10KAmountPaidFifthPayment->fetch_array(MYSQLI_ASSOC)) {
            if ($getData > 0) {
              $total10KFifthPayment = $getData['total10KFifthPayment'];
            } else {
              $total10KFifthPayment = 0;
            }
          }

          // echo "$total10KFifthPayment<br>";

          while ($getData = $getSixthPaymentAmountPaid->fetch_array(MYSQLI_ASSOC)) {
            if ($getData > 0) {
              $overallSixthAmountPaid = $getData['overallSixthAmountPaid'];
            } else {
              $overallSixthAmountPaid = 0;
            }
          }

          // echo "$overallSixthAmountPaid<br>";

          while ($getData = $get5KAmountPaidSixthPayment->fetch_array(MYSQLI_ASSOC)) {
            if ($getData > 0) {
              $total5KSixthPayment = $getData['total5KSixthPayment'];
            } else {
              $total5KSixthPayment = 0;
            }
          }

          // echo "$total5KSixthPayment<br>";

          while ($getData = $get10KAmountPaidSixthPayment->fetch_array(MYSQLI_ASSOC)) {
            if ($getData > 0) {
              $total10KSixthPayment = $getData['total10KSixthPayment'];
            } else {
              $total10KSixthPayment = 0;
            }
          }

          // echo "$total10KSixthPayment<br>";

          while ($getData = $getFullPaymentAmountPaid->fetch_array(MYSQLI_ASSOC)) {
            if ($getData > 0) {
              $overallFullAmountPaid = $getData['overallFullAmountPaid'];
            } else {
              $overallFullAmountPaid = 0;
            }
          }

          // echo "$overallFullAmountPaid<br>";

          while ($getData = $get5KAmountPaidFullPayment->fetch_array(MYSQLI_ASSOC)) {
            if ($getData > 0) {
              $total5KFullPayment = $getData['total5KFullPayment'];
            } else {
              $total5KFullPayment = 0;
            }
          }

          // echo "$total5KFullPayment<br>";

          while ($getData = $get10KAmountPaidFullPayment->fetch_array(MYSQLI_ASSOC)) {
            if ($getData > 0) {
              $total10KFullPayment = $getData['total10KFullPayment'];
            } else {
              $total10KFullPayment = 0;
            }
          }

          // echo "$total10KFullPayment<br>";

          $overallTotalPaymentReceived = $overallFirstAmountPaid + $overallSecondAmountPaid + $overallThirdAmountPaid + $overallFourthAmountPaid + $overallFifthAmountPaid + $overallSixthAmountPaid + $overallFullAmountPaid;
          $overallTotal5KPaymentReceived = $total5KFirstPayment + $total5KSecondPayment + $total5KThirdPayment + $total5KFourthPayment + $total5KFifthPayment + $total5KSixthPayment + $total5KFullPayment + $total5KFullPayment;
          $overallTotal10KPaymentReceived = $total10KFirstPayment + $total10KSecondPayment + $total10KThirdPayment + $total10KFourthPayment + $total10KFifthPayment + $total10KSixthPayment + $total10KFullPayment;
          if (isset($overallTotalPaymentReceived)) {
            if ($overallTotalPaymentReceived != 0) {
              if (isset($overallTotal5KPaymentReceived)) {
                if ($overallTotal5KPaymentReceived != 0) {
                  if (isset($overallTotal10KPaymentReceived)) {
                    if ($overallTotal10KPaymentReceived != 0) {
                    } else {
                      $overallTotal10KPaymentReceived = 0;
                    }
                  } else {
                    $overallTotal10KPaymentReceived = 0;
                  }
                } else {
                  $overallTotal5KPaymentReceived = 0;
                }
              } else {
                $overallTotal5KPaymentReceived = 0;
              }
            } else {
              $overallTotalPaymentReceived = 0;
            }
          } else {
            $overallTotalPaymentReceived = 0;
          }
          echo "<p style='margin: 0;'><span style='font-size: 32px; color:#333333;'>₱$overallTotalPaymentReceived</span></p>";
          echo '<hr>';
          echo '<div class="payment_received_inner">';
          echo '<div>';
          echo "<p><span class='title_payment_received'>5K</span></p>";
          echo "<span style='font-size: 22px; color: #333333;'>₱$overallTotal5KPaymentReceived</span>";
          echo '</div>';
          echo '<div>';
          echo "<p><span class='title_payment_received'>10K</span></p>";
          echo "<span style='font-size: 22px; color: #333333;'>₱$overallTotal10KPaymentReceived</span>";
          echo '</div>';
          echo '</div>';

          ?>
        </div>

        <div id="paymentoption_cards" class="ninth-card">
          <h5 style="margin: 0; color: #666666;">PAYMENT OPTION</h5>
          <?php
          // echo '<hr style="margin-bottom: 15px;">';
          echo '<div class="payment_option_box" align="center">';
          echo '<div class="fullpayment_box">';
          while ($get_overall_fp_count = $getOverallFullpaymentCount->fetch_array(MYSQLI_ASSOC)) {
            $overallFullpaymentCount = $get_overall_fp_count['overallFullpaymentCount'];
            echo "<p style='margin: 15px 0 0 0; font-weight: bold; color: #333333;'>Fullpayment</p>";
            echo "<span style='font-size: 36px; color: #333333;'>$overallFullpaymentCount</span>";
            //echo '<hr style="height: 5px; border-radius: 5px; width: ' . $overallFullpaymentCount . 'vw; background: linear-gradient(118deg, rgba(255,158,30,1) 9%, rgba(222,44,229,1) 90%)">';
          }
          echo '</div>';

          echo '<div class="downpayment_box">';
          while ($get_overall_dp_count = $getOverallDownpaymentCount->fetch_array(MYSQLI_ASSOC)) {
            $overallDownpaymentCount = $get_overall_dp_count['overallDownpaymentCount'];
            echo "<p style='margin: 15px 0 0 0; font-weight: bold; color: #333333;'>Downpayment</p>";
            echo "<span style='font-size: 36px; color: #333333;'>$overallDownpaymentCount</span>";
            // echo "<hr style='height: 5px; border-radius: 5px; width: " . $overallDownpaymentCount . "%; background: linear-gradient(118deg, rgba(255,158,30,1) 9%, rgba(222,44,229,1) 90%)'>";
          }
          echo '</div>';
          echo '</div>';
          ?>

        </div>

        <!-- <div id="totalinterest_cards" class="cards sixth-card">
          <div id="loan_released_per_month_chart" style="width: 385px; height: 260px;"></div>
        </div> -->

      </div>
      <!-- end of transaction card -->

      <div id="third_line">
        <!-- Active Loan List -->
        <div id="active_borrower_cards" class="fifth-card">
          <h5 style="margin: 0 0 12px 0; color: #666666;">ACTIVE LOAN LIST</h5>
          <div class="active_borrower_list">
            <?php
            while ($get_active_list_data = $getActiveLoanList->fetch_array(MYSQLI_ASSOC)) {
              if (isset($get_active_list_data)) {
                if ($get_active_list_data > 0) {
                  $activeFname = $get_active_list_data['fname'];
                  $activeMname = $get_active_list_data['mname'];
                  $activeLname = $get_active_list_data['lname'];
                  $activeOffice = $get_active_list_data['empOffice'];
                  $activeFullname = "$activeFname $activeMname $activeLname";
                  $activeEmpType = $get_active_list_data['type_of_employee'] == 'civilian' ? 'Civilian' : 'Officer';

                  echo '<p class="active_borrower_name">' . ucwords(strtolower($activeFullname)) . '</p>';
                  echo '<p class="active_borrower_office">' . $activeEmpType . '</p>';
                  echo '<hr style="background: #e6e6e6;">';
                } else {
                }
              } else {
              }
            }
            ?>
          </div>
        </div>

        <div id="most_borrower_cards" class="eigth-card">
          <h5 style="margin: 0 0 12px 0; color: #666666;">MOST BORROWER</h5>
          <?php
          while ($get_lacount_data = $getTopLoaner->fetch_array(MYSQLI_ASSOC)) {
            if ($get_lacount_data) {
              $empID = $get_lacount_data['empID'];
              $empFname = $get_lacount_data['empFname'];
              $empMname = $get_lacount_data['empMname'];
              $empLname = $get_lacount_data['empLname'];
              $empFullname = "$empFname $empMname $empLname";
              $laCount = $get_lacount_data['laCount'];

              if (isset($laCount)) {
                if ($laCount >= 15) {
                  $laCountPercentage = $laCount / 100;
                  echo "<p style='font-size: 16px; margin: 0; color: #333333; font-weight: bold;'>" . ucwords(strtolower($empFullname)) . "</p>";
                  echo "<p style='font-size: 22px; margin: 0; color: #333333;'>$laCount <span style='font-size: 12px;'>counts</span></p>";

                  // $co = $laCount * $laCount;
                  echo "<hr class='hr-or' style='width: " . $laCountPercentage . "vw; height: 5px; border-radius: 5px; background: linear-gradient(118deg, rgba(180,67,255,1) 0%, rgba(255,26,209,1) 50%, rgba(255,58,58,1) 100%);'>";
                  echo '<hr style="margin: 10px 0 10px 0;">';
                } else {
                }
              } else {
              }
            } else {
            }
          }
          ?>
        </div>

        <div id="penalty_list_box">
          <h5 style="margin: 0 0 12px 0; color: #666666;">PENALTY</h5>
          <?php
          echo '<div class="penalty_list_card">';
          while ($get_penalty_data = $getHighestPenalty->fetch_array(MYSQLI_ASSOC)) {
            if ($get_penalty_data > 0) {
              $p_empFname = $get_penalty_data['empFname'];
              $p_empMname = $get_penalty_data['empMname'];
              $p_empLname = $get_penalty_data['empLname'];
              $p_typeOfEmployee = $get_penalty_data['typeOfEmployee'];
              $p_empFullname = "$p_empFname $p_empMname $p_empLname";
              $penaltyCount = $get_penalty_data['penaltyCount'];

              if (isset($penaltyCount)) {
                if ($penaltyCount >= 1) {
                  $penaltyPercentage = $penaltyCount / 100;
                  echo '<p class="p_borrower_name" style="font-size: 16px; margin: 0;">' . ucwords(strtolower($p_empFullname)) . '</p>';
                  echo '<p class="borrower_penalty_count" style="font-size: 22px; margin: 0;">' . $penaltyCount . ' <span style="font-size: 12px;">counts</span></p>';
                  echo "<hr style='height: 5px; border-radius: 5px; width: " . $penaltyPercentage . "vw; background: linear-gradient(118deg, rgba(255,158,30,1) 9%, rgba(222,44,229,1) 90%)'>";
                  echo '<hr>';
                } else if ($penaltyCount == 0) {
                  // echo '<p style="margin: 0; color: #666666; text-align: center;">No record</p>';
                  break;
                }
              } else {
              }
            } else {
            }
          }
          echo '</div>';
          ?>
        </div>
      </div>

    </div>
  </main>
</body>

</html>