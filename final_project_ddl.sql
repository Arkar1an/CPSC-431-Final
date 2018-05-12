drop   database if exists     CPSC_431_final;
create database if not exists CPSC_431_final;

drop user if exists 'phpengine'; # only accesses the account and role table
drop user if exists 'observer'; # sees same as user
drop user if exists 'user'; # can update
drop user if exists 'manager'; # can see account stuff

use CPSC_431_final;

CREATE TABLE Team
(
  t_name        VARCHAR(100) NOT NULL PRIMARY KEY,
  t_executive   VARCHAR(100)
);

CREATE TABLE Player
( 
  p_ID          INTEGER UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
  p_fname       VARCHAR(100),
  p_lname       VARCHAR(150) NOT NULL,
  p_position    ENUM('C','PG','SG','SF','PF'), 
  #center, point guard, shooting guard, small forward, power forward
  p_height      INTEGER UNSIGNED,  
  p_weight      INTEGER UNSIGNED,  
  p_team        VARCHAR(100),
  p_age         TINYINT,

  FOREIGN KEY (p_team) REFERENCES Team(t_name)

);

CREATE TABLE Coach
(
  c_ID      INTEGER UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
  c_fname   VARCHAR(100),
  c_lname   VARCHAR(100),
  c_age     TINYINT,
  c_team	VARCHAR(100),

  FOREIGN KEY (c_team) REFERENCES Team(t_name)
);

# date formate is 'YYYY-MM-DD'
CREATE TABLE Bench
(
  b_injurydate  DATE NOT NULL,
  b_player      INTEGER UNSIGNED NOT NULL,
  b_injury      VARCHAR(100),
  b_returndate  DATE,

  PRIMARY KEY (b_injurydate,b_player),
  FOREIGN KEY (b_player) REFERENCES Player(p_ID)
);

CREATE TABLE Game
(
  g_date        DATE NOT NULL,
  g_away        VARCHAR(100) NOT NULL,
  g_home        VARCHAR(100) NOT NULL,
  g_awaypoints  TINYINT UNSIGNED,
  g_homepoints  TINYINT UNSIGNED,
  

  PRIMARY KEY (g_date,g_away,g_home),
  FOREIGN KEY (g_away) REFERENCES Team(t_name),
  FOREIGN KEY (g_home) REFERENCES Team(t_name)
);

CREATE TABLE Statistics
(
  s_date        DATE NOT NULL,
  s_away        VARCHAR(100) NOT NULL,
  s_home        VARCHAR(100) NOT NULL,
  s_player            INTEGER    UNSIGNED  NOT NULL,
  s_playingTimeMin    TINYINT 	 UNSIGNED  DEFAULT 0, # Two 20-minute halves
  s_playingTimeSec    TINYINT 	 UNSIGNED  DEFAULT 0,
  s_points            TINYINT    UNSIGNED  DEFAULT 0,
  s_assists           TINYINT    UNSIGNED  DEFAULT 0,
  s_rebounds          TINYINT    UNSIGNED  DEFAULT 0,

  FOREIGN KEY (s_player) REFERENCES Player(p_ID),
  FOREIGN KEY (s_date) REFERENCES Game(g_date),
  FOREIGN KEY (s_away) REFERENCES Game(g_away),
  FOREIGN KEY (s_home) REFERENCES Game(g_home),
  PRIMARY KEY (s_date,s_away,s_home,s_player),

  CHECK((PlayingTimeMin < 40 AND PlayingTimeSec < 60) OR 
        (PlayingTimeMin = 40 AND PlayingTimeSec = 0 ))
);

CREATE TABLE Role 
(
	r_role 	ENUM('observer','user','manager','phpengine') NOT NULL,
	r_permission VARCHAR(100) NOT NULL, #php files that can be used by role

	PRIMARY KEY (r_role,r_permission)
);

CREATE TABLE Account
(
  a_username  VARCHAR(100) NOT NULL PRIMARY KEY,
  a_password  VARCHAR(40), # 40 char hex number
  a_role      ENUM('observer','user','manager','phpengine'),

  FOREIGN KEY (a_role) REFERENCES Role(r_role)
);

