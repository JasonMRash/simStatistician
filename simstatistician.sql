-- Project: Sim Statistician
-- Author: Jason Rash

--
-- Database: `simstatistician`
--

-- --------------------------------------------------------

--
-- Table structure for table `Users`
--

DROP TABLE IF EXISTS `Users`;
CREATE TABLE `Users` (
  `idUsers` int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `uidUsers` varchar(255) NOT NULL,
  `emailUsers` varchar(255) NOT NULL,
  `pwdUsers` varchar(255) NOT NULL,
  PRIMARY KEY (idUsers)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Table structure for table `Games`
--

DROP TABLE IF EXISTS `Games`;
CREATE TABLE `Games` (
  `idGames` int(11) AUTO_INCREMENT NOT NULL,
  `nameGames` varchar(255) NOT NULL,
  `idUsers` int(11) NOT NULL,

  FOREIGN KEY (idUsers) REFERENCES Users (idUsers) ON DELETE CASCADE,
  PRIMARY KEY (idGames)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Table structure for table `Setups`
--

DROP TABLE IF EXISTS `Setups`;
CREATE TABLE `Setups` (
  `idSetups` int(11) AUTO_INCREMENT NOT NULL,
  `idUsers` int(11) NOT NULL,
  `idGames` int(11) NOT NULL,
  `nameSetups` varchar(255) NOT NULL,
  `frontWing` tinyint NOT NULL,
  `rearWing` tinyint NOT NULL,
  `onThrottleDiff` tinyint NOT NULL,
  `offThrottleDiff` tinyint NOT NULL,
  `frontCamber` decimal(3,2) NOT NULL,
  `rearCamber` decimal(3,2) NOT NULL,
  `frontToe` decimal(3,2) NOT NULL,
  `rearToe` decimal(3,2) NOT NULL,
  `frontSuspension` tinyint NOT NULL,
  `rearSuspension` tinyint NOT NULL,
  `frontAntiRoll` tinyint NOT NULL,
  `rearAntiRoll` tinyint NOT NULL,
  `frontRideHeight` tinyint NOT NULL,
  `rearRideHeight` tinyint NOT NULL,
  `brakePressure` tinyint NOT NULL,
  `frontBrakeBias` tinyint NOT NULL,
  `frontRightPressure` decimal(3,1) NOT NULL,
  `frontLeftPressure` decimal(3,1) NOT NULL,
  `rearRightPressure` decimal(3,1) NOT NULL,
  `rearLeftPressure` decimal(3,1) NOT NULL,

  FOREIGN KEY (idUsers) REFERENCES Users (idUsers) ON DELETE CASCADE,
  FOREIGN KEY (idGames) REFERENCES Games (idGames) ON DELETE CASCADE,
  PRIMARY KEY (idSetups)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Table structure for table `Races`
--

DROP TABLE IF EXISTS `Races`;
CREATE TABLE `Races` (
  `idRaces` int(11) NOT NULL AUTO_INCREMENT,
  `idUsers` int(11) NOT NULL,
  `idGames` int(11) NOT NULL,
  `idSetups` int(11) NOT NULL,
  `date` date NOT NULL,
  `trackName` varchar(255) NOT NULL,
  `fastestLap` varchar(255) NOT NULL,
  `startPosition` tinyint NOT NULL,
  `finishPosition` tinyint NOT NULL,
  `aiDifficulty` tinyint NOT NULL,
  `controllerType` varchar(255) NOT NULL,
  
  FOREIGN KEY (idUsers) REFERENCES Users (idUsers) ON DELETE CASCADE,
  FOREIGN KEY (idGames) REFERENCES Games (idGames) ON DELETE CASCADE,
  FOREIGN KEY (idSetups) REFERENCES Setups (idSetups) ON DELETE NO ACTION,
  PRIMARY KEY (idRaces)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
