-- phpMyAdmin SQL Dump
-- version 3.3.9
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Mar 13, 2011 at 02:05 PM
-- Server version: 5.5.8
-- PHP Version: 5.3.5

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `paypal`
--

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE IF NOT EXISTS `products` (
  `pid` int(11) NOT NULL AUTO_INCREMENT,
  `product` varchar(255) NOT NULL,
  `product_img` varchar(100) DEFAULT NULL,
  `price` int(11) DEFAULT NULL,
   `currency` varchar(10) DEFAULT 'USD',
  PRIMARY KEY (`pid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`pid`, `product`, `product_img`, `price`) VALUES
(1, 'White T-Shirt', 'white.png', 22),
(2, 'Black T-Shirt', 'black.png', 30);

-- --------------------------------------------------------

--
-- Table structure for table `sales`
--

CREATE TABLE IF NOT EXISTS `sales` (
  `sid` int(11) NOT NULL AUTO_INCREMENT,
  `pid` int(11) DEFAULT NULL,
  `uid` int(11) DEFAULT NULL,
  `saledate` date DEFAULT NULL,
  `transactionid` varchar(125),
  PRIMARY KEY (`sid`),
  KEY `pid` (`pid`),
  KEY `uid` (`uid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

--
-- Dumping data for table `sales`
--

INSERT INTO `sales` (`sid`, `pid`, `uid`, `saledate`) VALUES
(1, 2, 1, '0000-00-00'),
(2, 2, 1, '0000-00-00'),
(3, 1, 1, '0000-00-00'),
(6, 2, 1, '2011-03-13'),
(7, 2, 1, '2011-03-13'),
(8, 2, 1, '2011-03-13'),
(9, 2, 1, '2011-03-13'),
(10, 2, 1, '2011-03-13'),
(11, 1, 1, '2011-03-13');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `uid` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`uid`),
  UNIQUE KEY `username` (`username`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`uid`, `username`, `password`, `email`) VALUES
(1, 'demo', 'demo', NULL);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `sales`
--
ALTER TABLE `sales`
  ADD CONSTRAINT `sales_ibfk_1` FOREIGN KEY (`pid`) REFERENCES `products` (`pid`),
  ADD CONSTRAINT `sales_ibfk_2` FOREIGN KEY (`uid`) REFERENCES `users` (`uid`);
