<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20211017085301 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE article (id INT AUTO_INCREMENT NOT NULL, artisan_id INT NOT NULL, titre VARCHAR(150) NOT NULL, contenu VARCHAR(1000) NOT NULL, date_publi DATE NOT NULL, importance INT NOT NULL, INDEX IDX_23A0E665ED3C7B7 (artisan_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE artisan (id INT AUTO_INCREMENT NOT NULL, prenom VARCHAR(100) NOT NULL, nom VARCHAR(100) NOT NULL, mail VARCHAR(255) NOT NULL, mdp VARCHAR(30) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE client (id INT AUTO_INCREMENT NOT NULL, prenom VARCHAR(100) NOT NULL, nom VARCHAR(10) NOT NULL, mail VARCHAR(255) NOT NULL, mdp VARCHAR(30) NOT NULL, telephone VARCHAR(10) DEFAULT NULL, adresse VARCHAR(255) DEFAULT NULL, ville VARCHAR(255) DEFAULT NULL, code_postal VARCHAR(5) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE illustration_article (id INT AUTO_INCREMENT NOT NULL, article_id INT NOT NULL, adresse_image VARCHAR(255) NOT NULL, INDEX IDX_312274027294869C (article_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE offre (id INT AUTO_INCREMENT NOT NULL, poste VARCHAR(255) NOT NULL, description LONGTEXT NOT NULL, prerequis VARCHAR(255) DEFAULT NULL, type_contrat VARCHAR(100) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE offre_postulant (id INT AUTO_INCREMENT NOT NULL, offre_id INT NOT NULL, postulant_id INT NOT NULL, INDEX IDX_AB1B3DED4CC8505A (offre_id), INDEX IDX_AB1B3DED1CD30E78 (postulant_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE postulant (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(100) NOT NULL, prenom VARCHAR(100) NOT NULL, mail VARCHAR(255) DEFAULT NULL, telephone VARCHAR(10) DEFAULT NULL, cv VARCHAR(255) DEFAULT NULL, lettre_motivation VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE projet (id INT AUTO_INCREMENT NOT NULL, objet VARCHAR(255) NOT NULL, description LONGTEXT NOT NULL, est_recontacte TINYINT(1) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE article ADD CONSTRAINT FK_23A0E665ED3C7B7 FOREIGN KEY (artisan_id) REFERENCES artisan (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE illustration_article ADD CONSTRAINT FK_312274027294869C FOREIGN KEY (article_id) REFERENCES article (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE offre_postulant ADD CONSTRAINT FK_AB1B3DED4CC8505A FOREIGN KEY (offre_id) REFERENCES offre (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE offre_postulant ADD CONSTRAINT FK_AB1B3DED1CD30E78 FOREIGN KEY (postulant_id) REFERENCES postulant (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE illustration_article DROP FOREIGN KEY FK_312274027294869C');
        $this->addSql('ALTER TABLE article DROP FOREIGN KEY FK_23A0E665ED3C7B7');
        $this->addSql('ALTER TABLE offre_postulant DROP FOREIGN KEY FK_AB1B3DED4CC8505A');
        $this->addSql('ALTER TABLE offre_postulant DROP FOREIGN KEY FK_AB1B3DED1CD30E78');
        $this->addSql('DROP TABLE article');
        $this->addSql('DROP TABLE artisan');
        $this->addSql('DROP TABLE client');
        $this->addSql('DROP TABLE illustration_article');
        $this->addSql('DROP TABLE offre');
        $this->addSql('DROP TABLE offre_postulant');
        $this->addSql('DROP TABLE postulant');
        $this->addSql('DROP TABLE projet');
    }
}
