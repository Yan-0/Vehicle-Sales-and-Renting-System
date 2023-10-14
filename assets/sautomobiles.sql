-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 10, 2023 at 05:49 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sautomobiles`
--

-- --------------------------------------------------------

--
-- Table structure for table `booking`
--

CREATE TABLE `booking` (
  `booking_id` int(20) NOT NULL,
  `booked_by` varchar(50) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `country` text NOT NULL,
  `email` varchar(50) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `address` varchar(50) NOT NULL,
  `booked_vehicle` varchar(50) NOT NULL,
  `booking_status` varchar(20) NOT NULL DEFAULT 'pending'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `booking`
--

INSERT INTO `booking` (`booking_id`, `booked_by`, `phone`, `country`, `email`, `address`, `booked_vehicle`, `booking_status`) VALUES
(9, 'Raunak Khadka', '9851122343', 'Nepal', 'raunak@gmail.com', 'Kathmandu', 'Harley-Davidson-SportsterS', 'pending'),
(10, 'Shreyan Bhandari', '9861960112', 'Nepal', 'shreyanbhandari36@gmail.com', 'Budhanilkantha', 'Toyota-LC300', 'pending'),
(11, 'Warner Bros', '9812345678', 'Nepal', 'root@gmail.com', 'Jhapa', 'Toyota-GR-Supra', 'pending'),
(12, 'Dhiraj Jha', '9800123456', 'Nepal', 'dhiraj@gmail.com', 'Baneshwor', 'Hyundai-Ioniq6', 'completed');

-- --------------------------------------------------------

--
-- Table structure for table `rental`
--

CREATE TABLE `rental` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `rented_by` varchar(100) NOT NULL,
  `pickup_loc` varchar(255) NOT NULL,
  `dropoff_loc` varchar(255) NOT NULL,
  `vehicle_type` varchar(255) NOT NULL,
  `duration` varchar(255) NOT NULL,
  `start_date` datetime(6) NOT NULL,
  `end_date` datetime(6) NOT NULL,
  `rental_status` char(20) NOT NULL DEFAULT 'pending'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `rental`
--

INSERT INTO `rental` (`id`, `rented_by`, `pickup_loc`, `dropoff_loc`, `vehicle_type`, `duration`, `start_date`, `end_date`, `rental_status`) VALUES
(17, 'Raunak Khadka', 'Kathmandu', 'Hetauda', 'Car', '0 days, 23 hours, 56 minutes', '2023-05-30 11:56:00.000000', '2023-05-31 11:52:00.000000', 'cancelled');

-- --------------------------------------------------------

--
-- Table structure for table `rental_vehicles`
--

CREATE TABLE `rental_vehicles` (
  `id` int(255) NOT NULL,
  `vehicle_type` varchar(100) NOT NULL,
  `quantity` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `rental_vehicles`
--

INSERT INTO `rental_vehicles` (`id`, `vehicle_type`, `quantity`) VALUES
(1, 'Car', 5),
(2, 'Bus', 2),
(3, 'Motorbike', 9),
(4, 'Microbus', 2),
(5, 'SUV', 2);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `fullname` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `address` varchar(255) NOT NULL DEFAULT 'Kathmandu',
  `country` varchar(255) NOT NULL DEFAULT 'Nepal',
  `user_type` varchar(255) NOT NULL DEFAULT 'user'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `password`, `fullname`, `phone`, `email`, `address`, `country`, `user_type`) VALUES
(1, '0319b1d4bea02df4a314d6e0a1dd4151', 'Shreyan Bhandari', '9861960112', 'shreyanbhandari36@gmail.com', 'Budhanilkantha', 'Nepal', 'admin'),
(2, '432639de2357c9d560a9c3d022d3fc8a', 'Dhiraj Jha', '9800123456', 'dhiraj@gmail.com', 'Kathmandu', 'Nepal', 'user'),
(12, '6468b73a6a7122591320ef4114e9cf8e', 'Raunak Khadka', '9851122343', 'raunak@gmail.com', 'Kathmandu', 'Nepal', 'user'),
(13, '63a9f0ea7bb98050796b649e85481845', 'Root User', '9812345678', 'root@gmail.com', 'Baneshwor', 'Nepal', 'user'),
(18, 'a01d22a80e9ab3894277ac416b652baa', 'Porac Sharma', '9801234567', 'porac34195@ksyhtc.com', 'Imadol', 'Nepal', 'user');

-- --------------------------------------------------------

--
-- Table structure for table `vehicles`
--

CREATE TABLE `vehicles` (
  `vehicle_id` int(20) NOT NULL,
  `chassis_no` varchar(15) NOT NULL,
  `vehicle_model` varchar(100) NOT NULL,
  `make_year` int(10) NOT NULL,
  `color` text NOT NULL,
  `vehicle_type` varchar(50) NOT NULL,
  `vehicle_price` int(50) NOT NULL,
  `description` varchar(1000) NOT NULL,
  `quantity` int(50) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `vehicles`
--

INSERT INTO `vehicles` (`vehicle_id`, `chassis_no`, `vehicle_model`, `make_year`, `color`, `vehicle_type`, `vehicle_price`, `description`, `quantity`) VALUES
(1, 'BMWQ123TR', 'BMW Series 6', 2023, 'Silver', 'Sedan', 43000, 'The 2021 BMW 6-Series, it took more of a mild-hybrid approach similar to the 5-Series. It includes revised styling and updated infotainment technology.\n                        It shows a more aggressive ace, too, with its new headlights and a bigger grille. Its chrome parts can be swapped for gloss black with the M Sport package.<br><br>\n                        All ranges will have mild-hybrid technology added. It means the 6-Series is going to have an integrated starter motor and generator, which is charged through braking and coasting. That will give the car an increased horsepower boost in high-load situations.\n                        An 8-speed automatic is a standard across the ranges. An all-wheel-drive option is either standard or available on each model.<br><br>', 1),
(2, 'TYTL123C14V', 'Toyota LC300', 2023, 'White', 'SUV', 89990, 'Toyota has today unveiled the newest generation of its legendary Land Cruiser SUV. The LC300-generation 2022 Land Cruiser, sits on an all new platform, gets new looks, and receives two twin-turbo V-6 engine options.<br><br>This isn\'t just a heavily redesigned version of the 200-series Land Cruiser, which debuted back in 2007. Toyota\'s gone back to the drawing board, using its modular GA-F platform as a base for the new LC300 model. The new chassis saves 440 pounds over the old SUV while improving weight distribution and providing a lower center of gravity. Toyota\'s also added more wheel articulation for better off-roading performance and a new electronically controlled version of its trick KDSS (Kinetic Dynamic Suspension System) that adjusts the connection of the anti-roll bars.<br><br>', 0),
(3, 'MBE001C145E', 'Mercedes-Benz E-Class', 2021, 'Gunmetal Grey', 'Sedan', 57800, 'The Mercedes-Benz E-Class deserves a place on any luxury shopper\'s short list. This popular midsize luxury car gained new looks and updated engines during its 2021 refresh, and we liked the result enough that the E-Class earned the Edmunds Top Rated Luxury Sedan award. This year the E-Class would have won again were it not for a technicality — it lost out to its completely redesigned big brother, the larger S-Class.<br><br>Not to worry. The 2022 E-Class is still plenty appealing. You can choose an E-Class as a sedan, which is the most popular, but there\'s also a coupe, a convertible and even a wagon, which is somehow both dorky and cool at the same time. All come with a richly appointed interior and top-notch refinement, and you can further layer on added performance and technological wizardry to your heart\'s (and budget\'s) content.<br><br>', 1),
(4, 'FF15R01459T', 'Ford F-150 Raptor', 2023, 'Black', 'Pickup Truck', 109145, 'Ford adds the mega-horsepower F-150 Raptor R for 2023. The Raptor R uses a 700-hp supercharged 5.2-liter V-8 Predator engine from the Mustang GT500. Underneath, a 9.75-inch rear axle with an electronically controlled locking rear differential with a 4:10:1 ratio will come standard. While 37-inch tires are standard equipment, Ford also gives the R stiffer front springs and specially tuned dampers to handle the extra weight. Raptor R\'s come standard with carbon-fiber accents throughout the cabin and an upholstery mixed with black leather and microsuede with Recaro front seats.<br><br> The F-150 Raptor is only offered with a crew-cab body style called SuperCrew. Deciding between the more affordable EcoBoost V-6 model and the more powerful V-8 R model is a tough call.', 1),
(5, 'JC456S2454C', 'Jeep Compass', 2023, 'Dual Tone', 'SUV', 35745, 'The new Compass is refined and ready to impress. With a two-toned dark grey contrast roof, full LED package projector headlamps and a striking alloy design available in a variety of body-coloured styles and finishes, the new Compass stands apart from the ordinary.<br><br>The new Compass offers comfortable, contemporary styling with premium interiors. The 8-way electronically adjustable leather seats come with ventilation for additional comfort and also a memory function that remembers your preferred seating position. In addition to these, a dual-pane panoramic sunroof and nine-speaker Uconnect audio system offer an experience that makes every ride a luxurious adventure.', 1),
(6, 'TGR123S', 'Toyota GR Supra', 2022, 'Absolute Zero', 'Sports Car', 63280, 'Race-car-inspired and ready for the streets, GR Supra\'s 45th Anniversary Edition Mikan Blast exterior color brings this legend to life. Matte-black 19-in. forged-aluminum wheels and a manually adjustable rear spoiler finish off the GT4-inspired look, while sport-tuned handling and a powerful engine help you take on exhilarating drives. From bending around street corners to driving across highways, GR Supra\'s 45th Anniversary Edition is the return you’ve been waiting on.<br><br>GR Supra’s available 3.0-liter turbocharged inline-six produces 382 horsepower * with an impressive 368 lb.-ft. of torque. Add more speed into the equation through an 8-speed Automatic Transmission or take full control on the road with the lighter and optimally balanced 6-speed intelligent Manual Transmission (iMT) for even more thrilling drives.', 1),
(7, 'HYI6IO459H', 'Hyundai Ioniq 6', 2023, 'Tan', 'Sedan', 57800, 'IONIQ 6 was designed to be the most aerodynamic Hyundai to help give it the highest range of any all-electric Hyundai, at up to EPA-estimated 361 miles. And it’s one of the few electric vehicles that can use 800V DC ultra-fast chargers, which can charge the battery from 10% to 80% in as little as 18 minutes.<br><br>The available 77.4-kWh battery pack was built for impressive range and power. And by power, we mean the swift kick of acceleration you get from the motor’s instant torque. Double the fun when you go with the available dual motor option. <br><br>From its two 12.3-inch displays to 5 USB ports, IONIQ 6 keeps you well-connected with your digital life.', 1),
(8, 'HLDS123S45D', 'Harley-Davidson Sportster S', 2023, 'Dual Tone (Black/White)', 'Cruiser Bike', 15599, 'Sportster S is the first chapter of a whole new book of the Sportster saga. A legacy born in 1957 that outperformed the competition is now rebuilt to blow away the standards of today.<br><br>The Revolution Max is a liquid-cooled powertrain with double overhead camshafts and variable valve timing: offering ample torque and an immediate powerband tuned to maximize rider control.<br><br>Choose from 3 pre-programmed Ride Modes (Sport, Road, and Rain) or create your own custom mode — tuning your bike with a specific combination of power delivery, engine braking, Cornering Enhanced Antilock Braking System (C-ABS) and Cornering Enhanced Traction Control System (C-TCS) settings.', 2),
(9, 'MCD1205P30V', 'Mercedes Sprinter', 2023, 'Black', 'Van', 59990, 'The Mercedes-Benz Sprinter is a comfortable workhorse that offers a splash of G-wagen capability. Thanks to its wide span of configurability, it can satisfy the needs of both those who deliver and those who crave outdoor adventure. That said, its starting price is noticeably steeper than full-size van competitors such as the Ford Transit and Ram ProMaster. The Sprinter is sold with three four-cylinder engine options—two turbodiesels and one turbocharged gasoline engine—each working through a nine-speed automatic transmission. That transmission and the van’s optional 4Matic all-wheel-drive system are similar to those found in Mercedes-Benz passenger cars like the E-class and S550.<br><br>All Sprinter cargo, passenger, and crew vans are offered with three engine choices. The standard powertrain is a 188-hp turbocharged gas-fed four-cylinder with 258-lb-ft of torque.', 1);

-- --------------------------------------------------------

--
-- Table structure for table `vehicle_requested`
--

CREATE TABLE `vehicle_requested` (
  `request_id` int(255) NOT NULL,
  `requested_by` varchar(100) NOT NULL,
  `brand` varchar(100) NOT NULL,
  `model` varchar(100) NOT NULL,
  `make_year` int(10) NOT NULL,
  `vehicle_color` varchar(50) NOT NULL,
  `status` varchar(20) DEFAULT 'pending'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `vehicle_requested`
--

INSERT INTO `vehicle_requested` (`request_id`, `requested_by`, `brand`, `model`, `make_year`, `vehicle_color`, `status`) VALUES
(13, 'Shreyan Bhandari', 'Ford', 'Ranger', 2023, 'Black', 'pending'),
(14, 'Dhiraj Jha', 'BMW', 'I7', 2023, 'Grey', 'pending'),
(19, 'Porac Sharma', 'Rolls Royce', 'Phantom', 2022, 'Phantom Grey', 'pending');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `booking`
--
ALTER TABLE `booking`
  ADD PRIMARY KEY (`booking_id`);

--
-- Indexes for table `rental`
--
ALTER TABLE `rental`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `rental_vehicles`
--
ALTER TABLE `rental_vehicles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `ref_key` (`fullname`);

--
-- Indexes for table `vehicles`
--
ALTER TABLE `vehicles`
  ADD PRIMARY KEY (`vehicle_id`);

--
-- Indexes for table `vehicle_requested`
--
ALTER TABLE `vehicle_requested`
  ADD PRIMARY KEY (`request_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `booking`
--
ALTER TABLE `booking`
  MODIFY `booking_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `rental`
--
ALTER TABLE `rental`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `rental_vehicles`
--
ALTER TABLE `rental_vehicles`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `vehicles`
--
ALTER TABLE `vehicles`
  MODIFY `vehicle_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `vehicle_requested`
--
ALTER TABLE `vehicle_requested`
  MODIFY `request_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
