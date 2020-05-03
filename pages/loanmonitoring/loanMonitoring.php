<?PHP
namespace loan950;
use \loan950\db_access;
include('../../dbaccess/db_access.php');
session_start();
$db = new db_access();
$dt = $db->view_all_employee();
$lr5k = $db->loan_rates_5K();
$lr10k = $db->loan_rates_10K();

function transaction_table_5k(){
  $con = new db_access();
  $list5K = $con->new_5k_list();
  echo '
      <div id="transaction_table_5k">
        <table border="1">
          <thead>
            <tr>
              <th>Control Number</th>
              <th>Name</th>
              <th>Type of Loan Account</th>
              <th>View</th>
            </tr>          
          </thead>
  ';

  while($row = $list5K->fetch_assoc()){
    $transaction_number = $row['loan_id_5k'];
    $_SESSION['transaction_number'] = $row['loan_id_5k'];
    $transaction_prefix = $row['ctrl_no_prefix'];
    $borrower_id = $row['borrower_id'];
    $_SESSION['borrower_id'] = $row['borrower_id'];
    $borrower_fname = $row['fname'];
    $borrower_mname = $row['mname'];
    $borrower_lname = $row['lname'];
    $type_of_employee = $row['type_of_employee'];
    $type_of_loan_account = $row['type_of_loan'];
    $loan_amount_5k_rate = $row['loan_amount_5k_rate'];
    $monthly_payment_5k_rate = $row['monthly_payment_5k_rate'];
    $credit_5k_rate = $row['credit_5k_rate'];
    $debit_pay_5k = $row['debit_pay_5k'];
    $interest_rate_5k = $row['interest_rate_5k'];
    $balance_rate_5k = $row['balance_rate_5k'];
    $date_of_loan = $row['date_of_loan'];
    $comment = $row['comment'];
    $penalty = $row['penalty'];
    $office = $row['office'];
    $emp_rank = $row['emp_rank'];
    $first_payment = $row['first_payment'];
    $second_payment = $row['second_payment'];
    $third_payment = $row['third_payment'];
    $fourth_payment = $row['fourth_payment'];
    $fifth_payment = $row['fifth_payment'];
    $full_payment = $row['full_payment'];
    // $loan_status = $row['loan_status'] === 0 ? 'Not Active' : 'Active';
    $loan_status = $row['loan_status'];
    $isNewLoan = $row['isNewLoan'];

    $borrower_fullname = "$borrower_fname $borrower_mname $borrower_lname";
    $formatted_control_number = "$transaction_prefix$transaction_number";

    echo '
    <tbody>
      <tr>
        <input type="hidden" name="control_number" value="'.$formatted_control_number.'" />
        <input type="hidden" name="transaction_number" value="'.$transaction_number.'" />
        <input type="hidden" name="transaction_prefix" value="'.$transaction_prefix.'" />
        <input type="hidden" name="borrower_id" value="'.$borrower_id.'" />
        <input type="hidden" name="borrower_fname" value="'.$borrower_fname.'" />
        <input type="hidden" name="borrower_mname" value="'.$borrower_mname.'" />
        <input type="hidden" name="borrower_lname" value="'.$borrower_lname.'" />
        <input type="hidden" name="type_of_employee" value="'.$type_of_employee.'" />
        <input type="hidden" name="type_of_loan_account" value="'.$type_of_loan_account.'" />
        <input type="hidden" name="loan_amount_5k_rate" value="'.$loan_amount_5k_rate.'" />
        <input type="hidden" name="monthly_payment_5k_rate" value="'.$monthly_payment_5k_rate.'" />
        <input type="hidden" name="credit_5k_rate" value="'.$credit_5k_rate.'" />
        <input type="hidden" name="debit_pay_5k" value="'.$debit_pay_5k.'" />
        <input type="hidden" name="interest_rate_5k" value="'.$interest_rate_5k.'" />
        <input type="hidden" name="date_of_loan" value="'.$date_of_loan.'" />
        <input type="hidden" name="comment_remarks" value="'.$comment.'" />
        <input type="hidden" name="penalty" value="'.$penalty.'" />
        <input type="hidden" name="office" value="'.$office.'" />
        <input type="hidden" name="emp_rank" value="'.$emp_rank.'" />
        <input type="hidden" name="first_payment" value="'.$first_payment.'" />
        <input type="hidden" name="second_payment" value="'.$second_payment.'" />
        <input type="hidden" name="third_payment" value="'.$third_payment.'" />
        <input type="hidden" name="fourth_payment" value="'.$fourth_payment.'" />
        <input type="hidden" name="fifth_payment" value="'.$fifth_payment.'" />
        <input type="hidden" name="full_payment" value="'.$full_payment.'" />
        <input type="hidden" name="loan_status" value="'.$loan_status.'" />
        <td>'.$formatted_control_number.'</td>
        <td>'.$borrower_fullname.'</td>
        <td>'.$type_of_loan_account.'</td>';
        echo <<<BUT
        <td><a type="button" href="loanMonitoring.php?transaction_number={$_SESSION['transaction_number']}">NEW PAYMENT</a></td>
BUT;
      echo '</tr>
    </tbody>';
  }
  echo '</table>';
  echo '</div>';
}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- <link rel="stylesheet" href="css/loanMonitoring.php"> -->
    <?php include("css/loanMonitoringStyle.php"); ?>
    <title>Loan Monitoring</title>
    <script src="https://code.jquery.com/jquery-3.4.1.js"></script>
  </head>
  <body>
    <script src="src/new_loan.js"></script>
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
      <section id = "loanmonitoring-container">
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
        <div id = "loan-summary-content">
          <div id = "totalborrowers" class = "summarycard">
            <div id = "totalborrowerslabel">
              <p>Total Borrowers</p>
            </div>
            <div id = "totalborrowercount">
              <p class="ls-value">0</p>
            </div>
          </div>
          <div id = "collectibles" class = "summarycard">
            <div id = "collectibleslabel">
              <p>Collectibles</p>
            </div>
            <div id = "collectiblescount">
              <p class="ls-value">0</p>
            </div>
          </div>
          <div id = "totalinterest" class = "summarycard">
            <div id = "totalinterest">
              <p>Total Interest</p>
            </div>
            <div id = "totalinterest">
              <p class="ls-value">0</p>
            </div>
          </div>
          <div id = "totalpayment" class = "summarycard">
            <div id = "totalpaymentlabel">
              <p>Total Payment</p>
            </div>
            <div id = "totalpaymentcount">
              <p class="ls-value">0</p>
            </div>
          </div>
          <div id = "expectedinterest" class = "summarycard">
            <div id = "expectedinterestlabel">
              <p>Expected Interest Amount</p>
            </div>
            <div id = "expectedinterestcount">
              <p class="ls-value">0</p>
            </div>
          </div>
          <div id = "expectedloanamount" class = "summarycard">
            <div id = "expectedloanamountlabel">
              <p>Expected Loan Amount</p>
            </div>
            <div id = "expectedloanamountcount">
              <p class="ls-value">0</p>
            </div>
          </div>
        </div>

        <div id = "loantransactionform">
          <div id = "loantabs">
            <button class = "tablinks 5ktablinks" onclick="openTab(event, '5K')">5K<span class = "5kline"></span></button>
            <button class = "tablinks" onclick="openTab(event, '10K')">10K<span class="10kline"></span></button>
          </div>

          <div id = "5K" class = "tabcontent">
            <div id = "5kadd-button-container">
              <button type="button" id="btn-addnew5k" onclick="document.getElementById('fiveKaddnewloan-container').style.display='block'">Add New 5K Loan</button>
            </div>
            <div id = "5ktransationtablename">
              <h4 class="table_header_title">5K Transaction Table</h4>
            </div>
            <div id = "5ktransactiontable">
              <form action="" method="POST" id="showLoanPanel">
                <?php
                transaction_table_5k();
                ?>
              </form>
            </div>
          </div>

          <!-- ADD NEW 5K LOAN-->
          <section id="fiveKaddnewloan-container" class="modal">
            <div class="fiveKaddnewloanpanel" id="fiveKaddnewloan" >
              <div class="fiveKnewloantitleholder">
                <h3 id="fiveKnewloantitle">New Loan Record</h3>
                <button type="button" id="btn_close" onclick="document.getElementById('fiveKaddnewloan-container').style.display='none'">Close</button>
              </div>
              <span id="alert" style="display: none; text-align: center;">New Record Added.</span>
              <div class="fiveKnewloanfirstbox">
                <div class="fiveKborrowerdetails">

                  <!-- All Employee List -->
                  <div id="search_container" align="center">
                    <?php foreach($dt as $res) { ?>
                    <?php
                      while($row = $lr5k->fetch_array(MYSQLI_ASSOC)){
                        $id = $row['5k_rates_id'];
                        $loan_type_5k = $row['type_of_loan'];
                        $la_amount = $row['5k_loan_amount_rates'];
                        $mp_rates = $row['5k_monthly_payment_rates'];
                        $cr_rates = $row['5k_credit_rates'];
                        $beg_bal = $row['5k_beginning_balance_rates'];
                        $interest = $row['5k_interest_rate'];
                        $pen_permonth = $row['5k_penalty_permonth_rates'];
                        $date_today = date("j-M-y");
                        $formattedString = "950CEISG-000";
                      }
                      $empid = $res["emp_id"];
                      $empfname = $res["emp_fName"];
                      $empmname = $res["emp_mName"];
                      $emplname = $res["emp_lName"];
                      $empoffice = $res["emp_office"];
                      $empType = $res["emptype"];
                      $empRank = $res["empRank"];
                      $la5k_count = $res['la5k'];
                      $emp_fullname = "$res[emp_fName] $res[emp_mName] $res[emp_lName]";
                      $emp_info_5k = "$res[emp_fName] $res[emp_mName] $res[emp_lName] | $res[emp_office]";
                      $comment = "New Loan form $emp_fullname.";
                      $debit_pay = 0;
                      $status = 0;
                      $first_payment = 0;
                      $second_payment = 0;
                      $third_payment = 0;
                      $fourth_payment = 0;
                      $fifth_payment = 0;
                      $full_payment = 0;
echo <<<EMP_LIST
                    <form action="add_new_5k_loan.php" method="POST" class="search_result_box" >
                      <div id="emp_list">
                        <input type="hidden" name="empid" class="hidden_5k_info hidden_id" value="$empid" />
                        <input type="hidden" name="empfname" class="hidden_5k_info hidden_fname" value="$empfname" />
                        <input type="hidden" name="empmname" class="hidden_5k_info hidden_mname" value="$empmname" />
                        <input type="hidden" name="emplname" class="hidden_5k_info hidden_lname" value="$emplname" />
                        <input type="hidden" name="empoffice" class="hidden_5k_info hidden_office" value="$empoffice" />
                        <input type="hidden" name="empType" class="hidden_5k_info hidden_type" value="$empType" />
                        <input type="hidden" name="empRank" class="hidden_5k_info hidden_rank" value="$empRank" />
                        <input type="hidden" name="la5kcount" class="hidden_5k_info" value="$la5k_count" />
                        <input type="hidden" name="loan_status" class="hidden_5k_info" value="$status" />
                        <input type="hidden" name="first_payment" class="hidden_5k_info" value="$first_payment" />
                        <input type="hidden" name="second_payment" class="hidden_5k_info" value="$second_payment" />
                        <input type="hidden" name="third_payment" class="hidden_5k_info" value="$third_payment" />
                        <input type="hidden" name="fourth_payment" class="hidden_5k_info" value="$fourth_payment" />
                        <input type="hidden" name="five_payment" class="hidden_5k_info" value="$fifth_payment" />
                        <input type="hidden" name="full_payment" class="hidden_5k_info" value="$full_payment" />
                        <input type="hidden" name="amount_of_payment" class="hidden_5k_info" value="$debit_pay" />
                        <input type="hidden" name="comment_remarks" class="hidden_5k_info" value="$comment" />
                        <input type="text" disabled name="empfullname" class="emp_info_5k" value="$emp_fullname" />
EMP_LIST;
                  echo "<input type='button' name = 'btn_add_5k_loan' value='Add New Loan' class='btn_add_5k_loan' onclick='addnewloan5k(\"".$empid."\", \"".$formattedString."\", \"".$empfname."\", \"".$empmname."\", \"".$emplname."\", \"".$empType."\", \"".$loan_type_5k."\", \"".$la_amount."\", \"".$emp_fullname."\", \"".$mp_rates."\", \"".$cr_rates."\", \"".$debit_pay."\", \"".$interest."\", \"".$beg_bal."\", \"".$date_today."\", \"".$comment."\", \"".$pen_permonth."\", \"".$empoffice."\", \"".$empRank."\", \"".$la5k_count."\", \"".$first_payment."\", \"".$second_payment."\", \"".$third_payment."\", \"".$fourth_payment."\", \"".$fifth_payment."\", \"".$full_payment."\", \"".$status."\");' />";
                echo '</div>';
              echo '</form>';
                      ?>
                      <?php } ?>
                  </div>
                  <!-- END OF SEARCH BOX -->

                  <!-- <input type="text" disabled name="txt_5K_newloan_office" id = "txt_5K_newloan_office" /> -->
                </div>
              </div>
              <hr>
              <form action="" method="POST" id="fiveKnewloanform">
                <div class="fiveKnewloansecondbox">
                  <div class="fiveKlistboxtitleholder">
                    <h4>Borrower List</h4>
                  </div>
                  <div class="fiveKborrowernewloandetails">
                    <div class="fiveKnewloandetailstitleholder">
                      <h4>Loan Details (5K Account)</h4>
                      <hr>
                      <div class="fiveKloanaccountdetailscontainer">
                        <div class="loanaccountdetails-box">

                        <?php
                        echo '<div class="firstbox">';
                        echo '<label for="loan_type_5k">Type of Loan account</label>';
                        echo '<label for="la_rate">Loan Amount Rate</label>';
                        echo '<label for="mp_rate">Monthly Payment Rate</label>';
                        echo '<label for="interest_rate">Interest Rate</label>';
                        echo '<label for="cr_rate">Credit rate</label>';
                        echo '<label for="beg_bal">Beginning Balance</label>';
                        echo '<label for="pen_permonth">Penalty per month</label>';
                        echo '<label for="date_today">Date</label>';
                        echo '</div>';

                        echo '<div class="secondbox">';
                        echo '<input type="hidden" disabled id="ctrlno_prefix" name="ctrlno_prefix" class="lk_rate" value="'. $formattedString .'" /> ';
                        echo '<input type="text" disabled id="loan_type_5k" name="loan_type_5k" class="lk_rate" value="' . $loan_type_5k . '" />';
                        echo '<input type="text" disabled id="la_rate" name="la_rate" class="lk_rate" value="'. $la_amount . '" />';
                        echo '<input type="text" disabled id="mp_rate" name="mp_rate" class="lk_rate" value="'. $mp_rates . '" />';
                        echo '<input type="text" disabled id="interest_rate" name="interest_rate" class="lk_rate" value="'. $interest . '" />';
                        echo '<input type="text" disabled id="cr_rate" name="cr_rate" class="lk_rate" value="'. $cr_rates . '" />';
                        echo '<input type="text" disabled id="beg_bal" name="beg_bal" class="lk_rate" value="'. $beg_bal . '" />';
                        echo '<input type="text" disabled id="pen_permonth" name="pen_permonth" class="lk_rate" value="'. $pen_permonth . '" />';
                        echo '<input type="text" disabled id="date_today" name="date_today" class="lk_rate" value="'. $date_today . '" />';
                        echo '</div>';
                        ?>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </form>
            </div>
          </section>

          <!-- Add New Payment 10K MODAL -->
          <section id="newpayment_10k_modal">
            <form class="newpayment_10k_container" method="post" action="">
              <div class="newpayment_10k_titlecontainer">
                <button type="button" id="btn_10k_moreoption">More</button>
                <h3 align="center">Add New Payment</h3>
              </div>
              <div class="bdb-10k-content">

                <div class="bdb-10k-inner-content">
                  <div class="bdb-10k_container">
                    <div class="borrowers_detailbox_10k">
                      <input type="text" name="borrower_name_10k" disabled id="borrower_name_10k" />
                      <input type="text" name="borrower_office_10k" disabled id="borrower_office_10k" />
                    </div>
                  </div>
                  <div class="current_10K_loantransaction_container">
                    <div class="clt_header_10k">
                      <h5>Borrower's Loan History</h5>
                    </div>
                    <hr>
                    <div class="clt_container_10k">
                      <div class="cltbox10k">
                        <div class="ctrl_number_box_10k clt">
                          <label>Control Number</label>
                          <input type="number" disabled name="txt_ctrl_number_10k" id="txt_ctrl_number_10k" value="0000000" /> 
                        </div>
                        <div class="account_type_10k clt">
                          <label>Account Type:</label>
                          <input type="text" disabled name="txt_accounttype_10k" id="txt_accounttype_10k" value="10k Account" />
                        </div>
                        <div class="balance_10k_box clt">
                          <label>Current Balance</label>
                          <input type="number" disabled name="balance_10k" id="balance_10k" value="0000000" /> 
                        </div>
                        <div class="currentstatus_10k_box clt">
                          <label>Status</label>
                          <input type="text" disabled name="txt_currentstatus_10k" id="txt_currentstatus_10k" value="Status" /> 
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="paymentbox_10k_container">
                    <div class="paymentbox_10k_list">
                      <div class="paymentbox10k_title">
                        <h5 align="center" style="background: #009245; color: white">Payment Box</h5>
                      </div>
                      <div class="paymentbox_10k_content">

                        <div class="paymentbox_10k">
                          <div class="paymentoption_box np10kbox">
                            <label for="paymentoption_10k">Payment Option</label>
                            <select name="paymentoption_10k">
                              <option value="1ST Payment">1ST Payment</option>
                              <option value="2ND Payment">2ND Payment</option>
                              <option value="3RD Payment">3RD Payment</option>
                              <option value="FULL PAYMENT">FULL PAYMENT</option>
                            </select>
                          </div>
                          <div class="date_of_payment_10k_box np10kbox">
                            <label for="date_of_payment_10k">Date of Payment</label>
                            <input type="date" name="date_of_payment_10k" id="datepicker_10k"/>
                          </div>
                          <div class="amount_payment_10k_box np10kbox">
                            <label for="txt_amount_payment_10k">Amount Payment</label>
                            <input type="number" name="txt_amount_payment_10k" id="txt_amount_payment_10k"/>
                          </div>
                          <div class="penaltyrate_10k_box np10kbox">
                            <label>Penalty</label>
                            <div>
                              <label for="penaltyrate_10k" style="font-size: 13px;">80 PHP</label>
                              <input type="radio" name="penaltyrate_10k" id="penaltyrate_10k"/>
                            </div>
                          </div>
                          <div class="interest_10k_box np10kbox">
                            <label for="txt_interestamount_10k">Interest</label>
                            <input type="text" disabled name="txt_interestamount_10k" id="txt_interestamount_10k" placeholder="000" />
                          </div>
                          <div class="current_balance_10k_box np10kbox">
                            <label for="txt_currentbalance_10k">Current Balance</label>
                            <input type="text" disabled name="txt_currentbalance_10k" id="txt_currentbalance_10k" placeholder="000" />
                          </div>
                          <div class="pb10k_btnaction">
                            <input type="submit" name="pb10k_btn_submit" id="pb10k_btn_submit" value="Pay" />
                            <input type="button" name="pb10k_btn_cancel" id="pb10k_btn_cancel" onclick="document.getElementById('newpayment_10k_modal').style.display='none'" value="Cancel" />
                          </div>
                        </div>

                      </div>
                    </div>
                  </div>
                </div>

              </div>
            </form>
          </section>

          <!-- ADD NEW 10K LOAN-->
          <section id="tenKaddnewloan-container">
            <div class="tenKaddnewloanpanel" id="tenKaddnewloan">
              <div class="tenKnewloantitleholder">
                <h3 id="tenKnewloantitle">New Loan Record</h3>
              </div>
              <div class="tenKnewloanfirstbox">
                <div class="tenKborrowerdetails">
                  <input type="text" name="txt_tenK_newloan_borrower" id="txt_tenK_newloan_borrower" placeholder="Search Borrower Name" />
                  <input type="text" disabled name="txt_tenK_newloan_office" id = "txt_tenK_newloan_office" />
                </div>
                <div class="tenKaddtolistholder">
                  <button type="button" id="btn_tenKaddtolist" >
                    Add to List
                  </button>
                </div>
              </div>
              <hr>
              <form action="" method="POST" id="tenKnewloanform">
                <div class="tenKnewloansecondbox">
                  <div class="tenKlistboxtitleholder">
                    <h4>Borrower List</h4>
                  </div>
                  <div class="tenKborrowerlistbox">

                    <h3 align="center" style="font-weight: lighter; color: #666666; font-size: 2rem;" class="queuetitle">Empty</h3>

                  </div>
                  <div class="tenKborrowernewloandetails">
                    <div class="tenKnewloandetailstitleholder">
                      <h4>Loan Details</h4>
                      <hr>
                      <div class="tenKloanaccountdetailscontainer">
                        <div class="loanaccountdetails-box">
                          <div class="firstbox">
                            <p>Beginning Balance</p>
                            <p>Interest</p>
                            <p>Total Borrow</p>
                            <p>Date Borrow</p>
                          </div>
                          <div class="secondbox">
                            <p>00000</p>
                            <p>00000</p>
                            <p>00000</p>
                            <p>mm-dd-yyyy</p>
                          </div>
                        </div>
                        <div class="thirdbox" align="center">
                          <input type="submit" name="submit_tenK_newloan" id="submit_tenK_newloan" value="Submit" />
                          <input type="button" name="cancel_tenK_newloan" id="cancel_tenK_newloan" value="Cancel" onclick="document.getElementById('tenKaddnewloan-container').style.display='none'" />
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </form>
            </div>
          </section>

          <div id = "10K" class = "tabcontent">
            <div id = "10kadd-button-container">
              <button type="button" id="btn-addnew10k" onclick="document.getElementById('tenKaddnewloan-container').style.display='block'">Add New 10K Loan</button>
              <button type="button" onclick="document.getElementById('newpayment_10k_modal').style.display='block'">NEW PAYMENT</button>
            </div>
            <div id = "10ktransactiontablename">
              <p>10K Transaction Table</p>
            </div>
            <div id = "10ktransactiontable">
              <?php echo 'No 10K Transactions Yet' ?>
            </div>
          </div>
        </div>

      </section>
