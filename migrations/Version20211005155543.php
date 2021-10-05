<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20211005155543 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE offre_postulant DROP FOREIGN KEY FK_AB1B3DED4CC8505A');
        $this->addSql('ALTER TABLE offre_postulant ADD CONSTRAINT FK_AB1B3DED4CC8505A FOREIGN KEY (offre_id) REFERENCES offre (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE offre_postulant DROP FOREIGN KEY FK_AB1B3DED4CC8505A');
        $this->addSql('ALTER TABLE offre_postulant ADD CONSTRAINT FK_AB1B3DED4CC8505A FOREIGN KEY (offre_id) REFERENCES offre (id)');
    }
}
