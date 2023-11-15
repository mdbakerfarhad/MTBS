-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 31, 2023 at 03:48 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `movie`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_info`
--

CREATE TABLE `admin_info` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `verified` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin_info`
--

INSERT INTO `admin_info` (`id`, `email`, `password`, `verified`) VALUES
(1, 'admin@xyz.com', '1', 1);

-- --------------------------------------------------------

--
-- Table structure for table `all_movie_info`
--

CREATE TABLE `all_movie_info` (
  `id` int(2) NOT NULL,
  `name` varchar(30) DEFAULT NULL,
  `item` varchar(255) DEFAULT NULL,
  `rating` decimal(2,1) DEFAULT NULL,
  `visibility` varchar(12) DEFAULT NULL,
  `runtime` varchar(6) DEFAULT NULL,
  `release` varchar(16) DEFAULT NULL,
  `about` mediumtext DEFAULT NULL,
  `cast` mediumtext DEFAULT NULL,
  `movie_image` varchar(255) DEFAULT NULL,
  `genre` int(1) DEFAULT NULL,
  `trailer` mediumtext DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `all_movie_info`
--

INSERT INTO `all_movie_info` (`id`, `name`, `item`, `rating`, `visibility`, `runtime`, `release`, `about`, `cast`, `movie_image`, `genre`, `trailer`) VALUES
(3, 'Black Panther: Wakanda Forever', '0003', '6.8', 'upcomingshow', '2h 41m', 'November 11,2022', 'Black Panther: Wakanda Forever is a 2022 American superhero film based on Marvel Comics featuring the character Shuri / Black Panther. Produced by Marvel Studios and distributed by Walt Disney Studios Motion Pictures, it is the sequel to Black Panther (2018) and the 30th film in the Marvel Cinematic Universe (MCU). Directed by Ryan Coogler, who co-wrote the screenplay with Joe Robert Cole, the film stars Letitia Wright as Shuri / Black Panther, alongside Lupita Nyong\'o, Danai Gurira, Winston Duke, Florence Kasumba, Dominique Thorne, Michaela Coel, Mabel Cadena, Tenoch Huerta Mej?a, Martin Freeman, Julia Louis-Dreyfus, and Angela Bassett. In the film, the leaders of Wakanda fight to protect their nation in the wake of King T\'Challa\'s death. Ideas for a sequel began after the release of Black Panther in February 2018. Coogler negotiated to return as director in the following months, and Marvel Studios officially confirmed the sequel\'s development in mid-2019. Plans for the film changed in August 2020 when Black Panther star Chadwick Boseman died from colon cancer, with Marvel choosing not to recast his role of T\'Challa. The return of other main cast members from the first film was confirmed that November, and the title was announced in May 2021. Filming began in late June 2021 in Atlanta, taking place at both Trilith Studios and Tyler Perry Studios, before moving to Massachusetts in August, but was halted in November to allow Wright to recover from an injury sustained during filming. It resumed by mid-January 2022 and wrapped in late March in Puerto Rico. Black Panther: Wakanda Forever premiered at the El Capitan Theatre and the Dolby Theatre in Hollywood, Los Angeles, on October 26, 2022, and was released in the United States on November 11, as the final film in Phase Four of the MCU. The film received generally positive reviews from critics, who praised the tributes to Boseman, the music, and the performances of Bassett, Huerta, and Wright, but criticized the runtime. It grossed $859.2 million worldwide, becoming the sixth highest-grossing film of 2022. Wakanda Forever and Bassett\'s performance received numerous awards and nominations, including five Academy Awards (winning Costume Design), one British Academy Film Award, six Critics\' Choice Movie Awards (winning two), two Golden Globe Awards (winning one), and two Screen Actors Guild Awards.', 'Daniel Craig, Edward Norton, Kate Hudson, Dave Bautista', 'movie.jpg', 3, '<iframe width=\"100%\" height=\"500\"  src=\"https://www.youtube.com/embed/RlOB3UALvrQ?si=aZrNaqWIjSWwoc1j\" title=\"YouTube video player\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share\" allowfullscreen></ifram'),
(4, 'Uncharted', '0004', '6.3', 'upcomingshow', '1h 56m', 'February 18,2022', 'Uncharted is a 2022 American action-adventure film directed by Ruben Fleischer from a screenplay by Rafe Lee Judkins, Art Marcum, and Matt Holloway, based on the video game franchise of the same name developed by Naughty Dog and published by Sony Interactive Entertainment. It stars Tom Holland as Nathan Drake and Mark Wahlberg as Victor Sullivan, with Sophia Ali, Tati Gabrielle, and Antonio Banderas in supporting roles. In the film, Drake is recruited by Sullivan in a race against corrupt billionaire Santiago Moncada (Banderas) and mercenary leader Jo Braddock (Gabrielle) to locate the fabled treasure of the Magellan expedition. The film entered development in 2008 with producer Avi Arad stating that he would be working with Sony Pictures to develop a film adaptation of the video game franchise. It was then in development hell with various directors, screenwriters, and lead cast members attached at various points. Filmmakers David O. Russell, Neil Burger, Seth Gordon, Dan Trachtenberg, Shawn Levy, and Travis Knight were initially signed to direct while Wahlberg was set to play Drake in early development. Holland was cast as Drake in May 2017 and Fleischer was hired as the director in early 2020. Filming began in March 2020, but was halted by the COVID-19 pandemic. It resumed in July and finished in October, with locations including Boston, Barcelona, New York City, and Kiamba. Originally set to be released on December 18, 2020, the film faced major delays due to the COVID-19 pandemic. It eventually premiered at the Coliseum in Barcelona on February 7, 2022, and was theatrically released in the United States by Sony Pictures Releasing on February 18. The film received mixed reviews from critics, who found it to be underwhelming compared to other adventure films, but the action sequences and Holland\'s performance were praised. The film grossed $401.7 million worldwide, making it the sixth-highest-grossing video game film of all time.', 'Tom Holland, Mark Wahlberg, Antonio Banderas, Sophia Ali', 'movie.jpg', 1, '<iframe width=\"100%\" height=\"500\" src=\"https://www.youtube.com/embed/eHp3MbsCbMg?si=kv7ESk2Zgtv6B_Dv\" title=\"YouTube video player\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share\" allowfullscreen></iframe'),
(5, 'M3gan', '0005', '6.4', 'nowshowing', '1h 42m', 'January 6,2023', 'M3GAN (pronounced \"Megan\") is a 2022 American science fiction horror film directed by Gerard Johnstone. It was written by Akela Cooper from a story by Cooper and James Wan (who also produced with Jason Blum). Allison Williams and Violet McGraw star, Amie Donald physically portrays M3GAN, and Jenna Davis voices the character. Its plot follows an artificially intelligent doll, who develops self-awareness and becomes hostile toward anyone who comes between her and her human companion. M3GAN premiered in Los Angeles on December 7, 2022, and Universal Pictures theatrically released it in the United States on January 6, 2023. The film grossed over $181 million worldwide against a budget of $12 million and received praise from critics for its campy blend of horror and humor. A sequel, titled M3GAN 2.0, is scheduled to be released on January 17, 2025; Williams and McGraw will reprise their roles, and Cooper will return to write the script. Johnstone is also in talks to return as director.', 'Jenna Davis, Amie Donald, Allison Williams, Violet McGraw', 'movie.jpg', 4, '<iframe width=\"100%\" height=\"500\" src=\"https://www.youtube.com/embed/ysgHwnT476Q?si=Ja0EuNAjz9Obl9OT\" title=\"YouTube video player\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share\" allowfullscreen></iframe'),
(6, 'Black Adam', '0006', '6.5', 'nowshowing', '2h 5m', 'October 21,2022', 'Black Adam is a 2022 American superhero film based on the DC character of the same name. Produced by New Line Cinema, DC Films, Seven Bucks Productions, and FlynnPictureCo. and distributed by Warner Bros. Pictures, it is a spin-off to Shazam! (2019) and the 11th film in the DC Extended Universe (DCEU). The film was directed by Jaume Collet-Serra and written by Adam Sztykiel and the writing team of Rory Haines and Sohrab Noshirvani. It stars Dwayne Johnson as Teth-Adam / Black Adam, an ancient superhuman who is released from his magic imprisonment by a group of archeologists to free the nation of Kahndaq from the crime syndicate Intergang, whose local leader plans to obtain an ancient relic called the Crown of Sabbac to take control of the nation. Aldis Hodge, Noah Centineo, Sarah Shahi, Marwan Kenzari, Quintessa Swindell, and Pierce Brosnan appear in supporting roles. Johnson was attached to Shazam! early in development and confirmed to portray the villain Black Adam in September 2014, but the producers, at Johnson\'s urging, later decided to give the character his own film. Sztykiel was hired in October 2017. Collet-Serra joined in June 2019 with a planned release date of December 2021, but this timeline was delayed by the COVID-19 pandemic. Additional casting took place over the next year, including four members of the Justice Society of America, along with the script being rewritten by Haines and Noshirvani. Principal photography took place from April to August 2021 at Trilith Studios in Atlanta, Georgia, and also in Los Angeles. Black Adam had its world premiere in Mexico City on October 3, 2022, and was theatrically released in the United States on October 21. The film received mixed reviews and grossed $393 million worldwide, being labeled a box-office bomb for failing to break even.', 'Dwayne Johnson, Aldis Hodge, Pierce Brosnan, Noah Centineo', 'movie.jpg', 5, '<iframe width=\"100%\" height=\"500\"  src=\"https://www.youtube.com/embed/X0tOpBuYasI?si=9zL3IaCd_fzANi3g\" title=\"YouTube video player\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share\" allowfullscreen></ifram'),
(7, 'Top Gun: Maverik', '0007', '8.4', 'upcomingshow', '2h 11m', 'May 27,2022', 'Top Gun: Maverick is a 2022 American action drama film directed by Joseph Kosinski and written by Ehren Kruger, Eric Warren Singer, and Christopher McQuarrie from stories by Peter Craig and Justin Marks. The film is a sequel to the 1986 film Top Gun. Tom Cruise reprises his starring role as the naval aviator Maverick. It is based on the characters of the original film created by Jim Cash and Jack Epps Jr. It also stars Miles Teller, Jennifer Connelly, Jon Hamm, Glen Powell, Lewis Pullman, Ed Harris and Val Kilmer, who reprises his role as Iceman. The story involves Maverick confronting his past while training a group of younger Top Gun graduates, including the son of his deceased best friend, for a dangerous mission. Development of a Top Gun sequel was announced in 2010 by Paramount Pictures. Tom Cruise, along with producer Jerry Bruckheimer and director Tony Scott, were asked to return. Craig wrote a draft of the screenplay in 2012, but the project stalled when Scott died later that year.[6] Top Gun: Maverick was later dedicated to Scott\'s memory.[7] Production resumed in 2017, after Kosinski was hired to direct. Principal photography, which involved the use of IMAX-certified 6K full-frame cameras, took place from May 2018 to April 2019 in California, Washington and Maryland. It was initially scheduled to be released July 12, 2019, but it was delayed several times due to its complex action sequences and later the COVID-19 pandemic. During the pandemic, several streaming companies attempted to purchase the streaming rights to the film from Paramount, but all offers were declined on the orders of Cruise, who insisted that it be released exclusively in theaters.[8] Top Gun: Maverick premiered at CinemaCon on April 28, 2022, and was theatrically released by Paramount Pictures in the United States on May 27, 2022. The film was acclaimed by critics, with many deeming it a significant improvement over the original.[9] It won Best Film from the National Board of Review and was also named one of the top ten films of 2022 by the American Film Institute. Top Gun: Maverick was nominated for six awards at the 95th Academy Awards (including Best Picture), winning Best Sound, and received numerous other accolades. The film grossed $1.496 billion worldwide, making it the second-highest-grossing film of 2022 and the highest-grossing of Cruise\'s career.', 'Tom Cruise, Jennifer Connelly, Miles Teller, Val Kilmer', 'movie.jpg', 5, '<iframe width=\"100%\" height=\"500\" src=\"https://www.youtube.com/embed/giXco2jaZ_4?si=nYFag9OiPn8zQdvI\" title=\"YouTube video player\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share\" allowfullscreen></iframe'),
(8, 'The Gray Man', '0008', '6.5', 'upcomingshow', '2h 2m', 'July 22,2022', 'The Gray Man is a 2022 American action thriller film directed by Anthony and Joe Russo, from a screenplay the latter co-wrote with Christopher Markus and Stephen McFeely, based on the 2009 novel of the same name by Mark Greaney. The film stars Ryan Gosling, Chris Evans, Ana de Armas, Jessica Henwick, Reg?-Jean Page, Wagner Moura, Julia Butters, Dhanush, Alfre Woodard, and Billy Bob Thornton. Produced by the Russo brothers\' company AGBO, it is the first film in a franchise based upon Greaney\'s Gray Man novels. The plot centers on CIA agent \"Sierra Six\" (portrayed by Gosling), who is on the run from sociopathic ex-CIA agent and mercenary Lloyd Hansen (Evans) upon discovering corrupt secrets about his superior. An adaptation of Greaney\'s novel was originally announced in 2011, with James Gray set to direct Brad Pitt, and later Charlize Theron in a gender-swapped role, though neither version ever came to fruition. The property lingered in development hell until July 2020, when it was announced the Russo brothers would direct, with both Gosling and Evans attached to star. Filming took place in Los Angeles, Paris and Prague between March and July 2021. With a production budget of $200 million, it is among the most expensive films made by Netflix. The Gray Man began a limited theatrical release on July 15, 2022 followed by its digital release on Netflix on July 22, 2022. It received mixed reviews from critics, with praise for the ensemble cast and action sequences, but criticism toward the \"clich?d script and breakneck pacing.\"[3] The film is being followed by a sequel, with Gosling and Dhanush reprising their roles, as well as a spin-off.[4]', 'Ryan Gosling, Chris Evans, Ana de Armas, Billy Bob Thornton', 'movie.jpg', 5, '<iframe width=\"100%\" height=\"500\" =\"https://www.youtube.com/embed/BmllggGO4pM?si=OmeZWZUzLQ7z7laM\" title=\"YouTube video player\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share\" allowfullscreen></iframe>'),
(9, 'Sing 2', '0009', '7.4', 'nowshowing', '1h 50m', 'December 22,2021', 'Sing 2 is a 2021 American computer-animated jukebox musical comedy film written and directed by Garth Jennings, co-directed by Christophe Lourdelet, and produced by Chris Meledandri and Janet Healy. Produced by Illumination and distributed by Universal Pictures, it is the sequel to Sing, and the second film in the franchise. The film stars an ensemble voice cast consisting of Matthew McConaughey, Reese Witherspoon, Scarlett Johansson, Taron Egerton, Tori Kelly, Nick Kroll, Jennings, Peter Serafinowicz, Jennifer Saunders, and Nick Offerman, reprising their roles from the first film. The sequel also features new characters voiced by Bobby Cannavale, Bono, Halsey, Pharrell Williams, Chelsea Peretti, Letitia Wright, and Eric Andr?. Like the first film, Sing 2 features songs from many artists, most of which are performed diegetically. The story is set after the events of the previous film with Buster Moon and his group putting on a show in Redshore City while working to impress an entertainment mogul and enlist a reclusive rock star to perform with the group. Sing 2 made its world premiere at the AFI Fest on November 14, 2021, and was theatrically released in the United States on December 22, 2021, by Universal Pictures. The film was met with generally positive reviews and grossed over $408 million worldwide against a production budget of $85 million, becoming the highest-grossing animated film of 2021 and the tenth-highest-grossing film of 2021. A sequel is in development.', 'Matthew McConaughey, Reese Witherspoon, Scarlett Johansson, Tori Kelly', 'movie.jpg', 6, '<iframe width=\"100%\" height=\"500\" src=\"https://www.youtube.com/embed/EPZu5MA2uqI?si=bivAazayYb_0lzhE\" title=\"YouTube video player\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share\" allowfullscreen></iframe'),
(10, 'Free Guy', '00010', '7.1', 'upcomingshow', '1h 55m', 'August 13,2021', 'Free Guy is a 2021 American action comedy film directed and produced by Shawn Levy from a screenplay by Matt Lieberman and Zak Penn, and a story by Lieberman. The film stars Ryan Reynolds, Jodie Comer, Lil Rel Howery, Utkarsh Ambudkar, Joe Keery, and Taika Waititi. It tells the story of a bank teller who discovers that he is a non-player character in a massively multiplayer online game who then partners with a player to find evidence that a gaming company\'s CEO stole the player\'s game\'s source code. Lieberman began writing the script in 2016, which was acquired by 20th Century Fox shortly after. Levy passed on the script, but reconsidered after Hugh Jackman introduced him to Reynolds, resulting in him leaving the film adaptation of the Uncharted video game he had been developing. The acquisition of 21st Century Fox by Disney made Free Guy one of the first films produced by 20th Century to continue its production under Disney\'s ownership. Filming took place in Massachusetts and California between May and July 2019. After the film was delayed two times by the COVID-19 pandemic, it premiered at the Piazza Grande section of the 74th Locarno Film Festival in Switzerland on August 10, 2021,[5] and was released theatrically in the United States three days later on August 13 in RealD 3D, IMAX, 4DX and Dolby Cinema formats by 20th Century Studios and is the first film to use the enhanced version with the 2009 sky background and color of the current 20th Century Studios logo.[6] It grossed $331.5 million worldwide. The film received generally positive reviews from critics for the concept, comparing it to science fiction films and action video games such as Ready Player One, The Truman Show, The Matrix, Grand Theft Auto, and Fortnite.[7][8] The film received a nomination for Best Visual Effects at the 94th Academy Awards.', 'Ryan Reynolds, Jodie Comer, Taika Waititi, Lil Rel Howery', 'movie.jpg', 2, '<iframe width=\"100%\" height=\"500\" src=\"https://www.youtube.com/embed/X2m-08cOAbc?si=S_L_lgPPWtEMiR90\" title=\"YouTube video player\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share\" allowfullscreen></iframe'),
(13, 'Avatar: The Way of Water', '00013', '7.8', 'nowshowing', '3h 12m', 'December 16,2022', 'Hi Hello', 'Sam Worthington, Zoe Saldana, Sigourney Weaver, Stephen Lang', 'movie.jpg', 1, '<iframe width=\"100%\" height=\"500\"  src=\"https://www.youtube.com/embed/d9MyW72ELq0?si=C6j9Um5VK8zMGPu2\" title=\"YouTube video player\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share\" allowfullscreen></ifram'),
(18, 'Bullet Train', '00018', '7.3', 'nowshowing', '2h 6m', 'August 5,2022', 'Bullet Train is a 2022 American action comedy film directed by David Leitch and starring Brad Pitt as an assassin who must battle fellow killers while riding a bullet train. It is based on the 2010 novel Maria Beetle (titled Bullet Train in the UK and US editions), written by K?tar? Isaka and translated by Sam Malissa, the second novel in Isaka\'s Hitman trilogy, of which the first novel was previously adapted as the 2015 Japanese film Grasshopper. The film also features an ensemble supporting cast including Joey King, Aaron Taylor-Johnson, Brian Tyree Henry, Andrew Koji, Hiroyuki Sanada, Michael Shannon, Benito A. Mart?nez Ocasio, and Sandra Bullock. Principal photography began in Los Angeles in November 2020 and wrapped up in March 2021. Bullet Train premiered in Paris on July 18, 2022, and was theatrically released in the United States on August 5, 2022, by Sony Pictures Releasing. The film received mixed reviews from critics, with praise for the performances and action scenes, but criticism towards its pacing and convoluted story. Bullet Train grossed $239.3 million worldwide on a production budget of around $85.9?90 million.', 'Brad Pitt, Joey King, Aaron Taylor Johnson, Brian Tyree Henry', 'movie.jpg', 2, '<iframe width=\"100%\" height=\"500\" src=\"https://www.youtube.com/embed/0IOsk2Vlc4o?si=Ftxcp0sZkvRL0efd\" title=\"YouTube video player\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share\" allowfullscreen></iframe');

-- --------------------------------------------------------

--
-- Table structure for table `cineplex_info`
--

CREATE TABLE `cineplex_info` (
  `id` int(1) NOT NULL,
  `name` varchar(19) DEFAULT NULL,
  `about` mediumtext DEFAULT NULL,
  `location` varchar(16) DEFAULT NULL,
  `url` mediumtext DEFAULT NULL,
  `cineplex_image` varchar(12) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `cineplex_info`
--

INSERT INTO `cineplex_info` (`id`, `name`, `about`, `location`, `url`, `cineplex_image`) VALUES
(1, 'Star Cineplex', 'Bangladesh\'s most popular destination for movies, showtimes, tickets, and trailers.', 'Bashundhara City', 'https://www.google.com/maps/dir//13%2F3+Ka,+Level,+%E0%A6%AA%E0%A6%BE%E0%A6%A8%E0%A7%8D%E0%A6%A5%E0%A6%AA%E0%A6%A5,+8+Bashundhara+City+Parking+Entrance,+1205/@23.7512332,90.3082005,12z/data=!4m8!4m7!1m0!1m5!1m1!1s0x3755b8a3303a6fbf:0xbc442f814508a7f0!2m2!1d90.3906021!2d23.751255?entry=ttu', 'cineplex.jpg'),
(2, 'Rajmoni Cinema Hall', 'Razmoni, a now defunct movie theater, known as Razmoni Cinema Hall, was one of the most famous in Dhaka City.', 'Kakrail', 'https://www.google.com/maps/dir//67%2F1+Kakrail,Dhaka-1000,+Bangladesh,+VIP+Rd,+Dhaka/@23.7370282,90.3264894,12z/data=!4m8!4m7!1m0!1m5!1m1!1s0x3755b8f4ecdd5263:0x81053e13fc221e90!2m2!1d90.408891!2d23.73705?entry=ttu', 'cineplex.jpg'),
(3, 'Avishar Cinema Hall', 'Avishar Cinema Hall is a movie theater in Dhaka Division. Avishar Cinema Hall is situated nearby to the public building Daily Ittefaq Bhaban', 'Hatkhola Rd', 'https://www.google.com/maps?s=web&opi=89978449&sca_esv=560664892&lqi=ChRjaW5lbWEgaGFsbCBpbiBkaGFrYUibwZalga-AgAhaKBAAEAEYABgBGAMiFGNpbmVtYSBoYWxsIGluIGRoYWthKgYIAxAAEAGSAQ1tb3ZpZV90aGVhdGVymgEkQ2hkRFNVaE5NRzluUzBWSlEwRm5TVVJUYUhVdFNqaFJSUkFCqgFOEAEqDyILY2luZW1hIGhhbGwoADIfEAEiG7rnkBrsF0Ma2tHp0d2_bNKYO7DQzJnO-Di3kDIYEAIiFGNpbmVtYSBoYWxsIGluIGRoYWth&phdesc=4qG1o-795os&vet=12ahUKEwiNpKaZ1P-AAxV2-DgGHSu7BkIQ1YkKegQIFxAM..i&cs=1&um=1&ie=UTF-8&fb=1&gl=bd&sa=X&geocode=KVm6LrPluVU3MXzC7jMywH-c&daddr=Hatkhola+Rd,+Dhaka', 'cineplex.jpg'),
(4, 'Avishar Cinema Hall', 'Avishar Cinema Hall is a movie theater in Dhaka Division. Avishar Cinema Hall is situated nearby to the public building Daily Ittefaq Bhaban', 'Hatkhola Rd', 'https://www.google.com/maps?s=web&opi=89978449&sca_esv=560664892&lqi=ChRjaW5lbWEgaGFsbCBpbiBkaGFrYUibwZalga-AgAhaKBAAEAEYABgBGAMiFGNpbmVtYSBoYWxsIGluIGRoYWthKgYIAxAAEAGSAQ1tb3ZpZV90aGVhdGVymgEkQ2hkRFNVaE5NRzluUzBWSlEwRm5TVVJUYUhVdFNqaFJSUkFCqgFOEAEqDyILY2luZW1hIGhhbGwoADIfEAEiG7rnkBrsF0Ma2tHp0d2_bNKYO7DQzJnO-Di3kDIYEAIiFGNpbmVtYSBoYWxsIGluIGRoYWth&phdesc=4qG1o-795os&vet=12ahUKEwiNpKaZ1P-AAxV2-DgGHSu7BkIQ1YkKegQIFxAM..i&cs=1&um=1&ie=UTF-8&fb=1&gl=bd&sa=X&geocode=KVm6LrPluVU3MXzC7jMywH-c&daddr=Hatkhola+Rd,+Dhaka', 'cineplex.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `movie_banner`
--

CREATE TABLE `movie_banner` (
  `id` int(11) NOT NULL,
  `movie` varchar(255) NOT NULL,
  `banner_image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `movie_banner`
--

INSERT INTO `movie_banner` (`id`, `movie`, `banner_image`) VALUES
(1, 'Avatar: The Way of Water', 'banner.jpg'),
(2, 'Sing 2', 'banner.jpg'),
(3, 'Uncharted', 'banner.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `movie_genre_info`
--

CREATE TABLE `movie_genre_info` (
  `id` int(1) NOT NULL,
  `genre` varchar(9) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `movie_genre_info`
--

INSERT INTO `movie_genre_info` (`id`, `genre`) VALUES
(1, 'adventure'),
(2, 'comedy'),
(3, 'drama'),
(4, 'thriller'),
(5, 'action'),
(6, 'animation');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `orderdescription` varchar(255) NOT NULL,
  `paid_amount` float(10,2) NOT NULL,
  `paid_amount_currency` varchar(10) NOT NULL,
  `txn_id` varchar(100) NOT NULL,
  `checkout_session_id` varchar(255) NOT NULL,
  `payment_status` varchar(25) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  `deliverystatus` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `reviews`
--

CREATE TABLE `reviews` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `movie` varchar(255) NOT NULL,
  `title` mediumtext NOT NULL,
  `review` mediumtext NOT NULL,
  `time` varchar(255) NOT NULL,
  `verified` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `reviews`
--

INSERT INTO `reviews` (`id`, `name`, `movie`, `title`, `review`, `time`, `verified`) VALUES
(11, 'Md. Arafat Akash', '3', 'I wish I enjoyed it like so many did, it just bored me.', 'I feel so bad giving this film a poor rating, because I feel it\'s important for many reasons, socially, culturally, so important to finally see a principally black cast lead the way in the year\'s biggest movie event.\n\nDazzling special effects, great acting, but aside from that I couldn\'t say much in favour of the film, if I\'m being totally honest it bored me throughout, I yawned the whole way through, as everything in this movie has been literally done to death, it lacked pace, it lacked energy, it was hard to stay engaged.\n\nI saw it based on the many wonderful and positive reviews, maybe I was having an off day, it just bored me to tears. It\'s interesting, but all of the critics seemed to rave about it.\n\nI want to give huge credit to Chadwick Boseman though, he was great here, what a brave man, RIP.', '2023-10-10 14:46:39', 1),
(12, 'Md. Arafat Akash', '4', 'This is just a game', 'For non-gamers, Uncharted is a remarkably straightforward project: Hot treasure hunters go on an action-packed adventure to track down a centuries-old treasure? Sure, checks out. Maybe these particular treasure hunters aren’t as nobly intentioned as, say, one Dr. Henry Walton Jones Jr., but that doesn’t mean 25-year-old bartender/history buff/aspiring thief Nathan Drake (Tom Holland) isn’t just as dedicated to tracking down some long lost gold.\r\n\r\nWe first meet Nathan as a 10-year-old living with his older brother Sam in an orphanage, though Sam makes his escape from the place after a run-in with the law, leaving his brother with a family artifact (an engraved ring), followed by, in the ensuing years, a trail of vague postcards from exotic locals. Now (ostensibly) an adult, Nate’s mixing drinks for trust fund girls at fancy bars and swiping their jewelry while they’re not looking — which is where Victor “Sully” Sullivan (Mark Wahlberg) finds him, and offers him a job assisting with a heist/treasure hunt.', '2023-10-10 14:57:01', 1),
(23, 'Md. Arafat Akash', '5', 'This riotously funny creepy doll movie earns a place alongside Gremlins and Chucky in cinema’s playroom of horrors', 'How great would it be to buy your child a self-aware A.I. companion that comes equipped with deep-fake empathy, weird silicone skin akin to a Thunderbirds character, eyes like surveillance cameras and hands that can either hug like a sister or grip like a vice? \r\n\r\nObviously, it would be entirely terrible, a fact of which this deliciously spiky comedy-horror is all too aware – even if its dopey, tech-trusting characters take a while to twig. Fusing a blend of broad satire and the kind of vague plausibility that was once a hallmark of Paul Verhoeven’s sci-fis, M3GAN rollicks along with all the slickness and shocks you’d expect from a film produced by Insidious’s James Wan. It always keeps you in on the joke – and it’s a killer joke.\r\n\r\nThe title takes its name from the prototype doll rebuilt by roboticist and toy inventor Gemma (Allison Williams) to help salve her niece Katy’s (Violet McGraw) grief after the death of her parents. In truth, the creepy doll is as much designed to get the little tyke off her case and out of her pristine toy collectibles, as she adjusts to a guardianship she’s not emotionally equipped for. ', '2023-10-31 18:46:56', 1);

-- --------------------------------------------------------

--
-- Table structure for table `user_info`
--

CREATE TABLE `user_info` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `fullname` varchar(255) NOT NULL,
  `gender` varchar(255) NOT NULL,
  `dob` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `blood` varchar(255) NOT NULL,
  `religion` varchar(255) NOT NULL,
  `occupation` varchar(255) NOT NULL,
  `nationality` varchar(255) NOT NULL,
  `maritalstatus` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `verified` int(11) NOT NULL,
  `v_code` varchar(255) NOT NULL DEFAULT '0',
  `resettoken` varchar(255) DEFAULT NULL,
  `resettokenexpire` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_info`
--
ALTER TABLE `admin_info`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `all_movie_info`
--
ALTER TABLE `all_movie_info`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cineplex_info`
--
ALTER TABLE `cineplex_info`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `movie_banner`
--
ALTER TABLE `movie_banner`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `movie_genre_info`
--
ALTER TABLE `movie_genre_info`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_info`
--
ALTER TABLE `user_info`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_info`
--
ALTER TABLE `admin_info`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `all_movie_info`
--
ALTER TABLE `all_movie_info`
  MODIFY `id` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `cineplex_info`
--
ALTER TABLE `cineplex_info`
  MODIFY `id` int(1) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `movie_banner`
--
ALTER TABLE `movie_banner`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `movie_genre_info`
--
ALTER TABLE `movie_genre_info`
  MODIFY `id` int(1) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `reviews`
--
ALTER TABLE `reviews`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `user_info`
--
ALTER TABLE `user_info`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
