-- written by Ian Beckett and Cole McAnelly
/*
This file will be run to generate our database,
and even loads some example data into some tables for
ease of use.
*/


-- DROP all tables and views to create new entries
/* needs to follow a certain order so that FK constraints dont prevent drop */
-- Written by CM
DROP TABLE
    comment,
    meal_event,
    post,
    food,
    user;

DROP VIEW food_id_name;
DROP VIEW food_names;


-- by EB
create table user
(
    user_id         int             PRIMARY KEY         AUTO_INCREMENT,
    first_name      varchar(255)    not null,
    last_name       varchar(255)    not null,
    dob             date            not null,
    email           varchar(255)    not null unique,
    passphrase      varchar(255)    not null,
    account_type    int             not null
);

-- by EB
create table food
(
    food_id         int             PRIMARY KEY         AUTO_INCREMENT,
    user_id         int,
    CONSTRAINT `fk_food_user`
        FOREIGN KEY (user_id) REFERENCES user (user_id)
        ON DELETE CASCADE
        ON UPDATE RESTRICT,
    food_name       varchar(255),
    calories        int,
    protein         int,
    carbs           int
);

-- by CM
create table meal_event
(
    event_id        int             PRIMARY KEY         AUTO_INCREMENT,
    meal_name      varchar(255),
    meal_date       date,
    meal_start_time time,
    meal_end_time   time,
    user_id         int,
    CONSTRAINT `fk_event_user`
        FOREIGN KEY (user_id) REFERENCES user (user_id)
        ON DELETE CASCADE
        ON UPDATE RESTRICT,
    food_id         int,
    CONSTRAINT `fk_event_food`
        FOREIGN KEY (food_id) REFERENCES food (food_id)
        ON DELETE CASCADE
        ON UPDATE RESTRICT
);

-- by EB
create table post
(
    post_id         int           PRIMARY KEY           AUTO_INCREMENT,
    user_id         int,
    CONSTRAINT `fk_post_user`
        FOREIGN KEY (user_id) REFERENCES user (user_id)
        ON DELETE CASCADE
        ON UPDATE RESTRICT,
    food_id         int,
    CONSTRAINT `fk_post_food`
        FOREIGN KEY (food_id) REFERENCES food (food_id)
        ON DELETE CASCADE
        ON UPDATE RESTRICT,
    post_desc       varchar(255),
    flag            int
);

-- by EB
create table comment
(
    comment_id      int           PRIMARY KEY           AUTO_INCREMENT,
    user_id         int,
        CONSTRAINT `fk_comment_user`
        FOREIGN KEY (user_id) REFERENCES user (user_id)
        ON DELETE CASCADE
        ON UPDATE RESTRICT,
    post_id         int,
        CONSTRAINT `fk_comment_post`
        FOREIGN KEY (post_id) REFERENCES post (post_id)
        ON DELETE CASCADE
        ON UPDATE RESTRICT,
    emoji           varchar(30),
    comment_text    varchar(255)
);

/*Margaret Zhuang, shows food ids with the same name*/
CREATE VIEW food_names AS
SELECT food_name, GROUP_CONCAT(food_id ORDER BY food_id) AS food_ids
FROM food
GROUP BY food_name;

/*Margaret Zhuang, index to food info above a certain calorie count*/
CREATE INDEX idx_calories ON food (calories);

/* index written by Ian Beckett */
create index user_food_idx ON food (user_id);

 /* view written by Ian Beckett */
 /* show user's profile data and foods they've added */
create view if not exists user_food as
    select
        `user`.`first_name`,
        `user`.`last_name`,
        `food`.`food_name`,
        `food`.`calories`,
        `food`.`protein`,
        `food`.`carbs`
from `user` inner join `food` using (`user_id`);
/* create view if not exists user_profile as
    select
        `user`.`first_name`,
        `user`.`last_name`,
        `user`.`dob`,
        `user`.`email`,
        `user`.`account_type`,
        `food`.`food_name`
    from `user` inner join `food` using (`user_id`); */




-- Cole McAnelly: Index for each user's events
CREATE INDEX user_event_idx ON meal_event (user_id);

-- Cole McAnelly: View for getting the id and name of each food
-- Used in ./foodies/components/calendar/meal-picker.php
CREATE VIEW food_id_name AS
SELECT `user_id`, `food_id`, `food_name`
FROM `food`;
    

-- by CM
-- Example data for testing purposes
LOAD DATA INFILE '/xampp/htdocs/foodies/queries/users.csv' INTO TABLE user FIELDS TERMINATED BY ',';
LOAD DATA INFILE '/xampp/htdocs/foodies/queries/food.csv' INTO TABLE food FIELDS TERMINATED BY ',';
LOAD DATA INFILE '/xampp/htdocs/foodies/queries/meals.csv' INTO TABLE meal_event FIELDS TERMINATED BY ',';