<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220905095219 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE funds_request (id INT AUTO_INCREMENT NOT NULL, caisse_id INT DEFAULT NULL, date DATE NOT NULL, montant_depenses INT NOT NULL, solde_apres INT NOT NULL, objet LONGTEXT NOT NULL, montant INT NOT NULL, montant_lettres LONGTEXT NOT NULL, created_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', updated_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', INDEX IDX_24F6E24A27B4FEBF (caisse_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE funds_request ADD CONSTRAINT FK_24F6E24A27B4FEBF FOREIGN KEY (caisse_id) REFERENCES cash_account (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE funds_request DROP FOREIGN KEY FK_24F6E24A27B4FEBF');
        $this->addSql('DROP TABLE funds_request');
    }
}
