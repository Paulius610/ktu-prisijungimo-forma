BEGIN TRANSACTION;
CREATE TABLE `db` (
	`UID`	INTEGER,
	`nickname`	TEXT,
	`email`	TEXT,
	`password`	TEXT
);
COMMIT;
