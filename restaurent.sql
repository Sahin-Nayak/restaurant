-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 16, 2024 at 01:50 PM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 7.4.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `restaurent`
--

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `Code` varchar(20) NOT NULL,
  `Name` varchar(30) NOT NULL,
  `Rate` int(4) NOT NULL,
  `Img` varchar(100) NOT NULL,
  `Cust-id` varchar(100) NOT NULL,
  `Quantity` int(8) NOT NULL,
  `Category` varchar(100) NOT NULL,
  `SerialNo.` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `MsgId` int(254) NOT NULL,
  `Name` varchar(30) NOT NULL,
  `Email` varchar(40) NOT NULL,
  `Phone` int(10) NOT NULL,
  `Message` varchar(10000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `contact`
--

INSERT INTO `contact` (`MsgId`, `Name`, `Email`, `Phone`, `Message`) VALUES
(1, 'araya', 'araya@gmail.com', 987654321, 'hello'),
(3, 'Bivas', 'bivas123@gmail.com', 2147483647, 'Hi I am Bivas Roy');

-- --------------------------------------------------------

--
-- Table structure for table `customer_registration`
--

CREATE TABLE `customer_registration` (
  `C_Name` varchar(40) NOT NULL,
  `C_Email` varchar(50) NOT NULL,
  `Address` varchar(100) NOT NULL,
  `Phone` bigint(10) NOT NULL,
  `Password` varchar(16) NOT NULL,
  `Security_Ans` varchar(70) NOT NULL,
  `Category` varchar(20) NOT NULL,
  `Img` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customer_registration`
--

INSERT INTO `customer_registration` (`C_Name`, `C_Email`, `Address`, `Phone`, `Password`, `Security_Ans`, `Category`, `Img`) VALUES
('Ajay', 'ajay2323@gmail.com', 'laketown', 9876598787, 'ajay@234', 'laketown', 'Delivery Boy', 'img/soumyadip.jpg'),
('Arya', 'aka@gmail.com', 'everyones heart', 8336890387, 'Arya@123', 'ko', 'User', 'img/chef-1.jpg'),
('Anusree', 'anusree2323@gmail.com', 'fullbagan', 9876543290, 'anusree@234', 'fullbagan', 'User', 'img/soumyadip.jpg'),
('Araya', 'araya@gmail.com', 'bihar', 9087675467, 'araya@234', 'bihar', 'User', 'img/chef-1.jpg'),
('Bijay', 'bijay2323@gmail.com', 'ultodanga', 9876543876, 'bijay@234', 'ultodanga', 'Delivery Boy', 'img/soumyadip.jpg'),
('Soumyadip', 'biswajit2323@gmail.com', 'Baguiati', 9876543211, 'soumya@234', 'baguiati', 'User', 'img/IMG-20230615-WA0003.jpg'),
('Bibhas Roy', 'bivas123@gmail.com', 'Baguiati', 8907908790, 'bivas@123', 'Kolkata', 'User', 'img/about-2.jpg'),
('Jyoti Das', 'dasjyoti@gmail.com', 'Baranagar', 9087654321, 'jyoti@2002', 'baranagar', 'User', 'img/avatar.svg'),
('Sahin Nayak', 'nayaksahin123@gmail.com ', 'Baguiati Hatiara Sardarpara', 8336890356, 'sahin@2002', 'Baguiati Hatiara Sardarpara', 'User', 'img/self.jpg'),
('Sahin Nayak', 'nayaksahin2002@gmail.com ', '', 8336890358, 'Tapas@456', '', 'Admin', 'img/self.jpg'),
('Robi', 'robi2323@gmail.com', 'jorasako', 9876543987, 'robida@234', 'jorasako', 'Delivery Boy', 'img/soumyadip.jpg'),
('Sujay', 'sujay2323@gmail.com', 'Joramandir', 9876549309, 'sujay@234', 'joramandir', 'Delivery Boy', 'img/soumyadip.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `food-item`
--

CREATE TABLE `food-item` (
  `Code` varchar(20) NOT NULL,
  `Name` varchar(50) NOT NULL,
  `Category` varchar(60) DEFAULT NULL,
  `Rate` int(6) NOT NULL,
  `Img` varchar(70) NOT NULL,
  `Description` varchar(1000) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `food-item`
--

INSERT INTO `food-item` (`Code`, `Name`, `Category`, `Rate`, `Img`, `Description`) VALUES
('B100', 'Chicken Biryani', 'Biryani', 345, 'img/b1.png', 'Chicken Biryani is a savory chicken and rice dish that includes layers of chicken, rice, and aromatics that are steamed together. The bottom layer of rice absorbs all the chicken juices as it cooks, giving it a tender texture and rich flavor, while the top layer of rice turns out white and fluffy.'),
('B101', 'Chicken Special Biryani (2pcs)', 'Biryani', 485, 'img/b2.png', 'Chicken Special Biryani is a savory chicken and rice dish that includes layers of chicken, rice, and aromatics that are steamed together. The bottom layer of rice absorbs all the chicken juices as it cooks, giving it a tender texture and rich flavor, while the top layer of rice turns out white and fluffy.'),
('B102', 'Mutton Biryani ', 'Biryani', 345, 'img/b3.png', 'Mutton Biryani is a savory mutton and rice dish that includes layers of mutton, rice, and aromatics that are steamed together. The bottom layer of rice absorbs all the mutton juices as it cooks, giving it a tender texture and rich flavor, while the top layer of rice turns out white and fluffy.'),
('B103', 'Mutton Special Biryani (2pcs)', 'Biryani', 485, 'img/Chicken-Biryani.jpg', 'Mutton Special Biryani is a savory mutton and rice dish that includes layers of mutton, rice, and aromatics that are steamed together. The bottom layer of rice absorbs all the mutton juices as it cooks, giving it a tender texture and rich flavor, while the top layer of rice turns out white and fluffy.'),
('B104', 'Egg Biryani (2pcs)', 'Biryani', 235, 'img/b5.png', 'Egg Biryani is a savory egg and rice dish that includes layers of mutton, rice, and aromatics that are steamed together. The bottom layer of rice absorbs all the egg juices as it cooks, giving it a tender texture and rich flavor, while the top layer of rice turns out white and fluffy.'),
('B105', 'Soyabin Biryani ', 'Biryani', 200, 'img/about-img.png', 'Soyabin Biryani is a savory soyabin and rice dish that includes layers of soyabin, rice, and aromatics that are steamed together. The bottom layer of rice absorbs all the soyabin juices as it cooks, giving it a tender texture and rich flavor, while the top layer of rice turns out white and fluffy.'),
('B106', 'Extra Mutton Piece', 'Biryani', 200, 'img/about-img.png', 'You get extra 2 pieces extra mutton with your order.'),
('B107', 'Extra Chicken Piece', 'Biryani', 195, 'img/about-img.png', 'You get extra 2 pieces extra chicken with your order.'),
('B108', 'Extra Egg', 'Biryani', 40, 'img/about-img.png', 'You get extra 2 pieces extra egg with your order.'),
('B109', 'Extra Potato', 'Biryani', 30, 'img/about-img.png', 'You get extra 2 pieces extra potato with your order.'),
('B110', 'Mutton Handi Biryani', 'Handi', 589, 'img/about-img.png', 'Mutton Handi Biryani is a savory mutton and rice dish that includes layers of mutton, rice, and aromatics that are steamed together. The bottom layer of rice absorbs all the mutton juices as it cooks, giving it a tender texture and rich flavor, while the top layer of rice turns out white and fluffy.'),
('B111', 'Chicken Handi Biryani', 'Handi', 559, 'img/b1.png', 'Chicken Handi Biryani is a savory chicken and rice dish that includes layers of chicken, rice, and aromatics that are steamed together. The bottom layer of rice absorbs all the chicken juices as it cooks, giving it a tender texture and rich flavor, while the top layer of rice turns out white and fluffy.'),
('B112', 'Chicken Tikka Handi Biryani', 'Handi', 559, 'img/b1.png', 'Chicken Tikka Handi Biryani is a savory chicken and rice dish that includes layers of chicken, rice, and aromatics that are steamed together. The bottom layer of rice absorbs all the chicken juices as it cooks, giving it a tender texture and rich flavor, while the top layer of rice turns out white and fluffy.'),
('B99', 'Plain Rice With Egg', 'Rice', 50, 'img/about-icon-1.png', 'Plain Rice With Egg'),
('BE100', 'Minarel Water', 'Beverages', 35, 'img/b1.png', 'Chicken Biryani Is A Savory Chicken And Rice Dish That Includes Layers Of Chicken, Rice, And Aromatics That Are Steamed Together.'),
('BE101', 'Fresh Lime Soda', 'Beverages', 80, 'img/b1.png', 'Chicken Biryani Is A Savory Chicken And Rice Dish That Includes Layers Of Chicken, Rice, And Aromatics That Are Steamed Together.'),
('BE102', 'Soft Drinks', 'Beverages', 60, 'img/b1.png', 'Chicken Biryani Is A Savory Chicken And Rice Dish That Includes Layers Of Chicken, Rice, And Aromatics That Are Steamed Together.'),
('BE103', 'Masala Soft Drinks', 'Beverages', 90, 'img/b1.png', 'Chicken Biryani Is A Savory Chicken And Rice Dish That Includes Layers Of Chicken, Rice, And Aromatics That Are Steamed Together.'),
('BE104', 'Ghol', 'Beverages', 120, 'img/b1.png', 'Chicken Biryani Is A Savory Chicken And Rice Dish That Includes Layers Of Chicken, Rice, And Aromatics That Are Steamed Together.'),
('BR100', 'Aata Roti', 'Breads', 27, 'img/b1.png', 'Chicken Biryani Is A Savory Chicken And Rice Dish That Includes Layers Of Chicken, Rice, And Aromatics That Are Steamed Together. The Bottom Layer Of Rice Absorbs All The Chicken Juices As It Cooks,'),
('BR101', 'Butter Roti', 'Breads', 30, 'img/b1.png', 'Chicken Biryani Is A Savory Chicken And Rice Dish That Includes Layers Of Chicken, Rice, And Aromatics That Are Steamed Together. The Bottom Layer Of Rice Absorbs All The Chicken Juices As It Cooks,'),
('BR102', 'Butter Naan', 'Breads', 75, 'img/b1.png', 'Chicken Biryani Is A Savory Chicken And Rice Dish That Includes Layers Of Chicken, Rice, And Aromatics That Are Steamed Together. The Bottom Layer Of Rice Absorbs All The Chicken Juices As It Cooks,'),
('BR103', 'Plain Naan', 'Breads', 60, 'img/b1.png', 'Chicken Biryani Is A Savory Chicken And Rice Dish That Includes Layers Of Chicken, Rice, And Aromatics That Are Steamed Together. The Bottom Layer Of Rice Absorbs All The Chicken Juices As It Cooks,'),
('BR104', 'Plain Kulcha', 'Breads', 65, 'img/b1.png', 'Chicken Biryani Is A Savory Chicken And Rice Dish That Includes Layers Of Chicken, Rice, And Aromatics That Are Steamed Together. The Bottom Layer Of Rice Absorbs All The Chicken Juices As It Cooks,\r\n'),
('BR105', 'Masala Kulcha', 'Breads', 100, 'img/b1.png', 'Chicken Biryani Is A Savory Chicken And Rice Dish That Includes Layers Of Chicken, Rice, And Aromatics That Are Steamed Together. The Bottom Layer Of Rice Absorbs All The Chicken Juices As It Cooks,'),
('BR106', 'Garlic Naan', 'Breads', 85, 'img/b1.png', 'Chicken Biryani Is A Savory Chicken And Rice Dish That Includes Layers Of Chicken, Rice, And Aromatics That Are Steamed Together. The Bottom Layer Of Rice Absorbs All The Chicken Juices As It Cooks,'),
('BR107', 'Roomali Roti', 'Breads', 25, 'img/b1.png', 'Chicken Biryani Is A Savory Chicken And Rice Dish That Includes Layers Of Chicken, Rice, And Aromatics That Are Steamed Together. The Bottom Layer Of Rice Absorbs All The Chicken Juices As It Cooks,'),
('BR108', 'Tandoori Rooti', 'Breads', 25, 'img/b1.png', 'Chicken Biryani Is A Savory Chicken And Rice Dish That Includes Layers Of Chicken, Rice, And Aromatics That Are Steamed Together. The Bottom Layer Of Rice Absorbs All The Chicken Juices As It Cooks,'),
('C100', 'Special Mutton Curry (2pcs)', 'Curry_Non', 300, 'img/b1.png', 'Special Mutton Curry '),
('C101', 'Mutton Razela (1pcs)', 'Curry_Non', 255, 'img/b1.png', 'Mutton Razela'),
('C102', 'Chicken Razela (1pcs)', 'Curry_Non', 250, 'img/b1.png', 'Chicken Razela'),
('D100', 'Firni', 'Desserts', 85, 'img/b1.png', '	Chicken Biryani Is A Savory Chicken And Rice Dish That Includes Layers Of Chicken,'),
('D101', 'Shahi Firni', 'Desserts', 140, 'img/b1.png', '	Chicken Biryani Is A Savory Chicken And Rice Dish That Includes Layers Of Chicken,'),
('D102', 'Natural Ice Cream', 'Desserts', 180, 'img/b1.png', 'Chicken Biryani Is A Savory Chicken And Rice Dish That Includes Layers Of Chicken,'),
('D103', 'Ice Cream', 'Desserts', 130, 'img/b1.png', 'Chicken Biryani Is A Savory Chicken And Rice Dish That Includes Layers Of Chicken,'),
('D104', 'Kulfi', 'Desserts', 130, 'img/b1.png', 'Chicken Biryani Is A Savory Chicken And Rice Dish That Includes Layers Of Chicken,'),
('D105', 'Mihidana with Rabri', 'Desserts', 200, 'img/b1.png', 'Chicken Biryani Is A Savory Chicken And Rice Dish That Includes Layers Of Chicken,'),
('G100', 'Chicken Chap(1 pcs)', 'Gravy_Non', 245, 'img/b1.png', 'Chicken Biryani Is A Savory Chicken And Rice Dish That Includes Layers Of Chicken, Rice, And Aromatics That Are Steamed Together. The Bottom Layer Of Rice Absorbs All The Chicken Juices As It Cooks, Giving It A Tender Texture And Rich Flavor, While The Top Layer Of Rice Turns Out White And Fluffy.'),
('G101', 'Chicken Handi(boneless)', 'Gravy_Non', 250, 'img/b1.png', 'Chicken Biryani Is A Savory Chicken And Rice Dish That Includes Layers Of Chicken, Rice, And Aromatics That Are Steamed Together. The Bottom Layer Of Rice Absorbs All The Chicken Juices As It Cooks, Giving It A Tender Texture And Rich Flavor, While The Top Layer Of Rice Turns Out White And Fluffy.'),
('G102', 'Chicken Bharta(boneless)', 'Gravy_Non', 250, 'img/b1.png', 'Chicken Biryani Is A Savory Chicken And Rice Dish That Includes Layers Of Chicken, Rice, And Aromatics That Are Steamed Together. The Bottom Layer Of Rice Absorbs All The Chicken Juices As It Cooks, Giving It A Tender Texture And Rich Flavor, While The Top Layer Of Rice Turns Out White And Fluffy.'),
('G103', 'Chicken Resmi Butter Masala(6 pcs)', 'Gravy_Non', 360, 'img/b1.png', 'Chicken Biryani Is A Savory Chicken And Rice Dish That Includes Layers Of Chicken, Rice, And Aromatics That Are Steamed Together. The Bottom Layer Of Rice Absorbs All The Chicken Juices As It Cooks, Giving It A Tender Texture And Rich Flavor, While The Top Layer Of Rice Turns Out White And Fluffy.\r\n'),
('G104', 'Chicken Tikka Butter Masala(6 pcs)', 'Gravy_Non', 360, 'img/b1.png', 'Chicken Biryani Is A Savory Chicken And Rice Dish That Includes Layers Of Chicken, Rice, And Aromatics That Are Steamed Together. The Bottom Layer Of Rice Absorbs All The Chicken Juices As It Cooks, Giving It A Tender Texture And Rich Flavor, While The Top Layer Of Rice Turns Out White And Fluffy.'),
('G105', 'Mutton Chap(2 pcs)', 'Gravy_Non', 270, 'img/b1.png', 'Chicken Biryani Is A Savory Chicken And Rice Dish That Includes Layers Of Chicken, Rice, And Aromatics That Are Steamed Together. The Bottom Layer Of Rice Absorbs All The Chicken Juices As It Cooks, Giving It A Tender Texture And Rich Flavor, While The Top Layer Of Rice Turns Out White And Fluffy.'),
('G106', 'Mutton Handi(boneless)', 'Gravy_Non', 300, 'img/b1.png', 'Chicken Biryani Is A Savory Chicken And Rice Dish That Includes Layers Of Chicken, Rice, And Aromatics That Are Steamed Together. The Bottom Layer Of Rice Absorbs All The Chicken Juices As It Cooks, Giving It A Tender Texture And Rich Flavor, While The Top Layer Of Rice Turns Out White And Fluffy.'),
('G107', 'Mutton Kassa(2 pcs)', 'Gravy_Non', 260, 'img/b1.png', 'Chicken Biryani Is A Savory Chicken And Rice Dish That Includes Layers Of Chicken, Rice, And Aromatics That Are Steamed Together. The Bottom Layer Of Rice Absorbs All The Chicken Juices As It Cooks, Giving It A Tender Texture And Rich Flavor, While The Top Layer Of Rice Turns Out White And Fluffy.'),
('G108', 'Mutton Tawa Masala', 'Gravy_Non', 300, 'img/b1.png', 'Chicken Biryani Is A Savory Chicken And Rice Dish That Includes Layers Of Chicken, Rice, And Aromatics That Are Steamed Together. The Bottom Layer Of Rice Absorbs All The Chicken Juices As It Cooks, Giving It A Tender Texture And Rich Flavor, While The Top Layer Of Rice Turns Out White And Fluffy.'),
('K100', 'Chicken Tandoori(2 pcs)', 'Kebab', 270, 'img/b1.png', 'Chicken Biryani Is A Savory Chicken And Rice Dish That Includes Layers Of Chicken, Rice, And Aromatics That Are Steamed Together. The Bottom Layer Of Rice Absorbs All The Chicken Juices As It Cooks, Giving It A Tender Texture And Rich Flavor, While The Top Layer Of Rice Turns Out White And Fluffy.'),
('K101', 'Chicken Cheese Kebab(6 pcs)', 'Kebab', 465, 'img/b1.png', 'Chicken Biryani Is A Savory Chicken And Rice Dish That Includes Layers Of Chicken, Rice, And Aromatics That Are Steamed Together. The Bottom Layer Of Rice Absorbs All The Chicken Juices As It Cooks, Giving It A Tender Texture And Rich Flavor, While The Top Layer Of Rice Turns Out White And Fluffy.'),
('K102', 'Chicken Reshmi Kebab(6 pcs)', 'Kebab', 320, 'img/b1.png', 'Chicken Biryani Is A Savory Chicken And Rice Dish That Includes Layers Of Chicken, Rice, And Aromatics That Are Steamed Together. The Bottom Layer Of Rice Absorbs All The Chicken Juices As It Cooks, Giving It A Tender Texture And Rich Flavor, While The Top Layer Of Rice Turns Out White And Fluffy.'),
('K103', 'Chicken Seekh Kebab(6 pcs)', 'Kebab', 385, 'img/b1.png', 'Chicken Biryani Is A Savory Chicken And Rice Dish That Includes Layers Of Chicken, Rice, And Aromatics That Are Steamed Together. The Bottom Layer Of Rice Absorbs All The Chicken Juices As It Cooks, Giving It A Tender Texture And Rich Flavor, While The Top Layer Of Rice Turns Out White And Fluffy.'),
('K104', 'Chicken Malai Kebab(6 pcs)', 'Kebab', 350, 'img/b1.png', 'Chicken Biryani Is A Savory Chicken And Rice Dish That Includes Layers Of Chicken, Rice, And Aromatics That Are Steamed Together. The Bottom Layer Of Rice Absorbs All The Chicken Juices As It Cooks, Giving It A Tender Texture And Rich Flavor, While The Top Layer Of Rice Turns Out White And Fluffy.'),
('K105', 'Chicken Tikka Kebab(6 pcs)', 'Kebab', 320, 'img/b1.png', 'Chicken Biryani Is A Savory Chicken And Rice Dish That Includes Layers Of Chicken, Rice, And Aromatics That Are Steamed Together. The Bottom Layer Of Rice Absorbs All The Chicken Juices As It Cooks, Giving It A Tender Texture And Rich Flavor, While The Top Layer Of Rice Turns Out White And Fluffy.'),
('K106', 'Mutton Barrah Kebab(6 pcs)', 'Kebab', 499, 'img/b1.png', 'Chicken Biryani Is A Savory Chicken And Rice Dish That Includes Layers Of Chicken, Rice, And Aromatics That Are Steamed Together. The Bottom Layer Of Rice Absorbs All The Chicken Juices As It Cooks, Giving It A Tender Texture And Rich Flavor, While The Top Layer Of Rice Turns Out White And Fluffy.'),
('K107', 'Mutton Galawti Kebab Half(2 pcs)', 'Kebab', 240, 'img/b1.png', 'Chicken Biryani Is A Savory Chicken And Rice Dish That Includes Layers Of Chicken, Rice, And Aromatics That Are Steamed Together. The Bottom Layer Of Rice Absorbs All The Chicken Juices As It Cooks, Giving It A Tender Texture And Rich Flavor, While The Top Layer Of Rice Turns Out White And Fluffy.'),
('K108', 'Mutton Galawti Kebab Full(4 pcs)', 'Kebab', 420, 'img/b1.png', 'Chicken Biryani Is A Savory Chicken And Rice Dish That Includes Layers Of Chicken, Rice, And Aromatics That Are Steamed Together. The Bottom Layer Of Rice Absorbs All The Chicken Juices As It Cooks, Giving It A Tender Texture And Rich Flavor, While The Top Layer Of Rice Turns Out White And Fluffy.'),
('K109', 'Mutton Reshmi Kebab(6 pcs)', 'Kebab', 420, 'img/b1.png', 'Chicken Biryani Is A Savory Chicken And Rice Dish That Includes Layers Of Chicken, Rice, And Aromatics That Are Steamed Together. The Bottom Layer Of Rice Absorbs All The Chicken Juices As It Cooks, Giving It A Tender Texture And Rich Flavor, While The Top Layer Of Rice Turns Out White And Fluffy.'),
('K110', 'Tandoori Fish Tikka(6 pcs)', 'Kebab', 445, 'img/b1.png', 'Chicken Biryani Is A Savory Chicken And Rice Dish That Includes Layers Of Chicken, Rice, And Aromatics That Are Steamed Together. The Bottom Layer Of Rice Absorbs All The Chicken Juices As It Cooks, Giving It A Tender Texture And Rich Flavor, While The Top Layer Of Rice Turns Out White And Fluffy.'),
('K111', 'Fish Irani Kebab(6 pcs)', 'Kebab', 450, 'img/b1.png', 'Chicken Biryani Is A Savory Chicken And Rice Dish That Includes Layers Of Chicken, Rice, And Aromatics That Are Steamed Together. The Bottom Layer Of Rice Absorbs All The Chicken Juices As It Cooks, Giving It A Tender Texture And Rich Flavor, While The Top Layer Of Rice Turns Out White And Fluffy.'),
('M100', 'Jol Vora Sondesh(10 pcs)', 'Mithai', 200, 'img/b1.png', 'Chicken Biryani Is A Savory Chicken And Rice Dish That Includes Layers Of Chicken, Rice, And Aromatics That Are Steamed Together. The Bottom Layer Of Rice Absorbs All The Chicken Juices As It Cooks,'),
('M101', 'Rasogolla(5 pcs)', 'Mithai', 50, 'img/b1.png', 'Chicken Biryani Is A Savory Chicken And Rice Dish That Includes Layers Of Chicken, Rice, And Aromatics That Are Steamed Together. The Bottom Layer Of Rice Absorbs All The Chicken Juices As It Cooks,'),
('M102', 'Pantua(5 pcs)', 'Mithai', 50, 'img/b1.png', 'Chicken Biryani Is A Savory Chicken And Rice Dish That Includes Layers Of Chicken, Rice, And Aromatics That Are Steamed Together. The Bottom Layer Of Rice Absorbs All The Chicken Juices As It Cooks,'),
('M103', 'Jhilipi(10 pcs)', 'Mithai', 100, 'img/b1.png', 'Chicken Biryani Is A Savory Chicken And Rice Dish That Includes Layers Of Chicken, Rice, And Aromatics That Are Steamed Together. The Bottom Layer Of Rice Absorbs All The Chicken Juices As It Cooks,'),
('S100', 'Murgh Musallam', 'Speciality', 750, 'img/b1.png', 'Chicken Biryani Is A Savory Chicken And Rice Dish That Includes Layers Of Chicken, Rice, And Aromatics That Are Steamed Together. The Bottom Layer Of Rice Absorbs All The Chicken Juices As It Cooks, Giving It A Tender Texture And Rich Flavor, While The Top Layer Of Rice Turns Out White And Fluffy.'),
('S101', 'Raan-E-Sikandari', 'Speciality', 1200, 'img/b1.png', 'Chicken Biryani Is A Savory Chicken And Rice Dish That Includes Layers Of Chicken, Rice, And Aromatics That Are Steamed Together. The Bottom Layer Of Rice Absorbs All The Chicken Juices As It Cooks, Giving It A Tender Texture And Rich Flavor, While The Top Layer Of Rice Turns Out White And Fluffy.'),
('S102', 'Raan-E-Musallam', 'Speciality', 2500, 'img/b1.png', 'Chicken Biryani Is A Savory Chicken And Rice Dish That Includes Layers Of Chicken, Rice, And Aromatics That Are Steamed Together. The Bottom Layer Of Rice Absorbs All The Chicken Juices As It Cooks, Giving It A Tender Texture And Rich Flavor, While The Top Layer Of Rice Turns Out White And Fluffy.'),
('S103', 'Bakra Musallam(8 kg)', 'Speciality', 13500, 'img/b1.png', 'Chicken Biryani Is A Savory Chicken And Rice Dish That Includes Layers Of Chicken, Rice, And Aromatics That Are Steamed Together. The Bottom Layer Of Rice Absorbs All The Chicken Juices As It Cooks, Giving It A Tender Texture And Rich Flavor, While The Top Layer Of Rice Turns Out White And Fluffy.'),
('SA100', 'Onion Salad', 'Salad', 70, 'img/b1.png', 'it is a salad and here you can many of fruits.'),
('SA101', 'Green Salad', 'Salad', 70, 'img/b1.png', 'It a salad and here you get many of fruits.'),
('SA102', 'Mixed Raita', 'Salad', 85, 'img/b1.png', 'Its a salad and you get many of vegetables'),
('V100', 'Aloo Dum Banarsi', 'Veg_Sabzi', 240, 'img/b1.png', 'Chicken Biryani Is A Savory Chicken And Rice Dish That Includes Layers Of Chicken, Rice, And Aromatics That Are Steamed Together. The Bottom Layer Of Rice Absorbs All The Chicken Juices As It Cooks,'),
('V101', 'Navaratna Korma', 'Veg_Sabzi', 260, 'img/b1.png', 'Chicken Biryani Is A Savory Chicken And Rice Dish That Includes Layers Of Chicken, Rice, And Aromatics That Are Steamed Together. The Bottom Layer Of Rice Absorbs All The Chicken Juices As It Cooks,'),
('V102', 'Panner Do Payaza(8 pcs)', 'Veg_Sabzi', 260, 'img/b1.png', 'Chicken Biryani Is A Savory Chicken And Rice Dish That Includes Layers Of Chicken, Rice, And Aromatics That Are Steamed Together. The Bottom Layer Of Rice Absorbs All The Chicken Juices As It Cooks,'),
('V103', 'Panner Butter Masala(8 pcs)', 'Veg_Sabzi', 270, 'img/b1.png', 'Chicken Biryani Is A Savory Chicken And Rice Dish That Includes Layers Of Chicken, Rice, And Aromatics That Are Steamed Together. The Bottom Layer Of Rice Absorbs All The Chicken Juices As It Cooks,'),
('V104', 'Mix Veg', 'Veg_Sabzi', 240, 'img/b1.png', 'Chicken Biryani Is A Savory Chicken And Rice Dish That Includes Layers Of Chicken, Rice, And Aromatics That Are Steamed Together. The Bottom Layer Of Rice Absorbs All The Chicken Juices As It Cooks,'),
('V105', 'Lahori Aloo(6 pcs)', 'Veg_Sabzi', 240, 'img/b1.png', 'Chicken Biryani Is A Savory Chicken And Rice Dish That Includes Layers Of Chicken, Rice, And Aromatics That Are Steamed Together. The Bottom Layer Of Rice Absorbs All The Chicken Juices As It Cooks,');

-- --------------------------------------------------------

--
-- Table structure for table `gst`
--

CREATE TABLE `gst` (
  `GST` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `gst`
--

INSERT INTO `gst` (`GST`) VALUES
('19');

-- --------------------------------------------------------

--
-- Table structure for table `order`
--

CREATE TABLE `order` (
  `Serial No` int(100) NOT NULL,
  `Bill No` bigint(100) NOT NULL,
  `Names` varchar(500) NOT NULL,
  `Rate` bigint(6) NOT NULL,
  `Cust-id` varchar(100) NOT NULL,
  `Quantity` bigint(4) NOT NULL,
  `Category` varchar(100) NOT NULL,
  `O_Date` varchar(20) NOT NULL,
  `Status` varchar(50) NOT NULL,
  `D_Boy` varchar(100) NOT NULL,
  `D_Email` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `order`
--

INSERT INTO `order` (`Serial No`, `Bill No`, `Names`, `Rate`, `Cust-id`, `Quantity`, `Category`, `O_Date`, `Status`, `D_Boy`, `D_Email`) VALUES
(31, 1, 'Chicken Handi Biryani', 559, 'dasjyoti@gmail.com', 2, 'Handi', '18/04/2023', 'Delivered', 'Ajay', 'ajay2323@gmail.com'),
(32, 1, 'Chicken Razela (1pcs)', 250, 'dasjyoti@gmail.com', 4, 'Curry_Non', '18/04/2023', 'Delivered', 'Ajay', 'ajay2323@gmail.com'),
(33, 1, 'Green Salad', 70, 'dasjyoti@gmail.com', 1, 'Salad', '18/04/2023', 'Delivered', 'Ajay', 'ajay2323@gmail.com'),
(34, 1, 'Chicken Malai Kebab(6 pcs)', 350, 'dasjyoti@gmail.com', 1, 'Kebab', '18/04/2023', 'Delivered', 'Ajay', 'ajay2323@gmail.com'),
(35, 1, 'Fresh Lime Soda', 80, 'dasjyoti@gmail.com', 2, 'Beverages', '18/04/2023', 'Delivered', 'Ajay', 'ajay2323@gmail.com'),
(36, 1, 'Rasogolla(5 pcs)', 50, 'dasjyoti@gmail.com', 2, 'Mithai', '18/04/2023', 'Delivered', 'Ajay', 'ajay2323@gmail.com'),
(37, 2, 'Mutton Handi Biryani', 589, 'nayaksahin123@gmail.com', 1, 'Handi', '19/04/2023', 'Delivered', 'Ajay', 'ajay2323@gmail.com'),
(38, 2, 'Soft Drinks', 60, 'nayaksahin123@gmail.com', 1, 'Beverages', '19/04/2023', 'Delivered', 'Ajay', 'ajay2323@gmail.com'),
(39, 3, 'Chicken Biryani', 345, 'biswajit2323@gmail.com', 1, 'Biryani', '19/04/2023', 'Order Confirmed', 'No', 'No'),
(40, 3, 'Mutton Biryani ', 345, 'biswajit2323@gmail.com', 2, 'Biryani', '19/04/2023', 'Order Confirmed', 'No', 'No'),
(41, 4, 'Chicken Handi Biryani', 559, 'biswajit2323@gmail.com', 1, 'Handi', '19/04/2023', 'Order Confirmed', 'No', 'No'),
(42, 5, 'Chicken Tandoori(2 pcs)', 270, 'biswajit2323@gmail.com', 1, 'Kebab', '20/04/2023', 'Order Confirmed', 'No', 'No'),
(43, 6, 'Jol Vora Sondesh(10 pcs)', 200, 'bivas123@gmail.com', 3, 'Mithai', '28/07/2023', 'Order Confirmed', 'Sujay', 'sujay2323@gmail.com'),
(44, 7, 'Mutton Biryani ', 345, 'biswajit2323@gmail.com', 1, 'Biryani', '23/05/2024', 'Delivered', 'Ajay', 'ajay2323@gmail.com'),
(45, 7, 'Chicken Tandoori(2 pcs)', 270, 'biswajit2323@gmail.com', 1, 'Kebab', '23/05/2024', 'Delivered', 'Ajay', 'ajay2323@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `order_bill`
--

CREATE TABLE `order_bill` (
  `Bill No` int(100) NOT NULL,
  `Bill_Date` varchar(30) NOT NULL,
  `C_Email` varchar(90) NOT NULL,
  `C_Phone` bigint(11) NOT NULL,
  `T_Amount` bigint(10) NOT NULL,
  `G_Tax` int(11) NOT NULL,
  `Net_Amount` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `order_bill`
--

INSERT INTO `order_bill` (`Bill No`, `Bill_Date`, `C_Email`, `C_Phone`, `T_Amount`, `G_Tax`, `Net_Amount`) VALUES
(1, '18/04/2023', 'dasjyoti@gmail.com', 9087654321, 2798, 18, 3302),
(2, '19/04/2023', 'nayaksahin123@gmail.com', 8336890356, 649, 18, 766),
(3, '19/04/2023', 'biswajit2323@gmail.com', 9876543211, 1035, 18, 1221),
(4, '19/04/2023', 'biswajit2323@gmail.com', 9876543210, 559, 18, 660),
(5, '20/04/2023', 'biswajit2323@gmail.com', 9876543210, 270, 18, 319),
(6, '28/07/2023', 'bivas123@gmail.com', 8907908765, 600, 18, 708),
(7, '23/05/2024', 'biswajit2323@gmail.com', 9876543211, 615, 19, 732);

-- --------------------------------------------------------

--
-- Table structure for table `session`
--

CREATE TABLE `session` (
  `Email` varchar(40) NOT NULL,
  `Password` varchar(20) NOT NULL,
  `Category` varchar(20) NOT NULL,
  `Img` varchar(200) NOT NULL,
  `Ip` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `session`
--

INSERT INTO `session` (`Email`, `Password`, `Category`, `Img`, `Ip`) VALUES
('aka@gmail.com', 'Arya@123', 'User', 'img/chef-1.jpg', '::1');

-- --------------------------------------------------------

--
-- Table structure for table `table`
--

CREATE TABLE `table` (
  `Table No` int(2) NOT NULL,
  `Seats_No` int(4) NOT NULL,
  `12:00` varchar(2) NOT NULL,
  `14:00` varchar(2) NOT NULL,
  `16:00` varchar(2) NOT NULL,
  `18:00` varchar(2) NOT NULL,
  `20:00` varchar(2) NOT NULL,
  `22:00` varchar(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `table`
--

INSERT INTO `table` (`Table No`, `Seats_No`, `12:00`, `14:00`, `16:00`, `18:00`, `20:00`, `22:00`) VALUES
(1, 2, 'O', 'O', 'O', 'O', 'O', 'O'),
(2, 2, 'O', 'O', 'O', 'O', 'O', 'O'),
(3, 3, 'O', 'O', 'O', 'O', 'O', 'O'),
(4, 3, 'O', 'O', 'O', 'O', 'O', 'O'),
(5, 4, 'O', 'O', 'O', 'O', 'O', 'O'),
(6, 4, 'O', 'O', 'O', 'O', 'O', 'O'),
(7, 6, 'O', 'O', 'O', 'O', 'O', 'O'),
(8, 6, 'O', 'O', 'O', 'O', 'O', 'O'),
(9, 8, 'O', 'O', 'O', 'O', 'O', 'O'),
(10, 8, 'O', 'O', 'O', 'O', 'O', 'O');

-- --------------------------------------------------------

--
-- Table structure for table `table_booking`
--

CREATE TABLE `table_booking` (
  `Book No` int(11) NOT NULL,
  `C_Name` varchar(100) NOT NULL,
  `Date` varchar(20) NOT NULL,
  `Time` varchar(20) NOT NULL,
  `C_Email` varchar(100) NOT NULL,
  `Phone` bigint(10) NOT NULL,
  `Person No` int(4) NOT NULL,
  `Table_No` int(100) NOT NULL,
  `Table Seater` varchar(10) NOT NULL,
  `Booking_Time` varchar(15) NOT NULL,
  `Status` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `table_booking`
--

INSERT INTO `table_booking` (`Book No`, `C_Name`, `Date`, `Time`, `C_Email`, `Phone`, `Person No`, `Table_No`, `Table Seater`, `Booking_Time`, `Status`) VALUES
(65, 'sahin nayak', '23-05-24', '05:38:18', 'biswajit2323@gmail.com', 3336890358, 2, 1, '2 . seater', '14:00', 'Confirmed');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`SerialNo.`);

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`MsgId`);

--
-- Indexes for table `customer_registration`
--
ALTER TABLE `customer_registration`
  ADD PRIMARY KEY (`C_Email`),
  ADD UNIQUE KEY `Phone` (`Phone`);

--
-- Indexes for table `food-item`
--
ALTER TABLE `food-item`
  ADD PRIMARY KEY (`Code`),
  ADD UNIQUE KEY `Name` (`Name`);

--
-- Indexes for table `gst`
--
ALTER TABLE `gst`
  ADD PRIMARY KEY (`GST`);

--
-- Indexes for table `order`
--
ALTER TABLE `order`
  ADD PRIMARY KEY (`Serial No`);

--
-- Indexes for table `order_bill`
--
ALTER TABLE `order_bill`
  ADD PRIMARY KEY (`Bill No`);

--
-- Indexes for table `session`
--
ALTER TABLE `session`
  ADD PRIMARY KEY (`Email`);

--
-- Indexes for table `table`
--
ALTER TABLE `table`
  ADD PRIMARY KEY (`Table No`);

--
-- Indexes for table `table_booking`
--
ALTER TABLE `table_booking`
  ADD PRIMARY KEY (`Book No`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `SerialNo.` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=82;

--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `MsgId` int(254) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `order`
--
ALTER TABLE `order`
  MODIFY `Serial No` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT for table `table`
--
ALTER TABLE `table`
  MODIFY `Table No` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `table_booking`
--
ALTER TABLE `table_booking`
  MODIFY `Book No` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=66;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
