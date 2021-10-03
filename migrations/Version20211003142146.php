<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20211003142146 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE offre_postulant ADD offre_id INT NOT NULL');
        $this->addSql('ALTER TABLE offre_postulant ADD CONSTRAINT FK_AB1B3DED4CC8505A FOREIGN KEY (offre_id) REFERENCES offre (id)');
        $this->addSql('CREATE INDEX IDX_AB1B3DED4CC8505A ON offre_postulant (offre_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE offre_postulant DROP FOREIGN KEY FK_AB1B3DED4CC8505A');
        $this->addSql('DROP INDEX IDX_AB1B3DED4CC8505A ON offre_postulant');
        $this->addSql('ALTER TABLE offre_postulant DROP offre_id');
    }
}
