<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210210123634 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE usuario (id INT AUTO_INCREMENT NOT NULL, username VARCHAR(255) NOT NULL, password VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE zapatilla ADD usuario_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE zapatilla ADD CONSTRAINT FK_484948B3DB38439E FOREIGN KEY (usuario_id) REFERENCES usuario (id)');
        $this->addSql('CREATE INDEX IDX_484948B3DB38439E ON zapatilla (usuario_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE zapatilla DROP FOREIGN KEY FK_484948B3DB38439E');
        $this->addSql('DROP TABLE usuario');
        $this->addSql('DROP INDEX IDX_484948B3DB38439E ON zapatilla');
        $this->addSql('ALTER TABLE zapatilla DROP usuario_id');
    }
}
