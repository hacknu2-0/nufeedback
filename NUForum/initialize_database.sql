CREATE DATABASE sampledb;
USE sampledb;


CREATE TABLE `threads` (
  `Creator` varchar(30) NOT NULL,
  `IsMainThread` int(1) NOT NULL,
  `Time` datetime NOT NULL,
  `Topic` varchar(30) NOT NULL,
  `Title` varchar(30) NOT NULL,
  `Text` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;




CREATE TABLE `users` (
  `username` varchar(30) NOT NULL,
  `email` varchar(40) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

