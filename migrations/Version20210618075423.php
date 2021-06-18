<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210618075423 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE docteur CHANGE telephone telephone VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE rdv ADD id_pat_id INT NOT NULL, ADD id_doc_id INT NOT NULL');
        $this->addSql('ALTER TABLE rdv ADD CONSTRAINT FK_10C31F8645D86C9B FOREIGN KEY (id_pat_id) REFERENCES patient (id)');
        $this->addSql('ALTER TABLE rdv ADD CONSTRAINT FK_10C31F86AF61FD51 FOREIGN KEY (id_doc_id) REFERENCES docteur (id)');
        $this->addSql('CREATE INDEX IDX_10C31F8645D86C9B ON rdv (id_pat_id)');
        $this->addSql('CREATE INDEX IDX_10C31F86AF61FD51 ON rdv (id_doc_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE docteur CHANGE telephone telephone INT DEFAULT NULL');
        $this->addSql('ALTER TABLE rdv DROP FOREIGN KEY FK_10C31F8645D86C9B');
        $this->addSql('ALTER TABLE rdv DROP FOREIGN KEY FK_10C31F86AF61FD51');
        $this->addSql('DROP INDEX IDX_10C31F8645D86C9B ON rdv');
        $this->addSql('DROP INDEX IDX_10C31F86AF61FD51 ON rdv');
        $this->addSql('ALTER TABLE rdv DROP id_pat_id, DROP id_doc_id');
    }
}