CREATE TABLE Person
(
  per_ID	INTEGER UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
  per_email   VARCHAR(100),
  per_username VARCHAR(100),
  per_fname VARCHAR(100),
  per_lname VARCHAR(100),
  per_address VARCHAR(100),
  per_city VARCHAR(100),
  per_state VARCHAR(100),
  per_zip VARCHAR(5),

  FOREIGN KEY (per_username) REFERENCES Account(a_username)
);

#php engine grants
grant select on CPSC_431_final.Account to 'phpengine' identified by 'differentpassword';
grant select on CPSC_431_final.Role to 'phpengine';

#observer grants
grant select on CPSC_431_final.Team to 'observer' identified by 'uniquepassword';
grant select on CPSC_431_final.Player to 'observer';
grant select on CPSC_431_final.Coach to 'observer';
grant select on CPSC_431_final.Bench to 'observer';
grant select on CPSC_431_final.Statistics to 'observer';
grant select on CPSC_431_final.Game to 'observer';
grant select on CPSC_431_final.Person to 'observer';

#user grants
grant select, insert, update on CPSC_431_final.Team to 'user' identified by 'otherpassword';
grant select, insert, update on CPSC_431_final.Player to 'user';
grant select, insert, update on CPSC_431_final.Coach to 'user';
grant select, insert, update on CPSC_431_final.Bench to 'user';
grant select, insert, update on CPSC_431_final.Statistics to 'user';
grant select, insert, update on CPSC_431_final.Game to 'user';
grant select, insert, update on CPSC_431_final.Person to 'user';

#manager grants
grant select, insert, delete, update, execute on CPSC_431_final.* to 'manager' identified by 'password';

######## 10 Team inserts ########
insert into Team values
	('Hawks','Bill Gates'),
	('Nets','Steve Jobs '),
	('Hornets','Steve Wozniak'),
	('Bulls','Alan Turing'),
	('Cavaliers','Ada Lovelace'),
	('Mavericks','Edsger Dijkstra'),
	('Nuggets','John von Neumann'),
	('Warriors','Linus Torvalds'),
	('Rockets','Richard Stallman'),
	('Celtics','Mr. Turing');

#######  50 Player inserts (5 for each team) ########
insert into Player values

	(100,'Bob','Pettit','C',79,205,'Hawks',32),
	(101,'Dominique','Wilkins','PG',80,240,'Hawks',41),
	(102,'Tree','Rollins','SG',85,260,'Hawks',39),
	(103,'Kevin','Willis','SF',79,230,'Hawks',27),
	(104,'Mookie','Blaylock','PF',73,180,'Hawks',33),

	(105,'Buck','Williams','C',79,230,'Nets',32),
	(106,'Richard','Jefferson','PG',80,215,'Nets',32),
	(107,'Mike','Gminski','SG',85,255,'Nets',32),
	(108,'Vince','Carter','SF',77,211,'Nets',32),
	(109,'Derrick','Coleman','PF',74,199,'Nets',32),

	(110,'David','Wesley','C',81,253,'Hornets',32),
	(111,'Gerald','Wallace','PG',83,259,'Hornets',32),
	(112,'Larry','Johnson','SG',79,241,'Hornets',32),
	(113,'Glen','Rice','SF',77,226,'Hornets',32),
	(114,'Muggsy','Bogues','PF',77,230,'Hornets',32),

	(115,'Michael','Jordan','C',76,230,'Bulls',32),
	(116,'Scottie','Pippen','PG',82,258,'Bulls',32),
	(117,'Chet','Walker','SG',79,240,'Bulls',32),
	(118,'Horace','Grant','SF',74,229,'Bulls',32),
	(119,'Luoi','Deng','PF',80,238,'Bulls',32),

	(120,'LeBron','James','C',71,170,'Cavaliers',32),
	(121,'Mark','Price','PG',75,190,'Cavaliers',32),
	(122,'Rod','Williams','SG',85,265,'Cavaliers',32),
	(123,'Anderson','Varejao','SF',82,253,'Cavaliers',32),
	(124,'Kyrie','Irving','PF',81,247,'Cavaliers',32),

	(125,'Dirk','Nowitzki','C',84,245,'Mavericks',32),
	(126,'Rolando','Blackman','PG',79,230,'Mavericks',32),
	(127,'Jason','Terry','SG',79,230,'Mavericks',32),
	(128,'Michael','Finley','SF',79,230,'Mavericks',32),
	(129,'Mark','Aguirre','PF',79,230,'Mavericks',32),

	(130,'Alex','English','C',79,229,'Nuggets',32),
	(131,'Byron','Beck','PG',81,225,'Nuggets',32),
	(132,'Fat','Lever','SG',86,239,'Nuggets',32),
	(133,'David','Thompson','SF',82,230,'Nuggets',32),
	(134,'Bobby','Jones','PF',78,210,'Nuggets',32),
	
	(135,'Wilt','Chamberlain','C',85,275,'Warriors',40),
	(136,'Stephen','Curry','PG',80,210,'Warriors',32),
	(137,'Nate','Thurmond','SG',71,180,'Warriors',32),
	(138,'Purvis','Short','SF',88,281,'Warriors',32),
	(139,'Draymond','Green','PF',83,221,'Warriors',32),

	(140,'Hakeem','Olajuwon','C',85,267,'Rockets',32),
	(141,'Calvin','Murphy','PG',82,245,'Rockets',32),
	(142,'Yao','Ming','SG',90,310,'Rockets',32),
	(143,'Steve','Francis','SF',79,227,'Rockets',32),
	(144,'Otis','Thorpe','PF',83,242,'Rockets',32),

	(145,'Bill','Russell','C',86,259,'Celtics',32),
	(146,'Larry','Bird','PG',82,224,'Celtics',32),
	(147,'Paul','Pierce','SG',89,230,'Celtics',32),
	(148,'John','Havlicek','SF',77,170,'Celtics',32),
	(149,'Robert','Parish','PF',84,230,'Celtics',32);


