-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jan 25, 2024 at 01:24 PM
-- Server version: 10.6.14-MariaDB-cll-lve
-- PHP Version: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `u590962464_clinic`
--

-- --------------------------------------------------------

--
-- Table structure for table `announcement`
--

CREATE TABLE `announcement` (
  `actId` int(11) NOT NULL,
  `actName` text NOT NULL,
  `date_added` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `appointment`
--

CREATE TABLE `appointment` (
  `appt_Id` int(11) NOT NULL,
  `appt_patient_Id` int(11) NOT NULL,
  `appt_date` date NOT NULL,
  `appt_time` varchar(50) NOT NULL,
  `appt_reason` text NOT NULL,
  `appt_status` int(11) NOT NULL DEFAULT 0 COMMENT '0=Pending, 1=Approved, 2=Denied, 3=Settled, 4=Denied by patient',
  `seen_by_admin` int(11) DEFAULT 0 COMMENT '0=Unread, 1=Read',
  `is_rescheduled` int(11) NOT NULL DEFAULT 0 COMMENT '0=Not rescheduled, 1=Rescheduled, 2=Denied by patient',
  `date_added` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `appointment`
--

INSERT INTO `appointment` (`appt_Id`, `appt_patient_Id`, `appt_date`, `appt_time`, `appt_reason`, `appt_status`, `seen_by_admin`, `is_rescheduled`, `date_added`) VALUES
(22, 78, '2024-01-15', '08:00-09:00 AM', 'Isidksnwkkd', 3, 0, 0, '2024-01-11 18:44:27');

-- --------------------------------------------------------

--
-- Table structure for table `asking_med`
--

CREATE TABLE `asking_med` (
  `asking_med_Id` int(11) NOT NULL,
  `patient_Id` int(11) NOT NULL,
  `pr` varchar(100) NOT NULL,
  `temperature` varchar(100) NOT NULL,
  `vital_sign` text NOT NULL,
  `medical_advised` text NOT NULL,
  `medicine_given` text NOT NULL,
  `chief_complaints` text NOT NULL,
  `date_admitted` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `asking_med`
--

INSERT INTO `asking_med` (`asking_med_Id`, `patient_Id`, `pr`, `temperature`, `vital_sign`, `medical_advised`, `medicine_given`, `chief_complaints`, `date_admitted`) VALUES
(132, 70, 'dsa', 'dsad', 'adas', 'dsa', 'Acid Reducer, Anti-Inflammatory, Antibiotic', 'dsa', '2023-12-21 02:46:15'),
(135, 73, 'ASAs', 'asa', 'sdsd', 'ss', 'DAGUL', 'sdss', '2024-01-08 10:58:38'),
(136, 73, 'f', 'fgdf', 'fgf', 'fgfg', 'Blood Pressure Control', 'hfghf', '2024-01-08 11:04:18'),
(137, 93, 'dwfwe', 'rtr', 'ere', 'grtgrg', 'Anxiety Relief, Blood Pressure Control', 'yjyhyhththt', '2024-01-10 09:48:37'),
(138, 78, '12', '12', 'Kskk', 'Mzmzm', 'Bakal', 'Usjdk', '2024-01-11 11:48:12'),
(139, 68, '12', '12', 'Nsks', 'Nsn', 'Anxiety Relief, Bakal', 'Jwkssj', '2024-01-11 11:53:30'),
(140, 71, 'sad', 'sadsa', 'dasdas', 'das', 'samplesample', 'dsadsadsada', '2024-01-12 00:51:30');

-- --------------------------------------------------------

--
-- Table structure for table `asking_med_transaction_log`
--

CREATE TABLE `asking_med_transaction_log` (
  `Id` int(11) NOT NULL,
  `patient_Id` int(11) NOT NULL,
  `stock_used_value` int(11) NOT NULL,
  `med_Id` int(11) NOT NULL,
  `asking_med_Id` int(11) NOT NULL,
  `date_added` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `asking_med_transaction_log`
--

INSERT INTO `asking_med_transaction_log` (`Id`, `patient_Id`, `stock_used_value`, `med_Id`, `asking_med_Id`, `date_added`) VALUES
(78, 70, 1, 35, 132, '2023-12-21 02:46:15'),
(79, 70, 2, 36, 132, '2023-12-21 02:46:15'),
(80, 70, 3, 32, 132, '2023-12-21 02:46:15'),
(81, 74, 2, 41, 133, '2024-01-07 17:36:58'),
(82, 73, 3, 41, 134, '2024-01-08 02:52:52'),
(83, 73, 2, 42, 135, '2024-01-08 02:58:38'),
(84, 73, 2, 33, 136, '2024-01-08 03:04:18'),
(85, 93, 1, 38, 137, '2024-01-10 01:48:37'),
(86, 93, 1, 33, 137, '2024-01-10 01:48:37'),
(87, 78, 2, 43, 138, '2024-01-11 03:48:12'),
(88, 68, 3, 38, 139, '2024-01-11 03:53:30'),
(89, 68, 3, 43, 139, '2024-01-11 03:53:30'),
(90, 71, 1, 44, 140, '2024-01-11 16:51:30');

-- --------------------------------------------------------

--
-- Table structure for table `consultation`
--

CREATE TABLE `consultation` (
  `consult_Id` int(11) NOT NULL,
  `patient_Id` int(11) NOT NULL,
  `mothers_maiden_name` varchar(255) NOT NULL,
  `chief_complaints` text NOT NULL,
  `temperature` varchar(255) NOT NULL,
  `vs_bp` varchar(255) NOT NULL,
  `pr` varchar(255) NOT NULL,
  `rr` varchar(255) NOT NULL,
  `o2zat` varchar(255) NOT NULL,
  `doctors_advice` text NOT NULL,
  `medicine_given` text NOT NULL,
  `medical_personnel` varchar(255) NOT NULL,
  `date_admitted` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `consultation`
--

INSERT INTO `consultation` (`consult_Id`, `patient_Id`, `mothers_maiden_name`, `chief_complaints`, `temperature`, `vs_bp`, `pr`, `rr`, `o2zat`, `doctors_advice`, `medicine_given`, `medical_personnel`, `date_admitted`) VALUES
(1, 70, 'sda', 'dsa', 'dsa', 'dsa', 'dsad', 'adsa', 'dsa', 'dadas', 'dsa', 'dsa', '2023-11-25 21:09:38'),
(2, 70, 'dsa', 'dsadsa', 'sd', 'adsa', 'dsad', 'asdsa', 'dsa', 'dsa', 'Bioparacetamol, Product 1, Product 2, Product 3, Product 4, Bioparacetamol, Product 1, Product 2, Product 3, Product 4, Product 5, Product 6, Product 7, Product 8', 'dsa', '2023-12-17 00:58:47');

-- --------------------------------------------------------

--
-- Table structure for table `consultation_transaction_log`
--

CREATE TABLE `consultation_transaction_log` (
  `Id` int(11) NOT NULL,
  `patient_Id` int(11) NOT NULL,
  `stock_used_value` int(11) NOT NULL,
  `med_Id` int(11) NOT NULL,
  `consult_Id` int(11) NOT NULL,
  `date_added` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `consultation_transaction_log`
--

INSERT INTO `consultation_transaction_log` (`Id`, `patient_Id`, `stock_used_value`, `med_Id`, `consult_Id`, `date_added`) VALUES
(1, 70, 1, 10, 2, '2023-12-17 00:58:47'),
(2, 70, 2, 2, 2, '2023-12-17 00:58:47'),
(3, 70, 3, 3, 2, '2023-12-17 00:58:47'),
(4, 70, 4, 4, 2, '2023-12-17 00:58:47'),
(5, 70, 5, 5, 2, '2023-12-17 00:58:47'),
(6, 70, 1, 10, 2, '2023-12-17 01:04:35'),
(7, 70, 2, 2, 2, '2023-12-17 01:04:35'),
(8, 70, 3, 3, 2, '2023-12-17 01:04:35'),
(9, 70, 4, 4, 2, '2023-12-17 01:04:35'),
(10, 70, 5, 5, 2, '2023-12-17 01:04:35'),
(11, 70, 1, 6, 2, '2023-12-17 01:04:35'),
(12, 70, 2, 7, 2, '2023-12-17 01:04:35'),
(13, 70, 3, 8, 2, '2023-12-17 01:04:35'),
(14, 70, 4, 9, 2, '2023-12-17 01:04:35');

-- --------------------------------------------------------

--
-- Table structure for table `dental`
--

CREATE TABLE `dental` (
  `dental_Id` int(11) NOT NULL,
  `patient_Id` int(11) NOT NULL,
  `dental_history` text NOT NULL,
  `teeth_no` varchar(100) NOT NULL,
  `vs_bp` varchar(255) NOT NULL,
  `pr` varchar(255) NOT NULL,
  `rr` varchar(255) NOT NULL,
  `medicine_given` text NOT NULL,
  `dental_advised` text NOT NULL,
  `date_admitted` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `dental_transaction_log`
--

CREATE TABLE `dental_transaction_log` (
  `Id` int(11) NOT NULL,
  `patient_Id` int(11) NOT NULL,
  `stock_used_value` int(11) NOT NULL,
  `med_Id` int(11) NOT NULL,
  `dental_Id` int(11) NOT NULL,
  `date_added` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `form2`
--

CREATE TABLE `form2` (
  `form2_Id` int(11) NOT NULL,
  `patient_Id` int(11) NOT NULL,
  `vs_bp` varchar(100) NOT NULL,
  `pr` varchar(100) NOT NULL,
  `rr` varchar(100) NOT NULL,
  `temperature` varchar(100) NOT NULL,
  `vital_sign` text NOT NULL,
  `diagnosis` text NOT NULL,
  `medical_advised` text NOT NULL,
  `date_admitted` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `form2_transaction_log`
--

CREATE TABLE `form2_transaction_log` (
  `Id` int(11) NOT NULL,
  `patient_Id` int(11) NOT NULL,
  `stock_used_value` int(11) NOT NULL,
  `med_Id` int(11) NOT NULL,
  `form2_Id` int(11) NOT NULL,
  `date_added` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `medicine`
--

CREATE TABLE `medicine` (
  `med_Id` int(11) NOT NULL,
  `brand_name` varchar(100) NOT NULL,
  `other_brand_name` varchar(100) NOT NULL,
  `med_name` varchar(100) NOT NULL,
  `med_type` varchar(30) NOT NULL,
  `milligrams` varchar(50) NOT NULL,
  `med_stock_in` varchar(50) NOT NULL,
  `med_stock_in_orig` varchar(100) NOT NULL,
  `med_stock_out` varchar(100) NOT NULL,
  `expiration_date` varchar(100) NOT NULL,
  `is_returned` int(11) NOT NULL DEFAULT 0 COMMENT '0=Expired, 1=Returned',
  `seen_by_admin` int(11) NOT NULL DEFAULT 0 COMMENT '0=Unread, 1=Read',
  `date_added` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `medicine`
--

INSERT INTO `medicine` (`med_Id`, `brand_name`, `other_brand_name`, `med_name`, `med_type`, `milligrams`, `med_stock_in`, `med_stock_in_orig`, `med_stock_out`, `expiration_date`, `is_returned`, `seen_by_admin`, `date_added`) VALUES
(31, 'Paracetamol', 'Tylenol', 'Pain Relief', 'Tablet', '500', '100 units', '120 units', '', '2023-12-31', 0, 1, '2023-11-15 10:30 AM'),
(32, 'Amoxicillin', 'Amoxil', 'Antibiotic', 'Capsule', '250', '47 capsules', '60 capsules', '3', '2023-12-28', 0, 1, '2023-11-15 11:15 AM'),
(33, 'Lisinopril', '', 'Blood Pressure Control', 'Tablet', '10', '27 tablets', '40 tablets', '3', '2027-12-25', 0, 1, '2023-11-16 09:45 AM'),
(34, 'Simvastatin', 'Zocor', 'Cholesterol Buster', 'Tablet', '20', '25 tablets', '30 tablets', '', '2023-12-30', 0, 1, '2023-11-16 10:20 AM'),
(35, 'Omeprazole', 'Prilosec', 'Acid Reducer', 'Capsule', '40', '59 capsules', '70 capsules', '1', '2023-12-15', 1, 1, '2023-11-17 08:55 AM'),
(36, 'Ibuprofen', 'Advil', 'Anti-Inflammatory', 'Tablet', '200', '78 tablets', '90 tablets', '2', '2023-12-31', 0, 1, '2023-11-17 09:30 AM'),
(37, '', '', 'Heart Health', 'Branded', '81', '120 tablets', '120 tablets', '', '2027-12-26', 0, 1, '2023-11-18 10:10 AM'),
(38, '', 'Valium', 'Anxiety Relief', 'Generic', '5', '36 tablets', '36 tablets', '4', '2027-12-27', 0, 1, '2023-11-18 10:45 AM'),
(39, 'Ciprofloxacin', 'Cipro', 'Antibiotic', 'Tablet', '500', '20 tablets', '25 tablets', '', '2023-12-28', 0, 1, '2023-11-19 09:20 AM'),
(40, 'Metformin', 'Glucophage', 'Diabetes Control', 'Tablet', '850', '60 tablets', '70 tablets', '', '2022-12-29', 0, 1, '2023-11-19 09:55 AM'),
(43, 'Unilab', '', 'Bakal', 'Branded', '200mg', '120 tablets', '125 tablet ', '5', '2027-01-11', 0, 0, '2024-01-11 11:47 AM'),
(44, 'RiteMed', '', 'samplesample', 'Branded', '20', '22 tablets', '23 tablets', '1', '2024-02-01', 0, 0, '2024-01-12 12:50 AM');

-- --------------------------------------------------------

--
-- Table structure for table `notification`
--

CREATE TABLE `notification` (
  `notif_Id` int(11) NOT NULL,
  `type` varchar(100) NOT NULL,
  `subject` varchar(255) NOT NULL,
  `message` text NOT NULL,
  `reason` text NOT NULL,
  `sender` int(11) NOT NULL,
  `is_read_by_patient` int(11) NOT NULL DEFAULT 0 COMMENT '0=Unread, 1=Read',
  `is_read_by_staff` int(11) NOT NULL DEFAULT 0 COMMENT '0=Unread, 1=Read',
  `date_sent` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `notification`
--

INSERT INTO `notification` (`notif_Id`, `type`, `subject`, `message`, `reason`, `sender`, `is_read_by_patient`, `is_read_by_staff`, `date_sent`) VALUES
(64, 'Appointment', 'Appointment request', 'Good day Sir Chiejay  Mareno Pagente , an appointment has been set by new patient named, Archie Pagente.', 'Isidksnwkkd', 78, 0, 0, '2024-01-11 17:36:43'),
(65, 'Appointment', 'Appointment approved', 'Good day Sir Archie Pagente, your appointment has been approved. Your schedule will be on 2024-01-13 at exactly 08:00-09:00 AM.', '', 78, 0, 0, '2024-01-11 17:38:20'),
(66, 'Appointment', 'Appointment approved', 'Good day Sir Archie Pagente, your appointment has been approved. Your schedule will be on 2024-01-13 at exactly 08:00-09:00 AM.', '', 78, 0, 0, '2024-01-11 18:07:13'),
(67, 'Appointment', 'Rescheduled appointment', 'Good day Maam Archie Pagente, your appointment has been rescheduled. Please confirm this message by clicking accept or denied appointment button in your appointment page after you login.', '', 78, 0, 0, '2024-01-11 18:39:09'),
(68, 'Appointment', 'Appointment approved', 'Good day Maam Archie Pagente, your appointment has been approved. Your schedule will be on 2024-01-15 at exactly 08:00-09:00 AM.', '', 78, 0, 0, '2024-01-11 18:43:03'),
(69, 'Appointment', 'Appointment settled', 'Good day Maam Archie Pagente, your appointment has been settled.', '', 78, 0, 0, '2024-01-11 18:44:30');

-- --------------------------------------------------------

--
-- Table structure for table `patient`
--

CREATE TABLE `patient` (
  `user_Id` int(11) NOT NULL,
  `added_by` int(11) NOT NULL,
  `vaccine_status` varchar(50) NOT NULL,
  `position` varchar(20) NOT NULL,
  `civil_status` varchar(50) NOT NULL,
  `name` varchar(255) NOT NULL,
  `grade` varchar(20) NOT NULL,
  `teacher_position` varchar(150) NOT NULL,
  `dob` varchar(50) NOT NULL,
  `age` varchar(100) NOT NULL,
  `sex` varchar(10) NOT NULL,
  `address` varchar(255) NOT NULL,
  `religion` varchar(200) NOT NULL,
  `contact` varchar(20) NOT NULL,
  `email` varchar(50) NOT NULL,
  `parentName` varchar(75) NOT NULL,
  `parentContact` varchar(20) NOT NULL,
  `guardianName` varchar(100) NOT NULL,
  `illness` text NOT NULL,
  `pastMedical` text NOT NULL,
  `surgicalHistory` text NOT NULL,
  `blood_type` varchar(30) NOT NULL,
  `height` varchar(10) NOT NULL,
  `weight` varchar(10) NOT NULL,
  `allergy` text NOT NULL,
  `password` varchar(100) NOT NULL,
  `pass` varchar(255) NOT NULL,
  `nutritional_Immunization` varchar(255) NOT NULL,
  `familyHistory` varchar(255) NOT NULL,
  `socialHistory` varchar(255) NOT NULL,
  `packsYears` varchar(50) NOT NULL,
  `environment` varchar(50) NOT NULL,
  `frequency` varchar(50) NOT NULL,
  `general` varchar(255) NOT NULL,
  `hematologic` varchar(255) NOT NULL,
  `endocrine` varchar(255) NOT NULL,
  `extremities` varchar(150) NOT NULL,
  `skin` varchar(150) NOT NULL,
  `head` varchar(150) NOT NULL,
  `vision` varchar(50) NOT NULL,
  `Eyes` varchar(150) NOT NULL,
  `ears` varchar(150) NOT NULL,
  `nose` varchar(100) NOT NULL,
  `mouthThroat` varchar(150) NOT NULL,
  `yearsMonths` varchar(100) NOT NULL,
  `neck` varchar(100) NOT NULL,
  `Breast` varchar(100) NOT NULL,
  `Respiratory` varchar(100) NOT NULL,
  `Cardiovascular` varchar(100) NOT NULL,
  `Gastrointestinal` text NOT NULL,
  `peripheralvascular` varchar(150) NOT NULL,
  `freq_urinary` varchar(80) NOT NULL,
  `Urinary` varchar(200) NOT NULL,
  `male` varchar(150) NOT NULL,
  `age_menarche` varchar(150) NOT NULL,
  `female` varchar(100) NOT NULL,
  `muscularSkeletal` varchar(100) NOT NULL,
  `Psychiatric` varchar(100) NOT NULL,
  `Neurologic` varchar(200) NOT NULL,
  `NeurologicExam` varchar(150) NOT NULL,
  `picture` varchar(255) NOT NULL,
  `verification_code` int(11) NOT NULL,
  `date_registered` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `patient`
--

INSERT INTO `patient` (`user_Id`, `added_by`, `vaccine_status`, `position`, `civil_status`, `name`, `grade`, `teacher_position`, `dob`, `age`, `sex`, `address`, `religion`, `contact`, `email`, `parentName`, `parentContact`, `guardianName`, `illness`, `pastMedical`, `surgicalHistory`, `blood_type`, `height`, `weight`, `allergy`, `password`, `pass`, `nutritional_Immunization`, `familyHistory`, `socialHistory`, `packsYears`, `environment`, `frequency`, `general`, `hematologic`, `endocrine`, `extremities`, `skin`, `head`, `vision`, `Eyes`, `ears`, `nose`, `mouthThroat`, `yearsMonths`, `neck`, `Breast`, `Respiratory`, `Cardiovascular`, `Gastrointestinal`, `peripheralvascular`, `freq_urinary`, `Urinary`, `male`, `age_menarche`, `female`, `muscularSkeletal`, `Psychiatric`, `Neurologic`, `NeurologicExam`, `picture`, `verification_code`, `date_registered`) VALUES
(75, 0, '2nd Dose', 'Student', 'Single', ' Renan', 'Bcs', '', '2000-01-08', '24 years old', 'Male', 'Kalawit, Zamboanga del Norte, Philippines', 'Kdkdk', '9855800371', 'renan@gmail.com', 'Nana', '9855800371', 'Nansks', 'Nsns', 'Nana', 'Nans', 'Admin123', 'Admin123', 'Admin123', 'Nsjs', '0192023a7bbd73250516f069df18b500', 'admin123', '', 'Asthma', 'Non-Smoker', 'NA', 'NA', 'NA', '', '', 'Heat and Cold Tolerance', '', '', '', '', '', 'None', '', '', 'NA', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'inbound7492862334361768674.png', 0, '2024-01-07 18:00:42'),
(77, 0, 'Fully Vaccinated', 'Student', 'Single', 'Sheen Morales Zamoras', '2nd BSSW', '', '2003-09-12', '20 years old', 'Female', 'R.t.lim Zamboanga Sibugay ', 'Catholic ', '9368538465', 'sheenzamoras47@gmail.com', 'Evelyn Zamoras ', '9268323380', 'Evelyn Zamoras ', 'N/A', 'N/A', 'N/A', 'B', '5\'2', '47', 'N/A', '907afd45d4fa44f6edf31bf91188c1e4', 'Youhaveme@22', 'Complete immunization', '', '', 'NA', 'NA', 'NA', 'None', 'None', 'None', '', 'None', 'None', '', 'None', 'None', 'None', 'None', 'NA', 'None', 'None', 'None', 'None', 'None', 'None', '', 'None,UTI', 'N/A', '', 'N/A', '', 'None', 'None', '', 'ttn-image-2024-01-08-083821483.png', 0, '2024-01-08 02:52:43'),
(78, 0, 'Fully Vaccinated', 'Student', 'Single', 'Archie Pagente', 'BIST-4', '', '2000-05-20', '23 years old', 'Female', 'Lawson ', 'Roman Catholic ', '9855800371', 'pagentearchie12@gmail.com', 'Erlinda pagente', '9855800371', 'Erlinda pagente ', 'Na', 'Na', 'Na', 'A', '5.5', '60', 'Na', '85c872d8d233367f91b21b6b284e88fb', 'youhaveme@22', 'Complete immunization', 'No Heradi - Familiar Diseases', 'Smoker,Occasional Alcoholic Beverage Drinker', '', '', 'NA', 'None', '', '', '', '', '', '', 'Glasses or Contact Lens', '', '', '', 'NA', 'None', '', '', '', '', '', '', '', '', '', '', '', '', 'None', '', 'Screenshot_20231204-185107.png', 258337, '2024-01-11 18:13:52'),
(80, 0, 'Fully Vaccinated', 'Student', 'Married', 'Mary Anne Camacho ', '4rt year BSIT ', '', '2000-01-08', '24 years old', 'Female', 'Prk. Leonila Ipil Heights ', 'Iglesia ', '9491918614', 'mariadelainecamacho@gmail.com', 'Heram Camacho', '9532373626', 'Heram S. Camacho', 'Skin Allergy ', 'N/A', 'Pregnant days ', 'o±', '4\'11', '55', 'Chicken', '2dde1fb1679533b0ad5109ba0ded385b', 'adelainemylove', 'Complete immunization', '', 'Non-Smoker', 'NA', 'NA', 'NA', 'None', 'None', 'None', 'Good Pulse', 'Itching', 'None', '', 'None', 'None', 'None', 'None', 'NA', 'None', 'None', 'None', 'None', 'Heart Burn,None', 'None', '', 'None,None', 'N/A', '', 'Itching,N/A', '', 'None', 'None', '', '8cf6d439ae21370c54f6193b70033a9b.jpg', 0, '2024-01-08 05:31:44'),
(81, 0, 'Fully Vaccinated', 'Student', 'Single', 'Kris Arian M. Ramiso', '11 senior high', '', '2007-02-13', '16 years old', 'Female', 'Moalboal, titay, Zamboanga, Sibugay', 'Catholic ', '9437548764', 'krisramiso07@gmail.com', 'Christopher Ramiso', '9437810469', 'Chrisel Legaspi', 'none', 'none', 'none', 'B', '152', '55', 'none', '099dc7fd6d8fe7f1f135e12a306b0c5b', 'krisarian', 'Complete immunization', 'No Heradi - Familiar Diseases', 'Non-Smoker', 'NA', 'NA', 'NA', '', 'None', 'None', 'Good Pulse', 'Moles', 'None', '', 'None', 'None', 'None', 'None', 'NA', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'received_754091813235710.jpeg', 0, '2024-01-08 05:44:47'),
(82, 0, '1st Dose', 'Student', 'Single', 'Sarah vin pateño', '11 stem', '', '2007-10-31', '16 years old', 'Female', 'bulawan payao zsp', 'roman catholic', '9357491575', 'sarahpateno347@gmail.com', 'Marvin pateño', '9550525468', 'marvin Pateño', 'N/A', 'N/a', 'N/a', 'O', '4\'11', '45', 'N/a', '4496f5a1d075298d82090540ec265839', 'pateno3107', 'Complete immunization', 'No Heradi - Familiar Diseases', 'Non-Smoker', 'NA', 'NA', 'NA', 'None', 'None', 'None', 'Good Pulse', 'None', 'None', '', 'None', 'None', 'None', 'None', 'NA', 'None', 'None', 'None', 'None', 'None', 'None', '', 'None,None', 'N/A', '', 'N/A', '', 'None', 'None', '', 'Screenshot_20240107_172801_com.android.chrome.jpg', 0, '2024-01-08 05:49:05'),
(83, 0, 'Fully Vaccinated', 'Student', 'Single', 'Karlmarionemendez', '11 B /IA', '', '2024-08-26', '-231 day old', 'Male', 'pob.muslim ', 'Islam', '9983747697', 'Karlmarionnemendez@gmail.com', 'Fadeelah mendez', '9983747697', 'Fadeelah mendez', '\r\nNa', 'NA', 'NA', 'O+', '5\'6', '55', 'NA', '25f9e794323b453885f5181f1b624d0b', '123456789', 'Complete immunization', 'No Heradi - Familiar Diseases', 'Non-Smoker', 'NA', 'NA', 'NA', 'None', 'None', 'None', '', 'None', 'None', '', 'None', 'None', 'None', 'None', 'NA', 'None', 'None', 'None', 'None', 'None', 'None', '', 'None,UTI', '', '', '', '', 'None', '', '', 'received_330981016517501.jpeg', 0, '2024-01-08 06:43:11'),
(84, 0, 'Fully Vaccinated', 'Student', 'Single', 'Joanna Rose Gabuya ', '2 BSSW', '', '2003-03-24', '20 years old', 'Female', 'Lower taway ipil', 'Catholic ', '9512700723', 'gabbyrosereyes24@gmail.com', 'Edgar Gabuya', '9512700723', 'Charylle Gabuya ', 'None ', 'None ', 'None ', 'O ', '5\'4', '42', 'None ', 'fe4be501a6c903d9786fe6ada0ace10a', 'joanna032403', 'Normal Filipino Diet', '', 'Non-Smoker,Non-Alcoholic Beverage Drinker', 'NA', 'NA', 'NA', 'Weight loss', 'Anemia', '', 'Good Pulse', 'Rashes', 'None', '', 'None', 'None', 'None', 'None', 'NA', 'None', 'None', 'None', 'None', 'None', 'None', '', 'None,None', 'N/A', '', 'N/A', '', 'None', 'None', '', '1684993769073.jpg', 0, '2024-01-08 07:10:27'),
(85, 0, '2nd Dose', 'Student', 'Single', 'Kristyl jane soposo Hepiga ', 'BSSW 2', '', '2003-08-17', '20 years old', 'Female', 'Don Perfecto R.T.Lim Zamboanga sibugay ', 'Seventh day Adventist ', '9534412707', 'kristyljaneh@gmail.com', 'Edilberto M. Hepiga', '9135486276', 'Evelyn s', ' Hepiga ', 'N/A', 'N/A', 'O', '5.6', '53', 'N/A', '589d7f4ac80f2fd4e4f188d75763eb22', 'kristyl20', 'Complete immunization', 'No Heradi - Familiar Diseases', 'Non-Smoker,Non-Alcoholic Beverage Drinker', 'NA', 'NA', 'NA', 'None', 'None', 'None', 'Good Pulse', 'None', 'None', '', 'None', 'None', 'None', 'None', 'NA', 'None', 'None', 'None', 'None', 'None', 'None', '', 'None,None', 'N/A', '', 'N/A', '', 'None', 'None', '', 'IMG_1681304285761.jpg', 0, '2024-01-09 06:51:38'),
(86, 0, '1st Dose', 'Student', 'Single', 'Rojelyn jutba', '3rd year Bs social w', '', '2003-01-09', '21 years old', 'Female', 'Taway', 'Catholic ', '9486885913', 'rojelynjutba@gmail.com', 'Lorylit', '9272005839', 'N/A', 'N/A', 'N/A', 'N/a', 'N/a', 'N/a', 'N/a', 'N/a', 'a5956a13437824edc6f225a6e9b22e49', 'rojelynjutba', 'Complete immunization', '', '', 'NA', 'NA', 'NA', '', '', '', '', '', '', '', '', '', '', '', 'NA', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'Screenshot_20210905-195528.png', 0, '2024-01-08 07:18:50'),
(87, 0, '2nd Dose', 'Student', 'Single', 'Hadidja M.Pablo', 'BSSW-3', '', '2001-03-11', '22 years old', 'Female', 'PUROK ALOE VERA KITABOG TITAY ZAMBOANGA SIBUGAY', 'Islam', '9383945604', 'hadidjapablo@gmail.com', 'Norma Pablo', '9678024590', 'Norma Pablo', 'LA', 'LA', 'LA', 'O', '4\'11', '39', 'Egg, egg plant ', '1de1c4f0b61a7939ca05930189c52cb9', 'khadzpablo0311', 'High Protein Diet', '', '', 'NA', 'NA', 'NA', '', '', '', '', '', '', '', '', '', '', '', 'NA', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'Screenshot_20220318-153937.png', 0, '2024-01-08 07:28:30'),
(88, 0, 'Fully Vaccinated', 'Student', 'Single', 'jernalyn R. Sabturani', 'BS-SOCIAL WORK', '', '2002-08-14', '21 years old', 'Female', 'San Roque Payao ZS', 'Islam', '9365237035', 'jernalynsabturani@gmail.com', 'Arlyn Sabturani', '9066414956', 'Arlyn Sabturani', 'NA', 'NA', 'NA', 'NA', '5\'2', '58', 'NA', '6d498b6ffd4457bb1b99ae77e64c255a', 'girldreamer', '', '', '', 'NA', 'NA', 'NA', '', '', '', '', '', '', '', '', '', '', '', 'NA', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'Screenshot_2024-01-08-11-26-38-86_be80aec1db9a2b53c9d399db0c602181.jpg', 0, '2024-01-08 07:31:30'),
(89, 0, 'Fully Vaccinated', 'Student', 'Single', 'Jessel O. Cabagte ', 'BSSW 2nd Year', '', '2001-12-18', '22 years old', 'Female', 'New Antique Rtlim ZSP', 'Roman Catholic ', '9677069895', 'mondejarjess123@gmail.com', 'Gedion M. Cabagte ', '9269573868', 'Gedion M. Cabagte ', 'None', 'None', 'None', 'O', '55cm', '48', 'None', '6556681c7f4a20fd795efc762c4839fd', 'security@2001', 'Prefers Vegetables', '', 'Non-Smoker', 'NA', 'NA', 'NA', '', '', '', '', '', '', '', '', '', '', '', 'NA', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'inbound6420521668226092587.jpg', 0, '2024-01-08 09:35:09'),
(90, 0, '2nd Dose', 'Student', 'Single', 'Troy Joseph A. Bardago', '2nd year BSBA', '', '2003-11-09', '20 years old', 'Male', 'Don Andres, Ipil, Zamboanga Sibugay ', 'Catholic ', '9854514759', 'bardagotroyjoseph@gmail.com', 'Mary Lanie A. Bardago', '9353432922', 'Mary Lanie A. Bardago ', 'None', 'Headache ', 'None', 'A', '5\'6', '63', 'None', '902e507edba327ddc91e425b94164b42', 'lablab12345', 'Complete immunization', '', '', 'NA', 'NA', 'NA', '', '', '', '', '', '', '', '', '', '', '', 'NA', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'Screenshot_2023-11-05-20-01-51-683_com.facebook.katana.jpg', 0, '2024-01-09 00:30:01'),
(91, 0, '1st Dose', 'Student', 'Single', 'Kylyn Joy Depalubos', 'Fourth year bsba', '', '2001-11-08', '22 years old', 'Female', 'Ipil, 7000 Zamboanga Sibugay, Philippines', 'Catholic', '9093320765', 'kylzhie@gmail.com', 'Gernan Depalubos', '9069554128', 'N/A', 'Anemic', 'Apendic', 'N/A', 'A', '4\'2', '43', 'N/A', '668d8965a374af5ee1d6c8e70ae690e2', 'kylynandan1181', 'Complete immunization', 'Asthma', 'Non-Smoker,Non-Alcoholic Beverage Drinker', 'NA', 'NA', 'NA', 'Weakness,Fatigue,Fever', 'Anemia', 'Excessive Sweating', 'Good Pulse', 'Itching,Moles', 'Headache,Diziness', '', 'Blurring of Vision', 'None', 'None', 'Sore Throat', 'NA', 'Pain', 'Pain', 'Cough', 'None', 'Diarrhoea', 'None', '', 'None,UTI', 'N/A', '', 'N/A', 'Backache', 'Nervousness,Depression', 'Change of Moods,Headache,Dizziness,Blackouts', 'GCS 15', 'inbound4860092859848246684.jpg', 0, '2024-01-09 04:29:13'),
(92, 0, '1st Dose', 'Student', 'Single', 'Julhaidine Lahasan Liwanag', '4rth /Bs-Criminology', '', '2001-05-15', '22 years old', 'Male', 'Lapaz naga, zamboanga sibugay', 'Catholic', '9093320765', 'julhaidineliwanag@gmail.com', 'Julito Liwanag', '9069554128', 'N/A', 'N/A', 'N/A', 'N/A', 'O', '5\'8', '57', 'N/A', '668d8965a374af5ee1d6c8e70ae690e2', 'kylynandan1181', 'Complete immunization', 'No Heradi - Familiar Diseases', 'Non-Smoker,Non-Alcoholic Beverage Drinker', 'NA', 'NA', 'NA', 'None', 'None', 'None', 'Good Pulse', 'None', 'None', '', 'None', 'None', 'None', 'None', 'NA', 'None', 'None', 'None', 'None', 'None', 'None', '', 'None,None', 'N/A', '', 'N/A', '', 'None', 'None', 'Oriented to Time and Place', 'inbound3959200691013252798.jpg', 0, '2024-01-11 08:21:25'),
(93, 0, '2nd Dose', 'Student', 'Single', 'Land', 'BSM', '', '1999-09-10', '24 years old', 'Male', 'Ipil', 'Pentecostal ', '9101644097', 'Orlandesmeralda10@gmail.com', 'Juan Esmeralda ', '9101644097', 'None', 'None ', 'No e', 'None', 'A', '5\'1', '79', 'None', '2681eabe3756a490738a66fe282e27e3', 'ORLAND10051999', 'Complete immunization,High Protein Diet,Prefers Vegetables,Prefers Canned Goods', 'No Heradi - Familiar Diseases', 'Non-Smoker,Non-Alcoholic Beverage Drinker', 'NA', 'NA', 'NA', 'None', 'None', 'None', 'Good Pulse', 'None', 'None', '', 'None', 'None', 'None', 'None', 'NA', 'None', 'None', 'None', 'None', 'None', 'None', '6', 'None,None', 'N/A', '', 'N/A', '', 'None', 'None', '', 'inbound7637620233082620166.jpg', 0, '2024-01-09 11:20:19'),
(95, 0, 'Fully Vaccinated', 'Student', 'Married', 'Rendren Benitez', '3rd year BSHM ', '', '1998-03-22', '25 years old', 'Female', 'Pob. Kabasalan ZSP ', 'Catholic', '9550521634', 'rendrenbenitez@gmail.com', 'Khalid Paul', '9550521634', 'Khalid Paul', 'N/A', 'N/A', 'Pregnant ', 'B', '5\'2', '53', 'chicken', 'bf087e0ed801e2bbc1fce036e1cd1e02', 'rendrenbenitez123', 'Complete immunization', 'Allergy', 'Non-Smoker', 'NA', 'NA', 'NA', 'None', 'None', 'None', 'Good Pulse', 'Rashes', 'Headache', '', 'None', 'None', 'None', 'None', 'NA', 'None', 'None', 'None', 'None', 'None', 'None', '', 'None,None', 'N/A', '', 'N/A', '', 'None', 'None', '', 'inbound1098256874869735117.jpg', 0, '2024-01-09 13:53:44'),
(96, 0, 'Fully Vaccinated', 'Student', 'Single', 'Norsahaya Salipa ', '4rt year BSHM ', '', '2001-08-16', '22 years old', 'Female', 'Canacan, Kabasalan, ZSP ', 'Islam ', '9161611983', 'norsahayasalipa@gmail.com', 'Hamia Adjirol', '9161611983', 'Hamia Adjirol ', 'N/A', 'N/a', 'N/a', 'o', '5\'1', '52', 'N/a', '71a74a081cec20fb4c780184703509ca', 'norsahayasalipa123', 'Complete immunization', 'No Heradi - Familiar Diseases', 'Non-Smoker', 'NA', 'NA', 'NA', 'None', 'None', 'None', 'Good Pulse', 'None', 'None', '', 'None', 'None', 'None', 'None', 'NA', 'None', 'None', 'None', 'None', 'None', 'None', '', 'None,None', 'N/A', '', 'N/A', '', 'None', 'None', '', 'inbound6856820659903427155.jpg', 0, '2024-01-09 14:01:41'),
(97, 0, 'Fully Vaccinated', 'Student', 'Single', 'Rina Venida ', '4rt year BSHM ', '', '1991-11-08', '32 years old', 'Female', 'San Antonio Titay, Zambo Sibugay ', 'Catholic ', '9977252106', 'rinavenida@gmail.com', 'virginia Vineda ', '9977252106', 'Virginia Venida ', 'N/A', 'N/A', 'N/A', 'a', '4\'11', '58', 'n/a', '82e693b543d79246db0a8a727ed0e121', 'rinavenida123', 'Complete immunization', 'No Heradi - Familiar Diseases', 'Non-Smoker', 'NA', 'NA', 'NA', 'None', 'None', 'None', 'Good Pulse', 'None', 'Headache', '', 'Eye pain', 'None', 'None', 'None', 'NA', 'None', 'None', 'None', 'None', 'None', '', '', 'None,None', 'N/A', '', 'N/A', '', 'None', 'None', '', 'inbound891370112100009323.jpg', 0, '2024-01-09 14:08:34'),
(98, 0, 'Fully Vaccinated', 'Student', 'Single', 'Kien Laurence, Esteban', '4rt year, BSHM ', '', '2004-10-02', '19 years old', 'Male', 'Kitabog, Zambo. Sibugay', 'Catholic ', '9977667630', 'kienlaurence@gmail.com', 'Maricel Esteban', '9977667630', 'Maricel Esteban', 'n/a', 'n/a', 'n/a', 'b', '5ft', '49', 'none', '0979693df9c511d0ed3b635df3e3a2df', 'kienlaurence123', 'Complete immunization', 'No Heradi - Familiar Diseases', 'Non-Smoker', 'NA', 'NA', 'NA', 'None', 'None', '', '', 'Rashes', 'Headache', '', 'None', 'None', 'None', 'None', 'NA', 'None', 'None', 'None', 'None', 'None', 'None', '', 'None', '', '', 'N/A', '', 'None', '', '', 'inbound8506053493359860641.jpg', 0, '2024-01-09 14:15:54'),
(99, 0, '2nd Dose', 'Student', 'Single', 'Jonathan Pasaylo', '4rth /Bs-Criminology', '', '2001-06-04', '22 years old', 'Male', 'Palalian, Kalawit, Zamboanga del Norte', 'KJC', '9465632460', 'jonathanabuevapasaylo@gmail.com', 'Lorena Pasaylo', '9092454973', 'Lorena Pasaylo', 'None', 'none', 'none', 'B', '5\'9', '64', 'None', 'c37f0b5c0eb41c84aba4b462fb74de15', '09.pasay.09', 'Complete immunization', '', 'Non-Smoker,Non-Alcoholic Beverage Drinker', 'NA', 'NA', 'NA', 'None', 'None', 'None', 'Good Pulse', 'None', 'None', '', 'None', 'None', 'None', 'None', 'NA', 'None', 'None', 'None', 'None', 'None', 'None', '', 'None,None', 'N/A', '', 'N/A', '', 'None', 'None', '', 'inbound5379205995953035787.jpg', 0, '2024-01-11 08:20:12'),
(100, 0, 'Fully Vaccinated', 'Student', 'Single', 'Hazel jane Fernandez', 'BSSW', '', '2003-01-14', '21 years old', 'Female', 'Kabasalan, Zamboanga Sibugay', 'Catholic', '9857861291', 'fernandezhazeljane588@gmail.com', 'Lourdes T. Fernandez', '9362688149', 'Dominador S. Fernandez', 'N/A', 'N/A', 'N/A', 'N/A', '4\'3', '48', 'None', '3f5678d1990ff4f3f4660052c75cfa0a', 'Hazeljane#200314', 'Complete immunization', 'No Heradi - Familiar Diseases', '', 'NA', 'NA', 'NA', 'None', 'None', 'None', 'Good Pulse', 'None', 'None', '', 'None', 'None', 'None', 'None', 'NA', 'None', 'None', 'None', 'None', 'None', 'None', '', 'None,None', 'N/A', '', 'N/A', 'Muscle of Joint Pain', 'None', 'Change of Moods', '', 'inbound5804973144304482655.jpg', 0, '2024-01-09 15:02:58'),
(101, 0, 'Fully Vaccinated', 'Student', 'Single', 'Bersil Gallor ', '4rth /Bs-Criminology', '', '2001-11-22', '22 years old', 'Male', 'Bangco Titay ', 'Roman Catholic ', '9102200521', 'breakergallor@gmail.com', 'Basilio Gallor ', '9056464786', 'Rosalinda Gallor ', 'None', 'None', 'None', 'O', '5,4', '64', 'None', 'd41d8cd98f00b204e9800998ecf8427e', '', 'Normal Filipino Diet', 'No Heradi - Familiar Diseases', 'Non-Smoker', 'NA', 'NA', 'NA', 'None', 'None', 'None', 'Good Pulse', 'None', 'None', '', 'None', 'None', 'None', 'None', 'NA', 'None', 'None', 'None', 'None', 'None', 'None', '', 'None,UTI,None', 'N/A', '', 'N/A', 'Backache', 'None', 'None', '', 'inbound3545125151866316392.jpg', 0, '2024-01-11 08:19:21'),
(102, 0, '2nd Dose', 'Student', 'Single', 'Mark Anthony J. salili', '4rth /Bs-Criminology', '', '2001-09-06', '', 'Male', 'Pob.Naga ZSP', 'Muslim', '9383945604', 'aceKagume@gmail.com', 'Nida J. Salili', '9272005839', 'Nida J. Salili', 'N/A', 'N/a', 'N/a', 'AB', '5\'7', '57', 'N/a', '0192023a7bbd73250516f069df18b500', 'admin123', 'Complete immunization', '', '', 'NA', 'NA', 'NA', '', '', '', '', '', '', '', '', '', '', '', 'NA', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'Screenshot_20220428-170846.png', 0, '2024-01-10 01:29:15'),
(103, 0, 'Fully Vaccinated', 'Student', 'Single', 'Galinato mark jello Caballeron', 'ICT 12', '', '2006-10-27', '17 years old', 'Male', 'KM2 CROSSING STA. CLARA NAGA', 'Iglesia Ni Cristo INC', '9817105608', 'galinatomarkjello@gmail.com', 'Galinato Ivy Caballeron ', '9817105608', 'Galinato Ivy Caballeron ', 'Ne.', 'Appendicitis ', 'ne.', 'AB', '5\'3', '65kgl', 'Sea foods, nuts,', '692a88d116f6ee716b3c0d24502d31c4', '@jc_lock', '', '', '', 'NA', 'NA', 'NA', '', '', '', '', '', '', '', '', '', '', '', 'NA', '', '', '', '', '', '', '', 'None,None', 'N/A', '', 'Itching', '', '', '', '', 'Screenshot_20220611-022819_1.png', 0, '2024-01-10 02:42:58'),
(104, 0, 'Fully Vaccinated', 'Student', 'Single', 'Nawal Jaliol', '2nd year Socialwork', '', '2003-08-02', '20 years old', 'Female', 'Naga ZAMBOANGA SIBUGAY', 'Islam', '9061668399', 'jaliolnawal4@gmail.com', 'NIHMA jaliol', '9061668399', 'NIHMA jaliol', 'N/A', 'N/A', 'N/A', 'B', '5\'4', '55', 'N/A', '079d9dad61def0d259dad1e03df347db', 'nawaljaliol', 'Complete immunization', 'No Heradi - Familiar Diseases', 'Non-Smoker', 'NA', 'NA', 'NA', 'None', 'None', 'None', 'Good Pulse', 'None', 'None', '', 'None', 'None', 'None', 'None', 'NA', 'None', 'None', 'None', 'None', 'None', 'None', '', 'None,None', 'N/A', '', 'N/A', 'Muscle of Joint Pain', 'None', 'None', '100% Sensory Bilateral U/L Extremities', 'received_768334258644913.jpeg', 0, '2024-01-10 03:15:24'),
(105, 0, '1st Booster', 'Student', 'Single', 'Cristy joy b. Lington', '1st /Bs-Criminology', '', '2004-04-10', '19 years old', 'Female', 'Ipil Hights ipil ZS', 'Islam', '9351933966', 'cristy@gmail.com', 'Eduardo E LINGTON', '9678024590', 'Na', 'Na', 'Na', 'Na', 'O', '5.4', '57', 'Na', '669e04814d6c26615f608b7eeb195f08', 'cristy123', 'High Protein Diet', '', '', 'NA', 'NA', 'NA', 'None', '', '', 'Good Pulse', '', '', '', '', 'None', '', '', 'NA', '', '', '', '', '', '', '', '', '', '', '', '', 'None', '', '', 'IMG_20240110_111153.jpg', 0, '2024-01-10 03:17:46'),
(106, 0, '2nd Dose', 'Student', 'Single', 'Justine b. Razo', '1st/Bs-Criminology', '', '2004-09-19', '19 years old', 'Female', 'Don address ipil ZS', 'Catholic ', '9531640159', 'judtine@gmail.com', 'Jonas A. Razo', '9855800371', 'Jonas A. Razo', 'Na', 'Na', 'Na', 'B', '5.1', '39', 'Na', 'f6f3e757ac491a3511a5198a39c5ce29', 'justine123', 'Complete immunization', '', '', 'NA', 'NA', 'NA', '', 'None', '', '', '', '', '', '', 'None', '', '', 'NA', '', '', '', '', 'None', '', '', 'UTI', '', '', '', '', 'None', '', '', 'IMG_20240110_112533.jpg', 0, '2024-01-10 03:26:08'),
(107, 0, 'Fully Vaccinated', 'Student', 'Single', 'Arjun A .Macay', '4rth /Bs-Criminology', '', '2001-05-10', '22 years old', 'Male', 'Palomoc titay ZS', 'Adventist ', '9632823049', 'arjun@gmail.com', 'Ermilinda A. Macay', '9817105608', 'Erminda A. Macay', 'Na', 'Na', 'Na', 'A', '5.5', '61', 'Na', '451d3eb1573c7ebb70c08dfee9766509', 'arjun123', 'Normal Filipino Diet', '', 'Non-Smoker', 'NA', 'NA', 'NA', '', '', 'None', '', '', 'None', '', '', '', '', 'None', 'NA', '', '', 'None', '', '', '', '', '', '', '', '', '', 'None', '', '5/5 Motor Strength Bilateral U/L Extremities', 'IMG_20240110_113146.jpg', 0, '2024-01-10 03:37:09'),
(108, 0, '1st Booster', 'Student', 'Single', 'Zal Oliver M. canite', '4rth /Bs-Criminology', '', '2000-05-19', '23 years old', 'Male', 'POB.malangas Zs', 'Catholic ', '9486885913', 'oliver@gmail.com', 'Olivia U. canite', '9678024590', 'Olivia U. Canite', 'Na', 'Na', 'Na', 'O', '5.4', '59', 'Na', '553fcb594976460e66e32da18a2b6f88', 'oliver123', 'Normal Filipino Diet', 'No Heradi - Familiar Diseases', '', 'NA', 'NA', 'NA', '', '', '', '', '', 'None', '', '', '', '', '', 'NA', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'IMG_20240110_113831.jpg', 0, '2024-01-10 03:42:59'),
(109, 0, 'Fully Vaccinated', 'Student', 'Single', 'Rhaisie v. Pableo', '4rth /Bs-Criminology', '', '1999-10-18', '24 years old', 'Female', 'POB.naga ZS', 'iNC', '9383945604', 'rhaisie@gmai.com', 'Susan sandi', '9518462134', 'Susan sandi', 'Na', 'Na', 'Na', 'A', '5.4', '57', 'Na', '5a8d9a66aa766df14312b02605180bed', 'rhaisie123', 'Complete immunization,High Protein Diet', 'Allergy', 'Non-Smoker', 'NA', 'NA', 'NA', 'None', '', '', '', '', '', '', '', '', '', '', 'NA', 'None', '', '', '', '', '', '', '', '', '', '', '', 'None', '', '', 'IMG_20240110_144651.jpg', 0, '2024-01-10 06:47:35'),
(110, 0, '2nd Dose', 'Student', 'Single', 'Sheila may Manayon', '4rth /Bs-Criminology', '', '2000-05-15', '23 years old', 'Female', 'Ipil sanito ZS', 'iNC', '9518462134', 'shela@gmail.com', 'Hector B. Melchor', '9708771610', 'Na', 'Na', 'Ns', 'Na', 'AB', '4\'11', '57', 'Na', '7c45c336749c913fbba3ad4270cddaa5', 'shela123', 'Complete immunization', '', 'Non-Smoker', 'NA', 'NA', 'NA', 'None', '', '', '', '', '', '', '', '', '', '', 'NA', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'IMG_20240110_145544.jpg', 0, '2024-01-10 07:04:37'),
(111, 0, '1st Booster', 'Student', 'Single', 'Regards P. Roque', '4rth /Bs-Criminology', '', '1998-09-28', '25 years old', 'Male', 'POB.naga ZS', 'Roman Catholic ', '9352431664', 'rechard@gmail.com', 'Thelma P. Roque', '9352431664', 'Na', 'Na', 'Na', 'NA', 'O', '5\'7', '60', ' Egg plant ', 'cc30dfcda8cd3501b0d928c2c78f2bd4', 'rechard123', 'Complete immunization', '', 'Smoker,Non-Alcoholic Beverage Drinker', '', '', 'NA', '', '', '', '', 'None', '', '', '', '', '', 'None', 'NA', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'IMG_20240110_151114.jpg', 0, '2024-01-10 07:11:48'),
(112, 0, 'Fully Vaccinated', 'Student', 'Single', 'Jenny L. Surabeya', '4rth /Bs-Criminology', '', '1997-04-04', '26 years old', 'Female', 'Bangkerohan ipil ZS', 'Roman Catholic ', '9357217423', 'jenny@gmail.com', 'Lenda Surabeya', '9357217423', 'Linda Surabiya', 'Na', 'Na', 'Na', 'O', '5.5', '57', 'Na', '067fccb09c1d91f4f0c5d6d21d5355d9', 'jenny123', 'Complete immunization', '', 'Non-Smoker', 'NA', 'NA', 'NA', '', '', '', 'Good Pulse', 'None', '', '', 'None', '', 'None', '', 'NA', '', 'None', '', '', '', '', '', 'UTI', '', '', '', '', '', '', '', 'IMG_20240110_151830.jpg', 0, '2024-01-10 07:24:16'),
(113, 0, '1st Dose', 'Student', 'Single', 'Alven Shane', '2nd /Bs-Criminology', '', '2003-11-06', '', 'Male', 'Malubal R.T Lim ZSP', 'Seventh Day Adventist ', '9354463992', 'KyrieDolorso@gmail.com', 'Susana Rolida', '9657549791', 'Susana Rolida', 'None', 'None', 'None', 'None', '173cm', '53', 'None', 'd41d8cd98f00b204e9800998ecf8427e', '', 'Normal Filipino Diet', 'No Heradi - Familiar Diseases', 'Non-Smoker', 'NA', 'NA', 'NA', 'None', 'None', 'None', '', '', '', '', 'None', 'None', 'None', 'None', 'NA', 'None', 'None', 'None', 'None', 'Abdominal Pain,None', 'None', '', 'None,None', 'N/A', '', 'N/A', '', 'None', 'None', '', 'IMG_20240110_153540.jpg', 0, '2024-01-10 07:37:42'),
(114, 0, '1st Dose', 'Student', 'Single', 'Elmer Bongcawel', 'BSBA 4 A ', '', '1993-02-23', '30 years old', 'Male', 'Mate Titay Zamboanga Sibugay ', 'Roman Catholic ', '9365232344', 'elmerfloresbongcawel@gmail.com', 'Gloria F Bongcawel ', '9977033967', 'Adelaida B. Licudan ', 'N/A', 'N/A', 'N/A', 'AB', '5, 7 ', '70', 'N/A', 'e7d693886a159122d398d0506e82c253', '#floress', '', '', '', 'NA', 'NA', 'NA', '', '', '', '', '', '', '', '', '', '', '', 'NA', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'inbound2061274201693374062.jpg', 0, '2024-01-10 07:55:28'),
(115, 0, '2nd Dose', 'Student', 'Single', 'CRISTIAN MARK C. DIAZ', 'BS/CRIME FIRST YEAR', '', '2004-05-15', '', 'Male', 'Payongan Alicia ZSP', 'Catholic', '9651771764', 'cristiandias3456@gmail.com', 'Wilma c. Diaz', '9651771764', 'WILMA C. DIAZ', 'None', 'none', 'None', 'N/A', '5\'5', '42', 'N/A', 'd41d8cd98f00b204e9800998ecf8427e', '', 'Normal Filipino Diet', 'No Heradi - Familiar Diseases', 'Non-Smoker', 'NA', 'NA', 'NA', 'None', 'None', 'None', '', 'None', 'None', '', 'None', 'None', 'None', 'None', 'NA', 'None', 'None', 'None', 'None', 'None', 'None', '', 'None,None', '', '', '', '', '', '', '', '32048d29670d0372ee8ff7c2f8baad80.png', 0, '2024-01-10 07:55:50'),
(116, 0, '1st Dose', 'Student', 'Single', 'Aldrin D. Villablagon', '1st /Bs-Criminology', '', '2002-08-23', '21 years old', 'Male', 'Dumpoc Imelda Zamboanga SIBUGAY ', 'Seventh Day Adventist ', '9380873019', 'aldrin@gmail.com', 'Aldronico C Villablagon ', '9380873019', 'Aldronico C Villablagon ', 'N.A', 'N. A', 'N.A', 'AB', '5.5', '53', 'N.A', 'cbfb6b44c87f02687e9b3a0aa28b827f', 'Aldrin 123', '', '', 'Smoker', '', '', 'NA', 'None', '', '', '', '', '', '', '', '', '', '', 'NA', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'IMG_20240110_160341.jpg', 0, '2024-01-10 08:11:13'),
(117, 0, 'Fully Vaccinated', 'Student', 'Single', 'Norman Madamesila ', 'BSBA-2A ', '', '1996-11-14', '27 years old', 'Male', 'Poblacion siay Zamboanga sibugay ', 'Catholic ', '9704450511', 'mayangcaracas599@gmail.com', 'Concordia Madamesila ', '9704450511', 'Concordia Madamesila ', 'N/a', 'N/a', 'N/a', 'N/a', '5\'4', '49', 'Seaweed ', 'd41d8cd98f00b204e9800998ecf8427e', '', '', '', '', 'NA', 'NA', 'NA', '', '', '', '', '', '', '', '', '', '', '', 'NA', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'inbound710343498345929979.jpg', 0, '2024-01-10 13:26:14'),
(118, 0, 'Fully Vaccinated', 'Student', 'Single', 'Rel Dave Edollantes', '1st BSIT ', '', '2002-01-10', '22 years old', 'Male', 'Gango r.t.lim Zamboanga sibugay', 'KKDA', '9275787862', 'reldavemedollantes@gmail.com', 'Madelene Edollantes', '9275787862', 'Madelene Edollantes', 'N/A', 'N/A', 'N/A', 'A+', '55', '55', 'N/A', '3ca03675fb2645cb2c4b596f2ab7ff2b', 'Setnallode143', 'Normal Filipino Diet', 'Asthma', 'Non-Smoker,Non-Alcoholic Beverage Drinker', 'NA', 'NA', 'NA', 'None', 'Anemia', 'None', 'Good Pulse', 'None', 'None', '', 'None', 'None', 'None', 'None', 'NA', 'None', 'None', 'None', 'None', 'None', 'None', '', 'None,None', 'N/A', '', 'N/A', '', 'None', 'None', '', 'inbound7622848393007066780.png', 208990, '2024-01-11 00:55:36'),
(119, 0, 'Fully Vaccinated', 'Student', 'Single', 'Angelo Torres Moreno', '4th year/BSIT', '', '2002-04-22', '21 years old', 'Male', 'TUGOP KALAWIT ZAMBOANGA DEL NORTE', '9', '9078427506', 'clownj154@gmail.com', 'BRENDA TORRES', '9859007139', 'ROY MORENO', 'N/a', 'N/a', 'N/a', 'AB', '5\'3', '60kg', 'N/a', 'f625ab125cf3828df31058cdcd32c1ef', 'angelo123', 'Normal Filipino Diet', 'Allergy', 'Non-Smoker', 'NA', 'NA', 'NA', 'None', 'None', 'None', 'Good Pulse', 'None', 'None', '', 'None', 'None', 'None', 'None', 'NA', 'None', 'None', 'None', 'None', 'None', 'None', '', 'None', 'N/A', '', 'N/A', 'History of Trauma', 'None', 'None', '100% Sensory Bilateral U/L Extremities', 'inbound4739819960086398241.jpg', 0, '2024-01-11 00:45:48'),
(120, 0, 'Fully Vaccinated', 'Student', 'Single', 'JEMARK DENIEGA', '3RD YEAR/CRIMINOLOGY', '', '1999-12-25', '24 years old', 'Male', 'TUGOP KALAWIT ZAMBOANGA DEL NORTE', '9', '9949964185', 'deniegajemark@gmail.com', 'DANNY DENIEGA', '9949964185', 'DANNY DENIEGA', 'N/a', 'N/A', 'N/A', 'O', '5\'5', '60kg', 'N/A', '6a396e1e5073a5ea20c1466af9befe26', 'JEMARK123', 'Complete immunization', 'Allergy', 'Non-Smoker', 'NA', 'NA', 'NA', 'None', 'None', 'None', 'Good Pulse', 'None', 'None', '', 'None', 'None', 'None', 'None', 'NA', 'None', 'None', 'None', 'None', 'None', '', '', 'None,None', 'N/A', '', 'N/A', 'History of Trauma', 'None', 'None', '100% Sensory Bilateral U/L Extremities', 'inbound4945055516535458313.jpg', 0, '2024-01-11 01:02:18'),
(121, 0, 'Fully Vaccinated', 'Student', 'Single', 'RONETH BUSAYONG', '4TH YEAR/BSIT', '', '2001-03-24', '22 years old', 'Female', 'MAGDAUP, IPIL ZAMBOANGA SIBUGAY', '9', '9092093235', 'ronethbusayong032401@gmail.com', 'Nenita busayong', '9092093235', 'Nenita Busayong', 'N/a', 'N/A', 'N/A', 'AB', '5\'0', '49kg', 'N/A', '4a4654b86cb429052d519e33f8f1e852', 'Roneth123', 'Complete immunization', 'No Heradi - Familiar Diseases', 'Non-Smoker', 'NA', 'NA', 'NA', 'None', 'None', 'None', 'Good Pulse', 'None', 'None', '', 'None', 'None', 'None', 'None', 'NA', 'None', 'None', 'None', 'None', 'None', 'None', '', 'None', 'N/A', '', 'N/A', 'History of Trauma', 'None', 'None', '5/5 Motor Strength Bilateral U/L Extremities', 'inbound1953600544760127477.jpg', 0, '2024-01-11 02:53:57'),
(122, 0, 'Fully Vaccinated', 'Student', 'Single', 'Hagonoy, Gerold, Rojas', 'Grade 11-STEM', '', '2006-07-02', '17 years old', 'Male', 'TUGOP KALAWIT,ZAMBOANGA DEL NORTE', '9', '9098445853', 'grold8248@gmail.com', 'Hagonoy,Gelma, Rojas', '9098445853', 'Hagonoy,Gelma, Rojas', 'N/a', 'N/A', 'N/A', 'AB', '5,4', '50kg', 'N/A', '39dd029b1e7d1af51e7aa96be9f300e0', 'gerald123', 'Complete immunization', 'No Heradi - Familiar Diseases', 'Non-Smoker', 'NA', 'NA', 'NA', 'None', 'None', 'None', 'Good Pulse', 'None', 'None', '', 'None', 'None', 'None', 'None', 'NA', 'None', 'None', 'None', 'None', 'None', 'None', '', 'None,None', 'N/A', '', 'N/A', 'History of Trauma', 'None', 'None', '5/5 Motor Strength Bilateral U/L Extremities', 'inbound11432303946361484.jpg', 0, '2024-01-11 03:11:49'),
(123, 0, 'Fully Vaccinated', 'Student', 'Single', 'Gerald R Hagonoy', '1ST YEAR/CRIMINOLOGY', '', '2003-09-13', '20 years old', 'Male', 'TUGOP KALAWIT ZAMBOANGA DEL NORTE', '9', '9098446211', 'angelmoreno042202@gmail.com', 'Raul Hagonoy', '9098446211', 'Raul Hagonoy', 'N/a', 'N/A', 'N/A', 'A', '5\'5', '50kg', 'N/A', 'b125eb513de756877f2ef1c4e32dc4fb', 'hagonoy123', 'Complete immunization', 'No Heradi - Familiar Diseases', 'Non-Smoker', 'NA', 'NA', 'NA', 'None', 'None', 'None', 'Good Pulse', 'None', 'None', '', 'None', 'None', 'None', 'None', 'NA', 'None', 'None', 'None', 'None', 'None', 'None', '', 'None,None', 'N/A', '', 'N/A', 'History of Trauma', 'None', 'None', '5/5 Motor Strength Bilateral U/L Extremities', 'inbound8036988564168764855.jpg', 0, '2024-01-11 04:12:25'),
(124, 0, '1st Dose', 'Student', 'Single', 'KARL LESLIE RECANIL', 'BSSW 2', '', '2004-07-22', '19 years old', 'Male', 'LOGAN, IPIL, ZAMBOANGA SIBUGAY ', 'ALLIANCE ', '9977680048', 'carlrecanil@gmail.com', 'CLAUDIA RECANIL', '9977680048', 'CLAUDIA RECANIL ', 'NON', 'N.A', 'NA', 'NA ', '5\'4', '41', 'SEAFOOD CHICKEN ', 'bb33e45dcadbeea27ab1261ad5517f5c', 'karlleslie7', 'Complete immunization', 'Asthma,Allergy', 'Non-Smoker', 'NA', 'NA', 'NA', 'Fatigue', 'None', 'None', '', 'None', 'None', '', 'None', 'None', 'None', 'None', 'NA', 'None', 'None', 'None', 'None', 'Loss of Appetite', 'None', '', 'None,None', 'N/A', '', 'N/A', '', 'None', 'None', '', 'Screenshot_20230113-153917.jpg', 0, '2024-01-11 05:52:09'),
(125, 0, 'Fully Vaccinated', 'Student', 'Single', 'Lornalyn Godez', '4th yr BSIT', '', '2000-02-08', '', 'Female', 'Palomoc Titay Zamboanga Sibugay ', 'Catholic ', '9513743377', 'gdzlrnlyn@gmail.com', 'Lorena Godez ', '9513743377', 'Lorena Godez ', 'N/A', 'N/A', 'N/A', 'N/A', 'N/A', 'N/A', 'N/A', 'd41d8cd98f00b204e9800998ecf8427e', '', 'Complete immunization,Normal Filipino Diet', 'No Heradi - Familiar Diseases', 'Non-Smoker,Occasional Alcoholic Beverage Drinker', 'NA', 'NA', 'NA', 'None', 'None', 'None', 'Good Pulse', 'None', 'None', '', 'None', 'None', 'None', 'None', 'NA', 'None', 'None', 'None', 'None', 'None', 'None', '', 'None,None', '', '', 'N/A', 'Backache', 'None', 'None', '100% Sensory Bilateral U/L Extremities', 'inbound7061878598270004649.jpg', 0, '2024-01-11 07:43:20'),
(126, 0, '2nd Dose', 'Student', 'Single', 'Dorren Grace Pajo balili', '4/Bsit', '', '2002-04-15', '21 years old', 'Female', 'Dan Jose kalawit Zamboanga del norte', 'Pentecostal', '9126014244', 'dorrengracebalili@gmail.com', 'Dolia pajo Balili/ Luciano jueves Balili sr', '9678675435', 'Dolia Pajo balili', 'N/A', 'N/a', 'N/a', 'O', '5\'1', '59', 'N/a', '76e87f7e7c163dc6b5e5a7eb444a62bf', 'faithfull', 'Complete immunization,Prefers Vegetables', '', '', 'NA', 'NA', 'NA', 'None', 'None', 'None', 'Good Pulse', 'None', 'None', '', 'None', 'None', 'None', 'None', 'NA', 'None', 'None', 'None', 'None', 'None', 'None', '', 'None,UTI', 'N/A', '', 'N/A', '', 'None', 'None', '', 'FB_IMG_17038525411478299.jpg', 0, '2024-01-11 08:51:11'),
(127, 0, '2nd Dose', 'Student', 'Single', 'Rhealyn Otod', 'BSBA', '', '2004-04-24', '19 years old', 'Female', 'Tabon, Jose Dalman Zamboanga del Norte', 'Roman Catholic ', '9364600726', 'otodrhealyn24@gmail.com', 'Selmar Otod', '9351322635', 'Selmar Otod', 'N/A', 'N/A', 'N/a', 'N/A', 'N/A', '49', 'N/A', 'cc14fcbd826acb5c4d34e3c28afdfc1f', 'rhealyn24', 'Complete immunization,Prefers Vegetables', '', 'Non-Smoker,Frequent Alcoholic Beverage Drinker', 'NA', 'NA', '', 'Weakness', 'Anemia', 'None', '', 'None', 'Headache,Diziness', '', 'Blurring of Vision', 'None', 'None', 'Sore Throat', 'NA', 'None', 'None', 'Cough', 'Chest Pain', 'None', 'None', '', 'None,None', 'N/A', '', 'N/A', '', 'Nervousness,Depression', 'Change of Moods,Headache,Dizziness', '', 'inbound9082689903216025878.jpg', 0, '2024-01-11 11:56:23'),
(128, 0, '2nd Dose', 'Student', 'Single', 'hanilyn pacilan', 'first year  BBSW', '', '2002-09-04', '21 years old', 'Female', 'R t.lim zamboanga sibugay', 'catholic', '9261031172', 'pacilanhanilyn@gmail.com', 'loluta pacilan', '9347281692', 'lolita pacilan', 'NA', 'NA', 'NA', 'b', '4\'9', '52', 'NA', '491ae568377abfe3d4dd8562cf63478f', 'pacilan21', 'Complete immunization', '', 'Non-Smoker', 'NA', 'NA', 'NA', 'None', 'None', 'None', '', 'None', 'None', '', 'None', 'None', 'None', 'None', 'NA', 'None', 'None', 'None', 'None', 'None', 'None', '', 'None,None', 'N/A', '', 'N/A', '', 'None', 'None', '', 'Screenshot_20231203-153022_Facebook.jpg', 0, '2024-01-11 12:01:14'),
(129, 0, '1st Dose', 'Student', 'Single', 'Raymund Peter Cabañero', '3rd year BSIT', '', '2000-12-20', '23 years old', 'Male', 'Ipil Zamboanga Sibugay', 'Roman Catholic ', '9513039969', 'raymund.peter17@gmail.com', 'Romeo Cabañero', '9925041507', 'Romeo Cabañero', 'Cough', 'Cough', 'None', 'A ', '5\'6', '70', 'None', 'e64b78fc3bc91bcbc7dc232ba8ec59e0', 'Admin123', 'Normal Filipino Diet', 'Hypertension', 'Non-Smoker,Occasional Alcoholic Beverage Drinker', 'NA', 'NA', 'NA', 'None', 'None', 'None', 'Good Pulse', 'None', 'None', '', 'Glasses or Contact Lens', 'None', 'None', 'None', 'NA', 'None', 'None', 'None', 'None', 'Heart Burn', 'None', '', 'None,None', 'N/A', '', '', '', 'None', 'None', 'Oriented to Time and Place', 'inbound3497186006240508577.jpg', 0, '2024-01-11 12:05:52'),
(130, 0, 'Fully Vaccinated', 'Student', 'Single', 'jeffrey lawas', 'BSCS', '', '2001-11-22', '22 years old', 'Male', 'Palomoc-Culasian Rd, Philippines', 'jeffrey lawas', '9465566167', 'jeffreylawas48@gmail.com', 'Feleciana lawas', '9551023330', 'Feleciana Lawas', 'None', 'None', 'None', 'NA', '5\'4', '52', 'Na', '25d55ad283aa400af464c76d713c07ad', '12345678', 'Complete immunization', 'No Heradi - Familiar Diseases', 'Non-Smoker', 'NA', 'NA', 'NA', 'None', 'None', 'None', 'Good Pulse', 'None', 'None', '', 'Blurring of Vision', 'None', 'None', 'None', 'NA', 'None', 'None', 'None', 'None', 'None', 'None', '', 'None,None', 'N/A', '', 'N/A', '', 'None', 'None', '', 'inbound7474338381303320284.jpg', 0, '2024-01-11 12:10:31'),
(131, 0, 'Fully Vaccinated', 'Student', 'Single', 'John Albert Aranas', 'BSIT-IV', '', '1996-06-02', '27 years old', 'Male', 'Poblacion Titay, Zamboanga Sibugay ', 'Born Again Christian', '9392515880', 'aranasjohnalbert061@gmail.com', 'Daisy Dumajel Aranas ', '9264558567', 'David John Aranas', 'None', 'None', 'None', 'O', '5\'3', '75klg', 'Egg and Chicken', 'cab84d597035cf44690eed1a81922433', 'Namenicrush', 'Complete immunization', 'Asthma', 'Occasional Alcoholic Beverage Drinker', 'NA', 'NA', 'NA', 'None', 'None', 'None', 'Good Pulse', 'None', 'None', '', 'None', 'None', 'None', 'None', 'NA', 'None', 'None', 'None', 'None', 'None', 'None', '', 'None,None', 'N/A', '', '', '', '', '', '', 'inbound393063788819628574.jpg', 0, '2024-01-11 12:58:40'),
(132, 0, '2nd Dose', 'Student', 'Single', 'Cristy Andrada ', 'BSSW SECOND YEAR ', '', '2004-04-09', '19 years old', 'Female', 'Prk. Gemelina brgy tenan ipil ZSP ', 'Islam', '9538233959', 'celesvion@gmail.com', 'Elsie Pilapil', '9363422980', 'Elsie Pilapil ', 'None', 'None', 'None', 'B+', '5\'2', '46', 'None', '0b3635268b02ce40a4aa4c024048c76f', 'cristyandrada', 'Complete immunization', 'No Heradi - Familiar Diseases', 'Non-Smoker', 'NA', 'NA', 'NA', 'None', 'None', 'None', 'Good Pulse', 'None', 'None', '', 'None', 'None', 'None', 'None', 'NA', 'None', 'None', 'None', 'None', 'None', 'None', '', 'None,None', 'N/A', '', 'N/A', '', 'None', 'None', '', 'ttn-image-2023-08-26-153238255.png', 0, '2024-01-11 13:10:53'),
(133, 0, 'Fully Vaccinated', 'Student', 'Single', 'Marco Gen Uriarte', '4th Year BSIT', '', '1998-03-06', '25 years old', 'Male', 'Ipil', 'Inc', '9487976535', 'marcouriarte0699@gmail.com', 'Leda', '9068285575', 'Leogen ', 'None', 'None', 'None', 'B+', '5\'8', '90', 'None', 'f8eabb4d1ada3f0f9611ce06383d6730', 'marco12!@', '', '', '', 'NA', 'NA', 'NA', 'Weakness,Fatigue', '', '', '', '', '', '', '', '', '', '', 'NA', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'inbound2633787243047512900.jpg', 0, '2024-01-11 13:20:33'),
(134, 0, '2nd Dose', 'Student', 'Single', 'Jaylord Pagente Dingal ', 'Third Year/ BS- Crim', '', '2000-11-27', '23 years old', 'Male', 'Poblacion Jose Dalman Zamboanga del Norte ', 'Catholic ', '9557434417', 'jaylorddingal393@gmail.com', 'Nestora B. Pagente ', '9308320406', 'Nestora B. Pagente ', 'Nestora B Pagente ', 'Ailyn B Pagente ', 'OB-GYNE ', 'Type O+', '5\'7', '58', 'None ', 'dd05b3312796fd9cf189dbfc8b21e7b6', 'Jaylord11', 'Complete immunization', 'Allergy', 'Non-Smoker', 'NA', 'NA', 'NA', 'None', 'None', 'None', 'Good Pulse', 'None', 'None', '', 'None', 'None', 'None', 'None', 'NA', 'None', 'None', 'None', 'None', 'Heart Burn,Hepatitis,None', 'None', '', 'None,None', 'N/A', '', 'N/A', 'Muscle of Joint Pain', 'None', 'None', '100% Sensory Bilateral U/L Extremities', 'Screenshot_20240111-213347.png', 0, '2024-01-11 13:34:06'),
(135, 0, 'Fully Vaccinated', 'Student', 'Single', 'John mark arellano', '4 bscrim', '', '2001-08-26', '22 years old', 'Male', 'Ipil heights ipil Zamboanga sibugay ', 'Roman Catholic ', '9939817494', 'arellanoking105925@gmail.com', 'Marlita arellano', '9939817494', 'Marjorie arellano', 'None', 'None', 'None', 'O', '5.3', '70', 'None', '7dacdba047dc6a2c61231a77dbfcf6f8', 'arellanomark', 'Complete immunization', 'Allergy', 'Non-Smoker', 'NA', 'NA', 'NA', 'None', 'None', 'None', 'Good Pulse,Limited ROM', 'None', 'None', '', 'None', 'None', 'None', 'None', 'NA', 'None', 'None', 'None', 'None', 'Abdominal Pain,Hepatitis,None', 'None', '', 'None,None', 'N/A', '', 'N/A', 'Arthritis', 'None', 'Change of Moods', '100% Sensory Bilateral U/L Extremities', 'inbound5017721292663417599.jpg', 0, '2024-01-11 14:14:47'),
(136, 0, 'Fully Vaccinated', 'Student', 'Single', 'CHRISTIAN JOY SANGOAN', '1ST YEAR/BTVTED', '', '2005-04-01', '18 years old', 'Male', 'TUGOP KALAWIT ZAMBOANGA DEL NORTE', '9', '9700432539', 'christianjoysangoan123@gmail.com', 'Reynaldo sangoan', '9700432539', 'Reynaldo Sangoan', 'N/a', 'N/A', 'N/A', 'A', '5\'6', '50kg', 'N/A', 'b0203240cd391618f8cc3c78185e0cfe', 'joy12345', 'Complete immunization', 'No Heradi - Familiar Diseases', '', 'NA', 'NA', 'NA', 'None', 'None', 'None', 'Good Pulse', 'None', 'None', '', 'None', 'None', 'None', 'None', 'NA', 'None', 'None', 'None', 'None', 'None', 'None', '', 'None,None', 'N/A', '', 'N/A', 'History of Trauma', 'None', 'None', '5/5 Motor Strength Bilateral U/L Extremities', 'inbound6399184524597125182.jpg', 0, '2024-01-11 14:26:44'),
(137, 0, '2nd Dose', 'Student', 'Single', 'Jovem boy L. Liwanag', 'HRM-12', '', '2005-11-08', '18 years old', 'Male', 'Lapaz Naga Zs', 'INC', '9518345663', 'jovemlahasan2@gmail.com', 'Julito Liwanag, Hasna Lahasan', '9518345663', 'Na', 'Na', 'Na', 'Na', 'A', '5.4', '53', 'Na', '71a692cda444fc827ea396c06976bdf8', 'liwanag123', 'Complete immunization', '', '', 'NA', 'NA', 'NA', '', '', 'None', '', '', '', '', '', 'None', '', '', 'NA', '', '', 'None', '', '', '', '', 'None', '', '', '', '', '', '', '', 'IMG_20240112_064835.jpg', 0, '2024-01-11 22:55:27'),
(138, 0, 'Fully Vaccinated', 'Student', 'Single', 'Jolina L liwanag', '3rth /Bs-Criminology', '', '2004-01-04', '20 years old', 'Female', 'Lapaz Naga ZS', 'INC', '9977534733', 'liwanagjolina@gmail.com', 'Julito Liwanag, Hasna Lahasan', '9977534733', 'Julito Liwanag, Hasna Lahasan', 'Na', 'Na', 'Na', 'A', '5.4', '60', 'Na', 'af8d984509a363eda5aa8d748926b1c9', 'jolinal@12', 'Complete immunization,Normal Filipino Diet', '', '', 'NA', 'NA', 'NA', 'None', '', '', 'Good Pulse', '', '', '', '', '', 'None', '', 'NA', '', '', '', '', '', '', '', 'None', '', '', '', '', '', '', '', 'IMG_20240112_070640.jpg', 0, '2024-01-11 23:06:55'),
(139, 0, 'Fully Vaccinated', 'Student', 'Single', 'Junapril L. Liwanag', '4rth /Bs-Criminology', '', '2000-04-04', '23 years old', 'Female', 'Lapaz Naga zamboanga SIBUGAY ', 'IanC', '9486885913', 'junapril@gmail.com', 'Julito Liwanag, Hasna Lahasan', '9678024590', 'Na', 'Na', 'Na', 'Na', 'A', '5\'7', '67', 'Na', 'dc7bc8e1c9e0a91c2d72717bf85f3386', 'junapril123', 'Complete immunization', '', '', 'NA', 'NA', 'NA', 'None', '', '', '', 'Moles', '', '', '', '', '', '', 'NA', 'None', '', '', '', '', '', '', 'UTI', '', '', '', '', '', '', '', 'IMG_20240112_071639.jpg', 0, '2024-01-11 23:17:02'),
(140, 0, '2nd Dose', 'Student', 'Single', 'John Rey Tumagna', '1st-bSIT', '', '1998-11-27', '25 years old', 'Male', 'Tininggaan, Tampilisan, Zamboanga del Norte, Philippines', 'Roman Catholic ', '9630877136', 'johnreytumagna011@gmail.com', 'Loreto tumagna', '9630877136', 'Elizabeth tumagna ', 'N/a ', 'N/a', 'N/a', 'N/a', '5', '50', 'N/A', 'd53e434314a9d501bea94c207e9162da', 'Anonymous_11', 'Complete immunization', '', 'Non-Smoker', 'NA', 'NA', 'NA', 'None', 'None', 'None', 'Good Pulse', 'None', 'None', '', 'None', 'None', 'None', 'None', 'NA', 'None', 'None', 'None', 'None', '', 'None', '', 'None,None', 'N/A', '', 'N/A', '', 'None', 'None', '', 'inbound5287480851198944090.jpg', 306034, '2024-01-12 00:24:07'),
(141, 0, '2nd Dose', 'Student', 'Single', 'Jessa Mae Guanzon', '2nd /BSBA', '', '2002-01-12', '', 'Female', 'Palalian Kalawit Zamboanga del norte', 'Roman Catholic ', '9383945604', 'guanzonejessamae@gmail.com', 'Roland Guanzone', '9518462134', 'Na', 'Na', 'Na', 'Na', 'AB', '5.4', '39', 'Na', 'd41d8cd98f00b204e9800998ecf8427e', '', 'Normal Filipino Diet', '', '', 'NA', 'NA', 'NA', '', '', '', '', 'None', '', '', '', '', '', 'None', 'NA', '', '', '', '', '', '', '', 'None', '', '', '', '', '', '', '', 'Screenshot_2024-01-12-08-47-46-29_680d03679600f7af0b4c700c6b270fe7.jpg', 0, '2024-01-12 00:48:06'),
(142, 0, '2nd Dose', 'Student', 'Single', 'Christine joy Guanzon', '2nd /Bs-Criminology', '', '2002-01-12', '', 'Female', 'Palalian Kalawit Zamboanga del norte ', 'Roman Catholic ', '9817105608', 'christinejoy@gmail.com', 'Roland Guanzon', '9272005839', 'Na', 'Na', 'Uti', 'Na', 'AB', '5\'7', '60', 'Checken ', '5f4dcc3b5aa765d61d8327deb882cf99', 'password', 'Normal Filipino Diet', 'Allergy', '', 'NA', 'NA', 'NA', '', 'None', '', '', '', '', '', '', 'None', '', '', 'NA', '', '', '', 'None', '', '', '', '', '', '', '', '', '', '', '', 'Screenshot_2024-01-12-08-47-46-29_680d03679600f7af0b4c700c6b270fe7.jpg', 0, '2024-01-12 00:53:57'),
(143, 0, 'Fully Vaccinated', 'Student', 'Single', 'Adriane Espada', '4rth /Bs-Criminology', '', '1999-06-10', '24 years old', 'Male', 'Malubal Surabaya Zs', 'Roman Catholic ', '9817105608', 'espadaadr@gmail.com', ' Lorna Espada', '9697664996', 'Lorna Espada', 'None', 'None', 'None ', 'B', '5\'7', '60', 'None', '27e364c85eb024c2feb943576aebafe6', 'espada#123', 'Complete immunization,Normal Filipino Diet', '', '', 'NA', 'NA', 'NA', '', '', '', '', '', '', '', '', '', '', '', 'NA', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'IMG_20240112_090143.jpg', 0, '2024-01-12 01:02:01'),
(144, 0, 'Fully Vaccinated', 'Student', 'Single', 'Marry Ann Agumin', '4rth /Bs-Criminology', '', '2000-01-12', '24 years old', 'Female', 'Payao Zamboanga SIBUGAY ', 'Roman Catholic ', '9383945604', 'marryann06@gmail.com', 'Linda Agumin', '9272005839', 'Linda agumin', 'Na', 'UTI', 'Na', 'O', '5:1', '39', 'Na', 'b9b7e8b3357c815a842eea11d1575c6a', 'marryane123', 'Normal Filipino Diet,High Protein Diet', '', 'Non-Smoker,Frequent Alcoholic Beverage Drinker', 'NA', 'NA', '', 'None', '', '', '', 'None', '', '', '', '', '', '', 'NA', 'None', '', '', '', 'None', '', '', 'None', '', '', '', '', '', 'None', '', 'IMG_20240112_090659.jpg', 0, '2024-01-12 01:07:25'),
(145, 0, '1st Booster', 'Student', 'Single', 'Marvin P. Dingal', '12 HUMMS', '', '2001-01-12', '23 years old', 'Male', 'Kalawit ZdN', 'Roman Catholic ', '9434946467', 'marvinp12@gmail.com', 'Nistora Pagente', '9272005839', 'Na', 'Na', 'Na', 'Na', 'AB', '5\'3', '57', 'Talong', 'bfdb1c1a114c948d3f8d6c9b20effc71', 'dorant123', '', '', '', 'NA', 'NA', 'NA', '', '', '', '', '', '', '', '', '', '', '', 'NA', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'IMG_20240112_091322.jpg', 0, '2024-01-12 01:13:44'),
(146, 0, '2nd Dose', 'Student', 'Single', 'Marilyn Ogapay', '4rth /Bs-Agri', '', '2001-03-20', '22 years old', 'Female', 'Ipil sanito Zamboanga SIBUGAY ', 'INC', '9673486169', 'ogapaymar23@gmail.com', 'Doming ogapay', '9734496464', 'Na', 'Na', 'Na', 'Na', 'A', '5:2', '39', 'Na', '9e079d89d66d33457fbd0fa039b24deb', '098765432', 'Complete immunization,Normal Filipino Diet,High Protein Diet', '', '', 'NA', 'NA', 'NA', '', '', '', '', '', '', '', '', '', '', '', 'NA', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'frame.png', 0, '2024-01-12 01:18:22'),
(147, 0, '1st Dose', 'Student', 'Single', 'Jessa Hamili ', '4rth /Bs-Agri', '', '2001-01-12', '23 years old', 'Female', 'Upper pangi Zamboanga SIBUGAY ', 'Allaliance ', '9646764664', 'jessahamili1@gmail.com', 'Marry hamili', '9646464404', 'Ronald Hamili', 'Ulser', 'Na', 'Na', 'A', '4\'11', '40', 'Na', 'c6fd7539d9f0971de57aa67788eb7c17', 'hamili@123', 'Normal Filipino Diet', '', '', 'NA', 'NA', 'NA', '', '', '', '', '', '', '', '', '', '', '', 'NA', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'IMG_20240112_092353.jpg', 0, '2024-01-12 01:24:24'),
(148, 0, '1st Dose', 'Student', 'Single', 'Gracel B. Marcial', '1st BSSW', '', '2000-09-03', '', 'Female', 'Kita of Zamboanga SIBUGAY ', 'Roman Catholic ', '9365434646', 'marcialgrace@gmail.com', 'Arman Marcial ', '9373484664', 'Na', 'Na', 'Na', 'Na', 'O', '5.4', '39', 'Peanut ', 'b945f074b289161a26494d3767bf42e3', 'marcial123', 'Normal Filipino Diet', '', '', 'NA', 'NA', 'NA', 'Weight loss', '', '', '', '', '', '', '', '', '', '', 'NA', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'Screenshot_2024-01-12-09-26-18-98_f598e1360c96b5a5aa16536c303cff92.jpg', 0, '2024-01-12 01:31:54'),
(149, 0, '2nd Dose', 'Student', 'Single', 'Jason Quintero', '2nd /Bs-Criminology', '', '2002-03-10', '21 years old', 'Male', 'Palalian Kalawit Zamboanga del norte ', 'Roman Catholic ', '9376434964', 'quinterojason@gmail.com', 'Edgar Quintero ', '9679464645', 'Rosana Quintero ', 'Na', 'Na', 'Na', '0', '5.5', '57', 'Na', 'e3d59774042edd5a91d2e50a016ce44d', 'lovey123', '', '', '', 'NA', 'NA', 'NA', '', '', '', '', '', '', '', '', '', '', '', 'NA', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'IMG_20240112_095318.jpg', 0, '2024-01-12 01:57:16'),
(150, 0, '1st Booster', 'Student', 'Single', 'Sherly A.Tuden', 'BIST-3', '', '2001-04-08', '22 years old', 'Female', 'Kitabog Ipil Zamboanga Sibugay', 'Roman Catholic ', '9648766496', 'tudensherly@gmail.com', 'Rosemarie Tudin', '9434946613', 'Rosemarie Tudin', 'Na', 'Na', 'Na', 'A', '4\'11', '39', 'Na', 'ac4289b7d3c19f9c3f30612bfc29ac21', 'sherlytudin', 'Complete immunization,Normal Filipino Diet', '', '', 'NA', 'NA', 'NA', 'None', 'None', 'None', 'Good Pulse', 'None', 'None', '', 'None', 'None', 'None', 'None', 'NA', 'None', 'None', 'None', 'None', '', '', '', '', '', '', '', '', '', '', '', 'IMG_20240112_100054.jpg', 0, '2024-01-12 02:09:55');
INSERT INTO `patient` (`user_Id`, `added_by`, `vaccine_status`, `position`, `civil_status`, `name`, `grade`, `teacher_position`, `dob`, `age`, `sex`, `address`, `religion`, `contact`, `email`, `parentName`, `parentContact`, `guardianName`, `illness`, `pastMedical`, `surgicalHistory`, `blood_type`, `height`, `weight`, `allergy`, `password`, `pass`, `nutritional_Immunization`, `familyHistory`, `socialHistory`, `packsYears`, `environment`, `frequency`, `general`, `hematologic`, `endocrine`, `extremities`, `skin`, `head`, `vision`, `Eyes`, `ears`, `nose`, `mouthThroat`, `yearsMonths`, `neck`, `Breast`, `Respiratory`, `Cardiovascular`, `Gastrointestinal`, `peripheralvascular`, `freq_urinary`, `Urinary`, `male`, `age_menarche`, `female`, `muscularSkeletal`, `Psychiatric`, `Neurologic`, `NeurologicExam`, `picture`, `verification_code`, `date_registered`) VALUES
(151, 0, 'Fully Vaccinated', 'Student', 'Single', 'Melanie dela Cruz ', 'BSM', '', '2000-08-16', '23 years old', 'Female', 'Lower taway ipil ', 'Seventh Day Adventist ', '9346613464', 'melaniedelacruz@gmail.com', 'Marry dela cruz', '9676494649', 'Na', 'Na', 'Na', 'Na', 'AB', '5:2', '39', 'Peanut ', '7fdb0c176d88918be98cc2b74e0e8e89', 'delacruz123', 'Complete immunization,Normal Filipino Diet,High Protein Diet', 'Asthma', 'Non-Smoker', 'NA', 'NA', 'NA', 'Weight loss', '', 'None', '', 'None', 'None', '', 'None', 'None', 'None', 'None', 'NA', 'None', 'None', 'None', 'None', '', 'None', '', 'None,UTI', '', '', 'N/A', '', 'None', 'None', '', 'IMG_20240112_101332.jpg', 0, '2024-01-12 02:18:13'),
(152, 0, 'Fully Vaccinated', 'Student', 'Single', 'Emmanuel Viadnes Gumabon ', 'BSIT', '', '2000-11-06', '23 years old', 'Male', 'Katipunan Roseller Lim Zamboanga Sibugay ', 'Catholic ', '9974250354', 'egumabon81@gmail.com', 'Julieta Viadnes Gumabon ', '9051397104', 'Danny Lantao Gumabon ', 'N/A', 'N/A', 'N/A', 'N/A', '5.6', '60', 'N/A', '25d55ad283aa400af464c76d713c07ad', '12345678', 'Complete immunization,Normal Filipino Diet', '', 'Non-Smoker,Occasional Alcoholic Beverage Drinker', 'NA', 'NA', 'NA', 'None', 'None', 'Excessive Sweating', 'Good Pulse', 'None', 'None', '', 'None', 'None', 'None', 'None', 'NA', 'None', 'None', 'None', 'Chest Pain', 'None', 'None', '', 'None,None', 'N/A', '', 'N/A', '', 'None', 'None', '', 'inbound5494016301998924299.jpg', 0, '2024-01-12 02:25:56'),
(153, 0, '1st Booster', 'Student', 'Single', 'Radelyn Delapeña', '4rth /Bs-Criminology', '', '2000-04-16', '23 years old', 'Female', ' Magdaop zamboanga Sibugay ', 'Seventh Day Adventist ', '9379646469', 'delapenarandily@gmail.com', 'May Ann Delapeña ', '9855800371', 'Na', 'Na', 'Na', 'Pregnancy ', 'A', '5\'7', '73', 'Na', 'be9370864b2ec25e6e14e6611924ed4e', 'randilyn123', '', '', '', 'NA', 'NA', 'NA', '', '', '', '', '', '', '', 'None', 'None', '', '', 'NA', '', '', 'None', '', '', 'None', '', '', '', '', '', '', '', '', '', 'IMG_20240112_102330.jpg', 0, '2024-01-12 02:54:51'),
(154, 0, 'Fully Vaccinated', 'Student', 'Single', 'Kent heriales', '4rthyear BSIT', '', '1999-12-24', '24 years old', 'Male', 'Ipil zamboanga sibugay', 'Iglesia ni cristo', '9269250132', 'kentdine@gmail.com', 'Merlinda mission', '9534466643', 'Merlinda', 'Nope', 'Nope', 'Nope', 'A', '5\'8', '75', 'Nope', 'd07206d10e08740ae056dea313c4c37c', 'kent1999', 'Incomplete immunization,Normal Filipino Diet,Prefers Vegetables,Prefers Canned Goods', 'Allergy', 'Smoker,Non-Alcoholic Beverage Drinker', '1pack', 'Titan', 'NA', 'None', 'None', 'None', 'Good Pulse', 'None', 'Headache', '', 'None', 'None', 'None', 'None', 'NA', '', 'None', 'None', 'None', 'None', 'None', '', 'None,None', 'N/A', '', 'N/A', '', 'None', 'None', '', 'inbound5672399445871088387.png', 0, '2024-01-12 03:12:27'),
(155, 0, '2nd Dose', 'Student', 'Married', 'Chloe M.recaña', 'BSBA -2', '', '2002-08-22', '21 years old', 'Female', 'Ipil Hights Zamboanga Sibugay ', 'Roman Catholic ', '9673315865', 'chloerecana@gmail.com', 'Susana Recaña', '9466466493', 'Susana Recaña', 'Na', 'Na', 'Pregnancy ', 'AB', '4\'11', '39', 'Na', '5dafa3da92812caa05821cdd1f997b18', 'recana1234', 'Incomplete immunization,Normal Filipino Diet', '', '', 'NA', 'NA', 'NA', 'None', '', '', '', '', '', '', '', '', '', '', 'NA', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'IMG_20240112_112138.jpg', 0, '2024-01-12 03:21:53'),
(156, 0, '1st Booster', 'Student', 'Single', 'Christine Jean M. Pantag', '3rd BTVED ', '', '1999-03-23', '24 years old', 'Female', ' Ipil Hights Zamboanga Sibugay ', 'Roman Catholic ', '9437695266', 'pantagcrhistine@gmail.com', 'Menda Pantag', '9376566568', 'Na', 'Na', 'Na', 'Na', 'A', '5.5', '57', 'Na', '25d55ad283aa400af464c76d713c07ad', '12345678', 'High Protein Diet', 'Allergy', '', 'NA', 'NA', 'NA', 'None', '', 'None', '', '', '', '', '', '', '', '', 'NA', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'IMG_20240112_113116.jpg', 0, '2024-01-12 03:31:47'),
(157, 0, 'Fully Vaccinated', 'Student', 'Single', 'Janiza', 'BSIT-4A', '', '2000-11-06', '23 years old', 'Female', 'Loic barlak', 'Roman Catholic ', '9383041263', 'janizamagsayo@gmail.com', 'Milagros', '9383041263', 'Modesto', 'N/A', 'N/A', 'N/A', 'N/A', '5\'4', '48', 'N/A', '6b48b4e5b6e4c77410a1d9406a02b8b6', 'janiza06', 'Complete immunization', 'No Heradi - Familiar Diseases', 'Non-Smoker', 'NA', 'NA', 'NA', 'None', 'None', 'None', 'Limited ROM', 'None', 'None', '', 'None', 'None', 'None', 'None', 'NA', 'None', 'None', 'None', 'None', '', '', '', '', '', '', '', '', '', '', '', 'IMG_20240112_153151.jpg', 0, '2024-01-12 07:32:29'),
(158, 0, '2nd Dose', 'Student', 'Single', 'Mariam Grace Marzan', '2 BSIT', '', '2003-08-14', '20 years old', 'Female', 'Lower Taway, ipil, Zamboanga Sibugay', 'Alliance ', '9458168620', 'marzanmariamgrace@gmail.com', 'Ma. Linda marzan', '9272005839', 'Marcel marzan', 'N/a', 'N/a', 'N/a', 'A+', '5.0', '48', 'N/a', 'cffb92f4c19af21bfa2086de0324d7f1', 'costaleona1403', 'Complete immunization', 'No Heradi - Familiar Diseases', 'Non-Smoker', 'NA', 'NA', 'NA', 'None', 'None', 'None', '', '', 'None', '', 'Blurring of Vision', 'None', '', '', 'NA', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'Screenshot_20220318-153922.png', 0, '2024-01-12 08:11:49'),
(159, 0, 'Fully Vaccinated', 'Teacher', 'Single', 'DAVE CALAPIS', '', 'Instructor', '1995-12-21', '28 years old', 'Male', 'Naga, Zamboanga Sibugay', 'Roman Catholic', '9550524541', 'dave@gmail.com', 'Lorna Calapis', '9054572037', '', 'None', 'None', 'None', 'O', '5.3', '60', 'Food', '7fd1100dc7f7adee0a0b02cb08c78a3c', 'Wapuchi1990', 'High Protein Diet', 'Allergy', 'Non-Smoker,Non-Alcoholic Beverage Drinker', 'NA', 'NA', 'NA', 'None', 'None', 'None', 'Good Pulse', 'Rashes,Itching', 'None', '', 'None', 'None', 'None', 'None', 'NA', '', 'None', 'None', 'None', 'None', 'None', '', 'None,None', 'N/A', '', 'N/A', 'Muscle of Joint Pain,Arthritis,Backache', 'Depression', 'None', 'Intact CN', 'Screenshot_2024-01-12-18-42-24-71_f598e1360c96b5a5aa16536c303cff92.jpg', 0, '2024-01-12 10:44:31'),
(160, 0, '2nd Dose', 'Student', 'Single', 'Angelito Catane', 'BSIT4-A', '', '1997-03-27', '26 years old', 'Male', 'Tungawan Zamboanga Sibugay', 'Roman Catholic ', '9816886841', 'cataneangelito5@gmail.com', 'Fermin Catane', '9554463678', 'Leonila Catane', 'N/a', 'N/a', 'N/a', 'B', '5/4', '64', 'N/a', '25f9e794323b453885f5181f1b624d0b', '123456789', 'Complete immunization', '', 'Non-Smoker', 'NA', 'NA', 'NA', 'None', '', 'None', '', 'None', 'None', '', 'None', 'None', 'None', 'None', 'NA', '', 'None', 'None', 'None', '', '', '', '', '', '', '', '', '', '', '', 'Screenshot_20210905-195248.png', 0, '2024-01-12 08:34:29'),
(161, 0, 'Fully Vaccinated', 'Student', 'Widow/er', 'Ivan Dagupan', '4th yr BSIT', '', '2003-06-20', '20 years old', 'Male', 'ipil', 'Pentecost ', '9383945604', 'dagupanivan@gmail.com', 'Mr. And Mrs. Dagupan', '9678024590', 'Dagupan fam', 'N/a', 'N/a', 'N/a', 'A', '154', '80', 'Wala', '0339df446b5ab1307d178b3f87a3d0fd', 'ivan1234', 'Normal Filipino Diet', '', 'Non-Smoker', 'NA', 'NA', 'NA', 'Fatigue', 'None', 'Excessive Sweating', 'Good Pulse', 'None', 'None', '', 'Blurring of Vision', 'None', 'None', 'None', 'NA', 'None', 'None', 'None', 'None', 'Abdominal Pain,None', 'None', '', 'None,None', 'N/A', '', '', '', 'Nervousness', '', '', 'Screenshot_20210824-193043.png', 0, '2024-01-12 08:38:25'),
(162, 0, '2nd Dose', 'Student', 'Single', 'Almera A. Arong', 'BSSW-3', '', '1999-01-30', '24 years old', 'Female', 'Makilas ipil Zamboanga Sibugay ', 'Roman Catholic ', '9646455464', 'arongalmera23@gmail.com', 'Lando A. Arong', '9461656659', 'Na', 'Na', 'Na', 'Na', 'B', '5.4', '53', 'Na', '31b06cf310988682471a0ab19659840b', 'arong123', 'High Protein Diet', '', 'Non-Smoker', 'NA', 'NA', 'NA', 'None', '', '', 'Good Pulse', '', '', '', '', '', '', '', 'NA', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'Screenshot_2024-01-12-18-49-31-92_680d03679600f7af0b4c700c6b270fe7.jpg', 0, '2024-01-12 10:54:04'),
(163, 0, 'Fully Vaccinated', 'Student', 'Single', 'Norlyn Jay Husain ', 'BSHM-4', '', '1999-04-19', '24 years old', 'Female', 'Rt Lim Zamboanga Sibugay ', 'Roman Catholic ', '9649648632', 'husainnorlyn06@gmail.com', 'Nor Ena husain', '9386644543', 'Na', 'Na', 'Na', 'Na', 'A', '5\'2', '39', 'Talong', '5561877892718dc132c0dfa356c6515b', 'lablab123', 'Complete immunization,Normal Filipino Diet,High Protein Diet', '', 'Non-Smoker', 'NA', 'NA', 'NA', 'None', '', '', '', '', '', '', '', '', '', '', 'NA', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'Screenshot_2024-01-12-18-55-56-21_f598e1360c96b5a5aa16536c303cff92.jpg', 0, '2024-01-12 11:02:15'),
(164, 0, 'Fully Vaccinated', 'Student', 'Single', 'Riza Mae Undag', 'BSHM-4', '', '1998-10-29', '25 years old', 'Female', 'Rt-lim ipil Zamboanga Sibugay ', 'Roman Catholic ', '9541538591', 'undagrizamae@gmail.com', 'Sheila Undag', '9688664996', 'Na', 'Na', 'None', 'Nonw', 'B', '5\'7', '71', 'Na', '8564008c34922a118555bc4490ac92c5', 'bheby123', 'Complete immunization', '', '', 'NA', 'NA', 'NA', '', '', '', '', '', '', '', '', '', '', '', 'NA', '', '', '', '', 'None', '', '', 'UTI', '', '', '', '', '', '', '', 'Screenshot_2024-01-12-19-03-10-65_f598e1360c96b5a5aa16536c303cff92.jpg', 0, '2024-01-12 11:07:04'),
(165, 0, '1st Booster', 'Student', 'Single', 'Krizzel may Depalubos', 'BSSW 2', '', '2004-02-11', '19 years old', 'Female', ' Veterans Ipil Zamboanga Sibugay ', 'Seventh Day Adventist ', '9355699671', 'krezzilmay@gmail.com', 'May Ann depalubos', '9475132584', 'Na', 'Na', 'Na', 'Na', 'A', '5.4', '39', 'Na', '1f42f19c25b9c4ec419b12879856a503', 'langlang123', 'High Protein Diet', '', '', 'NA', 'NA', 'NA', 'None', '', '', '', 'None', '', '', '', 'None', 'None', '', 'NA', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'IMG_20240112_191150.jpg', 0, '2024-01-12 11:19:55'),
(166, 0, '2nd Dose', 'Student', 'Single', 'Jezel Tan awon', 'BSSW 2', '', '2004-01-03', '20 years old', 'Female', 'Veterans Ipil Zamboanga Sibugay ', 'Catholic ', '9684649646', 'jezeltanawon89@gmail.com', 'Jezillyn Tanawon', '9344135446', 'Na', 'Na', 'Na', 'Na', 'AB', '5.4', '57', 'Ns', 'de7a41020ab60ade938e6dc0c965e809', 'baby0908', 'Complete immunization', '', '', 'NA', 'NA', 'NA', 'None', '', '', '', 'None', '', '', '', '', '', '', 'NA', '', 'None', '', '', '', '', '', '', '', '', '', '', '', '', '', 'Screenshot_20221007-120941.png', 0, '2024-01-12 11:26:20'),
(167, 0, 'Fully Vaccinated', 'Student', 'Single', 'Mary Joy Pagente', 'BSBA', '', '2003-11-03', '20 years old', 'Female', 'Poblacion ,jose Dalman Z.N', 'Assembly of God', '9975203521', 'maryjoypagente6@gmail.com', 'Dolores pagente', '9153577379', 'Dolores pagente', 'None', 'None\r\n', 'N/A', 'B', '160', '50', 'None', 'c238d20b617ccfb42887cb4e0e19c61e', 'nov32003', 'Complete immunization', 'Allergy', 'Non-Smoker', 'NA', 'NA', 'NA', 'None', 'None', 'None', 'Good Pulse', 'Rashes', 'Headache', '', 'Eye pain,Blurring of Vision', 'None', 'None', 'Sore Throat', 'NA', 'None', 'None', 'Cough', 'Chest Pain', 'Heart Burn', 'None', '', 'None,None', 'N/A', '', 'N/A', '', 'None', 'Headache', '', 'inbound7422680828049863622.jpg', 0, '2024-01-12 11:55:41'),
(168, 0, '2nd Dose', 'Student', 'Single', 'Lary yabres', 'BSBA', '', '2004-01-12', '20 years old', 'Male', 'Linuton Manukan ZN', 'Catholic', '9679626876', 'laryyabres07@gmail.com', 'Perpetua Yabres', '9679626876', 'Perpetua Yabres', 'None', 'None', 'None', 'B', '5\'6ft', '54klg', 'None', '4c194f8395195e7155600f9988d78eb7', 'yabres143', 'Complete immunization', 'No Heradi - Familiar Diseases', 'Non-Smoker', 'NA', 'NA', 'NA', 'None', 'None', 'None', 'Good Pulse', 'None', 'None', 'Fine', 'None', 'None', 'None', 'None', 'NA', 'None', 'None', 'None', 'None', 'None', 'None', 'None', 'None,None', 'N/A', 'None', 'N/A', '', 'None', 'None', '100% Sensory Bilateral U/L Extremities', 'inbound6911409805445926481.jpg', 0, '2024-01-12 12:24:57'),
(169, 0, '1st Booster', 'Student', 'Single', 'Jestoni G. Carpila ', 'BSIT 3', '', '1999-05-25', '24 years old', 'Male', ' Lower taway ipil Zamboanga Sibugay ', 'Roman Catholic ', '9686649966', 'jestoni12@gmail.com', 'Marie Carpila', '9498649496', 'Marie Carpila', 'Na', 'Na', 'Na', 'A', '5.5', '60', 'Na', 'f65566bcd4021a7bd23756a290111dcc', 'lobydabs', '', '', 'Non-Smoker', 'NA', 'NA', 'NA', 'None', 'None', '', '', 'None', 'None', '', 'None', 'None', 'None', 'None', 'NA', 'None', 'None', 'None', 'None', 'None', 'None', '', 'None,None', '', '', '', '', '', '', '', 'Screenshot_2024-01-13-00-37-14-48_f598e1360c96b5a5aa16536c303cff92.jpg', 0, '2024-01-12 16:42:42'),
(170, 0, '2nd Dose', 'Student', 'Single', 'John Mark deguzman', '12 ICT', '', '2002-01-22', '21 years old', 'Male', 'Veterans Ipil Zamboanga Sibugay ', 'Seventh Day Adventist ', '9368561679', 'jhonrey@gmail.com', 'June Deguzman ', '9388361667', 'Na', 'Na', 'Na', 'Na', 'B', '5.4', '53', 'Na', '77a06d5a03814405c324f7f189335ba6', 'dogie123', 'Complete immunization', 'Asthma', 'Smoker', '', '', 'NA', 'None', '', '', '', '', '', '', '', '', '', '', 'NA', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'Screenshot_2024-01-13-00-46-07-16_f598e1360c96b5a5aa16536c303cff92.jpg', 0, '2024-01-12 16:50:22'),
(171, 0, '2nd Dose', 'Student', 'Single', 'Nina Grace Faduga', 'BIST-3 ', '', '2000-04-26', '23 years old', 'Female', 'Surabay Zamboanga Sibugay ', 'Roman Catholic ', '9348566499', 'faduga45@gmail.com', 'Norma faduga', '9357556614', 'Na', 'Na', 'Na', 'Pregnancy ', 'A', '5\'3', '39', 'Na', '59e29a65b5fe70216b0fbc634ab76e4f', 'faduga09', 'Complete immunization,Normal Filipino Diet,High Protein Diet', 'Allergy', '', 'NA', 'NA', 'NA', '', '', '', 'Good Pulse', '', '', '', '', '', '', '', 'NA', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'IMG_20240113_005239.jpg', 0, '2024-01-12 16:56:45'),
(172, 0, 'Fully Vaccinated', 'Student', 'Married', 'Harold G. Abualas', 'BIST-4', '', '1997-02-26', '26 years old', 'Male', 'Titay Ipil Zamboanga Sibugay ', 'Roman Catholic ', '9864994688', 'haroldabualas@gmail.com', 'Mark abualas', '9685319455', 'Na', 'Na', 'Na', 'Na', 'A', '5.5', '60', 'Na', '2831b29d7bb4d37700a18cd5d8b9a113', 'mahalko8', 'Complete immunization,Normal Filipino Diet', '', 'Non-Smoker', 'NA', 'NA', 'NA', 'None', '', '', 'Good Pulse', '', '', '', '', '', 'None', '', 'NA', '', 'None', '', '', '', '', '', '', '', '', '', '', '', '', '', 'IMG_20240113_010455.jpg', 0, '2024-01-12 17:05:15'),
(173, 0, '2nd Dose', 'Student', 'Single', 'Alvin John Baguion', 'BIST-4', '', '2001-03-22', '22 years old', 'Male', 'Isla', 'Roman Catholic ', '9648646919', 'alvincute@gmail.com', 'Julito Baguion ', '9866454664', 'Na', 'Na', 'Na', 'Na', 'O', '5:1', '39', 'Na', 'f206c94516e3ea7171be3292a0ae912f', 'lablab46', '', '', '', 'NA', 'NA', 'NA', '', '', '', '', '', '', '', '', '', '', '', 'NA', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'IMG_20240118_204552.jpg', 0, '2024-01-18 12:48:50'),
(174, 0, '2nd Dose', 'Student', 'Single', 'Nhorey Badajoz ', 'BIST-4', '', '2000-06-16', '23 years old', 'Male', 'San Antonio ipil', 'Roman Catholic ', '9648646919', 'badajos345@gmail.com', 'Ronald badajos', '9866454664', 'Na', 'Na', 'Na', 'Na', 'O', '5:1', '39', 'Na', '3a5951e726fae996f15192f15ff756ab', 'plokplok', 'Complete immunization', '', 'Smoker,Occasional Alcoholic Beverage Drinker', '', '', 'NA', 'None', '', '', '', '', '', '', '', '', '', '', 'NA', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'IMG_20240118_204415.jpg', 0, '2024-01-18 12:52:16'),
(175, 0, '2nd Dose', 'Teacher', 'Single', 'JUNABIL U. CARAO', '', 'Teacher', '1996-09-29', '27 years old', 'Female', 'Ipil', 'Christian ', '9383945604', 'bjoshjamesjohn@gmail.com', 'N/a', '9272005839', '', 'N/A', 'N/a', 'N/A', 'A', '4\'9', '40', 'None', '911c269c030d4923ad5e30a943efbbbf', 'junabil123', 'Complete immunization', 'No Heradi - Familiar Diseases', 'Non-Smoker,Non-Alcoholic Beverage Drinker', 'NA', 'NA', 'NA', 'Fatigue', 'None', 'None', 'Good Pulse', 'Rashes', 'Headache,Diziness', '', 'Blurring of Vision', 'None', 'None', 'None', 'NA', 'None', 'None', 'None', 'None', 'None', 'None', '', 'UTI', '', '', 'N/A', '', 'None', 'None', 'Oriented to Time and Place', 'IMG_20240123_140031.jpg', 0, '2024-01-23 06:00:57'),
(176, 0, 'Fully Vaccinated', 'Student', 'Married', 'Kristine L.salles', 'BSIT 3 A 3rdyear col', '', '2001-06-29', '22 years old', 'Female', 'IPIL heights ', 'Catholic ', '9532868560', 'ralphsalles24@gmail.com', 'Regina', '9262161495', 'Regina', 'Overthinker, Insomia ', 'None', 'None', 'Type B', '5 plat', '38', 'Chicken, eggplant,egg,seafoods og Siya char!', '32ef764a0debf2a8420a1b8a7b3ce704', 'WIFEYNAKO24', 'Complete immunization', 'Allergy', 'Non-Alcoholic Beverage Drinker', 'NA', 'NA', 'NA', 'None', 'None', 'None', 'Good Pulse', 'None', 'None', '', 'None', 'None', 'None', 'None', 'NA', 'None', 'None', 'None', 'None', 'None', 'None', '', 'None,None', 'N/A', 'Age of merche is 13 none', 'N/A', '', 'Suicide Attempts,None', 'None', 'Oriented to Time and Place,100% Sensory Bilateral U/L Extremities', 'inbound7219932764926749204.jpg', 0, '2024-01-23 11:05:18');

-- --------------------------------------------------------

--
-- Table structure for table `physical`
--

CREATE TABLE `physical` (
  `physical_Id` int(11) NOT NULL,
  `patient_Id` int(11) NOT NULL,
  `p_general` varchar(150) NOT NULL,
  `p_skin` varchar(150) NOT NULL,
  `skinOther` varchar(150) NOT NULL,
  `p_heent` varchar(150) NOT NULL,
  `p_auditory` varchar(150) NOT NULL,
  `p_nose` varchar(150) NOT NULL,
  `p_mouth_throat` varchar(150) NOT NULL,
  `p_neck` varchar(150) NOT NULL,
  `p_breast` varchar(150) NOT NULL,
  `p_cardiovascular` varchar(150) NOT NULL,
  `p_abdomen` varchar(150) NOT NULL,
  `p_genitals` varchar(150) NOT NULL,
  `clinical_impression` text NOT NULL,
  `potential_risk` text NOT NULL,
  `plan_medication` text NOT NULL,
  `date_admitted` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `physical`
--

INSERT INTO `physical` (`physical_Id`, `patient_Id`, `p_general`, `p_skin`, `skinOther`, `p_heent`, `p_auditory`, `p_nose`, `p_mouth_throat`, `p_neck`, `p_breast`, `p_cardiovascular`, `p_abdomen`, `p_genitals`, `clinical_impression`, `potential_risk`, `plan_medication`, `date_admitted`) VALUES
(1, 70, 'Awake,Coherent', 'Other', 'ds', 'Pupils Equally Reactive to light & accomodation', 'Non-Intact', 'Nasal Deformity', 'None', 'Lymphadenpathy,None', 'Discharge', 'Carotid Bruit,Murmur', 'Flat,Normoactive', '', 'dsa', 'dsa', 'Bioparacetamol, Product 1, Product 2, Product 3, Product 4, Bioparacetamol, Product 1, Product 2, Product 3, Product 5, Product 6, Product 7, Product 8', '2023-12-17 00:52:04');

-- --------------------------------------------------------

--
-- Table structure for table `physical_transaction_log`
--

CREATE TABLE `physical_transaction_log` (
  `Id` int(11) NOT NULL,
  `patient_Id` int(11) NOT NULL,
  `stock_used_value` int(11) NOT NULL,
  `med_Id` int(11) NOT NULL,
  `physical_Id` int(11) NOT NULL,
  `date_added` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `physical_transaction_log`
--

INSERT INTO `physical_transaction_log` (`Id`, `patient_Id`, `stock_used_value`, `med_Id`, `physical_Id`, `date_added`) VALUES
(1, 70, 1, 10, 1, '2023-12-17 00:45:14'),
(2, 70, 2, 2, 1, '2023-12-17 00:45:14'),
(3, 70, 3, 3, 1, '2023-12-17 00:45:14'),
(4, 70, 4, 4, 1, '2023-12-17 00:45:14'),
(5, 70, 5, 5, 1, '2023-12-17 00:45:14'),
(6, 70, 4, 10, 1, '2023-12-17 12:52:04'),
(7, 70, 3, 2, 1, '2023-12-17 12:52:04'),
(8, 70, 2, 3, 1, '2023-12-17 12:52:04'),
(9, 70, 1, 4, 1, '2023-12-17 12:52:04'),
(10, 70, 4, 6, 1, '2023-12-17 12:52:04'),
(11, 70, 3, 7, 1, '2023-12-17 12:52:04'),
(12, 70, 2, 8, 1, '2023-12-17 12:52:04'),
(13, 70, 1, 9, 1, '2023-12-17 12:52:04');

-- --------------------------------------------------------

--
-- Table structure for table `request_doc`
--

CREATE TABLE `request_doc` (
  `req_Id` int(11) NOT NULL,
  `type` varchar(100) NOT NULL,
  `patient_Id` int(11) NOT NULL,
  `purpose` text NOT NULL,
  `pick_up_date` varchar(100) NOT NULL,
  `req_status` int(11) NOT NULL DEFAULT 0 COMMENT '0=Pending, 1=Processing, 2=Ready to pick-up, 3=Released',
  `seen_by_admin` int(11) NOT NULL DEFAULT 0 COMMENT '0=Unread, 1=Read',
  `date_created` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `request_doc`
--

INSERT INTO `request_doc` (`req_Id`, `type`, `patient_Id`, `purpose`, `pick_up_date`, `req_status`, `seen_by_admin`, `date_created`) VALUES
(10, 'Medical Certificate', 93, 'For excuse ', '2024-01-11', 2, 1, '2024-01-10 02:09:49');

-- --------------------------------------------------------

--
-- Table structure for table `request_update`
--

CREATE TABLE `request_update` (
  `req_Id` int(11) NOT NULL,
  `user_Id` int(11) NOT NULL,
  `req_type` varchar(100) NOT NULL,
  `req_status` int(11) NOT NULL DEFAULT 0 COMMENT '0=Requesting, 1-Approved, 2=Denied',
  `date_added` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_Id` int(11) NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `middlename` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `suffix` varchar(255) NOT NULL,
  `dob` varchar(255) NOT NULL,
  `age` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `contact` varchar(100) NOT NULL,
  `birthplace` varchar(255) NOT NULL,
  `gender` varchar(255) NOT NULL,
  `civilstatus` varchar(50) NOT NULL,
  `occupation` varchar(50) NOT NULL,
  `religion` varchar(100) NOT NULL,
  `house_no` varchar(255) NOT NULL,
  `street_name` varchar(255) NOT NULL,
  `purok` varchar(255) NOT NULL,
  `zone` varchar(255) NOT NULL,
  `barangay` varchar(255) NOT NULL,
  `municipality` varchar(255) NOT NULL,
  `province` varchar(255) NOT NULL,
  `region` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `password` varchar(100) NOT NULL,
  `user_type` varchar(50) NOT NULL DEFAULT 'Staff',
  `verification_code` int(11) NOT NULL,
  `date_registered` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_Id`, `firstname`, `middlename`, `lastname`, `suffix`, `dob`, `age`, `email`, `contact`, `birthplace`, `gender`, `civilstatus`, `occupation`, `religion`, `house_no`, `street_name`, `purok`, `zone`, `barangay`, `municipality`, `province`, `region`, `image`, `password`, `user_type`, `verification_code`, `date_registered`) VALUES
(66, 'Chiejay ', 'Mareno', 'Pagente', '', '1997-09-22', '25 years old', 'admin@gmail.com', '9359428963', 'Ipil Poblacion ', 'Male', 'Single', 'School nurse ', 'Bible Baptist Church', '1234', 'Sitio ', 'Purok San Isidro', 'Ambot', 'Daanlungsod', 'Ipil', '', 'XI', 'poly.jpg', '5ecbbec3737d7cde5cc7a6927762db61', 'Admin', 135779, '2022-11-25'),
(67, 'Angelo', 'Torres ', 'Moreno ', '', '2003-05-03', '20 years old', 'Staff@gmail.com', '9359428963', 'Staff', 'Male', 'Married', 'OJT', 'Bible Baptist Church', 'Staff', 'Staff', 'Staff', 'Staff', 'Staff', 'Staff', '', 'Staffs', '2.jpg', '0192023a7bbd73250516f069df18b500', 'Staff', 392087, '2023-05-12');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `announcement`
--
ALTER TABLE `announcement`
  ADD PRIMARY KEY (`actId`);

--
-- Indexes for table `appointment`
--
ALTER TABLE `appointment`
  ADD PRIMARY KEY (`appt_Id`);

--
-- Indexes for table `asking_med`
--
ALTER TABLE `asking_med`
  ADD PRIMARY KEY (`asking_med_Id`);

--
-- Indexes for table `asking_med_transaction_log`
--
ALTER TABLE `asking_med_transaction_log`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `consultation`
--
ALTER TABLE `consultation`
  ADD PRIMARY KEY (`consult_Id`);

--
-- Indexes for table `consultation_transaction_log`
--
ALTER TABLE `consultation_transaction_log`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `dental`
--
ALTER TABLE `dental`
  ADD PRIMARY KEY (`dental_Id`);

--
-- Indexes for table `dental_transaction_log`
--
ALTER TABLE `dental_transaction_log`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `form2`
--
ALTER TABLE `form2`
  ADD PRIMARY KEY (`form2_Id`);

--
-- Indexes for table `form2_transaction_log`
--
ALTER TABLE `form2_transaction_log`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `medicine`
--
ALTER TABLE `medicine`
  ADD PRIMARY KEY (`med_Id`);

--
-- Indexes for table `notification`
--
ALTER TABLE `notification`
  ADD PRIMARY KEY (`notif_Id`);

--
-- Indexes for table `patient`
--
ALTER TABLE `patient`
  ADD PRIMARY KEY (`user_Id`);

--
-- Indexes for table `physical`
--
ALTER TABLE `physical`
  ADD PRIMARY KEY (`physical_Id`);

--
-- Indexes for table `physical_transaction_log`
--
ALTER TABLE `physical_transaction_log`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `request_doc`
--
ALTER TABLE `request_doc`
  ADD PRIMARY KEY (`req_Id`);

--
-- Indexes for table `request_update`
--
ALTER TABLE `request_update`
  ADD PRIMARY KEY (`req_Id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_Id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `announcement`
--
ALTER TABLE `announcement`
  MODIFY `actId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `appointment`
--
ALTER TABLE `appointment`
  MODIFY `appt_Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `asking_med`
--
ALTER TABLE `asking_med`
  MODIFY `asking_med_Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=141;

--
-- AUTO_INCREMENT for table `asking_med_transaction_log`
--
ALTER TABLE `asking_med_transaction_log`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=91;

--
-- AUTO_INCREMENT for table `consultation`
--
ALTER TABLE `consultation`
  MODIFY `consult_Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `consultation_transaction_log`
--
ALTER TABLE `consultation_transaction_log`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `dental`
--
ALTER TABLE `dental`
  MODIFY `dental_Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `dental_transaction_log`
--
ALTER TABLE `dental_transaction_log`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `form2`
--
ALTER TABLE `form2`
  MODIFY `form2_Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `form2_transaction_log`
--
ALTER TABLE `form2_transaction_log`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `medicine`
--
ALTER TABLE `medicine`
  MODIFY `med_Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT for table `notification`
--
ALTER TABLE `notification`
  MODIFY `notif_Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=70;

--
-- AUTO_INCREMENT for table `patient`
--
ALTER TABLE `patient`
  MODIFY `user_Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=177;

--
-- AUTO_INCREMENT for table `physical`
--
ALTER TABLE `physical`
  MODIFY `physical_Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `physical_transaction_log`
--
ALTER TABLE `physical_transaction_log`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `request_doc`
--
ALTER TABLE `request_doc`
  MODIFY `req_Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `request_update`
--
ALTER TABLE `request_update`
  MODIFY `req_Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=68;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