<?php
      if(isset($_GET['transaction_number'])){
    $LoanID5k = '';
    $borrowerID5k = '';
    $ctrlPrefix5k = '';
    $borrowerFname5k = '';
    $borrowerMname5k = '';
    $borrowerLname5k = '';
    $borrowerOffice5k = '';
    $borrowerType5k = '';
    $LoanType5k = '';
    $currentBalance5k = '';
    $interestRate5k = '';
    $creditRate5k = '';
    $LoanStatus5k = '';
    $is_new_loan = '';
    if(isset($_SESSION['transaction_number'])){
      echo '<section id="newpayment_5k_modal">';
      $new_loan5k_access = new db_access();
      $display_loan5k_panel = $new_loan5k_access->select_new_loan_5k($_GET['transaction_number']);

      while($r = $display_loan5k_panel->fetch_array(MYSQLI_ASSOC)){
        $LoanID5K = $r['loan_id_5k'];
        $borrowerID5K = $r['borrower_id'];
        $ctrlPrefix5k = $r['ctrl_no_prefix'];
        $borrowerFname5k = $r['fname'];
        $borrowerMname5k = $r['mname'];
        $borrowerLname5k = $r['lname'];
        $borrowerOffice5k = $r['office'];
        $borrowerType5k = $r['type_of_employee'];
        $borrowerRank5k = $r['emp_rank'];
        $LoanType5k = $r['type_of_loan'];
        $LoanAmountRate5k = $r['loan_amount_5k_rate'];
        $MonthlyPaymentRate5k = $r['monthly_payment_5k_rate'];
        $currentBalance5k = $r['balance_rate_5k'];
        $interestRate5k = $r['interest_rate_5k'];
        $creditRate5k = $r['credit_5k_rate'];
        $LoanStatus5k = (($r['loan_status'] == 0) ? 'Active' : 'Not Active');
        $is_new_loan = $r['isNewLoan'];

        function payment_options($isNewLoan) {
          // '1' means new... '0' means not new... //
          if($isNewLoan == 1){
            echo '<select name="paymentoption_5k">
              <option value="1st_payment_option">1ST Payment</option>
              <option value="2nd_payment_option" disabled>2ND Payment</option>
              <option value="3rd_payment_option" disabled>3RD Payment</option>
              <option value="full_payment_option">FULL PAYMENT</option>
            </select>';
          } else if($isNewLoan == 0){
            echo '<select name="paymentoption_5k">
              <option value="1st_payment_option" disabled>1ST Payment</option>
              <option value="2nd_payment_option">2ND Payment</option>
              <option value="3rd_payment_option">3RD Payment</option>
              <option value="full_payment_option">FULL PAYMENT</option>
            </select>';
          }
        }

        $borrowerFullname5k = "$borrowerFname5k $borrowerMname5k $borrowerLname5k";
        $control_number5k = "$ctrlPrefix5k$LoanID5K";
      }

      function display_previous_transaction()
      {
        echo '
        <div id="transaction_box_5kcontainer">
          <table border="1" id="transaction_box_5k">
            <thead>
              <tr>
                <th>Debit</th>
                <th>Interest</th>
                <th>Current Balance</th>
                <th>Remarks</th>
                <th>Date of Payment</th>
                <th>Penalty</th>
                <th>Penalty Paid</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td>World</td>
                <td>World</td>
                <td>World</td>
                <td>World</td>
                <td>World</td>
                <td>World</td>
                <td>World</td>
              </tr>
            </tbody>
          </table>
        </div>';
      }

      $get_dp_and_fp = new db_access();
      $get_data = $get_dp_and_fp->get_dp_and_fp($borrowerID5K, $borrowerFname5k, $borrowerMname5k, $borrowerLname5k, $borrowerOffice5k, $borrowerType5k, $borrowerRank5k);
      while($result = $get_data->fetch_assoc()){
        $dp5k = $result['dp5k'];
        $dp10k = $result['dp10k'];
        $dp = $result['dpCount'];
        $fp5k = $result['fp5k'];
        $fp10k = $result['fp10k'];
        $fp = $result['fp_count'];
        $penalty_count = $result['penaltyCount'];
        $penalty_5k_count = $result['penalty5k'];
        $penalty_10k_count = $result['penalty10k'];
      }
echo '
    <form id="newpayment_5k_container" method="POST" action="add_new_5k_payment.php">
      <div class="newpayment_5k_titlecontainer">
        <button type="button" id="btn_5k_moreoption">More</button>
        <h3 align="center">Add New Payment</h3>
      </div>
      <div class="bdb-content">
        <div class="bdb-inner-content">
          <div class="bdb_container">
            <div class="borrowers_detailbox">
              <input type="hidden" name="b_loanID" id="b_loanID" value="'.$LoanID5K.'" />
              <input type="hidden" name="b_empID" id="b_empID" value="'.$borrowerID5K.'" />
              <input type="hidden" name="b_ctrl" id="b_ctrl" value="'.$ctrlPrefix5k.'" /> 
              <input type="hidden" name="b_fname" id="b_fname" value="'.$borrowerFname5k.'" />
              <input type="hidden" name="b_mname" id="b_mname" value="'.$borrowerMname5k.'" />
              <input type="hidden" name="b_lname" id="b_lname" value="'.$borrowerLname5k.'" />
              <input type="hidden" name="b_type" id="b_type" value="'.$borrowerType5k.'" />
              <input type="hidden" name="b_rank" id="b_rank" value="'.$borrowerRank5k.'" />
              <input type="hidden" name="b_loanType" id="b_type" value="'.$LoanType5k.'" />
              <input type="hidden" name="txt_loan5k_amount_rate" value="'.$LoanAmountRate5k.'" />
              <input type="hidden" name="txt_monthlyPayment_5k_rate" value="'.$MonthlyPaymentRate5k.'" />
              <input type="hidden" name="b_office" id="b_office" value="'.$borrowerOffice5k.'" />
              <input type="hidden" name="b_dp5k" value="'.$dp5k.'" />
              <input type="hidden" name="b_dp10k" value="'.$dp10k.'" />
              <input type="hidden" name="b_dp" value="'.$dp.'" />
              <input type="hidden" name="b_fp" value="'.$fp.'" />
              <input type="hidden" name="b_fp5k" value="'.$fp5k.'" />
              <input type="hidden" name="b_fp10k" value="'.$fp10k.'" />
              <input type="hidden" name="b_penalty_count" value="'.$penalty_count.'" />
              <input type="hidden" name="b_penalty_5k_count" value="'.$penalty_5k_count.'" />
              <input type="hidden" name="b_penalty_10k_count" value="'.$penalty_10k_count.'" />
              <input type="text" name="b_fullname" disabled id="b_fullname" value="'.$borrowerFullname5k.'"/>
              <input type="text" disabled value="'.$borrowerOffice5k.'" />
            </div>
          </div>
          <div class="current_loantransaction_container">
            <div class="clt_header">
              <h5>Borrower\'s Loan Detail</h5>
            </div>
            <hr>
            <div class="clt_container">
              <div class="cltbox">
                <div class="ctrl_number_box clt">
                  <label>Control Number:</label>
                  <input type="hidden" name="txt_ctrl_number_5k" id="txt_ctrl_number_5k" value="'.$control_number5k.'" />
                  <input type="text" disabled value="'.$control_number5k.'" />
                </div>
                <div class="account_type_5k clt">
                  <label>Account Type:</label>
                  <input type="hidden" name="txt_accounttype_5k" id="txt_accounttype_5k" value="'.$LoanType5k.'" />
                  <input type="text" disabled value="'.$LoanType5k.'" />
                </div>
                <div class="balance_5k_box clt">
                  <label>Balance Rate:</label>
                  <input type="hidden" name="balance_5k" id="balance_5k" value="'.$currentBalance5k.'" />
                  <input type="text" disabled value="'.$currentBalance5k.'" />
                </div>
                <div class="currentstatus_5k_box clt">
                  <label>Status:</label>
                  <input type="hidden" name="txt_currentstatus_5k" id="txt_currentstatus_5k" value="'.$LoanStatus5k.'" /> 
                  <input type="text" disabled value="'.$LoanStatus5k.'" /> 
                </div>
              </div>
            </div>
          </div>';
if($LoanStatus5k === 'Active'){
  echo'  
          <div class="paymentbox_5k_container">
            <div class="paymentbox_5k_list">
              <div class="paymentbox5k_title">
                <h5 align="center" style="background: #0071BC; color: white">Payment Box</h5>
              </div>
              <div class="paymentbox_5k_content">
                <div class="paymentbox_5k">
                  <div class="paymentoption_box np5kbox">
                    <label for="paymentoption_5k">Payment Option</label>
            ';
                      echo payment_options($is_new_loan);
echo '
                  </div>
                  <div class="date_of_payment_5k_box np5kbox">
                    <label for="date_of_payment_5k">Date of Payment</label>
                    <input type="date" name="date_of_payment_5k" id="datepicker"/>
                  </div>
                  <div class="amount_payment_5k_box np5kbox">
                    <label for="txt_amount_payment_5k">Amount Payment</label>
                    <input type="number" name="txt_amount_payment_5k" id="txt_amount_payment_5k"/>
                  </div>
                  <div class="penaltyrate_5k_box np5kbox">
                    <label>Penalty:</label>
                    <div>
                      <label for="penaltyrate_5k" style="font-size: 13px;">80 PHP</label>
                      <input type="radio" name="penaltyrate_5k" id="penaltyrate_5k" value="80"/>
                    </div>
                  </div>
                  <div class="interest_5k_box np5kbox">
                    <label for="txt_interestamount_5k">Interest</label>
                    <input type="hidden" name="txt_interestamount_5k" value="'.$interestRate5k.'" />
                    <input type="text" disabled id="txt_interestamount_5k" disabled value="'.$interestRate5k.'" />
                  </div>
                  <div class="current_balance_5k_box np5kbox">
                    <label for="txt_currentbalance_5k">Current Balance</label>
                    <input type="hidden" name="txt_currentbalance_5k" value="'.$creditRate5k.'" />
                    <input type="text" disabled id="txt_currentbalance_5k" value="'.$creditRate5k.'" />
                  </div>
                  <div class="pb5k_btnaction">
                    <input type="submit" name="pb5k_btn_submit" id="pb5k_btn_submit" value="Pay" />
                    <input type="button" name="pb5k_btn_cancel" id="pb5k_btn_cancel" onclick="window.location.href=\'loanMonitoring.php\'" value="Cancel" />
                  </div>
                </div>
              </div>
            </div>
          </div>';
        } else if($LoanStatus5k === 'Not Active'){
          echo '<div class="not_active_container" align="center">
            <h4>Not Active</h4>
          </div>';
        }
        echo '
        </div>
      </div>
    </form>
  </section>
';
  }
} else {

}
  ?>
    </main>

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
  </body>
</html>