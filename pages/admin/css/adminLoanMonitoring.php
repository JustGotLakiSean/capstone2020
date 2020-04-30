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

h1 {
  text-align: center;
  font-size: 2.6rem;
}

h3 {
  font-size: 1.7rem;
  margin: 0;
}

hr {
  padding: 0;
  border: 0;
  height: 2px;
  background: #E6E6E6;
  overflow: visible;
  text-align: center;
}

label {
  color: #808080;
  font-size: 1.1rem;
  float: left;
}

input[type=text] {
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

</style>
STYLE;
?>