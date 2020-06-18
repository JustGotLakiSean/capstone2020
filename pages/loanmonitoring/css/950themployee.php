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

hr {
  margin: 5px 0 5px 0;
  padding: 0;
  border: 0;
  height: 1px;
  background: #dddddd;
  overflow: visible;
  text-align: center;
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
  color: #eee;
  text-decoration: none;
  position: relative;
  top: .7rem;
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
  height: 26px;
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

#employee-container {
  max-width: 92%;
  margin: auto;
  height: 730px;
}

#employee-container > h1 {
  font-size: 3em;
  margin: 0;
  padding: 0;
}

#listofemployeeform {
  width: 100%;
  height: 520px;
  margin: 0;
  background: #fff;
  box-shadow: 5px 2px 10px rgba(126, 125, 125, .1),
  -5px 2px 10px rgba(126, 125, 125, .1);
}

#employeetabs {
  overflow: hidden;
}

#employeetabs button {
  background-color: inherit;
  float: left;
  border: none;
  outline: none;
  cursor: pointer;
  padding: 14px 16px;
  transition: 0.3s;
  font-size: 17px;
}

#employeetabs button.active {
  border-top: 3px solid #1A1A1A;
  color: #000000;
}

.tabcontent {
  display: none;
  padding: 6px 12px;
}



#btn-add-oaep {
  width: 11rem;
  height: 2.5rem;
  background: #0071BC;
  color: #fff;
  border: none;
  border-radius: 5px;
  cursor: pointer;
}

#btn-add-ce {
  width: 11rem;
  height: 2.5rem;
  background: #0071BC;
  color: #fff;
  border: none;
  border-radius: 5px;
  cursor: pointer;
}

/* Officers and EP Profile MODAL */
#OfficersAndEPProfile {
  margin: 0;
  padding: 0;
  position: fixed; /* Positioning and size */
  top: 0;
  left: 0;
  width: 100vw;
  height: 100vh;
  backdrop-filter: blur(10px);
  background-color: rgba(0, 0, 0, 0.4); /* color */
}

#OfficersAndEPProfile p {
  margin: 0;
  padding: 0;
}

.oae_profile_container {
  display: block;
  width: 450px;
  height: 550px;
  margin: auto;
  background: #F2F2F2;
  border: 1px solid #dadada;
  border-radius: 5px;
  position: relative;
  top: 3rem;
  border: 0;
}

.oaefirstbox {
  height: 90px;
  background: #0071BC;
  border-top-left-radius: 5px;
  border-top-right-radius: 5px;
}

#oaemorebutton {
  margin-left: 85%;
  position: relative;
  top: 10px;
  background: #0071BC;
  border: none;
  border-radius: 5px;
  transition: 200ms ease-in;
  color: #fff;
  cursor: pointer;
  height: 30px;
}

#oaemorebutton:hover {
  background: #0067ac;
}

.bottom-box {

  position: relative;
  top: 20px;
  margin: 0;
}

.bottom-box h3 {
  margin: 0;
  color: #fff;
  font-weight: lighter;
  font-size: 1rem;
}

.oaeofficelogo {
  margin: auto;
  width: 70px;
  height: 70px;
  border: 5px solid #0071BC;
  border-radius: 66px;
  box-shadow: 5px 2px 10px rgba(0, 0, 0, 0.2),
  -5px 2px 10px rgba(0, 0, 0, 0.2);
}

.oaesecondbox {
  display: flex;
  flex-direction: column;
  width: 30vw;
  margin: auto;
  margin-top: 10px;
}

.oaeimageboxcontainer {
  height: 50px;
  margin: auto;
}

.oaeimagebox {
  height: 14vh;
  width: 7vw;
  background: black;
}

.oaedetailbox {
  display: grid;
  grid-auto-flow: row;
  /* grid-gap: px; */
  margin-top: 10px;
}

.oaebox {
  display: flex;
  flex-flow: row;
  justify-content: space-between;
  height: 45px;
}

.oaebox input[type="text"] {
  width: 20vw;
  height: 30px;
  border: 1px solid #CCCCCC;
  border-radius: 3px;
  padding-left: 10px;
  color: #808080;
  font-size: 12px;
}

/* Add New Officers and EP MODAL */
#addnewoaep-container {
  margin: 0;
  padding: 0;
  position: fixed; /* Positioning and size */
  top: 0;
  left: 0;
  width: 100vw;
  height: 100vh;
  backdrop-filter: blur(10px);
  background-color: rgba(0, 0, 0, 0.4); /* color */
  display: none; /* making it hidden by default */
}

#AddNewOfficerAndEPRecord {
  display: block;
  width: 450px;
  height: 650px;
  margin: auto;
  background: #F2F2F2;
  border: 1px solid #dadada;
  border-radius: 5px;
  position: relative;
  top: .5rem;
  border: 0;
}

