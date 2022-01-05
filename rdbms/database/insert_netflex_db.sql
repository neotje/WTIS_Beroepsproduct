use netflex

delete from MovieCast
go

delete from MovieDirector
go

delete from MovieGenre
go 

delete from Person
go

delete from Genre
go

delete from Movie
go

delete from Subscription
go

delete from Users
go

insert into Movie(movieID, title, publicationYear, duration, coverImage, description)
values
	(1, 'Venom', 2018, 112, 'venom.jpg', 'A failed reporter is bonded to an alien entity, one of many symbiotes who have invaded Earth. But the being takes a liking to Earth and decides to protect it.'),
	(2, 'Free Guy', 2021, 115, 'free-guy.jpg', 'A bank teller discovers that he''s actually an NPC inside a brutal, open world video game.'),
	(3, 'Cruella', 2021, 134, 'cruella.jpg', 'A live-action prequel feature film following a young Cruella de Vil.'),
	(4, 'Interstellar', 2014, 169, 'interstellar.jpg', 'A team of explorers travel through a wormhole in space in an attempt to ensure humanity''s survival.'),
	(5, 'The Old Guard', 2020, 125, 'old-guard.jpg', 'A covert team of immortal mercenaries is suddenly exposed and must now fight to keep their identity a secret just as an unexpected new member is discovered.'),
	(6, 'Inception', 2010, 148, 'inception.jpg', 'A thief who steals corporate secrets through the use of dream-sharing technology is given the inverse task of planting an idea into the mind of a C.E.O., but his tragic past may doom the project and his team to disaster.'),
	(7, 'John Wick', 2014, 101, 'john-wick.jpg', 'An ex-hit-man comes out of retirement to track down the gangsters that killed his dog and took everything from him.'),
	(8, 'The Matrix Reloaded', 2003, 138, 'matrix-reloaded.jpg', 'Freedom fighters Neo, Trinity and Morpheus continue to lead the revolt against the Machine Army, unleashing their arsenal of extraordinary skills and weaponry against the systematic forces of repression and exploitation.'),
	(9, 'Parasite', 2019, 132, 'parasite.jpg', 'Greed and class discrimination threaten the newly formed symbiotic relationship between the wealthy Park family and the destitute Kim clan.')
go

insert into Genre(genreName)
values
	('Actie'),
	('Avontuur'),
	('Sci-Fi'),
	('Comedy'),
	('Misdaad'),
	('Drama'),
	('Fantasy'),
	('Thriller')
go

insert into MovieGenre(movieID, genreName)
values
	(1, 'Actie'),
	(1, 'Avontuur'),
	(1, 'Sci-Fi'),
	(2, 'Actie'),
	(2, 'Avontuur'),
	(2, 'Comedy'),
	(3, 'Avontuur'),
	(3, 'Comedy'),
	(3, 'Misdaad'),
	(4, 'Avontuur'),
	(4, 'Drama'),
	(4, 'Sci-Fi'),
	(5, 'Actie'),
	(5, 'Avontuur'),
	(5, 'Fantasy'),
	(6, 'Actie'),
	(6, 'Avontuur'),
	(6, 'Sci-Fi'),
	(7, 'Actie'),
	(7, 'Misdaad'),
	(7, 'Thriller'),
	(8, 'Actie'),
	(8, 'Sci-Fi'),
	(9, 'Comedy'),
	(9, 'Drama'),
	(9, 'Thriller')
go

insert into Person(personID, firstName, lastName)
values
	(1, 'Tom', 'Hardy'),
	(2, 'Michelle', 'Williams'),
	(3, 'Riz', 'Ahmed'),
	(4, 'Ruben', 'Fleischer'),
	(5, 'Ryan', 'Reynolds'),
	(6, 'Jodi', 'Comer'),
	(7, 'Taika', 'Waititi'),
	(8, 'Shawn', 'Levy'),
	(9, 'Emma', 'Stone'),
	(10, 'Emma', 'Thompson'),
	(11, 'Craig', 'Gillespie'),
	(12, 'Matthew', 'McConaughey'),
	(13, 'Anne', 'Hathaway'),
	(14, 'Jessica', 'Chastain'),
	(15, 'Jonathan', 'Nolan'),
	(16, 'Christopher', 'Nolan'),
	(17, 'Charlize', 'Theron'),
	(18, 'Kiki', 'Layne'),
	(19, 'Matthias', 'Schoenaerts'),
	(20, 'Gina', 'Prince-Bythewood'),
	(21, 'Leonardo', 'DiCaprio'),
	(22, 'Joseph', 'Gordon-Levitt'),
	(23, 'Elliot', 'Page'),
	(24, 'Keanu', 'Reeves'),
	(25, 'Michael', 'Nyqvist'),
	(26, 'Alfie', 'Allen'),
	(27, 'Chad', 'Stahelski'),
	(28, 'David', 'Leitch'),
	(29, 'Lana', 'Wachowski'),
	(30, 'Lilly', 'Wachowski'),
	(32, 'Laurence', 'Fishburne'),
	(33, 'Carrie-Anne', 'Moss'),
	(34, 'Bong Joon', 'Ho'),
	(35, 'Kang-ho', 'Song'),
	(36, 'Sun-kyun', 'Lee'),
	(37, 'Yeo-jeong', 'Cho')
go

insert into MovieCast(movieID, personID, characterName)
values
	(1, 1, 'Eddie Brock'),
	(1, 2, 'Anne Weying'),
	(1, 3, 'Carlton Drake'),
	(2, 5, 'Guy'),
	(2, 6, 'Millie'),
	(2, 7, 'Antwan'),
	(3, 9, 'Estella'),
	(3, 10, 'The Baroness'),
	(4, 12, 'Cooper'),
	(4, 13, 'Brand'),
	(4, 14, 'Murph'),
	(5, 17, 'Andy'),
	(5, 18, 'Nile'),
	(5, 19, 'Booker'),
	(6, 21, 'Cobb'),
	(6, 22, 'Arthur'),
	(6, 23, 'Ariadne'),
	(7, 23, 'John Wick'),
	(7, 25,'Viggo Tarasov'),
	(7, 26, 'Losef Tarasov'),
	(8, 23, 'Neo'),
	(8, 32, 'Morpheus'),
	(8, 33, 'Trinity'),
	(9, 35, 'Ki Taek'),
	(9, 36, 'Dong Ik'),
	(9, 37, 'Yeon Kyo')
go

insert into MovieDirector(movieID, personID)
values
	(1, 4),
	(2, 8),
	(3, 11),
	(4, 15),
	(4, 16),
	(5, 20),
	(6, 16),
	(7, 27),
	(7, 28),
	(8, 29),
	(8, 30),
	(8, 34)
go

