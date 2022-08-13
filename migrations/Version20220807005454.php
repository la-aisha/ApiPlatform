<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220807005454 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE entrees (id INT AUTO_INCREMENT NOT NULL, produit_id INT NOT NULL, date_e DATE NOT NULL, qt_e NUMERIC(10, 0) NOT NULL, INDEX IDX_24E24AA1F347EFB (produit_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE produit (id INT AUTO_INCREMENT NOT NULL, libelle VARCHAR(255) NOT NULL, description VARCHAR(255) NOT NULL, qte_stock INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE sorties (id INT AUTO_INCREMENT NOT NULL, produit_id INT NOT NULL, date_s DATE NOT NULL, qt_s VARCHAR(255) NOT NULL, qte_s NUMERIC(10, 0) NOT NULL, INDEX IDX_488163E8F347EFB (produit_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE entrees ADD CONSTRAINT FK_24E24AA1F347EFB FOREIGN KEY (produit_id) REFERENCES produit (id)');
        $this->addSql('ALTER TABLE sorties ADD CONSTRAINT FK_488163E8F347EFB FOREIGN KEY (produit_id) REFERENCES produit (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE entrees DROP FOREIGN KEY FK_24E24AA1F347EFB');
        $this->addSql('ALTER TABLE sorties DROP FOREIGN KEY FK_488163E8F347EFB');
        $this->addSql('DROP TABLE entrees');
        $this->addSql('DROP TABLE produit');
        $this->addSql('DROP TABLE sorties');
    }
}
