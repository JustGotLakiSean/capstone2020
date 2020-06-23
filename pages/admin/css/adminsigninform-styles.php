<?php

echo <<<STYLE

<style>
body {
  // background: #fff;
  // background: linear-gradient(180deg, rgba(0,1,255,1) 0%, rgba(48,223,255,1) 80%) no-repeat center center fixed;
  // background: linear-gradient(180deg, rgba(100,255,123,1) 0%, rgba(31,96,222,1) 100%) no-repeat center center fixed;
  // background: linear-gradient(118deg, rgba(226,30,255,1) 9%, rgba(242,146,61,0.8295693277310925) 50%, rgba(44,91,229,1) 90%) no-repeat center center fixed;
  // background: linear-gradient(199deg, rgba(226,30,255,1) 0%, rgba(255,0,131,0.865983893557423) 25%, rgba(205,0,255,0.8295693277310925) 50%, rgba(255,0,236,0.8995973389355743) 77%, rgba(44,91,229,1) 100%) no-repeat center center fixed;
  // background: linear-gradient(90deg, rgba(0,112,255,1) 0%, rgba(0,255,102,1) 50%, rgba(33,243,255,1) 100%) no-repeat center center fixed;
  // background: rgb(0,112,255);
// background: linear-gradient(7deg, rgba(0,112,255,1) 0%, rgba(214,23,247,0.6306897759103641) 31%, rgba(0,255,102,0.5746673669467788) 73%, rgba(33,243,255,1) 100%) no-repeat center center fixed;
  // background: linear-gradient(98deg, rgba(28,49,143,1) 0%, rgba(239,0,255,1) 100%) no-repeat center center fixed;
  // background: linear-gradient(286deg, rgba(0,255,56,0.6839110644257703) 4%, rgba(147,48,204,1) 50%, rgba(0,255,188,1) 100%) no-repeat center center fixed;
  // background: linear-gradient(118deg, rgba(226,30,255,1) 9%, rgba(242,146,61,0.8295693277310925) 50%, rgba(44,91,229,1) 90%) no-repeat center center fixed;
  background: linear-gradient(215deg, rgba(142,0,212,1) 0%, rgba(255,0,236,0.8995973389355743) 24%, rgba(255,0,146,1) 49%, rgba(255,81,0,1) 76%, rgba(255,0,0,1) 100%) no-repeat center center fixed;
  margin: 0;
  height: auto;
  font-family: 'Roboto', 'Helvetica', 'Franklin Gothic Book', 'Arial Narrow', Arial, sans-serif;
}

#asf-header {
  margin: 0;
  padding: 0;
  overflow-y: hidden;
}

#asf-header nav {
  height: 25px;
  width: 100%;
  background-color: rgba(250, 250, 250, 0.2);
  color: #fff;
}

#asf-header nav ul {
  padding: 0;
  margin: 0;
}

#asf-header nav li {
  height: 25px;
  display: inline;
  float: left;
  transition: 40ms ease-in;
}

#asf-header nav a {
  display: inline-block;
  width: 100px;
  text-align: center;
  text-decoration: none;
  padding: 2px 0;
  color: #fff;
  text-decoration: none;
  font-weight: bold;
}

#asf-header nav li:hover {
  background-color: rgba(0, 0, 0, 0.2);
}

/* Section */
section#admin-signin-container {
  top: 10vh;
  max-width: 330px;
  margin: auto;
  padding: 5px 0 0 0;
  background-color: rgba(255, 255, 255, 1);
  // background: linear-gradient(25deg, rgba(142,0,212,1) 0%, rgba(255,0,236,0.4) 24%, rgba(255,0,146,0.4) 49%, rgba(255,81,0,0.4) 76%, rgba(255,0,0,1) 100%);
  // background: #fff;
  box-shadow: 5px 2px 10px rgba(126, 125, 125, .1),
  -5px 2px 10px rgba(126, 125, 125, .1);
  border-radius: 15px;
  position: relative;
}

#admin-signin-form {
  padding: 0;
  margin: 0 42px 0 42px;
  height: 380px;
}

section h1 {
  margin: 35px 0 0 0;
  padding: 0;
  text-align: center;
}

section hr {
  margin: 16px 0 16px 0;
  padding: 0;
  border: 0;
  height: 1px;
  background-color: rgba(250, 250, 250, 0.5);
  overflow: visible;
  text-align: center;
}

#asf-inputbox {
  display: flex;
  flex-direction: column;
}

input[type=text], input[type=password] {
  height: 32px;
  font-size: 17px;
  border: 1px #ccc solid;
  border-radius: 5px;
  margin-bottom: 12px;
  padding-left: 10px;
}

::placeholder {
  color: #BCBEC0;
}

input[type=submit] {
  background-color: #fff;
  height: 2.2rem;
  border: 1px #D1D3D4 solid;
  border-radius: 5px;
  font-size: 20px;
  transition: 40ms ease-in;
  cursor: pointer;
}

input[type=submit]:hover {
  background-color: rgba(0, 0, 0, 0.4);
}

.hr-or:after {
  content: "OR";
  position: relative;
  display: inline-block;
  top: -0.5em;
  font-size: 15px;
  padding: 0 0.25em;
  background-color: rgba(250, 250, 250, 1);
  color: #BCBEC0;
}

