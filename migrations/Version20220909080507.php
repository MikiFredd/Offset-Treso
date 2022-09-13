<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220909080507 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE mission_order DROP FOREIGN KEY FK_65BFCCA5E0854339');
        $this->addSql('ALTER TABLE mission_order_personnel DROP FOREIGN KEY FK_2CFAC44385636C81');
        $this->addSql('ALTER TABLE mission_order_personnel DROP FOREIGN KEY FK_2CFAC4431C109075');
        $this->addSql('DROP TABLE mission_order');
        $this->addSql('DROP TABLE mission_order_personnel');
        $this->addSql('DROP TABLE personnel');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE mission_order (id INT AUTO_INCREMENT NOT NULL, nom_chef_id INT DEFAULT NULL, date DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', num_mission_order VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, lieu VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, date_depart DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', date_retour DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', motif VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, num_vehicule VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, nom_chauffeur VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, created_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', updated_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', INDEX IDX_65BFCCA5E0854339 (nom_chef_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE mission_order_personnel (mission_order_id INT NOT NULL, personnel_id INT NOT NULL, INDEX IDX_2CFAC44385636C81 (mission_order_id), INDEX IDX_2CFAC4431C109075 (personnel_id), PRIMARY KEY(mission_order_id, personnel_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE personnel (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, prenom VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, fonction VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, created_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', updated_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('ALTER TABLE mission_order ADD CONSTRAINT FK_65BFCCA5E0854339 FOREIGN KEY (nom_chef_id) REFERENCES personnel (id)');
        $this->addSql('ALTER TABLE mission_order_personnel ADD CONSTRAINT FK_2CFAC44385636C81 FOREIGN KEY (mission_order_id) REFERENCES mission_order (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE mission_order_personnel ADD CONSTRAINT FK_2CFAC4431C109075 FOREIGN KEY (personnel_id) REFERENCES personnel (id) ON DELETE CASCADE');
    }
}
