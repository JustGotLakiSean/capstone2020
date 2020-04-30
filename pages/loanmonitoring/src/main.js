function addnewloan5k(ctrlno_prefix, empid, fname, mname, lname, office, loan_amount, monthly_payment, credit, beginning_balance, penalty_per_month, current_date){
  fetch('add_new_5k_loan.php', {
    method: 'POST',
    header: {
      'Content-type' : 'application/json'
    },
    body: new URLSearchParams(`ctrlno_prefix=${ctrlno_prefix}&empid=${empid}&empfname=${fname}&empmname=${mname}&emplname=${lname}&empoffice=${office}&la_rate=${loan_amount}&mp_rate=${monthly_payment}&cr_rate=${credit}&beg_bal=${beginning_balance}&pen_permonth=${penalty_per_month}&date_today=${current_date}`) 
  })
  .then(res => res.json())
  .then(res => setTimeout(() => {
    console.log(res);
  }, 3000))
  .catch(e => console.log('Error : ' + e))
}