.addoaeformtitlebox {
  height: 26px;
  background: #0071BC;
  border-radius: 5px;
  color: #fff;
}

.addoaeformtitlebox h3 {
  text-align: center;
  font-weight: lighter;
  font-size: 16px;
  margin: 0;
  position: relative;
  top: 2px;
}

.oaeinputbox {
  display: grid;
  grid-auto-flow: row;
  width: 30vw;
  margin: auto;
  margin-top: 10px;
}

.oaeaddimageboxcontainer {
  display: grid;
  grid-gap: 5px;
  margin: auto;
}

.add_oaeimagebox {
  height: 14vh;
  width: 7vw;
  background: black;
  margin: auto;
}

#oaeaddimagebutton {
  background: #fff;
  border: none;
  font-size: .8rem;
  height: 4vh;
  border-radius: 15px;
  color: #0071BC;
  font-style: italic;
  cursor: pointer;
}

.oaetextfieldcontainer {
  display: grid;
  grid-auto-flow: row;
  grid-gap: 10px;
  position: relative;
  top: 15px;
}

.add_info_box {
  display: grid;
  grid-auto-flow: row;
  grid-gap: 5px;
}

.datepicker {
  // width: 10vw;
  height: 4vh;
  border: 1px solid #CCCCCC;
  background: #F2F2F2;
  color: #808080;
  font-size: 12px;
  border-radius: 5px;
  padding-left: 10px;
  cursor: pointer;
}

.add_info_box input[type="text"], input[type="email"] {
  height: 30px;
  background: #E6E6E6;
  border: 1px solid #CCCCCC;
  border-radius: 5px;
  padding-left: 10px;
  font-size: .9rem;
}

.add_info_box label {
  font-size: 1rem;
  color: #666666;
}

.add_info_box select {
  height: 30px;
  width: 10vw;
  background: #fff;
  border: none;
  border-radius: 5px;
  border: 1px solid #ccc;
}

.addofficercommand {
  position: relative;
  top: 10px;
  margin: auto;
}

.addofficercommand input[type="submit"] {
  height: 30px;
  border: none;
  border-radius: 5px;
  color: #fff;
  transition: 200ms ease-in;
  font-size: 12px;
}

#btn-view-oaep {
  padding: 2px;
  height: 50vh;
  width: 4vw;
  border: none;
  color: #fff;
  font-size: .8rem;
  background: #0071BC;
  border-radius: 2px;
  transition: 200ms ease-in;
  text-decoration: none;
}

#btn-view-oaep:hover {
  box-shadow: 1px 1px 3px rgba(0, 0, 0, 0.2),
  -1px 1px 4px rgba(0, 0, 0, 0.2);
}

#civRecord_table {
  width: 100%;
  margin: auto;
  margin-top: 10px;
  border-collapse: collapse;
  border: 1px solid #E6E6E6;
  text-align: center;
}

#civRecord_table > thead {
  background: #0071BC;
  color: #fff;
  font-weight: lighter;
  border: 1px solid #E6E6E6;
}

#civRecord_table > thead > tr > th {
  font-weight: lighter;
  border: 1px solid #0071BC;
}

#civRecord_table > tbody {
  background: #F2F2F2;
  border: 1px solid rgb(230, 230, 230);
}

#btn-view-ce {
  padding: 2px;
  height: 50vh;
  width: 4vw;
  border: none;
  color: #fff;
  font-size: .8rem;
  background: #0071BC;
  border-radius: 2px;
  transition: 200ms ease-in;
  text-decoration: none;
}

#btn-view-ce:hover {
  box-shadow: 1px 1px 3px rgba(0, 0, 0, 0.2),
  -1px 1px 4px rgba(0, 0, 0, 0.2);
}

#oaep_table {
  width: 100%;
  margin: auto;
  margin-top: 10px;
  border-collapse: collapse;
  border: 1px solid #E6E6E6;
  text-align: center;
}

#oaep_table > thead {
  background: #0071BC;
  color: #fff;
  font-weight: lighter;
  border: 1px solid #E6E6E6;
}

#oaep_table > thead > tr > th {
  font-weight: lighter;
  border: 1px solid #0071BC;
}

#oaep_table > tbody > tr > td {
  padding: 3px;
}

#oaep_table > tbody {
  background: #F2F2F2;
  border: 1px solid rgb(230, 230, 230);
}

#submitnewofficer {
  background: #0071BC;
  cursor: pointer;
}

#submitnewofficer:hover {
  box-shadow: 5px 2px 10px rgba(0, 0, 0, 0.2),
  -5px 2px 10px rgba(0, 0, 0, 0.2);
}

#canceloperation {
  background: #FF0C25;
  height: 30px;
  border: none;
  border-radius: 5px;
  color: #fff;
  transition: 200ms ease-in;
  font-size: 12px;
  cursor: pointer;
}

