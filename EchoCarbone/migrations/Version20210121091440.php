<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210121091440 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE article (id INT AUTO_INCREMENT NOT NULL, title VARCHAR(255) NOT NULL, source VARCHAR(1000) DEFAULT NULL, url VARCHAR(1000) NOT NULL, image VARCHAR(1000) DEFAULT NULL, article_category VARCHAR(255) NOT NULL, article_age_range VARCHAR(255) NOT NULL, description VARCHAR(1000) DEFAULT NULL, update_date DATETIME DEFAULT NULL, creation_date DATETIME NOT NULL, article_author VARCHAR(255) NOT NULL, content LONGTEXT NOT NULL, nb_like INT DEFAULT NULL, nb_dislike INT DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE game (id INT AUTO_INCREMENT NOT NULL, title VARCHAR(255) NOT NULL, source VARCHAR(1000) DEFAULT NULL, url VARCHAR(1000) NOT NULL, image VARCHAR(1000) DEFAULT NULL, game_category VARCHAR(255) NOT NULL, game_age_range INT NOT NULL, description VARCHAR(1000) DEFAULT NULL, update_date DATETIME DEFAULT NULL, creation_date DATETIME NOT NULL, game_author VARCHAR(255) NOT NULL, content LONGTEXT NOT NULL, nb_like INT DEFAULT NULL, nb_dislike INT DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE quizz (id INT AUTO_INCREMENT NOT NULL, title VARCHAR(255) NOT NULL, source VARCHAR(1000) DEFAULT NULL, url VARCHAR(1000) NOT NULL, image VARCHAR(1000) DEFAULT NULL, quizz_category VARCHAR(255) NOT NULL, quizz_age_range VARCHAR(255) NOT NULL, description VARCHAR(1000) DEFAULT NULL, update_date DATETIME DEFAULT NULL, creation_date DATETIME NOT NULL, quizz_author VARCHAR(255) NOT NULL, question VARCHAR(1000) NOT NULL, answer VARCHAR(1000) NOT NULL, nb_like INT DEFAULT NULL, nb_dislike INT DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE video (id INT AUTO_INCREMENT NOT NULL, title VARCHAR(255) NOT NULL, source VARCHAR(1000) DEFAULT NULL, url VARCHAR(1000) NOT NULL, image VARCHAR(1000) DEFAULT NULL, video_category VARCHAR(255) NOT NULL, video_age_range VARCHAR(255) NOT NULL, description VARCHAR(1000) DEFAULT NULL, update_date DATETIME DEFAULT NULL, creation_date DATETIME NOT NULL, video_author VARCHAR(255) NOT NULL, content LONGTEXT NOT NULL, nb_like INT DEFAULT NULL, nb_dislike INT DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE article');
        $this->addSql('DROP TABLE game');
        $this->addSql('DROP TABLE quizz');
        $this->addSql('DROP TABLE video');
    }
}
