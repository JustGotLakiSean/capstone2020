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

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Admin Overview</title>
  <!-- <link rel="stylesheet" href="css/adminOverview.css"> -->
  <?php include('css/adminOverviewStyle.php'); ?>
  <script src="../../gateway/src/canvasjs-2.3.2/canvasjs.min.js"></script>
  <!-- <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script> -->
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
            <?php
              while($count = $get_total_num_borrower->fetch_array(MYSQLI_ASSOC)){
                $bID = $count['totSum'];
              }
            ?>
            <p id = "first-card-label">TOTAL NUMBER OF LOAN : <?php echo "<span style='color: #ff9501;'>$bID</span><br>"; ?></p>
          </div>
          <hr>
          <div id = "first-card-value-container">

          <?php
          $dataPoint = array();
            // while($get_count = $typeOfLoanCount->fetch_array(MYSQLI_ASSOC)){
            //   $typeOfLoan = $get_count['type_of_loan'];
            //   $totalCount = $get_count['totalNum'];
            //   // echo "$typeOfLoan : $totalCount<br>";
            //   echo "['".$typeOfLoan."', ".$totalCount."],";

              
            // }

            foreach($typeOfLoanCount as $row){
              array_push($dataPoint, array("Type Of Loan" => $row['type_of_loan'], "y" => $row['totalNum']));
            }

            // echo json_encode($dataPoint, JSON_NUMERIC_CHECK);
          ?>

<?php
            $emp_result = array();
            foreach($getTypeOfEmployee as $res1){
              array_push($emp_result, array(
                "Employee Type" => $res1['type_of_employee'],
                "y" => $res1['totalEMP']
              ));
            }

            // echo json_encode($emp_result, JSON_NUMERIC_CHECK);

            ?>

          <script type="text/javascript">
          window.onload = function(){
            CanvasJS.addColorSet("colorSet1",
              [
                '#007aff',
                '#5ac8fb',
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
                fontWeight: 'lighter',
                fontColor: '#ff9501',
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
                colorSet: "colorSet1",
                dataPoints: <?php echo json_encode($dataPoint, JSON_NUMERIC_CHECK); ?>
              }]

            });

            var total_borrower_chart = new CanvasJS.Chart("totalBorrowerBox",{
              title: {
                text: "Total number of Employee",
                fontFamily: 'Helvetica',
                fontWeight: 'lighter',
                fontColor: '#47ee5c',
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
                dataPoints: <?php echo json_encode($emp_result, JSON_NUMERIC_CHECK);?>
              }]
            })

            chart.render();
            total_borrower_chart.render();
          }
          </script>


            <!-- <p id = "first-card-value">0</p> -->
<!-- 
            <script type="text/javascript">
              // google.charts.load('current', {'packages':['corechart']});  
              // google.charts.setOnLoadCallback(drawChart);

              // function drawChart()
              // {
              //   var data = google.visualization.arrayToDataTable([
              //     ['Type of Loan', 'Total'],
              //     // <?php
              //     // // while($get_count = $typeOfLoanCount->fetch_array(MYSQLI_ASSOC)){
              //     // //   $typeOfLoan = $get_count['type_of_loan'];
              //     // //   $totalCount = $get_count['totalNum'];
              //     // //   // echo "$typeOfLoan : $totalCount<br>";
              //     // //   echo "['".$typeOfLoan."', ".$totalCount."],";
              //     // }
              //     // ?>
              //   ]);

                // var option = {
                //   title: 'Percentage per Type of Loan Account',
                //   width: 400,
                //   height: 270,
                //   pieSliceBorderColor: 'transparent',
                //   // pieHole: 0.1,
                //   colors: ['#5ac8fb', '#007aff'],
                //   fontName: 'Helvetica',
                //   fontSize: 14,
                //   titleTextStyle: {
                //     fontSize: 13,
                //     bold: false,
                //     italic: false
                //   },
                //   tooltip: {
                //     textStyle: {
                //       bold: false
                //     }
                //   }
                // };

                // var chart = new google.visualization.PieChart(document.getElementById('piechart'));
                // chart.draw(data, option);
              }
            </script> -->

            <div id="chartContainer" style="width: 400px; height: 270px;"></div>
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
          <?php
          while($count = $getTotalNumberOfEmployee->fetch_array(MYSQLI_ASSOC)){
            $empID = $count['totalBorrower'];
          }
          ?>
            <p id = "third-card-label">NUMBER OF EMPLOYEE : <?php echo "<span style='color: #47ee5c;'>$empID</span><br>"; ?></p>
          </div>
          <hr>
          <div id = "third-card-value-container">

            <script type="text/javascript">

            </script>
            <div id="totalBorrowerBox" style="width: 400px; height: 270px;" ></div>
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