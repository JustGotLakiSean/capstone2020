<?php
namespace loan950;
use \loan950\db_access;
include('../../dbaccess/db_access.php');
$db = new db_access();
session_start();

if(!isset($_SESSION['cuid']) && !isset($_SESSION['cuname'])){
  header('location: civilian-login.php');
}

function display_active_5k_loan($loan_id, $borrower_id, $borrower_fname, $borrower_mname, $borrower_lname, $type_of_employee, $borrower_office, $borrower_rank){
  $con = new db_access();
  $my_active_loan = $con->view_granted_loan_5k($loan_id, $borrower_id, $borrower_fname, $borrower_mname, $borrower_lname, $type_of_employee, $borrower_office, $borrower_rank);

  // echo '
  // <div id="active_table_5k">
  //   <table border="1">
  //     <thead>
  //       <tr>
  //         <th>Control Number</th>
  //         <th>Name</th>
  //         <th>Status</th>
  //         <th>View</th>
  //       </tr>
  //     </thead>';

      while($row = $my_active_loan->fetch_array(MYSQLI_ASSOC)){
        if($row > 0){
          $id = $row['borrower_id'];
          $transaction_number = $row['loan_id_5k'];
          $_SESSION['transaction_id'] = $row['loan_id_5k'];
          $transaction_prefix = $row['ctrl_no_prefix'];
          $fname = $row['fname'];
          $mname = $row['mname'];
          $lname = $row['lname'];
          $type_of_loan = $row['type_of_loan'];
          $status = (($row['loan_status'] == 0) ? 'Active' : 'Not Active');
          $fullname = "$fname $mname $lname";
          $control_number_5k = "$transaction_prefix$transaction_number";

          echo '
          <tbody>
            <tr>
              <td>'.$control_number_5k.'</td>
              <td>'.$fullname.'</td>
              <td>'.$status.'</td>';
              echo <<<BUT
              <td><a href="civilian-5kloan-transactionlist.php?transaction_idal5k={$_SESSION['transaction_id']}">VIEW</a></td>
BUT;
            echo '</tr>
          </tbody>';
        }

      }

  //   echo '</table>
  // </div>';

}

