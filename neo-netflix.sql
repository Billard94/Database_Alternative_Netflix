--hello world 
-- Should make device_used its own table
--find a better alternative to age_range

drop schema project cascade;
create schema project;
set search_path = "project";

CREATE TABLE profile (
		user_id serial, 
		password varchar(20) NOT NULL, 
		last_name varchar(20) NOT NULL, 
		first_name varchar(20) NOT NULL, 
		email varchar(50) UNIQUE NOT NULL, 
		city varchar(20), 
		province varchar(20), 
		country varchar(20),
		year_born integer, 
		gender varchar(20), 
		occupation varchar(20), 
		picture_url varchar(255), 
		PRIMARY KEY ( user_id ),
		CHECK (gender = 'Male' OR gender = 'Female'),
		CHECK (occupation = 'Student' OR occupation = 'Professonal')
		);

CREATE TABLE topic(
		topic_id serial, 
		description varchar(20) UNIQUE NOT NULL,
		PRIMARY KEY ( topic_id )
		);

CREATE TABLE user_likes(
		user_id serial, 
		topic_id serial, 
		PRIMARY KEY ( user_id, topic_id ),
		FOREIGN KEY ( user_id ) REFERENCES profile ON DELETE CASCADE,
		FOREIGN KEY ( topic_id ) REFERENCES topic ON DELETE CASCADE
		);
				


CREATE TABLE movie(
		movie_id serial, 
		name varchar(50) NOT NULL, 
		date_released date,
		description text,
		picture_url varchar(255) DEFAULT 'http://viooz.la/images/no_poster.png', 
		PRIMARY KEY ( movie_id )
		);

CREATE TABLE watches(
		user_id serial, 
		movie_id serial, 
		date date, 
		rating integer,
		PRIMARY KEY ( user_id, movie_id ),
		FOREIGN KEY ( user_id ) REFERENCES profile ON DELETE CASCADE,
		FOREIGN KEY ( movie_id ) REFERENCES movie ON DELETE CASCADE,
		CHECK (rating >= 0 AND rating <= 10)
		);

CREATE TABLE movie_topics(
		topic_id serial, 
		movie_id serial, 
		language varchar(20), 
		subtitles varchar(20), 
		country varchar(20),
		PRIMARY KEY ( topic_id, movie_id ),
		FOREIGN KEY ( topic_id ) REFERENCES topic ON DELETE CASCADE,
		FOREIGN KEY ( movie_id ) REFERENCES movie ON DELETE CASCADE
		);

CREATE TABLE actor(
				actor_id serial,
				last_name VARCHAR(20) NOT NULL,
				first_name VARCHAR(20) NOT NULL,
				date_of_birth DATE,
				PRIMARY KEY ( actor_id )
				);


CREATE TABLE actor_plays(
				movie_id serial,
				actor_id serial,
				PRIMARY KEY ( movie_id, actor_id ),
				FOREIGN KEY ( movie_id ) REFERENCES movie ON DELETE CASCADE,
				FOREIGN KEY ( actor_id ) REFERENCES actor ON DELETE CASCADE
				);

CREATE TABLE director(
				director_id serial,
				last_name VARCHAR(20) NOT NULL,
				first_name VARCHAR(20) NOT NULL,
				country VARCHAR(20),
				PRIMARY KEY ( director_id )
				);

CREATE TABLE directs(
				director_id serial,
				movie_id serial,
				PRIMARY KEY ( director_id, movie_id ),
				FOREIGN KEY ( director_id ) REFERENCES director ON DELETE CASCADE,
				FOREIGN KEY ( movie_id ) REFERENCES movie ON DELETE CASCADE
				);

CREATE TABLE studio(
				studio_id serial,
				name VARCHAR(50) UNIQUE NOT NULL,
				country VARCHAR(20),
				PRIMARY KEY ( studio_id )
				);

CREATE TABLE sponsors(
				studio_id serial,
				movie_id serial,
				PRIMARY KEY ( studio_id, movie_id ),
				FOREIGN KEY ( studio_id ) REFERENCES studio ON DELETE CASCADE,
				FOREIGN KEY ( movie_id ) REFERENCES movie ON DELETE CASCADE
				);
CREATE TABLE comments(
				comment_id serial PRIMARY KEY,
				user_id serial,
				movie_id serial,
				comment_text text NOT NULL,
				comment_date date,
				FOREIGN KEY ( user_id ) REFERENCES profile ON DELETE CASCADE,
				FOREIGN KEY ( movie_id ) REFERENCES movie ON DELETE CASCADE
				);
