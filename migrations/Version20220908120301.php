<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220908120301 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE mission_order_personnes_abord DROP FOREIGN KEY FK_B179DB654F6A91F6');
        $this->addSql('ALTER TABLE mission_order_personnes_abord DROP FOREIGN KEY FK_B179DB6585636C81');
        $this->addSql('DROP TABLE mission_order');
        $this->addSql('DROP TABLE mission_order_personnes_abord');
        $this->addSql('DROP TABLE personnes_abord');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE mission_order (id INT AUTO_INCREMENT NOT NULL, date DATETIME NOT NULL, num_mission_order VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, nom_chef VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, lieu VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, date_depart DATETIME NOT NULL, date_retour DATETIME NOT NULL, motif LONGTEXT CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, num_vehicule VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, nom_chauffeur VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, created_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', updated_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE mission_order_personnes_abord (mission_order_id INT NOT NULL, personnes_abord_id INT NOT NULL, INDEX IDX_B179DB654F6A91F6 (personnes_abord_id), INDEX IDX_B179DB6585636C81 (mission_order_id), PRIMARY KEY(mission_order_id, personnes_abord_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE personnes_abord (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, prenom VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, fonction VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, created_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', updated_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('ALTER TABLE mission_order_personnes_abord ADD CONSTRAINT FK_B179DB654F6A91F6 FOREIGN KEY (personnes_abord_id) REFERENCES personnes_abord (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE mission_order_personnes_abord ADD CONSTRAINT FK_B179DB6585636C81 FOREIGN KEY (mission_order_id) REFERENCES mission_order (id) ON DELETE CASCADE');
    }
}
