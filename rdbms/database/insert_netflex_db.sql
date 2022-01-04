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
	(4, 'Interstellar', 2014, 169, 'interstellar.jpg', 'A team of explorers travel through a wormhole in space in an attempt to ensure humanity''s survival.')
go

insert into Genre(genreName)
values
	('Actie'),
	('Avontuur'),
	('Sci-Fi'),
	('Comedy'),
	('Misdaad'),
	('Drama')
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
	(4, 'Sci-Fi')
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
	(16, 'Christopher', 'Nolan')
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
	(4, 14, 'Murph')
go

insert into MovieDirector(movieID, personID)
values
	(1, 4),
	(2, 8),
	(3, 11),
	(4, 15),
	(4, 16)
go

