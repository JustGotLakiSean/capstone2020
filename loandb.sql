-- phpMyAdmin SQL Dump
-- version 4.8.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 22, 2020 at 01:46 PM
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
  `borrower_office` varchar(100) NOT NULL,
  `borrower_rank` varchar(100) NOT NULL,
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
  `penalty_amount` int(11) NOT NULL,
  `remarks` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_2ndpayment`
--

CREATE TABLE `tbl_2ndpayment` (
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
  `borrower_rank` varchar(100) NOT NULL,
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
  `penalty_amount` int(11) NOT NULL,
  `remarks` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_3rdpayment`
--

CREATE TABLE `tbl_3rdpayment` (
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
  `borrower_rank` varchar(100) NOT NULL,
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
  `penalty_amount` int(11) NOT NULL,
  `remarks` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_4thpayment`
--

CREATE TABLE `tbl_4thpayment` (
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
  `borrower_rank` varchar(100) NOT NULL,
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
  `penalty_amount` int(11) NOT NULL,
  `remarks` varchar(100) NOT NULL
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
  `5k_penaltyPercentage_rates` decimal(10,3) NOT NULL,
  `5k_penalty_permonth_rates` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_5thpayment`
--

CREATE TABLE `tbl_5thpayment` (
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
  `borrower_rank` varchar(100) NOT NULL,
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
  `penalty_amount` int(11) NOT NULL,
  `remarks` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_6thpayment`
--

CREATE TABLE `tbl_6thpayment` (
  `transaction_id` int(11) NOT NULL,
  `loan_id` int(11) NOT NULL,
  `type_of_loanAccount` varchar(100) NOT NULL,
  `borrower_id` int(11) NOT NULL,
  `ctrl_no_prefix` varchar(100) NOT NULL,
  `fname` varchar(100) NOT NULL,
  `mname` varchar(100) NOT NULL,
  `lname` varchar(100) NOT NULL,
  `type_of_employee` varchar(100) NOT NULL,
  `borrower_office` varchar(100) NOT NULL,
  `borrower_rank` varchar(100) NOT NULL,
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
  `penalty_amount` int(11) NOT NULL,
  `remarks` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_10k_rates`
--

CREATE TABLE `tbl_10k_rates` (
  `10k_rates_id` int(11) NOT NULL,
  `type_of_loan` varchar(100) NOT NULL,
  `10k_loan_amount_rates` double NOT NULL,
  `10k_monthly_payment_rates` double NOT NULL,
  `10k_credit_rates` double NOT NULL,
  `10k_beginning_balance_rates` double NOT NULL,
  `10k_interest_rate` int(11) NOT NULL,
  `10k_penaltyPercentage_rates` decimal(10,3) NOT NULL,
  `10k_penalty_permonth_rates` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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

-- --------------------------------------------------------

--
-- Table structure for table `tbl_admin_notif`
--

CREATE TABLE `tbl_admin_notif` (
  `notif_id` int(11) NOT NULL,
  `source_fname` varchar(50) NOT NULL,
  `source_mname` varchar(50) NOT NULL,
  `source_lname` varchar(50) NOT NULL,
  `type_of_employee` varchar(50) NOT NULL,
  `notif_message` varchar(50) NOT NULL,
  `has_read` int(11) NOT NULL,
  `is_displayed` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_admin_notif`
--

INSERT INTO `tbl_admin_notif` (`notif_id`, `source_fname`, `source_mname`, `source_lname`, `type_of_employee`, `notif_message`, `has_read`, `is_displayed`) VALUES
(1, 'Jess Matthew', 'N', 'Santillan', 'officer', 'Jess Matthew Santillan is requesting a 5K loan', 0, 1),
(2, 'Jess Matthew', 'N', 'Santillan', 'officer', 'Jess Matthew Santillan is requesting a 5K loan', 0, 1),
(3, 'Jess Matthew', 'N', 'Santillan', 'officer', 'Jess Matthew Santillan is requesting a 5K loan', 0, 1),
(4, 'Jess Matthew', 'N', 'Santillan', 'officer', 'Jess Matthew Santillan is requesting a 5K loan', 0, 1),
(5, 'Jess Matthew', 'N', 'Santillan', 'officer', 'Jess Matthew Santillan is requesting a 5K loan', 0, 1),
(6, 'Jess Matthew', 'N', 'Santillan', 'officer', 'Jess Matthew Santillan is requesting a 5K loan', 0, 1),
(7, 'Jess Matthew', 'N', 'Santillan', 'officer', 'Jess Matthew Santillan is requesting a 5K loan', 0, 1),
(8, 'Jess Matthew', 'N', 'Santillan', 'officer', 'Jess Matthew Santillan is requesting a 5K loan', 0, 1),
(9, 'Jess Matthew', 'N', 'Santillan', 'officer', 'Jess Matthew Santillan is requesting a 5K loan', 0, 1),
(10, 'Jess Matthew', 'N', 'Santillan', 'officer', 'Jess Matthew Santillan is requesting a 5K loan', 0, 1),
(11, 'Jess Matthew', 'N', 'Santillan', 'officer', 'Jess Matthew Santillan is requesting a 5K loan', 0, 1),
(12, 'Jess Matthew', 'N', 'Santillan', 'officer', 'Jess Matthew Santillan is requesting a 5K loan', 0, 1),
(13, 'Jess Matthew', 'N', 'Santillan', 'officer', 'Jess Matthew Santillan is requesting a 5K loan', 0, 1),
(14, 'Jess Matthew', 'N', 'Santillan', 'officer', 'Jess Matthew Santillan is requesting a 5K loan', 0, 1),
(15, 'Jess Matthew', 'N', 'Santillan', 'officer', 'Jess Matthew Santillan is requesting a 5K loan', 0, 1),
(16, 'Jess Matthew', 'N', 'Santillan', 'officer', 'Jess Matthew Santillan is requesting a 5K loan', 0, 1),
(17, 'Jess Matthew', 'N', 'Santillan', 'officer', 'Jess Matthew Santillan is requesting a 5K loan', 0, 1),
(18, 'Jess Matthew', 'N', 'Santillan', 'officer', 'Jess Matthew Santillan is requesting a 5K loan', 0, 1),
(19, 'Jess Matthew', 'N', 'Santillan', 'officer', 'Jess Matthew Santillan is requesting a 5K loan', 0, 1),
(20, 'Jess Matthew', 'N', 'Santillan', 'officer', 'Jess Matthew Santillan is requesting a 5K loan', 0, 1),
(21, 'Jess Matthew', 'N', 'Santillan', 'officer', 'Jess Matthew Santillan is requesting a 5K loan', 0, 1),
(22, 'Jess Matthew', 'N', 'Santillan', 'officer', 'Jess Matthew Santillan is requesting a 5K loan', 0, 1),
(23, 'Jess Matthew', 'N', 'Santillan', 'officer', 'Jess Matthew Santillan is requesting a 5K loan', 0, 1),
(24, 'Jess Matthew', 'N', 'Santillan', 'officer', 'Jess Matthew Santillan is requesting a 5K loan', 0, 1),
(25, 'Jess Matthew', 'N', 'Santillan', 'officer', 'Jess Matthew Santillan is requesting a 5K loan', 0, 1),
(26, 'Jess Matthew', 'N', 'Santillan', 'officer', 'Jess Matthew Santillan is requesting a 5K loan', 0, 1),
(27, 'Jess Matthew', 'N', 'Santillan', 'officer', 'Jess Matthew Santillan is requesting a 5K loan', 0, 1),
(28, 'Jess Matthew', 'N', 'Santillan', 'officer', 'Jess Matthew Santillan is requesting a 5K loan', 0, 1),
(29, 'Jess Matthew', 'N', 'Santillan', 'officer', 'Jess Matthew Santillan is requesting a 5K loan', 0, 1),
(30, 'Jess Matthew', 'N', 'Santillan', 'officer', 'Jess Matthew Santillan is requesting a 5K loan', 0, 1),
(31, 'Jess Matthew', 'N', 'Santillan', 'officer', 'Jess Matthew Santillan is requesting a 5K loan', 0, 1),
(32, 'Jess Matthew', 'N', 'Santillan', 'officer', 'Jess Matthew Santillan is requesting a 5K loan', 0, 1),
(33, 'Jess Matthew', 'N', 'Santillan', 'officer', 'Jess Matthew Santillan is requesting a 5K loan', 0, 1),
(34, 'Jess Matthew', 'N', 'Santillan', 'officer', 'Jess Matthew Santillan is requesting a 5K loan', 0, 1),
(35, 'Jess Matthew', 'N', 'Santillan', 'officer', 'Jess Matthew Santillan is requesting a 5K loan', 0, 1),
(36, 'Jess Matthew', 'N', 'Santillan', 'officer', 'Jess Matthew Santillan is requesting a 5K loan', 0, 1),
(37, 'Jess Matthew', 'N', 'Santillan', 'officer', 'Jess Matthew Santillan is requesting a 5K loan', 0, 1),
(38, 'Jess Matthew', 'N', 'Santillan', 'officer', 'Jess Matthew Santillan is requesting a 5K loan', 0, 1),
(39, 'Jess Matthew', 'N', 'Santillan', 'officer', 'Jess Matthew Santillan is requesting a 5K loan', 0, 1),
(40, 'Jess Matthew', 'N', 'Santillan', 'officer', 'Jess Matthew Santillan is requesting a 5K loan', 0, 1),
(41, 'Jess Matthew', 'N', 'Santillan', 'officer', 'Jess Matthew Santillan is requesting a 5K loan', 0, 1),
(42, 'Jess Matthew', 'N', 'Santillan', 'officer', 'Jess Matthew Santillan is requesting a 5K loan', 0, 1),
(43, 'Jess Matthew', 'N', 'Santillan', 'officer', 'Jess Matthew Santillan is requesting a 5K loan', 0, 1);

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
  `has_account` int(11) NOT NULL,
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
  `type_of_employee` varchar(100) NOT NULL,
  `civilian_account_rank` varchar(100) NOT NULL,
  `civilian_account_office` varchar(50) NOT NULL,
  `civilian_account_email` varchar(50) NOT NULL,
  `civilian_account_contactNumber` varchar(50) NOT NULL,
  `civilian_account_birthdate` varchar(50) NOT NULL,
  `civilian_account_address` varchar(50) NOT NULL,
  `civilian_username` varchar(50) NOT NULL,
  `civilian_password` varchar(50) NOT NULL,
  `civilian_confirm_password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_fullpayment`
--

CREATE TABLE `tbl_fullpayment` (
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
  `borrower_rank` varchar(100) NOT NULL,
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
  `penalty_amount` int(11) NOT NULL,
  `remarks` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_loan_request_5k`
--

CREATE TABLE `tbl_loan_request_5k` (
  `loan_request_id` int(11) NOT NULL,
  `borrower_id` int(11) NOT NULL,
  `account_id` int(11) NOT NULL,
  `ctrl_no_prefix` varchar(100) NOT NULL,
  `type_of_loan` varchar(100) NOT NULL,
  `borrower_username` varchar(100) NOT NULL,
  `borrower_fname` varchar(100) NOT NULL,
  `borrower_mname` varchar(100) NOT NULL,
  `borrower_lname` varchar(100) NOT NULL,
  `borrower_email` varchar(100) NOT NULL,
  `type_of_employee` varchar(100) NOT NULL,
  `borrower_office` varchar(100) NOT NULL,
  `borrower_rank` varchar(100) NOT NULL,
  `loan_amount_5k_rate` int(11) NOT NULL,
  `monthly_payment_5k_rate` int(11) NOT NULL,
  `credit_5k_rate` int(11) NOT NULL,
  `debit_pay_5k` int(11) NOT NULL,
  `interest_rate_5k` int(11) NOT NULL,
  `balance_rate_5k` int(11) NOT NULL,
  `comment` varchar(100) NOT NULL,
  `penalty` int(11) NOT NULL,
  `first_payment` int(11) NOT NULL,
  `second_payment` int(11) NOT NULL,
  `third_payment` int(11) NOT NULL,
  `fourth_payment` int(11) NOT NULL,
  `fifth_payment` int(11) NOT NULL,
  `full_payment` int(11) NOT NULL,
  `loan_status` int(11) NOT NULL,
  `is_new_loan` int(11) NOT NULL,
  `is_granted` int(11) NOT NULL,
  `is_declined` int(11) NOT NULL,
  `is_pending` int(11) NOT NULL,
  `is_loan_requested_5k` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_loan_request_10k`
--

CREATE TABLE `tbl_loan_request_10k` (
  `loan_request_id_10k` int(11) NOT NULL,
  `borrower_id_10k` int(11) NOT NULL,
  `account_id_10k` int(11) NOT NULL,
  `ctrl_no_prefix_10k` varchar(100) NOT NULL,
  `type_of_loan_10k` varchar(100) NOT NULL,
  `borrower_username_10k` varchar(100) NOT NULL,
  `borrower_fname_10k` varchar(100) NOT NULL,
  `borrower_mname_10k` varchar(100) NOT NULL,
  `borrower_lname_10k` varchar(100) NOT NULL,
  `borrower_email_10k` varchar(100) NOT NULL,
  `type_of_employee_10k` varchar(100) NOT NULL,
  `borrower_office_10k` varchar(100) NOT NULL,
  `borrower_rank_10k` varchar(100) NOT NULL,
  `loan_amount_10k_rate` int(11) NOT NULL,
  `monthly_payment_10k_rate` int(11) NOT NULL,
  `credit_10k_rate` int(11) NOT NULL,
  `debit_pay_10k` int(11) NOT NULL,
  `interest_rate_10k` int(11) NOT NULL,
  `balance_rate_10k` int(11) NOT NULL,
  `comment_10k` varchar(100) NOT NULL,
  `penalty_10k` int(11) NOT NULL,
  `first_payment_10k` int(11) NOT NULL,
  `second_payment_10k` int(11) NOT NULL,
  `third_payment_10k` int(11) NOT NULL,
  `fourth_payment_10k` int(11) NOT NULL,
  `fifth_payment_10k` int(11) NOT NULL,
  `sixth_payment_10k` int(11) NOT NULL,
  `full_payment_10k` int(11) NOT NULL,
  `loan_status_10k` int(11) NOT NULL,
  `is_new_loan_10k` int(11) NOT NULL,
  `is_granted_10k` int(11) NOT NULL,
  `is_declined_10k` int(11) NOT NULL,
  `is_pending_10k` int(11) NOT NULL,
  `is_loan_requested_10k` int(11) NOT NULL
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
  `sixth_payment` int(11) NOT NULL,
  `full_payment` int(11) NOT NULL,
  `loan_status` int(11) NOT NULL,
  `isNewLoan` int(11) NOT NULL,
  `is_loan_requested` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_new_10k_loan`
--

CREATE TABLE `tbl_new_10k_loan` (
  `loan_id_10k` int(11) NOT NULL,
  `borrower_id` int(11) NOT NULL,
  `ctrl_no_prefix` varchar(100) NOT NULL,
  `fname` varchar(100) NOT NULL,
  `mname` varchar(100) NOT NULL,
  `lname` varchar(100) NOT NULL,
  `type_of_employee` varchar(100) NOT NULL,
  `type_of_loan` varchar(100) NOT NULL,
  `loan_amount_10k_rate` int(11) NOT NULL,
  `monthly_payment_10k_rate` int(11) NOT NULL,
  `credit_10k_rate` int(11) NOT NULL,
  `debit_pay_10k` int(11) NOT NULL,
  `interest_rate_10k` int(11) NOT NULL,
  `balance_rate_10k` int(11) NOT NULL,
  `date_of_loan` varchar(100) NOT NULL,
  `comment` varchar(100) NOT NULL,
  `penalty_10k` int(11) NOT NULL,
  `office_10k` varchar(100) NOT NULL,
  `emp_rank_10k` varchar(50) NOT NULL,
  `first_payment_10k` int(11) NOT NULL,
  `second_payment_10k` int(11) NOT NULL,
  `third_payment_10k` int(11) NOT NULL,
  `fourth_payment_10k` int(11) NOT NULL,
  `fifth_payment_10k` int(11) NOT NULL,
  `sixth_payment_10k` int(11) NOT NULL,
  `full_payment_10k` int(11) NOT NULL,
  `loan_status_10k` int(11) NOT NULL,
  `isNewLoan` int(11) NOT NULL,
  `is_loan_requested_10k` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
  `has_account` int(11) NOT NULL,
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
  `type_of_employee` varchar(100) NOT NULL,
  `officer_account_rank` varchar(100) NOT NULL,
  `officer_account_headquarter` varchar(50) NOT NULL,
  `officer_account_email` varchar(50) NOT NULL,
  `officer_account_contactNumber` varchar(50) NOT NULL,
  `officer_account_birthdate` varchar(50) NOT NULL,
  `officer_account_address` varchar(50) NOT NULL,
  `officer_account_username` varchar(50) NOT NULL,
  `officer_account_password` varchar(50) NOT NULL,
  `officer_confirm_password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
-- Indexes for table `tbl_6thpayment`
--
ALTER TABLE `tbl_6thpayment`
  ADD PRIMARY KEY (`transaction_id`);

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
-- Indexes for table `tbl_admin_notif`
--
ALTER TABLE `tbl_admin_notif`
  ADD PRIMARY KEY (`notif_id`);

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
-- Indexes for table `tbl_loan_request_5k`
--
ALTER TABLE `tbl_loan_request_5k`
  ADD PRIMARY KEY (`loan_request_id`);

--
-- Indexes for table `tbl_loan_request_10k`
--
ALTER TABLE `tbl_loan_request_10k`
  ADD PRIMARY KEY (`loan_request_id_10k`);

--
-- Indexes for table `tbl_new_5k_loan`
--
ALTER TABLE `tbl_new_5k_loan`
  ADD PRIMARY KEY (`loan_id_5k`);

--
-- Indexes for table `tbl_new_10k_loan`
--
ALTER TABLE `tbl_new_10k_loan`
  ADD PRIMARY KEY (`loan_id_10k`);

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
  MODIFY `5k_rates_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tbl_5thpayment`
--
ALTER TABLE `tbl_5thpayment`
  MODIFY `transaction_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_6thpayment`
--
ALTER TABLE `tbl_6thpayment`
  MODIFY `transaction_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_10k_rates`
--
ALTER TABLE `tbl_10k_rates`
  MODIFY `10k_rates_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tbl_admin_account`
--
ALTER TABLE `tbl_admin_account`
  MODIFY `admin_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `tbl_admin_notif`
--
ALTER TABLE `tbl_admin_notif`
  MODIFY `notif_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT for table `tbl_civilian_employee`
--
ALTER TABLE `tbl_civilian_employee`
  MODIFY `civilian_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tbl_civilian_employee_account`
--
ALTER TABLE `tbl_civilian_employee_account`
  MODIFY `civilian_account_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_fullpayment`
--
ALTER TABLE `tbl_fullpayment`
  MODIFY `transaction_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_loan_request_5k`
--
ALTER TABLE `tbl_loan_request_5k`
  MODIFY `loan_request_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;

--
-- AUTO_INCREMENT for table `tbl_loan_request_10k`
--
ALTER TABLE `tbl_loan_request_10k`
  MODIFY `loan_request_id_10k` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `tbl_new_5k_loan`
--
ALTER TABLE `tbl_new_5k_loan`
  MODIFY `loan_id_5k` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `tbl_new_10k_loan`
--
ALTER TABLE `tbl_new_10k_loan`
  MODIFY `loan_id_10k` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_officersandep`
--
ALTER TABLE `tbl_officersandep`
  MODIFY `officer_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `tbl_officersandep_account`
--
ALTER TABLE `tbl_officersandep_account`
  MODIFY `officer_account_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
