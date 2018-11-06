-- phpMyAdmin SQL Dump
-- version 4.7.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Nov 06, 2018 at 04:50 PM
-- Server version: 5.6.38
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `technopl_sparshnews`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `user` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `isActive` smallint(6) NOT NULL,
  `isAdmin` smallint(6) NOT NULL,
  `roles` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `user`, `email`, `password`, `isActive`, `isAdmin`, `roles`) VALUES
(1, 'admin', 'admin@admin.com', '123456', 1, 1, 'ROLE_ADMIN');

-- --------------------------------------------------------

--
-- Table structure for table `api`
--

CREATE TABLE `api` (
  `id` int(11) NOT NULL,
  `api_key` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `api`
--

INSERT INTO `api` (`id`, `api_key`) VALUES
(1, '62aff5e676a5c89f4203ecd2ae6478c8');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `parent_id` int(11) DEFAULT NULL,
  `cat_name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `cat_icon` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `cat_image` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  `sort_order` int(11) NOT NULL,
  `imgsetter` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  `iconsetter` varchar(500) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `parent_id`, `cat_name`, `cat_icon`, `cat_image`, `sort_order`, `imgsetter`, `iconsetter`) VALUES
(1, NULL, 'Business', '', '/uploads/Lighthouse.jpg', 2, '', ''),
(2, NULL, 'Technology', '', '/uploads/Lighthouse.jpg', 3, '', ''),
(3, NULL, 'Most Popular', '', '/uploads/Lighthouse.jpg', 4, '', ''),
(4, NULL, 'Awards', '', '/uploads/Lighthouse.jpg', 5, '', ''),
(5, NULL, 'New Projects', '', '/uploads/Lighthouse.jpg', 6, '', ''),
(6, NULL, 'Thought for the day', '/uploads/Chrysanthemum.jpg', '/uploads/Chrysanthemum.jpg', 7, '', ''),
(7, NULL, 'Landmark', '', '/uploads/Lighthouse.jpg', 8, '', ''),
(8, NULL, 'Personality', '', '/uploads/Lighthouse.jpg', 9, '', ''),
(9, NULL, 'Share News', '', '/uploads/Lighthouse.jpg', 10, '', ''),
(10, 2, 'Gadgets', '', '/uploads/Lighthouse.jpg', 11, '', ''),
(11, NULL, 'Trending', '', '/uploads/Lighthouse.jpg', 1, '', ''),
(13, 1, 'demo2', 'D:\\xampp\\tmp\\phpCB33.tmp', 'D:\\xampp\\tmp\\phpCB22.tmp', 3, '', ''),
(14, NULL, 'demo2', 'D:\\xampp\\tmp\\php2DF4.tmp', 'D:\\xampp\\tmp\\php2DF3.tmp', 1, '', ''),
(15, NULL, 'demo', 'D:\\xampp\\tmp\\php11C4.tmp', 'D:\\xampp\\tmp\\php11C3.tmp', 1, '', ''),
(16, NULL, 'e', 'D:\\xampp\\tmp\\php657F.tmp', 'D:\\xampp\\tmp\\php657E.tmp', 2, '', ''),
(17, NULL, 'demo', 'D:\\xampp\\tmp\\php63B1.tmp', 'D:\\xampp\\tmp\\php63B0.tmp', 4, '', ''),
(18, NULL, 'demo', 'D:\\xampp\\tmp\\phpA739.tmp', 'IOT.jpg', 5, '', ''),
(19, NULL, 'sss', 'D:\\xampp\\tmp\\php1BBF.tmp', '/asim/COINCARE.png', 6, '', ''),
(20, NULL, 'dd', '/uploads/COINCARE2.png', '/uploads/IOT.jpg', 5, '', ''),
(21, 1, 'demodd234', '/uploads/IOT.jpg', '/uploads/IOT.jpg', 5, '', ''),
(22, 4, 'whatd', '/uploads/IOT.jpg', '/uploads/COINCARE2.png', 3, '/uploads/COINCARE2.png', '/uploads/IOT.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `id` int(11) NOT NULL,
  `name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `password` longtext COLLATE utf8_unicode_ci NOT NULL,
  `plain_pass` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `token` longtext COLLATE utf8_unicode_ci NOT NULL,
  `is_active` enum('active','inactive') COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`id`, `name`, `email`, `password`, `plain_pass`, `token`, `is_active`) VALUES