#admin-signin-as-options {
  display: flex;
  flex-direction: column;
  align-items: center;
}

#admin-signin-as-options > label {
  text-align: center;
  color: #BCBEC0;
}

#asf-btn-option > button {
  width: 7.5rem;
  height: 2.5rem;
  color: #BCBEC0;
  border: none;
  border-radius: 5px;
}

#asf-btn-option {
  margin-top: 1rem;
}

.btn-ce {
  background: #006838;
}

.btn-oaep {
  background: #191919;
}

#admin-options {
  display: flex;
  justify-content: space-between;
  text-align: center;
  position: relative;
  margin: auto;

}

#admin-options > a {
  text-decoration: none;
  color: #00AEEF;
  font-size: 14px;
}

/* width */
::-webkit-scrollbar {
  width: 6px;
}

// /* Track */
// ::-webkit-scrollbar-track {
//   background: #E6E6E6;
//   border-radius: 2px;
// }

/* Handle */
::-webkit-scrollbar-thumb {
  background-color: rgba(0, 0, 0, 0.2);
  border-radius: 7px;
}

/* Handle on hover */
::-webkit-scrollbar-thumb:hover {
  background: #808080;
}

#setup_lr_container {
  position: fixed;
  margin: 0;
  padding: 0;
  top: 0;
  left: 0;
  width: 100vw;
  height: 100vh;
  backdrop-filter: blur(8px);
  background-color: rgba(250, 250, 250, 0.1); /* color */
  // display: none;
  z-index: 1000;
}

#setup_lr_inner {
  padding: 0px 0px 10px 0px;
  border-radius: 20px;
  position: relative;
  top: 24px;
  margin: auto;
  height: 570px;
  width: 480px;
  // backdrop-filter: blur(10px);
  background-color: rgba(0, 0, 0, 0.4); /* color */
}

#setup_header {
  display: grid;
  grid-auto-flow: column;
  height: 30px;
  border-top-left-radius: 20px;
  border-top-right-radius: 20px;
  background-color: rgba(0, 0, 0, 0.2);
  padding-top: 15px;
}

#setup_title {
  width: 100%;
  padding-left: 7%;
}

.s_title {
  margin: 0;
  padding: 0;
  // color: #fff;
  color: rgba(250, 250, 250, 0.9);
  font-weight: bold;
}

#setup_btn_cancel {
  position: relative;
  top: -6px;
  width: 100%;
  padding-left: 55%;
}

#setup_btn_close {
  border: 0;
  background-color: rgba(250, 250, 250, 0.4);
  border-radius: 5px;
  cursor: pointer;
  font-size: 14px;
  color: #fff;
  height: 28px;
  transition: 40ms ease-in;
}

#setup_btn_close:hover {
  background-color: rgba(0, 0, 0, 0.4);
}

#setup_loan_rates_frm {
  height: 492px;
  overflow: auto;
  // background-color: rgba(0, 0, 0, 0.3);
}

#first_box {
  display: block;
}

#first_box h2 {
  color: rgba(250, 250, 250, 1);
}

#rates5k_box {
  display: grid;
  margin: auto;
  grid-gap: 10px;
}

#first_box hr {
  margin: 16px 0 16px 0;
  padding: 0;
  border: 0;
  height: 1px;
  background-color: rgba(250, 250, 250, 0.4);
  overflow: visible;
  text-align: center;
}

.inner_5k {
  display: grid;
  grid-auto-flow: column;
}

.inner_5k label {
  padding-left: 20px;
  width: 320px;
  font-size: 18px;
  color: rgba(250, 250, 250, 1);
}

.inner_5k input[type=number] {
  height: 32px;
  font-size: 17px;
  border: 1px #ccc solid;
  border-radius: 5px;
  margin-bottom: 12px;
  padding-left: 10px;
  width: 100px;
}

#second_box {
  display: block;
}

#second_box h2 {
  color: rgba(250, 250, 250, 1);
}

#rates10k_box {
  display: grid;
  margin: auto;
  grid-gap: 10px;
}

#second_box hr {
  margin: 16px 0 16px 0;
  padding: 0;
  border: 0;
  height: 1px;
  background-color: rgba(250, 250, 250, 0.4);
  overflow: visible;
  text-align: center;
}

.inner_10k {
  display: grid;
  grid-auto-flow: column;
}

.inner_10k label {
  padding-left: 20px;
  width: 320px;
  font-size: 18px;
  color: rgba(250, 250, 250, 1);
}
.inner_10k input[type=number] {
  height: 32px;
  font-size: 17px;
  border: 1px #ccc solid;
  border-radius: 5px;
  margin-bottom: 12px;
  padding-left: 10px;
  width: 100px;
}

#btn_save_rate {
  position: absolute;
  background-color: rgba(0, 0, 0, 0.2);
  width: 100%;
  height: 42px;
  border-bottom-left-radius: 20px;
  border-bottom-right-radius: 20px;
}

#add_rates {
  position: relative;
  top: 6px;
  height: 28px;
  border: 0;
  background-color: rgba(250, 250, 250, 0.4);
  border-radius: 5px;
  cursor: pointer;
  font-size: 14px;
  color: #fff;
}

#add_rates:hover {
  background-color: rgba(0, 0, 0, 0.4);
}
</style>
STYLE;
?>