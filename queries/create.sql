create table if not exists user
(
    user_id         int             unique      auto_increment,
    first_name      varchar(255)    not null,
    last_name       varchar(255)    not null,
    dob             date            not null,
    email           varchar(255)    not null,
    passphrase      varchar(255)    not null,
    account_type    int             not null
);

create table if not exists meal_event
(
    
);