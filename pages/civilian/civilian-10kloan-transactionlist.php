<?php
namespace loan950;
use \loan950\db_access;
include('../../dbaccess/db_access.php');
$db = new db_access();
session_start();

if(!isset($_SESSION['cuid']) && !isset($_SESSION['cuname'])){
  header('location: civilian-login.php');
}

function display_pending_10k_request($borrower_id_10k, $borrower_account_id_10k, $type_of_loan_10k, $borrower_fname_10k, $borrower_mname_10k, $borrower_lname_10k, $type_of_employee_10k, $borrower_office_10k, $borrower_rank_10k){
  $con = new db_access();
  $pending_10k = $con->view_pending_loan_10k($borrower_id_10k, $borrower_account_id_10k, $type_of_loan_10k, $borrower_fname_10k, $borrower_mname_10k, $borrower_lname_10k, $type_of_employee_10k, $borrower_office_10k, $borrower_rank_10k);

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
  <link rel="stylesheet" href="css/ce5ktransactionlist.css">
  <?php include('css/ce5ktransactionlist.php'); ?>
  <link rel="stylesheet" href="css/loanrequest-civ.css">
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
    <section class="ce-10ktl-container">
      <div class="ce-10ktl-inner-content">
        <div class="ce-10ktl-header">
          <div class="ce-10ktl-title-container">
            <h4>Hello, <?php echo $_SESSION['cuname']; ?></h4>
            <h3>10K Account Transaction List</h3>
          </div>
        </div>
        <hr>
        <div class="10ktl-content">
          <div class="ce10ktl-notransaction">
            <button class="tablinks" onclick="openTab(event, 'active_loan_10k_tab')">Active Loan</button>
            <button class="tablinks" onclick="openTab(event, 'pending_loan_10k_tab')">Pending Loan</button>
          </div>
          
          <div id="active_loan_10k_tab" class="tabcontent">
            <div id="active_loan_10k_tablename">
              <h4 class="table_header_title">10K Transaction Table</h4>
            </div>
            <div id="active_loan_10k_table">
              <form action="" method="POST" id="showActiveLoanPanel">
              
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
                  $typeOfLoan10K = $r['type_of_loan_10k'];
                  $fname = $r['borrower_fname_10k'];
                  $mname = $r['borrower_mname_10k'];
                  $lname = $r['borrower_lname_10k'];
                  $typeOfEmployee10k = $r['type_of_employee_10k'];
                  $office = $r['borrower_office_10k'];
                  $rank = $r['borrower_rank_10k'];
                }
                display_pending_10k_request($_SESSION['ce_id'], $_SESSION['cuid'], $typeOfLoan10K, $_SESSION['fname'], $_SESSION['mname'], $_SESSION['lname'], $_SESSION['type_of_employee'], $_SESSION['ce_office'], $_SESSION['ce_rank'])
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