<?PHP

namespace loan950;

use \loan950\db_access;

include('../../dbaccess/db_access.php');
$db = new db_access();
session_start();

// approve 5k loan request
if (isset($_GET['loan_request']) && isset($_GET['baid']) && isset($_GET['bid']) && isset($_GET['emp_type']) && isset($_GET['bfname']) && isset($_GET['bmname']) && isset($_GET['blname']) && isset($_GET['busername'])) {
  echo "YOW<br>";
  $loan_request_id_5k = '';
  $borrower_account_id = '';
  $borrower_id = '';
  $ctrl_no_prefix = '';
  $borrower_username = '';
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

  if (isset($_SESSION['loan_request_id_5k']) && isset($_SESSION['borrower_account_id']) && isset($_SESSION['borrower_id']) && isset($_SESSION['type_of_employee']) && isset($_SESSION['borrower_fname']) && isset($_SESSION['borrower_mname']) && isset($_SESSION['borrower_lname']) && isset($_SESSION['borrower_username'])) {
    // echo "$_GET[loan_request]<br>";
    // echo "$_GET[baid]<br>";
    // echo "$_GET[bid]<br>";
    // echo "$_GET[busername]<br>";
    // echo "$_GET[emp_type]<br>";
    // echo "$_GET[bfname]<br>";
    // echo "$_GET[bmname]<br>";
    // echo "$_GET[blname]<br>";
    // echo "$_GET[busername]<br>";

    $con = $db->getConnection();
    $fetchData = $db->fetch_pending_request($_GET['loan_request'], $_GET['baid'], $_GET['bid'], $_GET['emp_type'], $_GET['bfname'], $_GET['bmname'], $_GET['blname'], $_GET['busername']);

    while ($res = $fetchData->fetch_array(MYSQLI_ASSOC)) {
      $loan_request_id_5k = $res['loan_request_id'];
      $borrower_account_id = $res['account_id'];
      $borrower_id = $res['borrower_id'];
      $ctrl_no_prefix = $res['ctrl_no_prefix'];
      $type_of_loan = $res['type_of_loan'];
      $borrower_username = $res['borrower_username'];
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
      $sixth_payment_5k = 0;
      $full_payment_5k = $res['full_payment'];
      $loan_status_5k = $res['loan_status'];
      $is_new_loan_5k = $res['is_new_loan'];
      $is_loan_requested_5k = $res['is_loan_requested_5k'];
      $date_today = date("j-M-y");

      // echo "LOAN REQUEST ID: $loan_request_id_5k<br>";
      // echo "ACCOUNT ID: $borrower_account_id<br>";
      // echo "EMPLOYEE ID: $borrower_id<br>";
      // echo "PREFIX: $ctrl_no_prefix<br>";
      // echo "USERNAME: $borrower_username<br>";
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

      if ($type_of_employee === 'civilian') {
        echo "CIVI<br>";
        $getData = $db->get_civilian_la5kcount($borrower_id, $type_of_employee, $borrower_fname, $borrower_mname, $borrower_lname, $borrower_email);
        while ($r = $getData->fetch_array(MYSQLI_ASSOC)) {
          $la5k_count = $r['la_5k_count'];
          echo "LA 5k COUNT: $la5k_count<br>";
        }
      } else if ($type_of_employee === 'officer') {
        echo "OFF<br>";
        $getData = $db->get_officer_lacount($borrower_id, $type_of_employee, $borrower_fname, $borrower_mname, $borrower_lname, $borrower_email, $borrower_rank);
        while ($r = $getData->fetch_array(MYSQLI_ASSOC)) {
          $la5k_count = $r['la_5k_count'];
        }
      }

      $increment = (int) $la5k_count + 1;
      echo $increment;

      $add_new_5kloan = $db->add_new_5k_record($borrower_id, $ctrl_no_prefix, $borrower_fname, $borrower_mname, $borrower_lname, $type_of_employee, $type_of_loan, $loan_amount_5k_rate, $monthly_payment_5k_rate, $credit_5k_rate, $debit_pay_5k, $interest_rate_5k, $balance_rate_5k, $date_today, $comment, $penalty_5k, $borrower_office, $borrower_rank, $first_payment_5k, $second_payment_5k, $third_payment_5k, $fourth_payment_5k, $fifth_payment_5k, $sixth_payment_5k, $full_payment_5k, $loan_status_5k, $is_new_loan_5k, $is_loan_requested_5k);
      if ($add_new_5kloan) {
        $db->update_is_pending_5k($loan_request_id_5k, $borrower_id, $borrower_account_id, $borrower_username, $borrower_fname, $borrower_mname, $borrower_lname, $borrower_email, $type_of_employee, $borrower_rank);
        $db->update_is_granted_5k($loan_request_id_5k, $borrower_id, $borrower_account_id, $borrower_username, $borrower_fname, $borrower_mname, $borrower_lname, $borrower_email, $type_of_employee, $borrower_rank);
        if ($type_of_employee === 'civilian') {
          $db->update_civilian_la5k_count($borrower_id, $borrower_fname, $borrower_mname, $borrower_lname, $type_of_employee, $increment);
        } else if ($type_of_employee === 'officer') {
          $db->update_officer_la5k_count($borrower_id, $borrower_fname, $borrower_mname, $borrower_lname, $type_of_employee, $increment);
        }
        header('location: adminloanrequest.php');
      } else {
        printf("%s\n", $con->error);
      }
    }
  } else {
  }
} else if (isset($_GET['decline_request']) && isset($_GET['baid']) && isset($_GET['bid']) && isset($_GET['emp_type']) && isset($_GET['bfname']) && isset($_GET['bmname']) && isset($_GET['blname']) && isset($_GET['busername'])) {
  $loan_request_id_5k = '';
  $borrower_id = '';
  $borrower_account_id = '';
  $borrower_username = '';
  $borrower_fname = '';
  $borrower_mname = '';
  $borrower_lname = '';
  $borrower_email = '';
  $type_of_employee = '';
  $borrower_rank = '';
  $con = '';

  if (isset($_SESSION['loan_request_id_5k']) && isset($_SESSION['borrower_account_id']) && isset($_SESSION['borrower_id']) && isset($_SESSION['type_of_employee']) && isset($_SESSION['borrower_fname']) && isset($_SESSION['borrower_mname']) && isset($_SESSION['borrower_lname']) && isset($_SESSION['borrower_username'])) {
    // echo "$_GET[decline_request]<br>";
    // echo "$_GET[baid]<br>";
    // echo "$_GET[bid]<br>";
    // echo "$_GET[emp_type]<br>";
    // echo "$_GET[bfname]<br>";
    // echo "$_GET[bmname]<br>";
    // echo "$_GET[blname]<br>";
    // echo "$_GET[busername]<br>";

    $con = $db->getConnection();
    $fetchData = $db->fetch_pending_request($_GET['decline_request'], $_GET['baid'], $_GET['bid'], $_GET['emp_type'], $_GET['bfname'], $_GET['bmname'], $_GET['blname'], $_GET['busername']);

    while ($res = $fetchData->fetch_array(MYSQLI_ASSOC)) {
      $loan_request_id_5k = $res['loan_request_id'];
      $borrower_id = $res['borrower_id'];
      $borrower_account_id = $res['account_id'];
      $borrower_username = $res['borrower_username'];
      $borrower_fname = $res['borrower_fname'];
      $borrower_mname = $res['borrower_mname'];
      $borrower_lname = $res['borrower_lname'];
      $borrower_email = $res['borrower_email'];
      $type_of_employee = $res['type_of_employee'];
      $borrower_rank = $res['borrower_rank'];

      // echo "$loan_request_id_5k<br>";
      // echo "$borrower_id<br>";
      // echo "$borrower_account_id<br>";
      // echo "$borrower_username<br>";
      // echo "$borrower_fname<br>";
      // echo "$borrower_mname<br>";
      // echo "$borrower_lname<br>";
      // echo "$borrower_email<br>";
      // echo "$type_of_employee<br>";
      // echo "$borrower_rank<br>";

      $updateData = $db->update_is_declined_5k($loan_request_id_5k, $borrower_id, $borrower_account_id, $borrower_username, $borrower_fname, $borrower_mname, $borrower_lname, $borrower_email, $type_of_employee, $borrower_rank);
      if ($updateData) {
        $db->update_is_pending_5k($loan_request_id_5k, $borrower_id, $borrower_account_id, $borrower_username, $borrower_fname, $borrower_mname, $borrower_lname, $borrower_email, $type_of_employee, $borrower_rank);
        header('location: adminloanrequest.php');
      } else {
        printf("%s\n", $con->error);
      }
    }
  } else {
  }
} else {
}

