<?PHP


echo <<<STYLE
<style type="text/css">
body {
  margin: 0;
  font-family: 'Franklin Gothic Book', 'Arial Narrow', Arial, sans-serif;
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

#employee-container {
  max-width: 1180px;
  margin: auto;
  margin-top: 20px;
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
  border-top: 3px solid #375623;
  color: #000000;
}

.tabcontent {
  display: none;
  padding: 6px 12px;
}



#btn-add-oaep {
  width: 11rem;
  height: 2.5rem;
  background: #375623;
  color: #fff;
  border: none;
  border-radius: 5px;
  cursor: pointer;
}

#btn-add-ce {
  width: 11rem;
  height: 2.5rem;
  background: #C65911;
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
  background-color: rgba(0, 0, 0, 0.9); /* color */

}

#OfficersAndEPProfile p {
  margin: 0;
  padding: 0;
}

.oae_profile_container {
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

.oaefirstbox {
  height: 13vh;
  background: #37563C;
  border-top-left-radius: 5px;
  border-top-right-radius: 5px;
}

#oaemorebutton {
  margin-left: 85%;
  position: relative;
  top: 10px;
}

.bottom-box {
  display: flex;
  flex-flow: row;
  justify-content: space-between;
  position: relative;
  top: 47px;
  margin: 0;
}

.bottom-box h3 {
  margin: 0;
  color: #fff;
  font-weight: lighter;
  font-size: 1rem;
}

.oaeofficelogo {
  position: absolute;
  top: -115%;
  left: 22rem;
  width: 70px;
  height: 70px;
  border: 5px solid #37563C;
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
  height: 15vh;
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
  height: 5vh;
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
  background-color: rgba(0, 0, 0, 0.9); /* color */
  display: none; /* making it hidden by default */
}

#AddNewOfficerAndEPRecord {
  display: block;
  width: 35vw;
  height: 98vh;
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
  background: #375623;
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
  height: 4vh;
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
  height: 4vh;
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
  height: 5vh;
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
  background: #009245;
  border-radius: 2px;
  transition: 200ms ease-in;
  text-decoration: none;
}

#btn-view-oaep:hover {
  box-shadow: 1px 1px 3px rgba(0, 0, 0, 0.2),
  -1px 1px 4px rgba(0, 0, 0, 0.2);
}

#civRecord_table {
  width: 84vw;
  margin: auto;
  margin-top: 10px;
  border-collapse: collapse;
  border: 1px solid #E6E6E6;
  text-align: center;
}

#civRecord_table > thead {
  background: #C65911;
  color: white;
  border: 1px solid #E6E6E6;
}

#oaep_table {
  width: 84vw;
  margin: auto;
  margin-top: 10px;
  border-collapse: collapse;
  border: 1px solid #E6E6E6;
  text-align: center;
}

#oaep_table > thead {
  background: #375623;
  color: white;
  border: 1px solid #E6E6E6;
}

#oaep_table > tbody > tr > td {
  padding: 3px;
}

#submitnewofficer {
  background: #0071BC;
}

#submitnewofficer:hover {
  box-shadow: 5px 2px 10px rgba(0, 0, 0, 0.2),
  -5px 2px 10px rgba(0, 0, 0, 0.2);
}

#canceloperation {
  background: #FF0C25;
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
  background-color: rgba(0, 0, 0, 0.9); /* color */
  display: none; /* making it hidden by default */
}

#AddNewCivilianEmployeeRecord {
  display: block;
  width: 35vw;
  height: 98vh;
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
  background: #DF4511;
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
  height: 5vh;
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
  background-color: rgba(0, 0, 0, 0.9); /* color */
  
}

#CivilianEmployeeProfile p {
  margin: 0;
  padding: 0;
}

.civilianemployeerofilepanel {
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

.cefirstbox {
  height: 13vh;
  background: #C65911;
  border-top-left-radius: 5px;
  border-top-right-radius: 5px;
}

#cemorebutton {
  margin-left: 85%;
  position: relative;
  top: 10px;
}

.ce-bottom-box {
  display: flex;
  flex-flow: row;
  justify-content: space-between;
  position: relative;
  top: 47px;
  margin: 0;
}

.ce-bottom-box h3 {
  margin: 0;
  color: #fff;
  font-weight: lighter;
  font-size: 1rem;
}

.ceofficelogo {
  position: absolute;
  top: -115%;
  left: 22rem;
  width: 70px;
  height: 70px;
  border: 5px solid #C65911;
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
  height: 15vh;
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
  height: 5vh;
}

.cebox input[type="text"] {
  width: 20vw;
  height: 30px;
  border: 1px solid #CCCCCC;
  border-radius: 3px;
  padding-left: 10px;
  color: #808080;
  font-size: 12px;
}
</style>
STYLE;

?>