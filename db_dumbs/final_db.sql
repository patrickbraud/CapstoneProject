-- phpMyAdmin SQL Dump
-- version 4.3.10
-- http://www.phpmyadmin.net
--
-- Host: localhost:3306
-- Generation Time: Dec 01, 2015 at 06:41 AM
-- Server version: 5.5.42
-- PHP Version: 5.6.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `ttu cs blog`
--

-- --------------------------------------------------------

--
-- Table structure for table `answers`
--

CREATE TABLE `answers` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `blog_post_id` int(11) NOT NULL,
  `post` varchar(255) NOT NULL,
  `date_posted` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `answers`
--

INSERT INTO `answers` (`id`, `user_id`, `blog_post_id`, `post`, `date_posted`) VALUES
(12, 6, 8, 'dsaf', '2015-10-22'),
(13, 1, 9, 'asdfadf', '2015-10-22'),
(14, 1, 10, 'answer', '2015-10-22'),
(15, 1, 11, 'dafdafdfaffdsdffsdfdsfdsdfsdfs', '2015-10-22'),
(16, 6, 12, 'test', '2015-10-22'),
(17, 0, 32, 'dsf', '2015-11-04'),
(18, 6, 36, 'doesnt?', '2015-11-04'),
(19, 6, 37, 'dasfadsfadfhfdahfhfgga', '2015-11-04'),
(20, 1, 39, '1042', '2015-11-04'),
(21, 1, 42, 'adsfsdf', '2015-11-04'),
(22, 1, 50, 'Start learning the language is a good start.', '2015-11-05'),
(23, 1, 51, 'Yeah there is one in progress in this class dummy.', '2015-11-05'),
(24, 1, 52, 'ans', '2015-11-05'),
(25, 1, 53, 'daf', '2015-11-05'),
(26, 6, 54, 'dfa', '2015-11-12');

-- --------------------------------------------------------

--
-- Table structure for table `blog_posts`
--

CREATE TABLE `blog_posts` (
  `id` int(11) NOT NULL,
  `title` varchar(255) CHARACTER SET utf8 NOT NULL,
  `post` text CHARACTER SET utf8 NOT NULL,
  `marked` int(11) NOT NULL,
  `category` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `date_posted` date NOT NULL,
  `correctAnswerId` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=58 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `blog_posts`
--

INSERT INTO `blog_posts` (`id`, `title`, `post`, `marked`, `category`, `user_id`, `date_posted`, `correctAnswerId`) VALUES
(8, 'What is the internet?', 'I am unsure what the internet is..', 0, 11, 6, '2015-10-22', 12),
(9, 'dfa', 'adsf', 0, 7, 6, '2015-10-22', 13),
(10, 'klklhklkl', 'asdf', 0, 8, 1, '2015-10-22', 14),
(11, 'asdf', 'asdf', 0, 8, 1, '2015-10-22', 15),
(12, 'test', 'test', 0, 8, 1, '2015-10-22', 0),
(13, 'how do I program', 'how?', 0, 19, 1, '2015-10-22', 0),
(14, 'kljdsajlkdf', 'dajkladfljkfda', 0, 10, 1, '2015-10-22', 0),
(15, 'dsadfs', 'dfdfdsadfgaggs', 0, 10, 6, '2015-10-22', 0),
(16, 'dsfadsf', 'fdasfdasfaadfs', 0, 10, 1, '2015-10-22', 0),
(17, 'work', 'please', 0, 10, 1, '2015-10-22', 0),
(18, 'asdf', 'asdf', 0, 10, 1, '2015-10-22', 0),
(19, 'adf', 'asdf', 0, 10, 1, '2015-10-22', 0),
(20, 'work', 'around\r\n', 0, 10, 1, '2015-10-22', 0),
(21, 'asdf', 'asdfasd', 0, 10, 1, '2015-10-22', 0),
(22, 'yyeah', 'dasfdf', 0, 10, 1, '2015-10-22', 0),
(23, 'dsfa', 'adsfa', 0, 10, 1, '2015-10-22', 0),
(24, 'dsf', 'dasf', 0, 10, 1, '2015-10-22', 0),
(25, 'adsf', 'adsf', 0, 10, 1, '2015-10-22', 0),
(26, 'adsf', 'adsf', 0, 10, 1, '2015-10-22', 0),
(27, 'sd', 'adsf', 0, 10, 1, '2015-10-22', 0),
(28, 'adsf', 'dasf', 0, 10, 1, '2015-10-22', 0),
(29, 'adsf', 'dafs', 0, 10, 1, '2015-10-22', 0),
(30, 'adsf', 'dsaf', 0, 10, 1, '2015-10-22', 0),
(31, 'daf', 'dafs', 0, 10, 1, '2015-10-22', 0),
(32, 'make post', 'most post', 0, 8, 1, '2015-11-04', 0),
(33, 'What does it mean to CPU?', '5654561', 0, 8, 1, '2015-11-04', 0),
(34, 'jkasdjklafjl', 'kljsdfkljasdflk;ja', 0, 8, 1, '2015-11-04', 0),
(35, 'sfdgsf', 'sfdgs', 0, 8, 1, '2015-11-04', 0),
(36, '1050', 'what should it be now?', 0, 7, 1, '2015-11-04', 18),
(37, '1046', 'dafdsfdadf', 0, 7, 1, '2015-11-04', 19),
(38, '94', 'sfdgs', 0, 7, 6, '2015-11-04', 0),
(39, '88', '9879', 0, 7, 6, '2015-11-04', 20),
(40, 'What is a robot?', 'I have no clue what a robot is.', 0, 20, 1, '2015-11-04', 0),
(41, 'test', 'search testing', 1, 9, 1, '2015-11-04', 0),
(42, 'How do I do this one thing in Photoshop?', 'Hey Guys!\r\n\r\nI want to get rid of my beer keg belly and turn it into a six pack, how do I do this? Please and thank you.', 0, 10, 6, '2015-11-04', 0),
(43, 'dggfgdsd', 'dsggdadgas', 0, 8, 1, '2015-11-04', 0),
(44, 'adadgsdgadgagda', 'dgsagdasgdsgdgds', 0, 8, 1, '2015-11-04', 0),
(45, 'adagdsgdaagdgads', 'dgsgdasagdsagdadgs', 0, 8, 1, '2015-11-04', 0),
(46, 'asdgdadgadgsgds', 'dgsagdgdgds', 0, 8, 1, '2015-11-04', 0),
(47, 'What is big data?', 'What is big data?', 0, 8, 1, '2015-11-05', 0),
(48, 'What is the differences between x86 and x64 CPUs?', 'Can someone please explain the differences?', 0, 9, 1, '2015-11-05', 0),
(49, 'Transport Layer..', 'What is it for?', 0, 11, 6, '2015-11-05', 0),
(50, 'I need help with prolog..', 'Where do I being?', 1, 7, 6, '2015-11-05', 0),
(51, 'I need a encryption website.', 'Does such a website exists where I can securely upload my files? ', 0, 14, 6, '2015-11-05', 0),
(52, 'new post', 'new post', 0, 8, 7, '2015-11-05', 24),
(53, 'eqw', 'adf', 1, 31, 7, '2015-11-05', 25),
(54, 'This is a Staff Only Bored', 'This is a test', 0, 30, 1, '2015-11-12', 0),
(55, 'new post', 'new post', 0, 8, 0, '2015-11-12', 0),
(56, 'df', 'dfa', 0, 31, 0, '2015-11-12', 0),
(57, 'dasf', 'adsf', 0, 30, 6, '2015-11-12', 0);

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `view` int(11) NOT NULL,
  `comment` int(11) NOT NULL,
  `post` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=32 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `view`, `comment`, `post`) VALUES
