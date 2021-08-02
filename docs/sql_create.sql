create table cms_users (
    id int AUTO_INCREMENT PRIMARY KEY NOT NULL,
    username varchar(255) NOT NULL,
    password text NOT NULL
);

insert into `cms_users`(`username`, `password`) VALUES ('tutorialuser','123');

create table cms_articles (
    id int AUTO_INCREMENT PRIMARY KEY NOT NULL,
    title varchar(255) NOT NULL,
    summary varchar(255) NOT NULL,
    published datetime NOT NULL,
    content text,
    author varchar(255) NOT NULL
);