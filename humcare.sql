-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 18, 2025 at 03:36 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `humcare`
--

-- --------------------------------------------------------

--
-- Table structure for table `appointments`
--

CREATE TABLE `appointments` (
  `id` int(11) NOT NULL,
  `patient_id` int(11) DEFAULT NULL,
  `doctor_id` int(11) DEFAULT NULL,
  `appointment_date` date DEFAULT NULL,
  `appointment_time` time DEFAULT NULL,
  `status` enum('pending','confirmed','cancelled') DEFAULT 'pending',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `appointments`
--

INSERT INTO `appointments` (`id`, `patient_id`, `doctor_id`, `appointment_date`, `appointment_time`, `status`, `created_at`) VALUES
(1, 3, 3, '2025-12-18', '12:00:00', 'pending', '2025-12-16 07:58:09');

-- --------------------------------------------------------

--
-- Table structure for table `articles`
--

CREATE TABLE `articles` (
  `id` int(11) NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `slug` varchar(255) DEFAULT NULL,
  `category` varchar(100) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `content` longtext DEFAULT NULL,
  `views` int(11) DEFAULT 0,
  `likes` int(11) DEFAULT 0,
  `status` enum('published','draft') DEFAULT 'published',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `article_comments`
--

CREATE TABLE `article_comments` (
  `id` int(11) NOT NULL,
  `article_id` int(11) DEFAULT NULL,
  `user_name` varchar(100) DEFAULT NULL,
  `comment` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `article_likes`
--

CREATE TABLE `article_likes` (
  `id` int(11) NOT NULL,
  `article_id` int(11) DEFAULT NULL,
  `ip_address` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `contactus`
--

CREATE TABLE `contactus` (
  `id` int(11) NOT NULL,
  `address` text DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `map_location` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `contactus`
--

INSERT INTO `contactus` (`id`, `address`, `phone`, `email`, `map_location`) VALUES
(1, 'HumCare Healthcare Pvt Ltd, New Delhi, India', '+91 98765 43210', 'support@humcare.com', 'New Delhi');

-- --------------------------------------------------------

--
-- Table structure for table `contact_messages`
--

CREATE TABLE `contact_messages` (
  `id` int(11) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `subject` varchar(100) DEFAULT NULL,
  `message` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `contact_messages`
--

INSERT INTO `contact_messages` (`id`, `name`, `email`, `subject`, `message`, `created_at`) VALUES
(1, 'Nitish Kumar', 'nitish@humcare.com', NULL, 'i\'m Admin of HumCare.', '2025-12-17 11:22:22'),
(2, 'Jony Donny', 'Jony@gmail.com', NULL, 'hey i\'m jony Donny', '2025-12-17 13:25:36'),
(3, 'jimmy sergil', 'jimmy@gmail.com', NULL, 'plz check what\'s problem', '2025-12-17 13:32:12');

-- --------------------------------------------------------

--
-- Table structure for table `doctors`
--

CREATE TABLE `doctors` (
  `id` int(11) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `specialization` varchar(100) DEFAULT NULL,
  `experience` int(11) DEFAULT NULL,
  `rating` float DEFAULT NULL,
  `city` varchar(50) DEFAULT NULL,
  `clinic` varchar(150) DEFAULT NULL,
  `fee` int(11) DEFAULT NULL,
  `availability` enum('today','week') DEFAULT NULL,
  `consultation_type` enum('online','offline','both') DEFAULT NULL,
  `image` varchar(100) DEFAULT NULL,
  `subscription_plan` varchar(50) DEFAULT 'Free',
  `payment_status` varchar(20) DEFAULT 'Unpaid'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `doctors`
--

INSERT INTO `doctors` (`id`, `name`, `specialization`, `experience`, `rating`, `city`, `clinic`, `fee`, `availability`, `consultation_type`, `image`, `subscription_plan`, `payment_status`) VALUES
(1, 'Dr. Ankit Sharma', 'Dermatologist', 8, 4.5, 'Delhi', 'Skin Care Clinic', 500, 'today', 'offline', 'https://images.unsplash.com/photo-1612349317150-e413f6a5b16d?w=500', 'Free', 'Unpaid'),
(2, 'Dr. Neha Verma', 'Gynecologist', 10, 4.2, 'Mumbai', 'ddd', 700, 'week', 'online', 'https://images.unsplash.com/photo-1527613426441-4da17471b66d?w=500', 'free', 'Paid'),
(3, 'Nikhil Kumar', '', 0, 4.5, '', '', 0, 'today', 'online', 'https://images.unsplash.com/photo-1612349316228-5942a9b489c2?w=500', 'Premium', 'Paid'),
(4, 'Dr. Amit Sharma', 'Cardiologist', 12, 4.8, 'Delhi', 'Heart Care Clinic', 800, '', 'offline', 'https://images.unsplash.com/photo-1758691463384-771db2f192b3?w=500&auto=format&fit=crop&q=60&ixlib=r', 'Premium', 'Paid'),
(5, 'Dr. Annu Verma', 'Dermatologist', 8, 4.6, 'Mumbai', 'SkinGlow Clinic', 600, '', 'online', 'https://images.unsplash.com/photo-1673865641073-4479f93a7776?w=500&auto=format&fit=crop&q=60&ixlib=r', 'Standard', 'Paid'),
(6, 'Dr. Rajesh Kumar', 'Orthopedic', 15, 4.7, 'Bangalore', 'Ortho Plus Hospital', 900, 'today', 'offline', 'https://images.unsplash.com/photo-1659353888922-7c7b1ad21650?w=500&auto=format&fit=crop&q=60&ixlib=r', 'Premium', 'Paid'),
(7, 'Sweta singh', '', 0, 4.5, '', '', 0, 'today', 'online', '/HumCare/public/uploads/doctors/doc_7_1766042356.jpg', 'Premium', 'Paid'),
(8, 'Mohit Singh', 'cardiology', 24, 4.5, 'Delhi', 'Heart specilist', 699, 'today', 'online', '/HumCare/public/uploads/doctors/doc_8_1766062153.jpg', 'Premium', 'Paid'),
(9, 'Dr. Kavita Rao', 'Psychiatrist', 9, 4.4, 'Hyderabad', 'Mind Wellness Clinic', 650, 'today', 'online', 'https://images.unsplash.com/photo-1659353888906-adb3e0041693?w=500&auto=format&fit=crop&q=60&ixlib=r', 'Free', 'Unpaid');

-- --------------------------------------------------------

--
-- Table structure for table `invoices`
--

CREATE TABLE `invoices` (
  `id` int(11) NOT NULL,
  `invoice_number` varchar(50) NOT NULL,
  `doctor_id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `clinic` varchar(255) DEFAULT NULL,
  `plan` varchar(100) DEFAULT NULL,
  `amount` decimal(10,2) DEFAULT NULL,
  `payment_method` varchar(50) DEFAULT NULL,
  `payment_status` varchar(50) DEFAULT NULL,
  `created_at` datetime DEFAULT current_timestamp(),
  `logo` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `invoices`
--

INSERT INTO `invoices` (`id`, `invoice_number`, `doctor_id`, `name`, `email`, `clinic`, `plan`, `amount`, `payment_method`, `payment_status`, `created_at`, `logo`) VALUES
(1, 'INV-13386', 7, 'Dr.Sweta singh', 'sweta@gmail.com', 'Sweta Clinic', 'Free', 0.00, 'UPI', 'Paid', '2025-12-18 10:45:17', NULL),
(2, 'INV-69159', 7, 'Dr. Sweta singh', 'sweta@gmail.com', 'Sweta Clinic', 'Free', 0.00, 'UPI', 'Paid', '2025-12-18 11:27:38', '/HumCare/public/uploads/invoices/logo_1766037458_a87342e818ed.jpg'),
(3, 'INV-43405', 7, 'Dr. Sweta singh', 'sweta@gmail.com', 'Sweta Clinic', 'Free', 0.00, 'UPI', 'Paid', '2025-12-18 11:38:02', '/HumCare/public/uploads/invoices/logo_1766038082_a111e6c0f5d2.jpg'),
(4, 'INV-26561', 7, 'Dr. Sweta singh', 'sweta@gmail.com', 'Sweta Clinic', 'Standard', 299.00, 'UPI', 'Paid', '2025-12-18 11:41:35', '/HumCare/public/uploads/invoices/logo_1766038295_c66eb9713d2c.jpg'),
(5, 'INV-22964', 7, 'Dr. Sweta singh', 'sweta@gmail.com', 'Sweta Clinic', 'Premium', 499.00, 'UPI', 'Paid', '2025-12-18 11:48:08', '/HumCare/public/uploads/invoices/logo_1766038688_68649a3ce327.jpg'),
(6, 'INV-98690', 7, 'Dr. Sweta singh', 'sweta@gmail.com', 'Sweta Clinic', 'Standard', 299.00, 'UPI', 'Paid', '2025-12-18 12:34:55', '/HumCare/public/uploads/doctors/doc_7_1766041495.jpg'),
(7, 'INV-53431', 7, 'Dr. Sweta singh', 'sweta@gmail.com', 'Sweta Clinic', 'Standard', 299.00, 'UPI', 'Paid', '2025-12-18 12:39:32', '/HumCare/public/uploads/doctors/doc_7_1766041772.jpg'),
(8, 'INV-15621', 7, 'Sweta singh', 'sweta@gmail.com', 'Sweta Clinic', 'Standard', 299.00, NULL, 'Paid', '2025-12-18 12:49:16', '/HumCare/public/uploads/doctors/doc_7_1766042356.jpg'),
(9, 'INV-96900', 3, 'Nikhil Kumar', '', '', 'Premium', 499.00, NULL, 'Paid', '2025-12-18 17:01:08', NULL),
(10, 'INV-49820', 3, 'Nikhil Kumar', '', '', 'Premium', 499.00, NULL, 'Paid', '2025-12-18 17:01:36', NULL),
(11, 'INV-69426', 3, 'Nikhil Kumar', '', '', 'Premium', 499.00, NULL, 'Paid', '2025-12-18 18:05:19', NULL),
(12, 'INV-85062', 7, 'Sweta singh', '', '', 'Premium', 499.00, NULL, 'Paid', '2025-12-18 18:08:49', NULL),
(13, 'INV-62081', 8, 'Mohit Singh', 'mohit@gmail.com', 'Heart specilist', 'Premium', 499.00, NULL, 'Paid', '2025-12-18 18:19:13', '/HumCare/public/uploads/doctors/doc_8_1766062153.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `role` enum('patient','doctor') NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(150) NOT NULL,
  `password` varchar(255) NOT NULL,
  `specialization` varchar(100) DEFAULT NULL,
  `status` enum('active','pending') DEFAULT 'active',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `role`, `name`, `email`, `password`, `specialization`, `status`, `created_at`) VALUES
(1, 'patient', 'Minnu Kumar', 'minnu98@gmail.com', '$2y$10$sSQokXmmB3Ync3oKrF2oTe9dxvqAjGO1kA8Z7Vurthda7Vm8zMBmK', NULL, 'active', '2025-12-15 11:04:07'),
(2, 'doctor', 'Neha kumari', 'Neha12@gmail.com', '$2y$10$np0IMa/YWuT3qEtwNbPS0ujSVjBnHiSgzdQ20cwVXgeaXI.JVRUYi', 'Dermatologist', 'active', '2025-12-15 11:30:55'),
(3, 'patient', 'Nikhil Kumar', 'nikhil@gmail.com', '$2y$10$UV2hKFbXOlXykUs8VTtJnu.dnzVFxWbtvf7FRpY/UpS71B7g3mmX2', NULL, 'active', '2025-12-15 13:04:39'),
(4, 'patient', 'Rakesh kumar', 'rakesh@gmail.com', '$2y$10$4NaDO31dqvXdSFrs1B0PD./yJwARLwcOvTL0Kmwqd6FcqLp8oQpam', NULL, 'active', '2025-12-15 13:57:02'),
(6, '', 'Nitish Kumar', 'nitish@gamil.com', '$2y$10$2/Qn7C7LjfUbnplgOPgI5.jY.REDFZFwDjOPt1coaEescbnerw5Bq', NULL, 'active', '2025-12-16 04:54:12'),
(7, 'doctor', 'Sweta singh', 'sweta@gmail.com', '$2y$10$dZ7nsXZJL.rRWKQv1lfAvOQr0gom6RiYewdhcVYLHLoP49XRs2L7O', 'Dermatologist', 'active', '2025-12-18 05:13:07'),
(8, 'doctor', 'Mohit Singh', 'mohit98@gmail.com', '$2y$10$MUbtQ10o1yM6bX8VLfS/QOQhfFq93aofrXJ6aZ0Z/DlovJS1rLmcq', 'Dermatologist', 'active', '2025-12-18 12:44:12');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `appointments`
--
ALTER TABLE `appointments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `articles`
--
ALTER TABLE `articles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `article_comments`
--
ALTER TABLE `article_comments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `article_likes`
--
ALTER TABLE `article_likes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contactus`
--
ALTER TABLE `contactus`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contact_messages`
--
ALTER TABLE `contact_messages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `doctors`
--
ALTER TABLE `doctors`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idx_doctors_filters` (`city`,`specialization`,`rating`,`fee`,`availability`);

--
-- Indexes for table `invoices`
--
ALTER TABLE `invoices`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `appointments`
--
ALTER TABLE `appointments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `articles`
--
ALTER TABLE `articles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `article_comments`
--
ALTER TABLE `article_comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `article_likes`
--
ALTER TABLE `article_likes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `contactus`
--
ALTER TABLE `contactus`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `contact_messages`
--
ALTER TABLE `contact_messages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `doctors`
--
ALTER TABLE `doctors`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `invoices`
--
ALTER TABLE `invoices`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
