<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20211005155456 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE illustration_article DROP FOREIGN KEY FK_312274027294869C');
        $this->addSql('ALTER TABLE illustration_article ADD CONSTRAINT FK_312274027294869C FOREIGN KEY (article_id) REFERENCES article (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE offre_postulant DROP FOREIGN KEY FK_AB1B3DED1CD30E78');
        $this->addSql('ALTER TABLE offre_postulant ADD CONSTRAINT FK_AB1B3DED1CD30E78 FOREIGN KEY (postulant_id) REFERENCES postulant (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE illustration_article DROP FOREIGN KEY FK_312274027294869C');
        $this->addSql('ALTER TABLE illustration_article ADD CONSTRAINT FK_312274027294869C FOREIGN KEY (article_id) REFERENCES article (id)');
        $this->addSql('ALTER TABLE offre_postulant DROP FOREIGN KEY FK_AB1B3DED1CD30E78');
        $this->addSql('ALTER TABLE offre_postulant ADD CONSTRAINT FK_AB1B3DED1CD30E78 FOREIGN KEY (postulant_id) REFERENCES postulant (id)');
    }
}
