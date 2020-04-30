function addnewloan5k(
  borrower_id,
  ctrlno_prefix,
  fname,
  mname,
  lname,
  empType,
  loan_account_type,
  loan_amount,
  fullname,
  monthly_payment,
  credit,
  debit,
  interest,
  beginning_balance,
  current_date,
  comment,
  penalty_per_month,
  office,
  empRank,
  loan5kcount,
  firstPayment,
  secondPayment,
  thirdPayment,
  fourthPayment,
  fifthPayment,
  fullPayment,
  loanStatus
  ){
  fetch('add_new_5k_loan.php', {
    method: 'POST',
    header: {
      'Content-type' : 'application/x-www-form-urlencoded'
    },
    body: new URLSearchParams(`empid=${borrower_id}&ctrlno_prefix=${ctrlno_prefix}&empfname=${fname}&empmname=${mname}&emplname=${lname}&empType=${empType}&loan_type_5k=${loan_account_type}&la_rate=${loan_amount}&empfullname=${fullname}&mp_rate=${monthly_payment}&cr_rate=${credit}&amount_of_payment=${debit}&interest_rate=${interest}&beg_bal=${beginning_balance}&date_today=${current_date}&comment_remarks=${comment}&pen_permonth=${penalty_per_month}&empoffice=${office}&empRank=${empRank}&la5kcount=${loan5kcount}&first_payment=${firstPayment}&second_payment=${secondPayment}&third_payment=${thirdPayment}&fourth_payment=${fourthPayment}&fifth_payment=${fifthPayment}&full_payment=${fullPayment}&loan_status=${loanStatus}`)
  })
  .then(res => res.json())
  .then(res => setTimeout(() => {
    console.log(res);
    document.getElementById('alert').style.display = 'block';
    if(document.getElementById('alert').style.display = 'block'){
      setTimeout(() => {
        document.getElementById('alert').style.display = 'none';
      }, 3000)
    }
  }, 2000))
  .catch(err => console.log('Error : ' + err))
}