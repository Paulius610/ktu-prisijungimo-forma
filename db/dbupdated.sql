
CREATE TABLE "votes" (
	`IDuser`	INTEGER,
	`IDpost`	INTEGER,
	`vote`	INTEGER
);
CREATE TABLE `users` (
	`id`	INTEGER,
	`nick`	TEXT,
	`email`	TEXT,
	`password`	TEXT,
	`rank`	INTEGER
);
CREATE TABLE "posts" (
	`ID`	INTEGER,
	`rank`	INTEGER,
	`content`	TEXT,
	`date`	INTEGER
);

