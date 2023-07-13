-- Création de la base de données
CREATE DATABASE gestionnaire de contacts;

-- Utilisation de la base de données
USE gestion_contacts;

-- Création de la table des contacts
CREATE TABLE contacts (
  id INT AUTO_INCREMENT PRIMARY KEY,
  nom VARCHAR(50) NOT NULL,
  telephone VARCHAR(20) NOT NULL,
  email VARCHAR(50) NOT NULL
);
