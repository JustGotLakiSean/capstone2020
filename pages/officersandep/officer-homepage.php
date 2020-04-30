<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="css/oep-homepage.css">
  <link rel="stylesheet" href="css/loanrequest-oaep.css">
  <title>Home | Officers and EP</title>
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
    <section class="oaep-homepage" >
      <div class="oaep-inner-content">
        <div class="oaeppd-container">
          <div class="oaeppd-header">
            <h4>Personal Details</h4>
          </div>
          <div class="oaeppd-inner-content">
            <div class="moreoption-button-container">
              <button type="button" class="oep-btnmo" onclick="document.getElementById('edit_oaep_profile_container').style.display='block'">
                Edit
              </button>
            </div>
            <div class="oep-detailbox">
              <div class="oaeppd-imagebox-container">
                <div class="oaeppd-imagebox">
                  <img src="" id="oep-avatar" />
                </div>
              </div>
              <div class="oaeppd-box">
                <div class="oaeppd-fullname-box">
                  <p id="oep-fullname">JEAN JOSHUA HAPLASCA VILLANUEVA</p>
                </div>
                <div class="oaeppd-office-box">
                  <p>Office</p>
                </div>
                <div class="oaeppd-contact-box">
                  <p>Contact Number</p>
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
              <button type="button" id="oep-btnrequest" onclick="document.getElementById('lrf-container').style.display='block'">
                Request
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
                    <p class="5ktransaction-count tc">0 Transaction</p>
                  </div>
                  <div class="oaepla-5kaccounts-secondbox">
                    <a href="#" id="oep-show-link">Show</a>
                  </div>
                </div>
                <div class="oaepla-accounts-box">
                  <div class="oaepla-10kaccounts-firstbox">
                    <p>10K Account</p>
                    <p class="10ktransaction-count tc">0 Transaction</p>
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