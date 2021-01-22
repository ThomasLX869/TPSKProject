<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210121101347 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE admin (id INT AUTO_INCREMENT NOT NULL, firstname VARCHAR(255) NOT NULL, lastname VARCHAR(255) NOT NULL, email VARCHAR(255) NOT NULL, password VARCHAR(255) NOT NULL, role VARCHAR(255) NOT NULL, image VARCHAR(1000) DEFAULT NULL, pseudo VARCHAR(255) NOT NULL, presentation VARCHAR(500) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE age_range (id INT AUTO_INCREMENT NOT NULL, label VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE category (id INT AUTO_INCREMENT NOT NULL, label VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE glossary (id INT AUTO_INCREMENT NOT NULL, word VARCHAR(255) NOT NULL, definition LONGTEXT NOT NULL, source VARCHAR(1000) DEFAULT NULL, url VARCHAR(1000) DEFAULT NULL, glossary_category VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE quizz (id INT AUTO_INCREMENT NOT NULL, title VARCHAR(255) NOT NULL, source VARCHAR(1000) DEFAULT NULL, url VARCHAR(1000) NOT NULL, image VARCHAR(1000) DEFAULT NULL, quizz_category VARCHAR(255) NOT NULL, quizz_age_range VARCHAR(255) NOT NULL, description VARCHAR(1000) DEFAULT NULL, update_date DATETIME DEFAULT NULL, creation_date DATETIME NOT NULL, quizz_author VARCHAR(255) NOT NULL, question VARCHAR(1000) NOT NULL, answer VARCHAR(1000) NOT NULL, nb_like INT DEFAULT NULL, nb_dislike INT DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE video (id INT AUTO_INCREMENT NOT NULL, title VARCHAR(255) NOT NULL, source VARCHAR(1000) DEFAULT NULL, url VARCHAR(1000) NOT NULL, image VARCHAR(1000) DEFAULT NULL, video_category VARCHAR(255) NOT NULL, video_age_range VARCHAR(255) NOT NULL, description VARCHAR(1000) DEFAULT NULL, update_date DATETIME DEFAULT NULL, creation_date DATETIME NOT NULL, video_author VARCHAR(255) NOT NULL, content LONGTEXT NOT NULL, nb_like INT DEFAULT NULL, nb_dislike INT DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE admin');
        $this->addSql('DROP TABLE age_range');
        $this->addSql('DROP TABLE category');
        $this->addSql('DROP TABLE glossary');
        $this->addSql('DROP TABLE quizz');
        $this->addSql('DROP TABLE video');
    }
}
