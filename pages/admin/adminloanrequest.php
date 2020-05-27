<?PHP
namespace loan950;
use \loan950\db_access;
include('../../dbaccess/db_access.php');
$db = new db_access();
session_start();

if(isset($_GET['loan_request']) && isset($_GET['baid']) && isset($_GET['bid'])){
  $loan_request_id_5k = '';
  $borrower_account_id = '';
  $borrower_id = '';
  $ctrl_no_prefix = '';
  $borrower_fname = '';
  $borrower_mname = '';
  $borrower_lname = '';
  $borrower_email = '';
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
  $increment = '';

  if(isset($_SESSION['loan_request_id_5k']) && isset($_SESSION['borrower_account_id']) && isset($_SESSION['borrower_id'])){
    // echo "$_GET[loan_request]<br>";
    // echo "$_GET[baid]<br>";
    // echo "$_GET[bid]<br>";

    $con = $db->getConnection();
    $fetchData = $db->fetch_civilian_pending_request($_GET['loan_request'], $_GET['baid'], $_GET['bid']);

    while($res = $fetchData->fetch_array(MYSQLI_ASSOC)){
      $loan_request_id_5k = $res['loan_request_id'];
      $borrower_account_id = $res['account_id'];
      $borrower_id = $res['borrower_id'];
      $ctrl_no_prefix = $res['ctrl_no_prefix'];
      $type_of_loan = $res['type_of_loan'];
      $borrower_fname = $res['borrower_fname'];
      $borrower_mname = $res['borrower_mname'];
      $borrower_lname = $res['borrower_lname'];
      $borrower_email = $res['borrower_email'];
      $type_of_employee = $res['type_of_employee'];
      $borrower_office = $res['borrower_office'];
      $borrower_rank = $res['borrower_rank'];
      $loan_amount_5k_rate = $res['loan_amount_5k_rate'];
      $monthly_payment_5k_rate = $res['monthly_payment_5k_rate'];
      $credit_5k_rate = $res['credit_5k_rate'];
      $debit_pay_5k = $res['debit_pay_5k'];
      $interest_rate_5k = $res['interest_rate_5k'];
      $balance_rate_5k = $res['balance_rate_5k'];
      $comment = $res['comment'];
      $penalty_5k = $res['penalty'];
      $first_payment_5k = $res['first_payment'];
      $second_payment_5k = $res['second_payment'];
      $third_payment_5k = $res['third_payment'];
      $fourth_payment_5k = $res['fourth_payment'];
      $fifth_payment_5k = $res['fifth_payment'];
      $full_payment_5k = $res['full_payment'];
      $loan_status_5k = $res['loan_status'];
      $is_new_loan_5k = $res['is_new_loan'];
      $is_loan_requested_5k = $res['is_loan_requested_5k'];
      $date_today = date("j-M-y");

      // echo "LOAN REQUEST ID: $loan_request_id_5k<br>";
      // echo "ACCOUNT ID: $borrower_account_id<br>";
      // echo "EMPLOYEE ID: $borrower_id<br>";
      // echo "PREFIX: $ctrl_no_prefix<br>";
      // echo "FIRSTNAME: $borrower_fname<br>";
      // echo "MIDDLENAME:$borrower_mname<br>";
      // echo "LASTNAME: $borrower_lname<br>";
      // echo "EMAIL: $borrower_email<br>";
      // echo "EMP TYPE: $type_of_employee<br>";
      // echo "TYPE OF LOAN:$type_of_loan<br>";
      // echo "LOAN AMOUNT: $loan_amount_5k_rate<br>";
      // echo "MONTHLY PAYMENT: $monthly_payment_5k_rate<br>";
      // echo "CREDIT RATE: $credit_5k_rate<br>";
      // echo "DEBIT PAY: $debit_pay_5k<br>";
      // echo "INTEREST RATE: $interest_rate_5k<br>";
      // echo "BALANCE RATE: $balance_rate_5k<br>";
      // echo "DATE TODAY:$date_today<br>";
      // echo "COMMENT:$comment<br>";
      // echo "PENALTY: $penalty_5k<br>";
      // echo "OFFICE: $borrower_office<br>";
      // echo "RANK: $borrower_rank<br>";
      // echo "$first_payment_5k<br>";
      // echo "$second_payment_5k<br>";
      // echo "$third_payment_5k<br>";
      // echo "$fourth_payment_5k<br>";
      // echo "$fifth_payment_5k<br>";
      // echo "$full_payment_5k<br>";
      // echo "$loan_status_5k<br>";
      // echo "$is_new_loan_5k<br>";
      // echo "$is_loan_requested_5k<br>";

      $getData = $db->get_civilian_la5kcount($borrower_id, $type_of_employee, $borrower_fname, $borrower_mname, $borrower_lname, $borrower_email);
      while($r = $getData->fetch_array(MYSQLI_ASSOC)){
        $la5k_count = $r['la_5k_count'];
        echo "LA 5k COUNT: $la5k_count<br>";
      }

      $increment = (int)$la5k_count + 1;
      echo $increment;

      $add_new_5kloan = $db->add_new_5k_record($borrower_id, $ctrl_no_prefix, $borrower_fname, $borrower_mname, $borrower_lname, $type_of_employee, $type_of_loan, $loan_amount_5k_rate, $monthly_payment_5k_rate, $credit_5k_rate, $debit_pay_5k, $interest_rate_5k, $balance_rate_5k, $date_today, $comment, $penalty_5k, $borrower_office, $borrower_rank, $first_payment_5k, $second_payment_5k, $third_payment_5k, $fourth_payment_5k, $fifth_payment_5k, $full_payment_5k, $loan_status_5k, $is_new_loan_5k, $is_loan_requested_5k);
      if($add_new_5kloan){
        $db->update_is_pending_5k($loan_request_id_5k, $borrower_id, $borrower_account_id, $borrower_fname, $borrower_mname, $borrower_lname, $borrower_email, $type_of_employee, $borrower_rank);
        $db->update_is_granted_5k($loan_request_id_5k, $borrower_id, $borrower_account_id, $borrower_fname, $borrower_mname, $borrower_lname, $borrower_email, $type_of_employee, $borrower_rank);
        if($type_of_employee === 'civilian'){
          $db->update_civilian_la5k_count($borrower_id, $borrower_fname, $borrower_mname, $borrower_lname, $type_of_employee, $increment);
        } else if($type_of_employee === 'officer'){
          $db->update_officer_la5k_count($borrower_id, $borrower_fname, $borrower_mname, $borrower_lname, $type_of_employee, $increment);
        }
        header('location: adminloanrequest.php');

      } else {
        printf("%s\n", $con->error);
      }

    }

  }

} else if(isset($_GET['decline'])){

}

