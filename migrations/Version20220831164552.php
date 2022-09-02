<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220831164552 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE cash_account (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(255) NOT NULL, num_cpte VARCHAR(255) NOT NULL, code_journal VARCHAR(255) DEFAULT NULL, solde_ouv INT DEFAULT NULL, plafond INT DEFAULT NULL, solde_plancher INT DEFAULT NULL, caissier VARCHAR(255) DEFAULT NULL, contact VARCHAR(255) DEFAULT NULL, responsable VARCHAR(255) DEFAULT NULL, created_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', updated_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE journal (id INT AUTO_INCREMENT NOT NULL, code VARCHAR(255) NOT NULL, name VARCHAR(255) NOT NULL, description VARCHAR(255) DEFAULT NULL, created_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', updated_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE tiers (id INT AUTO_INCREMENT NOT NULL, intitule VARCHAR(255) NOT NULL, raison_sociale VARCHAR(255) NOT NULL, telephone VARCHAR(255) DEFAULT NULL, address VARCHAR(255) DEFAULT NULL, postal VARCHAR(255) DEFAULT NULL, num_cc VARCHAR(255) DEFAULT NULL, siege VARCHAR(255) DEFAULT NULL, created_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', updated_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE tiers_categorie (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(255) NOT NULL, description VARCHAR(255) DEFAULT NULL, created_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', updated_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE treasury_account (id INT AUTO_INCREMENT NOT NULL, code_tiers VARCHAR(255) DEFAULT NULL, nom VARCHAR(255) NOT NULL, echeance_reglement DATETIME DEFAULT NULL, intitule_tiers VARCHAR(255) DEFAULT NULL, type_compte VARCHAR(255) NOT NULL, types_tiers VARCHAR(255) DEFAULT NULL, created_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', updated_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE cash_account');
        $this->addSql('DROP TABLE journal');
        $this->addSql('DROP TABLE tiers');
        $this->addSql('DROP TABLE tiers_categorie');
        $this->addSql('DROP TABLE treasury_account');
    }
}
