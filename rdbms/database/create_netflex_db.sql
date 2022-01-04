use master
go

ALTER DATABASE [netflex] SET SINGLE_USER WITH ROLLBACK IMMEDIATE
go
DROP DATABASE IF EXISTS [netflex]
go

create database netflex
go

use netflex
go

CREATE LOGIN applicatie WITH PASSWORD = 'testpassword!Hallo-1244!';
CREATE USER applicatie;
ALTER ROLE db_datareader ADD MEMBER applicatie;
ALTER ROLE db_datawriter ADD MEMBER applicatie;
ALTER DATABASE [netflex] SET MULTI_USER;
GO

create table Movie(
	movieID int not null,

	title varchar(255) not null,
	publicationYear int,
	duration int,

	description varchar(510),

	coverImage varchar(255),
	trailerURL varchar(255),
	movieURL varchar(255),
	
	addedOn date default getdate() not null,

	constraint PK_Movie primary key(movieID),
	constraint CK_PublicationYearDuration check(publicationYear >= 0 AND duration >= 0)
)
go


create table Genre(
	genreName varchar(255) not null,
	description varchar(255),
	
	constraint PK_Genre primary key(genreName)
)
go

create table MovieGenre(
	movieID int not null,
	genreName varchar(255) not null,
	
	constraint PK_MovieGenre primary key(movieID, genreName),
	constraint FK_Movie foreign key(movieID) references Movie(movieID),
	constraint FK_Genre foreign key(genreName) references Genre(genreName)
)
go



create table Person(
	personID int not null,
	firstName varchar(20) not null,
	lastName varchar(50) not null,
	gender char,

	constraint PK_Person primary key(personID),
	constraint AK_Person unique(firstName, lastName)
)
go

create table MovieCast(
	movieID int not null,
	personID int not null,
	characterName varchar(255),

	constraint PK_MovieCast primary key(movieID, personID),
	constraint FK_CastMovie foreign key(movieID) references Movie(movieID),
	constraint FK_CastPerson foreign key(personID) references Person(personID)
)
go

create table MovieDirector (
	movieID int not null,
	personID int not null,

	constraint PK_regisseur primary key(movieID, personID),
	constraint FK_DirectorMovie foreign key(movieID) references Movie(movieID),
	constraint FK_DirectorPerson foreign key(personID) references Person(personID)
)
go


create table Subscription(
	subscriptionID int not null,
	price float not null,
	name varchar(255) not null,

	constraint PK_Subscription primary key(subscriptionID)
)

create table Users (
	userID int not null identity(1,1),

	email varchar(255) not null,
	firstName varchar(20) not null,
	lastName varchar(50) not null,
	birthYear int not null,
	accountNumber varchar(18) not null,

	subscriptionID int not null,

	constraint PK_Users primary key(userID),
	constraint FK_Subscription foreign key(subscriptionID) references Subscription(subscriptionID),
	constraint AK_email unique(email)
)
go