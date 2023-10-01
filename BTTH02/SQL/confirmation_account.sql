CREATE TABLE confirmation_account (
  id INT PRIMARY KEY,
  token TEXT NOT NULL,
  FOREIGN KEY (id) REFERENCES users(id)
);


SELECT * FROM confirmation_account