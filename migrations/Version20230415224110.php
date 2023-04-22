<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230415224110 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE membre');
        $this->addSql('ALTER TABLE commande CHANGE ref ref VARCHAR(20) NOT NULL COLLATE `utf8mb4_general_ci`, CHANGE adresse adresse VARCHAR(255) NOT NULL COLLATE `utf8mb4_general_ci`, CHANGE complement_adresse complement_adresse VARCHAR(255) NOT NULL COLLATE `utf8mb4_general_ci`, CHANGE code_postal code_postal VARCHAR(20) NOT NULL COLLATE `utf8mb4_general_ci`, CHANGE ville ville VARCHAR(20) NOT NULL COLLATE `utf8mb4_general_ci`');
        $this->addSql('ALTER TABLE panier CHANGE quantier quantiter INT NOT NULL');
        $this->addSql('ALTER TABLE produit CHANGE titre titre VARCHAR(100) NOT NULL COLLATE `utf8mb4_general_ci`, CHANGE description description LONGTEXT NOT NULL COLLATE `utf8mb4_general_ci`, CHANGE editeur editeur VARCHAR(100) NOT NULL COLLATE `utf8mb4_general_ci`, CHANGE image image VARCHAR(100) DEFAULT NULL COLLATE `utf8mb4_general_ci`');
        $this->addSql('ALTER TABLE user CHANGE email email VARCHAR(180) NOT NULL COLLATE `utf8mb4_general_ci`, CHANGE password password VARCHAR(255) NOT NULL COLLATE `utf8mb4_general_ci`, CHANGE nom nom VARCHAR(45) NOT NULL COLLATE `utf8mb4_general_ci`, CHANGE prenom prenom VARCHAR(45) DEFAULT NULL COLLATE `utf8mb4_general_ci`, CHANGE pseudo pseudo VARCHAR(45) DEFAULT NULL COLLATE `utf8mb4_general_ci`');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE membre (id INT AUTO_INCREMENT NOT NULL, email VARCHAR(180) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_general_ci`, roles LONGTEXT CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci` COMMENT \'(DC2Type:json)\', password VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_general_ci`, is_verified TINYINT(1) NOT NULL, UNIQUE INDEX UNIQ_F6B4FB29E7927C74 (email), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('ALTER TABLE commande CHANGE ref ref VARCHAR(255) NOT NULL, CHANGE adresse adresse VARCHAR(255) NOT NULL, CHANGE complement_adresse complement_adresse VARCHAR(255) NOT NULL, CHANGE code_postal code_postal VARCHAR(255) NOT NULL, CHANGE ville ville VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE panier CHANGE quantiter quantier INT NOT NULL');
        $this->addSql('ALTER TABLE produit CHANGE titre titre VARCHAR(255) NOT NULL, CHANGE description description VARCHAR(255) NOT NULL, CHANGE editeur editeur VARCHAR(255) NOT NULL, CHANGE image image VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE user CHANGE email email VARCHAR(180) NOT NULL, CHANGE password password VARCHAR(255) NOT NULL, CHANGE nom nom VARCHAR(255) NOT NULL, CHANGE prenom prenom VARCHAR(255) NOT NULL, CHANGE pseudo pseudo VARCHAR(255) NOT NULL');
    }
}
