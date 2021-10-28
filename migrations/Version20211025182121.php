<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20211025182121 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE court (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, name VARCHAR(60) NOT NULL)');
        $this->addSql('CREATE TABLE player (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, created_at DATETIME NOT NULL --(DC2Type:datetime_immutable)
        , first_name VARCHAR(60) NOT NULL, last_name VARCHAR(60) NOT NULL, is_active BOOLEAN NOT NULL)');
        $this->addSql('CREATE TABLE reservation (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, court_id_id INTEGER NOT NULL, created_at DATETIME NOT NULL --(DC2Type:datetime_immutable)
        , start_at DATETIME NOT NULL, end_at DATETIME NOT NULL)');
        $this->addSql('CREATE INDEX IDX_42C849558A85290F ON reservation (court_id_id)');
        $this->addSql('CREATE TABLE reservation_player (reservation_id INTEGER NOT NULL, player_id INTEGER NOT NULL, PRIMARY KEY(reservation_id, player_id))');
        $this->addSql('CREATE INDEX IDX_D0E833FEB83297E7 ON reservation_player (reservation_id)');
        $this->addSql('CREATE INDEX IDX_D0E833FE99E6F5DF ON reservation_player (player_id)');
        $this->addSql('DROP INDEX UNIQ_8D93D649F85E0677');
        $this->addSql('CREATE TEMPORARY TABLE __temp__user AS SELECT id, username, roles, password FROM user');
        $this->addSql('DROP TABLE user');
        $this->addSql('CREATE TABLE user (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, player_id INTEGER DEFAULT NULL, username VARCHAR(180) NOT NULL COLLATE BINARY, roles CLOB NOT NULL COLLATE BINARY --(DC2Type:json)
        , password VARCHAR(255) NOT NULL COLLATE BINARY, CONSTRAINT FK_8D93D64999E6F5DF FOREIGN KEY (player_id) REFERENCES player (id) NOT DEFERRABLE INITIALLY IMMEDIATE)');
        $this->addSql('INSERT INTO user (id, username, roles, password) SELECT id, username, roles, password FROM __temp__user');
        $this->addSql('DROP TABLE __temp__user');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_8D93D649F85E0677 ON user (username)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_8D93D64999E6F5DF ON user (player_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE court');
        $this->addSql('DROP TABLE player');
        $this->addSql('DROP TABLE reservation');
        $this->addSql('DROP TABLE reservation_player');
        $this->addSql('DROP INDEX UNIQ_8D93D649F85E0677');
        $this->addSql('DROP INDEX UNIQ_8D93D64999E6F5DF');
        $this->addSql('CREATE TEMPORARY TABLE __temp__user AS SELECT id, username, roles, password FROM user');
        $this->addSql('DROP TABLE user');
        $this->addSql('CREATE TABLE user (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, username VARCHAR(180) NOT NULL, roles CLOB NOT NULL --(DC2Type:json)
        , password VARCHAR(255) NOT NULL)');
        $this->addSql('INSERT INTO user (id, username, roles, password) SELECT id, username, roles, password FROM __temp__user');
        $this->addSql('DROP TABLE __temp__user');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_8D93D649F85E0677 ON user (username)');
    }
}
