<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20211003142700 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE offre_postulant ADD postulant_id INT NOT NULL');
        $this->addSql('ALTER TABLE offre_postulant ADD CONSTRAINT FK_AB1B3DED1CD30E78 FOREIGN KEY (postulant_id) REFERENCES postulant (id)');
        $this->addSql('CREATE INDEX IDX_AB1B3DED1CD30E78 ON offre_postulant (postulant_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE offre_postulant DROP FOREIGN KEY FK_AB1B3DED1CD30E78');
        $this->addSql('DROP INDEX IDX_AB1B3DED1CD30E78 ON offre_postulant');
        $this->addSql('ALTER TABLE offre_postulant DROP postulant_id');
    }
}
