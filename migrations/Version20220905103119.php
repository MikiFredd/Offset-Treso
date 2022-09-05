<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220905103119 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE mission_order_personnes_abord (mission_order_id INT NOT NULL, personnes_abord_id INT NOT NULL, INDEX IDX_B179DB6585636C81 (mission_order_id), INDEX IDX_B179DB654F6A91F6 (personnes_abord_id), PRIMARY KEY(mission_order_id, personnes_abord_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE personnes_abord (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(255) NOT NULL, prenom VARCHAR(255) NOT NULL, fonction VARCHAR(255) NOT NULL, created_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', updated_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE mission_order_personnes_abord ADD CONSTRAINT FK_B179DB6585636C81 FOREIGN KEY (mission_order_id) REFERENCES mission_order (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE mission_order_personnes_abord ADD CONSTRAINT FK_B179DB654F6A91F6 FOREIGN KEY (personnes_abord_id) REFERENCES personnes_abord (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE mission_order ADD created_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', ADD updated_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\'');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE mission_order_personnes_abord DROP FOREIGN KEY FK_B179DB6585636C81');
        $this->addSql('ALTER TABLE mission_order_personnes_abord DROP FOREIGN KEY FK_B179DB654F6A91F6');
        $this->addSql('DROP TABLE mission_order_personnes_abord');
        $this->addSql('DROP TABLE personnes_abord');
        $this->addSql('ALTER TABLE mission_order DROP created_at, DROP updated_at');
    }
}
