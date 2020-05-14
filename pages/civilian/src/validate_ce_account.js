const validate_input = () => {
  var valid = true;

  var txt_Civilian_username = document.getElementById('txt_Civilian_username').value;
  var txt_Civilian_password = document.getElementById('txt_Civilian_password').value;
  var txt_Civilian_confirmPassword = document.getElementById('txt_Civilian_confirmPassword').value;

  if(txt_Civilian_username == ""){
    document.getElementById('txt_Civilian_username').style.border = '1px solid #FF0C25';
    valid = false;
  }

  if(txt_Civilian_password == ""){
    document.getElementById('txt_Civilian_password').style.border = '1px solid #FF0C25';
    valid = false;
  }

  if(txt_Civilian_confirmPassword == ""){
    document.getElementById('txt_Civilian_confirmPassword').style.border = '1px solid #FF0C25';
    valid = false;
  }

  if(txt_Civilian_password != txt_Civilian_confirmPassword){
    document.getElementById('txt_Civilian_password').style.border = '1px solid #FF0C25';
    document.getElementById('txt_Civilian_confirmPassword').style.border = '1px solid #FF0C25';
    valid = false;
  }

  return valid;
}

const validate_ce_login = () => {
  var valid = true;

  var civ_username = document.getElementById('civ_username').value;
  var civ_password = document.getElementById('civ_password').value;

  if(civ_username){
    document.getElementById('civ_username').style.border = '1px solid #FF0C25';
    valid = false;
  }

  if(civ_password){
    document.getElementById('civ_password').style.border = '1px solid #FF0C25';
    valid = false;
  }

  return valid;

}