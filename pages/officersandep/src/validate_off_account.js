const validate_input = () => {
  var valid = true;

  var txt_officersandep_username = document.getElementById('txt_officersandep_username').value;
  var txt_officersandep_password = document.getElementById('txt_officersandep_password').value;
  var txt_officersandep_confirmPassword = document.getElementById('txt_officersandep_confirmPassword').value;

  if(txt_officersandep_username == ""){
    document.getElementById('txt_officersandep_username').style.border = '1px solid #FF0C25';
    valid = false;
  }

  if(txt_officersandep_password == ""){
    document.getElementById('txt_officersandep_password').style.border = '1px solid #FF0C25';
    valid = false;
  }

  if(txt_officersandep_confirmPassword == ""){
    document.getElementById('txt_officersandep_confirmPassword').style.border = '1px solid #FF0C25';
    valid = false;
  }

  if(txt_officersandep_password != txt_officersandep_confirmPassword){
    document.getElementById('txt_officersandep_password').style.border = '1px solid #FF0C25';
    document.getElementById('txt_officersandep_confirmPassword').style.border = '1px solid #FF0C25';
    valid = false;
  }

  return valid;

}