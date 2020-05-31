<?php
echo <<<STYLE
<style>
#lrf-container_5k {
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

#lrf-container_10k {
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

#loanRequestForm {
  width: 640px;
  height: 600px;
  margin: auto;
  padding: 0;
  background: #fff;
  position: relative;
  top: 30px;
  border: none;
  border-radius: 15px;
}

.lrf-inner-container {
  max-width: 560px;
  margin: auto;
}

.lrf-top-container {
  position: relative;
  top: 10px;
  height: 80px;
  display: grid;
}

.lrf-header > h3 {
  font-weight: lighter;
  font-size: 1.5rem;
  margin: 0;
}

.btn_lrf_close {
  float: right;
  margin-top: -4%;
  margin-right: 1%;
}

.lrf-type-of-account-box {
  width: 530px;
  margin: auto;
  display: flex;
  flex-flow: row;
  justify-content: space-between;
}

.lrf-type-of-account-box select {
  width: 150px;
  height: 27px;
  background: #4D4D4D;
  border: none;
  border-radius: 5px;
  color: #fff;
  box-shadow: 5px 2px 10px rgba(126, 125, 125, .2),
  -5px 2px 10px rgba(126, 125, 125, .2);
  padding-left: 10px;
  cursor: pointer;
}

label {
  color: #808080;
  font-size: 17px;
}

hr {
  margin: 10px 0 10px 0;
  padding: 0;
  border: 0;
  height: 1px;
  background: #dadada;
  overflow: visible;
  text-align: center;
}

.lrf-midinputbox-inner {
  width: 510px;
  display: grid;
  grid-auto-flow: row;
  grid-gap: 10px;
  margin: auto;
}

.mid_box_item {
  display: flex;
  justify-content: space-between;
}

.mid_box_item input[type="text"] {
  width: 300px;
  height: 28px;
  background: #F2F2F2;
  border: 1px solid #E6E6E6;
  border-radius: 3px;
}

/* for loan rates LRF */

/* END */
.lrf-btn-action input[type="submit"], #lrf_btn_cancel {
  width: 100px;
  height: 30px;
  border: none;
  border-radius: 5px;
  color: #fff;
  transition: 100ms ease-in;
  font-size: 12px;
  cursor: pointer;
}

#lrf_btn_submit {
  background: #0071BC;
}

#lrf_btn_submit:hover {
  box-shadow: 5px 2px 10px rgba(0, 0, 0, 0.2),
  -5px 2px 10px rgba(0, 0, 0, 0.2);
}

#lrf_btn_submit_10k {
  background: #0071BC;
}

#lrf_btn_submit_10k:hover {
  box-shadow: 5px 2px 10px rgba(0, 0, 0, 0.2),
  -5px 2px 10px rgba(0, 0, 0, 0.2);
}

#lrf_btn_cancel {
  background: #ED1C24;
}

#lrf_btn_cancel:hover {
  box-shadow: 5px 2px 10px rgba(0, 0, 0, 0.2),
  -5px 2px 10px rgba(0, 0, 0, 0.2);
}

.lk_rate {
  text-align: center;
  width: 7vw;
  margin: 0;
  font-size: .9rem;
  border-radius: 5px;
  border: 2px solid #CCCCCC;
  height: 20px;
}
.lrf-loanrates-inner {
  display: grid;
  grid-auto-flow: column;
  margin: auto;
}

.lrf-loanrates {
  
}


.firstbox {
  display: grid;
  grid-gap: 10px;
  color: #666666;
  margin: auto;
}

.secondbox {
  display: grid;
  grid-gap: 5px;
  margin: auto;
}
</style>
STYLE;
?>