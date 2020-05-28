<?php
namespace loan950;
use \loan950\db_access;
include('../../dbaccess/db_access.php');

function DISPLAY_5K_RATES(){
  $LOANRATES_5K_ACCESS = new db_access();
  $LOANRATES_5K_DB = $LOANRATES_5K_ACCESS->loan_rates_5K();
  echo '<form action="" method="POST" class="5kaccountrates-container">';

  while($LOANRATES_5K = $LOANRATES_5K_DB->fetch_assoc()){
    $LOANRATES_5K_ID = $LOANRATES_5K['5k_rates_id'];
    $LOANRATES_5K_LOANAMOUNT = $LOANRATES_5K['5k_loan_amount_rates'];
    $LOANRATES_5K_MONTHLYPAYMENT = $LOANRATES_5K['5k_monthly_payment_rates'];
    $LOANRATES_5K_CREDIT = $LOANRATES_5K['5k_credit_rates'];
    $LOANRATES_5K_BEGINNING_BALANCE = $LOANRATES_5K['5k_beginning_balance_rates'];
    $LOANRATES_5K_PENALTY_PERCENTAGE = $LOANRATES_5K['5k_penaltyPercentage_rates'];
    $LOANRATES_5K_PENALTY_PERMONTH = $LOANRATES_5K['5k_penalty_permonth_rates'];

    echo <<<DISPLAY5K
    <div class="5kar-title-container">
      <h3>5K Account Rates</h3>
    </div>
    <hr>
    <div class="5kaccount-inner-box">
      <div class="5krate-container inner-box">
        <div class="5k-loanamount-rate-box">
          <input type="hidden" name="txt-5kloanrates-id" id="txt-5kloanrates-id" value="$LOANRATES_5K_ID" />
          <label>Loan Amount</label>
          <input type="text" name="txt-5kloanamount-rate" id="txt-5kloanamount-rate" value="$LOANRATES_5K_LOANAMOUNT" />
        </div>
        <div class="5k-monthlypayment-rate-box">
          <label>Monthly Payment</label>
          <input type="text" name="txt-5kmonthlypayment-rate" id="txt-5kmonthlypayment-rate" value="$LOANRATES_5K_MONTHLYPAYMENT" />
        </div>
        <div class="5k-credit-rate-box">
          <label>Credit</label>
          <input type="text" name="txt-5kcredit-rate" id="txt-5kcredit-rate" value="$LOANRATES_5K_CREDIT" />
        </div>
        <div class="5k-beginningBalance-rate-box">
          <label>Beginning Balance</label>
          <input type="text" name="txt-5kbeginningbalance-rate" id="txt-5kbeginningbalance-rate" value="$LOANRATES_5K_BEGINNING_BALANCE" />
        </div>
        <div class="5k-penalty-rate-box">
          <label>Penalty Rate</label>
          <input type="text" name="txt-5kpenalty-rate" id="txt-5kpenalty-rate" value="$LOANRATES_5K_PENALTY_PERCENTAGE" />
        </div>
        <div class="5k-penaltyPerMonth-rate-box">
          <label>Penalty Per Month</label>
          <input type="text" name="txt-5kpenaltypermonth-rate" id="txt-5kpenaltypermonth-rate" value="$LOANRATES_5K_PENALTY_PERMONTH" />
        </div>
        <div class="save-button-container">
          <button type="button" class="save-button">
            Save
          </button>
        </div>
      </div>
    </div>
DISPLAY5K;
  }
    
  echo '</form>';
}

