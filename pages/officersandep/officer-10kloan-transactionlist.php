<?php
namespace loan950;
use \loan950\db_access;
include('../../dbaccess/db_access.php');
$db = new db_access();
session_start();

if(!isset($_SESSION['officer_account_id']) && !isset($_SESSION['officer_username'])){
  header('location: officer-ep-login.php');
}

function display_active_10k_loan($loan_id, $borrower_id, $borrower_fname, $borrower_mname, $borrower_lname, $type_of_employee, $borrower_office, $borrower_rank)
{
  $con = new db_access();
  $my_active_loan_10k = $con->view_granted_loan_10k($loan_id, $borrower_id, $borrower_fname, $borrower_mname, $borrower_lname, $type_of_employee, $borrower_office, $borrower_rank);

  while($row = $my_active_loan_10k->fetch_array(MYSQLI_ASSOC)){
    if($row > 0){
      $id = $row['borrower_id'];
      $transaction_number = $row['loan_id_10k'];
      $_SESSION['transaction_number'] = $row['loan_id_10k'];
      $transaction_prefix = $row['ctrl_no_prefix'];
      $fname = $row['fname'];
      $mname = $row['mname'];
      $lname = $row['lname'];
      $type_of_loan_10k = $row['type_of_loan'];
      $status_10k = (($row['loan_status_10k'] == 0) ? 'Active' : 'Fully Paid');
      $fullname_10k = "$fname $mname $lname";
      $control_number_10k = "$transaction_prefix$transaction_number";
  echo '
      <tbody>
        <tr>
          <td>'.$control_number_10k.'</td>
          <td>'.$fullname_10k.'</td>
          <td>'.$status_10k.'</td>';
          echo <<<BUTTON
          <td><a href="officer-10kloan-transactionlist.php?transaction_idla10k={$_SESSION['transaction_number']}">VIEW</a></td>
BUTTON;
        echo '</tr>
      </tbody>';
    
    }

  }

}

