<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220906114841 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE cash_account DROP FOREIGN KEY FK_23DA44F86F2075E4');
        $this->addSql('DROP INDEX UNIQ_23DA44F86F2075E4 ON cash_account');
        $this->addSql('ALTER TABLE cash_account DROP code_journal_id');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE cash_account ADD code_journal_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE cash_account ADD CONSTRAINT FK_23DA44F86F2075E4 FOREIGN KEY (code_journal_id) REFERENCES journal (id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_23DA44F86F2075E4 ON cash_account (code_journal_id)');
    }
}
