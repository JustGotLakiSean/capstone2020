<?PHP

echo <<<STYLE
<style type="text/css">
* {
  box-sizing: border-box;
}

body {
  margin: 0;
  font-family: 'Roboto', 'Helvetica', 'sans-serif';
  background: #F2F2F2;
  //background: linear-gradient(118deg, rgba(226,30,255,1) 9%, rgba(242,146,61,0.8295693277310925) 50%, rgba(44,91,229,1) 90%) no-repeat center center fixed;
  // background: rgb(226,30,255);
  // background: linear-gradient(199deg, rgba(226,30,255,1) 0%, rgba(255,0,131,0.865983893557423) 25%, rgba(205,0,255,0.8295693277310925) 50%, rgba(255,0,236,0.8995973389355743) 77%, rgba(44,91,229,1) 100%) no-repeat center center fixed;
  // height: 100%;
  // background-position: center;
  // -webkit-background-size: cover;
  // -moz-background-size: cover;
  // -o-background-size: cover;
  // background-size: cover;
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

#loan-navigation-container {
  margin: 0;
  padding: 0;
}

#loan-navigation-container nav {
  background-color: #0071BC;
  color: #eee;
}

#loan-navigation-container nav ul {
  height: 6vh;
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
  color: #eee;
  text-decoration: none;
  position: relative;
  padding-top: 10px;
  height: 42px;
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
  height: 4vh;
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

.loanmonitoring-rates-container-inner {
  max-width: 1150px;
  margin: auto;
  padding: 0;
}

.accounts-rates-box {
  display: grid;
  grid-gap: 100px;
  margin-bottom: 100px;
}

.hfred {
  text-align: center;
  font-size: 2.6rem;
}

.h35kar {
  font-size: 1.7rem;
  margin: 0;
}

.h310kar {
  font-size: 1.7rem;
  margin: 0;
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

label {
  color: #808080;
  font-size: 1.1rem;
  float: left;
}

.accounts-rates-box input[type=text] {
  font-size: 1.1rem;
  width: 68px;
  height: 24px;
  border-radius: 5px;
  background: #F2F2F2;
  border: 1px solid #E6E6E6;
  color: #808080;
  float: right;
}

.inner-box {
  width: 400px;
  margin: auto;
  display: grid;
  grid-gap: 10px;
}

.edit-button {
  border: none;
  width: 40px;
  height: 30px;
  margin: 0;
  padding: 0;
  border-radius: 5px;
  font-size: 15px;
  position: relative;
  left: 1110px;
  cursor: pointer;
}

.save-button-container {
  position: relative;
  top: 10px;
  margin: auto;
}

.save-button {
  border: none;
  width: 40px;
  height: 30px;
  margin: 0;
  padding: 0;
  border-radius: 5px;
  font-size: 15px;
  position: relative;
  cursor: pointer;
  background: #B3B3B3;
}

.save-button-10k-container {
  position: relative;
  top: 10px;
  margin: auto;
}

.save-button-10k {
  border: none;
  width: 40px;
  height: 30px;
  margin: 0;
  padding: 0;
  border-radius: 5px;
  font-size: 15px;
  position: relative;
  cursor: pointer;
  background: #B3B3B3;
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

#btn_view_emp_profile {
  border: 0;
  border-radius: 5px;
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

</style>
STYLE;
?>