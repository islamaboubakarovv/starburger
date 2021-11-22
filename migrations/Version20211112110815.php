<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20211112110815 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE article CHANGE auteur artisan_id INT NOT NULL');
        $this->addSql('ALTER TABLE article ADD CONSTRAINT FK_23A0E665ED3C7B7 FOREIGN KEY (artisan_id) REFERENCES artisan (id) ON DELETE CASCADE');
        $this->addSql('CREATE INDEX IDX_23A0E665ED3C7B7 ON article (artisan_id)');
        $this->addSql('ALTER TABLE illustration_article CHANGE id_article article_id INT NOT NULL');
        $this->addSql('ALTER TABLE illustration_article ADD CONSTRAINT FK_312274027294869C FOREIGN KEY (article_id) REFERENCES article (id) ON DELETE CASCADE');
        $this->addSql('CREATE INDEX IDX_312274027294869C ON illustration_article (article_id)');
        $this->addSql('ALTER TABLE postulant ADD info_comp VARCHAR(255) DEFAULT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE article DROP FOREIGN KEY FK_23A0E665ED3C7B7');
        $this->addSql('DROP INDEX IDX_23A0E665ED3C7B7 ON article');
        $this->addSql('ALTER TABLE article CHANGE artisan_id auteur INT NOT NULL');
        $this->addSql('ALTER TABLE illustration_article DROP FOREIGN KEY FK_312274027294869C');
        $this->addSql('DROP INDEX IDX_312274027294869C ON illustration_article');
        $this->addSql('ALTER TABLE illustration_article CHANGE article_id id_article INT NOT NULL');
        $this->addSql('ALTER TABLE postulant DROP info_comp');
    }
}