(7, 'AI', -1, 0, 0),
(8, 'Big Data', -1, 0, 0),
(9, 'Computer Architecture', -1, 0, 0),
(10, 'Computer Graphics', -1, 0, 0),
(11, 'Computer Networks', -1, 0, 0),
(12, 'Data Structures', -1, 0, 0),
(13, 'Discrete Mathematics', -1, 0, 0),
(14, 'File Sharing', -1, 0, 0),
(15, 'Hacking', -1, 0, 0),
(16, 'History of Computer Science', -1, 0, 0),
(17, 'Human Computer Interaction', -1, 0, 0),
(18, 'Machine Learning', -1, 0, 0),
(19, 'Programming', -1, 0, 0),
(20, 'Robotics', -1, 0, 0),
(21, 'Security', -1, 0, 0),
(22, 'Software Engineering', -1, 0, 0),
(23, 'Theory of Computation', -1, 0, 0),
(30, 'Faculty', 0, 1, 1),
(31, 'Admin', 2, 2, 2);

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` int(11) NOT NULL,
  `name` varchar(255) CHARACTER SET utf8 NOT NULL,
  `action` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` int(11) NOT NULL,
  `name` varchar(255) CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `role_permissions`
--

CREATE TABLE `role_permissions` (
  `id` int(11) NOT NULL,
  `role_id` int(11) NOT NULL,
  `permission_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `first_name` varchar(255) CHARACTER SET utf8 NOT NULL,
  `last_name` varchar(255) CHARACTER SET utf8 NOT NULL,
  `email` varchar(255) CHARACTER SET utf8 NOT NULL,
  `password` varchar(255) CHARACTER SET utf8 NOT NULL,
  `role_id` int(11) NOT NULL,
  `points` int(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `first_name`, `last_name`, `email`, `password`, `role_id`, `points`) VALUES
(0, 'James', 'Little', 'james.little@ttu.edu', '9a3c8dcdc6c4f6ba3930245ccafc40e2', 2, 982),
(6, 'another', 'user', 'james.another@ttu.edu', '9a3c8dcdc6c4f6ba3930245ccafc40e2', 1, 50),
(7, 'one', 'q', 'myuser@ttu.edu', '9a3c8dcdc6c4f6ba3930245ccafc40e2', 0, 80);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `answers`
--
ALTER TABLE `answers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `blog_posts`
--
ALTER TABLE `blog_posts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `role_permissions`
--
ALTER TABLE `role_permissions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `answers`
--
ALTER TABLE `answers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=27;
--
-- AUTO_INCREMENT for table `blog_posts`
--
ALTER TABLE `blog_posts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=58;
--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=32;
--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `role_permissions`
--
ALTER TABLE `role_permissions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