function display_pending_5k_request($borrower_id, $borrower_account_id, $type_of_loan, $borrower_username, $borrower_fname, $borrower_mname, $borrower_lname, $type_of_employee, $borrower_office, $borrower_rank){
  $con = new db_access();
  $pending_5k = $con->view_pending_loan_5k($borrower_id, $borrower_account_id, $type_of_loan, $borrower_username, $borrower_fname, $borrower_mname, $borrower_lname, $type_of_employee, $borrower_office, $borrower_rank);

  echo '
  <div id="pending_table_5k">
    <table border="1">
      <thead>
        <tr>
          <th>Name</th>
          <th>Type of Account</th>
          <th>Status</th>
        </tr>
      </thead>';

      while($row = $pending_5k->fetch_array(MYSQLI_ASSOC)){
        if($row > 0){
          $id = $row['borrower_id'];
          $fname = $row['borrower_fname'];
          $mname = $row['borrower_mname'];
          $lname = $row['borrower_lname'];
          $type_of_loan_account = $row['type_of_loan'];
          $status = (($row['is_pending'] == 0) ? '' : 'Pending');
          $fullname = "$fname $mname $lname";

          if($status === 'Pending'){
            echo '
            <tbody>
              <tr>
                <td>'.$fullname.'</td>
                <td>'.$type_of_loan_account.'</td>
                <td>'.$status.'</td>
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
  <!-- <link rel="stylesheet" href=""> -->
  <link rel="stylesheet" href="css/loanrequest-civ.css ">
  <?php include('css/ce5ktransactionlist.php'); ?>
  <title>5K Account Transaction List</title>
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

  <header id="cl-header">
    <nav>
      <ul>
        <li>
          <a href="civilian-homepage.php" class="ce-home-link">950th CEISG</a>
        </li>
        <li>
          <input type="button" name="cl-btnaction" id="cl-btnaction" onclick="document.getElementById('ce_menu_box').style.display='flex'" value="Your Account" />
          <div id="ce_menu_box">
            <!-- <a href="#">Account Details</a> -->
            <a href="logout_civ.php">Sign Out</a>
          </div>
        </li>
      </ul>
    </nav>
  </header>

  <article>
    <section class="ce-5ktl-container">
      <div class="ce-5ktl-inner-content">
        <div class="ce-5ktl-header">
          <div class="ce-5ktl-title-container">
            <h4>Hello, <?php echo $_SESSION['cuname']; ?></h4>
            <h3>5K Account Transaction List</h3>
          </div>
        </div>
        <hr>
        <div class="ce5ktl-content">
          <div class="ce5ktl-notransaction">
            <button class = "tablinks" onclick="openTab(event, 'active_loan_5k_tab')">Active Loan</button>
            <button class= "tablinks" onclick="openTab(event, 'pending_loan_5k_tab')">Pending Loan</button>
          </div>

          <div id = "active_loan_5k_tab" class="tabcontent">
            <div id="active_loan_5k_tablename">
              <h4 class="table_header_title">5k Transaction Table</h4>
            </div>
            <div id="active_loan_5k_table">
              <form action ="" method="POST" id="showActiveLoanPanel">
                <?php

            echo '
            <div id="active_table_5k">
              <table border="1">
                <thead>
                  <tr>
                    <th>Control Number</th>
                    <th>Name</th>
                    <th>Status</th>
                    <th>View</th>
                  </tr>
                </thead>';

                $fetchData = $db->get_5k_loan_id($_SESSION['ce_id'], $_SESSION['fname'], $_SESSION['mname'], $_SESSION['lname'], $_SESSION['type_of_employee'], $_SESSION['ce_office'], $_SESSION['ce_rank']);
                while($row = $fetchData->fetch_array(MYSQLI_ASSOC)){
                  if($row > 0){
                    $loan_id = $row['loan_id_5k'];
                    if(isset($loan_id) && isset($_SESSION['ce_id']) && isset($_SESSION['fname']) && isset($_SESSION['mname']) && isset($_SESSION['lname']) && isset($_SESSION['type_of_employee']) && isset($_SESSION['ce_office']) && isset($_SESSION['ce_rank'])){
                      display_active_5k_loan($loan_id, $_SESSION['ce_id'], $_SESSION['fname'], $_SESSION['mname'], $_SESSION['lname'], $_SESSION['type_of_employee'], $_SESSION['ce_office'], $_SESSION['ce_rank']);
                    } else {
                      echo "<h2 class='table_header_title' align='center'>No Record</h2>";
                    }
                  } else {
                    echo "<h2 class='table_header_title' align='center'>No Record</h2>";
                  }

                }
              echo '</table>
              </div>';

                // display_active_5k_loan($loan_id, $_SESSION['ce_id'], $_SESSION['fname'], $_SESSION['mname'], $_SESSION['lname'], $_SESSION['type_of_employee'], $_SESSION['ce_office'], $_SESSION['ce_rank']);
                ?>
              </form>
            </div>
          </div>

          <div id="pending_loan_5k_tab" class="tabcontent">
            <div id="pending_loan_5k_tablename">
              <h4 class="table_header_title">Pending Loan Request Table</h4>
            </div>
            <div id="pending_loan_5k_table">
              <form action="" method="POST" id="showPendingLoanPanel">
                <?php
                // lr5k -> loan request 5k
                $lr5k = $db->fetch_loan_request_5k();
                while($r = $lr5k->fetch_array(MYSQLI_ASSOC)){
                  $typeOfLoan = $r['type_of_loan'];
                  $fname = $r['borrower_fname'];
                  $mname = $r['borrower_mname'];
                  $lname = $r['borrower_lname'];
                  $typeOfEmployee = $r['type_of_employee'];
                  $office = $r['borrower_office'];
                  $rank = $r['borrower_rank'];
                  $is_loan_requested_5k = $r['is_loan_requested_5k'];
                  $is_declined = $r['is_declined'];
                }

                if(isset($_SESSION['ce_id']) && isset($_SESSION['cuid']) && isset($typeOfLoan) && isset($_SESSION['fname']) && isset($_SESSION['mname']) && isset($_SESSION['lname']) && isset($_SESSION['type_of_employee']) && isset($_SESSION['ce_office']) && isset($_SESSION['ce_rank']) && isset($is_loan_requested_5k)){
                  if($is_loan_requested_5k == 1){
                    display_pending_5k_request($_SESSION['ce_id'], $_SESSION['cuid'], $typeOfLoan, $_SESSION['cuname'], $_SESSION['fname'], $_SESSION['mname'], $_SESSION['lname'], $_SESSION['type_of_employee'], $_SESSION['ce_office'], $_SESSION['ce_rank']);
                  } else {
                    echo "<h2 class='table_header_title' align='center'>No Record</h2>";
                  }

                } else {
                  echo "<h2 class='table_header_title' align='center'>No Record</h2>";
                }
                ?>
              </form>
            </div>
          </div>
        </div>
      </div>
    </section>
  </article>

  <?php
  if(isset($_GET['transaction_idal5k'])){
    $LoanID5k = '';
    $borrowerID5k = '';
    $ctrlPrefix5k = '';
    $borrowerFname5k = '';
    $borrowerMname5k = '';
    $borrowerLname5k = '';
    $borrowerOffice5k = '';
    $borrowerType5k = '';
    $borrowerRank5k = '';
    $LoanType5k = '';
    $LoanAmountRate5k = '';
    $MonthlyPaymentRate5k = '';
    $currentBalance5k = '';
    $interestRate5k = '';
    $creditRate5k = '';
    $LoanStatus5k = '';
    $is_new_loan = '';

    if(isset($_SESSION['transaction_id'])){
      //show panel
      echo '<section id="newpayment_5k_modal">';
      $fetchData = new db_access();
      $display_loan5k_panel = $fetchData->select_new_loan_5k($_GET['transaction_idal5k']);

      while($row = $display_loan5k_panel->fetch_array(MYSQLI_ASSOC)){
        $LoanID5K = $row['loan_id_5k'];
        $borrowerID5K = $row['borrower_id'];
        $ctrlPrefix5k = $row['ctrl_no_prefix'];
        $borrowerFname5k = $row['fname'];
        $borrowerMname5k = $row['mname'];
        $borrowerLname5k = $row['lname'];
        $borrowerOffice5k = $row['office'];
        $borrowerType5k = $row['type_of_employee'];
        $borrowerRank5k = $row['emp_rank'];
        $LoanType5k = $row['type_of_loan'];
        $LoanAmountRate5k = $row['loan_amount_5k_rate'];
        $MonthlyPaymentRate5k = $row['monthly_payment_5k_rate'];
        $currentBalance5k = $row['balance_rate_5k'];
        $interestRate5k = $row['interest_rate_5k'];
        $creditRate5k = $row['credit_5k_rate'];
        $LoanStatus5k = (($row['loan_status'] == 0) ? 'Active' : 'Not Active');
        $is_new_loan = $row['isNewLoan'];

        $borrowerFullname5k = "$borrowerFname5k $borrowerMname5k $borrowerLname5k";
        $control_number5k = "$ctrlPrefix5k$LoanID5K";

        echo '
        <div id="newpayment_5k_container">
          <div class="newpayment_5k_titlecontainer">
            <h3 id="new_payment_title_5k"align="center">Loan Record</h3>
          </div>
          <div class="bdb-content">
            <div class="bdb-inner-content">
              <div class="bdb_container">
                <div class="borrowers_detailbox">
                  <input type="text" name="b_fullname" disabled id="b_fullname" value="'.$borrowerFullname5k.'"/>
                  <input type="text" disabled value="'.$borrowerOffice5k.'" />
                </div>
              </div>';

              function display_1st_payment($l_id, $typeOfLoanAcount, $b_id, $ctrlPrefix, $b_fname, $b_mname, $b_lname, $b_type, $b_rank)
              {

                $getDB = new db_access();

                $display_1st_payment_details = $getDB->display_1stpayment($l_id, $typeOfLoanAcount, $b_id, $ctrlPrefix, $b_fname, $b_mname, $b_lname, $b_type, $b_rank);
                while($res = $display_1st_payment_details->fetch_array(MYSQLI_ASSOC)){
                  $amount_paid_fp = $res['amount_paid'];
                  $current_interest_fp = $res['current_interest'];
                  $remarks_fp = $res['remarks'];
                  $date_of_payment_fp = $res['date_of_payment'];
                  $new_balance_fp = $res['current_balance'];

                  if($res > 0){
                    echo '
                    <input type="hidden" name="amount_paid_fp" value="'.$amount_paid_fp.'" />
                    <input type="hidden" name="new_balance_fp" value="'.$new_balance_fp.'" />
                    <input type="hidden" name="current_interest_fp" value="'.$current_interest_fp.'" />
                    <input type="hidden" name="remarks_fp" value="'.$remarks_fp.'" />
                    <input type="hidden" name="date_of_payment_fp" value="'.$date_of_payment_fp.'" />
                    <td>'.$amount_paid_fp.'</td>
                    <td>'.$current_interest_fp.'</td>
                    <td>'.$new_balance_fp.'</td>
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
              $amount_paid_sp = $row['amount_paid'];
              $current_interest_sp = $row['current_interest'];
              $remarks_sp = $row['remarks'];
              $date_of_payment_sp = $row['date_of_payment'];
              $new_balance_sp = $row['current_balance'];

              if($row > 0){
                echo '
                <input type="hidden" name="amount_paid_sp" value="'.$amount_paid_sp.'" />
                <input type="hidden" name="new_balance_sp" value="'.$new_balance_sp.'" />
                <input type="hidden" name="current_interest_sp" value="'.$current_interest_sp.'" />
                <input type="hidden" name="remarks_sp" value="'.$remarks_sp.'" />
                <input type="hidden" name="date_of_payment_sp" value="'.$date_of_payment_sp.'" />
                <td>'.$amount_paid_sp.'</td>
                <td>'.$current_interest_sp.'</td>
                <td>'.$new_balance_sp.'</td>
                <td>'.$remarks_sp.'</td>
                <td>'.$date_of_payment_sp.'</td>';
              } else {
                // do nothing...
              }
            }
          }

          function display_fullpayment($l_id, $typeOfLoanAcount, $b_id, $ctrlPrefix, $b_fname, $b_mname, $b_lname, $b_type, $b_rank)
          {
            $db = new db_access();

            $display_fullpayment_details = $db->display_fullpayment($l_id, $typeOfLoanAcount, $b_id, $ctrlPrefix, $b_fname, $b_mname, $b_lname, $b_type, $b_rank);
            while($row = $display_fullpayment_details->fetch_array(MYSQLI_ASSOC)){
              $amount_paid_full_5k = $row['amount_paid'];
              $current_interest_full_5k = $row['current_interest'];
              $remarks_full_5k = $row['remarks'];
              $date_of_payment_full_5k = $row['date_of_payment'];
              $new_balance_full_5k = $row['current_balance'];

              if($row > 0){
                echo '<input type="hidden" name="amount_paid_full_5k" value="'.$amount_paid_full_5k.'" />
                <input type="hidden" name="new_balance_full_5k" value="'.$new_balance_full_5k.'" />
                <input type="hidden" name="current_interest_full_5k" value="'.$current_interest_full_5k.'" />
                <input type="hidden" name="remarks_full_5k" value="'.$remarks_full_5k.'" />
                <input type="hidden" name="date_of_payment_full_5k" value="'.$date_of_payment_full_5k.'" />
                <td>'.$amount_paid_full_5k.'</td>
                <td>'.$current_interest_full_5k.'</td>
                <td>'.$new_balance_full_5k.'</td>
                <td>'.$remarks_full_5k.'</td>
                <td>'.$date_of_payment_full_5k.'</td> ';
              } else {
                // do nothing...
              }
            }
          }

          $get_5k_info = new db_access();
          $display_5k_table = $get_5k_info->display_borrower_new_5k_list($LoanID5K, $borrowerID5K, $borrowerFname5k, $borrowerMname5k, $borrowerLname5k, $borrowerType5k, $borrowerRank5k);
          while($data = $display_5k_table->fetch_array(MYSQLI_ASSOC)){
            $la_5k = $data['loan_amount_5k_rate'];
            $mp_5k = $data['monthly_payment_5k_rate'];
            $dp_5k = $data['debit_pay_5k'];
            $int_5k = $data['interest_rate_5k'];
            $com_5k = $data['comment'];
            $dop_5k = $data['date_of_loan'];
            $bal_5k = $data['balance_rate_5k'];
          }
            echo '
            <div id="transaction_box_5kcontainer">
              <table border="1" id="transaction_box_5k">
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
                    <td>'.$dp_5k.'</td>
                    <td>'.$int_5k.'</td>
                    <td>'.$bal_5k.'</td>
                    <td>'.$com_5k.'</td>
                    <td>'.$dop_5k.'</td>
                  </tr>';
            echo '<tr>';
            echo display_1st_payment($LoanID5K, $LoanType5k, $borrowerID5K, $ctrlPrefix5k, $borrowerFname5k, $borrowerMname5k, $borrowerLname5k, $borrowerType5k, $borrowerRank5k);
            echo '</tr>';
            echo '<tr>';
            echo display_2nd_payment($LoanID5K, $LoanType5k, $borrowerID5K, $ctrlPrefix5k, $borrowerFname5k, $borrowerMname5k, $borrowerLname5k, $borrowerType5k, $borrowerRank5k);
            echo '</tr>';
            echo '<tr>';
            echo display_fullpayment($LoanID5K, $LoanType5k, $borrowerID5K, $ctrlPrefix5k, $borrowerFname5k, $borrowerMname5k, $borrowerLname5k, $borrowerType5k, $borrowerRank5k);
            echo '</tr>';
            echo '</tbody>
              </table>

              <div class="pb5k_btnaction" align="center">
                <input type="button" name="pb5k_btn_cancel" id="pb5k_btn_cancel" onclick="window.location.href=\'civilian-5kloan-transactionlist.php\'" value="Cancel" />
              </div>

            </div>';
 
            echo '</div>
          </div>
        </div>
      </section>';
        
      }

    }

  }

  ?>
  
</body>
</html>