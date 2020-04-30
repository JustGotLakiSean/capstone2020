<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="css/registerOEPAccount.css">
  <title>Officers and EP Sign Up Form</title>
</head>
<body>
  <main>

    <header id="oep-header">
      <nav>
        <ul>
          <li>
            <a href="../index.php">Home</a>
          </li>
        </ul>
      </nav>
    </header>

    <section id = "roep-container">
      <h3>Create New Officers and EP Account</h3>
      <div id = "roep-credentials-container">
        <form action = "" method = "POST" id = "officersandep_register_form">
          <div id="roep-personaldetails">
            <div class="roep-header">
              <label>Personal Details</label>
            </div>
            <div id = "roep-input-inner">
              <input type="text" name = "txt_officersandep_firstname" id = "txt_officersandep_firstname" placeholder = "Firstname" />
              <input type="text" name = "txt_officersandep_middlename" id = "txt_officersandep_middlename" placeholder = "Middle Name" />
              <input type="text" name = "txt_officersandep_lastname" id = "txt_officersandep_lastname" placeholder = "Lastname" />
              <input type="text" name = "txt_officersandep_email" id = "txt_officersandep_email" placeholder = "Email" />
              <input type="text" name = "txt_officersandep_birthdate" id = "txt_officersandep_birthdate" placeholder = "Birthdate" />
              <input type="text" name = "txt_officersandep_contactnumber" id = "txt_officersandep_contactnumber" placeholder = "Contact Number" />
            </div>
          </div>
          <hr>
          <div id="roep-accountdetails">
            <div class="roep-header">
              <label>Account Details</label>
            </div>
            <div id = "roep-input-inner">
              <input type="text" name = "txt_officersandep_username" id = "txt_officersandep_username" placeholder = "Username" />
              <input type="password" name = "txt_officersandep_password" id = "txt_officersandep_password" placeholder="Password"/>
              <input type="password" name = "txt_officersandep_confirmPassword" id = "txt_officersandep_confirmPassword" placeholder="Confirm Password"/>
            </div>
          </div>
          <div id = "register-action">
            <input type="submit" name="btn-submit-new-oep" disabled id="btn-submit-new-oep" value="Register" />
          </div>
          <p>* Double check you inputted data before saving it</p>
        </form>
      </div>
    </section>

  </main>
</body>
</html>