<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220909083010 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE mission_order (id INT AUTO_INCREMENT NOT NULL, nom_chef_id INT DEFAULT NULL, date DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', lieu VARCHAR(255) DEFAULT NULL, date_depart DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', date_retour DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', motif VARCHAR(255) DEFAULT NULL, num_vehicule VARCHAR(255) DEFAULT NULL, nom_chauffeur VARCHAR(255) DEFAULT NULL, created_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', updated_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', INDEX IDX_65BFCCA5E0854339 (nom_chef_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE mission_order_personne (mission_order_id INT NOT NULL, personne_id INT NOT NULL, INDEX IDX_2C30B8F485636C81 (mission_order_id), INDEX IDX_2C30B8F4A21BD112 (personne_id), PRIMARY KEY(mission_order_id, personne_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE personne (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(255) NOT NULL, prenom VARCHAR(255) NOT NULL, fonction VARCHAR(255) DEFAULT NULL, created_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', updated_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE mission_order ADD CONSTRAINT FK_65BFCCA5E0854339 FOREIGN KEY (nom_chef_id) REFERENCES personne (id)');
        $this->addSql('ALTER TABLE mission_order_personne ADD CONSTRAINT FK_2C30B8F485636C81 FOREIGN KEY (mission_order_id) REFERENCES mission_order (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE mission_order_personne ADD CONSTRAINT FK_2C30B8F4A21BD112 FOREIGN KEY (personne_id) REFERENCES personne (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE mission_order DROP FOREIGN KEY FK_65BFCCA5E0854339');
        $this->addSql('ALTER TABLE mission_order_personne DROP FOREIGN KEY FK_2C30B8F485636C81');
        $this->addSql('ALTER TABLE mission_order_personne DROP FOREIGN KEY FK_2C30B8F4A21BD112');
        $this->addSql('DROP TABLE mission_order');
        $this->addSql('DROP TABLE mission_order_personne');
        $this->addSql('DROP TABLE personne');
    }
}