function DISPLAY_10K_RATES()
{
  $LOANRATES_10K_ACCESS = new db_access();
  $LOANRATES_10K_DB = $LOANRATES_10K_ACCESS->loan_rates_10K();
  echo '<form action="" method="POST" class="10kaccountrates-container">';
  
  while($LOANRATES_10K = $LOANRATES_10K_DB->fetch_assoc()){
    $LOANRATES_10K_ID = $LOANRATES_10K['10k_rates_id'];
    $LOANRATES_10K_LOANAMOUNT = $LOANRATES_10K['10k_loan_amount_rates'];
    $LOANRATES_10K_MONTHLYPAYMENT = $LOANRATES_10K['10k_monthly_payment_rates'];
    $LOANRATES_10K_CREDIT = $LOANRATES_10K['10k_credit_rates'];
    $LOANRATES_10K_BEGINNING_BALANCE = $LOANRATES_10K['10k_beginning_balance_rates'];
    $LOANRATES_10K_PENALTY_PERCENTAGE = $LOANRATES_10K['10k_penaltyPercentage_rates'];
    $LOANRATES_10K_PENALTY_PERMONTH = $LOANRATES_10K['10k_penalty_permonth_rates'];

    echo <<<DISPLAY10K
    <div class="10kar-title-container">
    <h3>10K Account Rates</h3>
  </div>
  <hr>
  <div class="10kaccount-inner-box">
    <div class="10krate-container inner-box">
      <div class="10k-loanamount-rate-box">
        <input type="hidden" name="txt-10kloanrates-id" id="txt-10kloanrates-id" value="$LOANRATES_10K_ID" />
        <label>Loan Amount</label>
        <input type="text" name="txt-10kloanamount-rate" id="txt-10kloanamount-rate" value="$LOANRATES_10K_LOANAMOUNT" />
      </div>
      <div class="10k-monthlypayment-rate-box">
        <label>Monthly Payment</label>
        <input type="text" name="txt-10kmonthlypayment-rate" id="txt-10kmonthlypayment-rate" value="$LOANRATES_10K_MONTHLYPAYMENT" />
      </div>
      <div class="10k-credit-rate-box">
        <label>Credit</label>
        <input type="text" name="txt-10kcredit-rate" id="txt-10kcredit-rate" value="$LOANRATES_10K_CREDIT" />
      </div>
      <div class="10k-beginningBalance-rate-box">
        <label>Beginning Balance</label>
        <input type="text" name="txt-10kbeginningbalance-rate" id="txt-10kbeginningbalance-rate" value="$LOANRATES_10K_BEGINNING_BALANCE" />
      </div>
      <div class="10k-penalty-rate-box">
        <label>Penalty Rate</label>
        <input type="text" name="txt-10kpenalty-rate" id="txt-10kpenalty-rate" value="$LOANRATES_10K_PENALTY_PERCENTAGE" />
      </div>
      <div class="10k-penaltyPerMonth-rate-box">
        <label>Penalty Per Month</label>
        <input type="text" name="txt-10kpenaltypermonth-rate" id="txt-10kpenaltypermonth-rate" value="$LOANRATES_10K_PENALTY_PERMONTH" />
      </div>
      <div class="save-button-10k-container">
      <button type="button" class="save-button-10k">
        Save
      </button>
    </div>
    </div>
  </div>
DISPLAY10K;
  }

  echo '</form>';
}
?>

<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!-- <link rel="stylesheet" href="css/adminLoanMonitoring.css"> -->
<?PHP
include("css/adminLoanMonitoring.php");
?>
  <title>Loan Monitoring Settings</title>
</head>

<script>
function ENABLE_5K_INPUT(){ 
  document.getElementById('txt-5kloanamount-rate').disabled = false;
  document.getElementById('txt-5kmonthlypayment-rate').disabled = false;
  document.getElementById('txt-5kcredit-rate').disabled = false;
  document.getElementById('txt-5kbeginningbalance-rate').disabled = false;
  document.getElementById('txt-5kpenalty-rate').disabled = false;
  document.getElementById('txt-5kpenaltypermonth-rate').disabled = false;
  document.getElementById('txt-5kinterest-rate').disabled = false;
}

