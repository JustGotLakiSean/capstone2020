<?php
echo <<<STYLE
<style>
body {
  background: #F2F2F2;
  margin: 0;
  font-family: 'Franklin Gothic Book', 'Arial Narrow', Arial, sans-serif;
}

#cl-header {
  margin: 0;
  padding: 0;
  overflow-y: hidden;
}

#cl-header nav {
  max-width: auto;
  height: 40px;
  background-color: #009245;
  color: #333;
}

#cl-header nav ul {
  display: flex;
  flex-direction: row;
  align-items: center;
  justify-content: space-between;
  padding: 0 10px;
  margin: 0;
}

#cl-header nav li {
  display: inline;
}

.ce-home-link {
  display: block;
  width: 100px;
  text-decoration: none;
  padding: 10px 0;
  color: #fff;
}

#cl-btnaction {
  background: #0f753f;
  border: none;
  border-radius: 3px;
  height: 4vh;
  cursor: pointer;
  color: #fff;
}

#ce_menu_box {
  position: absolute;
  top: 37px;
  right: 5px;
  width: 150px;
  height: 100px;
  font-size: .9rem;
  background: #009245;
  border-radius: 15px;
  display: none;
  flex-direction: column;
  align-items: center;
  justify-content: space-evenly;
  box-shadow: 2px 2px 5px rgba(126, 125, 125, .5),
  -2px 2px 5px rgba(126, 125, 125, .5);
}

#ce_menu_box > a {
  text-decoration: none;
  color: #fff;
  font-size: 1rem;
}

.ce-homepage {
  width: 900px;
  margin: auto;
}

.cepd-inner-content {
  height: 300px;
  background: #fff;
  border-radius: 15px;
  position: relative;
  padding: 15px;
}

.ce-btnmo {
  float: right;
  background: #0f753f;
  border: none;
  border-radius: 3px;
  height: 4vh;
  cursor: pointer;
  color: #fff;
}

.cepd-imagebox {
  width: 123px;
  height: 123px;
  border: 5px solid #009245;
  border-radius: 66px;
}

#ce-fullname {
  font-size: 29px;
}

.cepd-avatar {
  width: 123px;
  height: 123px;
}

.cela-inner-content {
  height: 300px;
  background: #fff;
  border-radius: 15px;
  position: relative;
  padding: 15px;
  margin-bottom: 50px;
}

.ce-btnrequest {
  width: 130px;
  height: 35px;
  background: #006837;
  border: none;
  border-radius: 20px;
  color: #fff;
  font-weight: lighter;
}

.cela-inner-content h2{
  font-size: 2rem;
}

.accounts-box {
  max-width: 700px;
  margin: auto;
  display: grid;
  grid-gap: 10px;
}

.cela-accounts-box {
  max-width: 710px;
  height: 60px;
  background: #F2F2F2;
  border-radius: 10px;
  display: grid;
  grid-auto-flow: column;
  align-items: center;
}

.cela-accounts-box p {
  font-size: 20px;
  margin: 0;
  padding: 0 0 0 25px;
}

.tc {
  color: #808080;
}

#ce-show-link {
  position: relative;
  left: 80%;
  text-decoration: none;
  color: #0071BC;
}

/* Edit Civilian Employee Profile MODAL */
#edit_ce_profile_container {
  margin: 0;
  padding: 0;
  position: fixed; /* Positioning and size */
  top: 0;
  left: 0;
  width: 100vw;
  height: 100vh;
  background-color: rgba(0, 0, 0, 0.9); /* color */
  display: none; /* making it hidden by default */
}

.edit_ce_profile_panel {
  display: block;
  width: 32vw;
  height: 85vh;
  margin: auto;
  background: #F2F2F2;
  border: 1px solid #dadada;
  border-radius: 5px;
  position: relative;
  top: 3rem;
  border: 0;
}

#edit_ce_profile_form {
  display: grid;
  grid-gap: 10px;
}

.edit_ce_titlebox {
  height: 26px;
  border-radius: 5px;
}

.edit_ce_titlebox h3 {
  color: #000000;
  font-weight: lighter;
  font-size: 16px;
  margin: 0;
  position: relative;
  top: 2px;
}

.edit_ce_input_box {
  display: grid;
  grid-gap: 20px;
  width: 30vw;
  margin: auto;
}

.edit_ce_imagebox_container {
  display: grid;
  grid-gap: 5px;
  margin: auto;
}

.edit_ce_imagebox {
  height: 14vh;
  width: 7vw;
  background: black;
  margin: auto;
}

#btn_change_ceimage {
  background: #fff;
  border: none;
  font-size: .8rem;
  height: 4vh;
  border-radius: 15px;
  color: #0071BC;
  font-style: italic;
  cursor: pointer;
}

.edit_ce_textfield_container {
  display: grid;
  grid-auto-flow: row;
  grid-gap: 10px;
}

.edit_ce_textfield_container input[type="text"], input[type="email"] {
  height: 4vh;
  background: #E6E6E6;
  border: 1px solid #cccccc;
  border-radius: 5px;
  padding-left: 10px;
  font-size: .9rem;
}

#btn_update_ce_profile {
  background: #006837;
  border: none;
  border-radius: 5px;
  height: 5vh;
  color: white;
  transition: 200ms ease-in;
  cursor: pointer;
}

#ce_btn_close {
  background: #808080;
  border: none;
  border-radius: 5px;
  height: 5vh;
  color: white;
  transition: 200ms ease-in;
  cursor: pointer;
}

#btn_update_ce_profile:hover {
  box-shadow: 5px 2px 10px rgba(0, 0, 0, 0.2),
  -5px 2px 10px rgba(0, 0, 0, 0.2);
}

#ce_btn_close:hover {
  box-shadow: 5px 2px 10px rgba(0, 0, 0, 0.2),
  -5px 2px 10px rgba(0, 0, 0, 0.2);
}
</style>
STYLE;
?>