create table if not exists user
(
    user_id         int unique,
    first_name      varchar(255)    not null,
    last_name       varchar(255)    not null,
    dob             date            not null,
    email           varchar(255)    not null,
    passphrase      varchar(255)    not null,
    account_type    int             not null
);

create table if not exists meal_event
(
    event_id        int             unique,
    meal_date       date,
    meal_time       time,
    user_id         int,
    food_id         int
);

create table if not exists food
(
    food_id         int             unique,
    user_id         int,
    food_name       varchar(255),
    calories        int,
    protein         int,
    carbs           int
);

create table if not exists post
(
    post_id         int             unique,
    user_id         int,
    meal_id         int,
    post_desc       varchar(255),
    flag            int
);
