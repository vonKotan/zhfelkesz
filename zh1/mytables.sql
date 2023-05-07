use maecenas;

CREATE TABLE creators (
    id INT AUTO_INCREMENT PRIMARY KEY,
    LastName varchar(100),
    FirstName varchar(100),
    Email varchar(100),
    Password varchar(100),
    DateOfBirth DATE,
    /*artist only things*/
    ArtistName varchar(100),
    Institute varchar(100),
    instituteID int,
    NOVids int,
    Followers int,
    FollowersList varchar(2000) 
);

CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    LastName varchar(100),
    FirstName varchar(100),
    Email varchar(100),
    Password varchar(100),
    DateOfBirth DATE,
    FollowingList varchar(2000)
);

CREATE TABLE videos (
    id INT AUTO_INCREMENT PRIMARY KEY,
    creator_id INT NOT NULL,
    views INT NOT NULL,
    length TIME NOT NULL,
    size INT NOT NULL,
    title VARCHAR(255) NOT NULL,
    description TEXT,sellers
    viewers INT NOT NULL,
    likes INT NOT NULL,
    comments INT NOT NULL,
    FOREIGN KEY (creator_id) REFERENCES creators(id)
);

CREATE TABLE user_creator (
   user_id INT,
   creator_id INT,
   FOREIGN KEY (user_id) REFERENCES users(id),
   FOREIGN KEY (creator_id) REFERENCES creators(id)
);

CREATE TABLE video_creator (
    video_id INT NOT NULL,
    creator_id INT NOT NULL,
    PRIMARY KEY (video_id, creator_id),
    FOREIGN KEY (video_id) REFERENCES videos(id),
    FOREIGN KEY (creator_id) REFERENCES creators(id)
);


