-- written by Ian Beckett and Cole McAnelly
-- DROP all tables to create new entries
/* needs to follow a certain order so that FK constraints dont prevent drop */
DROP TABLE
    comment,
    meal_event,
    post,
    food,
    user;

create table user
(
    user_id         int             PRIMARY KEY         AUTO_INCREMENT,
    first_name      varchar(255)    not null,
    last_name       varchar(255)    not null,
    dob             date            not null,
    email           varchar(255)    not null,
    passphrase      varchar(255)    not null,
    account_type    int             not null
);

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

create table meal_event
(
    event_id        int             PRIMARY KEY         AUTO_INCREMENT,
    meal_date       date,
    meal_time       time,
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
