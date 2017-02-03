DROP TABLE IF EXISTS `movies`;
CREATE TABLE `movies` (
  `id` int(11) NOT NULL,
  `netflix_id` int(11) NOT NULL,
  `show_title` varchar(255) NOT NULL,
  `release_year` int(4) NOT NULL,
  `category` varchar(30) NOT NULL,
  `director` varchar(30) NOT NULL,
  `show_cast` text NOT NULL,
  `summary` text NOT NULL,
  `poster` varchar(255) NOT NULL,
  `runtime` varchar(20) NOT NULL,
  `rating` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


ALTER TABLE `movies`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `netflix_id` (`netflix_id`);

ALTER TABLE `movies`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;