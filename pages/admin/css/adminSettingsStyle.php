<?php
echo <<<STYLE
<style>
* {
  box-sizing: border-box;
}

body {
  margin: 0;
  font-family: 'Roboto', 'Helvetica', 'Franklin Gothic Book', 'Arial Narrow', Arial, sans-serif;
  //background: linear-gradient(286deg, rgba(0,255,56,0.6839110644257703) 4%, rgba(147,48,204,1) 50%, rgba(0,255,188,1) 100%);
  background: #F2F2F2;
}

#loan-navigation-container {
  margin: 0;
  padding: 0;
}

#loan-navigation-container nav {
  background-color: #0071BC;
  color: #eee;
}

#loan-navigation-container nav ul {
  height: 42px;
  display: flex;
  justify-content: space-evenly;
  padding: 0;
  margin: 0;
}

#loan-navigation-container nav li {
  display: inline;
  margin: 0;
}

#loan-navigation-container nav > ul > li > a {
  display: inline-block;
  text-align: center;
  text-decoration: none;
  color: rgba(250, 250, 250, 0.9);
  text-decoration: none;
  position: relative;
  padding-top: 10px;
  height: 42px;
  transition: 60ms ease-in;
  width: 150px;
}

#loan-navigation-container nav > ul > li > a:hover{
  background-color: rgba(0, 0, 0, 0.2);
}

#loan-navigation-container input[type=text] {
  width: 20vw;
  height: 3vh;
  background: #F2F2F2;
  font-size: .8rem;
  padding-left: 10px;
  border: none;
  border-radius: 5px;
  position: relative;
  top: .5rem;
}

#admin-button {
  background: #dddddd;
  border: none;
  border-radius: 3px;
  height: 24px;
  cursor: pointer;
  color: #fff;
  position: relative;
  top: .5rem;
}

#admin_menu_box {
  position: absolute;
  top: 37px;
  right: 65px;
  width: 10vw;
  height: 100px;
  font-size: .9rem;
  background: #fff;
  border-radius: 15px;
  display: none;
  flex-direction: column;
  align-items: center;
  justify-content: space-evenly;
  box-shadow: 1px 2px 5px rgba(126, 125, 125, 0.1),
  -1px 2px 5px rgba(126, 125, 125, 0.1);
}

#admin_menu_box a {
  text-decoration: none;
  color: #666;
}

#loan-navigation-container ::placeholder {
  color: #666666;
}

section {
  max-width: 640px;
  height: 300px;
  margin: auto;
  padding: 0;
  background: #F2F2F2;
  position: relative;
  top: 30px;
  border: none;
  border-radius: 15px;
  box-shadow: 1px 2px 10px rgba(126, 125, 125, 0.3),
  -1px 2px 10px rgba(126, 125, 125, 0.3);
}

.as-inner {
  width: 600px;
  margin: auto;
  display: grid;
  /* grid-auto-flow: row; */
  grid-gap: 1rem;
}

.amdh {
  font-size: 1.2rem;
  margin: 0;
  padding: 0;
}

.amdp {
  margin: 0;
  padding: 0;
  font-size: 13px;
  color: #808080;
}

.as-header {
  position: relative;
  /* top: 20px; */
  /* margin-bottom: 40px; */
}

.f_header {
  padding: 0;
  text-align: center;
  position: relative;
  font-size: 2rem;
  margin: 0;
}

.personal-details, .account-details, .loanrates-details {
  display: grid;
  grid-auto-flow: column;
}

.firstinner {
  width: 250px;
  margin: 0;
  padding: 0;
}

.pd-viewbtn {
  position: relative;
  top: 30%;
  left: 65%;
}

.pd-viewbtn button {
  padding: 0;
  margin: 0;
  width: 50px;
  height: 25px;
  background: #B3B3B3;
  border: none;
  border-radius: 7px;
  font-size: .7rem;
  font-weight: bold;
}

