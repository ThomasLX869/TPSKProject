<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210126160452 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE article CHANGE description description VARCHAR(1000) NOT NULL');
        $this->addSql('ALTER TABLE game CHANGE description description VARCHAR(1000) NOT NULL');
        $this->addSql('ALTER TABLE quizz CHANGE update_date update_date DATETIME NOT NULL');
        $this->addSql('ALTER TABLE video CHANGE update_date update_date DATETIME NOT NULL, CHANGE content content LONGTEXT DEFAULT NULL');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE article CHANGE description description VARCHAR(1000) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE game CHANGE description description VARCHAR(1000) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE quizz CHANGE update_date update_date DATETIME DEFAULT NULL');
        $this->addSql('ALTER TABLE video CHANGE update_date update_date DATETIME DEFAULT NULL, CHANGE content content LONGTEXT CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`');
    }
}
