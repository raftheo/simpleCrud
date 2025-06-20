create table admin(
    admin_id int primary key auto_increment not null,
    admin_name varchar(250) not null,
    admin_email varchar(255) not null,
    admin_password varchar(250) not null
    
);

create table students(
    id int primary key auto_increment not null,
    name varchar(250) not null,
    lastname varchar(250) not null
);
