<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20190410140918 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE pokemon_attack (pokemon_id INT NOT NULL, attack_id INT NOT NULL, INDEX IDX_2B29516F2FE71C3E (pokemon_id), INDEX IDX_2B29516FF5315759 (attack_id), PRIMARY KEY(pokemon_id, attack_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE potions (id INT AUTO_INCREMENT NOT NULL, vie INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE pokemon_attack ADD CONSTRAINT FK_2B29516F2FE71C3E FOREIGN KEY (pokemon_id) REFERENCES pokemon (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE pokemon_attack ADD CONSTRAINT FK_2B29516FF5315759 FOREIGN KEY (attack_id) REFERENCES attack (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE base DROP name');
        $this->addSql('ALTER TABLE attack ADD created_at VARCHAR(255) NOT NULL, ADD update_at VARCHAR(255) NOT NULL, ADD deleted_at VARCHAR(255) NOT NULL, ADD isactive VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE pokemon ADD created_at VARCHAR(255) NOT NULL, ADD update_at VARCHAR(255) NOT NULL, ADD deleted_at VARCHAR(255) NOT NULL, ADD isactive VARCHAR(255) NOT NULL, CHANGE power pv INT NOT NULL');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('DROP TABLE pokemon_attack');
        $this->addSql('DROP TABLE potions');
        $this->addSql('ALTER TABLE attack DROP created_at, DROP update_at, DROP deleted_at, DROP isactive');
        $this->addSql('ALTER TABLE base ADD name VARCHAR(255) NOT NULL COLLATE utf8mb4_unicode_ci');
        $this->addSql('ALTER TABLE pokemon DROP created_at, DROP update_at, DROP deleted_at, DROP isactive, CHANGE pv power INT NOT NULL');
    }
}
