<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="css/registerCEAccount.css">
  <title>Civilian Employee Sign Up Form</title>
</head>
<body>
  <main>

    <header id="cl-header">
      <nav>
        <ul>
          <li>
            <a href="../index.php">Home</a>
          </li>
        </ul>
      </nav>
    </header>
    
    <section id = "rc-container">
      <h3>Create New Civilian Account</h3>
      <div id = "rc-credentials-container">
        <form action = "" method = "POST" id = "civilian_register_form">
          <div id="rc-personaldetails">
            <div class="rc-header">
              <label>Personal Details</label>
            </div>
            <div id = "rc-input-inner">
              <input type="text" name = "txt_Civilian_firstname" id = "txt_Civilian_firstname" placeholder = "Firstname" />
              <input type="text" name = "txt_Civilian_middlename" id = "txt_Civilian_middlename" placeholder = "Middle Name" />
              <input type="text" name = "txt_Civilian_lastname" id = "txt_Civilian_lastname" placeholder = "Lastname" />
              <input type="text" name = "txt_Civilian_email" id = "txt_Civilian_email" placeholder = "Email" />
              <input type="text" name = "txt_Civilian_birthdate" id = "txt_Civilian_birthdate" placeholder = "Birthdate" />
              <input type="text" name = "txt_Civilian_contactnumber" id = "txt_Civilian_contactnumber" placeholder = "Contact Number" />
            </div>
          </div>
          <hr>
          <div id="rc-accountdetails">
            <div class="rc-header">
              <label>Account Details</label>
            </div>
            <div id = "rc-input-inner">
              <input type="text" name = "txt_Civilian_username" id = "txt_Civilian_username" placeholder = "Username" />
              <input type="password" name = "txt_Civilian_password" id = "txt_Civilian_password" placeholder="Password" />
              <input type="password" name = "txt_Civilian_confirmPassword" id = "txt_Civilian_confirmPassword" placeholder="Confirm Password"/>
            </div>
          </div>
          <div id = "register-action">
            <input type="submit" formid = "rc-label" name = "btn-submit-new-Civilian" id = "btn-submit-new-Civilian" value="Register"/>
          </div>
          <p>* Double check you inputted data before saving it</p>
        </form>
      </div>
    </section>

  </main>
</body>
</html>