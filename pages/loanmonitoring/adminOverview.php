<?PHP

namespace loan950;

use \loan950\db_access;

include('../../dbaccess/db_access.php');
session_start();
$db = new db_access();
$get_total_num_borrower = $db->total_num_borrowers();
$typeOfLoanCount = $db->get_type_of_loan_count();

$getTotalNumberOfEmployee = $db->getTotalNumberOfEmployee();
$getTypeOfEmployee = $db->getTypeOfEmployee();

$getOverallTotalOfCreditRate = $db->getOverallTotalOfCreditRate();
$getSumOfEachCreditRate = $db->getSumOfEachCreditRate();

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

<body>
  <header id="loan-navigation-container">
    <nav id="loan-global-navigation">
      <ul>
        <li class="nav-links"><a href="adminOverview.php">Overview</a></li>
        <li class="nav-links"><a href="loanMonitoring.php">Loan Monitoring</a></li>
        <li class="nav-links"><a href="950th-employee.php">Employee</a></li>
        <li class="nav-links"><a href="general-ledger.php">General Ledger</a></li>
        <li class="nav-links"><a href="#">Balance Sheet</a></li>
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
          <div id="first-card-label-container">
            <?php
            while ($count = $get_total_num_borrower->fetch_array(MYSQLI_ASSOC)) {
              $bID = $count['totSum'];
            }
            ?>
            <p id="first-card-label">OVERALL NUMBER OF LOAN : <?php echo "<span style='color: #1558f4;'>$bID</span><br>"; ?></p>
          </div>
          <hr>
          <div id="first-card-value-container">

            <?php
            $dataPoint = array();
            // while($get_count = $typeOfLoanCount->fetch_array(MYSQLI_ASSOC)){
            //   $typeOfLoan = $get_count['type_of_loan'];
            //   $totalCount = $get_count['totalNum'];
            //   // echo "$typeOfLoan : $totalCount<br>";
            //   echo "['".$typeOfLoan."', ".$totalCount."],";


            // }

            foreach ($typeOfLoanCount as $row) {
              array_push($dataPoint, array("Type Of Loan" => $row['type_of_loan'], "y" => $row['totalNum']));
            }

            // echo json_encode($dataPoint, JSON_NUMERIC_CHECK);
            ?>

            <?php
            $emp_result = array();
            foreach ($getTypeOfEmployee as $res1) {
              array_push($emp_result, array(
                "Employee Type" => $res1['type_of_employee'],
                "y" => $res1['totalEMP']
              ));
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
                    fontSize: 14
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
          <div id="second-card-label-container">
            <?php
            while ($count = $getOverallTotalOfCreditRate->fetch_array(MYSQLI_ASSOC)) {
              $overallLoanReleased = $count['overallLoanReleased'];
            }
            ?>
            <p id="second-card-label">TOTAL LOAN RELEASED : <?php echo "<span style='color: #1558f4;'>₱$overallLoanReleased</span>"; ?></p>
          </div>
          <hr>
          <div id="second-card-value-container">
            <!-- <p id = "second-card-value">0</p> -->
            <div id="loan_released_chart" style="width: 385px; height: 260px;"></div>
          </div>
        </div>

        <div id="collectibles_cards" class="cards third-card">
          <div id="third-card-label-container">
            <?php
            while ($count = $getTotalNumberOfEmployee->fetch_array(MYSQLI_ASSOC)) {
              $empID = $count['totalBorrower'];
            }
            ?>
            <p id="third-card-label">NUMBER OF EMPLOYEE : <?php echo "<span style='color: #1558f4;'>$empID</span><br>"; ?></p>
          </div>
          <hr>
          <div id="third-card-value-container">

            <div id="totalBorrowerBox" style="width: 385px; height: 260px;"></div>
          </div>
        </div>
      </div>

      <!-- ACTIVE LOAN CHART -->
      <!-- Get the total of active loan -->
      <div id="active_cards" class="fourth-card">
        <h5 style="margin: 0; color: #666666;">ACTIVE LOAN</h5>
        <div id="fourth-card-label-container">
          <?php
          while ($count = $getTotalActiveLoan->fetch_array(MYSQLI_ASSOC)) {
            $allActiveLoan = $count['allActiveLoan'];
            echo "<p class = 'fourth-card-label active_inner'><span style='font-size: 32px;'>$allActiveLoan</span> <span style='font-size: 18px;'>active loan</span></p>";
          }
          ?>
          <hr>
          <div class="active_inner_container" style="width: 300px;">
            <?php
            while ($count = $getOverallActiveLoan->fetch_array(MYSQLI_ASSOC)) {
              $typeOfLoan = $count['type_of_loan'];
              $loanStatusCount = $count['loanStatusCount'];
              echo "<div class='active_inner_value'>";
              echo "<p class='loanStatusCount active_inner'>" . strrev(ucfirst(strrev($typeOfLoan))) . "</p>";
              echo "<span style='font-size: 22px;'>$loanStatusCount <span style='font-size: 12px;'>active loans</span></span>";
              echo "</div>";
            }
            ?>
          </div>
        </div>
      </div>

      <!-- Active Loan List -->
      <div id="active_borrower_cards" class="fifth-card">
        <h5 style="margin: 0; color: #666666;">ACTIVE LOAN LIST</h5>
        <div class="active_borrower_list">
          <?php
          while ($get_data = $getActiveLoanList->fetch_array(MYSQLI_ASSOC)) {
            $activeFname = $get_data['fname'];
            $activeMname = $get_data['mname'];
            $activeLname = $get_data['lname'];
            $activeOffice = $get_data['empOffice'];
            $activeFullname = "$activeFname $activeMname $activeLname";
            $activeEmpType = $get_data['type_of_employee'] == 'civilian' ? 'Civilian' : 'Officer';

            echo '<p class="active_borrower_name">' . ucwords(strtolower($activeFullname)) . '</p>';
            echo '<p class="active_borrower_office">' . $activeEmpType . '</p>';
            echo '<hr style="background: #e6e6e6;">';
          }
          ?>
        </div>
        <!-- <p class="read-more" style="text-align:center;"><a href="#" class="readMoreButton">SHOW MORE</a></p> -->
      </div>

      <!-- Most picked Loan account -->
      <div id="totalinterest_cards" class="sixth-card">
        <div id="loan_released_per_month_chart" style="width: 385px; height: 260px;"></div>
      </div>

      <div id="totalemployee_cards" class="seventh-card">
        <?php
        echo '<p>TOTAL PAYMENT</p>';

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
        echo "<p>TOTAL PAYMENT RECEIVED: <span>$overallTotalPaymentReceived</span></p>";
        echo "<p>5K : <span>$overallTotal5KPaymentReceived</span></p>";
        echo "<p>10K : <span>$overallTotal10KPaymentReceived</span></p>";

        ?>
      </div>

      <div id="totalamountpayment_cards" class="cards eigth-card" style="width: 390px;">
        <h5>MOST BORROWER</h5>
        <?php
        while ($getData = $getTopLoaner->fetch_array(MYSQLI_ASSOC)) {
          $empID = $getData['empID'];
          $empFname = $getData['empFname'];
          $empMname = $getData['empMname'];
          $empLname = $getData['empLname'];
          $empFullname = "$empFname $empMname $empLname";
          $laCount = $getData['laCount'];

          if ($laCount != 0) {
            echo "" . ucwords(strtolower($empFullname)) . " : $laCount<br>";
            // $co = $laCount * $laCount;
            echo "<hr style='width: " . $laCount . "%; height: 5px; border-radius: 5px; background: linear-gradient(118deg, rgba(180,67,255,1) 0%, rgba(255,26,209,1) 50%, rgba(255,58,58,1) 100%);'>";
          } else {
          }
        }
        ?>
      </div>

      <div id="totalcontributions_cards" class="ninth-card">
        <h5>Payment Option</h5>
        <?php
        echo '<div>';
        while ($count = $getOverallFullpaymentCount->fetch_array(MYSQLI_ASSOC)) {
          $overallFullpaymentCount = $count['overallFullpaymentCount'];

          echo "<p style='margin: 0;'>Fullpayment</p>";
          echo "<span>$overallFullpaymentCount</span>";
          echo '<hr style="height: 5px; border-radius: 5px; width: ' . $overallFullpaymentCount . 'vw; background: linear-gradient(118deg, rgba(255,158,30,1) 9%, rgba(222,44,229,1) 90%)">';
        }
        echo '</div>';

        echo '<div>';
        while ($count = $getOverallDownpaymentCount->fetch_array(MYSQLI_ASSOC)) {
          $overallDownpaymentCount = $count['overallDownpaymentCount'];
          echo "<p style='margin: 0;'>Downpayment</p>";
          echo "<span>$overallDownpaymentCount</span>";
          echo "<hr style='height: 5px; border-radius: 5px; width: " . $overallDownpaymentCount . "%; background: linear-gradient(118deg, rgba(255,158,30,1) 9%, rgba(222,44,229,1) 90%)'>";
        }
        echo '</div>';
        ?>

      </div>

      <div>
        <h5>PENALTY</h5>
        <?php
        echo '<div>';
        while ($getData = $getHighestPenalty->fetch_array(MYSQLI_ASSOC)) {
          $p_empFname = $getData['empFname'];
          $p_empMname = $getData['empMname'];
          $p_empLname = $getData['empLname'];
          $p_typeOfEmployee = $getData['typeOfEmployee'];
          $p_empFullname = "$p_empFname $p_empMname $p_empLname";
          $penaltyCount = $getData['penaltyCount'];

          if ($penaltyCount >= 0) {
            echo '<p class="p_borrower_name">' . ucwords(strtolower($p_empFullname)) . '</p>';
          }
        }
        echo '</div>';
        ?>
      </div>

    </div>
  </main>
</body>

</html>