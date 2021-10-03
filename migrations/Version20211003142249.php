<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20211003142249 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE postulant ADD postulant_id INT NOT NULL');
        $this->addSql('ALTER TABLE postulant ADD CONSTRAINT FK_F79395121CD30E78 FOREIGN KEY (postulant_id) REFERENCES postulant (id)');
        $this->addSql('CREATE INDEX IDX_F79395121CD30E78 ON postulant (postulant_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE postulant DROP FOREIGN KEY FK_F79395121CD30E78');
        $this->addSql('DROP INDEX IDX_F79395121CD30E78 ON postulant');
        $this->addSql('ALTER TABLE postulant DROP postulant_id');
    }
}
