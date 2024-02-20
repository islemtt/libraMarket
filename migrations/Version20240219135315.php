<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240219135315 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE livraison DROP FOREIGN KEY FK_A60C9F1F77482E5B');
        $this->addSql('ALTER TABLE product DROP FOREIGN KEY FK_D34A04ADF77D927C');
        $this->addSql('ALTER TABLE panier DROP FOREIGN KEY FK_24CC0DF21AF787D1');
        $this->addSql('DROP TABLE panier');
        $this->addSql('DROP INDEX UNIQ_A60C9F1F77482E5B ON livraison');
        $this->addSql('ALTER TABLE livraison DROP id_panier_id');
        $this->addSql('DROP INDEX IDX_D34A04ADF77D927C ON product');
        $this->addSql('ALTER TABLE product ADD prod_image VARCHAR(255) NOT NULL, DROP panier_id, CHANGE description description VARCHAR(2048) NOT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE panier (id INT AUTO_INCREMENT NOT NULL, id_c_id INT DEFAULT NULL, prix_u INT DEFAULT NULL, prix_t INT DEFAULT NULL, quantite INT DEFAULT NULL, UNIQUE INDEX UNIQ_24CC0DF21AF787D1 (id_c_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('ALTER TABLE panier ADD CONSTRAINT FK_24CC0DF21AF787D1 FOREIGN KEY (id_c_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE livraison ADD id_panier_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE livraison ADD CONSTRAINT FK_A60C9F1F77482E5B FOREIGN KEY (id_panier_id) REFERENCES panier (id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_A60C9F1F77482E5B ON livraison (id_panier_id)');
        $this->addSql('ALTER TABLE product ADD panier_id INT DEFAULT NULL, DROP prod_image, CHANGE description description VARCHAR(2048) DEFAULT NULL');
        $this->addSql('ALTER TABLE product ADD CONSTRAINT FK_D34A04ADF77D927C FOREIGN KEY (panier_id) REFERENCES panier (id)');
        $this->addSql('CREATE INDEX IDX_D34A04ADF77D927C ON product (panier_id)');
    }
}
