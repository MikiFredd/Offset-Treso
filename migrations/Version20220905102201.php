<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220905102201 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE mission_order (id INT AUTO_INCREMENT NOT NULL, date DATETIME NOT NULL, num_mission_order VARCHAR(255) NOT NULL, nom_chef VARCHAR(255) NOT NULL, prenom_chef VARCHAR(255) NOT NULL, fonction_chef VARCHAR(255) NOT NULL, lieu VARCHAR(255) NOT NULL, date_depart DATETIME NOT NULL, date_retour DATETIME NOT NULL, motif LONGTEXT NOT NULL, num_vehicule VARCHAR(255) DEFAULT NULL, nom_chauffeur VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE mission_order');
    }
}