function ENABLE_10K_INPUTS() {
  document.getElementById('txt-10kloanamount-rate').disabled = false;
  document.getElementById('txt-10kmonthlypayment-rate').disabled = false;
  document.getElementById('txt-10kcredit-rate').disabled = false;
  document.getElementById('txt-10kbeginningbalance-rate').disabled = false;
  document.getElementById('txt-10kpenalty-rate').disabled = false;
  document.getElementById('txt-10kpenaltypermonth-rate').disabled = false;
  document.getElementById('txt-10kinterest-rate').disabled = false;
}
</script>
<body>
  <header id = "loan-navigation-container">
    <nav id = "loan-global-navigation">
      <ul>
        <li class = "nav-links"><a href = "../loanmonitoring/adminOverview.php">Overview</a></li>
        <li class = "nav-links"><a href = "../loanmonitoring/loanMonitoring.php">Loan Monitoring</a></li>
        <li class = "nav-links"><a href = "../loanmonitoring/950th-employee.php">Employee</a></li>
        <li class = "nav-links"><a href = "../loanmonitoring/general-ledger.php">General Ledger</a></li>
        <li class = "nav-links"><a href = "#">Balance Sheet</a></li>
        <!-- <li><input type="text" name = "txt_search_employee" id = "txt_search_employee" placeholder = "Search Employee"/></li> -->
        <li>
          <div>
            <input type="button" id = "admin-button" value="Admin Button" onclick="document.getElementById('admin_menu_box').style.display='flex'"/>
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
<?php
if(isset($_SESSION['admin_username'])){
  echo '<div class="account_box">';
  echo '<h3>Hello, ' . $_SESSION['fname'] . '</h3>';
  echo '</div>';
} else {
  header('location: ../../pages/admin/adminSignInForm.php');
}
?>
    <section class="loanmonitoring-rates-container-outer">
      <div class="loanmonitoring-rates-container-inner">
        <div class="loanmonitoring-rates-title-container">
          <h1>Loan Monitoring Rates</h1>
        </div>
        <div class="accounts-rates-box">

        <?php DISPLAY_5K_RATES(); ?>
        <?PHP DISPLAY_10K_RATES(); ?>
          <!-- <form class="5kaccountrates-container">

            <div class="5kar-title-container">
              <h3>5K Account Rates</h3>
            </div>
            <hr>
            <div class="5kaccount-inner-box">
              <div class="5kaccount-edit-container">
                <button type="button" id="5klm-edit-button" class="edit-button" onclick="enable_input()">
                  Edit
                </button>
              </div>
              <div class="5krate-container inner-box">
                <div class="5k-loanamount-rate-box">
                  <label>Loan Amount</label>
                  <input type="text" name="txt-5kloanamount-rate" id="txt-5kloanamount-rate" value="0000.00" />
                </div>
                <div class="5k-monthlypayment-rate-box">
                  <label>Monthly Payment</label>
                  <input type="text" name="txt-5kmonthlypayment-rate" id="txt-5kmonthlypayment-rate" value="0000.00" />
                </div>
                <div class="5k-credit-rate-box">
                  <label>Credit</label>
                  <input type="text" name="txt-5kcredit-rate" id="txt-5kcredit-rate" value="0000.00" />
                </div>
                <div class="5k-beginningBalance-rate-box">
                  <label>Beginning Balance</label>
                  <input type="text" name="txt-5kbeginningbalance-rate" id="txt-5kbeginningbalance-rate" value="0000.00" />
                </div>
                <div class="5k-penalty-rate-box">
                  <label>Penalty Rate</label>
                  <input type="text" name="txt-5kpenalty-rate" id="txt-5kpenalty-rate" value="0000.00" />
                </div>
                <div class="5k-penaltyPerMonth-rate-box">
                  <label>Penalty Per Month</label>
                  <input type="text" name="txt-5kpenaltypermonth-rate" id="txt-5kpenaltypermonth-rate" value="0000.00" />
                </div>
                <div class="5k-interest-rate-box">
                  <label>Interest</label>
                  <input type="text" name="txt-5kinterest-rate" id="txt-5kinterest-rate" value="0000.00" />
                </div>
                <div class="save-button-container">
                  <button type="button" class="save-button">
                    Edit
                  </button>
                </div>
              </div>
            </div>
          </form> -->
          <!-- <form class="10kaccountrates-container">
            <div class="10kar-title-container">
              <h3>10K Account Rates</h3>
            </div>
            <hr>
            <div class="10kaccount-inner-box">
              <div class="10kaccount-edit-container">
                <button type="button" id="10klm-edit-button" class="edit-button" onclick="ENABLE_10K_INPUTS()">
                  Edit
                </button>
              </div>
              <div class="10krate-container inner-box">
                <div class="10k-loanamount-rate-box">
                  <label>Loan Amount</label>
                  <input type="text" name="txt-10kloanamount-rate" id="txt-10kloanamount-rate" value="0000.00" />
                </div>
                <div class="10k-monthlypayment-rate-box">
                  <label>Monthly Payment</label>
                  <input type="text" name="txt-10kmonthlypayment-rate" id="txt-10kmonthlypayment-rate" value="0000.00" />
                </div>
                <div class="10k-credit-rate-box">
                  <label>Credit</label>
                  <input type="text" name="txt-10kcredit-rate" id="txt-10kcredit-rate" value="0000.00" />
                </div>
                <div class="10k-beginningBalance-rate-box">
                  <label>Beginning Balance</label>
                  <input type="text" name="txt-10kbeginningbalance-rate" id="txt-10kbeginningbalance-rate" value="0000.00" />
                </div>
                <div class="10k-penalty-rate-box">
                  <label>Penalty Rate</label>
                  <input type="text" name="txt-10kpenalty-rate" id="txt-10kpenalty-rate" value="0000.00" />
                </div>
                <div class="10k-penaltyPerMonth-rate-box">
                  <label>Penalty Per Month</label>
                  <input type="text" name="txt-10kpenaltypermonth-rate" id="txt-10kpenaltypermonth-rate" value="0000.00" />
                </div>
                <div class="10k-interest-rate-box">
                  <label>Interest</label>
                  <input type="text" name="txt-10kinterest-rate" id="txt-10kinterest-rate" value="0000.00" />
                </div>
              </div>
            </div>
          </form> -->
        </div>
      </div>
    </section>
  </main>
</body>
</html>