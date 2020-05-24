<?PHP
namespace loan950;
use \loan950\db_access;
include('../../dbaccess/db_access.php');
$db = new db_access();
session_start();

function display_pending_5k_request()
{
  $con = new db_access();
  $pending_5k = $con->fetch_loan_request_5k();

  echo '
  <div id="pending_table_5k">
    <table border="1">
      <thead>
        <tr>
          <th>Name</th>
          <th>Type of Account</th>
          <th>Status</th>
          <th>Action</th>
        </tr>
      </thead>';

      while($r = $pending_5k->fetch_array(MYSQLI_ASSOC)){
        if($r > 0){
          $loan_request_id_5k = $r['loan_request_id'];
          $borrower_id = $r['borrower_id'];
          $borrower_account_id = $r['account_id'];
          $ctrl_no_prefix = $r['ctrl_no_prefix'];
          $type_of_loan = $r['type_of_loan'];
          $borrower_fname = $r['borrower_fname'];
          $borrower_mname = $r['borrower_mname'];
          $borrower_lname = $r['borrower_lname'];
          $type_of_employee = $r['type_of_employee'];
          $borrower_office = $r['borrower_office'];
          $borrower_rank = $r['borrower_rank'];
          $loan_amount_5k_rate = $r['loan_amount_5k_rate'];
          $monthly_payment_5k_rate = $r['monthly_payment_5k_rate'];
          $credit_5k_rate = $r['credit_5k_rate'];
          $debit_pay_5k = $r['debit_pay_5k'];
          $interest_rate_5k = $r['interest_rate_5k'];
          $balance_rate_5k = $r['balance_rate_5k'];
          $comment_5k = $r['comment'];
          $penalty_5k = $r['penalty'];
          $first_payment_5k = $r['first_payment'];
          $second_payment_5k = $r['second_payment'];
          $third_payment_5k = $r['third_payment'];
          $fourth_payment_5k = $r['fourth_payment'];
          $fifth_payment_5k = $r['fifth_payment'];
          $full_payment_5k = $r['full_payment'];
          $loan_status_5k = $r['loan_status'];
          $is_new_loan_5k = $r['is_new_loan'];
          $is_loan_requested_5k = $r['is_loan_requested_5k'];
          $is_pending = (($r['is_pending'] == 0) ? '' : 'Pending');
          $fullname_5k = "$borrower_fname $borrower_mname $borrower_lname";
          $date_today = date("j-M-y");

          echo '
          <tbody>
            <tr>
              <input type="hidden" name="borrower_id" value="'.$borrower_id.'" />
              <input type="hidden" name="ctrl_no_prefix" value="'.$ctrl_no_prefix.'" />
              <input type="hidden" name="borrower_fname" value="'.$borrower_fname.'" />
              <input type="hidden" name="borrower_mname" value="'.$borrower_mname.'" />
              <input type="hidden" name="borrower_lname" value="'.$borrower_lname.'" />
              <input type="hidden" name="type_of_employee" value="'.$type_of_employee.'" />
              <input type="hidden" name="type_of_loan" value="'.$type_of_loan.'" />
              <input type="hidden" name="loan_amount_5k_rate" value="'.$loan_amount_5k_rate.'" />
              <input type="hidden" name="monthly_payment_5k_rate" value="'.$monthly_payment_5k_rate.'" />
              <input type="hidden" name="credit_5k_rate" value="'.$credit_5k_rate.'" />
              <input type="hidden" name="debit_pay_5k" value="'.$debit_pay_5k.'" />
              <input type="hidden" name="interest_rate_5k" value="'.$interest_rate_5k.'" />
              <input type="hidden" name="balance_rate_5k" value="'.$balance_rate_5k.'" />
              <input type="hidden" name="date_today" value="'.$date_today.'" />
              <input type="hidden" name="comment" value="'.$comment_5k.'" />
              <input type="hidden" name="penalty_5k" value="'.$penalty_5k.'" />
              <input type="hidden" name="office" value="'.$borrower_office.'" />
              <input type="hidden" name="rank" value="'.$borrower_rank.'" />
              <input type="hidden" name="first_payment_5k" value="'.$first_payment_5k.'" />
              <input type="hidden" name="second_payment_5k" value="'.$second_payment_5k.'" />
              <input type="hidden" name="third_payment_5k" value="'.$third_payment_5k.'" />
              <input type="hidden" name="fourth_payment_5k" value="'.$fourth_payment_5k.'" />
              <input type="hidden" name="fifth_payment_5k" value="'.$fifth_payment_5k.'" />
              <input type="hidden" name="full_payment_5k" value="'.$full_payment_5k.'" />
              <input type="hidden" name="loan_status_5k" value="'.$loan_status_5k.'" />
              <input type="hidden" name="is_new_loan_5k" value="'.$is_new_loan_5k.'" />
              <input type="hidden" name="is_loan_requested_5k" value="'.$is_loan_requested_5k.'" />
              <td>'.$fullname_5k.'</td>
              <td>'.$type_of_loan.'</td>
              <td>'.$is_pending.'</td>';
              echo <<<BUTTON
              <td>
                <input type="submit" name="btn_approve_loan_request_5k" value="Approve" />
                <input type="submit" name="btn_decline_loan_request_5k" value="Decline" />
              </td>
BUTTON;
              echo '</tr>
          </tbody>';
        } else {
          echo "No Record<br>";
        }
      }

    echo '</table>
  </div>';
}

