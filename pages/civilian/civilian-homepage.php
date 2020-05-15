<?php
namespace loan950;
use \loan950\db_access;
include('../../dbaccess/db_access.php');
$db = new db_access();
$lr5k = $db->loan_rates_5K();
$lr10k = $db->loan_rates_10K();
session_start();

if(!isset($_SESSION['cuid']) && !isset($_SESSION['cuname'])){
  header('location: civilian-login.php');
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <?php
  include('css/loanrequest-civ.php');
  include('css/civilian-homepage-style.php');
  ?>
  <title>Home | Civilian Employee</title>
</head>
<body>

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
            <a href="logout_civ.php">Sign Out</a>
          </div>
        </li>
      </ul>
    </nav>
  </header>

  <article onclick="document.getElementById('ce_menu_box').style.display='none'">
    <section class="ce-homepage">
      <div class="ce-inner-content">
        <div class="cepd-container">
          <div class="cepd-header">
            <h4>Hello, <?php echo $_SESSION['cuname']; ?></h4>
          </div>
          <div class="cepd-inner-content">
            <div class="cepd-detailbox">
              <div class="cepd-imagebox-container">
                <div class="cepd-imagebox">
                  <img src="" id="cepd-avatar" />
                </div>
              </div>
              <div class="cepd-box">
                <div class="cepd-fullname-box">
                  <p id="ce-fullname"><?php echo $_SESSION['ce_fullname']; ?></p>
                </div>
                <div class="cepd-office-box">
                  <p><?php echo $_SESSION['ce_office']; ?></p>
                </div>
                <div class="cepd-contactnumber-box">
                  <p><?php echo $_SESSION['ce_contactnumber']; ?></p>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="cela-container">
          <div class="cela-header">
            <h4>Loan Account</h4>
          </div>
          <div class="cela-inner-content">
            <div class="cela-requestbutton-container">
              <button type="button" class="ce-btnrequest" onclick="document.getElementById('lrf-container_5k').style.display='block'">
                Request 5K Loan
              </button>
              <button type="button" class="ce-btnrequest" onclick="document.getElementById('lrf-container_10k').style.display='block'">
                Request 10K Loan
              </button>
            </div>
            <div class="cela-loancategory">
              <div class="cela-loancategory-header">
                <h2>Category</h2>
              </div>
              <div class="accounts-box">
                <div class="cela-accounts-box">
                  <div class="cela-5kaccounts-firstbox">
                    <p>5K Account</p>
                    <!-- <p class="5ktransaction-count tc">0 Transaction</p> -->
                  </div>
                  <div class="cela-5kaccounts-secondbox">
                    <a href="civilian-5kloan-transactionlist.php" id="ce-show-link">Show</a>
                  </div>
                </div>
                <div class="cela-accounts-box">
                  <div class="cela-10kaccounts-firstbox">
                    <p>10K Account</p>
                    <!-- <p class="10ktransaction-count tc">0 Transaction</p> -->
                  </div>
                  <div class="cela-10kaccounts-secondbox">
                    <a href="civilian-10kloan-transactionlist.php" id="ce-show-link">Show</a>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  </article>


<!-- Edit Civilian Employee Profile MODAL -->
<section id="edit_ce_profile_container">
  <div class="edit_ce_profile_panel">
    <form id="edit_ce_profile_form">
      <div class="edit_ce_titlebox">
        <h3 align="center">Edit Your Profile</h3>
      </div>
      <div class="edit_ce_input_box">
        <div class="edit_ce_imagebox_container">
          <div class="edit_ce_imagebox">
            <img src="" id="edit_ce_avatar" />
          </div>
          <div class="edit_image_link">
            <input type="button" name="btn_change_ceimage" id="btn_change_ceimage" value="Change Image Profile" />
          </div>
        </div>
        <div class="edit_ce_textfield_container">
          <input type="text" name="edit_txt_ce_fName" id="edit_txt_ce_fName" />
          <input type="text" name="edit_txt_ce_mName" id="edit_txt_ce_mName" />
          <input type="text" name="edit_txt_ce_lName" id="edit_txt_ce_lName" />
          <input type="text" name="edit_txt_ce_unit" id="edit_txt_ce_unit" />
          <input type="email" name="edit_txt_ce_email" id="edit_txt_ce_email" />
          <input type="text" name="edit_txt_ce_contactno" id="edit_txt_ce_contactno" />
          <input type="text" name="edit_txt_ce_bDate" id="edit_txt_ce_bDate" />
        </div>
        <div class="btn_update_ce_box" align="center">
          <input type="submit" name="btn_update_ce_profile" id="btn_update_ce_profile" value="Update Profile" />
          <button type="button" name="ce_btn_close" id="ce_btn_close" onclick="document.getElementById('edit_ce_profile_container').style.display='none'">
            Close
          </button>
        </div>
      </div>
    </form>
  </div>
</section>

  <!--Loan Request Form-->
  <section id="lrf-container_5k">
    <form action="loanrequest5k.php" method="POST" id="loanRequestForm">
      <div class="lrf-inner-container">
        <div class="lrf-top-container">
          <div class="lrf-header">
            <h3 align="center">Loan Request Form</h3>
            <button type="button" class="btn_lrf_close" onclick="document.getElementById('lrf-container_5k').style.display='none'">
              Close
            </button>
          </div>
          <div class="lrf-type-of-account-box">
            <label for="type_of_account">Type of account:</label>
            <input type="hidden" name = "type_of_account" class ="lk_rate" value="5K Account" />
            <input type="text" class ="lk_rate" disabled value="5K Account" />
          </div>
        </div>
        <hr>
        <div class="lrf-midinputbox">
          <div class="lrf-midinputbox-inner">
            <div class="lrf-bfn-container mid_box_item">
              <label for="lrf-txt-borrowerfname">Firstname</label>
              <input type="hidden" name="lrf-txt-borrowerid" value="<?php echo $_SESSION['ce_id']; ?>" />
              <input type="hidden" name="lrf-txt-borrowerfname" id="lrf-txt-borrowerfname" value = "<?php echo $_SESSION['fname']; ?>" />
              <input type="text" disabled id="lrf-txt-borrowerfname" id="lrf-txt-borrowerfname" value = "<?php echo $_SESSION['fname']; ?>" />
            </div>
            <div class="lrf-bmn-container mid_box_item">
              <label for="lrf-txt-borrowermname">Middle name</label>
              <input type="hidden" name="lrf-txt-borrowermname" id="lrf-txt-borrowermname" value = "<?php echo $_SESSION['mname']; ?>" />
              <input type="text" disabled id="lrf-txt-borrowermname" id="lrf-txt-borrowermname" value = "<?php echo $_SESSION['mname']; ?>" />
            </div>
            <div class="lrf-bln-container mid_box_item">
              <label for="lrf-txt-borrowerlname">Last name</label>
              <input type="hidden" name="lrf-txt-borrowerlname" id="lrf-txt-borrowerlname" value = "<?php echo $_SESSION['lname']; ?>"/>
              <input type="text" disabled id="lrf-txt-borrowerlname" id="lrf-txt-borrowerlname" value = "<?php echo $_SESSION['lname']; ?>"/>
            </div>
            <div class="lrf-boff-container mid_box_item">
              <label for="lrf-txt-borroweroffice">Office</label>
              <input type="hidden" name="lrf-txt-borroweroffice" id="lrf-txt-borroweroffice" value = "<?php echo $_SESSION['ce_office']; ?>" />
              <input type="text" disabled id="lrf-txt-borroweroffice" id="lrf-txt-borroweroffice" value = "<?php echo $_SESSION['ce_office']; ?>" />
            </div>
            <input type="hidden" name="lrf-txt-borrowerrank" id="lrf-txt-borrowerrank" value = "<?php echo $_SESSION['ce_rank']; ?>" />
            <input type="hidden" name="lrf-txt-borrowertype" id="lrf-txt-borrowertype" value = "<?php echo $_SESSION['type_of_employee']; ?>" />
          </div>
        </div>
        <hr>
        <div class="lrf-loanrates">
          <div class="lrf-loanrates-inner">
          <?php
          while($res = $lr5k->fetch_array(MYSQLI_ASSOC)){
            $rates_id = $res['5k_rates_id'];
            $type_of_loan_5k = $res['type_of_loan'];
            $loan_amount_rates_5k = $res['5k_loan_amount_rates'];
            $monthly_payment_rates_5k = $res['5k_monthly_payment_rates'];
            $credit_rates_5k = $res['5k_credit_rates'];
            $beginning_balance_5k = $res['5k_beginning_balance_rates'];
            $interest_rates_5k = $res['5k_interest_rate'];
            $penalty_permonth_rates_5k = $res['5k_penalty_permonth_rates'];
            $date_today = date("j-M-y");
            $formatted_string = "950CEISG-000";
          }
          echo '<div class="firstbox">';
          echo '<label for="loan_amount_rates_5k">Loan Amount</label>';
          echo '<label for="monthly_payment_rates_5k">Monthly Payment</label>';
          echo '<label for="credit_rates_5k">Credit</label>';
          echo '<label for="beginning_balance_5k">Beginning Balance</label>';
          echo '<label for="interest_rates_5k">Interest Rate</label>';
          echo '<label for="penalty_permonth_rates_5k">Penalty Per Month</label>';
          echo '<label for="date_today">Date</label>';
          echo '</div>';

          echo '<div class="secondbox">';
          echo '<input type="hidden" name="formatted_string" value="'.$formatted_string.'" />';
          echo '<input type="hidden" name="loan_amount_rates_5k" class="lk_rate" value="'.$loan_amount_rates_5k.'" />';
          echo '<input type="text" id="loan_amount_rates_5k" disabled class="lk_rate" value="'.$loan_amount_rates_5k.'" />';
          echo '<input type="hidden" name="monthly_payment_rates_5k" class="lk_rate" value="'.$monthly_payment_rates_5k.'" />';
          echo '<input type="text" id="monthly_payment_rates_5k" disabled class="lk_rate" value="'.$monthly_payment_rates_5k.'" />';
          echo '<input type="hidden" name="credit_rates_5k" class="lk_rate" value="'.$credit_rates_5k.'" />';
          echo '<input type="text" id="credit_rates_5k" disabled class="lk_rate" value="'.$credit_rates_5k.'" />';
          echo '<input type="hidden" name="beginning_balance_5k" class="lk_rate" value="'.$beginning_balance_5k.'" />';
          echo '<input type="text" id="beginning_balance_5k" disabled class="lk_rate" value="'.$beginning_balance_5k.'" />';
          echo '<input type="hidden" name="interest_rates_5k" class="lk_rate" value="'.$interest_rates_5k.'" />';
          echo '<input type="text" id="interest_rates_5k" disabled class="lk_rate" value="'.$interest_rates_5k.'" />';
          echo '<input type="hidden" name="penalty_permonth_rates_5k" class="lk_rate" value="'.$penalty_permonth_rates_5k.'" />';
          echo '<input type="text" id="penalty_permonth_rates_5k" disabled class="lk_rate" value="'.$penalty_permonth_rates_5k.'" />';
          echo '<input type="hidden" name="date_today" class="lk_rate" value="'.$date_today.'" />';
          echo '<input type="text" id="date_today" disabled class="lk_rate" value="'.$date_today.'" />';
          echo '</div>';
          ?>
          </div>
        </div>
        <hr>
        <div class="lrf-btn-action" align='center'>
          <input type="submit" name="lrf_btn_submit_5k" id="lrf_btn_submit_5k" value="Submit" />
          <!-- <input type="button" name="lrf_btn_cancel" id="lrf_btn_cancel" value="Cancel" /> -->
        </div>
      </div>
    </form>
  </section>

  <section id="lrf-container_10k">
    <form action="" method="" id="loanRequestForm">
      <div class="lrf-inner-container">
        <div class="lrf-top-container">
          <div class="lrf-header">
            <h3 align="center">Loan Request Form</h3>
            <button type="button" class="btn_lrf_close" onclick="document.getElementById('lrf-container_10k').style.display='none'">
              Close
            </button>
          </div>
          <div class="lrf-type-of-account-box">
            <label for="type_of_account">Choose type of Account:</label>
            <input type="text" disabled value="10K Account" />
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
        <div class="lrf-loanrates">
          <div class="lrf-loanrates-inner">
            <p>HUHUGUTIN KAY DATABASE PHP</p>
          </div>
        </div>
        <hr>
        <div class="lrf-btn-action" align='center'>
          <input type="submit" name="lrf_btn_submit_10k" id="lrf_btn_submit_10k" value="Submit" />
        </div>
      </div>
    </form>
  </section>

</body>
</html>