######## 10 Coach inserts ########
insert into Coach values
	(200,'Tony','Stark',55,'Hawks'),
	(201,'Bruce','Banner',64,'Nets'),
	(202,'Steve','Rogers',59,'Hornets'),
	(203,'Stephen','Strange',67,'Bulls'),
	(204,'Charles','Xavier',63,'Cavaliers'),
	(205,'Erik','Lensher',45,'Mavericks'),
	(206,'Logan','Howlett',52,'Nuggets'),
	(207,'Jean','Grey',48,'Warriors'),
	(208,'Scott','Summers',61,'Rockets'),
	(209,'Peter','Parker',38,'Celtics');

########  5 Bench inserts ########
# date formate is 'YYYY-MM-DD'
insert into Bench values
	('2018-05-01',100,'ACL torn','2018-06-01'),
	('2018-04-11',110,'Broken femur','2018-08-21'),
	('2018-03-21',120,'Ankle crushed','2018-09-17'),
	('2018-01-31',130,'Wrist broken','2018-08-03'),
	('2018-01-28',140,'Broken nose','2018-10-06');

######## 5 Game inserts ########
# date formate is 'YYYY-MM-DD'
insert into Game values
	('2018-05-09','Hawks','Nets',110,130),
	('2018-05-09','Hornets','Bulls',103,98),
	('2018-05-09','Cavaliers','Mavericks',100,89),
	('2018-05-09','Nuggets','Warriors',120,125),
	('2018-05-09','Rockets','Celtics',113,134);

