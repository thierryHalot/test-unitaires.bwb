<?php declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20180730141354 extends AbstractMigration
{
    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE billet (id INT AUTO_INCREMENT NOT NULL, client_id INT NOT NULL, tarif_id INT NOT NULL, billeterie_id INT NOT NULL, zone_id INT NOT NULL, total INT NOT NULL, nbr_dispo INT NOT NULL, date DATETIME NOT NULL, INDEX IDX_1F034AF619EB6921 (client_id), INDEX IDX_1F034AF6357C0A59 (tarif_id), INDEX IDX_1F034AF6E5650529 (billeterie_id), INDEX IDX_1F034AF69F2C3FAB (zone_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE tarif (id INT AUTO_INCREMENT NOT NULL, plein_tarif INT NOT NULL, etudiant INT NOT NULL, enfant INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE client (id INT AUTO_INCREMENT NOT NULL, abonnement_id_id INT DEFAULT NULL, nom VARCHAR(45) NOT NULL, prenom VARCHAR(45) NOT NULL, age INT NOT NULL, abonnement TINYINT(1) NOT NULL, UNIQUE INDEX UNIQ_C7440455F483159E (abonnement_id_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE abonnement (id INT AUTO_INCREMENT NOT NULL, date_debut DATETIME NOT NULL, date_fin DATE NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE zone (id INT AUTO_INCREMENT NOT NULL, stade_id INT NOT NULL, majoration INT NOT NULL, designation VARCHAR(255) NOT NULL, INDEX IDX_A0EBC0076538AB43 (stade_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE stade (id INT AUTO_INCREMENT NOT NULL, club_id INT NOT NULL, nom VARCHAR(45) NOT NULL, adresse VARCHAR(300) NOT NULL, nbr_place_dispo INT NOT NULL, INDEX IDX_E951C0AA61190A32 (club_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE club_foot (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(45) NOT NULL, adresse VARCHAR(300) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE billeterie (id INT AUTO_INCREMENT NOT NULL, nbr_place_vendu INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE billet ADD CONSTRAINT FK_1F034AF619EB6921 FOREIGN KEY (client_id) REFERENCES client (id)');
        $this->addSql('ALTER TABLE billet ADD CONSTRAINT FK_1F034AF6357C0A59 FOREIGN KEY (tarif_id) REFERENCES tarif (id)');
        $this->addSql('ALTER TABLE billet ADD CONSTRAINT FK_1F034AF6E5650529 FOREIGN KEY (billeterie_id) REFERENCES billeterie (id)');
        $this->addSql('ALTER TABLE billet ADD CONSTRAINT FK_1F034AF69F2C3FAB FOREIGN KEY (zone_id) REFERENCES zone (id)');
        $this->addSql('ALTER TABLE client ADD CONSTRAINT FK_C7440455F483159E FOREIGN KEY (abonnement_id_id) REFERENCES abonnement (id)');
        $this->addSql('ALTER TABLE zone ADD CONSTRAINT FK_A0EBC0076538AB43 FOREIGN KEY (stade_id) REFERENCES stade (id)');
        $this->addSql('ALTER TABLE stade ADD CONSTRAINT FK_E951C0AA61190A32 FOREIGN KEY (club_id) REFERENCES club_foot (id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE billet DROP FOREIGN KEY FK_1F034AF6357C0A59');
        $this->addSql('ALTER TABLE billet DROP FOREIGN KEY FK_1F034AF619EB6921');
        $this->addSql('ALTER TABLE client DROP FOREIGN KEY FK_C7440455F483159E');
        $this->addSql('ALTER TABLE billet DROP FOREIGN KEY FK_1F034AF69F2C3FAB');
        $this->addSql('ALTER TABLE zone DROP FOREIGN KEY FK_A0EBC0076538AB43');
        $this->addSql('ALTER TABLE stade DROP FOREIGN KEY FK_E951C0AA61190A32');
        $this->addSql('ALTER TABLE billet DROP FOREIGN KEY FK_1F034AF6E5650529');
        $this->addSql('DROP TABLE billet');
        $this->addSql('DROP TABLE tarif');
        $this->addSql('DROP TABLE client');
        $this->addSql('DROP TABLE abonnement');
        $this->addSql('DROP TABLE zone');
        $this->addSql('DROP TABLE stade');
        $this->addSql('DROP TABLE club_foot');
        $this->addSql('DROP TABLE billeterie');
    }
}
