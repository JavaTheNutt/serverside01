CREATE TABLE albums
(
  albumid INT(11) PRIMARY KEY NOT NULL,
  albumname VARCHAR(50) NOT NULL,
  year YEAR(4) NOT NULL,
  genre VARCHAR(15) NOT NULL,
  artist INT(11),
  recordcompany INT(11),
  albumartwork VARCHAR(200) NOT NULL,
  CONSTRAINT fk_artist FOREIGN KEY (artist) REFERENCES artists (artistid),
  CONSTRAINT fk_recordcompany FOREIGN KEY (recordcompany) REFERENCES recordcompanies (companyid)
);
CREATE INDEX artist ON albums (artist);
CREATE UNIQUE INDEX name ON albums (albumname);
CREATE INDEX recordcompany ON albums (recordcompany);
CREATE TABLE artists
(
  artistid INT(11) PRIMARY KEY NOT NULL,
  artistname VARCHAR(20) NOT NULL,
  city VARCHAR(20),
  website VARCHAR(50)
);
CREATE UNIQUE INDEX name ON artists (artistname);
CREATE TABLE recordcompanies
(
  companyid INT(11) PRIMARY KEY NOT NULL,
  companyname VARCHAR(20) NOT NULL,
  companycity VARCHAR(20),
  representative VARCHAR(20),
  representativeemail VARCHAR(20),
  website VARCHAR(40) NOT NULL
);
CREATE UNIQUE INDEX companyname ON recordcompanies (companyname);
CREATE TABLE users
(
  uname CHAR(5) PRIMARY KEY NOT NULL,
  password CHAR(40) NOT NULL
);
CREATE UNIQUE INDEX users_uname_uindex ON users (uname);
CREATE TABLE customers
(
  customerid INT(11) PRIMARY KEY NOT NULL,
  customername VARCHAR(50) NOT NULL,
  customerstreet VARCHAR(30),
  customertown VARCHAR(20) NOT NULL,
  customeremail VARCHAR(50) NOT NULL,
  customerpassword CHAR(40) NOT NULL
);
CREATE TABLE review
(
  reviewid INT(11) PRIMARY KEY NOT NULL,
  review VARCHAR(1000) NOT NULL,
  album INT(11) NOT NULL,
  customer INT(11) NOT NULL,
  CONSTRAINT rev_alb_fk FOREIGN KEY (album) REFERENCES albums (albumid),
  CONSTRAINT rev_cust_fk FOREIGN KEY (customer) REFERENCES customers (customerid)
);
CREATE INDEX rev_alb_fk ON review (album);
CREATE INDEX rev_cust_fk ON review (customer);