######## 50 Statistic inserts ########
# date formate is 'YYYY-MM-DD'
insert into Statistics values
	('2018-05-09','Hawks','Nets',100,10,5,13,2,5),
	('2018-05-09','Hawks','Nets',101,11,10,9,7,4),
	('2018-05-09','Hawks','Nets',102,16,24,18,9,8),
	('2018-05-09','Hawks','Nets',103,12,38,13,8,11),
	('2018-05-09','Hawks','Nets',104,19,3,24,17,3),
	('2018-05-09','Hawks','Nets',105,4,11,3,18,12),
	('2018-05-09','Hawks','Nets',106,12,41,5,19,20),
	('2018-05-09','Hawks','Nets',107,18,23,11,20,18),
	('2018-05-09','Hawks','Nets',108,17,22,17,8,10),
	('2018-05-09','Hawks','Nets',109,11,45,22,5,5),

	('2018-05-09','Hornets','Bulls',110,8,54,15,4,11),
	('2018-05-09','Hornets','Bulls',111,7,33,24,10,14),
	('2018-05-09','Hornets','Bulls',112,10,28,17,2,4),
	('2018-05-09','Hornets','Bulls',113,8,24,18,4,7),
	('2018-05-09','Hornets','Bulls',114,4,13,3,5,12),
	('2018-05-09','Hornets','Bulls',115,10,2,11,4,7),
	('2018-05-09','Hornets','Bulls',116,17,8,7,7,3),
	('2018-05-09','Hornets','Bulls',117,13,53,9,8,11),
	('2018-05-09','Hornets','Bulls',118,5,34,23,5,12),
	('2018-05-09','Hornets','Bulls',119,11,49,19,3,6),

	('2018-05-09','Cavaliers','Mavericks',120,10,5,13,2,5),
	('2018-05-09','Cavaliers','Mavericks',121,11,10,9,7,4),
	('2018-05-09','Cavaliers','Mavericks',122,16,24,18,9,8),
	('2018-05-09','Cavaliers','Mavericks',123,12,38,13,8,11),
	('2018-05-09','Cavaliers','Mavericks',124,19,3,24,17,3),
	('2018-05-09','Cavaliers','Mavericks',125,4,11,3,18,12),
	('2018-05-09','Cavaliers','Mavericks',126,12,41,5,19,20),
	('2018-05-09','Cavaliers','Mavericks',127,18,23,11,20,18),
	('2018-05-09','Cavaliers','Mavericks',128,17,22,17,8,10),
	('2018-05-09','Cavaliers','Mavericks',129,11,45,22,5,5),

	('2018-05-09','Nuggets','Warriors',130,8,54,15,4,11),
	('2018-05-09','Nuggets','Warriors',131,7,33,24,10,14),
	('2018-05-09','Nuggets','Warriors',132,10,28,17,2,4),
	('2018-05-09','Nuggets','Warriors',133,8,24,18,4,7),
	('2018-05-09','Nuggets','Warriors',134,4,13,3,5,12),
	('2018-05-09','Nuggets','Warriors',135,10,2,11,4,7),
	('2018-05-09','Nuggets','Warriors',136,17,8,7,7,3),
	('2018-05-09','Nuggets','Warriors',137,13,53,9,8,11),
	('2018-05-09','Nuggets','Warriors',138,5,34,23,5,12),
	('2018-05-09','Nuggets','Warriors',139,11,49,19,3,6),

	('2018-05-09','Rockets','Celtics',140,10,5,13,2,5),
	('2018-05-09','Rockets','Celtics',141,11,10,9,7,4),
	('2018-05-09','Rockets','Celtics',142,16,24,18,9,8),
	('2018-05-09','Rockets','Celtics',143,12,38,13,8,11),
	('2018-05-09','Rockets','Celtics',144,19,3,24,17,3),
	('2018-05-09','Rockets','Celtics',145,4,11,3,18,12),
	('2018-05-09','Rockets','Celtics',146,12,41,5,19,20),
	('2018-05-09','Rockets','Celtics',147,18,23,11,20,18),
	('2018-05-09','Rockets','Celtics',148,17,22,17,8,10),
	('2018-05-09','Rockets','Celtics',149,11,45,22,5,5);

######## Role inserts go here ########
insert into Role values
	('observer','login_page.php'),
	('user','login_page.php'),
	('phpengine','login_page.php'),
	('manager','login_page.php');

######## 3 Account inserts ########
insert into Account values
	('redcapricorn','2aa60a8ff7fcd473d321e0146afd9e26df395147','manager'), #password2
	('shrini','e38ad214943daad1d64c102faec29de4afe9da3d','manager'), #password1
	('arkar1an','5baa61e4c9b93f3f0682250b6cf8331b7ee68fd8','manager'); #password

######## 3 Person inserts ########
insert into Person values
	(1,'arkar1an@csu.fullerton.edu','arkar1an','Russell','Richardson','1234 Park St.','Fullerton','California',12116),
	(2,'shrinithi.kalai@csu.fullerton.edu','shrini','Shrinithi','Kalai','1999 Anaheim St.','Fullerton','California',12116),
	(3,'oracleryuu@csu.fullerton.edu','redcapricorn','Jared','Vanotterdyk','4345 Pacific St.','Fullerton','California',12116);