if (isset($_GET['loan_request_10950']) && isset($_GET['baid10950']) && isset($_GET['bid10950']) && isset($_GET['emp_type_10']) && isset($_GET['bfname_10']) && isset($_GET['bmname_10']) && isset($_GET['blname_10']) && isset($_GET['busername_10'])) {
  echo "$_GET[loan_request_10950]<br>";
  echo "$_GET[baid10950]<br>";
  echo "$_GET[bid10950]<br>";
  echo "$_GET[emp_type_10]<br>";
  echo "$_GET[bfname_10]<br>";
  echo "$_GET[bmname_10]<br>";
  echo "$_GET[blname_10]<br>";
  echo "$_GET[busername_10]<br>";

  $loan_request_id_10k = '';
  $borrower_account_id_10k = '';
  $borrower_id_10k = '';
  $ctrl_no_prefix_10k = '';
  $borrower_username_10k = '';
  $borrower_fname_10k = '';
  $borrower_mname_10k = '';
  $borrower_lname_10k = '';
  $borrower_email_10k = '';
  $type_of_employee_10k = '';
  $type_of_loan_10k = '';
  $loan_amount_10k_rate = '';
  $monthly_payment_10k_rate = '';
  $credit_10k_rate = '';
  $debit_pay_10k = '';
  $interest_rate_10k = '';
  $balance_rate_10k = '';
  $date_today_10k = '';
  $comment_10k = '';
  $penalty_10k = '';
  $borrower_office_10k = '';
  $borrower_rank_10k = '';
  $first_payment_10k = '';
  $second_payment_10k = '';
  $third_payment_10k = '';
  $fourth_payment_10k = '';
  $fifth_payment_10k = '';
  $sixth_payment_10k = '';
  $full_payment_10k = '';
  $loan_status_10k = '';
  $is_new_loan_10k = '';
  $is_loan_requested_10k = '';
  $con = '';
  $increment_10k = '';

  if (isset($_SESSION['loan_request_id_10k']) && isset($_SESSION['borrower_account_id_10k']) && isset($_SESSION['borrower_id_10k']) && isset($_SESSION['type_of_employee_10k']) && isset($_SESSION['borrower_fname_10k']) && isset($_SESSION['borrower_mname_10k']) && isset($_SESSION['borrower_lname_10k']) && isset($_SESSION['borrower_username_10k'])) {
    // echo "$_GET[loan_request_10950]<br>";
    // echo "$_GET[baid10950]<br>";
    // echo "$_GET[bid10950]<br>";
    // echo "$_GET[emp_type_10]<br>";
    // echo "$_GET[bfname_10]<br>";
    // echo "$_GET[bmname_10]<br>";
    // echo "$_GET[blname_10]<br>";
    // echo "$_GET[busername_10]<br>";

    $con = $db->getConnection();
    $fetch_data_10k = $db->fetch_pending_request_10k($_GET['loan_request_10950'], $_GET['baid10950'], $_GET['bid10950'], $_GET['emp_type_10'], $_GET['bfname_10'], $_GET['bmname_10'], $_GET['blname_10'], $_GET['busername_10']);

    while ($res = $fetch_data_10k->fetch_array(MYSQLI_ASSOC)) {
      $loan_request_id_10k = $res['loan_request_id_10k'];
      $borrower_account_id_10k = $res['account_id_10k'];
      $borrower_id_10k = $res['borrower_id_10k'];
      $ctrl_no_prefix_10k = $res['ctrl_no_prefix_10k'];
      $type_of_loan_10k = $res['type_of_loan_10k'];
      $borrower_username_10k = $res['borrower_username_10k'];
      $borrower_fname_10k = $res['borrower_fname_10k'];
      $borrower_mname_10k = $res['borrower_mname_10k'];
      $borrower_lname_10k = $res['borrower_lname_10k'];
      $borrower_email_10k = $res['borrower_email_10k'];
      $type_of_employee_10k = $res['type_of_employee_10k'];
      $loan_amount_10k_rate = $res['loan_amount_10k_rate'];
      $monthly_payment_10k_rate = $res['monthly_payment_10k_rate'];
      $credit_10k_rate = $res['credit_10k_rate'];
      $debit_pay_10k = $res['debit_pay_10k'];
      $interest_rate_10k = $res['interest_rate_10k'];
      $balance_rate_10k = $res['balance_rate_10k'];
      $comment_10k = $res['comment_10k'];
      $penalty_10k = $res['penalty_10k'];
      $borrower_office_10k = $res['borrower_office_10k'];
      $borrower_rank_10k = $res['borrower_rank_10k'];
      $first_payment_10k = $res['first_payment_10k'];
      $second_payment_10k = $res['second_payment_10k'];
      $third_payment_10k = $res['third_payment_10k'];
      $fourth_payment_10k = $res['fourth_payment_10k'];
      $fifth_payment_10k = $res['fifth_payment_10k'];
      $sixth_payment_10k = $res['sixth_payment_10k'];
      $full_payment_10k = $res['full_payment_10k'];
      $loan_status_10k = $res['loan_status_10k'];
      $is_new_loan_10k = $res['is_new_loan_10k'];
      $is_loan_requested_10k = $res['is_loan_requested_10k'];
      $date_today_10k = date("j-M-y");

      // echo "LOAN REQ ID: $loan_request_id_10k<br>";
      // echo "ACOUTN ID: $borrower_account_id_10k<br>";
      // echo "ID: $borrower_id_10k<br>";
      // echo "CTRL $ctrl_no_prefix_10k<br>";
      // echo "USERNAME: $borrower_username_10k<br>";
      // echo "FNAME $borrower_fname_10k<br>";
      // echo "$borrower_mname_10k<br>";
      // echo "$borrower_lname_10k<br>";
      // echo "$borrower_email_10k<br>";
      // echo "$type_of_employee_10k<br>";
      // echo "$type_of_loan_10k<br>";
      // echo "$loan_amount_10k_rate<br>";
      // echo "$monthly_payment_10k_rate<br>";
      // echo "$credit_10k_rate<br>";
      // echo "$debit_pay_10k<br>";
      // echo "$interest_rate_10k<br>";
      // echo "$balance_rate_10k<br>";
      // echo "$date_today_10k<br>";
      // echo "$comment_10k<br>";
      // echo "$penalty_10k<br>";
      // echo "$borrower_office_10k<br>";
      // echo "$borrower_rank_10k<br>";
      // echo "$first_payment_10k<br>";
      // echo "$second_payment_10k<br>";
      // echo "$third_payment_10k<br>";
      // echo "$fourth_payment_10k<br>";
      // echo "$fifth_payment_10k<br>";
      // echo "$sixth_payment_10k<br>";
      // echo "$full_payment_10k<br>";
      // echo "$loan_status_10k<br>";
      // echo "$is_new_loan_10k<br>";
      // echo "$is_loan_requested_10k<br>";

      $get_data_10k = $db->get_civilian_la5kcount($borrower_id_10k, $type_of_employee_10k, $borrower_fname_10k, $borrower_mname_10k, $borrower_lname_10k, $borrower_email_10k);
      while ($r = $get_data_10k->fetch_array(MYSQLI_ASSOC)) {
        $la10k_count = $r['la_10k_count'];
        echo "LA 10K COUNT: $la10k_count<br>";
      }

      $increment_10k = (int) $la10k_count + 1;
      echo $increment_10k;

      $add_new_10kloan = $db->add_new_10k_record($borrower_id_10k, $ctrl_no_prefix_10k, $borrower_fname_10k, $borrower_mname_10k, $borrower_lname_10k, $type_of_employee_10k, $type_of_loan_10k, $loan_amount_10k_rate, $monthly_payment_10k_rate, $credit_10k_rate, $debit_pay_10k, $interest_rate_10k, $balance_rate_10k, $date_today_10k, $comment_10k, $penalty_10k, $borrower_office_10k, $borrower_rank_10k, $first_payment_10k, $second_payment_10k, $third_payment_10k, $fourth_payment_10k, $fifth_payment_10k, $sixth_payment_10k, $full_payment_10k, $loan_status_10k, $is_new_loan_10k, $is_loan_requested_10k);
      if ($add_new_10kloan) {
        $db->update_is_pending_10k($loan_request_id_10k, $borrower_id_10k, $borrower_account_id_10k, $borrower_username_10k, $borrower_fname_10k, $borrower_mname_10k, $borrower_lname_10k, $borrower_email_10k, $type_of_employee_10k, $borrower_rank_10k);
        $db->update_is_granted_10k($loan_request_id_10k, $borrower_id_10k, $borrower_account_id_10k, $borrower_username_10k, $borrower_fname_10k, $borrower_mname_10k, $borrower_lname_10k, $borrower_email_10k, $type_of_employee_10k, $borrower_rank_10k);
        if ($type_of_employee_10k === 'civilian') {
          $db->update_civilian_la10k_count($borrower_id_10k, $borrower_fname_10k, $borrower_mname_10k, $borrower_lname_10k, $type_of_employee_10k, $increment_10k);
        } else if ($type_of_employee_10k === 'officer') {
          $db->update_officer_la10k_count($borrower_id_10k, $borrower_fname_10k, $borrower_mname_10k, $borrower_lname_10k, $type_of_employee_10k, $increment_10k);
        }
        header('location: adminloanrequest.php');
      } else {
        printf("%s\n", $con->error);
      }
    }
  } else {
  }
} else if (isset($_GET['decline_request_10950']) && isset($_GET['baid10950']) && isset($_GET['bid10950']) && isset($_GET['emp_type_10']) && isset($_GET['bfname_10']) && isset($_GET['bmname_10']) && isset($_GET['blname_10']) && isset($_GET['busername_10'])) {
  $loan_request_id_10k = '';
  $borrower_id_10k = '';
  $borrower_account_id_10k = '';
  $borrower_username_10k = '';
  $borrower_fname_10k = '';
  $borrower_mname_10k = '';
  $borrower_lname_10k = '';
  $borrower_email_10k = '';
  $type_of_employee_10k = '';
  $borrower_rank_10k = '';
  $con = '';

  if (isset($_SESSION['loan_request_id_10k']) && isset($_SESSION['borrower_account_id']) && isset($_SESSION['borrower_id']) && isset($_SESSION['type_of_employee_10k']) && isset($_SESSION['borrower_fname_10k']) && isset($_SESSION['borrower_mname_10k']) && isset($_SESSION['borrower_lname_10k']) && isset($_SESSION['borrower_username_10k'])) {
    echo "$_GET[decline_request_10950]<br>";
    echo "$_GET[baid10950]<br>";
    echo "$_GET[bid10950]<br>";
    echo "$_GET[emp_type_10]<br>";
    echo "$_GET[bfname_10]<br>";
    echo "$_GET[bmname_10]<br>";
    echo "$_GET[blname_10]<br>";
    echo "$_GET[busername_10]<br>";

    $con = $db->getConnection();
    $fetch_data_10k = $db->fetch_pending_request_10k($_GET['decline_request_10950'], $_GET['baid10950'], $_GET['bid10950'], $_GET['emp_type_10'], $_GET['bfname_10'], $_GET['bmname_10'], $_GET['blname_10'], $_GET['busername_10']);

    while ($res = $fetch_data_10k->fetch_array(MYSQLI_ASSOC)) {
      $loan_request_id_10k = $res['loan_request_id_10k'];
      $borrower_id_10k = $res['borrower_id_10k'];
      $borrower_account_id_10k = $res['account_id_10k'];
      $borrower_username_10k = $res['borrower_username_10k'];
      $borrower_fname_10k = $res['borrower_fname_10k'];
      $borrower_mname_10k = $res['borrower_mname_10k'];
      $borrower_lname_10k = $res['borrower_lname_10k'];
      $borrower_email_10k = $res['borrower_email_10k'];
      $type_of_employee_10k = $res['type_of_employee_10k'];
      $borrower_rank_10k = $res['borrower_rank_10k'];

      // echo "$loan_request_id_10k<br>";
      // echo "$borrower_id_10k<br>";
      // echo "$borrower_account_id_10k<br>";
      // echo "$borrower_username_10k<br>";
      // echo "$borrower_fname_10k<br>";
      // echo "$borrower_mname_10k<br>";
      // echo "$borrower_lname_10k<br>";
      // echo "$borrower_email_10k<br>";
      // echo "$type_of_employee_10k<br>";
      // echo "$borrower_rank_10k<br>";

      $updateData = $db->update_is_declined_10k($loan_request_id_10k, $borrower_id_10k, $borrower_account_id_10k, $borrower_username_10k, $borrower_fname_10k, $borrower_mname_10k, $borrower_lname_10k, $borrower_email_10k, $type_of_employee_10k, $borrower_rank_10k);
      if ($updateData) {
        $db->update_is_pending_10k($loan_request_id_10k, $borrower_id_10k, $borrower_account_id_10k, $borrower_username_10k, $borrower_fname_10k, $borrower_mname_10k, $borrower_lname_10k, $borrower_email_10k, $type_of_employee_10k, $borrower_rank_10k);
        header('location: adminloanrequest.php');
      } else {
        printf("%s\n", $con->error);
      }
    }
  } else {
  }
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

  while ($r = $pending_5k->fetch_array(MYSQLI_ASSOC)) {
    if ($r > 0) {
      $loan_request_id_5k = $r['loan_request_id'];
      $_SESSION['loan_request_id_5k'] = $r['loan_request_id'];
      $borrower_id = $r['borrower_id'];
      $_SESSION['borrower_id'] = $r['borrower_id'];
      $borrower_account_id = $r['account_id'];
      $_SESSION['borrower_account_id'] = $r['account_id'];
      $ctrl_no_prefix = $r['ctrl_no_prefix'];
      $type_of_loan = $r['type_of_loan'];
      $borrower_username = $r['borrower_username'];
      $_SESSION['borrower_username'] = $r['borrower_username'];
      $borrower_fname = $r['borrower_fname'];
      $_SESSION['borrower_fname'] = $r['borrower_fname'];
      $borrower_mname = $r['borrower_mname'];
      $_SESSION['borrower_mname'] = $r['borrower_mname'];
      $borrower_lname = $r['borrower_lname'];
      $_SESSION['borrower_lname'] = $r['borrower_lname'];
      $borrower_email = $r['borrower_email'];
      $type_of_employee = $r['type_of_employee'];
      $_SESSION['type_of_employee'] = $r['type_of_employee'];
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


      if ($is_pending === 'Pending') {
        echo '
            <tbody>
              <tr>
                <input type="hidden" name="loan_request_id_5k" value="' . $loan_request_id_5k . '" />
                <input type="hidden" name="borrower_account_id" value="' . $borrower_account_id . '" />
                <input type="hidden" name="borrower_id" value="' . $borrower_id . '" />
                <input type="hidden" name="ctrl_no_prefix" value="' . $ctrl_no_prefix . '" />
                <input type="hidden" name="borrower_username" value="' . $borrower_username . '" />
                <input type="hidden" name="borrower_fname" value="' . $borrower_fname . '" />
                <input type="hidden" name="borrower_mname" value="' . $borrower_mname . '" />
                <input type="hidden" name="borrower_lname" value="' . $borrower_lname . '" />
                <input type="hidden" name="borrower_email" value="' . $borrower_email . '" />
                <input type="hidden" name="type_of_employee" value="' . $type_of_employee . '" />
                <input type="hidden" name="type_of_loan" value="' . $type_of_loan . '" />
                <input type="hidden" name="loan_amount_5k_rate" value="' . $loan_amount_5k_rate . '" />
                <input type="hidden" name="monthly_payment_5k_rate" value="' . $monthly_payment_5k_rate . '" />
                <input type="hidden" name="credit_5k_rate" value="' . $credit_5k_rate . '" />
                <input type="hidden" name="debit_pay_5k" value="' . $debit_pay_5k . '" />
                <input type="hidden" name="interest_rate_5k" value="' . $interest_rate_5k . '" />
                <input type="hidden" name="balance_rate_5k" value="' . $balance_rate_5k . '" />
                <input type="hidden" name="date_today" value="' . $date_today . '" />
                <input type="hidden" name="comment" value="' . $comment_5k . '" />
                <input type="hidden" name="penalty_5k" value="' . $penalty_5k . '" />
                <input type="hidden" name="office" value="' . $borrower_office . '" />
                <input type="hidden" name="rank" value="' . $borrower_rank . '" />
                <input type="hidden" name="first_payment_5k" value="' . $first_payment_5k . '" />
                <input type="hidden" name="second_payment_5k" value="' . $second_payment_5k . '" />
                <input type="hidden" name="third_payment_5k" value="' . $third_payment_5k . '" />
                <input type="hidden" name="fourth_payment_5k" value="' . $fourth_payment_5k . '" />
                <input type="hidden" name="fifth_payment_5k" value="' . $fifth_payment_5k . '" />
                <input type="hidden" name="full_payment_5k" value="' . $full_payment_5k . '" />
                <input type="hidden" name="loan_status_5k" value="' . $loan_status_5k . '" />
                <input type="hidden" name="is_new_loan_5k" value="' . $is_new_loan_5k . '" />
                <input type="hidden" name="is_loan_requested_5k" value="' . $is_loan_requested_5k . '" />
                <td>' . $fullname_5k . '</td>
                <td>' . $type_of_loan . '</td>
                <td>' . $is_pending . '</td>';
        echo <<<BUTTON
                <td>
                  <a href="adminloanrequest.php?loan_request={$_SESSION['loan_request_id_5k']}&baid={$_SESSION['borrower_account_id']}&bid={$_SESSION['borrower_id']}&emp_type={$_SESSION['type_of_employee']}&bfname={$_SESSION['borrower_fname']}&bmname={$_SESSION['borrower_mname']}&blname={$_SESSION['borrower_lname']}&busername={$_SESSION['borrower_username']}" id="approve5k_link">Approve</a>
                  <a href="adminloanrequest.php?decline_request={$_SESSION['loan_request_id_5k']}&baid={$_SESSION['borrower_account_id']}&bid={$_SESSION['borrower_id']}&emp_type={$_SESSION['type_of_employee']}&bfname={$_SESSION['borrower_fname']}&bmname={$_SESSION['borrower_mname']}&blname={$_SESSION['borrower_lname']}&busername={$_SESSION['borrower_username']}" id="decline5k_link">Decline</a>
                </td>
BUTTON;
        echo '</tr>
            </tbody>';
      } else if ($is_pending === 'Granted') {
      }
    } else {
      echo "No Record<br>";
    }
  }

  echo '</table>
  </div>
  </form';
}

