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

  } else {

  }

} else if(isset($_GET['decline_request']) && isset($_GET['baid']) && isset($_GET['bid'])){
  $loan_request_id_5k = '';
  $borrower_id = '';
  $borrower_account_id = '';
  $borrower_fname = '';
  $borrower_mname = '';
  $borrower_lname = '';
  $borrower_email = '';
  $type_of_employee = '';
  $borrower_rank = '';
  $con = '';

  if(isset($_SESSION['loan_request_id_5k']) && isset($_SESSION['borrower_account_id']) && isset($_SESSION['borrower_id'])){
    // echo "$_GET[decline_request]<br>";
    // echo "$_GET[baid]<br>";
    // echo "$_GET[bid]<br>";

    $con = $db->getConnection();
    $fetchData = $db->fetch_civilian_pending_request($_GET['decline_request'], $_GET['baid'], $_GET['bid']);
    
    while($res = $fetchData->fetch_array(MYSQLI_ASSOC)){
      $loan_request_id_5k = $res['loan_request_id'];
      $borrower_id = $res['borrower_id'];
      $borrower_account_id = $res['account_id'];
      $borrower_fname = $res['borrower_fname'];
      $borrower_mname = $res['borrower_mname'];
      $borrower_lname = $res['borrower_lname'];
      $borrower_email = $res['borrower_email'];
      $type_of_employee = $res['type_of_employee'];
      $borrower_rank = $res['borrower_rank'];

      // echo "$loan_request_id_5k<br>";
      // echo "$borrower_id<br>";
      // echo "$borrower_account_id<br>";
      // echo "$borrower_fname<br>";
      // echo "$borrower_mname<br>";
      // echo "$borrower_lname<br>";
      // echo "$borrower_email<br>";
      // echo "$type_of_employee<br>";
      // echo "$borrower_rank<br>";

      $updateData = $db->update_is_declined_5k($loan_request_id_5k, $borrower_id, $borrower_account_id, $borrower_fname, $borrower_mname, $borrower_lname, $borrower_email, $type_of_employee, $borrower_rank);
      if($updateData){
        $db->update_is_pending_5k($loan_request_id_5k, $borrower_id, $borrower_account_id, $borrower_fname, $borrower_mname, $borrower_lname, $borrower_email, $type_of_employee, $borrower_rank);
        header('location: adminloanrequest.php');
      } else {
        printf("%s\n", $con->error);
      }

    }

  } else {

  }

} else {

}

