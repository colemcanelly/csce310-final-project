DROP TABLE
    user,
    meal_event,
    food,
    post,
    comment;

create table if not exists user
(
    user_id         int             PRIMARY KEY,
    first_name      varchar(255)    not null,
    last_name       varchar(255)    not null,
    dob             date            not null,
    email           varchar(255)    not null,
    passphrase      varchar(255)    not null,
    account_type    int             not null
);

create table if not exists meal_event
(
    event_id        int             PRIMARY KEY,
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

create table if not exists food
(
    food_id         int             PRIMARY KEY         unique,
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

create table if not exists post
(
    post_id         int           PRIMARY KEY           unique,
    user_id         int,
    CONSTRAINT `fk_post_user`
        FOREIGN KEY (user_id) REFERENCES user (user_id)
        ON DELETE CASCADE
        ON UPDATE RESTRICT
    meal_id         int,
        CONSTRAINT `fk_post_meal`
        FOREIGN KEY (meal_id) REFERENCES meal (meal_id)
        ON DELETE CASCADE
        ON UPDATE RESTRICT
    post_desc       varchar(255),
    flag            int
);

create table if not exists comment
(
    comment_id      int           PRIMARY KEY           unique,
    user_id         int,
        CONSTRAINT `fk_comment_user`
        FOREIGN KEY (user_id) REFERENCES user (user_id)
        ON DELETE CASCADE
        ON UPDATE RESTRICT
    post_id         int,
        CONSTRAINT `fk_comment_post`
        FOREIGN KEY (post_id) REFERENCES post (post_id)
        ON DELETE CASCADE
        ON UPDATE RESTRICT
    emoji           varchar(30),
    comment_text    varchar(255)
);
