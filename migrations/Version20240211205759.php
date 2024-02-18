<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240211205759 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE reponse ADD id_r_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE reponse ADD CONSTRAINT FK_5FB6DEC7F252B72B FOREIGN KEY (id_r_id) REFERENCES reclamation (id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_5FB6DEC7F252B72B ON reponse (id_r_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE reponse DROP FOREIGN KEY FK_5FB6DEC7F252B72B');
        $this->addSql('DROP INDEX UNIQ_5FB6DEC7F252B72B ON reponse');
        $this->addSql('ALTER TABLE reponse DROP id_r_id');
    }
}
