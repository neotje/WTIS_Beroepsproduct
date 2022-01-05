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

insert into Person(personID, firstName, lastName, personImage)
values
	(1, 'Tom', 'Hardy', 'tomhardy.jpeg'),
	(2, 'Michelle', 'Williams', 'michellewilliams.jpeg'),
	(3, 'Riz', 'Ahmed', 'rizahmed.jpeg'),
	(4, 'Ruben', 'Fleischer', 'rubenfleischer.jpeg'),
	(5, 'Ryan', 'Reynolds', 'ryan-reynolds.jpeg'),
	(6, 'Jodi', 'Comer', 'jodie-comer.jpg'),
	(7, 'Taika', 'Waititi', 'taika-waititi.jpeg'),
	(8, 'Shawn', 'Levy', 'shawn-levy.jpeg'),
	(9, 'Emma', 'Stone', 'emma-stone.jpeg'),
	(10, 'Emma', 'Thompson', 'emma-thompson.jpeg'),
	(11, 'Craig', 'Gillespie', 'craig-gillespie.jpeg'),
	(12, 'Matthew', 'McConaughey', 'matthew-mcconaughey.jpeg'),
	(13, 'Anne', 'Hathaway', 'anna-hathaway.jpeg'),
	(14, 'Jessica', 'Chastain', 'jessica-chastain.jpeg'),
	(15, 'Jonathan', 'Nolan', 'jonathan-nolan.jpeg'),
	(16, 'Christopher', 'Nolan', 'christopher-nolan.jpg'),
	(17, 'Charlize', 'Theron', 'charlize-theron.jpeg'),
	(18, 'Kiki', 'Layne', 'kiki-layne.jpeg'),
	(19, 'Matthias', 'Schoenaerts', 'matthias-schoen.jpeg'),
	(20, 'Gina', 'Prince-Bythewood', 'gina-p.jpeg'),
	(21, 'Leonardo', 'DiCaprio', 'leonardo-dicaprio.jpeg'),
	(22, 'Joseph', 'Gordon-Levitt', 'joseph-gordon.jpeg'),
	(23, 'Elliot', 'Page', 'elliot-page.jpeg'),
	(24, 'Keanu', 'Reeves', 'keanu-reeves.jpeg'),
	(25, 'Michael', 'Nyqvist', 'micheal-n.jpeg'),
	(26, 'Alfie', 'Allen', 'alfie-ellen.jpeg'),
	(27, 'Chad', 'Stahelski', 'Chad_Stahelski.jpg'),
	(28, 'David', 'Leitch', 'david-l.jpeg'),
	(29, 'Lana', 'Wachowski', 'lana-wachowski.jpeg'),
	(30, 'Lilly', 'Wachowski', 'lilly-wachowski.jpeg'),
	(32, 'Laurence', 'Fishburne', 'laurence-fisburne.jpeg'),
	(33, 'Carrie-Anne', 'Moss', 'carrie-anne-moss.jpeg'),
	(34, 'Bong Joon', 'Ho', 'bong-joon-ho.jpeg'),
	(35, 'Kang-ho', 'Song', 'kang-ho-song.jpeg'),
	(36, 'Sun-kyun', 'Lee', 'sun-kyun-lee.jpeg'),
	(37, 'Yeo-jeong', 'Cho', 'yeo-young-cho.jpeg')
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
	(7, 24, 'John Wick'),
	(7, 25,'Viggo Tarasov'),
	(7, 26, 'Losef Tarasov'),
	(8, 24, 'Neo'),
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
	(9, 34)
go

