<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210122084021 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE admin (id INT AUTO_INCREMENT NOT NULL, firstname VARCHAR(255) NOT NULL, lastname VARCHAR(255) NOT NULL, email VARCHAR(255) NOT NULL, password VARCHAR(255) NOT NULL, role VARCHAR(255) NOT NULL, image VARCHAR(1000) DEFAULT NULL, pseudo VARCHAR(255) NOT NULL, presentation VARCHAR(500) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE age_range (id INT AUTO_INCREMENT NOT NULL, author_id INT NOT NULL, label VARCHAR(255) NOT NULL, INDEX IDX_6CC5CDFF675F31B (author_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE article (id INT AUTO_INCREMENT NOT NULL, author_id INT NOT NULL, title VARCHAR(255) NOT NULL, source VARCHAR(1000) DEFAULT NULL, url VARCHAR(1000) DEFAULT NULL, image VARCHAR(1000) DEFAULT NULL, description VARCHAR(1000) DEFAULT NULL, update_date DATETIME DEFAULT NULL, creation_date DATETIME NOT NULL, content LONGTEXT NOT NULL, nb_like INT DEFAULT NULL, nb_dislike INT DEFAULT NULL, INDEX IDX_23A0E66F675F31B (author_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE article_category (article_id INT NOT NULL, category_id INT NOT NULL, INDEX IDX_53A4EDAA7294869C (article_id), INDEX IDX_53A4EDAA12469DE2 (category_id), PRIMARY KEY(article_id, category_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE article_age_range (article_id INT NOT NULL, age_range_id INT NOT NULL, INDEX IDX_DCF90CFB7294869C (article_id), INDEX IDX_DCF90CFB64482BF8 (age_range_id), PRIMARY KEY(article_id, age_range_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE category (id INT AUTO_INCREMENT NOT NULL, author_id INT NOT NULL, label VARCHAR(255) NOT NULL, INDEX IDX_64C19C1F675F31B (author_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE game (id INT AUTO_INCREMENT NOT NULL, author_id INT NOT NULL, title VARCHAR(255) NOT NULL, source VARCHAR(1000) DEFAULT NULL, url VARCHAR(1000) NOT NULL, image VARCHAR(1000) DEFAULT NULL, description VARCHAR(1000) DEFAULT NULL, update_date DATETIME DEFAULT NULL, creation_date DATETIME NOT NULL, content LONGTEXT NOT NULL, nb_like INT DEFAULT NULL, nb_dislike INT DEFAULT NULL, INDEX IDX_232B318CF675F31B (author_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE game_category (game_id INT NOT NULL, category_id INT NOT NULL, INDEX IDX_AD08E6E7E48FD905 (game_id), INDEX IDX_AD08E6E712469DE2 (category_id), PRIMARY KEY(game_id, category_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE game_age_range (game_id INT NOT NULL, age_range_id INT NOT NULL, INDEX IDX_D46A9DDDE48FD905 (game_id), INDEX IDX_D46A9DDD64482BF8 (age_range_id), PRIMARY KEY(game_id, age_range_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE glossary (id INT AUTO_INCREMENT NOT NULL, author_id INT NOT NULL, word VARCHAR(255) NOT NULL, definition LONGTEXT NOT NULL, source VARCHAR(1000) DEFAULT NULL, url VARCHAR(1000) DEFAULT NULL, glossary_category VARCHAR(255) DEFAULT NULL, INDEX IDX_B0850B43F675F31B (author_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE glossary_category (glossary_id INT NOT NULL, category_id INT NOT NULL, INDEX IDX_521DA9156ABB587D (glossary_id), INDEX IDX_521DA91512469DE2 (category_id), PRIMARY KEY(glossary_id, category_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE quizz (id INT AUTO_INCREMENT NOT NULL, author_id INT NOT NULL, title VARCHAR(255) NOT NULL, source VARCHAR(1000) DEFAULT NULL, url VARCHAR(1000) NOT NULL, image VARCHAR(1000) DEFAULT NULL, description VARCHAR(1000) DEFAULT NULL, update_date DATETIME DEFAULT NULL, creation_date DATETIME NOT NULL, question VARCHAR(1000) NOT NULL, answer VARCHAR(1000) NOT NULL, nb_like INT DEFAULT NULL, nb_dislike INT DEFAULT NULL, INDEX IDX_7C77973DF675F31B (author_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE quizz_category (quizz_id INT NOT NULL, category_id INT NOT NULL, INDEX IDX_8798E5D3BA934BCD (quizz_id), INDEX IDX_8798E5D312469DE2 (category_id), PRIMARY KEY(quizz_id, category_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE quizz_age_range (quizz_id INT NOT NULL, age_range_id INT NOT NULL, INDEX IDX_F5F4F96BBA934BCD (quizz_id), INDEX IDX_F5F4F96B64482BF8 (age_range_id), PRIMARY KEY(quizz_id, age_range_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE video (id INT AUTO_INCREMENT NOT NULL, author_id INT NOT NULL, title VARCHAR(255) NOT NULL, source VARCHAR(1000) DEFAULT NULL, url VARCHAR(1000) NOT NULL, image VARCHAR(1000) DEFAULT NULL, description VARCHAR(1000) DEFAULT NULL, update_date DATETIME DEFAULT NULL, creation_date DATETIME NOT NULL, content LONGTEXT NOT NULL, nb_like INT DEFAULT NULL, nb_dislike INT DEFAULT NULL, INDEX IDX_7CC7DA2CF675F31B (author_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE video_category (video_id INT NOT NULL, category_id INT NOT NULL, INDEX IDX_AECE2B7D29C1004E (video_id), INDEX IDX_AECE2B7D12469DE2 (category_id), PRIMARY KEY(video_id, category_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE video_age_range (video_id INT NOT NULL, age_range_id INT NOT NULL, INDEX IDX_C4B3214A29C1004E (video_id), INDEX IDX_C4B3214A64482BF8 (age_range_id), PRIMARY KEY(video_id, age_range_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE age_range ADD CONSTRAINT FK_6CC5CDFF675F31B FOREIGN KEY (author_id) REFERENCES admin (id)');
        $this->addSql('ALTER TABLE article ADD CONSTRAINT FK_23A0E66F675F31B FOREIGN KEY (author_id) REFERENCES admin (id)');
        $this->addSql('ALTER TABLE article_category ADD CONSTRAINT FK_53A4EDAA7294869C FOREIGN KEY (article_id) REFERENCES article (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE article_category ADD CONSTRAINT FK_53A4EDAA12469DE2 FOREIGN KEY (category_id) REFERENCES category (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE article_age_range ADD CONSTRAINT FK_DCF90CFB7294869C FOREIGN KEY (article_id) REFERENCES article (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE article_age_range ADD CONSTRAINT FK_DCF90CFB64482BF8 FOREIGN KEY (age_range_id) REFERENCES age_range (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE category ADD CONSTRAINT FK_64C19C1F675F31B FOREIGN KEY (author_id) REFERENCES admin (id)');
        $this->addSql('ALTER TABLE game ADD CONSTRAINT FK_232B318CF675F31B FOREIGN KEY (author_id) REFERENCES admin (id)');
        $this->addSql('ALTER TABLE game_category ADD CONSTRAINT FK_AD08E6E7E48FD905 FOREIGN KEY (game_id) REFERENCES game (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE game_category ADD CONSTRAINT FK_AD08E6E712469DE2 FOREIGN KEY (category_id) REFERENCES category (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE game_age_range ADD CONSTRAINT FK_D46A9DDDE48FD905 FOREIGN KEY (game_id) REFERENCES game (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE game_age_range ADD CONSTRAINT FK_D46A9DDD64482BF8 FOREIGN KEY (age_range_id) REFERENCES age_range (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE glossary ADD CONSTRAINT FK_B0850B43F675F31B FOREIGN KEY (author_id) REFERENCES admin (id)');
        $this->addSql('ALTER TABLE glossary_category ADD CONSTRAINT FK_521DA9156ABB587D FOREIGN KEY (glossary_id) REFERENCES glossary (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE glossary_category ADD CONSTRAINT FK_521DA91512469DE2 FOREIGN KEY (category_id) REFERENCES category (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE quizz ADD CONSTRAINT FK_7C77973DF675F31B FOREIGN KEY (author_id) REFERENCES admin (id)');
        $this->addSql('ALTER TABLE quizz_category ADD CONSTRAINT FK_8798E5D3BA934BCD FOREIGN KEY (quizz_id) REFERENCES quizz (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE quizz_category ADD CONSTRAINT FK_8798E5D312469DE2 FOREIGN KEY (category_id) REFERENCES category (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE quizz_age_range ADD CONSTRAINT FK_F5F4F96BBA934BCD FOREIGN KEY (quizz_id) REFERENCES quizz (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE quizz_age_range ADD CONSTRAINT FK_F5F4F96B64482BF8 FOREIGN KEY (age_range_id) REFERENCES age_range (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE video ADD CONSTRAINT FK_7CC7DA2CF675F31B FOREIGN KEY (author_id) REFERENCES admin (id)');
        $this->addSql('ALTER TABLE video_category ADD CONSTRAINT FK_AECE2B7D29C1004E FOREIGN KEY (video_id) REFERENCES video (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE video_category ADD CONSTRAINT FK_AECE2B7D12469DE2 FOREIGN KEY (category_id) REFERENCES category (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE video_age_range ADD CONSTRAINT FK_C4B3214A29C1004E FOREIGN KEY (video_id) REFERENCES video (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE video_age_range ADD CONSTRAINT FK_C4B3214A64482BF8 FOREIGN KEY (age_range_id) REFERENCES age_range (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE age_range DROP FOREIGN KEY FK_6CC5CDFF675F31B');
        $this->addSql('ALTER TABLE article DROP FOREIGN KEY FK_23A0E66F675F31B');
        $this->addSql('ALTER TABLE category DROP FOREIGN KEY FK_64C19C1F675F31B');
        $this->addSql('ALTER TABLE game DROP FOREIGN KEY FK_232B318CF675F31B');
        $this->addSql('ALTER TABLE glossary DROP FOREIGN KEY FK_B0850B43F675F31B');
        $this->addSql('ALTER TABLE quizz DROP FOREIGN KEY FK_7C77973DF675F31B');
        $this->addSql('ALTER TABLE video DROP FOREIGN KEY FK_7CC7DA2CF675F31B');
        $this->addSql('ALTER TABLE article_age_range DROP FOREIGN KEY FK_DCF90CFB64482BF8');
        $this->addSql('ALTER TABLE game_age_range DROP FOREIGN KEY FK_D46A9DDD64482BF8');
        $this->addSql('ALTER TABLE quizz_age_range DROP FOREIGN KEY FK_F5F4F96B64482BF8');
        $this->addSql('ALTER TABLE video_age_range DROP FOREIGN KEY FK_C4B3214A64482BF8');
        $this->addSql('ALTER TABLE article_category DROP FOREIGN KEY FK_53A4EDAA7294869C');
        $this->addSql('ALTER TABLE article_age_range DROP FOREIGN KEY FK_DCF90CFB7294869C');
        $this->addSql('ALTER TABLE article_category DROP FOREIGN KEY FK_53A4EDAA12469DE2');
        $this->addSql('ALTER TABLE game_category DROP FOREIGN KEY FK_AD08E6E712469DE2');
        $this->addSql('ALTER TABLE glossary_category DROP FOREIGN KEY FK_521DA91512469DE2');
        $this->addSql('ALTER TABLE quizz_category DROP FOREIGN KEY FK_8798E5D312469DE2');
        $this->addSql('ALTER TABLE video_category DROP FOREIGN KEY FK_AECE2B7D12469DE2');
        $this->addSql('ALTER TABLE game_category DROP FOREIGN KEY FK_AD08E6E7E48FD905');
        $this->addSql('ALTER TABLE game_age_range DROP FOREIGN KEY FK_D46A9DDDE48FD905');
        $this->addSql('ALTER TABLE glossary_category DROP FOREIGN KEY FK_521DA9156ABB587D');
        $this->addSql('ALTER TABLE quizz_category DROP FOREIGN KEY FK_8798E5D3BA934BCD');
        $this->addSql('ALTER TABLE quizz_age_range DROP FOREIGN KEY FK_F5F4F96BBA934BCD');
        $this->addSql('ALTER TABLE video_category DROP FOREIGN KEY FK_AECE2B7D29C1004E');
        $this->addSql('ALTER TABLE video_age_range DROP FOREIGN KEY FK_C4B3214A29C1004E');
        $this->addSql('DROP TABLE admin');
        $this->addSql('DROP TABLE age_range');
        $this->addSql('DROP TABLE article');
        $this->addSql('DROP TABLE article_category');
        $this->addSql('DROP TABLE article_age_range');
        $this->addSql('DROP TABLE category');
        $this->addSql('DROP TABLE game');
        $this->addSql('DROP TABLE game_category');
        $this->addSql('DROP TABLE game_age_range');
        $this->addSql('DROP TABLE glossary');
        $this->addSql('DROP TABLE glossary_category');
        $this->addSql('DROP TABLE quizz');
        $this->addSql('DROP TABLE quizz_category');
        $this->addSql('DROP TABLE quizz_age_range');
        $this->addSql('DROP TABLE video');
        $this->addSql('DROP TABLE video_category');
        $this->addSql('DROP TABLE video_age_range');
    }
}
