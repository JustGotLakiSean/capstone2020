<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="css/oaep5kloanlist.css">
  <link rel="stylesheet" href="css/loanrequest-oaep.css">
  <title>5K Account Transaction List</title>
</head>
<body>

  <header id="oep-header">
    <nav>
      <ul>
        <li>
          <a href="../index.php" class="oaep-home-link">950th CEISG</a>
        </li>
        <li>
          <input type="button" name="oep-btnaction" id="oep-btnaction" onclick="document.getElementById('oaep_menu_box').style.display='flex'" value="Your Account" />
          <div id="oaep_menu_box">
            <a href="#">Account Details</a>
            <a href="#">Sign Out</a>
          </div>
        </li>
      </ul>
    </nav>
  </header>

  <article onclick="document.getElementById('oaep_menu_box').style.display='none'">
    <section class="oaep-5ktl-container">
      <div class="oaep-5ktl-inner-content">
        <div class="oaep-5ktl-header">
          <div class="oaep-5ktl-title-container">
            <h3>5K Account Transaction List</h3>
          </div>
          <div class="oaep-5ktl-requestbutton-container">
            <input type="button" name="btn-request" onclick="document.getElementById('lrf-container').style.display='block'" id="btn-request" value="Request" />
          </div>
        </div>
        <hr>
        <div class="oaep5ktl-content">
          <div class="oaep5ktl-notransaction">
            <h1>No Transactions for 5K Account</h1>
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

</body>
</html>