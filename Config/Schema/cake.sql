-- phpMyAdmin SQL Dump
-- version 3.4.10.1deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Aug 29, 2012 at 11:14 PM
-- Server version: 5.5.24
-- PHP Version: 5.3.10-1ubuntu3.2

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `cake`
--

-- --------------------------------------------------------

--
-- Table structure for table `recipe_ingredients`
--

CREATE TABLE IF NOT EXISTS `recipe_ingredients` (
  `id` char(36) NOT NULL,
  `ingredient` varchar(255) NOT NULL,
  `protein` decimal(8,4) NOT NULL,
  `carbohydrates` decimal(8,4) NOT NULL,
  `fiber` decimal(8,4) NOT NULL,
  `fat` decimal(8,4) NOT NULL,
  `measure` int(11) DEFAULT NULL,
  `type` int(11) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `ingredient` (`ingredient`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `recipe_method_steps`
--

CREATE TABLE IF NOT EXISTS `recipe_method_steps` (
  `id` char(36) NOT NULL,
  `recipe_id` char(36) NOT NULL,
  `order` int(2) NOT NULL,
  `description` text NOT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `recipe_id` (`recipe_id`),
  KEY `order` (`order`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `recipe_recipes`
--

CREATE TABLE IF NOT EXISTS `recipe_recipes` (
  `id` char(36) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `user_id` char(36) NOT NULL,
  `recipe_id` char(36) NOT NULL COMMENT 'Id of the recipe to fork from',
  `fork_date` datetime NOT NULL COMMENT 'Date last forked, maybe try to port changes to this recipe',
  `servings` int(2) NOT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `title` (`title`),
  KEY `user_id` (`user_id`,`recipe_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `recipe_recipe_ingredients`
--

CREATE TABLE IF NOT EXISTS `recipe_recipe_ingredients` (
  `recipe_id` char(36) NOT NULL,
  `ingredient_id` char(36) NOT NULL,
  `quantity` decimal(8,4) NOT NULL,
  PRIMARY KEY (`recipe_id`,`ingredient_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `recipe_users`
--

CREATE TABLE IF NOT EXISTS `recipe_users` (
  `id` char(36) NOT NULL,
  `forename` varchar(255) NOT NULL,
  `surname` varchar(255) NOT NULL,
  `email_address` varchar(255) NOT NULL,
  `activation_key` char(40) DEFAULT NULL,
  `password` char(40) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `email_address` (`email_address`),
  KEY `activation_key` (`activation_key`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
