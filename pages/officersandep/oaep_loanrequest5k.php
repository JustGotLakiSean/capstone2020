<?php
namespace loan950;
use \loan950\db_access;

if(isset($_POST['lrf_btn_submit'])){
  echo "HELLO<br>";
  $lrf_txt_borrowerid = '';
  $lrf_txt_borroweraccoundid = '';
  $formatted_string = '';
  $type_of_account = '';
  $officer_username = '';
  $lrf_txt_borrowerfname = '';
  $lrf_txt_borrowermname = '';
  $lrf_txt_borrowerlname = '';
  $lrf_txt_borroweremail = '';
  $lrf_txt_borrowertype = '';
  $lrf_txt_borroweroffice = '';
  $lrf_txt_borrowerrank = '';
  $loan_amount_rates_5k = '';
  $monthly_payment_rates_5k = '';
  $credit_rates_5k = '';
  $beginning_balance_5k = '';
  $interest_rates_5k = '';
  $penalty_permonth_rates_5k = '';
  $debit_pay_5k = '';
  $loan_status_5k = '';
  $first_payment_5k = '';
  $second_payment_5k = '';
  $third_payment_5k = '';
  $fourth_payment_5k = '';
  $fifth_payment_5k = '';
  $full_payment_5k = '';
  $is_granted = '';
  $is_declined = '';
  $is_pending = '';
  $is_loan_requested_5k = '';
  $is_new_loan_5k = '';
  $comment = '';

  if(isset($_POST['officer_username']) && isset($_POST['lrf-txt-borrowerid']) && isset($_POST['lrf-txt-borroweraccountid']) && isset($_POST['formatted_string']) && isset($_POST['type_of_account']) && isset($_POST['lrf-txt-borrowerfname']) && isset($_POST['lrf-txt-borrowermname']) && isset($_POST['lrf-txt-borrowerlname']) && isset($_POST['lrf-txt-borroweremail']) && isset($_POST['lrf-txt-borrowertype']) && isset($_POST['lrf-txt-borroweroffice']) && isset($_POST['lrf-txt-borrowerrank']) && isset($_POST['loan_amount_rates_5k']) && isset($_POST['monthly_payment_rates_5k']) && isset($_POST['credit_rates_5k']) && isset($_POST['beginning_balance_5k']) && isset($_POST['interest_rates_5k']) && isset($_POST['penalty_permonth_rates_5k']) && isset($_POST['debit_pay_5k']) && isset($_POST['loan_status_5k']) && isset($_POST['first_payment_5k']) && isset($_POST['first_payment_5k']) && isset($_POST['second_payment_5k']) && isset($_POST['third_payment_5k']) && isset($_POST['fourth_payment_5k']) && isset($_POST['fifth_payment_5k']) && isset($_POST['full_payment_5k']) && isset($_POST['is_new_loan_5k'])){
    include('../../dbaccess/db_access.php');
    $db = new db_access();
    $con = $db->getConnection();
    $officer_username = mysqli_real_escape_string($con, $_POST['officer_username']);
    $lrf_txt_borrowerid = mysqli_real_escape_string($con, $_POST['lrf-txt-borrowerid']);
    $lrf_txt_borroweraccoundid = mysqli_real_escape_string($con, $_POST['lrf-txt-borroweraccountid']);
    $formatted_string = mysqli_real_escape_string($con, $_POST['formatted_string']);
    $type_of_account = mysqli_real_escape_string($con, $_POST['type_of_account']);
    $lrf_txt_borrowerfname = mysqli_real_escape_string($con, $_POST['lrf-txt-borrowerfname']);
    $lrf_txt_borrowermname = mysqli_real_escape_string($con, $_POST['lrf-txt-borrowermname']);
    $lrf_txt_borrowerlname = mysqli_real_escape_string($con, $_POST['lrf-txt-borrowerlname']);
    $lrf_txt_borroweremail = mysqli_real_escape_string($con, $_POST['lrf-txt-borroweremail']);
    $lrf_txt_borrowertype = mysqli_real_escape_string($con, $_POST['lrf-txt-borrowertype']);
    $lrf_txt_borroweroffice = mysqli_real_escape_string($con, $_POST['lrf-txt-borroweroffice']);
    $lrf_txt_borrowerrank = mysqli_real_escape_string($con, $_POST['lrf-txt-borrowerrank']);
    $loan_amount_rates_5k = mysqli_real_escape_string($con, $_POST['loan_amount_rates_5k']);
    $monthly_payment_rates_5k = mysqli_real_escape_string($con, $_POST['monthly_payment_rates_5k']);
    $credit_rates_5k = mysqli_real_escape_string($con, $_POST['credit_rates_5k']);
    $beginning_balance_5k = mysqli_real_escape_string($con, $_POST['beginning_balance_5k']);
    $interest_rates_5k = mysqli_real_escape_string($con, $_POST['interest_rates_5k']);
    $penalty_permonth_rates_5k = mysqli_real_escape_string($con, $_POST['penalty_permonth_rates_5k']);
    $debit_pay_5k = mysqli_real_escape_string($con, $_POST['debit_pay_5k']);
    $loan_status_5k = mysqli_real_escape_string($con, $_POST['loan_status_5k']);
    $first_payment_5k = mysqli_real_escape_string($con, $_POST['first_payment_5k']);
    $second_payment_5k = mysqli_real_escape_string($con, $_POST['second_payment_5k']);
    $third_payment_5k = mysqli_real_escape_string($con, $_POST['third_payment_5k']);
    $fourth_payment_5k = mysqli_real_escape_string($con, $_POST['fourth_payment_5k']);
    $fifth_payment_5k = mysqli_real_escape_string($con, $_POST['fifth_payment_5k']);
    $full_payment_5k = mysqli_real_escape_string($con, $_POST['full_payment_5k']);
    $is_new_loan_5k = mysqli_real_escape_string($con, $_POST['is_new_loan_5k']);
    $is_loan_requested_5k = 1;
    $is_granted = 0;
    $is_declined = 0;
    $is_pending = 1;
    $comment = "New 5K Loan for $lrf_txt_borrowerfname $lrf_txt_borrowermname $lrf_txt_borrowerlname";
    $req_message = "$lrf_txt_borrowerfname $lrf_txt_borrowerlname has requested a 5K loan.";
    echo "$lrf_txt_borrowerid<br>";
    echo "$lrf_txt_borroweraccoundid<br>";
    echo "$formatted_string<br>";
    echo "$type_of_account<br>";
    echo "$officer_username<br>";
    echo "$lrf_txt_borrowerfname<br>";
    echo "$lrf_txt_borrowermname<br>";
    echo "$lrf_txt_borrowerlname<br>";
    echo "$lrf_txt_borroweremail<br>";
    echo "$lrf_txt_borrowertype<br>";
    echo "$lrf_txt_borroweroffice<br>";
    echo "$lrf_txt_borrowerrank<br>";
    echo "$loan_amount_rates_5k<br>";
    echo "$monthly_payment_rates_5k<br>";
    echo "$credit_rates_5k<br>";
    echo "$beginning_balance_5k<br>";
    echo "$interest_rates_5k<br>";
    echo "$penalty_permonth_rates_5k<br>";
    echo "$debit_pay_5k<br>";
    echo "$loan_status_5k<br>";
    echo "$first_payment_5k<br>";
    echo "$second_payment_5k<br>";
    echo "$third_payment_5k<br>";
    echo "$fourth_payment_5k<br>";
    echo "$fifth_payment_5k<br>";
    echo "$full_payment_5k<br>";
    echo "$is_loan_requested_5k<br>";
    echo "$comment<br>";

    echo "$is_granted<br>";
    echo "$is_declined<br>";
    echo "$is_pending<br>";
    echo "$is_new_loan_5k<br>";

    $me = array('rmessage' => $req_message);

    $insert_request = $db->add_loan_request_5k($lrf_txt_borrowerid, $lrf_txt_borroweraccoundid, $formatted_string, $type_of_account, $officer_username, $lrf_txt_borrowerfname, $lrf_txt_borrowermname, $lrf_txt_borrowerlname, $lrf_txt_borroweremail, $lrf_txt_borrowertype, $lrf_txt_borroweroffice, $lrf_txt_borrowerrank, $loan_amount_rates_5k, $monthly_payment_rates_5k, $credit_rates_5k, $debit_pay_5k, $interest_rates_5k, $beginning_balance_5k, $comment, $penalty_permonth_rates_5k, $first_payment_5k, $second_payment_5k, $third_payment_5k, $fourth_payment_5k, $fifth_payment_5k, $full_payment_5k, $loan_status_5k, $is_new_loan_5k, $is_granted, $is_declined, $is_pending, $is_loan_requested_5k);
    if($insert_request){
      $has_read = 0;
      $is_displayed = 1;
      $send_message = $db->send_notif_to_admin($lrf_txt_borrowerfname, $lrf_txt_borrowermname, $lrf_txt_borrowerlname, $lrf_txt_borrowertype, "$lrf_txt_borrowerfname $lrf_txt_borrowerlname is requesting a 5K loan", $has_read, $is_displayed);
      if($send_message){
        // echo mysqli_num_rows($insert_request);
        session_start();
        $_SESSION['success'] = '<script>
        alert("Loan request success");
        </script>';
        // $_SESSION['req'] = '<div>
        // <p>REQUREST LOAN</p>
        // </div>';
        header('location: officer-homepage.php');
      } else {
        printf("%s\n", $con->error);
      }
      
    } else {
      printf("%s\n", $con->error);
    }

  } else {

  }

} else if(isset($_POST['lrf_btn_submit_10k'])){
  echo "NO<br>";
  $lrf_txt_borrowerid_10k = '';
  $lrf_txt_borroweraccoundid_10k = '';
  $formatted_string_10k = '';
  $type_of_account_10k = '';
  $borrower_username_10k = '';
  $lrf_txt_borrowerfname_10k = '';
  $lrf_txt_borrowermname_10k = '';
  $lrf_txt_borrowerlname_10k = '';
  $lrf_txt_borroweremail_10k = '';
  $lrf_txt_borrowertype_10k = '';
  $lrf_txt_borroweroffice_10k = '';
  $lrf_txt_borrowerrank_10k = '';
  $loan_amount_rates_10k = '';
  $monthly_payment_rates_10k = '';
  $credit_rates_10k = '';
  $beginning_balance_10k = '';
  $interest_rates_10k = '';
  $penalty_permonth_rates_10k = '';
  $debit_pay_10k = '';
  $loan_status_10k = '';
  $first_payment_10k = '';
  $second_payment_10k = '';
  $third_payment_10k = '';
  $fourth_payment_10k = '';
  $fifth_payment_10k = '';
  $sixth_payment_10k = '';
  $full_payment_10k = '';
  $is_granted_10k = '';
  $is_declined_10k = '';
  $is_pending_10k = '';
  $is_loan_requested_10k = '';
  $is_new_loan_10k = '';
  $comment_10k = '';

  if(isset($_POST['officer_username_10k']) && isset($_POST['lrf-txt-borrowerid_10k']) && isset($_POST['lrf-txt-borroweraccoundid_10k']) && isset($_POST['formatted_string_10k']) && isset($_POST['type_of_account_10k']) && isset($_POST['lrf-txt-borrowerfname_10k']) && isset($_POST['lrf-txt-borrowermname_10k']) && isset($_POST['lrf-txt-borrowerlname_10k']) && isset($_POST['lrf-txt-borroweremail_10k']) && isset($_POST['lrf-txt-borrowertype_10k']) && isset($_POST['lrf-txt-borroweroffice_10k']) && isset($_POST['lrf-txt-borrowerrank_10k']) && isset($_POST['loan_amount_rates_10k']) && isset($_POST['monthly_payment_rates_10k']) && isset($_POST['credit_rates_10k']) && isset($_POST['beginning_balance_10k']) && isset($_POST['interest_rates_10k']) && isset($_POST['penalty_permonth_rates_10k']) && isset($_POST['debit_pay_10k']) && isset($_POST['loan_status_10k']) && isset($_POST['first_payment_10k']) && isset($_POST['second_payment_10k']) && isset($_POST['third_payment_10k']) && isset($_POST['fourth_payment_10k']) && isset($_POST['fifth_payment_10k']) && isset($_POST['sixth_payment_10k']) && isset($_POST['full_payment_10k']) && isset($_POST['is_new_loan_10k'])){
    echo "HI BIRTH<br>";
    include('../../dbaccess/db_access.php');
    $db = new db_access();
    $con = $db->getConnection();
    $borrower_username_10k = mysqli_real_escape_string($con, $_POST['officer_username_10k']);
    $lrf_txt_borrowerid_10k = mysqli_real_escape_string($con, $_POST['lrf-txt-borrowerid_10k']);
    $lrf_txt_borroweraccoundid_10k = mysqli_real_escape_string($con, $_POST['lrf-txt-borroweraccoundid_10k']);
    $formatted_string_10k = mysqli_real_escape_string($con, $_POST['formatted_string_10k']);
    $type_of_account_10k = mysqli_real_escape_string($con, $_POST['type_of_account_10k']);
    $lrf_txt_borrowerfname_10k = mysqli_real_escape_string($con, $_POST['lrf-txt-borrowerfname_10k']);
    $lrf_txt_borrowermname_10k = mysqli_real_escape_string($con, $_POST['lrf-txt-borrowermname_10k']);
    $lrf_txt_borrowerlname_10k = mysqli_real_escape_string($con, $_POST['lrf-txt-borrowerlname_10k']);
    $lrf_txt_borroweremail_10k = mysqli_real_escape_string($con, $_POST['lrf-txt-borroweremail_10k']);
    $lrf_txt_borrowertype_10k = mysqli_real_escape_string($con, $_POST['lrf-txt-borrowertype_10k']);
    $lrf_txt_borroweroffice_10k = mysqli_real_escape_string($con, $_POST['lrf-txt-borroweroffice_10k']);
    $lrf_txt_borrowerrank_10k = mysqli_real_escape_string($con, $_POST['lrf-txt-borrowerrank_10k']);
    $loan_amount_rates_10k = mysqli_real_escape_string($con, $_POST['loan_amount_rates_10k']);
    $monthly_payment_rates_10k = mysqli_real_escape_string($con, $_POST['monthly_payment_rates_10k']);
    $credit_rates_10k = mysqli_real_escape_string($con, $_POST['credit_rates_10k']);
    $beginning_balance_10k = mysqli_real_escape_string($con, $_POST['beginning_balance_10k']);
    $interest_rates_10k = mysqli_real_escape_string($con, $_POST['interest_rates_10k']);
    $penalty_permonth_rates_10k = mysqli_real_escape_string($con, $_POST['penalty_permonth_rates_10k']);
    $debit_pay_10k = mysqli_real_escape_string($con, $_POST['debit_pay_10k']);
    $loan_status_10k = mysqli_real_escape_string($con, $_POST['loan_status_10k']);
    $first_payment_10k = mysqli_real_escape_string($con, $_POST['first_payment_10k']);
    $second_payment_10k = mysqli_real_escape_string($con, $_POST['second_payment_10k']);
    $third_payment_10k = mysqli_real_escape_string($con, $_POST['third_payment_10k']);
    $fourth_payment_10k = mysqli_real_escape_string($con, $_POST['fourth_payment_10k']);
    $fifth_payment_10k = mysqli_real_escape_string($con, $_POST['fifth_payment_10k']);
    $sixth_payment_10k = mysqli_real_escape_string($con, $_POST['sixth_payment_10k']);
    $full_payment_10k = mysqli_real_escape_string($con, $_POST['full_payment_10k']);
    $is_new_loan_10k = mysqli_real_escape_string($con, $_POST['is_new_loan_10k']);
    $is_loan_requested_10k = 1;
    $is_granted_10k = 0;
    $is_declined_10k = 0;
    $is_pending_10k = 1;
    $comment_10k = "New 10K Loan for $lrf_txt_borrowerfname_10k $lrf_txt_borrowermname_10k $lrf_txt_borrowerlname_10k";

    echo "$lrf_txt_borrowerid_10k<br>";
    echo "$lrf_txt_borroweraccoundid_10k<br>";
    echo "$formatted_string_10k<br>";
    echo "$type_of_account_10k<br>";
    echo "$borrower_username_10k<br>";
    echo "$lrf_txt_borrowerfname_10k<br>";
    echo "$lrf_txt_borrowermname_10k<br>";
    echo "$lrf_txt_borrowerlname_10k<br>";
    echo "$lrf_txt_borroweremail_10k<br>";
    echo "$lrf_txt_borrowertype_10k<br>";
    echo "$lrf_txt_borroweroffice_10k<br>";
    echo "$lrf_txt_borrowerrank_10k<br>";
    echo "$loan_amount_rates_10k<br>";
    echo "$monthly_payment_rates_10k<br>";
    echo "$credit_rates_10k<br>";
    echo "$beginning_balance_10k<br>";
    echo "$interest_rates_10k<br>";
    echo "$penalty_permonth_rates_10k<br>";
    echo "$debit_pay_10k<br>";
    echo "$loan_status_10k<br>";
    echo "$first_payment_10k<br>";
    echo "$second_payment_10k<br>";
    echo "$third_payment_10k<br>";
    echo "$fourth_payment_10k<br>";
    echo "$fifth_payment_10k<br>";
    echo "$sixth_payment_10k<br>";
    echo "$full_payment_10k<br>";
    echo "$is_granted_10k<br>";
    echo "$is_declined_10k<br>";
    echo "$is_pending_10k<br>";
    echo "$is_loan_requested_10k<br>";
    echo "$is_new_loan_10k<br>";
    echo "$comment_10k<br>";

    echo "$is_granted_10k<br>";
    echo "$is_declined_10k<br>";
    echo "$is_pending_10k<br>";
    echo "$is_new_loan_10k<br>";

    $insert_request_10k = $db->add_loan_request_10k($lrf_txt_borrowerid_10k, $lrf_txt_borroweraccoundid_10k, $formatted_string_10k, $type_of_account_10k, $borrower_username_10k, $lrf_txt_borrowerfname_10k, $lrf_txt_borrowermname_10k, $lrf_txt_borrowerlname_10k, $lrf_txt_borroweremail_10k, $lrf_txt_borrowertype_10k, $lrf_txt_borroweroffice_10k, $lrf_txt_borrowerrank_10k, $loan_amount_rates_10k, $monthly_payment_rates_10k, $credit_rates_10k, $debit_pay_10k, $interest_rates_10k, $beginning_balance_10k, $comment_10k, $penalty_permonth_rates_10k, $first_payment_10k, $second_payment_10k, $third_payment_10k, $fourth_payment_10k, $fifth_payment_10k, $sixth_payment_10k, $full_payment_10k, $loan_status_10k, $is_new_loan_10k, $is_granted_10k, $is_declined_10k, $is_pending_10k, $is_loan_requested_10k);
    if($insert_request_10k){
      session_start();
      $_SESSION['success'] = '<script>
      alert("Loan request success");
      </script>';
      header('location: officer-homepage.php');
    } else {
      printf("%s\n", $con->error);
    }

  } else {

  }

}
?>