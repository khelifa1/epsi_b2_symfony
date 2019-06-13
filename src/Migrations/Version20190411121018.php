<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20190411121018 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE base CHANGE created_at created_at DATETIME NOT NULL, CHANGE update_at update_at DATETIME NOT NULL, CHANGE deleted_at deleted_at DATETIME DEFAULT NULL, CHANGE isactive isactive TINYINT(1) NOT NULL');
        $this->addSql('ALTER TABLE pokemon CHANGE created_at created_at DATETIME NOT NULL, CHANGE update_at update_at DATETIME NOT NULL, CHANGE deleted_at deleted_at DATETIME DEFAULT NULL, CHANGE isactive isactive TINYINT(1) NOT NULL');
        $this->addSql('ALTER TABLE attack CHANGE created_at created_at DATETIME NOT NULL, CHANGE update_at update_at DATETIME NOT NULL, CHANGE deleted_at deleted_at DATETIME DEFAULT NULL, CHANGE isactive isactive TINYINT(1) NOT NULL');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE attack CHANGE created_at created_at VARCHAR(255) NOT NULL COLLATE utf8mb4_unicode_ci, CHANGE update_at update_at VARCHAR(255) NOT NULL COLLATE utf8mb4_unicode_ci, CHANGE deleted_at deleted_at VARCHAR(255) NOT NULL COLLATE utf8mb4_unicode_ci, CHANGE isactive isactive VARCHAR(255) NOT NULL COLLATE utf8mb4_unicode_ci');
        $this->addSql('ALTER TABLE base CHANGE created_at created_at VARCHAR(255) NOT NULL COLLATE utf8mb4_unicode_ci, CHANGE update_at update_at VARCHAR(255) NOT NULL COLLATE utf8mb4_unicode_ci, CHANGE deleted_at deleted_at VARCHAR(255) NOT NULL COLLATE utf8mb4_unicode_ci, CHANGE isactive isactive VARCHAR(255) NOT NULL COLLATE utf8mb4_unicode_ci');
        $this->addSql('ALTER TABLE pokemon CHANGE created_at created_at VARCHAR(255) NOT NULL COLLATE utf8mb4_unicode_ci, CHANGE update_at update_at VARCHAR(255) NOT NULL COLLATE utf8mb4_unicode_ci, CHANGE deleted_at deleted_at VARCHAR(255) NOT NULL COLLATE utf8mb4_unicode_ci, CHANGE isactive isactive VARCHAR(255) NOT NULL COLLATE utf8mb4_unicode_ci');
    }
}