#canceloperation:hover {
  box-shadow: 5px 2px 10px rgba(0, 0, 0, 0.2),
  -5px 2px 10px rgba(0, 0, 0, 0.2);
}

/* Add New Civilian Employee */
#addnewce-container {
  margin: 0;
  padding: 0;
  position: fixed; /* Positioning and size */
  top: 0;
  left: 0;
  width: 100vw;
  height: 100vh;
  backdrop-filter: blur(10px);
  background-color: rgba(0, 0, 0, 0.4); /* color */
  display: none; /* making it hidden by default */
}

#AddNewCivilianEmployeeRecord {
  display: block;
  width: 450px;
  height: 650px;
  margin: auto;
  background: #F2F2F2;
  border: 1px solid #dadada;
  border-radius: 5px;
  position: relative;
  top: .5rem;
  border: 0;
}

.addnewcetitlebox {
  height: 26px;
  background: #0071BC;
  border-radius: 5px;
  color: #fff;
}

.addnewcetitlebox h3 {
  text-align: center;
  font-weight: lighter;
  font-size: 16px;
  margin: 0;
  position: relative;
  top: 2px;
}

.add_ceinputbox {
  display: grid;
  grid-auto-flow: row;
  width: 30vw;
  margin: auto;
  margin-top: 10px;
}

.ceaddimageboxcontainer {
  display: grid;
  grid-gap: 5px;
  margin: auto;
}

.add_ceimagebox {
  height: 14vh;
  width: 7vw;
  background: black;
  margin: auto;
}

#ceaddimagebutton {
  background: #fff;
  border: none;
  font-size: .8rem;
  height: 4vh;
  border-radius: 15px;
  /* font-weight: bold; */
  color: #0071BC;
  font-style: italic;
  cursor: pointer;
}

.cetextfieldcontainer {
  display: grid;
  grid-auto-flow: row;
  grid-gap: 10px;
  position: relative;
  top: 15px;
}

.addciviliancommand {
  position: relative;
  top: 10px;
  margin: auto;
}

.addciviliancommand input[type="submit"] {
  height: 30px;
  border: none;
  border-radius: 5px;
  color: #fff;
  transition: 200ms ease-in;
  font-size: 12px;
}

#submitnewcivilian {
  background: #0071BC;
}

#submitnewcivilian:hover {
  box-shadow: 5px 2px 10px rgba(0, 0, 0, 0.2),
  -5px 2px 10px rgba(0, 0, 0, 0.2);
}

/* Civilian Employee Profile MODAL */
#CivilianEmployeeProfile {
  margin: 0;
  padding: 0;
  position: fixed; /* Positioning and size */
  top: 0;
  left: 0;
  width: 100vw;
  height: 100vh;
  backdrop-filter: blur(10px);
  background-color: rgba(0, 0, 0, 0.4); /* color */
}

#CivilianEmployeeProfile p {
  margin: 0;
  padding: 0;
}

.civilianemployeerofilepanel {
  display: block;
  width: 450px;
  height: 550px;
  margin: auto;
  background: #F2F2F2;
  border: 1px solid #dadada;
  border-radius: 5px;
  position: relative;
  top: 3rem;
  border: 0;
}

.cefirstbox {
  height: 90px;
  background: #0071BC;
  border-top-left-radius: 5px;
  border-top-right-radius: 5px;
}

#cemorebutton {
  margin-left: 85%;
  position: relative;
  top: 10px;
  background: #0071BC;
  border: none;
  border-radius: 5px;
  transition: 200ms ease-in;
  color: #fff;
  cursor: pointer;
  height: 30px;
}

#cemorebutton:hover {
  background: #0067ac;
}

.ce-bottom-box {

  position: relative;
  top: 20px;
  margin: 0;
}

.ce-bottom-box h3 {
  margin: 0;
  color: #fff;
  font-weight: lighter;
  font-size: 1rem;
}

.ceofficelogo {
  margin: auto;
  width: 70px;
  height: 70px;
  border: 5px solid #0071BC;
  border-radius: 66px;
  box-shadow: 5px 2px 10px rgba(0, 0, 0, 0.2),
  -5px 2px 10px rgba(0, 0, 0, 0.2);
}

.cesecondbox {
  display: flex;
  flex-direction: column;
  width: 30vw;
  margin: auto;
  margin-top: 10px;  
}

.ceimageboxcontainer {
  height: 50px;
  margin: auto;
}

.ceimagebox {
  height: 14vh;
  width: 7vw;
  background: black;
}

.cedetailsboxcontainer {
  display: grid;
  grid-auto-flow: row;
  /* grid-gap: px; */
  margin-top: 10px;
}

.cebox {
  display: flex;
  flex-flow: row;
  justify-content: space-between;
  height: 45px;
}

.cebox input[type="text"] {
  width: 270px;
  height: 30px;
  border: 1px solid #CCCCCC;
  border-radius: 3px;
  padding-left: 10px;
  color: #808080;
  font-size: 12px;
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