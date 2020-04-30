-- phpMyAdmin SQL Dump
-- version 4.8.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 30, 2020 at 07:44 AM
-- Server version: 10.1.33-MariaDB
-- PHP Version: 7.2.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `loandb`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_1stpayment`
--

CREATE TABLE `tbl_1stpayment` (
  `transaction_id` int(11) NOT NULL,
  `loan_id` int(11) NOT NULL,
  `type_of_loanAccount` varchar(100) NOT NULL,
  `borrower_id` int(11) NOT NULL,
  `ctrl_no_prefix` varchar(100) NOT NULL,
  `fname` varchar(100) NOT NULL,
  `mname` varchar(100) NOT NULL,
  `lname` varchar(100) NOT NULL,
  `type_of_employee` varchar(100) NOT NULL,
  `office` varchar(100) NOT NULL,
  `rank` varchar(100) NOT NULL,
  `loan_amount_rate` int(11) NOT NULL,
  `monthly_payment_rate` int(11) NOT NULL,
  `credit_rate` int(11) NOT NULL,
  `amount_paid` int(11) NOT NULL,
  `is_paid` int(11) NOT NULL,
  `current_interest` int(11) NOT NULL,
  `current_balance` int(11) NOT NULL,
  `payment_option` varchar(100) NOT NULL,
  `date_of_payment` varchar(100) NOT NULL,
  `has_penalty` int(11) NOT NULL,
  `is_penalty_paid` int(11) NOT NULL,
  `penalty_amount` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_2ndpayment`
--

