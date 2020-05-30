<?php
echo <<<STYLE
<style>
body {
  background: rgb(51, 51, 51);
  margin: 0;
  height: auto;
  font-family: 'Franklin Gothic Book', 'Arial Narrow', Arial, sans-serif;
}

#oep-header {
  margin: 0;
  padding: 0;
  overflow-y: hidden;
}

#oep-header nav {
  height: 40px;
  width: 100%;
  background-color: #1A1A1A;
  color: #333;
}

#oep-header nav ul {
  padding: 0;
  margin: 0;
}

#oep-header nav li {
  text-align: center;
}

#oep-header nav a {
  display: inline-block;
  width: 100px;
  text-align: center;
  text-decoration: none;
  padding: 10px 0;
  color: #fff;
  text-decoration: none;
}

#oep-signin-container {
  top: 10vh;
  max-width: 330px;
  margin: auto;
  background: #fff;
  box-shadow: 5px 2px 10px rgba(126, 125, 125, 0.1),
  -5px 2px 10px rgba(126, 125, 125, 0.1);
  border-radius: 15px;
  position: relative;
}

#oep-signin-label-container {
  background: #1A1A1A;
  border-radius: 5px;
  height: 6vh;
}

h1 {
  position: relative;
  top: 8px;
  color: #fff;
  margin: 0;
  padding: 0;
  text-align: center;
  font-size: 20px;
  font-weight: lighter;
}

#oep-signin-form {
  width: 300px;
  margin: auto;
  height: 355px;
  display: flex;
  flex-direction: column;
  position: relative;
  top: 30px;
}

#oep-credentials-container {
  display: grid;
  grid-auto-flow: row;
  grid-gap: 5px;
}

#oep-credentials-container input[type=text], input[type=password] {
  width: 288px;
  height: 28px;
  border: 1px solid #B3B3B3;
  background: #E6E6E6;
  padding-left: 10px;
  border-radius: 5px;
  font-size: 1rem;
}

#btn_oepsubmit_login {
  height: 40px;
  background: #1A1A1A;
  color: white;
  font-size: 1rem;
  border: none;
  border-radius: 5px;
}

#btn_oepsubmit_login:disabled {
  background: #E6E6E6;
  color: #B3B3B3;
}

hr {
  margin: 16px 0 16px 0;
  padding: 0;
  border: 0;
  height: 1px;
  background: #dadada;
  overflow: visible;
  text-align: center;
}

.hr-or:after {
  content: "OR";
  position: relative;
  display: inline-block;
  top: -0.5em;
  font-size: 15px;
  padding: 0 0.25em;
  background: #fff;
  color: #BCBEC0;
}

#oep-signin-as-options {
  display: flex;
  flex-direction: column;
  align-items: center;
  justify-content: space-around;
}

#oep-signin-as-options > label {
  text-align: center;
  color: #BCBEC0;
}

.oep-btn-option {
  margin-top: 1rem;
}

.oep-btn-option input[type=button] {
  width: 148px;
  height: 45px;
  border-radius: 5px;
}

#btn-al-link {
  background: #fff;
  border: 1px solid #BCBEC0;
  color: #000;
  cursor: pointer;
}

#btn-ce-link {
  background: #006837;
  color: white;
  border: none;
  cursor: pointer;
}

#oep-options {
  text-align: center;
}

#oep-options a {
  text-decoration: none;
  color: #1A1A1A;
  font-size: 1rem;
  cursor: pointer;
}

#officer_info_container {
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

#officer_info_panel {
  position: relative;
  top: 10%;
  width: 500px;
  max-height: 500px;
  margin: auto;
  background: #F2F2F2;
  border-radius: 5px;
  border: none;
}

#officer_info_panel_title_box {
  position: relative;
  height: 26px;
  background: #1A1A1A;
  border-radius: 5px;
  color: #fff;
}

#newoffaccclose {
  position: absolute;
  top: 1px;
  right: 10px;
  cursor: pointer;
  transition: 100ms ease-in;
  height: 23px;
  width: 60px;
  border-radius: 5px;
}

#newoffaccclose:hover {
  background: rgb(51, 51, 51);
  color: #fff;
}

#officer_info_panel_title_box > h3 {
  text-align: center;
  font-weight: lighter;
  margin: 0;
  position: relative;
  top: 2px;
}

#off_list_container {
  position: relative;
  top: 10px;
  width: 380px;
  height: 450px;
}

#off_list {
  background: #E6E6E6;
  border-radius: 5px;
  width: 36.3vw;
  max-height: 38vh;
  overflow: auto;
  border: 2px solid #1A1A1A;
}

.off_fullname {
  text-align: center;
  margin-bottom: 5px;
  width: 25.5vw;
  color: #FFF;
  background: #1A1A1A;
  border: none;
  border-radius: 5px;
  height: 30px;
  font-size: .7rem;
}

.btn_reg_off_info {
  border: 3px solid #1A1A1A;
  margin-left: 10px;
  border-radius: 5px;
  font-size: .8rem;
  font-weight: bold;
  color: #1A1A1A;
  width: 110px;
  height: 30px;
  cursor: pointer;
  transition: 100ms ease-in;
}

.btn_reg_off_info:hover {
  background: #1A1A1A;
  color: #fff;
}

/* width */
::-webkit-scrollbar {
  width: 7px;
}

/* Track */
::-webkit-scrollbar-track {
  background: #E6E6E6;
  border-radius: 2px;
}

/* Handle */
::-webkit-scrollbar-thumb {
  background: #ccc;
  border-radius: 7px;
}

/* Handle on hover */
::-webkit-scrollbar-thumb:hover {
  background: #808080;
}
</style>
STYLE;
?>