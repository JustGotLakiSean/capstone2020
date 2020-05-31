<?php
namespace loan950;
use \loan950\db_access;
include('../../dbaccess/db_access.php');
$db = new db_access();
$lr5k = $db->loan_rates_5K();
$lr10k = $db->loan_rates_10K();
session_start();

if(!isset($_SESSION['officer_account_id']) && !isset($_SESSION['officer_username'])){
  header('location: officer-ep-login.php');
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <?php
  include('css/loanrequest-oaep.php');
  include('css/oep-homepage.php');
  ?>
  <title>Home | Officers and EP</title>
</head>
<body>

  <header id="oep-header">
    <nav>
      <ul>
        <li>
          <a href="officer-homepage.php" class="oaep-home-link">950th CEISG</a>
        </li>
        <li>
          <input type="button" name="oep-btnaction" id="oep-btnaction" onclick="document.getElementById('oaep_menu_box').style.display='flex'" value="Your Account" />
          <div id="oaep_menu_box">
            <a href="logout_officer.php">Sign Out</a>
          </div>
        </li>
      </ul>
    </nav>
  </header>

  <article onclick="document.getElementById('oaep_menu_box').style.display='none'">
    <section class="oaep-homepage" >
      <div class="oaep-inner-content">
        <div class="oaeppd-container">
          <div class="oaeppd-header">
            <h4>Hello, <?php echo $_SESSION['officer_username']; ?></h4>
          </div>
          <div class="oaeppd-inner-content">
            <!-- <div class="moreoption-button-container">
              <button type="button" class="oep-btnmo" onclick="document.getElementById('edit_oaep_profile_container').style.display='block'">
                Edit
              </button>
            </div> -->
            <div class="oep-detailbox">
              <div class="oaeppd-imagebox-container">
                <div class="oaeppd-imagebox">
                  <img src="" id="oep-avatar" />
                </div>
              </div>
              <div class="oaeppd-box">
                <div class="oaeppd-fullname-box">
                  <p id="oep-fullname"><?php echo $_SESSION['officer_fullname']; ?></p>
                </div>
                <div class="oaeppd-office-box">
                  <p><?php echo $_SESSION['officer_headquarter']; ?></p>
                </div>
                <div class="oaeppd-contact-box">
                  <p><?php echo $_SESSION['officer_contactNumber']; ?></p>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="oaepla-container">
          <div class="oaepla-header">
            <h4>Loan Account</h4>
          </div>
          <div class="oaepla-inner-content">
            <div class="oaepla-requestbutton-container">
              <button type="button" id="oep-btnrequest" onclick="document.getElementById('lrf-container_5k').style.display='block'">
                Request 5K Loan
              </button>
              <button type="button" id="oep-btnrequest" onclick="document.getElementById('lrf-container_10k').style.display='block'">
                Request 10K Loan
              </button>
            </div>
            <div class="oaepla-loancategory">
              <div class="oaepla-loancategory-header">
                <h2>Category</h2>
              </div>
              <div class="accounts-box">
                <div class="oaepla-accounts-box">
                  <div class="oaepla-5kaccounts-firstbox">
                    <p>5K Account</p>
                  </div>
                  <div class="oaepla-5kaccounts-secondbox">
                    <a href="#" id="oep-show-link">Show</a>
                  </div>
                </div>
                <div class="oaepla-accounts-box">
                  <div class="oaepla-10kaccounts-firstbox">
                    <p>10K Account</p>
                    <!-- <p class="10ktransaction-count tc">0 Transaction</p> -->
                  </div>
                  <div class="oaepla-10kaccounts-secondbox">
                    <a href="#" id="oep-show-link">Show</a>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  </article>

  <!-- Edit Officers and EP Profile MODAL -->
  <section id="edit_oaep_profile_container">
    <div class="edit_oaep_profile_panel">
      <form id="edit_oaep_profile_form">
        <div class="edit_oaep_titlebox">
          <h3 align="center">Edit Your Profile</h3>
        </div>
        <div class="edit_oaep_input_box">
          <div class="edit_oaep_imagebox_container">
            <div class="edit_oaep_imagebox">
              <img src="" id="edit_oaep_avatar" />
            </div>
            <div class="edit_image_link">
              <input type="button" name="btn_change_oaepimage" id="btn_change_oaepimage" value="Change Image Profile" />
            </div>
          </div>
          <div class="edit_oaep_textfield_container">
            <input type="text" name="edit_txt_oaep_fName" id="edit_txt_oaep_fName" />
            <input type="text" name="edit_txt_oaep_mName" id="edit_txt_oaep_mName" />
            <input type="text" name="edit_txt_oaep_lName" id="edit_txt_oaep_lName" />
            <input type="text" name="edit_txt_oaep_unit" id="edit_txt_oaep_unit" />
            <input type="text" name="edit_txt_oaep_rank" id="edit_txt_oaep_rank" />
            <input type="email" name="edit_txt_oaep_email" id="edit_txt_oaep_email" />
            <input type="text" name="edit_txt_oaep_contactno" id="edit_txt_oaep_contactno" />
            <input type="text" name="edit_txt_oaep_bDate" id="edit_txt_oaep_bDate" />
          </div>
          <div class="btn_update_oaep_box" align="center">
            <input type="submit" name="btn_update_oaep_profile" id="btn_update_oaep_profile" value="Update Profile" />
            <button type="button" name="oaep_btn_close" id="oaep_btn_close" onclick="document.getElementById('edit_oaep_profile_container').style.display='none'">
              Close
            </button>
          </div>
        </div>
      </form>
    </div>
  </section>

  <!--Loan Request Form-->
  <section id="lrf-container_5k">
    <form action="oaep_loanrequest5k.php" method="POST" id="loanRequestForm">
      <div class="lrf-inner-container">
        <div class="lrf-top-container">
          <div class="lrf-header">
            <h3 align="center">Loan Request Form</h3>
            <button type="button" class="btn_lrf_close" onclick="document.getElementById('lrf-container_5k').style.display='none'">
              Close
            </button>
          </div>
          <div class="lrf-type-of-account-box">
            <label for="type_of_account">Choose type of Account:</label>
            <input type="hidden" name="type_of_account" class="lk_rate" value="5k" />
            <input type="text" class="lk_rate" disabled value="5K Account" />
          </div>
        </div>
        <hr>
        <div class="lrf-midinputbox">
          <div class="lrf-midinputbox-inner">
            <div class="lrf-bfn-container mid_box_item">
              <label for="lrf-txt-borrowerfname">Firstname</label>
              <input type="hidden" name="lrf-txt-borrowerid" value="<?php echo $_SESSION['officer_id']; ?>" />
              <input type="hidden" name="lrf-txt-borroweraccountid" value="<?php echo $_SESSION['officer_account_id']; ?>" />
              <input type="hidden" name="lrf-txt-borroweremail" value="<?php echo $_SESSION['officer_email']; ?>" />
              <input type="hidden" name="lrf-txt-borrowerfname" value="<?php echo $_SESSION['officer_fName']; ?>" />
              <input type="text" disabled id="lrf-txt-borrowerfname" value="<?php echo $_SESSION['officer_fName']; ?>" />
            </div>
            <div class="lrf-bmn-container mid_box_item">
              <label for="lrf-txt-borrowermname">Middle name</label>
              <input type="hidden" name="lrf-txt-borrowermname" value="<?php echo $_SESSION['officer_mName']; ?>" />
              <input type="text" disabled  id="lrf-txt-borrowermname" value="<?php echo $_SESSION['officer_mName']; ?>" />
            </div>
            <div class="lrf-bln-container mid_box_item">
              <label for="lrf-txt-borrowerlname">Last name</label>
              <input type="hidden" name="lrf-txt-borrowerlname" value="<?php echo $_SESSION['officer_lName']; ?>" />
              <input type="text" disabled id="lrf-txt-borrowerlname" value="<?php echo $_SESSION['officer_lName']; ?>" />
            </div>
            <div class="lrf-boff-container mid_box_item">
              <label for="lrf-txt-borroweroffice">Office</label>
              <input type="hidden" name="lrf-txt-borroweroffice" value="<?php echo $_SESSION['officer_headquarter']; ?>" />
              <input type="text" disabled id="lrf-txt-borroweroffice" value="<?php echo $_SESSION['officer_headquarter']; ?>" />
            </div>
            <input type="hidden" name="lrf-txt-borrowerrank" value="<?php echo $_SESSION['officer_rank']; ?>" />
            <input type="hidden" name="lrf-txt-borrowertype" value="<?php echo $_SESSION['type_of_employee']; ?>" />
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
            // $date_today = date("j-M-y");
            $formatted_string = "950CEISG-000";
            $debit_pay_5k = 0;
            $status = 0;
            $first_payment = 0;
            $second_payment = 0;
            $third_payment = 0;
            $fourth_payment = 0;
            $fifth_payment = 0;
            $full_payment = 0;
            $is_new_loan = 1;
            }
            echo '<div class="firstbox">';
          echo '<label for="loan_amount_rates_5k">Loan Amount</label>';
          echo '<label for="monthly_payment_rates_5k">Monthly Payment</label>';
          echo '<label for="credit_rates_5k">Credit</label>';
          echo '<label for="beginning_balance_5k">Beginning Balance</label>';
          echo '<label for="interest_rates_5k">Interest Rate</label>';
          echo '<label for="penalty_permonth_rates_5k">Penalty Per Month</label>';
          // echo '<label for="date_today">Date</label>';
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
          echo '<input type="hidden" name="debit_pay_5k" value="'.$debit_pay_5k.'" />';
          echo '<input type="hidden" name="loan_status_5k" value="'.$status.'" />';
          echo '<input type="hidden" name="first_payment_5k" value="'.$first_payment.'" />';
          echo '<input type="hidden" name="second_payment_5k" value="'.$second_payment.'" />';
          echo '<input type="hidden" name="third_payment_5k" value="'.$third_payment.'" />';
          echo '<input type="hidden" name="fourth_payment_5k" value="'.$fourth_payment.'" />';
          echo '<input type="hidden" name="fifth_payment_5k" value="'.$fifth_payment.'" />';
          echo '<input type="hidden" name="full_payment_5k" value="'.$full_payment.'" />';
          echo '<input type="hidden" name="is_new_loan_5k" value="'.$is_new_loan.'" />';
          // echo '<input type="hidden" name="date_today" class="lk_rate" value="'.$date_today.'" />';
          // echo '<input type="text" id="date_today" disabled class="lk_rate" value="'.$date_today.'" />';
          echo '</div>';
            ?>
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

  <section id="lrf-container_10k">
    <form action="loanrequest5k.php" method="POST" id="loanRequestForm">
      <div class="lrf-inner-container">
        <div class="lrf-top-container">
          <div class="lrf-header">
            <h3 align="center">Loan Request Form</h3>
            <button type="button" class="btn_lrf_close" onclick="document.getElementById('lrf-container_10k').style.display='none'">
              Close
            </button>
          </div>
          <div class="lrf-type-of-account-box">
            <label for="type_of_account">Type of account:</label>
            <input type="hidden" name = "type_of_account_10k" class ="lk_rate" value="10k" />
            <input type="text" class ="lk_rate" disabled value="10K Account" />
          </div>
        </div>
        <hr>
        <div class="lrf-midinputbox">
          <div class="lrf-midinputbox-inner">
            <div class="lrf-bfn-container mid_box_item">
              <label for="lrf-txt-borrowerfname_10k">Firstname</label>
              <input type="hidden" name="lrf-txt-borrowerid_10k" value="<?php echo $_SESSION['officer_id']; ?>" />
              <input type="hidden" name="lrf-txt-borroweraccoundid_10k" value="<?php echo $_SESSION['officer_account_id']; ?>" />
              <input type="hidden" name="lrf-txt-borroweremail_10k" value="<?php echo $_SESSION['officer_email']; ?>" />
              <input type="hidden" name="lrf-txt-borrowerfname_10k" value = "<?php echo $_SESSION['officer_fName']; ?>" />
              <input type="text" disabled id="lrf-txt-borrowerfname_10k" value = "<?php echo $_SESSION['officer_fName']; ?>" />
            </div>
            <div class="lrf-bmn-container mid_box_item">
              <label for="lrf-txt-borrowermname_10k">Middle name</label>
              <input type="hidden" name="lrf-txt-borrowermname_10k" id="lrf-txt-borrowermname_10k" value = "<?php echo $_SESSION['officer_mName']; ?>" />
              <input type="text" disabled id="lrf-txt-borrowermname_10k" id="lrf-txt-borrowermname_10k" value = "<?php echo $_SESSION['officer_mName']; ?>" />
            </div>
            <div class="lrf-bln-container mid_box_item">
              <label for="lrf-txt-borrowerlname_10k">Last name</label>
              <input type="hidden" name="lrf-txt-borrowerlname_10k" id="lrf-txt-borrowerlname_10k" value = "<?php echo $_SESSION['officer_lName']; ?>"/>
              <input type="text" disabled id="lrf-txt-borrowerlname_10k" id="lrf-txt-borrowerlname_10k" value = "<?php echo $_SESSION['officer_lName']; ?>"/>
            </div>
            <div class="lrf-boff-container mid_box_item">
              <label for="lrf-txt-borroweroffice_10k">Office</label>
              <input type="hidden" name="lrf-txt-borroweroffice_10k" id="lrf-txt-borroweroffice_10k" value = "<?php echo $_SESSION['officer_headquarter']; ?>" />
              <input type="text" disabled id="lrf-txt-borroweroffice_10k" id="lrf-txt-borroweroffice_10k" value = "<?php echo $_SESSION['officer_headquarter']; ?>" />
            </div>
            <input type="hidden" name="lrf-txt-borrowerrank_10k" id="lrf-txt-borrowerrank_10k" value = "<?php echo $_SESSION['officer_rank']; ?>" />
            <input type="hidden" name="lrf-txt-borrowertype_10k" id="lrf-txt-borrowertype_10k" value = "<?php echo $_SESSION['type_of_employee']; ?>" />
          </div>
        </div>
        <hr>
        <div class="lrf-loanrates">
          <div class="lrf-loanrates-inner">
            <?php
            while($res = $lr10k->fetch_array(MYSQLI_ASSOC)){
              $rates_id_10k = $res['10k_rates_id'];
              $type_of_loan_10k = $res['type_of_loan'];
              $loan_amount_rates_10k = $res['10k_loan_amount_rates'];
              $monthly_payment_rates_10k = $res['10k_monthly_payment_rates'];
              $credit_rates_10k = $res['10k_credit_rates'];
              $beginning_balance_10k = $res['10k_beginning_balance_rates'];
              $interest_rates_10k = $res['10k_interest_rate'];
              $penalty_permonth_rates_10k = $res['10k_penalty_permonth_rates'];
              $formatted_string_10k = "950CEISG-000";
              $debit_pay_10k = 0;
              $status_10k = 0;
              $first_payment_10k = 0;
              $second_payment_10k = 0;
              $third_payment_10k = 0;
              $fourth_payment_10k = 0;
              $fifth_payment_10k = 0;
              $sixth_payment_10k = 0;
              $full_payment_10k = 0;
              $is_new_loan_10k = 1;

            }

            echo '<div class="firstbox">';
            echo '<label for="loan_amount_rates_10k">Loan Amount</label>';
            echo '<label for="monthly_payment_rates_10k">Monthly Payment</label>';
            echo '<label for="credit_rates_10k">Credit</label>';
            echo '<label for="beginning_balance_10k">Beginning Balance</label>';
            echo '<label for="interest_rates_10k">Interest Rate</label>';
            echo '<label for="penalty_permonth_rates_10k">Penalty Per Month</label>';
            // echo '<label for="date_today">Date</label>';
            echo '</div>';

            echo '<div class="secondbox">';
            echo '<input type="hidden" name="formatted_string_10k" class="lk_rate" value="'.$formatted_string_10k.'" />';
            echo '<input type="hidden" name="loan_amount_rates_10k" class="lk_rate" value="'.$loan_amount_rates_10k.'" />';
            echo '<input type="text" id="loan_amount_rates_10k" disabled class="lk_rate" value="'.$loan_amount_rates_10k.'" />';
            echo '<input type="hidden" name="monthly_payment_rates_10k" class="lk_rate" value="'.$monthly_payment_rates_10k.'" />';
            echo '<input type="text" id="monthly_payment_rates_10k" disabled class="lk_rate" value="'.$monthly_payment_rates_10k.'" />';
            echo '<input tpye="hidden" name="credit_rates_10k" class="lk_rate" value="'.$credit_rates_10k.'" />';
            echo '<input type="text" id="credit_rates_10k" disabled class="lk_rate" value="'.$credit_rates_10k.'" />';
            echo '<input type="hidden" name="beginning_balance_10k" class="lk_rate" value="'.$beginning_balance_10k.'" />';
            echo '<input type="text" id="beginning_balance_10k" disabled class="lk_rate" value="'.$beginning_balance_10k.'" />';
            echo '<input type="hidden" name="interest_rates_10k" class="lk_rate" value="'.$interest_rates_10k.'" />';
            echo '<input type="text" id="interest_rates_10k" disabled class="lk_rate" value="'.$interest_rates_10k.'" />';
            echo '<input type="hidden" name="penalty_permonth_rates_10k" class="lk_rate" value="'.$penalty_permonth_rates_10k.'" />';
            echo '<input type="text" id="penalty_permonth_rates_10k" class="lk_rate" value="'.$penalty_permonth_rates_10k.'" />';
            echo '<input type="hidden" name="debit_pay_10k" value="'.$debit_pay_10k.'" />';
            echo '<input type="hidden" name="loan_status_10k" value="'.$status_10k.'" />';
            echo '<input type="hidden" name="first_payment_10k" value="'.$first_payment_10k.'" />';
            echo '<input type="hidden" name="second_payment_10k" value="'.$second_payment_10k.'" />';
            echo '<input type="hidden" name="third_payment_10k" value="'.$third_payment_10k.'" />';
            echo '<input type="hidden" name="fourth_payment_10k" value="'.$fourth_payment_10k.'" />';
            echo '<input type="hidden" name="fifth_payment_10k" value="'.$fifth_payment_10k.'" />';
            echo '<input type="hidden" name="sixth_payment_10k" value="'.$sixth_payment_10k.'" />';
            echo '<input type="hidden" name="full_payment_10k" value="'.$full_payment_10k.'" />';
            echo '<input type="hidden" name="is_new_loan_10k" value="'.$is_new_loan_10k.'" />';
            ?>
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