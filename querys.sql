--hello world

--a)
--user chooses movie_id
SELECT *
FROM movie
WHERE movie_id = VARIABLE

--b)
--need to determine the movie ID from the list
SELECT a.* 
FROM actor a, actor_plays ap
WHERE a.actor_id = ap.actor_id AND ap.movie_id = VARIABLE

--c)
--need to select topic_id
SELECT m.name, m.date_released
FROM movie m, movie_topics mt
WHERE m.movie_id = mt.movie_id AND mt.topic_id = VARIABLE;

--from the movie_id, determine studio and director information
SELECT s.*
FROM studio s, sponsors sp
WHERE s.studio_id = sp.studio_id AND sp.movie_id = VARIABLE

SELECT d.*
FROM director d, directs dr
WHERE d.director_id = dr.director_id AND dr.movie_id = VARIABLE

--d)
-- could probably be made better with an order by
SELECT *
FROM actor
WHERE actor_id IN (
				SELECT actor_id
				FROM actor_plays
				GROUP_BY actor_id
				HAVING COUNT(*) >= (
						SELECT COUNT(*)
						FROM actor_id
						GROUP BY actor_id
						)
				);

--e)
--abort, should do later, maybe with a real programming language
SELECT a.actor_id, b.actor_id
FROM actor_plays a, actor_plays b
WHERE a.actor_id <> b.actor_id
GROUP BY a.actor_plays, b.actor_plays
HAVING COUNT >= (
				SELECT COUNT(*)
				FROM actor_plays a, actor_plays b
				WHERE a.actor_id <> b.actor_id
				GROUP BY a.actor_plays, b.actor_plays
				)

--f)
SELECT m.name
FROM movie m, watches w
WHERE m.movie_id = w.movie_id
GROUP BY w.rating
ORDER BY w.rating DESC
LIMIT 10

--g)
SELECT m.*, t.description
FROM topic t, movie m, movie_topic mt, watches w
WHERE w.movie_id = m.movie_id AND mt.topic_id = t.topic_id AND m.movie_id = mt.movie_id AND w.rating = ( 
				SELECT max(rating)
				FROM watches
				)

--h)
SELECT COUNT(rating)
FROM profile NATURAL LEFT OUTER JOIN watches NATURAL LEFT OUTER JOIN movie
GROUP BY movie_id, user_id

--i)
SELECT *
FROM movie
where movie_id NOT IN (
				SELECT movie_id
				FROM watches
				WHERE date > '01-02-2016'
				)

--j)
-- need to choose the user id
SELECT m.name, m.date-released, d.last_name, d_first_name
FROM movie m, director d, directs dr, watches w
WHERE w.movie_id = m.movie_id AND dr.movie_id = m.movie_id AND dr.director_id = d.director_id AND w.movie_id = m.movie_id AND w.rating < ANY (
				SELECT rating
				FROM watches
				where user_id = VARIABLE
				)

--k) 
--really not sure if it works
--topic ID needs to be choosen
SELECT m.*, p.last_name, p.first_name
FROM movie m, profile p, watches w
WHERE m.movie_id = w.movie_id AND p.user_id = w.user_id AND EXISTS (
				SELECT w2.movie_id, w2.user_id
				FROM movie m2, watches w2
				WHERE m2.movie_id = w2.movie_id AND w.movie_id = w2.movie_id AND w.user_id = w2.user_id
				ORDER BY w2.rating DESC
				LIMIT 1
)

--l)
-- too open, do later

--m)
--question is vague, I will intrepret it as listing information for ratings equal to the three highest rating
SELECT p.*, w.*
FROM profile p, watches w
WHERE p.user_id = w.user_id AND w.rating IN
	(SELECT w.rating
	 FROM watches
	 ORDER BY w.rating DESC
	 LIMIT 3
	)

--n)
--can't do it because we assumed there's only one rating per customer per movie

--o)
SELECT p.last_name, p.first_name, p.email
FROM profile p, watches w
WHERE p.user_id = w.user_id AND w.rating < ANY (
				SELECT w2.rating
				FROM profile p2, watches w2
				WHERE p2.last_name = 'Smith' AND p2.first_name = 'John' AND p2.user_id = w2.user_id
				)

--p)
SELECT p.last_name, p.first_name, p.email, w.*
FROM profile p, watches w, (
				SELECT user_id, movie_id
				FROM watches
				GROUP BY user_id, movie_id
				HAVING stddev(rating) > 3) as helper
WHERE p.user_id = w.user_id AND w.user_id = helper.user_id AND w.movie_id = helper.movie_id

--custom queries

SELECT COUNT(*)
FROM watches
WHERE user_id = VARIABLE
GROUP BY user_id

SELECT COUNT(*), COUNT(*) * 10 as score
FROM watches
WHERE user_id = VARIABLE AND rating <> null
GROUP BY user_id


--customized querized

--10 best movies
SELECT m.name, AVG(w.rating) as av
FROM movie m, watches w
WHERE m.movie_id = w.movie_id
GROUP BY m.movie_id, m.name
ORDER BY av DESC
LIMIT 10

--10 most watched movies
SELECT m.name, COUNT(*) as cnt 
FROM movie m, watches w
WHERE m.movie_id = w.movie_id
GROUP BY m.movie_id, m.name
ORDER BY cnt DESC
LIMIT 10

--3 favorite topics
SELECT TOPIC_ID, NB_LIKES
FROM USER_LIKES
ORDER BY nb_likes DESC
LIMIT 3

--most watched topics of the user

SELECT t.description, COUNT(*) as cnt
FROM profile p, watches w, movie m, movie_topics mt, topic t
WHERE p.user_id = w.user_id AND w.movie_id = m.movie_id AND m.movie_id = mt.movie_id AND mt.topic_id = t.topic_id
GROUP BY t.description, t.topic_id
ORDER BY cnt

--most watched by people of same sex and same age group

SELECT m.movie_id, m.picture_url, m.name
FROM watches w, profile p1, profile p2
WHERE p1.user_ID = VARIABLE AND p1.year <= p2.year + 5 AND p1.year >= p2.year - 5 AND p1.gender = p2.gender AND p2.user_id = w.user_id AND w.movie_id = m.movie_id
GROUP BY  m.movie_id, m.picture_url, m.name
ORDER BY AVG(w.rating)
limit 10

--delete

--movie
DELETE FROM movie
where movie_id = $movie_id;

--director
DELETE FROM director
where director_id = $director_id;

--user
DELETE FROM profile
where user_id = $user_id;

--studio
DELETE FROM studio
where studio_id = $studio_id;

--actor
DELETE FROM actor
where actor_id = $actor_id;

-- return all the topics of a specific movie
SELECT mt.movie_topic
FROM movie m, movie_topics mt, topic t
WHERE m.movie_id = mt.movie_id AND t.topic_id = mt.topic_id;

--query to search something in all 
SELECT 'profile' as table, user_id, last_name, first_name 
FROM profile
WHERE first_name || last_name ILIKE "%$variable%"
UNION ALL
SELECT 'movie', movie_id, '', name 
FROM movie
WHERE name ILIKE "%$variable%"
UNION ALL
SELECT 'director', director_id, last_name, first_name
FROM director
WHERE first_name || last_name ILIKE "%$variable%"
UNION ALL
SELECT 'studio', studio_id, '', name
FROM studio
WHERE name ILIKE "%$variable%";
