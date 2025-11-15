CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100),
    email VARCHAR(150)
);

INSERT INTO users (name, email) VALUES
('John Doe', 'john@example.com'),
('Alice Smith', 'alice@example.com');
