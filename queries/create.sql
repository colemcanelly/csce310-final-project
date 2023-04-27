create table if not exists user
(
    PRIMARY KEY (user_id)         int unique auto_increment,
    first_name      varchar(255)    not null,
    last_name       varchar(255)    not null,
    dob             date            not null,
    email           varchar(255)    not null,
    passphrase      varchar(255)    not null,
    account_type    int             not null
);

create table if not exists meal_event
(
    PRIMARY KEY (event_id)        int             unique auto_increment,
    meal_date       date,
    meal_time       time,
    FOREIGN KEY (user_id)         int,
    FOREIGN LEY (food_id)         int
);

create table if not exists food
(
    PRIMARY KEY (food_id)         int             unique auto_increment,
    FOREIGN KEY (user_id)         int,
    food_name       varchar(255),
    calories        int,
    protein         int,
    carbs           int
);

create table if not exists post
(
    PRIMARY KEY (post_id)         int             unique auto_increment,
    FOREIGN KEY (user_id)         int,
    FOREIGN KEY (meal_id)         int,
    post_desc       varchar(255),
    flag            int
);

create table if not exists comment
(
    PRIMARY KEY (comment_id)      int             unique auto_increment,
    FOREIGN KEY (user_id)         int,
    FOREIGN KEY (post_id)         int,
    emoji           varchar(30),
    comment_text    varchar(255)
);