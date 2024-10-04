
CREATE TABLE Role (
    id INT PRIMARY KEY AUTO_INCREMENT,
    role VARCHAR(50) NOT NULL UNIQUE
);

CREATE TABLE Service (
    id INT PRIMARY KEY AUTO_INCREMENT,
    name VARCHAR(50) NOT NULL UNIQUE,
    slug VARCHAR(255),
    description TEXT NOT NULL,
    id_users int,
    FOREIGN KEY (id_users) REFERENCES users(id)
);

CREATE TABLE Users (
    id INT PRIMARY KEY AUTO_INCREMENT,
    name VARCHAR(50) NOT NULL,
    firstname VARCHAR(50) NOT NULL,
    email VARCHAR(255) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    dob DATE,
    id_role INT NOT NULL,
    id_service INT NOT NULL,
    FOREIGN KEY (id_role) REFERENCES Role(id)
);

CREATE TABLE Rapport (
    id INT PRIMARY KEY AUTO_INCREMENT,
    name VARCHAR(50) NOT NULL,
    dates DATE NOT NULL,
    state VARCHAR(255),
    recommended_food VARCHAR(255),
    recommended_weight INT,
    food_given VARCHAR(255),
    quantity_donated INT,
    description TEXT,
    commentaire TEXT,
    id_users INT NOT NULL,
    id_animal INT,
    FOREIGN KEY (id_users) REFERENCES Users(id),
    FOREIGN KEY (id_animal) REFERENCES Animal(id)
);

CREATE TABLE Race (
    id INT PRIMARY KEY AUTO_INCREMENT,
    race VARCHAR(50) NOT NULL UNIQUE
);

CREATE TABLE Habitat (
    id INT PRIMARY KEY AUTO_INCREMENT,
    name VARCHAR(50) NOT NULL UNIQUE,
    slug VARCHAR(255) NOT NULL UNIQUE
);

CREATE TABLE Animal (
    id INT PRIMARY KEY AUTO_INCREMENT,
    name VARCHAR(50) NOT NULL,
    age INT,
    slug VARCHAR(255),
    visits INT DEFAULT 0,
    id_race INT NOT NULL,
    id_habitat INT NOT NULL,
    FOREIGN KEY (id_race) REFERENCES Race(id),
    FOREIGN KEY (id_habitat) REFERENCES Habitat(id)
);

CREATE TABLE Horaire (
    id INT PRIMARY KEY AUTO_INCREMENT,
    horaire TEXT NOT NULL,
    id_users INT NOT NULL,
    FOREIGN KEY (id_users) REFERENCES Users(id)
);