// add to tbl_new_5k_loan
if(isset($_POST['btn_approve_loan_request_5k'])){
  $borrower_id = '';
  $ctrl_no_prefix = '';
  $borrower_fname = '';
  $borrower_mname = '';
  $borrower_lname = '';
  $type_of_employee = '';
  $type_of_loan = '';
  $loan_amount_5k_rate = '';
  $monthly_payment_5k_rate = '';
  $credit_5k_rate = '';
  $debit_pay_5k = '';
  $interest_rate_5k = '';
  $balance_rate_5k = '';
  $date_today = '';
  $comment = '';
  $penalty_5k = '';
  $office = '';
  $rank = '';
  $first_payment_5k = '';
  $second_payment_5k = '';
  $third_payment_5k = '';
  $fourth_payment_5k = '';
  $fifth_payment_5k = '';
  $full_payment_5k = '';
  $loan_status_5k = '';
  $is_new_loan_5k = '';
  $is_loan_requested_5k = '';
  $con = '';

  if(isset($_POST['borrower_id']) && isset($_POST['ctrl_no_prefix']) && isset($_POST['borrower_fname']) && isset($_POST['borrower_mname']) && isset($_POST['borrower_lname']) && isset($_POST['type_of_employee']) && isset($_POST['type_of_loan']) && isset($_POST['loan_amount_5k_rate']) &&
    isset($_POST['monthly_payment_5k_rate']) && isset($_POST['credit_5k_rate']) && isset($_POST['debit_pay_5k']) && isset($_POST['interest_rate_5k']) && isset($_POST['balance_rate_5k']) && isset($_POST['date_today']) && isset($_POST['comment']) && isset($_POST['penalty_5k']) && isset($_POST['office']) &&
    isset($_POST['rank']) && isset($_POST['first_payment_5k']) && isset($_POST['second_payment_5k']) && isset($_POST['third_payment_5k']) && isset($_POST['fourth_payment_5k']) && isset($_POST['fifth_payment_5k']) && isset($_POST['full_payment_5k']) && isset($_POST['loan_status_5k']) && isset($_POST['is_new_loan_5k']) && isset($_POST['is_loan_requested_5k'])){
    $con = $db->getConnection();
    $borrower_id = mysqli_real_escape_string($con, $_POST['borrower_id']);
    $ctrl_no_prefix = mysqli_real_escape_string($con, $_POST['ctrl_no_prefix']);
    $borrower_fname = mysqli_real_escape_string($con, $_POST['borrower_fname']);
    $borrower_mname = mysqli_real_escape_string($con, $_POST['borrower_mname']);
    $borrower_lname = mysqli_real_escape_string($con, $_POST['borrower_lname']);
    $type_of_employee = mysqli_real_escape_string($con, $_POST['type_of_employee']);
    $type_of_loan = mysqli_real_escape_string($con, $_POST['type_of_loan']);
    $loan_amount_5k_rate = mysqli_real_escape_string($con, $_POST['loan_amount_5k_rate']);
    $monthly_payment_5k_rate = mysqli_real_escape_string($con, $_POST['monthly_payment_5k_rate']);
    $credit_5k_rate = mysqli_real_escape_string($con, $_POST['credit_5k_rate']);
    $debit_pay_5k = mysqli_real_escape_string($con, $_POST['debit_pay_5k']);
    $interest_rate_5k = mysqli_real_escape_string($con, $_POST['interest_rate_5k']);
    $balance_rate_5k = mysqli_real_escape_string($con, $_POST['balance_rate_5k']);
    $date_today = mysqli_real_escape_string($con, $_POST['date_today']);
    $comment = mysqli_real_escape_string($con, $_POST['comment']);
    $penalty_5k = mysqli_real_escape_string($con, $_POST['penalty_5k']);
    $office = mysqli_real_escape_string($con, $_POST['office']);
    $rank = mysqli_real_escape_string($con, $_POST['rank']);
    $first_payment_5k = mysqli_real_escape_string($con, $_POST['first_payment_5k']);
    $second_payment_5k = mysqli_real_escape_string($con, $_POST['second_payment_5k']);
    $third_payment_5k = mysqli_real_escape_string($con, $_POST['third_payment_5k']);
    $fourth_payment_5k = mysqli_real_escape_string($con, $_POST['fourth_payment_5k']);
    $fifth_payment_5k = mysqli_real_escape_string($con, $_POST['fifth_payment_5k']);
    $full_payment_5k = mysqli_real_escape_string($con, $_POST['full_payment_5k']);
    $loan_status_5k = mysqli_real_escape_string($con, $_POST['loan_status_5k']);
    $is_new_loan_5k = mysqli_real_escape_string($con, $_POST['is_new_loan_5k']);
    $is_loan_requested_5k = mysqli_real_escape_string($con, $_POST['is_loan_requested_5k']);

    echo "$borrower_id<br>";
    echo "$ctrl_no_prefix<br>";
    echo "$borrower_fname<br>";
    echo "$borrower_mname<br>";
    echo "$borrower_lname<br>";
    echo "$type_of_employee<br>";
    echo "$type_of_loan<br>";
    echo "$loan_amount_5k_rate<br>";
    echo "$monthly_payment_5k_rate<br>";
    echo "$credit_5k_rate<br>";
    echo "$debit_pay_5k<br>";
    echo "$interest_rate_5k<br>";
    echo "$balance_rate_5k<br>";
    echo "$date_today<br>";
    echo "$comment<br>";
    echo "$penalty_5k<br>";
    echo "$office<br>";
    echo "$rank<br>";
    echo "$first_payment_5k<br>";
    echo "$second_payment_5k<br>";
    echo "$third_payment_5k<br>";
    echo "$fourth_payment_5k<br>";
    echo "$fifth_payment_5k<br>";
    echo "$full_payment_5k<br>";
    echo "$loan_status_5k<br>";
    echo "$is_new_loan_5k<br>";
    echo "$is_loan_requested_5k<br>";

    $add_new_5kloan = $db->add_new_5k_record($borrower_id, $ctrl_no_prefix, $borrower_fname, $borrower_mname, $borrower_lname, $type_of_employee, $type_of_loan, $loan_amount_5k_rate, $monthly_payment_5k_rate, $credit_5k_rate, $debit_pay_5k, $interest_rate_5k, $balance_rate_5k, $date_today, $comment_5k, $penalty_5k, $borrower_office, $borrower_rank, $first_payment_5k, $second_payment_5k, $third_payment_5k, $fourth_payment_5k, $fifth_payment_5k, $full_payment_5k, $loan_status_5k, $is_new_loan_5k, $is_loan_requested_5k);
    if($add_new_5kloan){
      
    }

  }

} else if(isset($_POST['btn_decline_loan_request_5k'])){
  echo 'DECLINE';
} else {

}

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="css/adminloanrequest.css">
  <?php include('css/adminloanrequeststyle.php'); ?>
  <title>Loan Requests</title>
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
    <section id="loanrequest-container">
      <div class="loanrequest-inner-container">
        <div class="loanrequest-titlecontainer">
          <h1>Loan Request</h1>
        </div>
        <hr>
        <form action="" method="POST" class="loanrequest-panel">
          <?php
          display_pending_5k_request();
          ?>
        </form>
      </div>
    </section>

  </main>
</body>
</html>