function display_pending_10k_request()
{
  $con = new db_access();
  $pending_10k = $con->fetch_loan_request_10k();

  echo '
  <form action ="" method="POST">
    <div id="pending_table_10k">
      <table border="1">
        <thead>
          <tr>
            <th>Name</th>
            <th>Type of Account</th>
            <th>Status</th>
            <th>Action</th>
          </tr>
        </thead>';

  while ($r = $pending_10k->fetch_array(MYSQLI_ASSOC)) {
    if ($r > 0) {
      $loan_request_id_10k = $r['loan_request_id_10k'];
      $_SESSION['loan_request_id_10k'] = $r['loan_request_id_10k'];
      $borrower_id_10k = $r['borrower_id_10k'];
      $_SESSION['borrower_id_10k'] = $r['borrower_id_10k'];
      $borrower_account_id_10k = $r['account_id_10k'];
      $_SESSION['borrower_account_id_10k'] = $r['account_id_10k'];
      $ctrl_no_prefix_10k = $r['ctrl_no_prefix_10k'];
      $type_of_loan_10k = $r['type_of_loan_10k'];
      $borrower_username_10k = $r['borrower_username_10k'];
      $_SESSION['borrower_username_10k'] = $r['borrower_username_10k'];
      $borrower_fname_10k = $r['borrower_fname_10k'];
      $_SESSION['borrower_fname_10k'] = $r['borrower_fname_10k'];
      $borrower_mname_10k = $r['borrower_mname_10k'];
      $_SESSION['borrower_mname_10k'] = $r['borrower_mname_10k'];
      $borrower_lname_10k = $r['borrower_lname_10k'];
      $_SESSION['borrower_lname_10k'] = $r['borrower_lname_10k'];
      $borrower_email_10k = $r['borrower_email_10k'];
      $type_of_employee_10k = $r['type_of_employee_10k'];
      $_SESSION['type_of_employee_10k'] = $r['type_of_employee_10k'];
      $borrower_office_10k = $r['borrower_office_10k'];
      $borrower_rank_10k = $r['borrower_rank_10k'];
      $loan_amount_10k_rate = $r['loan_amount_10k_rate'];
      $monthly_payment_10k_rate = $r['monthly_payment_10k_rate'];
      $credit_10k_rate = $r['credit_10k_rate'];
      $debit_pay_10k = $r['debit_pay_10k'];
      $interest_rate_10k = $r['interest_rate_10k'];
      $balance_rate_10k = $r['balance_rate_10k'];
      $comment_10k = $r['comment_10k'];
      $penalty_10k = $r['penalty_10k'];
      $first_payment_10k = $r['first_payment_10k'];
      $second_payment_10k = $r['second_payment_10k'];
      $third_payment_10k = $r['third_payment_10k'];
      $fourth_payment_10k = $r['fourth_payment_10k'];
      $fifth_payment_10k = $r['fifth_payment_10k'];
      $sixth_payment_10k = $r['sixth_payment_10k'];
      $full_payment_10k = $r['full_payment_10k'];
      $loan_status_10k = $r['loan_status_10k'];
      $is_new_loan_10k = $r['is_new_loan_10k'];
      $is_loan_requested_10k = $r['is_loan_requested_10k'];
      $is_pending_10k = (($r['is_pending_10k'] == 0) ? 'Granted' : 'Pending');
      $fullname_10k = "$borrower_fname_10k $borrower_mname_10k $borrower_lname_10k";
      $date_today_10k = date("j-M-y");


      if ($is_pending_10k === 'Pending') {
        echo '
              <tbody>
                <tr>
                  <input type="hidden" name="loan_request_id_5k" value="' . $loan_request_id_10k . '" />
                  <input type="hidden" name="borrower_account_id_10k" value="' . $borrower_account_id_10k . '" />
                  <input type="hidden" name="borrower_id_10k" value="' . $borrower_id_10k . '" />
                  <input type="hidden" name="ctrl_no_prefix_10k" value="' . $ctrl_no_prefix_10k . '" />
                  <input type="hidden" name="borrower_username_10k" value="' . $borrower_username_10k . '" />
                  <input type="hidden" name="borrower_fname_10k" value="' . $borrower_fname_10k . '" />
                  <input type="hidden" name="borrower_mname_10k" value="' . $borrower_mname_10k . '" />
                  <input type="hidden" name="borrower_lname_10k" value="' . $borrower_lname_10k . '" />
                  <input type="hidden" name="borrower_email_10k" value="' . $borrower_email_10k . '" />
                  <input type="hidden" name="type_of_employee_10k" value="' . $type_of_employee_10k . '" />
                  <input type="hidden" name="type_of_loan_10k" value="' . $type_of_loan_10k . '" />
                  <input type="hidden" name="loan_amount_10k_rate" value="' . $loan_amount_10k_rate . '" />
                  <input type="hidden" name="monthly_payment_10k_rate" value="' . $monthly_payment_10k_rate . '" />
                  <input type="hidden" name="credit_10k_rate" value="' . $credit_10k_rate . '" />
                  <input type="hidden" name="debit_pay_10k" value="' . $debit_pay_10k . '" />
                  <input type="hidden" name="interest_rate_10k" value="' . $interest_rate_10k . '" />
                  <input type="hidden" name="balance_rate_10k" value="' . $balance_rate_10k . '" />
                  <input type="hidden" name="date_today_10k" value="' . $date_today_10k . '" />
                  <input type="hidden" name="comment_10k" value="' . $comment_10k . '" />
                  <input type="hidden" name="penalty_10k" value="' . $penalty_10k . '" />
                  <input type="hidden" name="office_10k" value="' . $borrower_office_10k . '" />
                  <input type="hidden" name="rank_10k" value="' . $borrower_rank_10k . '" />
                  <input type="hidden" name="first_payment_10k" value="' . $first_payment_10k . '" />
                  <input type="hidden" name="second_payment_10k" value="' . $second_payment_10k . '" />
                  <input type="hidden" name="third_payment_10k" value="' . $third_payment_10k . '" />
                  <input type="hidden" name="fourth_payment_10k" value="' . $fourth_payment_10k . '" />
                  <input type="hidden" name="fifth_payment_10k" value="' . $fifth_payment_10k . '" />
                  <input type="hidden" name="sixth_payment_10k" value="' . $sixth_payment_10k . '" />
                  <input type="hidden" name="full_payment_10k" value="' . $full_payment_10k . '" />
                  <input type="hidden" name="loan_status_10k" value="' . $loan_status_10k . '" />
                  <input type="hidden" name="is_new_loan_10k" value="' . $is_new_loan_10k . '" />
                  <input type="hidden" name="is_loan_requested_10k" value="' . $is_loan_requested_10k . '" />
                  <td>' . $fullname_10k . '</td>
                  <td>' . $type_of_loan_10k . '</td>
                  <td>' . $is_pending_10k . '</td>';
        echo <<<BUTTON
                  <td>
                    <a href="adminloanrequest.php?loan_request_10950={$_SESSION['loan_request_id_10k']}&baid10950={$_SESSION['borrower_account_id_10k']}&bid10950={$_SESSION['borrower_id_10k']}&emp_type_10={$_SESSION['type_of_employee_10k']}&bfname_10={$_SESSION['borrower_fname_10k']}&bmname_10={$_SESSION['borrower_mname_10k']}&blname_10={$_SESSION['borrower_lname_10k']}&busername_10={$_SESSION['borrower_username_10k']}" id="approve10k_link">Approve</a>
                    <a href="adminloanrequest.php?decline_request_10950={$_SESSION['loan_request_id_10k']}&baid10950={$_SESSION['borrower_account_id_10k']}&bid10950={$_SESSION['borrower_id_10k']}&emp_type_10={$_SESSION['type_of_employee_10k']}&bfname_10={$_SESSION['borrower_fname_10k']}&bmname_10={$_SESSION['borrower_mname_10k']}&blname_10={$_SESSION['borrower_lname_10k']}&busername_10={$_SESSION['borrower_username_10k']}" id="decline10k_link">Decline</a>

                  </td>
BUTTON;

        echo '</tr>
              </tbody>';
      }
    }
  }

  echo '</table>
    </div>
  </form>';
}

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
  <button type='button' id='search_close' onclick="window.location.href='adminloanrequest.php'">X</button>
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
      echo '<hr style="margin: 5px 0 5px 0; height: 4px; width: ' . $la5kcount_civ . 'vw; border-radius: 5px; background: linear-gradient(118deg, rgba(255,158,30,1) 9%, rgba(222,44,229,1) 90%);">';
      echo '</div>';

      echo '<hr style="background: #ccc;">';

      echo '<div style="display: grid; grid-auto-flow: row;">';
      echo '<div style="display: grid; grid-auto-flow: column; margin: 12px 0 0px 0;">';
      echo '<span span style="font-weight: bold; width: 154px;">Loan 10K count: </span>';
      echo '<p style="margin: 0; width: 300px;">' . $la10kcount_civ . '</p>';
      echo '</div>';
      echo '<hr style="margin: 5px 0 5px 0; height: 4px; width: ' . $la10kcount_civ . 'vw; border-radius: 5px; background: linear-gradient(118deg, rgba(255,158,30,1) 9%, rgba(222,44,229,1) 90%);">';
      echo '</div>';

      echo '<hr style="background: #ccc;">';

      echo '<div style="display: grid; grid-auto-flow: row;">';
      echo '<div style="display: grid; grid-auto-flow: column; margin: 12px 0 0px 0;">';
      echo '<span span style="font-weight: bold; width: 154px;">Fullpayment count: </span>';
      echo '<p style="margin: 0; width: 300px;">' . $fullpayment_count_civ . '</p>';
      echo '</div>';
      echo '<hr style="margin: 5px 0 5px 0; height: 4px; width: ' . $fullpayment_count_civ . 'vw; border-radius: 5px; background: linear-gradient(118deg, rgba(255,158,30,1) 9%, rgba(222,44,229,1) 90%);">';
      echo '</div>';

      echo '<hr style="background: #ccc;">';

      echo '<div style="display: grid; grid-auto-flow: row;">';
      echo '<div style="display: grid; grid-auto-flow: column; margin: 12px 0 0px 0;">';
      echo '<span span style="font-weight: bold; width: 154px;">Downpayment count: </span>';
      echo '<p style="margin: 0; width: 300px;">' . $downpayment_count_civ . '</p>';
      echo '</div>';
      echo '<hr style="margin: 5px 0 5px 0; height: 4px; width: ' . $downpayment_count_civ . 'vw; border-radius: 5px; background: linear-gradient(118deg, rgba(255,158,30,1) 9%, rgba(222,44,229,1) 90%);">';
      echo '</div>';

      echo '<hr style="background: #ccc;">';

      echo '<div style="display: grid; grid-auto-flow: row;">';
      echo '<div style="display: grid; grid-auto-flow: column; margin: 12px 0 0px 0;">';
      echo '<span span style="font-weight: bold; width: 154px;">Penalty count: </span>';
      echo '<p style="margin: 0; width: 300px;">' . $penalty_count_civ . '</p>';
      echo '</div>';
      echo '<hr style="margin: 5px 0 5px 0; height: 4px; width: ' . $penalty_count_civ . 'vw; border-radius: 5px; background: linear-gradient(118deg, rgba(255,158,30,1) 9%, rgba(222,44,229,1) 90%);">';
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
      echo '<hr style="margin: 5px 0 5px 0; height: 4px; width: ' . $la5kcount . 'vw; border-radius: 5px; background: linear-gradient(118deg, rgba(255,158,30,1) 9%, rgba(222,44,229,1) 90%);">';
      echo '</div>';

      echo '<hr style="background: #ccc;">';

      echo '<div style="display: grid; grid-auto-flow: row;">';
      echo '<div style="display: grid; grid-auto-flow: column; margin: 12px 0 0px 0;">';
      echo '<span span style="font-weight: bold; width: 154px;">Loan 10K count: </span>';
      echo '<p style="margin: 0; width: 300px;">' . $la10kcount . '</p>';
      echo '</div>';
      echo '<hr style="margin: 5px 0 5px 0; height: 4px; width: ' . $la10kcount . 'vw; border-radius: 5px; background: linear-gradient(118deg, rgba(255,158,30,1) 9%, rgba(222,44,229,1) 90%);">';
      echo '</div>';

      echo '<hr style="background: #ccc;">';

      echo '<div style="display: grid; grid-auto-flow: row;">';
      echo '<div style="display: grid; grid-auto-flow: column; margin: 12px 0 0px 0;">';
      echo '<span span style="font-weight: bold; width: 154px;">Fullpayment count: </span>';
      echo '<p style="margin: 0; width: 300px;">' . $fullpayment_count . '</p>';
      echo '</div>';
      echo '<hr style="margin: 5px 0 5px 0; height: 4px; width: ' . $fullpayment_count . 'vw; border-radius: 5px; background: linear-gradient(118deg, rgba(255,158,30,1) 9%, rgba(222,44,229,1) 90%);">';
      echo '</div>';

      echo '<hr style="background: #ccc;">';

      echo '<div style="display: grid; grid-auto-flow: row;">';
      echo '<div style="display: grid; grid-auto-flow: column; margin: 12px 0 0px 0;">';
      echo '<span span style="font-weight: bold; width: 154px;">Downpayment count: </span>';
      echo '<p style="margin: 0; width: 300px;">' . $downpayment_count . '</p>';
      echo '</div>';
      echo '<hr style="margin: 5px 0 5px 0; height: 4px; width: ' . $downpayment_count . 'vw; border-radius: 5px; background: linear-gradient(118deg, rgba(255,158,30,1) 9%, rgba(222,44,229,1) 90%);">';
      echo '</div>';

      echo '<hr style="background: #ccc;">';

      echo '<div style="display: grid; grid-auto-flow: row;">';
      echo '<div style="display: grid; grid-auto-flow: column; margin: 12px 0 0px 0;">';
      echo '<span span style="font-weight: bold; width: 154px;">Penalty count: </span>';
      echo '<p style="margin: 0; width: 300px;">' . $penalty_count . '</p>';
      echo '</div>';
      echo '<hr style=" height: 4px; width: ' . $penalty_count . 'vw; border-radius: 5px; background: linear-gradient(118deg, rgba(255,158,30,1) 9%, rgba(222,44,229,1) 90%);">';
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
  <!-- <link rel="stylesheet" href="css/adminloanrequest.css"> -->
  <?php include('css/adminloanrequeststyle.php'); ?>
  <title>Loan Requests</title>
