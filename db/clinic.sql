-- phpMyAdmin SQL Dump
-- version 4.2.7.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Oct 21, 2023 at 02:40 AM
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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=15 ;

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
  `seen_by_admin` int(11) DEFAULT '0' COMMENT '0=Unread, 1=Read',
  `date_added` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB  DEFAULT CHARSET=utf8mb4 AUTO_INCREMENT=8 ;

-- --------------------------------------------------------

--
-- Table structure for table `asking_med`
--

CREATE TABLE IF NOT EXISTS `asking_med` (
`asking_med_Id` int(11) NOT NULL,
  `patient_Id` int(11) NOT NULL,
  `pr` varchar(100) NOT NULL,
  `temperature` varchar(100) NOT NULL,
  `vital_sign` text NOT NULL,
  `medical_advised` text NOT NULL,
  `medicine_given` text NOT NULL,
  `chief_complaints` text NOT NULL,
  `date_admitted` datetime NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=21 ;

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
  `date_admitted` datetime NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

-- --------------------------------------------------------

--
-- Table structure for table `medicine`
--

CREATE TABLE IF NOT EXISTS `medicine` (
`med_Id` int(11) NOT NULL,
  `brand_name` varchar(100) NOT NULL,
  `other_brand_name` varchar(100) NOT NULL,
  `med_name` varchar(100) NOT NULL,
  `milligrams` varchar(50) NOT NULL,
  `med_stock_in` varchar(100) NOT NULL,
  `med_stock_in_orig` varchar(100) NOT NULL,
  `med_stock_out` varchar(100) NOT NULL,
  `expiration_date` varchar(100) NOT NULL,
  `date_added` varchar(100) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

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
  `is_read_by_patient` int(11) NOT NULL DEFAULT '0' COMMENT '0=Unread, 1=Read',
  `is_read_by_staff` int(11) NOT NULL DEFAULT '0' COMMENT '0=Unread, 1=Read',
  `date_sent` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=55 ;

-- --------------------------------------------------------

--
-- Table structure for table `patient`
--

CREATE TABLE IF NOT EXISTS `patient` (
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
  `date_registered` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB  DEFAULT CHARSET=utf8mb4 AUTO_INCREMENT=85 ;

--
-- Dumping data for table `patient`
--

INSERT INTO `patient` (`user_Id`, `added_by`, `vaccine_status`, `position`, `civil_status`, `name`, `grade`, `teacher_position`, `dob`, `age`, `sex`, `address`, `religion`, `contact`, `email`, `parentName`, `parentContact`, `guardianName`, `illness`, `pastMedical`, `surgicalHistory`, `blood_type`, `height`, `weight`, `allergy`, `password`, `pass`, `nutritional_Immunization`, `familyHistory`, `socialHistory`, `packsYears`, `environment`, `frequency`, `general`, `hematologic`, `endocrine`, `extremities`, `skin`, `head`, `vision`, `Eyes`, `ears`, `nose`, `mouthThroat`, `yearsMonths`, `neck`, `Breast`, `Respiratory`, `Cardiovascular`, `Gastrointestinal`, `peripheralvascular`, `freq_urinary`, `Urinary`, `male`, `age_menarche`, `female`, `muscularSkeletal`, `Psychiatric`, `Neurologic`, `NeurologicExam`, `picture`, `verification_code`, `date_registered`) VALUES
(68, 66, '1st Booster', 'Teacher', 'Widow/er', 'Faculty patient', 'Sampl12345', 'Teacher', '2021-02-03', '2 years old', 'Male', 'Sampl', 'dsdssd123d', '9359428963', 'christinegutierez16@gmail.com', 'Samplsfd', '9359428963', '', 'Sampl', 'Sampl', 'Sampl', '1243', '12', '12', 'fds', '0192023a7bbd73250516f069df18b500', 'admin123', 'Complete immunization,Incomplete immunization,Normal Filipino Diet,High Protein Diet', 'Asthma,Hypertension,Cancer,Boold Dyscracis', 'Non-Smoker,Occasional Alcoholic Beverage Drinker', 'NA', 'NA', 'NA', 'Weight loss,Weakness', 'Anemia,Easy Bruising or Bleeding', 'Heat and Cold Tolerance,Excessive Sweating', 'Good Pulse,Weak Pulse', 'Rashes,Moles', 'Headache,Diziness,Head injury', 'Good', 'Eye pain,Blurring of Vision', 'Ear infection,Ear Pain', 'Nasal Discharge,Nose Bleeding,None', 'Bleeding Gums,None', 'NA', 'Goiter,Lamps', 'Lumps,Pain', 'Cough,Haemoptysis', 'Chest Pain,Palpitation,Edema', 'Heart Burn,Constipation,Loss of Appetite,Nausea & Vomiting', 'Leg Cramps,Varicose Veins', '3', 'Dysuria,Haematuria,Kidney Stone', 'Discharges/Sore on the penis,Testicular Pain or Mass', '43', 'Itching,Vaginal Discharge,Sores,Lumps', 'Muscle of Joint Pain,Arthritis,Backache,Inflammation,History of Trauma', 'Nervousness,Depression', 'Change of Moods,Headache,Dizziness,Blackouts,Loss of Sensation,Tremors', 'GCS 15,Oriented to Time and Place,Intact CN,5/5 Motor Strength Bilateral U/L Extremities', 'aisat.png', 357842, '2023-10-21 00:39:17'),
(70, 66, 'Fully Vaccinated', 'Student', 'Married', 'Student', 'dsfdsf', '', '2020-02-19', '3 years old', 'Female', 'fdsfd', 'dsa', '9359428963', 'student@gmail.com', 'fdsf', '9359428963', 'df', 'fdsf', 'dsfsdf', 'fdsf', 'sfds', 'sdfsd', 'fdsf', 'ds', '0192023a7bbd73250516f069df18b500', 'admin123', '', '', '', 'NA', 'NA', 'NA', '', '', '', '', '', '', '', '', '', '', '', 'NA', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '13.jpg', 0, '2023-10-05 10:36:53');

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
  `seen_by_admin` int(11) NOT NULL DEFAULT '0' COMMENT '0=Unread, 1=Read',
  `date_created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=33 ;

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
(66, 'Erwin', 'Cabag', 'Son', '', '1997-09-22', '25 years old', 'admin@gmail.com', '9359428963', 'Poblacion, Medellin, Cebu', 'Male', 'Married', 'Web developer', 'Bible Baptist Church', '1234', 'Sitio Upper Landing', 'Purok San Isidro', 'Ambot', 'Daanlungsod', 'Medellin', '', 'VII', 'poly.jpg', '0192023a7bbd73250516f069df18b500', 'Admin', 374025, '2022-11-25'),
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
-- Indexes for table `asking_med`
--
ALTER TABLE `asking_med`
 ADD PRIMARY KEY (`asking_med_Id`);

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
MODIFY `actId` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `appointment`
--
ALTER TABLE `appointment`
MODIFY `appt_Id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `asking_med`
--
ALTER TABLE `asking_med`
MODIFY `asking_med_Id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `consultation`
--
ALTER TABLE `consultation`
MODIFY `consult_Id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=22;
--
-- AUTO_INCREMENT for table `dental`
--
ALTER TABLE `dental`
MODIFY `dental_Id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=21;
--
-- AUTO_INCREMENT for table `form2`
--
ALTER TABLE `form2`
MODIFY `form2_Id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `medicine`
--
ALTER TABLE `medicine`
MODIFY `med_Id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `notification`
--
ALTER TABLE `notification`
MODIFY `notif_Id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=55;
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
MODIFY `req_Id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `request_update`
--
ALTER TABLE `request_update`
MODIFY `req_Id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=33;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
MODIFY `user_Id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=68;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
