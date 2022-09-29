<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220929092533 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE cash_account (id INT AUTO_INCREMENT NOT NULL, code_journal_id INT DEFAULT NULL, nom VARCHAR(255) NOT NULL, num_cpte VARCHAR(255) NOT NULL, solde_ouv INT DEFAULT NULL, plafond INT DEFAULT NULL, solde_plancher INT DEFAULT NULL, caissier VARCHAR(255) DEFAULT NULL, contact VARCHAR(255) DEFAULT NULL, responsable VARCHAR(255) DEFAULT NULL, created_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', updated_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', UNIQUE INDEX UNIQ_23DA44F86F2075E4 (code_journal_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE company (id INT AUTO_INCREMENT NOT NULL, company_name VARCHAR(255) NOT NULL, forme VARCHAR(255) NOT NULL, activities VARCHAR(255) NOT NULL, numero_rcc VARCHAR(255) NOT NULL, numero_cc VARCHAR(255) NOT NULL, telephone VARCHAR(255) NOT NULL, adresse VARCHAR(255) NOT NULL, siege_social VARCHAR(255) NOT NULL, capital_social VARCHAR(255) NOT NULL, gerant VARCHAR(255) NOT NULL, annee_debut_activ DATETIME DEFAULT NULL, created_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', updated_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE detail_document (id INT AUTO_INCREMENT NOT NULL, mode_reglement_id INT DEFAULT NULL, document_id INT DEFAULT NULL, intitule VARCHAR(255) DEFAULT NULL, reference VARCHAR(255) DEFAULT NULL, autre_reference VARCHAR(255) DEFAULT NULL, description VARCHAR(255) DEFAULT NULL, montant INT DEFAULT NULL, montant_lettre VARCHAR(255) DEFAULT NULL, montant_total INT DEFAULT NULL, reference_document VARCHAR(255) DEFAULT NULL, libelle VARCHAR(255) DEFAULT NULL, created_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', updated_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', INDEX IDX_2EB763ADE04B7BE2 (mode_reglement_id), UNIQUE INDEX UNIQ_2EB763ADC33F7837 (document_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE document (id INT AUTO_INCREMENT NOT NULL, ref_caisse_id INT DEFAULT NULL, type_operation_id INT DEFAULT NULL, date DATETIME NOT NULL, num_document VARCHAR(255) NOT NULL, created_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', updated_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', INDEX IDX_D8698A7654EEFFFA (ref_caisse_id), INDEX IDX_D8698A76C3EF8F86 (type_operation_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE funds_request (id INT AUTO_INCREMENT NOT NULL, caisse_id INT DEFAULT NULL, date DATETIME NOT NULL, montant_depenses INT NOT NULL, solde_apres INT NOT NULL, objet LONGTEXT NOT NULL, montant INT NOT NULL, montant_lettres LONGTEXT NOT NULL, created_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', updated_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', INDEX IDX_24F6E24A27B4FEBF (caisse_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE journal (id INT AUTO_INCREMENT NOT NULL, code VARCHAR(255) NOT NULL, name VARCHAR(255) NOT NULL, description VARCHAR(255) DEFAULT NULL, created_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', updated_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE mission_order (id INT AUTO_INCREMENT NOT NULL, nom_chef_id INT DEFAULT NULL, lieu VARCHAR(255) DEFAULT NULL, motif VARCHAR(255) DEFAULT NULL, num_vehicule VARCHAR(255) DEFAULT NULL, nom_chauffeur VARCHAR(255) DEFAULT NULL, date DATETIME NOT NULL, date_depart DATETIME NOT NULL, date_retour DATETIME NOT NULL, num_mission_order VARCHAR(255) NOT NULL, created_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', updated_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', INDEX IDX_65BFCCA5E0854339 (nom_chef_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE mission_order_personne (mission_order_id INT NOT NULL, personne_id INT NOT NULL, INDEX IDX_2C30B8F485636C81 (mission_order_id), INDEX IDX_2C30B8F4A21BD112 (personne_id), PRIMARY KEY(mission_order_id, personne_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE permission (id INT AUTO_INCREMENT NOT NULL, code VARCHAR(255) NOT NULL, description VARCHAR(255) DEFAULT NULL, created_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', updated_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE personne (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(255) NOT NULL, prenom VARCHAR(255) NOT NULL, fonction VARCHAR(255) DEFAULT NULL, created_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', updated_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE reglement_mode (id INT AUTO_INCREMENT NOT NULL, code VARCHAR(255) NOT NULL, nom VARCHAR(255) NOT NULL, created_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', updated_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE tiers (id INT AUTO_INCREMENT NOT NULL, type_tiers_id INT DEFAULT NULL, intitule VARCHAR(255) NOT NULL, raison_sociale VARCHAR(255) NOT NULL, telephone VARCHAR(255) DEFAULT NULL, address VARCHAR(255) DEFAULT NULL, postal VARCHAR(255) DEFAULT NULL, num_cc VARCHAR(255) DEFAULT NULL, siege VARCHAR(255) DEFAULT NULL, code VARCHAR(255) NOT NULL, created_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', updated_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', INDEX IDX_16473BA2A54850DF (type_tiers_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE tiers_categorie (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(255) NOT NULL, description VARCHAR(255) DEFAULT NULL, created_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', updated_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE treasury_account (id INT AUTO_INCREMENT NOT NULL, tiers_id INT DEFAULT NULL, type_compte_id INT DEFAULT NULL, echeance_reglement DATETIME DEFAULT NULL, created_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', updated_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', INDEX IDX_8C6CD84768B77723 (tiers_id), INDEX IDX_8C6CD84746032730 (type_compte_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE type_compte (id INT AUTO_INCREMENT NOT NULL, intitule VARCHAR(255) NOT NULL, description VARCHAR(255) DEFAULT NULL, created_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', updated_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE type_operation (id INT AUTO_INCREMENT NOT NULL, code VARCHAR(255) NOT NULL, nom VARCHAR(255) NOT NULL, description VARCHAR(255) DEFAULT NULL, created_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', updated_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE type_tiers (id INT AUTO_INCREMENT NOT NULL, libelle VARCHAR(255) NOT NULL, description VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user (id INT AUTO_INCREMENT NOT NULL, username VARCHAR(180) NOT NULL, password VARCHAR(255) NOT NULL, type_id INT DEFAULT NULL, firstname VARCHAR(255) NOT NULL, lastname VARCHAR(255) NOT NULL, fonction VARCHAR(255) DEFAULT NULL, telephone VARCHAR(255) DEFAULT NULL, email VARCHAR(255) DEFAULT NULL, is_enabled TINYINT(1) DEFAULT NULL, is_deleted TINYINT(1) DEFAULT NULL, is_standard TINYINT(1) DEFAULT NULL, is_manager TINYINT(1) DEFAULT NULL, is_admin TINYINT(1) DEFAULT NULL, is_super_admin TINYINT(1) DEFAULT NULL, created_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', updated_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', UNIQUE INDEX UNIQ_8D93D649F85E0677 (username), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user_permission (user_id INT NOT NULL, permission_id INT NOT NULL, INDEX IDX_472E5446A76ED395 (user_id), INDEX IDX_472E5446FED90CCA (permission_id), PRIMARY KEY(user_id, permission_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user_type (id INT AUTO_INCREMENT NOT NULL, code VARCHAR(255) NOT NULL, description VARCHAR(255) DEFAULT NULL, created_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', updated_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE messenger_messages (id BIGINT AUTO_INCREMENT NOT NULL, body LONGTEXT NOT NULL, headers LONGTEXT NOT NULL, queue_name VARCHAR(190) NOT NULL, created_at DATETIME NOT NULL, available_at DATETIME NOT NULL, delivered_at DATETIME DEFAULT NULL, INDEX IDX_75EA56E0FB7336F0 (queue_name), INDEX IDX_75EA56E0E3BD61CE (available_at), INDEX IDX_75EA56E016BA31DB (delivered_at), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE cash_account ADD CONSTRAINT FK_23DA44F86F2075E4 FOREIGN KEY (code_journal_id) REFERENCES journal (id)');
        $this->addSql('ALTER TABLE detail_document ADD CONSTRAINT FK_2EB763ADE04B7BE2 FOREIGN KEY (mode_reglement_id) REFERENCES reglement_mode (id)');
        $this->addSql('ALTER TABLE detail_document ADD CONSTRAINT FK_2EB763ADC33F7837 FOREIGN KEY (document_id) REFERENCES document (id)');
        $this->addSql('ALTER TABLE document ADD CONSTRAINT FK_D8698A7654EEFFFA FOREIGN KEY (ref_caisse_id) REFERENCES cash_account (id)');
        $this->addSql('ALTER TABLE document ADD CONSTRAINT FK_D8698A76C3EF8F86 FOREIGN KEY (type_operation_id) REFERENCES type_operation (id)');
        $this->addSql('ALTER TABLE funds_request ADD CONSTRAINT FK_24F6E24A27B4FEBF FOREIGN KEY (caisse_id) REFERENCES cash_account (id)');
        $this->addSql('ALTER TABLE mission_order ADD CONSTRAINT FK_65BFCCA5E0854339 FOREIGN KEY (nom_chef_id) REFERENCES personne (id)');
        $this->addSql('ALTER TABLE mission_order_personne ADD CONSTRAINT FK_2C30B8F485636C81 FOREIGN KEY (mission_order_id) REFERENCES mission_order (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE mission_order_personne ADD CONSTRAINT FK_2C30B8F4A21BD112 FOREIGN KEY (personne_id) REFERENCES personne (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE tiers ADD CONSTRAINT FK_16473BA2A54850DF FOREIGN KEY (type_tiers_id) REFERENCES type_tiers (id)');
        $this->addSql('ALTER TABLE treasury_account ADD CONSTRAINT FK_8C6CD84768B77723 FOREIGN KEY (tiers_id) REFERENCES tiers (id)');
        $this->addSql('ALTER TABLE treasury_account ADD CONSTRAINT FK_8C6CD84746032730 FOREIGN KEY (type_compte_id) REFERENCES type_compte (id)');
        $this->addSql('ALTER TABLE user_permission ADD CONSTRAINT FK_472E5446A76ED395 FOREIGN KEY (user_id) REFERENCES user (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE user_permission ADD CONSTRAINT FK_472E5446FED90CCA FOREIGN KEY (permission_id) REFERENCES permission (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE cash_account DROP FOREIGN KEY FK_23DA44F86F2075E4');
        $this->addSql('ALTER TABLE detail_document DROP FOREIGN KEY FK_2EB763ADE04B7BE2');
        $this->addSql('ALTER TABLE detail_document DROP FOREIGN KEY FK_2EB763ADC33F7837');
        $this->addSql('ALTER TABLE document DROP FOREIGN KEY FK_D8698A7654EEFFFA');
        $this->addSql('ALTER TABLE document DROP FOREIGN KEY FK_D8698A76C3EF8F86');
        $this->addSql('ALTER TABLE funds_request DROP FOREIGN KEY FK_24F6E24A27B4FEBF');
        $this->addSql('ALTER TABLE mission_order DROP FOREIGN KEY FK_65BFCCA5E0854339');
        $this->addSql('ALTER TABLE mission_order_personne DROP FOREIGN KEY FK_2C30B8F485636C81');
        $this->addSql('ALTER TABLE mission_order_personne DROP FOREIGN KEY FK_2C30B8F4A21BD112');
        $this->addSql('ALTER TABLE tiers DROP FOREIGN KEY FK_16473BA2A54850DF');
        $this->addSql('ALTER TABLE treasury_account DROP FOREIGN KEY FK_8C6CD84768B77723');
        $this->addSql('ALTER TABLE treasury_account DROP FOREIGN KEY FK_8C6CD84746032730');
        $this->addSql('ALTER TABLE user_permission DROP FOREIGN KEY FK_472E5446A76ED395');
        $this->addSql('ALTER TABLE user_permission DROP FOREIGN KEY FK_472E5446FED90CCA');
        $this->addSql('DROP TABLE cash_account');
        $this->addSql('DROP TABLE company');
        $this->addSql('DROP TABLE detail_document');
        $this->addSql('DROP TABLE document');
        $this->addSql('DROP TABLE funds_request');
        $this->addSql('DROP TABLE journal');
        $this->addSql('DROP TABLE mission_order');
        $this->addSql('DROP TABLE mission_order_personne');
        $this->addSql('DROP TABLE permission');
        $this->addSql('DROP TABLE personne');
        $this->addSql('DROP TABLE reglement_mode');
        $this->addSql('DROP TABLE tiers');
        $this->addSql('DROP TABLE tiers_categorie');
        $this->addSql('DROP TABLE treasury_account');
        $this->addSql('DROP TABLE type_compte');
        $this->addSql('DROP TABLE type_operation');
        $this->addSql('DROP TABLE type_tiers');
        $this->addSql('DROP TABLE user');
        $this->addSql('DROP TABLE user_permission');
        $this->addSql('DROP TABLE user_type');
        $this->addSql('DROP TABLE messenger_messages');
    }
}