</head>

<script src="src/searchempprofile.js">

</script>

<body>
  <script>
    function openTab(evt, tabName) {
      var i, tabcontent, tablinks;
      tabcontent = document.getElementsByClassName("tabcontent");
      for (i = 0; i < tabcontent.length; i++) {
        tabcontent[i].style.display = "none";
      }
      tablinks = document.getElementsByClassName("tablinks");
      for (i = 0; i < tablinks.length; i++) {
        tablinks[i].className = tablinks[i].className.replace(" active", "");
      }
      document.getElementById(tabName).style.display = "block";
      evt.currentTarget.className += " active";
    }
  </script>

  <header id="loan-navigation-container">
    <nav id="loan-global-navigation">
      <ul>
        <li class="nav-links"><a href="../loanmonitoring/adminOverview.php">Overview</a></li>
        <li class="nav-links"><a href="../loanmonitoring/loanMonitoring.php">Loan Monitoring</a></li>
        <li class="nav-links"><a href="../loanmonitoring/950th-employee.php">Employee</a></li>
        <!-- <li class="nav-links"><a href="../loanmonitoring/general-ledger.php">General Ledger</a></li> -->
        <li class="nav-links"><a type="button" onclick="document.querySelector('.search_box_container').style.display='block'" style="cursor: pointer;">Search</a></li>
        <!-- <li><input type="text" name = "txt_search_employee" id = "txt_search_employee" placeholder = "Search Employee"/></li> -->
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
    <?php
    if (isset($_SESSION['admin_username'])) {
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
            <form action="" method="POST" class="loanrequest-panel">
              <?php
              display_pending_10k_request();
              ?>
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