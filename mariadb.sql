CREATE TABLE test (
  a int(11),
  b varchar(100)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE test_led (
  name varchar(10)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE test_user (
  username varchar(20),
  password varchar(100),
  name varchar(20),
  PRIMARY KEY (username)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO test_led(name) VALUES('yellow');

INSERT INTO test_user(username, password, name) VALUES('admin', '$2y$10$N8VSXSVOFYXhXiSS4MfQ0Ofdg4Mk7mgO9XQKSKtsHu/XZ7zc3UNXC', '어드민');