function display_pending_10k_request($borrower_id_10k, $borrower_account_id_10k, $type_of_loan_10k, $borrower_username_10k, $borrower_fname_10k, $borrower_mname_10k, $borrower_lname_10k, $type_of_employee_10k, $borrower_office_10k, $borrower_rank_10k)
{
  $con = new db_access();
  $pending_10k = $con->view_pending_loan_10k($borrower_id_10k, $borrower_account_id_10k, $type_of_loan_10k, $borrower_username_10k, $borrower_fname_10k, $borrower_mname_10k, $borrower_lname_10k, $type_of_employee_10k, $borrower_office_10k, $borrower_rank_10k);

  echo '
  <div id="pending_table_10k">
    <table border="1">
      <thead>
        <tr>
          <th>Name</th>
          <th>Type of Account</th>
          <th>Status</th>
        </tr>
      </thead>';

      while($row = $pending_10k->fetch_array(MYSQLI_ASSOC)){
        if($row > 0){
          $id = $row['borrower_id_10k'];
          $fname = $row['borrower_fname_10k'];
          $mname = $row['borrower_mname_10k'];
          $lname = $row['borrower_lname_10k'];
          $type_of_loan_10k = $row['type_of_loan_10k'];
          $status_10k = (($row['is_pending_10k'] == 0) ? '' : 'Pending');
          $fullname = "$fname $mname $lname";

          if($status_10k === 'Pending'){
            echo '
            <tbody>
              <tr>
                <td>'.$fullname.'</td>
                <td>'.$type_of_loan_10k.'</td>
                <td>'.$status_10k.'</td>
              </tr>
            </tbody>';
          } else {
            echo "No Record<br>";
          }

        } else {
          echo "No Record";
        }

      }

    echo '</table>
  </div>';
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!-- <link rel="stylesheet" href="css/oaep5kloanlist.css"> -->
  <link rel="stylesheet" href="css/loanrequest-oaep.css">
  <?php include('css/oaep5kloanlist.php'); ?>
  <title>10K Account Transaction List</title>
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
  
  <header id="oep-header">
    <nav>
      <ul>
        <li>
          <a href="officer-homepage.php" class="oaep-home-link">950th CEISG</a>
        </li>
        <li>
          <input type="button" name="oep-btnaction" id="oep-btnaction" onclick="document.getElementById('oaep_menu_box').style.display='flex'" value="Your Account" />
          <div id="oaep_menu_box">
            <!-- <a href="#">Account Details</a> -->
            <a href="logout_officer.php">Sign Out</a>
          </div>
        </li>
      </ul>
    </nav>
  </header>

  <article onclick="document.getElementById('oaep_menu_box').style.display='none'">
    <section class="oaep-10ktl-container">
      <div class="oaep-10ktl-inner-content">
        <div class="oaep-10ktl-header">
          <div class="oaep-10ktl-title-container">
            <h4>Hello, <?php echo $_SESSION['officer_username']; ?></h4>
            <h3>10k Account Transaction List</h3>
          </div>
          <!-- <div class="oaep-10ktl-requestbutton-container">
            <input type="button" name="btn-request" id="btn-request" onclick="document.getElementById('lrf-container').style.display='block'" value="Request" />
          </div> -->
        </div>
        <hr>
        <div class="oaep10ktl-content">
          <div class="oaep10ktl-notransaction">
            <!-- <h1>No Transactions for 10K Account</h1> -->
            <button class="tablinks" onclick="openTab(event, 'active_loan_10k_tab')">Active Loan</button>
            <button class="tablinks" onclick="openTab(event, 'pending_loan_10k_tab')">Pending Loan</button>
          </div>

          <div id="active_loan_10k_tab" class="tabcontent">
            <div id="active_loan_10k_tablename">
              <h4 class="table_header_title">10K Transaction Table</h4>
            </div>
            <div id="active_loan_10k_table">
              <form action="" method="POST" id="showActiveLoanPanel">
              <?php

            echo '
            <div id="active_table_10k">
              <table border="1">
                <thead>
                  <tr>
                    <th>Control Number</th>
                    <th>Name</th>
                    <th>Status</th>
                    <th>View</th>
                  </tr>
                </thead>';

              $fetchData = $db->get_10k_loan_id($_SESSION['officer_id'], $_SESSION['officer_fName'], $_SESSION['officer_mName'], $_SESSION['officer_lName'], $_SESSION['type_of_employee'], $_SESSION['officer_headquarter'], $_SESSION['officer_rank']);
              while($row = $fetchData->fetch_array(MYSQLI_ASSOC)){
                if($row > 0){
                  $loan_id = $row['loan_id_10k'];
                  if(isset($loan_id) && isset($_SESSION['officer_id']) && isset($_SESSION['officer_fName']) && isset($_SESSION['officer_mName']) && isset($_SESSION['officer_lName']) && isset($_SESSION['type_of_employee']) && isset($_SESSION['officer_headquarter']) && isset($_SESSION['officer_rank'])){
                    display_active_10k_loan($loan_id, $_SESSION['officer_id'], $_SESSION['officer_fName'], $_SESSION['officer_mName'], $_SESSION['officer_lName'], $_SESSION['type_of_employee'], $_SESSION['officer_headquarter'], $_SESSION['officer_rank']);
                  } else {
                    echo "<h2 class='table_header_title' align='center'>No Record</h2>";
                  }
                } else {
                  echo "<h2 class='table_header_title' align='center'>No Record</h2>";
                }
              }

              echo '</table>
              </div>';

              // display_active_10k_loan($loan_id, $_SESSION['ce_id'], $_SESSION['fname'], $_SESSION['mname'], $_SESSION['lname'], $_SESSION['type_of_employee'], $_SESSION['ce_office'], $_SESSION['ce_rank']);
              ?>
              </form>
            </div>
          </div>

          <div id="pending_loan_10k_tab" class="tabcontent">
            <div id="pending_loan_10k_tablename">
              <h4 class="table_header_title">Pending Loan Request Table</h4>
            </div>
            <div id="pending_loan_5k_table">
              <form action="" method="POST" id="showPendingLoanPanel">
                <?php

                //lr10k -> loan request 10k
                $lr10k = $db->fetch_loan_request_10k();
                while($r = $lr10k->fetch_array(MYSQLI_ASSOC)){
                  if($r > 0){
                    $typeOfLoan10K = $r['type_of_loan_10k'];
                    $fname = $r['borrower_fname_10k'];
                    $mname = $r['borrower_mname_10k'];
                    $lname = $r['borrower_lname_10k'];
                    $typeOfEmployee10k = $r['type_of_employee_10k'];
                    $office = $r['borrower_office_10k'];
                    $rank = $r['borrower_rank_10k'];
                    $is_loan_requested_10k = $r['is_loan_requested_10k'];
                    $is_declined = $r['is_declined_10k'];
                  } else {
                    echo "<h2 class='table_header_title' align='center'>No Record</h2>";
                  }
                }

                if(isset($_SESSION['officer_id']) && isset($_SESSION['officer_account_id']) && isset($typeOfLoan10K) && isset($_SESSION['officer_fName']) && isset($_SESSION['officer_mName']) && isset($_SESSION['officer_lName']) && isset($_SESSION['type_of_employee']) && isset($_SESSION['officer_headquarter']) && isset($_SESSION['officer_rank']) && isset($is_loan_requested_10k)){
                  if($is_loan_requested_10k == 1){
                    display_pending_10k_request($_SESSION['officer_id'], $_SESSION['officer_account_id'], $typeOfLoan10K, $_SESSION['officer_username'], $_SESSION['officer_fName'], $_SESSION['officer_mName'], $_SESSION['officer_lName'], $_SESSION['type_of_employee'], $_SESSION['officer_headquarter'], $_SESSION['officer_rank']);
                  } else {
                    echo "<h2 class='table_header_title' align='center'>No Record</h2>";
                  }

                } else {
                  echo "<h2 class='table_header_title' align='center'>No Record</h2>";
                }
                // display_pending_10k_request($_SESSION['ce_id'], $_SESSION['cuid'], $typeOfLoan10K, $_SESSION['fname'], $_SESSION['mname'], $_SESSION['lname'], $_SESSION['type_of_employee'], $_SESSION['ce_office'], $_SESSION['ce_rank'])
                ?>
              </form>
            </div>
          </div>
          
        </div>
      </div>
    </section>
  </article>

  <!--Loan Request Form-->
  <section id="lrf-container">
    <form action="" method="" id="loanRequestForm">
      <div class="lrf-inner-container">
        <div class="lrf-top-container">
          <div class="lrf-header">
            <h3 align="center">Loan Request Form</h3>
            <button type="button" class="btn_lrf_close" onclick="document.getElementById('lrf-container').style.display='none'">
              Close
            </button>
          </div>
          <div class="lrf-type-of-account-box">
            <label for="type_of_account">Choose type of Account:</label>
            <select name="type_of_account">
              <option value="5K">5K Account</option>
              <option value="10K">10K Account</option>
            </select>
          </div>
        </div>
        <hr>
        <div class="lrf-midinputbox">
          <div class="lrf-midinputbox-inner">
            <div class="lrf-bfn-container mid_box_item">
              <label for="lrf-txt-borrowerfname">Firstname</label>
              <input type="text" disabled name="lrf-txt-borrowerfname" id="lrf-txt-borrowerfname" />
            </div>
            <div class="lrf-bmn-container mid_box_item">
              <label for="lrf-txt-borrowermname">Middle name</label>
              <input type="text" disabled name="lrf-txt-borrowermname" id="lrf-txt-borrowermname" />
            </div>
            <div class="lrf-bln-container mid_box_item">
              <label for="lrf-txt-borrowerlname">Last name</label>
              <input type="text" disabled name="lrf-txt-borrowerlname" id="lrf-txt-borrowerlname" />
            </div>
            <div class="lrf-boff-container mid_box_item">
              <label for="lrf-txt-borroweroffice">Office</label>
              <input type="text" disabled name="lrf-txt-borroweroffice" id="lrf-txt-borroweroffice" />
            </div>
          </div>
        </div>
        <hr>
        <div class="lrf-loanrates">
          <div class="lrf-loanrates-inner">
            <p>HUHUGUTIN KAY DATABASE PHP</p>
          </div>
        </div>
        <hr>
        <div class="lrf-btn-action" align='center'>
          <input type="submit" name="lrf_btn_submit" id="lrf_btn_submit" value="Submit" />
          <!-- <input type="button" name="lrf_btn_cancel" id="lrf_btn_cancel" value="Cancel" /> -->
        </div>
      </div>
    </form>
  </section>

  <?php
  if(isset($_GET['transaction_idla10k'])){

    $LoanID10K = '';
    $borrowerID10K = '';
    $ctrlPrefix10K = '';
    $borrowerFname10K = '';
    $borrowerMname10K = '';
    $borrowerLname10K = '';
    $borrowerOffice10K = '';
    $borrowerType10K = '';
    $borrowerRank10K = '';
    $LoanType10K = '';
    $LoanAmountRate10K = '';
    $MonthlyPaymentRate10K = '';
    $currentBalance10K = '';
    $interestRate10K = '';
    $creditRate10K = '';
    $LoanStatus10K = '';
    $is_new_loan_10k = '';
    $borrowerFullname10k = '';

    if($_SESSION['transaction_number']){
      // show panel
      echo '<section id="newpayment_10k_modal">';
      $fetchData = new db_access();
      $display_loan10k_panel = $fetchData->select_new_loan_10k($_GET['transaction_idla10k']);

      while($row = $display_loan10k_panel->fetch_array(MYSQLI_ASSOC)){
        $LoanID10K = $row['loan_id_10k'];
        $borrowerID10K = $row['borrower_id'];
        $ctrlPrefix10K = $row['ctrl_no_prefix'];
        $borrowerFname10K = $row['fname'];
        $borrowerMname10K = $row['mname'];
        $borrowerLname10K = $row['lname'];
        $borrowerOffice10K = $row['office_10k'];
        $borrowerType10K = $row['type_of_employee'];
        $borrowerRank10K = $row['emp_rank_10k'];
        $LoanType10K = $row['type_of_loan'];
        $LoanAmountRate10K = $row['loan_amount_10k_rate'];
        $MonthlyPaymentRate10K = $row['monthly_payment_10k_rate'];
        $currentBalance10K = $row['balance_rate_10k'];
        $interestRate10K = $row['interest_rate_10k'];
        $creditRate10K = $row['credit_10k_rate'];
        $LoanStatus10K = (($row['loan_status_10k'] == 0) ? 'Active' : 'Not Active');
        $is_new_loan_10k = $row['isNewLoan'];

        $borrowerFullname10k = "$borrowerFname10K $borrowerMname10K $borrowerLname10K";
        $control_number_10k = "$ctrlPrefix10K$LoanID10K";
      }

      echo '
      <div class="newpayment_10k_container">
        <div class="newpayment_10k_titlecontainer">
          <h3 align="center">Add New Payment</h3>
        </div>
        <div class="bdb-10k-content">
          <div class="bdb-10k-inner-content">
            <div class="bdb-10k_container">
              <div class="borrowers_detailbox_10k">
                <input type="text" disabled value="'.$borrowerFullname10k.'" />
                <input type="text" disabled value="'.$borrowerOffice10K.'" />
              </div>
            </div>';

            function display_1st_payment($l_id, $typeOfLoanAcount, $b_id, $ctrlPrefix, $b_fname, $b_mname, $b_lname, $b_type, $b_rank){
              $db = new db_access();
    
              // display borrower's first payment
              // 'fp' - first payment
              $display_1st_payment_details = $db->display_1stpayment($l_id, $typeOfLoanAcount, $b_id, $ctrlPrefix, $b_fname, $b_mname, $b_lname, $b_type, $b_rank);
              while($res = $display_1st_payment_details->fetch_array(MYSQLI_ASSOC)){
                $prev_fp_pay = $res['amount_paid'];
                $prev_fp_interest = $res['current_interest'];
                $remarks_fp = $res['remarks'];
                $date_of_payment_fp = $res['date_of_payment'];
                $prev_fp_bal = $res['current_balance'];
    
                if($res > 0){
                  echo '
                  <input type="hidden" name="prev_fp_pay" value="'.$prev_fp_pay.'" />
                  <input type="hidden" name="prev_fp_bal" value="'.$prev_fp_bal.'" />
                  <input type="hidden" name="prev_fp_interest" value="'.$prev_fp_interest.'" />
                  <input type="hidden" name="remarks_fp" value="'.$remarks_fp.'" />
                  <input type="hidden" name="date_of_payment_fp" value="'.$date_of_payment_fp.'" />
                  <td>'.$prev_fp_pay.'</td>
                  <td>'.$prev_fp_interest.'</td>
                  <td>'.$prev_fp_bal.'</td>
                  <td>'.$remarks_fp.'</td>
                  <td>'.$date_of_payment_fp.'</td>
                  ';
                } else {
                  // do nothing...
                }
              }
            }
    
            // display borrower's second payment function
            function display_2nd_payment($l_id, $typeOfLoanAcount, $b_id, $ctrlPrefix, $b_fname, $b_mname, $b_lname, $b_type, $b_rank){
              $db = new db_access();
    
              $diplay_2nd_payment_details = $db->display_2ndpayment($l_id, $typeOfLoanAcount, $b_id, $ctrlPrefix, $b_fname, $b_mname, $b_lname, $b_type, $b_rank);
              while($row = $diplay_2nd_payment_details->fetch_array(MYSQLI_ASSOC)){
                $prev_second_pay = $row['amount_paid'];
                $prev_second_interest = $row['current_interest'];
                $remarks_sp = $row['remarks'];
                $date_of_payment_sp = $row['date_of_payment'];
                $prev_second_bal = $row['current_balance'];
    
                if($row > 0){
                  echo '
                  <input type="hidden" name="prev_second_pay" value="'.$prev_second_pay.'" />
                  <input type="hidden" name="prev_second_bal" value="'.$prev_second_bal.'" />
                  <input type="hidden" name="prev_second_interest" value="'.$prev_second_interest.'" />
                  <input type="hidden" name="remarks_sp" value="'.$remarks_sp.'" />
                  <input type="hidden" name="date_of_payment_sp" value="'.$date_of_payment_sp.'" />
                  <td>'.$prev_second_pay.'</td>
                  <td>'.$prev_second_interest.'</td>
                  <td>'.$prev_second_bal.'</td>
                  <td>'.$remarks_sp.'</td>
                  <td>'.$date_of_payment_sp.'</td>';
                } else {
                  // do nothing...
                }
              }
            }
    
            // display borrower's second payment function
            function display_3rd_payment($l_id, $typeOfLoanAcount, $b_id, $ctrlPrefix, $b_fname, $b_mname, $b_lname, $b_type, $b_rank){
              $db = new db_access();
    
              $diplay_3rd_payment_details = $db->display_3rdpayment($l_id, $typeOfLoanAcount, $b_id, $ctrlPrefix, $b_fname, $b_mname, $b_lname, $b_type, $b_rank);
              while($row = $diplay_3rd_payment_details->fetch_array(MYSQLI_ASSOC)){
                $prev_third_pay = $row['amount_paid'];
                $prev_third_interest = $row['current_interest'];
                $remarks_sp = $row['remarks'];
                $date_of_payment_sp = $row['date_of_payment'];
                $prev_third_bal = $row['current_balance'];
    
                if($row > 0){
                  echo '
                  <input type="hidden" name="prev_third_pay" value="'.$prev_third_pay.'" />
                  <input type="hidden" name="prev_third_bal" value="'.$prev_third_bal.'" />
                  <input type="hidden" name="prev_third_interest" value="'.$prev_third_interest.'" />
                  <input type="hidden" name="remarks_sp" value="'.$remarks_sp.'" />
                  <input type="hidden" name="date_of_payment_sp" value="'.$date_of_payment_sp.'" />
                  <td>'.$prev_third_pay.'</td>
                  <td>'.$prev_third_interest.'</td>
                  <td>'.$prev_third_bal.'</td>
                  <td>'.$remarks_sp.'</td>
                  <td>'.$date_of_payment_sp.'</td>';
                } else {
                  // do nothing...
                }
              }
            }
    
            // display borrower's second payment function
            function display_4th_payment($l_id, $typeOfLoanAcount, $b_id, $ctrlPrefix, $b_fname, $b_mname, $b_lname, $b_type, $b_rank){
              $db = new db_access();
    
              $diplay_4th_payment_details = $db->display_4thpayment($l_id, $typeOfLoanAcount, $b_id, $ctrlPrefix, $b_fname, $b_mname, $b_lname, $b_type, $b_rank);
              while($row = $diplay_4th_payment_details->fetch_array(MYSQLI_ASSOC)){
                $prev_fourth_pay = $row['amount_paid'];
                $prev_fourth_interest = $row['current_interest'];
                $remarks_sp = $row['remarks'];
                $date_of_payment_sp = $row['date_of_payment'];
                $prev_fourth_bal = $row['current_balance'];
    
                if($row > 0){
                  echo '
                  <input type="hidden" name="prev_fourth_pay" value="'.$prev_fourth_pay.'" />
                  <input type="hidden" name="prev_fourth_bal" value="'.$prev_fourth_bal.'" />
                  <input type="hidden" name="prev_fourth_interest" value="'.$prev_fourth_interest.'" />
                  <input type="hidden" name="remarks_sp" value="'.$remarks_sp.'" />
                  <input type="hidden" name="date_of_payment_sp" value="'.$date_of_payment_sp.'" />
                  <td>'.$prev_fourth_pay.'</td>
                  <td>'.$prev_fourth_interest.'</td>
                  <td>'.$prev_fourth_bal.'</td>
                  <td>'.$remarks_sp.'</td>
                  <td>'.$date_of_payment_sp.'</td>';
                } else {
                  // do nothing...
                }
              }
            }
    
            // display borrower's fifth payment function
            function display_5th_payment($l_id, $typeOfLoanAcount, $b_id, $ctrlPrefix, $b_fname, $b_mname, $b_lname, $b_type, $b_rank){
              $db = new db_access();
    
              $diplay_5th_payment_details = $db->display_5thpayment($l_id, $typeOfLoanAcount, $b_id, $ctrlPrefix, $b_fname, $b_mname, $b_lname, $b_type, $b_rank);
              while($row = $diplay_5th_payment_details->fetch_array(MYSQLI_ASSOC)){
                $prev_fifth_pay = $row['amount_paid'];
                $prev_fifth_interest = $row['current_interest'];
                $remarks_sp = $row['remarks'];
                $date_of_payment_sp = $row['date_of_payment'];
                $prev_fifth_bal = $row['current_balance'];
    
                if($row > 0){
                  echo '
                  <input type="hidden" name="prev_fifth_pay" value="'.$prev_fifth_pay.'" />
                  <input type="hidden" name="prev_fifth_bal" value="'.$prev_fifth_bal.'" />
                  <input type="hidden" name="prev_fifth_interest" value="'.$prev_fifth_interest.'" />
                  <input type="hidden" name="remarks_sp" value="'.$remarks_sp.'" />
                  <input type="hidden" name="date_of_payment_sp" value="'.$date_of_payment_sp.'" />
                  <td>'.$prev_fifth_pay.'</td>
                  <td>'.$prev_fifth_interest.'</td>
                  <td>'.$prev_fifth_bal.'</td>
                  <td>'.$remarks_sp.'</td>
                  <td>'.$date_of_payment_sp.'</td>';
                } else {
                  // do nothing...
                }
              }
            }
    
            function display_6th_payment($l_id, $typeOfLoanAcount, $b_id, $ctrlPrefix, $b_fname, $b_mname, $b_lname, $b_type, $b_rank){
              $db = new db_access();
    
              $diplay_6th_payment_details = $db->display_6thpayment($l_id, $typeOfLoanAcount, $b_id, $ctrlPrefix, $b_fname, $b_mname, $b_lname, $b_type, $b_rank);
              while($row = $diplay_6th_payment_details->fetch_array(MYSQLI_ASSOC)){
                $prev_sixth_pay = $row['amount_paid'];
                $prev_sixth_interest = $row['current_interest'];
                $remarks_sp = $row['remarks'];
                $date_of_payment_sp = $row['date_of_payment'];
                $prev_sixth_bal = $row['current_balance'];
    
                if($row > 0){
                  echo '
                  <input type="hidden" name="prev_sixth_pay" value="'.$prev_sixth_pay.'" />
                  <input type="hidden" name="prev_sixth_bal" value="'.$prev_sixth_bal.'" />
                  <input type="hidden" name="prev_sixth_interest" value="'.$prev_sixth_interest.'" />
                  <input type="hidden" name="remarks_sp" value="'.$remarks_sp.'" />
                  <input type="hidden" name="date_of_payment_sp" value="'.$date_of_payment_sp.'" />
                  <td>'.$prev_sixth_pay.'</td>
                  <td>'.$prev_sixth_interest.'</td>
                  <td>'.$prev_sixth_bal.'</td>
                  <td>'.$remarks_sp.'</td>
                  <td>'.$date_of_payment_sp.'</td>';
                } else {
                  // do nothing...
                }
              }
            }
    
            function display_full_payment($l_id, $typeOfLoanAcount, $b_id, $ctrlPrefix, $b_fname, $b_mname, $b_lname, $b_type, $b_rank){
              $db = new db_access();
    
              $diplay_full_payment_details = $db->display_fullpayment($l_id, $typeOfLoanAcount, $b_id, $ctrlPrefix, $b_fname, $b_mname, $b_lname, $b_type, $b_rank);
              while($row = $diplay_full_payment_details->fetch_array(MYSQLI_ASSOC)){
                $prev_full_pay = $row['amount_paid'];
                $prev_full_interest = $row['current_interest'];
                $remarks_sp = $row['remarks'];
                $date_of_payment_sp = $row['date_of_payment'];
                $prev_full_bal = $row['current_balance'];
    
                if($row > 0){
                  echo '
                  <input type="hidden" name="prev_full_pay" value="'.$prev_full_pay.'" />
                  <input type="hidden" name="prev_full_bal" value="'.$prev_full_bal.'" />
                  <input type="hidden" name="prev_full_interest" value="'.$prev_full_interest.'" />
                  <input type="hidden" name="remarks_sp" value="'.$remarks_sp.'" />
                  <input type="hidden" name="date_of_payment_sp" value="'.$date_of_payment_sp.'" />
                  <td>'.$prev_full_pay.'</td>
                  <td>'.$prev_full_interest.'</td>
                  <td>'.$prev_full_bal.'</td>
                  <td>'.$remarks_sp.'</td>
                  <td>'.$date_of_payment_sp.'</td>';
                } else {
                  // do nothing...
                }
              }
            }

            $get_10k_info = new db_access();
            $display_10k_table = $get_10k_info->display_borrower_new_10k_list($LoanID10K, $borrowerID10K, $borrowerFname10K, $borrowerMname10K, $borrowerLname10K, $borrowerType10K, $borrowerRank10K);
            while($data_10k = $display_10k_table->fetch_array(MYSQLI_ASSOC)){
              $la_10k = $data_10k['loan_amount_10k_rate'];
              $mp_10k = $data_10k['monthly_payment_10k_rate'];
              $dp_10k = $data_10k['debit_pay_10k'];
              $int_10k = $data_10k['interest_rate_10k'];
              $com_10k = $data_10k['comment'];
              $dop_10k = $data_10k['date_of_loan'];
              $bal_10k = $data_10k['balance_rate_10k'];
            }

            echo '
        <div id="transaction_box_10kcontainer">
          <table border="1" id="transaction_box_10k">
            <thead>
              <tr>
                <th>Debit</th>
                <th>Interest</th>
                <th>Balance</th>
                <th>Remarks</th>
                <th>Date of Payment</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td>'.$dp_10k.'</td>
                <td>'.$int_10k.'</td>
                <td>'.$bal_10k.'</td>
                <td>'.$com_10k.'</td>
                <td>'.$dop_10k.'</td>
              </tr>';
        echo '<tr>';
        echo display_1st_payment($LoanID10K, $LoanType10K, $borrowerID10K, $ctrlPrefix10K, $borrowerFname10K, $borrowerMname10K, $borrowerLname10K, $borrowerType10K, $borrowerRank10K);
        echo '</tr>';
        echo '<tr>';
        echo display_2nd_payment($LoanID10K, $LoanType10K, $borrowerID10K, $ctrlPrefix10K, $borrowerFname10K, $borrowerMname10K, $borrowerLname10K, $borrowerType10K, $borrowerRank10K);
        echo '</tr>';
        echo '<tr>';
        echo display_3rd_payment($LoanID10K, $LoanType10K, $borrowerID10K, $ctrlPrefix10K, $borrowerFname10K, $borrowerMname10K, $borrowerLname10K, $borrowerType10K, $borrowerRank10K);
        echo '</tr>';
        echo '<tr>';
        echo display_4th_payment($LoanID10K, $LoanType10K, $borrowerID10K, $ctrlPrefix10K, $borrowerFname10K, $borrowerMname10K, $borrowerLname10K, $borrowerType10K, $borrowerRank10K);
        echo '</tr>';
        echo '<tr>';
        echo display_5th_payment($LoanID10K, $LoanType10K, $borrowerID10K, $ctrlPrefix10K, $borrowerFname10K, $borrowerMname10K, $borrowerLname10K, $borrowerType10K, $borrowerRank10K);
        echo '</tr>';
        echo '<tr>';
        echo display_6th_payment($LoanID10K, $LoanType10K, $borrowerID10K, $ctrlPrefix10K, $borrowerFname10K, $borrowerMname10K, $borrowerLname10K, $borrowerType10K, $borrowerRank10K);
        echo '</tr>';
        echo '<tr>';
        echo display_full_payment($LoanID10K, $LoanType10K, $borrowerID10K, $ctrlPrefix10K, $borrowerFname10K, $borrowerMname10K, $borrowerLname10K, $borrowerType10K, $borrowerRank10K);
        echo '</tr>';
      echo '</tbody>
          </table>

          <div class="pb10k_btnaction" align="center">
            <input type="button" name="pb10k_btn_cancel" id="pb10k_btn_cancel" onclick="window.location.href=\'officer-10kloan-transactionlist.php\'" value="Cancel" />
          </div>
        </div>';

          echo '</div>
        </div>
      </div>';

      echo '</section>';

    }

  }
  ?>

</body>
</html>