(1, 'Amit', 'amitc@technople.in', '$2y$10$9zHQboV1zAfzK1tz9iMd3O2ioN1CDs721TFTVayTPxtNekEyCPkwy', 'hi', '3ab2914713a3b981563c0684cad4479f', NULL),
(2, 'Aditya', 'aditya@gmail.com', '16fa8f66a0e48929d554287f070413a9', '', '', NULL),
(3, 'rr', 'amit@gmail.com', '16fa8f66a0e48929d554287f070413a9', '', '', NULL),
(4, 'Asim', 'asim@gmail.com', '16fa8f66a0e48929d554287f070413a9', '', '', NULL),
(5, 'Shashi', 'shashi@gmail.com', '16fa8f66a0e48929d554287f070413a9', '', '', NULL),
(6, 'girish', 'girish@gmail.com', '16fa8f66a0e48929d554287f070413a9', '', '', NULL),
(7, 'tushar', 'tushar@gmail.com', '16fa8f66a0e48929d554287f070413a9', '', '', NULL),
(8, 'dimple', 'dimple@gmail.com', '16fa8f66a0e48929d554287f070413a9', '', '', NULL),
(9, 'Devendra', 'devendra@gmail.com', '16fa8f66a0e48929d554287f070413a9', '', '', NULL),
(10, 'chetan', 'chetan@gmail.com', '16fa8f66a0e48929d554287f070413a9', '', '', NULL),
(11, 'pradeep', 'pradeep@gmail.com', '16fa8f66a0e48929d554287f070413a9', '', '', NULL),
(12, 'hiren', 'hiren@gmail.com', '16fa8f66a0e48929d554287f070413a9', '', '', NULL),
(13, 'kiran', 'kiran@gmail.com', '16fa8f66a0e48929d554287f070413a9', '', '', NULL),
(14, 'devendra', 'dev@gmail.com', '$2y$10$BVFLzlcu2.DuKtz/gzGwJOPogs5hm14SFRF4l3r0giRJgDadC.DIK', '123456', '', NULL),
(15, 'devendra', 'ds@gmail.com', '$2y$10$IXFvFhgSnBkc2c0xwnyQ6.40tpyrhlkmtlVm4BMmeHJvdu6V4nQa6', '123456', '', NULL),
(16, 'farhan', 'farhan@gmail.com', '16fa8f66a0e48929d554287f070413a9', 'pass-123', '', NULL),
(17, 'salmaan', 'salmaan@gmail.com', '$2y$13$CbXc1icsSPGQsRraADUYwuvG7L8DLSz91C7ECdKW6kAzBlHBMmpPK', 'pass-123', '', NULL),
(18, 'lalit', 'lalit@gmail.com', '$2y$13$L0HjtvAMfLILQRDG0XEnoeOysmfFHCItU3XxaauuQCR/L7wLlVz0u', 'pass-123', '', NULL),
(19, 'iyer', 'iyer@gmail.com', '$2y$13$PVkEhaywVsd8Wtx3E6gE.uDVZaAxAU9fb6txmGUi4MFpCtApxvuK2', 'pass-123', '', NULL),
(20, 'jigar', 'jigar@gmail.com', '$2y$13$r1r/3w/cEAc5KqJ2OLJZVeLwl51CxDhMqzENgKOjThKoWr4vjD/GS', 'pass-123', '', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

CREATE TABLE `news` (
  `id` int(11) NOT NULL,
  `news_category` int(11) DEFAULT NULL,
  `news_head` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `news_desc` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `news_cont` longtext COLLATE utf8_unicode_ci NOT NULL,
  `news_media` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  `status` varchar(600) COLLATE utf8_unicode_ci DEFAULT 'active',
  `created` datetime NOT NULL,
  `news_media_name` varchar(500) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `news`
--

INSERT INTO `news` (`id`, `news_category`, `news_head`, `news_desc`, `news_cont`, `news_media`, `status`, `created`, `news_media_name`) VALUES
(1, 2, 'Tech Head 1', 'Tech Desc 1', 'The open beta brings OnePlus Launcher v2.1 that supports dynamic icons for Weather and Calendar along with an added &#39;Home screen layout&#39; under launcher settings for grid and icon customizations. Not only will the grid layout stay irrespective of display size changes, but the 5 most recently-used apps will too be showcased on top in the app drawer.<br /> <br /> The update also makes it possible to recognise new-installed apps as they are now seen with a blue dot. It is also possible to access icon pack resources on the Google Play Store directly under launcher settings, according to a post on OnePlus forum. The user interface for the widgets too has been improved.', 'http://192.168.0.119/news/web/uploads/Lighthouse.jpg', 'active', '2017-06-30 05:12:00', ''),
(2, 2, 'Tech Head 2', 'Tech Desc 2', 'The oldest classical Greek and Latin writing had little or no space between words and could be written in boustrophedon (alternating directions). Over time, text direction (left to right) became standardized, and word dividers and terminal punctuation became common. The first way to divide sentences into groups was the original paragraphos, similar to an underscore at the beginning of the new group.[3] The Greek paragraphos evolved into the pilcrow (¶), which in English manuscripts in the Middle Ages can be seen inserted inline between sentences. The hedera leaf (e.g. ☙) has also been used in the same way.   Indented paragraphs demonstrated in the US Constitution In ancient manuscripts, another means to divide sentences into paragraphs was a line break (newline) followed by an initial at the beginning of the next paragraph. An initial is an oversized capital letter, sometimes outdented beyond the margin of the text. This style can be seen, for example, in the original Old English manuscript of Beowulf. Outdenting is still used in English typography, though not commonly.[4] Modern English typography usually indicates a new paragraph by indenting the first line. This style can be seen in the (handwritten) United States Constitution from 1787. For additional ornamentation, a hedera leaf or other symbol can be added to the inter-paragraph whitespace, or put in the indentation space.', 'http://192.168.0.119/news/web/uploads/Penguins.jpg', 'active', '2017-06-30 05:13:00', ''),
(3, 1, 'Business Head 1', 'Business Desc 1', 'Business Cont 1', 'http://192.168.0.119/news/web/uploads/Tulips.jpg', 'active', '2017-06-30 05:14:00', ''),
(4, 3, 'Most Popular Head 1', 'Most Popular Desc ', 'It’s important to note the distinction between a CMS and a customer relationship management tool, or a document management service (such as Microsoft SharePoint). Text editors are not CMS tools, for instance.\r\n\r\nContent Management Systems are web-based applications that are designed for the creation and updating of websites. They may have themes or plugins to extend functionality, and make the management of a website simple.\r\n\r\nWordPress remains popular for running a website, but other CMS solutions are available. Some of these might replicate WordPress’s “jack-of-all-trades” approach, while others may specialize. For instance, a portfolio-focused CMS might be ideal for artists; an audio-focused solution more suitable for musicians or podcasters.\r\n\r\nThese solutions all have their own strengths and benefits. Let’s see what’s available.\r\n\r\n\r\nThe following list of content management systems are free to download and use unless otherwise stated.', 'http://192.168.0.119/news/web/uploads/Lighthouse.jpg', 'active', '0000-00-00 00:00:00', ''),
(5, 4, 'Awards Head 1', 'Awards Desc 1', 'Awards can be given by any person or institution, although the prestige of an award usually depends on the status of the awarder. Usually, awards are given by an organization of some sort, or by the office of an official within an organization or government.[3] For instance, a special presidential citation (as given by the President of the United States) is a public announcement giving an official place of honor (e.g., President Ronald Reagan gave a special presidential citation in 1984 to the Disney Channel for its excellent children\'s television programming.)\r\n\r\nHowever, there are exceptions like some quality labels, for which it is neither person nor organizations that are rewarded, but products. This is the case for the World Quality Selections organized by Monde Selection. These international awards are assigned to beverages, foods, cosmetics and diet products, which stand out for their quality.[4]\r\n\r\nPeople who have won certain prestigious awards, such as the Nobel Prize, a championship title in a sport, or an Academy Award (Oscar), can have the award become their identity, thereafter being known primarily for winning the award, rather than for any other achievement or occupation.[citation needed] To distinctly be categorized as an \'Award\', rather than some other type of ceremonial or arbitrary recognition, there should be a clear process of nominations, award criteria, and appropriate judging process. Generally, recognition by a set of peers, acknowledging quality of work, rather than a \'popularity contest\' is considered to be an authentic award. Some prestigious and authentic awards include:', 'http://192.168.0.119/news/web/uploads/Lighthouse.jpg', 'active', '2017-07-06 00:00:00', ''),
(6, 5, 'New Project Head 1', 'New Project Desc 1', 'The word project comes from the Latin word projectum from the Latin verb proicere, \"before an action\" which in turn comes from pro-, which denotes precedence, something that comes before something else in time (paralleling the Greek πρό) and iacere, \"to do\". The word \"project\" thus originally meant \"before an action\".\r\n\r\nWhen the English language initially adopted the word, it referred to a plan of something, not to the act of actually carrying this plan out. Something performed in accordance with a project became known as an \"object\". Every project has certain phases of development.\r\n\r\nSpecific uses[edit]\r\n', 'http://192.168.0.119/news/web/uploads/Lighthouse.jpg', 'active', '2017-07-06 00:00:00', ''),
(7, 7, 'Landmark Head 1', 'Landmark Desc 1', 'A landmark is a recognizable natural or artificial feature used for navigation, a feature that stands out from its near environment and is often visible from long distances.\r\n\r\nIn modern use, the term can also be applied to smaller structures or features, that have become local or national symbols.', 'http://192.168.0.119/news/web/uploads/Lighthouse.jpg', 'active', '2017-07-06 05:00:00', ''),
(8, 8, 'Personality Head 1', 'Personality Desc 1', 'The theory of individual differences started from the concept of temperament suggested by Hippocrates and Galen. Hippocrates\' four humours gave rise to four temperaments.[5] The explanation was further refined by his successor Galen during the second century CE. The \"Four Humours\" theory held that a person\'s temperament was based on the balance of bodily humours; yellow bile, black bile, phlegm, and blood.[6] Choleric people were characterized as having an excess of yellow bile, making them irascible. High levels of black bile were held to induce melancholy, signified by a sombre, gloomy, pessimistic outlook. Phlegmatic people were thought to have an excess of phlegm, leading to their sluggish, calm temperaments. Finally, people thought to have high levels of blood were said to be sanguine and were characterized by their cheerful, passionate dispositions.[6]\r\n\r\nThere are debates between researchers of temperament and researchers of personality as to whether or not biologically-based differences define a concept of temperament or a part of personality. The presence of such differences in pre-cultural individuals (such as animals or young infants) suggests that they belong to temperament since personality is a socio-cultural concept. Researchers of adult temperament point out that, similarly to sex, age, and mental illness, temperament is based on biochemical systems whereas personality is a product of socialization of an individual possessing these four types of features. Temperament interacts with social-cultural factors, but still cannot be controlled or easily changed by these factors.[7][8][9][10] Modern theories of temperament converge to 12 components, all based on ensemble interaction between brain neurotransmitters.', 'http://192.168.0.119/news/web/uploads/Lighthouse.jpg', 'active', '2017-07-06 05:11:00', ''),
(9, 9, 'Share News Head 1', 'Share News Desc 1', 'News is information about current events. Journalists provide news through many different media, based on word of mouth, printing, postal systems, broadcasting, electronic communication, and also on their own testimony, as witnesses of relevant events.\r\n\r\nCommon topics for news reports include war, government, politics, education, health, the environment, economy, business, and entertainment, as well as athletic events, quirky or unusual events. Government proclamations, concerning royal ceremonies, laws, taxes, public health, criminals, have been dubbed news since ancient times.\r\n\r\nHumans exhibit a nearly universal desire to learn and share news, which they satisfy by talking to each other and sharing information. Technological and social developments, often driven by government communication and espionage networks, have increased the speed with which news can spread, as well as influenced its content. The genre of news as we know it today is closely associated with the newspaper, which originated in China as a court bulletin and spread, with paper and printing press, to Europe.', 'http://192.168.0.119/news/web/uploads/Lighthouse.jpg', 'active', '2017-07-06 05:14:00', ''),
(10, 11, 'Trending Head 1', 'Trending Desc 1', 'The show consists of a daily Trending Now top 5 video countdown that showcases the biggest viral videos of the day on YouTube. Throughout the week, different segments feature musical performances, packages featuring curated lists of videos on YouTube, and interviews with high profile celebrities and YouTube talent. Guests have included will.i.am, Larry King, Mark Cuban, Lisa Kudrow, Stan Lee, Kevin Smith, Jason Mewes, Burnie Burns, Drew Carey, iJustine, Spoken Reasons, Cimorelli, Kendrick Lamar, Talib Kweli, Big Sean, Jenna Marbles, Tony Hsieh, Dustin Lance Black, Jon Landeau, The Gregory Brothers, Antoine Dodson, Incubus, George Takei, Orlando Jones, Riff Raff, Skylar Grey, Danny Trejo, Felicia Day, Paul Scheer, Gilbert Gottfried, Cody Simpson, Snoop Dogg, Jon M. Chu, T.J. Miller, John Cena, Shaquille O\'Neal, Billy Corgan, Robert Rodriguez, Common, Chris Hardwick, Margaret Cho, Eve, Russell Simmons, Bobak Ferdowsi, Adam DeVine, Anders Holm, Blake Anderson, Dominic Monaghan, Pentatonix, Romany Malco, Mia Rose, Chelsea Kane and Greg Grunberg.[citation needed]', 'http://192.168.0.119/news/web/uploads/Lighthouse.jpg', 'active', '2017-07-06 05:18:00', ''),
(11, 10, 'Gadgets Head 1', 'Gadgets Desc 1', 'A gadget is a small[1] tool such as a machine that has a particular function, and is related to today\'s fast-advancing modern age technology to create such gadgets. Gadgets have a wide variety of functions and styles. All of these functions show the progressing advanced modern age. Gadgets are sometimes referred to as gizmos. Gizmos in particular are a bit different from gadgets.[citation needed] Gadgets in particular are small tools powered by electronic principles (a circuit board).', 'http://192.168.0.119/news/web/uploads/Lighthouse.jpg', 'active', '2017-07-06 05:17:00', ''),
(12, 2, 'dd', 'dd', 'ffdf', 'D:\\xampp\\tmp\\php5144.tmp', NULL, '2018-03-14 07:20:54', ''),
(13, 4, 'dd', 'dd', 'ffff', 'D:\\xampp\\tmp\\phpD033.tmp', NULL, '2018-03-14 07:22:32', ''),
(14, 14, 'dd', 'dwaff', 'szcvsdvgfg', '/uploads/IOT.jpg', NULL, '2018-03-14 07:29:45', ''),
(15, 5, 'ddeee', 'dwaff', 'fffff', '', 'active', '2018-03-14 07:31:03', ''),
(16, 5, 'some heading', 'siome description', 'some content', '/uploads/IOT.jpg', 'active', '2018-03-14 13:32:32', '/uploads/IOT.jpg'),
(17, 4, 'ff', 'fftty', 'fffffffffffffffffffffffff', '/uploads/Chrysanthemum.jpg', 'inactive', '2018-03-14 13:35:52', '/uploads/COINCARE2.png');

-- --------------------------------------------------------

--
-- Table structure for table `test`
--

CREATE TABLE `test` (
  `id` int(11) NOT NULL,
  `parent` int(11) DEFAULT NULL,
  `name` varchar(100) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `test`
--

INSERT INTO `test` (`id`, `parent`, `name`) VALUES
(1, NULL, 'Tech'),
(2, NULL, 'Blog'),
(3, NULL, 'Mobiles'),
(4, 2, 'Blog Child');

-- --------------------------------------------------------

--
-- Table structure for table `userapi`
--

CREATE TABLE `userapi` (
  `id` int(11) NOT NULL,
  `api_key` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `userapi`
--

INSERT INTO `userapi` (`id`, `api_key`, `user_id`) VALUES
(1, '5653750798449ea93fb1639c4c6d1c20', 1),
(2, '6f176cc9f9a647a9dd2187c3753a5781', 8),
(3, 'c193a177e9c378af806cb1aca6ec8890', 3),
(4, '1477a57b1295d66c5f209fdbcce41419', 9),
(5, '76986c7e2b2ff9e00ccaa7413f8ce227', 7),
(6, 'd47551167900f701df228a6166382043', 14),
(7, 'b053d0fe073b34fb78693abce7596bce', 15),
(8, '204c5d6ed44c2a0fef44b55f0459044d', 20);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `UNIQ_880E0D768D93D649` (`user`),
  ADD UNIQUE KEY `UNIQ_880E0D76E7927C74` (`email`);

--
-- Indexes for table `api`
--
ALTER TABLE `api`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_64C19C1727ACA70` (`parent_id`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_1DD399504F72BA90` (`news_category`);

--
-- Indexes for table `test`
--
ALTER TABLE `test`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_D87F7E0C3D8E604F` (`parent`);

--
-- Indexes for table `userapi`
--
ALTER TABLE `userapi`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `api`
--
ALTER TABLE `api`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
--
-- AUTO_INCREMENT for table `news`
--
ALTER TABLE `news`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT for table `test`
--
ALTER TABLE `test`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `userapi`
--
ALTER TABLE `userapi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `category`
--
ALTER TABLE `category`
  ADD CONSTRAINT `FK_64C19C1727ACA70` FOREIGN KEY (`parent_id`) REFERENCES `category` (`id`);

--
-- Constraints for table `news`
--
ALTER TABLE `news`
  ADD CONSTRAINT `FK_1DD399504F72BA90` FOREIGN KEY (`news_category`) REFERENCES `category` (`id`);

--
-- Constraints for table `test`
--
ALTER TABLE `test`
  ADD CONSTRAINT `FK_D87F7E0C3D8E604F` FOREIGN KEY (`parent`) REFERENCES `test` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