if(isset($_GET['loan_request_10950']) && isset($_GET['baid10950']) && isset($_GET['bid10950'])){
  echo "$_GET[loan_request_10950]<br>";
  echo "$_GET[baid10950]<br>";
  echo "$_GET[bid10950]<br>";

  $loan_request_id_10k = '';
  $borrower_account_id_10k = '';
  $borrower_id_10k = '';
  $ctrl_no_prefix_10k = '';
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

  if(isset($_SESSION['loan_request_id_10k']) && isset($_SESSION['borrower_account_id_10k']) && isset($_SESSION['borrower_id_10k'])){
    // echo "$_GET[loan_request_10950]<br>";
    // echo "$_GET[baid10950]<br>";
    // echo "$_GET[bid10950]<br>";

    $con = $db->getConnection();
    $fetch_data_10k = $db->fetch_civilian_pending_request_10k($_GET['loan_request_10950'], $_GET['baid10950'], $_GET['bid10950']);

    while($res = $fetch_data_10k->fetch_array(MYSQLI_ASSOC)){
      $loan_request_id_10k = $res['loan_request_id_10k'];
      $borrower_account_id_10k = $res['account_id_10k'];
      $borrower_id_10k = $res['borrower_id_10k'];
      $ctrl_no_prefix_10k = $res['ctrl_no_prefix_10k'];
      $type_of_loan_10k = $res['type_of_loan_10k'];
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
      while($r = $get_data_10k->fetch_array(MYSQLI_ASSOC)){
        $la10k_count = $r['la_10k_count'];
        echo "LA 10K COUNT: $la10k_count<br>";
      }

      $increment_10k = (int)$la10k_count + 1;
      echo $increment_10k;

      $add_new_10kloan = $db->add_new_10k_record($borrower_id_10k, $ctrl_no_prefix_10k, $borrower_fname_10k, $borrower_mname_10k, $borrower_lname_10k, $type_of_employee_10k, $type_of_loan_10k, $loan_amount_10k_rate, $monthly_payment_10k_rate, $credit_10k_rate, $debit_pay_10k, $interest_rate_10k, $balance_rate_10k, $date_today_10k, $comment_10k, $penalty_10k, $borrower_office_10k, $borrower_rank_10k, $first_payment_10k, $second_payment_10k, $third_payment_10k, $fourth_payment_10k, $fifth_payment_10k, $sixth_payment_10k, $full_payment_10k, $loan_status_10k, $is_new_loan_10k, $is_loan_requested_10k);
      if($add_new_10kloan){
        $db->update_is_pending_10k($loan_request_id_10k, $borrower_id_10k, $borrower_account_id_10k, $borrower_fname_10k, $borrower_mname_10k, $borrower_lname_10k, $borrower_email_10k, $type_of_employee_10k, $borrower_rank_10k);
        $db->update_is_granted_10k($loan_request_id_10k, $borrower_id_10k, $borrower_account_id_10k, $borrower_fname_10k, $borrower_mname_10k, $borrower_lname_10k, $borrower_email_10k, $type_of_employee_10k, $borrower_rank_10k);
        if($type_of_employee_10k === 'civilian'){
          $db->update_civilian_la10k_count($borrower_id_10k, $borrower_fname_10k, $borrower_mname_10k, $borrower_lname_10k, $type_of_employee_10k, $increment_10k);
        } else if($type_of_employee_10k === 'officer'){
          $db->update_officer_la10k_count($borrower_id_10k, $borrower_fname_10k, $borrower_mname_10k, $borrower_lname_10k, $type_of_employee_10k, $increment_10k);
        }
        header('location: adminloanrequest.php');

      } else {
        printf("%s\n", $con->error);
      }

    }

  } else {

  }

} else if(isset($_GET['decline_request_10950']) && isset($_GET['baid10950']) && isset($_GET['bid10950'])){
  $loan_request_id_10k = '';
  $borrower_id_10k = '';
  $borrower_account_id_10k = '';
  $borrower_fname_10k = '';
  $borrower_mname_10k = '';
  $borrower_lname_10k = '';
  $borrower_email_10k = '';
  $type_of_employee_10k = '';
  $borrower_rank_10k = '';
  $con = '';

  if(isset($_SESSION['loan_request_id_5k']) && isset($_SESSION['borrower_account_id']) && isset($_SESSION['borrower_id'])){
    echo "$_GET[decline_request_10950]<br>";
    echo "$_GET[baid10950]<br>";
    echo "$_GET[bid10950]<br>";

    $con = $db->getConnection();
    $fetch_data_10k = $db->fetch_civilian_pending_request_10k($_GET['decline_request_10950'], $_GET['baid10950'], $_GET['bid10950']);

    while($res = $fetch_data_10k->fetch_array(MYSQLI_ASSOC)){
      $loan_request_id_10k = $res['loan_request_id_10k'];
      $borrower_id_10k = $res['borrower_id_10k'];
      $borrower_account_id_10k = $res['account_id_10k'];
      $borrower_fname_10k = $res['borrower_fname_10k'];
      $borrower_mname_10k = $res['borrower_mname_10k'];
      $borrower_lname_10k = $res['borrower_lname_10k'];
      $borrower_email_10k = $res['borrower_email_10k'];
      $type_of_employee_10k = $res['type_of_employee_10k'];
      $borrower_rank_10k = $res['borrower_rank_10k'];

      echo "$loan_request_id_10k<br>";
      echo "$borrower_id_10k<br>";
      echo "$borrower_account_id_10k<br>";
      echo "$borrower_fname_10k<br>";
      echo "$borrower_mname_10k<br>";
      echo "$borrower_lname_10k<br>";
      echo "$borrower_email_10k<br>";
      echo "$type_of_employee_10k<br>";
      echo "$borrower_rank_10k<br>";

      $updateData = $db->update_is_declined_10k($loan_request_id_10k, $borrower_id_10k, $borrower_account_id_10k, $borrower_fname_10k, $borrower_mname_10k, $borrower_lname_10k, $borrower_email_10k, $type_of_employee_10k, $borrower_rank_10k);
      if($updateData){
        $db->update_is_pending_10k($loan_request_id_10k, $borrower_id_10k, $borrower_account_id_10k, $borrower_fname_10k, $borrower_mname_10k, $borrower_lname_10k, $borrower_email_10k, $type_of_employee_10k, $borrower_rank_10k);
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
                  <a href="adminloanrequest.php?loan_request={$_SESSION['loan_request_id_5k']}&baid={$_SESSION['borrower_account_id']}&bid={$_SESSION['borrower_id']}" id="approve5k_link">Approve</a>
                  <a href="adminloanrequest.php?decline_request={$_SESSION['loan_request_id_5k']}&baid={$_SESSION['borrower_account_id']}&bid={$_SESSION['borrower_id']}" id="decline5k_link">Decline</a>
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

        while($r = $pending_10k->fetch_array(MYSQLI_ASSOC)){
          if($r > 0){
            $loan_request_id_10k = $r['loan_request_id_10k'];
            $_SESSION['loan_request_id_10k'] = $r['loan_request_id_10k'];
            $borrower_id_10k = $r['borrower_id_10k'];
            $_SESSION['borrower_id_10k'] = $r['borrower_id_10k'];
            $borrower_account_id_10k = $r['account_id_10k'];
            $_SESSION['borrower_account_id_10k'] = $r['account_id_10k'];
            $ctrl_no_prefix_10k = $r['ctrl_no_prefix_10k'];
            $type_of_loan_10k = $r['type_of_loan_10k'];
            $borrower_fname_10k = $r['borrower_fname_10k'];
            $borrower_mname_10k = $r['borrower_mname_10k'];
            $borrower_lname_10k = $r['borrower_lname_10k'];
            $borrower_email_10k = $r['borrower_email_10k'];
            $type_of_employee_10k = $r['type_of_employee_10k'];
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


            if($is_pending_10k === 'Pending'){
              echo '
              <tbody>
                <tr>
                  <input type="hidden" name="loan_request_id_5k" value="'.$loan_request_id_10k.'" />
                  <input type="hidden" name="borrower_account_id_10k" value="'.$borrower_account_id_10k.'" />
                  <input type="hidden" name="borrower_id_10k" value="'.$borrower_id_10k.'" />
                  <input type="hidden" name="ctrl_no_prefix_10k" value="'.$ctrl_no_prefix_10k.'" />
                  <input type="hidden" name="borrower_fname_10k" value="'.$borrower_fname_10k.'" />
                  <input type="hidden" name="borrower_mname_10k" value="'.$borrower_mname_10k.'" />
                  <input type="hidden" name="borrower_lname_10k" value="'.$borrower_lname_10k.'" />
                  <input type="hidden" name="borrower_email_10k" value="'.$borrower_email_10k.'" />
                  <input type="hidden" name="type_of_employee_10k" value="'.$type_of_employee_10k.'" />
                  <input type="hidden" name="type_of_loan_10k" value="'.$type_of_loan_10k.'" />
                  <input type="hidden" name="loan_amount_10k_rate" value="'.$loan_amount_10k_rate.'" />
                  <input type="hidden" name="monthly_payment_10k_rate" value="'.$monthly_payment_10k_rate.'" />
                  <input type="hidden" name="credit_10k_rate" value="'.$credit_10k_rate.'" />
                  <input type="hidden" name="debit_pay_10k" value="'.$debit_pay_10k.'" />
                  <input type="hidden" name="interest_rate_10k" value="'.$interest_rate_10k.'" />
                  <input type="hidden" name="balance_rate_10k" value="'.$balance_rate_10k.'" />
                  <input type="hidden" name="date_today_10k" value="'.$date_today_10k.'" />
                  <input type="hidden" name="comment_10k" value="'.$comment_10k.'" />
                  <input type="hidden" name="penalty_10k" value="'.$penalty_10k.'" />
                  <input type="hidden" name="office_10k" value="'.$borrower_office_10k.'" />
                  <input type="hidden" name="rank_10k" value="'.$borrower_rank_10k.'" />
                  <input type="hidden" name="first_payment_10k" value="'.$first_payment_10k.'" />
                  <input type="hidden" name="second_payment_10k" value="'.$second_payment_10k.'" />
                  <input type="hidden" name="third_payment_10k" value="'.$third_payment_10k.'" />
                  <input type="hidden" name="fourth_payment_10k" value="'.$fourth_payment_10k.'" />
                  <input type="hidden" name="fifth_payment_10k" value="'.$fifth_payment_10k.'" />
                  <input type="hidden" name="sixth_payment_10k" value="'.$sixth_payment_10k.'" />
                  <input type="hidden" name="full_payment_10k" value="'.$full_payment_10k.'" />
                  <input type="hidden" name="loan_status_10k" value="'.$loan_status_10k.'" />
                  <input type="hidden" name="is_new_loan_10k" value="'.$is_new_loan_10k.'" />
                  <input type="hidden" name="is_loan_requested_10k" value="'.$is_loan_requested_10k.'" />
                  <td>'.$fullname_10k.'</td>
                  <td>'.$type_of_loan_10k.'</td>
                  <td>'.$is_pending_10k.'</td>';
                  echo <<<BUTTON
                  <td>
                    <a href="adminloanrequest.php?loan_request_10950={$_SESSION['loan_request_id_10k']}&baid10950={$_SESSION['borrower_account_id_10k']}&bid10950={$_SESSION['borrower_id_10k']}" id="approve10k_link">Approve</a>
                    <a href="adminloanrequest.php?decline_request_10950={$_SESSION['loan_request_id_10k']}&baid10950={$_SESSION['borrower_account_id_10k']}&bid10950={$_SESSION['borrower_id_10k']}" id="decline10k_link">Decline</a>

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