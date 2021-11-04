<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20211003134727 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE artisan DROP FOREIGN KEY FK_3C600AD37294869C');
        $this->addSql('DROP INDEX IDX_3C600AD37294869C ON artisan');
        $this->addSql('ALTER TABLE artisan DROP article_id');
        
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE artisan ADD article_id INT NOT NULL');
        $this->addSql('ALTER TABLE artisan ADD CONSTRAINT FK_3C600AD37294869C FOREIGN KEY (article_id) REFERENCES article (id)');
        $this->addSql('CREATE INDEX IDX_3C600AD37294869C ON artisan (article_id)');
    }
}
