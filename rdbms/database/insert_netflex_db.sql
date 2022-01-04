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

insert into Movie(movieID, title, publicationYear, duration, description)
values
	(1, 'Venom', 2018, 112, 'A failed reporter is bonded to an alien entity, one of many symbiotes who have invaded Earth. But the being takes a liking to Earth and decides to protect it.'),
	(2, 'Free Guy', 2021, 115, 'A bank teller discovers that he''s actually an NPC inside a brutal, open world video game.')
go

insert into Genre(genreName)
values
	('Actie'),
	('Avontuur'),
	('Sci-Fi'),
	('Comedy')
go

insert into MovieGenre(movieID, genreName)
values
	(1, 'Actie'),
	(1, 'Avontuur'),
	(1, 'Sci-Fi'),
	(2, 'Actie'),
	(2, 'Avontuur'),
	(2, 'Comedy')
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
	(8, 'Shawn', 'Levy')
go

insert into MovieCast(movieID, personID, characterName)
values
	(1, 1, 'Eddie Brock'),
	(1, 2, 'Anne Weying'),
	(1, 3, 'Carlton Drake'),
	(2, 5, 'Guy'),
	(2, 6, 'Millie'),
	(2, 7, 'Antwan')
go

insert into MovieDirector(movieID, personID)
values
	(1, 4),
	(2, 8)
go