CREATE TABLE `tbl_2ndpayment` (
  `transaction_id` int(11) NOT NULL,
  `type_of_loanAccount` varchar(100) NOT NULL,
  `borrower_id` int(11) NOT NULL,
  `ctrl_no_prefix` varchar(100) NOT NULL,
  `fname` varchar(100) NOT NULL,
  `mname` varchar(100) NOT NULL,
  `lname` varchar(100) NOT NULL,
  `type_of_employee` varchar(100) NOT NULL,
  `office` varchar(100) NOT NULL,
  `rank` varchar(100) NOT NULL,
  `loan_amount_rank` int(11) NOT NULL,
  `monthly_payment_rate` int(11) NOT NULL,
  `credit_rate` int(11) NOT NULL,
  `amount_paid` int(11) NOT NULL,
  `is_paid` int(11) NOT NULL,
  `current_interest` int(11) NOT NULL,
  `current_balance` int(11) NOT NULL,
  `payment_option` varchar(100) NOT NULL,
  `date_of_payment` varchar(100) NOT NULL,
  `has_penalty` int(11) NOT NULL,
  `is_penalty_paid` int(11) NOT NULL,
  `penalty_amount` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_3rdpayment`
--

CREATE TABLE `tbl_3rdpayment` (
  `transaction_id` int(11) NOT NULL,
  `type_of_loanAccount` varchar(100) NOT NULL,
  `borrower_id` int(11) NOT NULL,
  `ctrl_no_prefix` varchar(100) NOT NULL,
  `fname` varchar(100) NOT NULL,
  `mname` varchar(100) NOT NULL,
  `lname` varchar(100) NOT NULL,
  `type_of_employee` varchar(100) NOT NULL,
  `office` varchar(100) NOT NULL,
  `rank` varchar(100) NOT NULL,
  `loan_amount_rate` int(11) NOT NULL,
  `monthly_payment_rate` int(11) NOT NULL,
  `credit_rate` int(11) NOT NULL,
  `amount_paid` int(11) NOT NULL,
  `is_paid` int(11) NOT NULL,
  `current_interest` int(11) NOT NULL,
  `current_balance` int(11) NOT NULL,
  `payment_option` varchar(100) NOT NULL,
  `date_of_payment` varchar(100) NOT NULL,
  `has_penalty` int(11) NOT NULL,
  `is_penalty_paid` int(11) NOT NULL,
  `penalty_amount` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_4thpayment`
--

CREATE TABLE `tbl_4thpayment` (
  `transaction_id` int(11) NOT NULL,
  `type_of_loanAmount` varchar(100) NOT NULL,
  `borrower_id` int(11) NOT NULL,
  `ctrl_no_prefix` varchar(100) NOT NULL,
  `fname` varchar(100) NOT NULL,
  `mname` varchar(100) NOT NULL,
  `lname` varchar(100) NOT NULL,
  `type_of_employee` varchar(100) NOT NULL,
  `office` varchar(100) NOT NULL,
  `rank` varchar(100) NOT NULL,
  `loan_amount_rate` int(11) NOT NULL,
  `monthly_payment_rate` int(11) NOT NULL,
  `credit_rate` int(11) NOT NULL,
  `amount_paid` int(11) NOT NULL,
  `is_paid` int(11) NOT NULL,
  `current_interest` int(11) NOT NULL,
  `current_balance` int(11) NOT NULL,
  `payment_option` varchar(100) NOT NULL,
  `date_of_payment` varchar(100) NOT NULL,
  `has_penalty` int(11) NOT NULL,
  `is_penalty_paid` int(11) NOT NULL,
  `penalty_amount` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_5k_rates`
--

CREATE TABLE `tbl_5k_rates` (
  `5k_rates_id` int(11) NOT NULL,
  `type_of_loan` varchar(100) NOT NULL,
  `5k_loan_amount_rates` double NOT NULL,
  `5k_monthly_payment_rates` double NOT NULL,
  `5k_credit_rates` double NOT NULL,
  `5k_beginning_balance_rates` double NOT NULL,
  `5k_interest_rate` int(11) NOT NULL,
  `5k_penaltyPercentage_rates` double NOT NULL,
  `5k_penalty_permonth_rates` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_5k_rates`
--

INSERT INTO `tbl_5k_rates` (`5k_rates_id`, `type_of_loan`, `5k_loan_amount_rates`, `5k_monthly_payment_rates`, `5k_credit_rates`, `5k_beginning_balance_rates`, `5k_interest_rate`, `5k_penaltyPercentage_rates`, `5k_penalty_permonth_rates`) VALUES
(1, '5k', 4750, 1667, 5000, 5000, 4750, 0.016, 80);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_5thpayment`
--

CREATE TABLE `tbl_5thpayment` (
  `transaction_id` int(11) NOT NULL,
  `type_of_loanAmount` varchar(100) NOT NULL,
  `borrower_id` int(11) NOT NULL,
  `ctrl_no_prefix` varchar(100) NOT NULL,
  `fname` varchar(100) NOT NULL,
  `mname` varchar(100) NOT NULL,
  `lname` varchar(100) NOT NULL,
  `type_of_employee` varchar(100) NOT NULL,
  `office` varchar(100) NOT NULL,
  `rank` varchar(100) NOT NULL,
  `loan_amount_rate` int(11) NOT NULL,
  `monthly_payment_rate` int(11) NOT NULL,
  `credit_rate` int(11) NOT NULL,
  `amount_paid` int(11) NOT NULL,
  `is_paid` int(11) NOT NULL,
  `current_interest` int(11) NOT NULL,
  `current_balance` int(11) NOT NULL,
  `payment_option` varchar(100) NOT NULL,
  `date_of_payment` varchar(100) NOT NULL,
  `has_penalty` int(11) NOT NULL,
  `is_penalty_paid` int(11) NOT NULL,
  `penalty_amount` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_10k_new_loan`
--

CREATE TABLE `tbl_10k_new_loan` (
  `10kNewLoanID` int(11) NOT NULL,
  `10kNewLoanControlNumber` varchar(50) NOT NULL,
  `10kNewLoanBorrowerID` int(11) NOT NULL,
  `10kNewLoanFirstName` varchar(50) NOT NULL,
  `10kNewLoanMiddleName` varchar(50) NOT NULL,
  `10kNewLoanLastName` varchar(50) NOT NULL,
  `10kNewLoanOffice` varchar(50) NOT NULL,
  `10kNewLoanAmountRate` double NOT NULL,
  `10kNewLoanBeginningCreditRate` double NOT NULL,
  `10kNewLoanMonthlyPaymentRate` double NOT NULL,
  `10kNewLoanBeginningInterestRate` double NOT NULL,
  `10kNewLoanBeginningBalanceRate` double NOT NULL,
  `10kNewLoanDateBorrowed` varchar(50) NOT NULL,
  `10kNewLoanRemarks` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_10k_rates`
--

CREATE TABLE `tbl_10k_rates` (
  `10k_rates_id` int(11) NOT NULL,
  `10k_loan_amount_rates` double NOT NULL,
  `10k_monthly_payment_rates` double NOT NULL,
  `10k_credit_rates` double NOT NULL,
  `10k_beginning_balance_rates` double NOT NULL,
  `10k_penaltyPercentage_rates` double NOT NULL,
  `10k_penalty_permonth_rates` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_10k_rates`
--

INSERT INTO `tbl_10k_rates` (`10k_rates_id`, `10k_loan_amount_rates`, `10k_monthly_payment_rates`, `10k_credit_rates`, `10k_beginning_balance_rates`, `10k_penaltyPercentage_rates`, `10k_penalty_permonth_rates`) VALUES
(1, 9500, 2000, 10000, 10000, 0.016, 160);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_admin_account`
--

CREATE TABLE `tbl_admin_account` (
  `admin_ID` int(11) NOT NULL,
  `admin_firstname` varchar(50) NOT NULL,
  `admin_lastname` varchar(50) NOT NULL,
  `admin_middleName` varchar(50) NOT NULL,
  `admin_username` varchar(50) NOT NULL,
  `admin_password` varchar(50) NOT NULL,
  `admin_email` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_admin_account`
--

INSERT INTO `tbl_admin_account` (`admin_ID`, `admin_firstname`, `admin_lastname`, `admin_middleName`, `admin_username`, `admin_password`, `admin_email`) VALUES
(1, 'fg', '', '', '', 'd41d8cd98f00b204e9800998ecf8427e', ''),
(2, 'Josh', 'Josh', 'JOSH', '1admin', '21232f297a57a5a743894a0e4a801fc3', 'Josh@yahoo.com'),
(3, 'J', 'J', 'J', 'user', '21232f297a57a5a743894a0e4a801fc3', 'j@yahoo.com'),
(4, 'test', 'test', 'test', 'test', '098f6bcd4621d373cade4e832627b4f6', 'test@yahoo.com'),
(5, 'test2', 'test2', 'test2', 'test2', 'ad0234829205b9033196ba818f7a872b', 'test2@g.com'),
(6, 'test2', 'test2', 'test2', 'test2', 'e1671797c52e15f763380b45e841ec32', 'test2@g.com'),
(7, 'test', 'test', 'test', 'test', '827ccb0eea8a706c4c34a16891f84e7b', 'test@yahoo.com'),
(8, 'JOSH', 'josh', 'josh', 'jj', 'bf2bc2545a4a5f5683d9ef3ed0d977e0', 'jj@gmail.com'),
(9, 'f', 'f', 'f', 'rr', '514f1b439f404f86f77090fa9edc96ce', 'f@gs.com'),
(10, 'Firstname', 'Last', 'Middle', 'USERNAME', '319f4d26e3c536b5dd871bb2c52e3178', 'flm@yahoo.com');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_civilian_employee`
--

CREATE TABLE `tbl_civilian_employee` (
  `civilian_ID` int(11) NOT NULL,
  `type_of_employee` varchar(100) NOT NULL,
  `civilian_fName` varchar(50) NOT NULL,
  `civilian_lName` varchar(50) NOT NULL,
  `civilian_mName` varchar(50) NOT NULL,
  `civilian_office` varchar(50) NOT NULL,
  `civilian_email` varchar(50) NOT NULL,
  `civilian_contactNumber` varchar(50) NOT NULL,
  `civilian_birthdate` varchar(50) NOT NULL,
  `civilian_address` varchar(50) NOT NULL,
  `civilian_rank` varchar(100) NOT NULL,
  `downpayment_count` int(11) NOT NULL,
  `dp_5k_count` int(11) NOT NULL,
  `dp_10k_count` int(11) NOT NULL,
  `fullpayment_count` int(11) NOT NULL,
  `fp_5k_count` int(11) NOT NULL,
  `fp_10k_count` int(11) NOT NULL,
  `penalty_count` int(11) NOT NULL,
  `penalty_5k_count` int(11) NOT NULL,
  `penalty_10k_count` int(11) NOT NULL,
  `la_5k_count` int(11) NOT NULL,
  `la_10k_count` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_civilian_employee`
--

INSERT INTO `tbl_civilian_employee` (`civilian_ID`, `type_of_employee`, `civilian_fName`, `civilian_lName`, `civilian_mName`, `civilian_office`, `civilian_email`, `civilian_contactNumber`, `civilian_birthdate`, `civilian_address`, `civilian_rank`, `downpayment_count`, `dp_5k_count`, `dp_10k_count`, `fullpayment_count`, `fp_5k_count`, `fp_10k_count`, `penalty_count`, `penalty_5k_count`, `penalty_10k_count`, `la_5k_count`, `la_10k_count`) VALUES
(1, 'civilian', 'CIVILIAN FIRSTNAME', 'CIVILIAN LASTNAME', 'CIVILIAN MIDDLE', 'VSAT', 'CIVILIAN@YAHOO.COM', '1111111111', '2020-04-16', 'CIVILIAN ADDRESS', 'none', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(2, 'civilian', 'CIVILIAN FIRSTNAME 2', 'CIVILIAN LASTNAME', 'CIVILIAN MIDDLE', 'VSAT', 'CIVILIAN2@YAHOO.COM', '1111111111', '2020-04-16', 'CIVILIAN ADDRESS', 'none', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(3, 'civilian', 'Steven', 'Jobs', 'Paul', 'Headquarters', 'apple@apple.com', '999999', '1955-02-24', 'San Francisco', 'none', 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_civilian_employee_account`
--

CREATE TABLE `tbl_civilian_employee_account` (
  `civilian_account_id` int(11) NOT NULL,
  `civilian_id` int(11) NOT NULL,
  `civilian_account_fName` varchar(50) NOT NULL,
  `civilian_account_lName` varchar(50) NOT NULL,
  `civilian_account_mName` varchar(50) NOT NULL,
  `civilian_account_unit` varchar(50) NOT NULL,
  `civilian_account_email` varchar(50) NOT NULL,
  `civilian_account_contactNumber` varchar(50) NOT NULL,
  `civilian_account_birthdate` varchar(50) NOT NULL,
  `civilian_account_adress` varchar(50) NOT NULL,
  `civilian_username` varchar(50) NOT NULL,
  `civilian_password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_fullpayment`
--

CREATE TABLE `tbl_fullpayment` (
  `transaction_id` int(11) NOT NULL,
  `type_of_loanAmount` varchar(100) NOT NULL,
  `borrower_id` int(11) NOT NULL,
  `ctrl_no_prefix` varchar(100) NOT NULL,
  `fname` varchar(100) NOT NULL,
  `mname` varchar(100) NOT NULL,
  `lname` varchar(100) NOT NULL,
  `type_of_employee` varchar(100) NOT NULL,
  `office` varchar(100) NOT NULL,
  `rank` varchar(100) NOT NULL,
  `loan_amount_rate` int(11) NOT NULL,
  `monthly_payment_rate` int(11) NOT NULL,
  `credit_rate` int(11) NOT NULL,
  `amount_paid` int(11) NOT NULL,
  `is_paid` int(11) NOT NULL,
  `current_interest` int(11) NOT NULL,
  `current_balance` int(11) NOT NULL,
  `payment_option` varchar(100) NOT NULL,
  `date_of_payment` varchar(100) NOT NULL,
  `has_penalty` int(11) NOT NULL,
  `is_penalty_paid` int(11) NOT NULL,
  `penalty_amount` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_journal_record`
--

CREATE TABLE `tbl_journal_record` (
  `journal_id` int(11) NOT NULL,
  `journal_date` varchar(50) NOT NULL,
  `journal_remarks` varchar(100) NOT NULL,
  `journal_debit` int(11) NOT NULL,
  `journal_credit` int(11) NOT NULL,
  `journal_balance` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_loan_monitoring_5k`
--

CREATE TABLE `tbl_loan_monitoring_5k` (
  `5k_loan_id` int(11) NOT NULL,
  `5k_borrower_employee_id` int(11) NOT NULL,
  `5k_borrower_control_number_prefix` varchar(50) NOT NULL,
  `5k_borrower_account_type` varchar(50) NOT NULL,
  `5k_borrower_firstname` varchar(50) NOT NULL,
  `5k_borrower_middlename` varchar(50) NOT NULL,
  `5k_borrower_lastname` varchar(50) NOT NULL,
  `type_of_employee` varchar(100) NOT NULL,
  `5k_borrower_office` varchar(50) NOT NULL,
  `5k_amount_payment` varchar(50) NOT NULL,
  `5k_current_interest` varchar(50) NOT NULL,
  `5k_current_balance` varchar(50) NOT NULL,
  `5k_payment_option` varchar(50) NOT NULL,
  `5k_date` varchar(50) NOT NULL,
  `5k_penalty_amount` int(11) NOT NULL,
  `5k_status` int(11) NOT NULL,
  `5k_is_deactivated` int(11) NOT NULL,
  `5k_is_fully_paid` int(11) NOT NULL,
  `5k_remarks` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_loan_monitoring_10k`
--

CREATE TABLE `tbl_loan_monitoring_10k` (
  `loan_10k_id` int(11) NOT NULL,
  `10k_borrower_employee_id` int(11) NOT NULL,
  `10k_borrower_control_number` varchar(50) NOT NULL,
  `10k_account_type` varchar(50) NOT NULL,
  `10k_borrower_firstname` varchar(50) NOT NULL,
  `10k_borrower_middlename` varchar(50) NOT NULL,
  `10k_borrower_lastname` varchar(50) NOT NULL,
  `10k_borrower_office` varchar(50) NOT NULL,
  `10k_amount_payment` int(11) NOT NULL,
  `10k_current_interest` int(11) NOT NULL,
  `10k_current_balance` int(11) NOT NULL,
  `10k_payment_option` varchar(50) NOT NULL,
  `10k_date` varchar(50) NOT NULL,
  `10k_penalty_amount` int(11) NOT NULL,
  `10k_status` int(11) NOT NULL,
  `10k_is_deactivated` int(11) NOT NULL,
  `10k_is_fully_paid` int(11) NOT NULL,
  `10k_remarks` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_loan_requests`
--

CREATE TABLE `tbl_loan_requests` (
  `loan_request_id` int(11) NOT NULL,
  `loan_request_borrower_id` int(11) NOT NULL,
  `loan_request_borrower_firstname` varchar(50) NOT NULL,
  `loan_request_borrower_middlename` varchar(50) NOT NULL,
  `loan_request_borrower_lastname` varchar(50) NOT NULL,
  `loan_request_borrower_office` varchar(50) NOT NULL,
  `loan_request_amount` double NOT NULL,
  `loan_request_credit` int(11) NOT NULL,
  `loan_request_monthly_payment` double NOT NULL,
  `loan_request_interest` double NOT NULL,
  `loan_request_account_type` varchar(50) NOT NULL,
  `loan_request_beginning_balance` double NOT NULL,
  `loan_request_date_borrowed` varchar(50) NOT NULL,
  `loan_request_is_granted` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_new_5k_loan`
--

CREATE TABLE `tbl_new_5k_loan` (
  `loan_id_5k` int(11) NOT NULL,
  `borrower_id` int(11) NOT NULL,
  `ctrl_no_prefix` varchar(100) NOT NULL,
  `fname` varchar(100) NOT NULL,
  `mname` varchar(100) NOT NULL,
  `lname` varchar(100) NOT NULL,
  `type_of_employee` varchar(100) NOT NULL,
  `type_of_loan` varchar(100) NOT NULL,
  `loan_amount_5k_rate` int(11) NOT NULL,
  `monthly_payment_5k_rate` int(11) NOT NULL,
  `credit_5k_rate` int(11) NOT NULL,
  `debit_pay_5k` int(11) NOT NULL,
  `interest_rate_5k` int(11) NOT NULL,
  `balance_rate_5k` int(11) NOT NULL,
  `date_of_loan` varchar(100) NOT NULL,
  `comment` varchar(200) NOT NULL,
  `penalty` int(11) NOT NULL,
  `office` varchar(100) NOT NULL,
  `emp_rank` varchar(100) NOT NULL,
  `first_payment` int(11) NOT NULL,
  `second_payment` int(11) NOT NULL,
  `third_payment` int(11) NOT NULL,
  `fourth_payment` int(11) NOT NULL,
  `fifth_payment` int(11) NOT NULL,
  `full_payment` int(11) NOT NULL,
  `loan_status` int(11) NOT NULL,
  `isNewLoan` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_new_5k_loan`
--

INSERT INTO `tbl_new_5k_loan` (`loan_id_5k`, `borrower_id`, `ctrl_no_prefix`, `fname`, `mname`, `lname`, `type_of_employee`, `type_of_loan`, `loan_amount_5k_rate`, `monthly_payment_5k_rate`, `credit_5k_rate`, `debit_pay_5k`, `interest_rate_5k`, `balance_rate_5k`, `date_of_loan`, `comment`, `penalty`, `office`, `emp_rank`, `first_payment`, `second_payment`, `third_payment`, `fourth_payment`, `fifth_payment`, `full_payment`, `loan_status`, `isNewLoan`) VALUES
(11, 3, '950CEISG-000', 'Steven', 'Paul', 'Jobs', 'civilian', '5k', 4750, 1667, 5000, 0, 4750, 5000, '27-Apr-20', 'New Loan form Steven Paul Jobs.', 80, 'Headquarters', 'none', 0, 0, 0, 0, 0, 0, 0, 1),
(12, 9, '950CEISG-000', 'Marshall', 'Bruce', 'Mathers', 'officer', '5k', 4750, 1667, 5000, 0, 4750, 5000, '27-Apr-20', 'New Loan form Marshall Bruce Mathers.', 80, 'Headquarters', 'MSgt', 0, 0, 0, 0, 0, 0, 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_officersandep`
--

CREATE TABLE `tbl_officersandep` (
  `officer_ID` int(11) NOT NULL,
  `type_of_employee` varchar(100) NOT NULL,
  `officer_fName` varchar(50) NOT NULL,
  `officer_lName` varchar(50) NOT NULL,
  `officer_mName` varchar(50) NOT NULL,
  `officer_headquarter` varchar(50) NOT NULL,
  `officer_email` varchar(50) NOT NULL,
  `officer_contactNumber` varchar(50) NOT NULL,
  `officer_birthdate` varchar(50) NOT NULL,
  `officer_address` varchar(100) NOT NULL,
  `officer_rank` varchar(50) NOT NULL,
  `downpayment_count` int(11) NOT NULL,
  `dp_5k_count` int(11) NOT NULL,
  `dp_10k_count` int(11) NOT NULL,
  `fullpayment_count` int(11) NOT NULL,
  `fp_5k_count` int(11) NOT NULL,
  `fp_10k_count` int(11) NOT NULL,
  `penalty_count` int(11) NOT NULL,
  `penalty_5k_count` int(11) NOT NULL,
  `penalty_10k_count` int(11) NOT NULL,
  `la_5k_count` int(11) NOT NULL,
  `la_10k_count` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_officersandep`
--

INSERT INTO `tbl_officersandep` (`officer_ID`, `type_of_employee`, `officer_fName`, `officer_lName`, `officer_mName`, `officer_headquarter`, `officer_email`, `officer_contactNumber`, `officer_birthdate`, `officer_address`, `officer_rank`, `downpayment_count`, `dp_5k_count`, `dp_10k_count`, `fullpayment_count`, `fp_5k_count`, `fp_10k_count`, `penalty_count`, `penalty_5k_count`, `penalty_10k_count`, `la_5k_count`, `la_10k_count`) VALUES
(1, 'officer', 'FIRSTNAME', 'LAST', 'MIDDLE', 'VSAT', 'EMAIL@DOMAIN.COM', '12345', '2020-04-15', 'ADDRESS', 'SMS', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(2, 'officer', 'FIRSTNAME1', 'LASTNAME2', 'MIDDLE2', 'Headquarters', 'EMAIL2@DOMAIN.COM', '22222', '2020-04-06', 'ADDRESS2', 'LTC', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(3, 'officer', 'JEAN JOSHUA', 'VILLANUEVA', 'HAPLASCA', '951ST CES', 'JOSH@GMAIL.COM', '099999999', '2020-03-18', 'PASAY', 'LTC', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(4, 'officer', 'JOHN RAYMOND', 'AUSTRIA', 'E', 'Headquarters', 'JOHNRAY@GMAIL.COM', '099999999', '2020-03-09', 'MALIBAY', 'LTC', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(5, 'officer', 'JESS MATTHEW', 'SANTILLAN', 'N', 'Headquarters', 'JESS@GMAIL.COM', '', '2020-02-19', 'PASAY', 'LTC', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(6, 'officer', 'FNAME', 'LNAME', 'MNAME', 'Headquarters', 'EMAIL@YAHO.COM', '', '2020-03-02', 'ADD', 'LTC', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(7, 'officer', 'FNAME', 'LNAME', 'MNAME', 'Headquarters', 'EMAIL@YAHO.COM', '', '2020-03-02', 'ADD', 'LTC', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(8, 'officer', 'sfdss', 'd', 'aaa', '', 'g@GMAI.COM', 'q34', '2020-04-01', 'sdf', 'LTC', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(9, 'officer', 'Marshall', 'Mathers', 'Bruce', 'Headquarters', 'marsh@yahoo.com', '092222', '1972-10-17', 'Detriot', 'MSgt', 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_officersandep_account`
--

CREATE TABLE `tbl_officersandep_account` (
  `officer_account_id` int(11) NOT NULL,
  `officer_id` int(11) NOT NULL,
  `officer_account_fName` varchar(50) NOT NULL,
  `officer_account_lName` varchar(50) NOT NULL,
  `officer_account_mName` varchar(50) NOT NULL,
  `officer_account_headquarter` varchar(50) NOT NULL,
  `officer_account_email` varchar(50) NOT NULL,
  `officer_account_contactNumber` varchar(50) NOT NULL,
  `officer_account_birthdate` varchar(50) NOT NULL,
  `officer_account_address` varchar(50) NOT NULL,
  `officer_account_username` varchar(50) NOT NULL,
  `officer_account_password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_seed_money`
--

CREATE TABLE `tbl_seed_money` (
  `seed_money_id` int(11) NOT NULL,
  `seed_money_rates` double NOT NULL,
  `current_seed_money` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_seed_money`
--

INSERT INTO `tbl_seed_money` (`seed_money_id`, `seed_money_rates`, `current_seed_money`) VALUES
(1, 100000, 100000);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_1stpayment`
--
ALTER TABLE `tbl_1stpayment`
  ADD PRIMARY KEY (`transaction_id`);

--
-- Indexes for table `tbl_2ndpayment`
--
ALTER TABLE `tbl_2ndpayment`
  ADD PRIMARY KEY (`transaction_id`);

--
-- Indexes for table `tbl_3rdpayment`
--
ALTER TABLE `tbl_3rdpayment`
  ADD PRIMARY KEY (`transaction_id`);

--
-- Indexes for table `tbl_4thpayment`
--
ALTER TABLE `tbl_4thpayment`
  ADD PRIMARY KEY (`transaction_id`);

--
-- Indexes for table `tbl_5k_rates`
--
ALTER TABLE `tbl_5k_rates`
  ADD PRIMARY KEY (`5k_rates_id`);

--
-- Indexes for table `tbl_5thpayment`
--
ALTER TABLE `tbl_5thpayment`
  ADD PRIMARY KEY (`transaction_id`);

--
-- Indexes for table `tbl_10k_new_loan`
--
ALTER TABLE `tbl_10k_new_loan`
  ADD PRIMARY KEY (`10kNewLoanID`);

--
-- Indexes for table `tbl_10k_rates`
--
ALTER TABLE `tbl_10k_rates`
  ADD PRIMARY KEY (`10k_rates_id`);

--
-- Indexes for table `tbl_admin_account`
--
ALTER TABLE `tbl_admin_account`
  ADD PRIMARY KEY (`admin_ID`);

--
-- Indexes for table `tbl_civilian_employee`
--
ALTER TABLE `tbl_civilian_employee`
  ADD PRIMARY KEY (`civilian_ID`);

--
-- Indexes for table `tbl_civilian_employee_account`
--
ALTER TABLE `tbl_civilian_employee_account`
  ADD PRIMARY KEY (`civilian_account_id`);

--
-- Indexes for table `tbl_fullpayment`
--
ALTER TABLE `tbl_fullpayment`
  ADD PRIMARY KEY (`transaction_id`);

--
-- Indexes for table `tbl_journal_record`
--
ALTER TABLE `tbl_journal_record`
  ADD PRIMARY KEY (`journal_id`);

--
-- Indexes for table `tbl_loan_monitoring_5k`
--
ALTER TABLE `tbl_loan_monitoring_5k`
  ADD PRIMARY KEY (`5k_loan_id`);

--
-- Indexes for table `tbl_loan_monitoring_10k`
--
ALTER TABLE `tbl_loan_monitoring_10k`
  ADD PRIMARY KEY (`loan_10k_id`);

--
-- Indexes for table `tbl_loan_requests`
--
ALTER TABLE `tbl_loan_requests`
  ADD PRIMARY KEY (`loan_request_id`);

--
-- Indexes for table `tbl_new_5k_loan`
--
ALTER TABLE `tbl_new_5k_loan`
  ADD PRIMARY KEY (`loan_id_5k`);

--
-- Indexes for table `tbl_officersandep`
--
ALTER TABLE `tbl_officersandep`
  ADD PRIMARY KEY (`officer_ID`);

--
-- Indexes for table `tbl_officersandep_account`
--
ALTER TABLE `tbl_officersandep_account`
  ADD PRIMARY KEY (`officer_account_id`);

--
-- Indexes for table `tbl_seed_money`
--
ALTER TABLE `tbl_seed_money`
  ADD PRIMARY KEY (`seed_money_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_1stpayment`
--
ALTER TABLE `tbl_1stpayment`
  MODIFY `transaction_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_2ndpayment`
--
ALTER TABLE `tbl_2ndpayment`
  MODIFY `transaction_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_3rdpayment`
--
ALTER TABLE `tbl_3rdpayment`
  MODIFY `transaction_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_4thpayment`
--
ALTER TABLE `tbl_4thpayment`
  MODIFY `transaction_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_5k_rates`
--
ALTER TABLE `tbl_5k_rates`
  MODIFY `5k_rates_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_5thpayment`
--
ALTER TABLE `tbl_5thpayment`
  MODIFY `transaction_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_10k_new_loan`
--
ALTER TABLE `tbl_10k_new_loan`
  MODIFY `10kNewLoanID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_10k_rates`
--
ALTER TABLE `tbl_10k_rates`
  MODIFY `10k_rates_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_admin_account`
--
ALTER TABLE `tbl_admin_account`
  MODIFY `admin_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tbl_civilian_employee`
--
ALTER TABLE `tbl_civilian_employee`
  MODIFY `civilian_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_civilian_employee_account`
--
ALTER TABLE `tbl_civilian_employee_account`
  MODIFY `civilian_account_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_fullpayment`
--
ALTER TABLE `tbl_fullpayment`
  MODIFY `transaction_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_journal_record`
--
ALTER TABLE `tbl_journal_record`
  MODIFY `journal_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_loan_monitoring_5k`
--
ALTER TABLE `tbl_loan_monitoring_5k`
  MODIFY `5k_loan_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_loan_monitoring_10k`
--
ALTER TABLE `tbl_loan_monitoring_10k`
  MODIFY `loan_10k_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_loan_requests`
--
ALTER TABLE `tbl_loan_requests`
  MODIFY `loan_request_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_new_5k_loan`
--
ALTER TABLE `tbl_new_5k_loan`
  MODIFY `loan_id_5k` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `tbl_officersandep`
--
ALTER TABLE `tbl_officersandep`
  MODIFY `officer_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `tbl_officersandep_account`
--
ALTER TABLE `tbl_officersandep_account`
  MODIFY `officer_account_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_seed_money`
--
ALTER TABLE `tbl_seed_money`
  MODIFY `seed_money_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
