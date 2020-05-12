function addnewloan10k(
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
  loan10kcount,
  firstPayment,
  secondPayment,
  thirdPayment,
  fourthPayment,
  fifthPayment,
  sixthPayment,
  fullPayment,
  loanStatus
  ){
    fetch('add_new_10k_loan.php', {
      method: 'POST',
      header: {
        'Content-type' : 'application/x-www-form-urlencoded'
      },
      body: new URLSearchParams(`empid_10k=${borrower_id}&ctrlno_prefix_10k=${ctrlno_prefix}&empfname_10k=${fname}&empmname_10k=${mname}&emplname_10k=${lname}&empType_10k=${empType}&loan_type_10k=${loan_account_type}&la_rate_10k=${loan_amount}&empfullname_10k=${fullname}&mp_rate_10k=${monthly_payment}&cr_rate_10k=${credit}&amount_of_payment_10k=${debit}&interest_rate_10k=${interest}&beg_bal_10k=${beginning_balance}&date_today_10k=${current_date}&comment_remarks_10k=${comment}&pen_permonth_10k=${penalty_per_month}&empoffice_10k=${office}&empRank_10k=${empRank}&la10kcount=${loan10kcount}&first_payment_10k=${firstPayment}&second_payment_10k=${secondPayment}&third_payment_10k=${thirdPayment}&fourth_payment_10k=${fourthPayment}&five_payment_10k=${fifthPayment}&sixth_payment_10k=${sixthPayment}&full_payment_10k=${fullPayment}&loan_status_10k=${loanStatus}`)
    })
    .then(res => res.json())
    .then(res => setTimeout(() => {
      console.log(res);
      document.getElementById('alert_10k').style.display = 'block';
      if(document.getElementById('alert_10k').style.display = 'block'){
        setTimeout(() => {
          document.getElementById('alert_10k').style.display = 'none';
        }, 3000)
      }
    }, 2000))
    .catch(err => console.log('Error : ' + err))
  }