<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220919140253 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE treasury_account ADD tiers_id INT DEFAULT NULL, ADD type_compte_id INT DEFAULT NULL, DROP code_tiers, DROP nom, DROP intitule_tiers, DROP type_compte, DROP types_tiers');
        $this->addSql('ALTER TABLE treasury_account ADD CONSTRAINT FK_8C6CD84768B77723 FOREIGN KEY (tiers_id) REFERENCES tiers (id)');
        $this->addSql('ALTER TABLE treasury_account ADD CONSTRAINT FK_8C6CD84746032730 FOREIGN KEY (type_compte_id) REFERENCES type_compte (id)');
        $this->addSql('CREATE INDEX IDX_8C6CD84768B77723 ON treasury_account (tiers_id)');
        $this->addSql('CREATE INDEX IDX_8C6CD84746032730 ON treasury_account (type_compte_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE treasury_account DROP FOREIGN KEY FK_8C6CD84768B77723');
        $this->addSql('ALTER TABLE treasury_account DROP FOREIGN KEY FK_8C6CD84746032730');
        $this->addSql('DROP INDEX IDX_8C6CD84768B77723 ON treasury_account');
        $this->addSql('DROP INDEX IDX_8C6CD84746032730 ON treasury_account');
        $this->addSql('ALTER TABLE treasury_account ADD code_tiers VARCHAR(255) DEFAULT NULL, ADD nom VARCHAR(255) NOT NULL, ADD intitule_tiers VARCHAR(255) DEFAULT NULL, ADD type_compte VARCHAR(255) NOT NULL, ADD types_tiers VARCHAR(255) DEFAULT NULL, DROP tiers_id, DROP type_compte_id');
    }
}
