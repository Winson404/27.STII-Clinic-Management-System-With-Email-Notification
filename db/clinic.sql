-- phpMyAdmin SQL Dump
-- version 4.2.7.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Sep 15, 2023 at 08:34 AM
-- Server version: 5.6.20
-- PHP Version: 5.5.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `clinic`
--

-- --------------------------------------------------------

--
-- Table structure for table `announcement`
--

CREATE TABLE IF NOT EXISTS `announcement` (
`actId` int(11) NOT NULL,
  `actName` text NOT NULL,
  `date_added` varchar(20) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

--
-- Dumping data for table `announcement`
--

INSERT INTO `announcement` (`actId`, `actName`, `date_added`) VALUES
(3, 'Activity 3', '2022-12-11'),
(4, 'Activity 2', '2022-12-11'),
(5, 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Rem, ipsum delectus voluptatum? Molestias aut inventore eaque, maxime numquam dignissimos asperiores, voluptatibus consectetur distinctio excepturi odit architecto, saepe enim sunt, molestiae.', '2022-12-11'),
(6, 'sample', '2022-12-27'),
(8, 'gfdgfd', '2022-12-27'),
(9, 'Newd', '2023-06-08'),
(10, 'fd', '2023-06-08'),
(11, 'fdfdsfsfdsfsdfdsfs', '2023-06-08'),
(12, 'SAMPLE ANNOUNCEMENT', '2023-09-12');

-- --------------------------------------------------------

--
-- Table structure for table `appointment`
--

CREATE TABLE IF NOT EXISTS `appointment` (
`appt_Id` int(11) NOT NULL,
  `appt_patient_Id` int(11) NOT NULL,
  `appt_date` varchar(50) NOT NULL,
  `appt_time` varchar(50) NOT NULL,
  `appt_reason` text NOT NULL,
  `appt_status` int(11) NOT NULL DEFAULT '0' COMMENT '0=Pending, 1=Approved, 2=Denied, 3=Settled',
  `date_added` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB  DEFAULT CHARSET=utf8mb4 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `appointment`
--

INSERT INTO `appointment` (`appt_Id`, `appt_patient_Id`, `appt_date`, `appt_time`, `appt_reason`, `appt_status`, `date_added`) VALUES
(3, 68, '2023-09-29', '14:07', 'Sample reason', 1, '2023-09-15 06:05:37');

-- --------------------------------------------------------

--
-- Table structure for table `consultation`
--

CREATE TABLE IF NOT EXISTS `consultation` (
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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=22 ;

--
-- Dumping data for table `consultation`
--

INSERT INTO `consultation` (`consult_Id`, `patient_Id`, `mothers_maiden_name`, `chief_complaints`, `temperature`, `vs_bp`, `pr`, `rr`, `o2zat`, `doctors_advice`, `medicine_given`, `medical_personnel`, `date_admitted`) VALUES
(17, 80, 'fdsFdsfsample', '1Fdsfsample', 'SamplSamplFdsfsample', 'SamplSamplSamplFdsfsample', 'sfsdFdsfsample', 'SamplSamplFdsfsample', 'NoneFdsfsample', 'fdsFdsfsample', 'fdsfsampleFdsfsample', 'FdsfsampleFdsfsample', '2023-06-08 12:51:34'),
(19, 71, 'dsf', '2', 'fdsf', 'ds', 'dsadsfd', 'dsfds', 'None', 'dsfds', 'fdsf', '', '2023-06-21 01:09:58'),
(20, 77, 'SampleSample', 'SampleSample', 'SampleSample', 'Sample', '', 'Sample', 'Sample', 'SampleSample', 'SampleSample', 'SampleSamplegfd', '2023-07-06 13:50:42'),
(21, 68, 'vvvvv', 'Vvvvv', 'Vvvvv', 'VvvvvVvvvv', 'Vvvvv', 'Vvvvv', 'Vvvvv', 'Vvvvv', 'VvvvvVvvvv', 'Vvvvv', '2023-07-06 15:02:50');

-- --------------------------------------------------------

--
-- Table structure for table `dental`
--

CREATE TABLE IF NOT EXISTS `dental` (
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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=20 ;

--
-- Dumping data for table `dental`
--

INSERT INTO `dental` (`dental_Id`, `patient_Id`, `dental_history`, `teeth_no`, `vs_bp`, `pr`, `rr`, `medicine_given`, `dental_advised`, `date_admitted`) VALUES
(17, 80, 'fds', '1', 'SamplSamplSampl', 'SamplSampl', 'SamplSampl', 'fdsf', 'fds', '2023-06-08 12:51:34'),
(18, 72, 'fd', '32', 'Sampl', 'Sampl', 'Sampl', 'gfdg', 'gfdgfd', '2023-06-20 18:55:45'),
(19, 71, 'dsf', '2', 'ds', 'fdsf', 'dsfds', 'fdsf', 'dsfds', '2023-06-21 01:09:58');

-- --------------------------------------------------------

--
-- Table structure for table `form2`
--

CREATE TABLE IF NOT EXISTS `form2` (
`form2_Id` int(11) NOT NULL,
  `patient_Id` int(11) NOT NULL,
  `vs_bp` varchar(100) NOT NULL,
  `pr` varchar(100) NOT NULL,
  `rr` varchar(100) NOT NULL,
  `temperature` varchar(100) NOT NULL,
  `vital_sign` text NOT NULL,
  `diagnosis` text NOT NULL,
  `medical_advised` text NOT NULL,
  `medical_personnel` text NOT NULL,
  `date_admitted` datetime NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `form2`
--

INSERT INTO `form2` (`form2_Id`, `patient_Id`, `vs_bp`, `pr`, `rr`, `temperature`, `vital_sign`, `diagnosis`, `medical_advised`, `medical_personnel`, `date_admitted`) VALUES
(3, 68, 'Okayca', 'Okayca', 'Okayca', '', 'fds', 'fds', 'fdsfd', 'sfsdfds', '2023-06-08 12:53:42'),
(4, 71, '', '', '', '', 'fds', 'fds', 'fds', 'fds', '2023-06-08 12:54:18'),
(5, 71, 'Okay', 'sadas', 'Okay', '', 'dsadasdas', 'dsadasd', 'sdsada', 'dsadsadsa', '2023-06-20 22:29:14');

-- --------------------------------------------------------

--
-- Table structure for table `medicine`
--

CREATE TABLE IF NOT EXISTS `medicine` (
`med_Id` int(11) NOT NULL,
  `brand_name` varchar(100) NOT NULL,
  `other_brand_name` varchar(100) NOT NULL,
  `med_name` varchar(100) NOT NULL,
  `med_stock_in` varchar(100) NOT NULL,
  `med_stock_in_orig` varchar(100) NOT NULL,
  `med_stock_out` varchar(100) NOT NULL,
  `expiration_date` varchar(100) NOT NULL,
  `date_added` varchar(100) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

--
-- Dumping data for table `medicine`
--

INSERT INTO `medicine` (`med_Id`, `brand_name`, `other_brand_name`, `med_name`, `med_stock_in`, `med_stock_in_orig`, `med_stock_out`, `expiration_date`, `date_added`) VALUES
(3, 'Generic', '', 'sample', '1 Tablets', '1 Tablets', '22', '2023-12-11', '2023-06-20 04:24 PM'),
(6, 'Others', 'ds', 'fsdf', '28', '0', '6', '2023-07-06', '2023-06-20 04:47 PM'),
(7, 'Generic', '', 'Alright', '978', '1000', '133', '2023-07-07', '2023-06-20 05:10 PM'),
(8, 'RiteMed', '', 'dsadsa', '65', '70', '60', '2028-06-06', '2023-07-12 12:49 PM'),
(9, 'RiteMed', '', 'dsadasda', '21fsfdsf', '21fsfdsf', '', '2023-07-29', '2023-07-12 12:49 PM'),
(10, 'Others', 'Sample Med', 'Sample MedSample Med', '15 tablets', '24 tablets', '10', '2023-10-05', '2023-09-12 09:48 PM'),
(11, 'Others', 'fdsfsdfsfsdf', 'sfsdfsdfsdfsdf', '1321 tablets', '1321 tablets', '', '2023-10-06', '2023-09-12 09:50 PM');

-- --------------------------------------------------------

--
-- Table structure for table `notification`
--

CREATE TABLE IF NOT EXISTS `notification` (
`notif_Id` int(11) NOT NULL,
  `type` varchar(100) NOT NULL,
  `subject` varchar(255) NOT NULL,
  `message` text NOT NULL,
  `reason` text NOT NULL,
  `sender` int(11) NOT NULL,
  `date_sent` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=41 ;

--
-- Dumping data for table `notification`
--

INSERT INTO `notification` (`notif_Id`, `type`, `subject`, `message`, `reason`, `sender`, `date_sent`) VALUES
(34, 'Appointment', 'Appointment request', 'Good day sir/maam Erwin Cabag Son , an appointment has been set by new patient named, Faculty patient.</p>\r\n							      <p><b>NOTE:</b> This is a system generated email. Please do not reply.', 'Sample reason', 68, '2023-09-15 06:02:10'),
(35, 'Appointment', 'Appointment request', 'Good day sir/maam Erwin Cabag Son , an appointment has been set by new patient named, Faculty patient.', 'Sample reason', 68, '2023-09-15 06:03:09'),
(36, 'Appointment', 'Appointment approved', 'Good day sir/maam Faculty patient, your appointment has been approved. Your schedule will be on  at exactly .', '', 68, '2023-09-15 06:05:40'),
(37, 'Medical certificate', 'Medical certificate request', 'Good day sir/maam Erwin Cabag Son , a request for medical records has been set by new patient named, Faculty patient.', 'Medical certificate sample reason', 68, '2023-09-15 06:08:21'),
(38, 'Medical records', 'Medical records request', 'Good day sir/maam Erwin Cabag Son , a request for medical records has been set by new patient named, Faculty patient.', 'Medical records sample reason', 68, '2023-09-15 06:11:26'),
(39, 'Request to edit', 'Request update approved', 'Good day sir/maam Staff Staff Staff , a request to update Student update records has been approved.', '', 67, '2023-09-15 06:22:59'),
(40, 'Request to edit', 'Request update approved', 'Good day sir/maam Staff Staff Staff , a request to update Teacher update records has been approved.', '', 67, '2023-09-15 06:25:22');

-- --------------------------------------------------------

--
-- Table structure for table `patient`
--

CREATE TABLE IF NOT EXISTS `patient` (
`user_Id` int(11) NOT NULL,
  `vaccine_status` varchar(50) NOT NULL,
  `position` varchar(20) NOT NULL,
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
  `date_registered` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB  DEFAULT CHARSET=utf8mb4 AUTO_INCREMENT=85 ;

--
-- Dumping data for table `patient`
--

INSERT INTO `patient` (`user_Id`, `vaccine_status`, `position`, `name`, `grade`, `teacher_position`, `dob`, `age`, `sex`, `address`, `religion`, `contact`, `email`, `parentName`, `parentContact`, `illness`, `pastMedical`, `surgicalHistory`, `blood_type`, `height`, `weight`, `allergy`, `password`, `pass`, `nutritional_Immunization`, `familyHistory`, `socialHistory`, `packsYears`, `environment`, `frequency`, `general`, `hematologic`, `endocrine`, `extremities`, `skin`, `head`, `vision`, `Eyes`, `ears`, `nose`, `mouthThroat`, `yearsMonths`, `neck`, `Breast`, `Respiratory`, `Cardiovascular`, `Gastrointestinal`, `peripheralvascular`, `freq_urinary`, `Urinary`, `male`, `age_menarche`, `female`, `muscularSkeletal`, `Psychiatric`, `Neurologic`, `NeurologicExam`, `picture`, `verification_code`, `date_registered`) VALUES
(68, '1st Booster', 'Teacher', 'Faculty patient', 'Sampl12345', 'Teacher', '2021-02-03', '2 years old', 'Male', 'Sampl', 'dsdssd123', '9359428963', 'christinegutierez16@gmail.com', 'Sampl', '9359428963', 'Sampl', 'Sampl', 'Sampl', '1243', '12', '12', 'fds', '0192023a7bbd73250516f069df18b500', 'admin123', 'Complete immunization,Incomplete immunization,Normal Filipino Diet,High Protein Diet', 'Asthma,Hypertension,Cancer,Boold Dyscracis', 'Non-Smoker,Occasional Alcoholic Beverage Drinker', 'NA', 'NA', 'NA', 'Weight loss,Weakness', 'Anemia,Easy Bruising or Bleeding', 'Heat and Cold Tolerance,Excessive Sweating', 'Good Pulse,Weak Pulse', 'Rashes,Moles', 'Headache,Diziness,Head injury', 'Good', 'Eye pain,Blurring of Vision', 'Ear infection,Ear Pain', 'Nasal Discharge,Nose Bleeding,None', 'Bleeding Gums,None', 'NA', 'Goiter,Lamps', 'Lumps,Pain', 'Cough,Haemoptysis', 'Chest Pain,Palpitation,Edema', 'Heart Burn,Constipation,Loss of Appetite,Nausea & Vomiting', 'Leg Cramps,Varicose Veins', '3', 'Dysuria,Haematuria,Kidney Stone', 'Discharges/Sore on the penis,Testicular Pain or Mass', '43', 'Itching,Vaginal Discharge,Sores,Lumps', 'Muscle of Joint Pain,Arthritis,Backache,Inflammation,History of Trauma', 'Nervousness,Depression', 'Change of Moods,Headache,Dizziness,Blackouts,Loss of Sensation,Tremors', 'GCS 15,Oriented to Time and Place,Intact CN,5/5 Motor Strength Bilateral U/L Extremities', 'aisat.png', 357842, '2023-09-15 06:29:03'),
(70, 'Fully Vaccinated', 'Student', 'Student', 'dsfdsf', '', '', '43', 'Female', 'fdsfd', '', '9359428963', 'student@gmail.com', 'fdsf', '9359428963', 'fdsf', 'dsfsdf', 'fdsf', 'sfds', 'sdfsd', 'fdsf', 'ds', '0192023a7bbd73250516f069df18b500', 'admin123', '', '', '', 'NA', 'NA', 'NA', '', '', '', '', '', '', '', '', '', '', '', 'NA', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '13.jpg', 0, '2023-09-15 06:29:15'),
(71, 'Fully Vaccinated', 'Teacher', 'Faculty ko', 'Student', '', '', '23', 'Male', 'Student', '', '9359428963', 'patient2@gmail.com', 'Student', '9359428963', 'Student', 'Student', 'Student', '324', '3fd23', '2324', 'Student', '', '', '', 'Asthma,Hypertension', '', 'NA', 'NA', 'NA', '', '', '', '', '', '', '', '', 'Tinnitus,Ear infection,Ear Discharge,Ear Pain', '', '', 'NA', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '2.jpg', 0, '2023-06-20 17:20:23'),
(72, 'Fully Vaccinated', 'Student', 'Dariel', 'Dariel', '', '', '23', 'Male', 'Dariel', '', '9359428963', '', 'Dariel', '9359428963', 'Dariel', 'Dariel', 'Dariel', 'Dariel', 'Dariel', 'Dariel', 'Dariel', '', '', '', '', '', 'NA', 'NA', 'NA', '', '', '', '', '', '', '', '', '', '', '', 'NA', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'aics.jpg', 0, '2023-05-28 11:19:01'),
(75, 'Fully Vaccinated', 'Student', 'Lito', 'Lito', '', '', '2', 'Male', 'Lito', '', '9359428963', '', 'Lito', '9359428963', 'Lito', 'Lito', 'Lito', 'Lito', 'Lito', 'Lito', 'Lito', '0d2f648242b071a890dbc370e6c726da', '', '', '', '', 'NA', 'NA', 'NA', '', '', '', '', '', '', '', '', '', '', '', 'NA', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '24.jpg', 0, '2023-06-07 18:16:50'),
(76, 'Fully Vaccinated', 'Student', 'Tony', 'Tony', '', '', '3', 'Female', 'Tony', '', '9359428963', 'Tony23@gmail.com', 'Tony', '9359428963', 'Tony', 'Tony', 'Tony', 'TonyTony', 'Tony', 'Tony', 'Tony', 'e7dbf79f98316f677db75306375d18d7', '', 'Complete immunization,Incomplete immunization', 'Asthma,Hypertension,Allergy,No Heradi - Familiar Diseases', 'Occasional Alcoholic Beverage Drinker,Frequent Alcoholic Beverage Drinker', 'NA', 'NA', 'ef', 'Weight loss,Weakness', 'Easy Bruising or Bleeding', 'Heat and Cold Tolerance,Excessive Thirst or Hunger', 'Good Pulse,Weak Pulse', 'Moles', 'Headache,Head injury', '', 'Glasses or Contact Lens', 'Ear Discharge', 'Nose Bleeding', 'Sore Throat', 'NA', 'Lamps', 'Lumps', 'Dyspnea', 'Edema', 'Pain w/ Defecation,Haemorrhoids,Black Stool', 'Varicose Veins', '', 'Dysuria,Kidney Stone', 'Testicular Pain or Mass', '', 'Itching,N/A', 'Backache,Inflammation', 'Suicide Attempts', 'Blackouts,Loss of Sensation', 'GCS 15', '16.jpg', 0, '2023-06-07 18:19:58'),
(77, 'Fully Vaccinated', 'Teacher', 'Pina', 'Pina', '', '', '34', 'Male', 'Pina', '', '9359428963', 'adminPina23@gmail.com', 'Pina', '9359428963', 'Pina', 'Pina', 'Pina', 'Pina', 'Pina', 'Pina', 'Pina', 'cf5629a8f4ae6aafaf091bb6b80dd93c', '', '', '', 'Non-Smoker', 'NA', 'NA', 'NA', '', '', '', '', '', '', '', '', '', '', '', 'NA', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '25.jpg', 0, '2023-06-07 18:24:26'),
(78, '2nd Dose', 'Student', 'fdsf', '', '', '2023-06-11', '3', 'Female', 'fdsfsdfsd', 'fsdfsdf', '9359428963', 'afdsfsdfdmin@gmail.com', 'fdsf', '9359428963', 'fdsfsf', 'dsf', 'fdsfds', 'fds', 'fdsf', 'dsfdsf', 'sdfsd', 'fca812f055d5fdcd3a355b63ceaad991', '', '', '', '', 'NA', 'NA', 'NA', '', '', '', '', '', '', '', '', '', '', '', 'NA', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '25.jpg', 0, '2023-06-14 08:29:58'),
(79, '1st Dose', 'Student', 'bagong Student', 'Bagong Student', '', '2023-06-02', '1', 'Male', 'Bagong Student', 'Bagong Student', '9359428963', 'superadfds43dmin@gmail.com', 'Bagong Student', '9359428963', 'Bagong Student', 'Bagong Student', 'Bagong Student', 'Bagong Student', 'Bagong Stu', 'Bagong Stu', 'Bagong Student', '79b30961630d0fe49343590555b17958', '', 'Complete immunization', 'Asthma', 'Non-Smoker', 'NA', 'NA', 'NA', 'Weight loss', 'Anemia', 'Heat and Cold Tolerance', 'Good Pulse', 'Rashes', 'Headache', '43', 'Glasses or Contact Lens', 'Ear infection', 'None', 'Sore Throat', 'NA', 'Pain', 'Nipple Discharge', 'Dyspnea', 'Edema', 'Pain w/ Defecation,Diarrhoea,Rectal Bleeding', 'Varicose Veins', '43', 'UTI', 'Discharges/Sore on the penis', '', 'History of STD,Lumps', 'Backache,History of Trauma', 'Suicide Attempts,None', 'Tremors', '5/5 Motor Strength Bilateral U/L Extremities', '25.jpg', 0, '2023-06-14 08:32:11'),
(80, '1st Dose', 'Student', 'Admin Student', 'Admin Student', 'fdsfsdfs', '2023-06-06', '1', 'Male', 'Admin Student', 'Admin Student', '9359428963', 'superadmindsdssds@gmail.com', 'Admin Student', '9359428963', 'Admin Student', 'Admin Student', 'Admin Student', 'Admin Student', 'Admin Stud', 'Admin Stud', 'Admin Student', '91f0139ced48166a97f5e83524a2ef59', '', 'Complete immunization,Incomplete immunization,Normal Filipino Diet', 'Asthma,Hypertension,Cancer', 'Non-Alcoholic Beverage Drinker,Occasional Alcoholic Beverage Drinker,Frequent Alcoholic Beverage Drinker', 'NA', 'NA', '', 'Weight loss,Weakness,Fatigue', 'Anemia,Easy Bruising or Bleeding,Past Transfusion', 'Heat and Cold Tolerance,Excessive Sweating,Excessive Thirst or Hunger', 'Good Pulse,Weak Pulse,CRT <2s', 'Rashes,Lumps,Moles', 'Headache,Diziness,Head injury', '43', 'Glasses or Contact Lens,Redness', 'Tinnitus,Vertigo,Ear Discharge', 'Nasal Discharge,Nose Bleeding', 'Bleeding Gums,Sore Throat,None', 'NA', 'Goiter,Lamps,Pain', 'Lumps,Pain,Nipple Discharge', 'Cough,Haemoptysis,Dyspnea', 'Chest Pain,Palpitation,Edema', 'Difficulty Swallowing,Heart Burn,Pain w/ Defecation,Haemorrhoids,Constipation,Diarrhoea,Loss of Appetite,Nausea & Vomiting,Rectal Bleeding', 'Leg Cramps,Varicose Veins,Swellign in Legs or Feet', '432', 'Polyuria,Dysuria,Haematuria,Kidney Stone,UTI', 'Hernia,Discharges/Sore on the penis,Testicular Pain or Mass', '435', 'History of STD,Itching,Sores,Lumps', 'Muscle of Joint Pain,Arthritis,Backache,Gout', 'Nervousness,Depression,Suicide Attempts', 'Change of Moods,Headache,Dizziness,Blackouts,Loss of Sensation,Tremors', 'GCS 15,Oriented to Time and Place,Intact CN', 'amg.png', 0, '2023-06-20 16:30:26'),
(81, 'Fully Vaccinated', 'Teacher', 'Admin Teacher', '', 'Admin Teacher', '2023-05-31', '2 weeks old', 'Male', 'Admin Teacher', 'Admin Teacherss', '9359428963', 'afdfsmin@gmail.com', 'Admin Teacher', '9359428963', 'Admin Teacher', 'Admin TeaAdmin Teachercher', 'Admin Teacher', 'Admin Teacher', 'Admin Teac', 'Admin Teac', 'Admin Teacher', 'e5658065df612583f280e0c236084a2f', '', 'Complete immunization,Normal Filipino Diet,High Protein Diet', 'Asthma,Hypertension,Cancer', 'Non-Smoker,Non-Alcoholic Beverage Drinker,Occasional Alcoholic Beverage Drinker', 'NA', 'NA', 'NA', 'Weight loss,Weakness,Fatigue', 'Anemia,Easy Bruising or Bleeding,Past Transfusion', 'Heat and Cold Tolerance,Excessive Sweating,Excessive Thirst or Hunger', 'Good Pulse,Weak Pulse,CRT <2s', 'Rashes,Lumps,Itching', 'Headache,Diziness,Head injury', '432', 'Glasses or Contact Lens,Redness,Eye pain', 'Tinnitus,Ear infection,Ear Discharge', 'Nose Bleeding,None', 'Bleeding Gums,Sore Throat', 'NA', 'Goiter,Lamps', 'Lumps,Pain,Nipple Discharge', 'Cough,Haemoptysis', 'Chest Pain,Palpitation,Edema', 'Difficulty Swallowing,Heart Burn,Pain w/ Defecation,Haemorrhoids,Constipation,Diarrhoea,Loss of Appetite,Nausea & Vomiting,Rectal Bleeding', 'Leg Cramps,Varicose Veins,Swellign in Legs or Feet', '543', 'Polyuria,Dysuria,None,UTI,None', 'Hernia,Discharges/Sore on the penis,Testicular Pain or Mass', '324', 'History of STD,Itching,Vaginal Discharge,Sores,Lumps', 'Muscle of Joint Pain,Arthritis,Backache,Gout,Inflammation,History of Trauma', 'Nervousness,Depression,Suicide Attempts', 'Change of Moods,Headache,Dizziness,Blackouts,Loss of Sensation', 'GCS 15,Oriented to Time and Place,Intact CN', 'assumpta.png', 0, '2023-06-14 10:07:24'),
(82, '1st Dose', 'Student', 'UPdate record', 'UPdate Record', '', '2023-06-07', '1 week old', 'Female', 'UPdate Record', 'UPdate Record', '9359428963', 'admifdsfdsn@gmail.com', 'UPdate Record', '9359428963', 'UPdate Record', 'UPdate Record', 'UPdate Record', 'UPdate Record', 'UPdate Rec', 'UPdate Rec', 'UPdate Record', 'f92fa8ab7186bb1a38d450be63a17bfc', '', '', '', '', 'NA', 'NA', 'NA', '', '', '', '', '', '', '', '', '', '', '', 'NA', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'amatiel.png', 0, '2023-06-20 16:11:28'),
(83, '1st Dose', 'Student', 'dsf', '', '', '2023-07-05', '1 week old', 'Male', 'fdsfds', 'fdsfds', '9359428963', 'Adminfdsffs34@gmail.com', 'fdsfdsfs', '9359428963', 'fdsf', 'sfdsfds', 'fds', 'fds', 'fdsf', 'dsfdsfds', 'fdsfsd', '0192023a7bbd73250516f069df18b500', 'admin123', '', '', '', 'NA', 'NA', 'NA', '', '', '', '', '', '', '', '', '', '', '', 'NA', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '12.jpg', 0, '2023-07-16 05:44:41'),
(84, 'Unvaccinated', 'Teacher', 'fds', '', 'fdsfds', '2023-06-27', '2 weeks old', 'Male', 'fdsfdsfds', 'fdsfds', '9359428963', 'Adminfds32@gmail.com', 'fdsf', '9359428963', 'fdsf', 'dsfs', 'dsfsdf', 'dsfw', 'dfds', 'fdsfdsf', 'fdsfds', '0192023a7bbd73250516f069df18b500', 'admin123', '', '', '', 'NA', 'NA', 'NA', '', '', '', '', '', '', '', '', '', '', '', 'NA', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'alexis.png', 0, '2023-07-16 05:46:20');

-- --------------------------------------------------------

--
-- Table structure for table `physical`
--

CREATE TABLE IF NOT EXISTS `physical` (
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
  `date_admitted` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB  DEFAULT CHARSET=utf8mb4 AUTO_INCREMENT=83 ;

--
-- Dumping data for table `physical`
--

INSERT INTO `physical` (`physical_Id`, `patient_Id`, `p_general`, `p_skin`, `skinOther`, `p_heent`, `p_auditory`, `p_nose`, `p_mouth_throat`, `p_neck`, `p_breast`, `p_cardiovascular`, `p_abdomen`, `p_genitals`, `clinical_impression`, `potential_risk`, `plan_medication`, `date_admitted`) VALUES
(68, 68, 'Awake,Coherent', 'Warrm to Touch,Dry Skin', 'NA', 'Anicteric Sclerae,Pale Palpebral Conjunctive,Icyeric Sclerae', 'Intact,Non-Intact', 'Nasal Deformity,Tender Sinuses', 'Oral Mass,Inflamed Tonsils', 'Lymphadenpathy,Neck Mass', 'Mass,Discharge', 'Jugular Vein Distension,Carotid Bruit', 'Normoactive,Tenderness', 'Mass,Discharges', 'Sample', 'Sample', 'Sample\r\n', '2023-06-28 23:51:55'),
(70, 70, 'Awake,Coherent,Responsive,Well Groomed', 'Warrm to Touch,Dry Skin,Dry Skin Turgor', 'NA', 'Anicteric Sclerae,Pale Palpebral Conjunctive,Icyeric Sclerae,Pupils Equally Reactive to light & accomodation', 'Intact,Non-Intact', 'Nasal Deformity,Tender Sinuses,Normal Nasal Septum', 'Oral Mass,Inflamed Tonsils,Bleeding Gums,None', 'Lymphadenpathy,Neck Mass,Tracheal Deviation,None', 'Mass,Discharge,None', 'Jugular Vein Distension,Carotid Bruit,Murmur,Apex beat at 5th ICS,Normal Rate & Rythm', 'Flat,Normoactive,Tenderness,Flabby,Bowel Sound,None', 'Mass,Discharges,None', 'fsdfdsdsd', 'Fsdfdsdsd', 'Fsdfdsdsd', '2023-06-28 23:39:08'),
(71, 0, '', '', 'NA', '', '', '', '', '', '', '', '', '', 'Student', 'StudentStudent', 'Student', '2023-06-08 02:03:19'),
(72, 0, '', '', 'NA', '', '', '', '', '', '', '', '', '', 'Dariel', 'Dariel', 'Dariel', '2023-05-28 19:19:01'),
(75, 0, '', '', 'NA', '', '', '', '', '', '', '', '', '', 'Lito', 'Lito', 'Lito', '2023-06-08 02:16:50'),
(76, 0, 'Coherent', 'Dry Skin,Dry Skin Turgor', 'NA', 'Pale Palpebral Conjunctive,Icyeric Sclerae', 'Non-Intact', 'Nasal Deformity,Tender Sinuses', 'Oral Mass', 'Tracheal Deviation', 'Discharge', 'Murmur', 'Flabby', 'Discharges', 'Tony', 'Tony', 'Tony', '2023-06-08 02:19:58'),
(77, 0, '', '', 'NA', '', '', '', '', '', '', '', '', '', 'Pina', 'Pina', 'Pina', '2023-06-08 02:24:26'),
(78, 2, '', '', 'NA', '', '', '', '', '', '', '', '', '', '', '', '', '2023-06-14 16:29:58'),
(79, 1, 'Awake', 'Warrm to Touch', 'NA', 'Anicteric Sclerae', 'Non-Intact', 'Nasal Deformity', 'Inflamed Tonsils', 'Tracheal Deviation', 'None', 'Murmur', 'Flabby', 'None', 'Bagong Student', 'Bagong Student', 'Bagong Student', '2023-06-14 16:32:11'),
(80, 0, 'Awake,Coherent,Responsive', 'Warrm to Touch,Dry Skin,Dry Skin Turgor', 'NA', 'Anicteric Sclerae,Pale Palpebral Conjunctive,Icyeric Sclerae', 'Intact,Non-Intact', 'Nasal Deformity,Tender Sinuses,Normal Nasal Septum', 'Oral Mass,Inflamed Tonsils,None', 'Lymphadenpathy,Neck Mass,Tracheal Deviation', 'Mass,Discharge,None', 'Jugular Vein Distension,Carotid Bruit,Murmur,Normal Rate & Rythm', 'Normoactive,Tenderness', 'Mass,Discharges', 'Admin Student', 'Admin Student', 'Admin Student', '2023-06-14 17:00:03'),
(81, 0, 'Awake,Coherent,Responsive', 'Warrm to Touch,Dry Skin,Dry Skin Turgor', 'NA', 'Anicteric Sclerae,Pale Palpebral Conjunctive,Icyeric Sclerae', 'Intact,Non-Intact', 'Nasal Deformity,Tender Sinuses,Normal Nasal Septum', 'Oral Mass,Inflamed Tonsils,Bleeding Gums', 'Lymphadenpathy,Neck Mass,Tracheal Deviation', 'Mass,Discharge,None', 'Jugular Vein Distension,Carotid Bruit,Murmur,Apex beat at 5th ICS', 'Flat,Tenderness,Flabby', 'Mass,Discharges', 'Admin Teacher', 'Admin Teacher', 'Admin Teacher', '2023-06-14 18:07:24'),
(82, 71, 'Awake,Coherent,Responsive,Well Groomed', 'Warrm to Touch,Dry Skin,Dry Skin Turgor,Other', 'HAHA SAMPLE', 'Anicteric Sclerae,Pale Palpebral Conjunctive,Icyeric Sclerae,Pupils Equally Reactive to light & accomodation', 'Intact,Non-Intact', 'Tender Sinuses,Normal Nasal Septum', 'Oral Mass,Inflamed Tonsils,Bleeding Gums,None', 'Lymphadenpathy,Neck Mass,Tracheal Deviation,None', 'Mass,Discharge,None', 'Jugular Vein Distension,Carotid Bruit,Murmur,Apex beat at 5th ICS,Normal Rate & Rythm', 'Flat,Normoactive,Tenderness,Flabby,Bowel Sound,None', 'Mass,Discharges,None', 'Smplae HAAH', 'Smplae HAAH', 'Smplae HAAH', '2023-07-07 00:11:36');

-- --------------------------------------------------------

--
-- Table structure for table `request_doc`
--

CREATE TABLE IF NOT EXISTS `request_doc` (
`req_Id` int(11) NOT NULL,
  `type` varchar(100) NOT NULL,
  `patient_Id` int(11) NOT NULL,
  `purpose` text NOT NULL,
  `pick_up_date` varchar(100) NOT NULL,
  `req_status` int(11) NOT NULL DEFAULT '0' COMMENT '0=Pending, 1=Processing, 2=Ready to pick-up, 3=Released',
  `date_created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `request_doc`
--

INSERT INTO `request_doc` (`req_Id`, `type`, `patient_Id`, `purpose`, `pick_up_date`, `req_status`, `date_created`) VALUES
(6, 'Medical Records', 68, 'fdsf', '2023-09-13', 3, '2023-09-15 06:01:21'),
(7, 'Medical Certificate', 68, 'Medical certificate sample reason', '2023-09-28', 3, '2023-09-15 06:11:12'),
(8, 'Medical Records', 68, 'Medical records sample reason', '2023-10-05', 0, '2023-09-15 06:11:26');

-- --------------------------------------------------------

--
-- Table structure for table `request_update`
--

CREATE TABLE IF NOT EXISTS `request_update` (
`req_Id` int(11) NOT NULL,
  `user_Id` int(11) NOT NULL,
  `req_type` varchar(100) NOT NULL,
  `req_status` int(11) NOT NULL DEFAULT '0' COMMENT '0=Requesting, 1-Approved, 2=Denied',
  `date_added` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=29 ;

--
-- Dumping data for table `request_update`
--

INSERT INTO `request_update` (`req_Id`, `user_Id`, `req_type`, `req_status`, `date_added`) VALUES
(25, 67, 'Student update', 1, '2023-09-15 06:19:44'),
(26, 67, 'Teacher update', 1, '2023-09-15 06:25:19'),
(27, 67, 'Medicine', 0, '2023-09-12 14:43:32'),
(28, 67, 'Dental Student', 0, '2023-09-12 14:43:52');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8mb4 AUTO_INCREMENT=68 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_Id`, `firstname`, `middlename`, `lastname`, `suffix`, `dob`, `age`, `email`, `contact`, `birthplace`, `gender`, `civilstatus`, `occupation`, `religion`, `house_no`, `street_name`, `purok`, `zone`, `barangay`, `municipality`, `province`, `region`, `image`, `password`, `user_type`, `verification_code`, `date_registered`) VALUES
(66, 'Erwin', 'Cabag', 'Son', '', '1997-09-22', '25 years old', 'admin@gmail.com', '9359428963', 'Poblacion, Medellin, Cebu', 'Male', 'Married', 'Web developer', 'Bible Baptist Church', '1234', 'Sitio Upper Landing', 'Purok San Isidro', 'Ambot', 'Daanlungsod', 'Medellin', '', 'VII', '3.jpg', '0192023a7bbd73250516f069df18b500', 'Admin', 374025, '2022-11-25'),
(67, 'Staff', 'Staff', 'Staff', '', '2023-05-03', '1 week old', 'Staff@gmail.com', '9359428963', 'Staff', 'Male', 'Married', 'Staff', 'Bible Baptist Church', 'Staff', 'Staff', 'Staff', 'Staff', 'Staff', 'Staff', 'Staff', 'Staff', '2.jpg', '0192023a7bbd73250516f069df18b500', 'Staff', 392087, '2023-05-12');

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
-- Indexes for table `consultation`
--
ALTER TABLE `consultation`
 ADD PRIMARY KEY (`consult_Id`);

--
-- Indexes for table `dental`
--
ALTER TABLE `dental`
 ADD PRIMARY KEY (`dental_Id`);

--
-- Indexes for table `form2`
--
ALTER TABLE `form2`
 ADD PRIMARY KEY (`form2_Id`);

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
MODIFY `actId` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `appointment`
--
ALTER TABLE `appointment`
MODIFY `appt_Id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `consultation`
--
ALTER TABLE `consultation`
MODIFY `consult_Id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=22;
--
-- AUTO_INCREMENT for table `dental`
--
ALTER TABLE `dental`
MODIFY `dental_Id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=20;
--
-- AUTO_INCREMENT for table `form2`
--
ALTER TABLE `form2`
MODIFY `form2_Id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `medicine`
--
ALTER TABLE `medicine`
MODIFY `med_Id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `notification`
--
ALTER TABLE `notification`
MODIFY `notif_Id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=41;
--
-- AUTO_INCREMENT for table `patient`
--
ALTER TABLE `patient`
MODIFY `user_Id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=85;
--
-- AUTO_INCREMENT for table `physical`
--
ALTER TABLE `physical`
MODIFY `physical_Id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=83;
--
-- AUTO_INCREMENT for table `request_doc`
--
ALTER TABLE `request_doc`
MODIFY `req_Id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `request_update`
--
ALTER TABLE `request_update`
MODIFY `req_Id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=29;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
MODIFY `user_Id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=68;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