function display_pending_5k_request()
{
  $con = new db_access();
  $pending_5k = $con->fetch_loan_request_5k();

  echo '
  <form action = "" method="POST">
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
          $_SESSION['loan_request_id_5k'] = $r['loan_request_id'];
          $borrower_id = $r['borrower_id'];
          $_SESSION['borrower_id'] = $r['borrower_id'];
          $borrower_account_id = $r['account_id'];
          $_SESSION['borrower_account_id'] = $r['account_id'];
          $ctrl_no_prefix = $r['ctrl_no_prefix'];
          $type_of_loan = $r['type_of_loan'];
          $borrower_fname = $r['borrower_fname'];
          $borrower_mname = $r['borrower_mname'];
          $borrower_lname = $r['borrower_lname'];
          $borrower_email = $r['borrower_email'];
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
          $is_pending = (($r['is_pending'] == 0) ? 'Granted' : 'Pending');
          $fullname_5k = "$borrower_fname $borrower_mname $borrower_lname";
          $date_today = date("j-M-y");
          

          if($is_pending === 'Pending'){
            echo '
            <tbody>
              <tr>
                <input type="hidden" name="loan_request_id_5k" value="'.$loan_request_id_5k.'" />
                <input type="hidden" name="borrower_account_id" value="'.$borrower_account_id.'" />
                <input type="hidden" name="borrower_id" value="'.$borrower_id.'" />
                <input type="hidden" name="ctrl_no_prefix" value="'.$ctrl_no_prefix.'" />
                <input type="hidden" name="borrower_fname" value="'.$borrower_fname.'" />
                <input type="hidden" name="borrower_mname" value="'.$borrower_mname.'" />
                <input type="hidden" name="borrower_lname" value="'.$borrower_lname.'" />
                <input type="hidden" name="borrower_email" value="'.$borrower_email.'" />
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
                  <a href="adminloanrequest.php?loan_request={$_SESSION['loan_request_id_5k']}&baid={$_SESSION['borrower_account_id']}&bid={$_SESSION['borrower_id']}">Approve</a>
                  <a href="adminloanrequest.php?decline_request={$_SESSION['loan_request_id_5k']}&baid={$_SESSION['borrower_account_id']}&bid={$_SESSION['borrower_id']}">Decline</a>
                </td>
BUTTON;
                echo '</tr>
            </tbody>';
          } else if($is_pending === 'Granted'){
            
          }
        } else {
          echo "No Record<br>";
        }
      }

    echo '</table>
  </div>
  </form';
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
  <script>
    function openTab(evt, tabName){
      var i, tabcontent, tablinks;
      tabcontent = document.getElementsByClassName("tabcontent");
      for(i = 0; i < tabcontent.length; i++){
        tabcontent[i].style.display = "none";
      }
      tablinks = document.getElementsByClassName("tablinks");
      for(i = 0; i < tablinks.length; i++){
        tablinks[i].className = tablinks[i].className.replace(" active", "");
      }
      document.getElementById(tabName).style.display = "block";
      evt.currentTarget.className += " active";
    }
  </script>

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
        <div class="loan_request_tabs">
          <button class="tablinks" onclick="openTab(event, 'loan_request_5k_tab')">5K Loan Requests</button>
          <button class="tablinks" onclick="openTab(event, 'loan_request_10k_tab')">10K Loan Requests</button>
        </div>

        <div id="loan_request_10k_tab" class="tabcontent">
          <div id="loan_request_10k_tablename">
            <h4>10K Loan Request List</h4>
          </div>
          <div id="loan_request_10k_table">
            <form action="approveloan10k.php" method="POST" class="loanrequest-panel">

            </form>
          </div>
        </div>

        <div id="loan_request_5k_tab" class="tabcontent">
          <div id="loan_request_5k_tablename">
            <h4>5K Loan request list</h4>
          </div>
          <div id="loan_request_5k_table">
            <?php
            display_pending_5k_request();
            ?>
          </div>
        </div>
      </div>
    </section>

  </main>
</body>
</html>