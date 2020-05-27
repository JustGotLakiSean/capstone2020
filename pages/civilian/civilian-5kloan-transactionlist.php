<?php
namespace loan950;
use \loan950\db_access;
include('../../dbaccess/db_access.php');
$db = new db_access();
session_start();

if(!isset($_SESSION['cuid']) && !isset($_SESSION['cuname'])){
  header('location: civilian-login.php');
}

function display_active_5k_loan($loan_id, $borrower_id, $borrower_account_id, $type_of_loan, $borrower_fname, $borrower_mname, $borrower_lname, $type_of_employee, $borrower_office, $borrower_rank){
  $con = new db_access();
  $my_active_loan = $con->view_granted_loan_5k($loan_id, $borrower_id, $borrower_account_id, $type_of_loan, $borrower_fname, $borrower_mname, $borrower_lname, $type_of_employee, $borrower_office, $borrower_rank);

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
          $control_number_5k = "$transaction_number$transaction_prefix";

          echo '
          <tbody>
            <tr>
              <td>'.$control_number_5k.'</td>
              <td>'.$fullname.'</td>
              <td>'.$status.'</td>';
              echo <<<BUT
              <td><a href="civilian-5kloan-transactionlist.php?transaction_id={$_SESSION['transaction_id']}">VIEW</a></td>
BUT;
            echo '</tr>
          </tbody>';
        }

      }

    echo '</table>
  </div>';

}

function display_pending_5k_request($borrower_id, $borrower_account_id, $type_of_loan, $borrower_fname, $borrower_mname, $borrower_lname, $type_of_employee, $borrower_office, $borrower_rank){
  $con = new db_access();
  $pending_5k = $con->view_pending_loan_5k($borrower_id, $borrower_account_id, $type_of_loan, $borrower_fname, $borrower_mname, $borrower_lname, $type_of_employee, $borrower_office, $borrower_rank);

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
          <a href="../index.php" class="ce-home-link">950th CEISG</a>
        </li>
        <li>
          <input type="button" name="cl-btnaction" id="cl-btnaction" onclick="document.getElementById('ce_menu_box').style.display='flex'" value="Your Account" />
          <div id="ce_menu_box">
            <a href="#">Account Details</a>
            <a href="#">Sign Out</a>
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

                $fetchData = $db->
                display_active_5k_loan($_SESSION['ce_id'], $_SESSION['fname'], $_SESSION['mname'], $_SESSION['lname'], );
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
                }
                display_pending_5k_request($_SESSION['ce_id'], $_SESSION['cuid'], $typeOfLoan, $_SESSION['fname'], $_SESSION['mname'], $_SESSION['lname'], $_SESSION['type_of_employee'], $_SESSION['ce_office'], $_SESSION['ce_rank']);
                ?>
              </form>
            </div>
          </div>
        </div>
      </div>
    </section>
  </article>
  
</body>
</html>