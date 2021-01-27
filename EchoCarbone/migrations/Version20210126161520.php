<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210126161520 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE age_range CHANGE author_id author_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE article CHANGE author_id author_id INT DEFAULT NULL, CHANGE update_date update_date DATETIME NOT NULL, CHANGE nb_like nb_like INT NOT NULL');
        $this->addSql('ALTER TABLE category CHANGE author_id author_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE game CHANGE author_id author_id INT DEFAULT NULL, CHANGE description description VARCHAR(1000) DEFAULT NULL, CHANGE update_date update_date DATETIME NOT NULL, CHANGE nb_like nb_like INT NOT NULL');
        $this->addSql('ALTER TABLE glossary CHANGE author_id author_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE quizz CHANGE author_id author_id INT DEFAULT NULL, CHANGE update_date update_date DATETIME NOT NULL');
        $this->addSql('ALTER TABLE video CHANGE author_id author_id INT DEFAULT NULL, CHANGE update_date update_date DATETIME NOT NULL');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE age_range CHANGE author_id author_id INT NOT NULL');
        $this->addSql('ALTER TABLE article CHANGE author_id author_id INT NOT NULL, CHANGE update_date update_date DATETIME DEFAULT NULL, CHANGE nb_like nb_like INT DEFAULT NULL');
        $this->addSql('ALTER TABLE category CHANGE author_id author_id INT NOT NULL');
        $this->addSql('ALTER TABLE game CHANGE author_id author_id INT NOT NULL, CHANGE description description VARCHAR(1000) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE update_date update_date DATETIME DEFAULT NULL, CHANGE nb_like nb_like INT DEFAULT NULL');
        $this->addSql('ALTER TABLE glossary CHANGE author_id author_id INT NOT NULL');
        $this->addSql('ALTER TABLE quizz CHANGE author_id author_id INT NOT NULL, CHANGE update_date update_date DATETIME DEFAULT NULL');
        $this->addSql('ALTER TABLE video CHANGE author_id author_id INT NOT NULL, CHANGE update_date update_date DATETIME DEFAULT NULL');
    }
}
