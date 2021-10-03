<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20211003135126 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE article ADD artisan_id INT NOT NULL');
        $this->addSql('ALTER TABLE article ADD CONSTRAINT FK_23A0E665ED3C7B7 FOREIGN KEY (artisan_id) REFERENCES artisan (id)');
        $this->addSql('CREATE INDEX IDX_23A0E665ED3C7B7 ON article (artisan_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE article DROP FOREIGN KEY FK_23A0E665ED3C7B7');
        $this->addSql('DROP INDEX IDX_23A0E665ED3C7B7 ON article');
        $this->addSql('ALTER TABLE article DROP artisan_id');
    }
}