.as-signoutbtn-container {
  text-align: center;
}

.as-signoutbtn {
  width: 100px;
  height: 30px;
  background: #B3B3B3;
  border: none;
  border-radius: 7px;
  font-size: 1rem;
  font-weight: bold;
}

.search_box_container {
  position: fixed;
  margin: 0;
  padding: 0;
  top: 0;
  left: 0;
  width: 100vw;
  height: 100vh;
  backdrop-filter: blur(10px);
  background-color: rgba(0, 0, 0, 0.3); /* color */
  z-index: 1000;
  display: none;
}

#search_control {
  display: grid;
  grid-auto-flow: column;
  grid-gap: 5px;
}


#search_result_container {
  background: #E6E6E6;
  border-radius: 5px;
  height: auto;
  width: 480px;
  backdrop-filter: blur(6px);
  background-color: rgba(250, 250, 250, 0.8); /* color */
}

#search_container {
  display: grid;
  height: auto;
}

.search_box {
  position: relative;
  top: 100px;
  margin: auto;
  height: auto;
  //background: #fff;
}

#search_result_box a {
  font-size: 18px;
  display: block;
  list-style-type: none;
  margin: 5px;
  cursor: pointer;
}

#search_result_box hr {
  background: #b4b4b4;
}

#txt_emp_search {
  width: 480px;
  height: 40px;
  border: 0;
  border-radius: 5px;
  font-size: 20px;
  padding-left: 10px;
}

.btn_search_close {
  width: 50px;
  height: 40px;
  border: 0;
  background: #ebebeb;
  border-radius: 5px;
  cursor: pointer;
}

#result_container {
  position: fixed;
  margin: 0;
  padding: 0;
  top: 0;
  left: 0;
  width: 100vw;
  height: 100vh;
  backdrop-filter: blur(10px);
  background-color: rgba(0, 0, 0, 0.3); /* color */
  z-index: 1000;
}

#search_close {
  position: absolute;
  top: -28px;
  right: 0px;
  height: 20px;
  cursor: pointer;
  backdrop-filter: blur(10px);
  background-color: rgba(250, 250, 250, 0.3); /* color */
  border: none;
  border-radius: 20px;
  color: #ffffff;
  transition: 50ms ease-in;
}

#search_close:hover {
  backdrop-filter: blur(10px);
  background-color: rgba(0, 0, 0, 0.3); /* color */
}

#search_emp_result {
  padding: 0px 0px 10px 0px;
  border-radius: 20px;
  position: relative;
  top: 46px;
  margin: auto;
  height: 500px;
  width: 480px;
  backdrop-filter: blur(10px);
  background-color: rgba(250, 250, 250, 0.8); /* color */
}

#search_header {
  height: auto;
  border: none;
  // border-radius: 20px;
  border-top-left-radius: 20px;
  border-top-right-radius: 20px;
  width: 100%;
  position: absolute;
  background: #eee;
  // backdrop-filter: blur(10px);
  // background-color: rgba(250, 250, 250, 0.3); /* color */
  z-index: 100;
  display: block;
}

#pd_result {
  padding: 8px;
}

#ld_result {
  padding: 8px;
}

#account_result {
  padding: 8px;
}

#result_con {
  top: 24px;
  height: 460px;
  border-bottom-left-radius: 20px;
  boder-bottom-right-radius: 20px;
  overflow: auto;
  position: relative;
}

#btn_view_emp_profile {
  border: 0;
  border-radius: 5px;
  font-size: 22px;
  height: 54px;
  backdrop-filter: blur(0px);
  background-color: rgba(250, 250, 250, 0.1); /* color */
  width: 100%;
}

#result_form {

}

/* width */
::-webkit-scrollbar {
  width: 6px;
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

hr {
  margin: 5px 0 5px 0;
  padding: 0;
  border: 0;
  height: 1px;
  background: #dddddd;
  overflow: visible;
  text-align: center;
}
</style>
STYLE;
?>