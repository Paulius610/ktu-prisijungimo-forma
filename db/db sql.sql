BEGIN TRANSACTION;
CREATE TABLE `users` (
	`id`	INTEGER,
	`nick`	TEXT,
	`email`	TEXT,
	`password`	TEXT,
	`rank`	INTEGER
);
COMMIT;
