<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20211005154704 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE article DROP FOREIGN KEY FK_23A0E665ED3C7B7');
        $this->addSql('ALTER TABLE article ADD CONSTRAINT FK_23A0E665ED3C7B7 FOREIGN KEY (artisan_id) REFERENCES artisan (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE article DROP FOREIGN KEY FK_23A0E665ED3C7B7');
        $this->addSql('ALTER TABLE article ADD CONSTRAINT FK_23A0E665ED3C7B7 FOREIGN KEY (artisan_id) REFERENCES artisan (id)');
    }
}
