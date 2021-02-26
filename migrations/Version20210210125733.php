<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210210125733 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE zapatilla_usuario (id INT AUTO_INCREMENT NOT NULL, zapatilla_id INT DEFAULT NULL, usuario_id INT DEFAULT NULL, INDEX IDX_3964F35696F9B908 (zapatilla_id), INDEX IDX_3964F356DB38439E (usuario_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE zapatilla_usuario ADD CONSTRAINT FK_3964F35696F9B908 FOREIGN KEY (zapatilla_id) REFERENCES zapatilla (id)');
        $this->addSql('ALTER TABLE zapatilla_usuario ADD CONSTRAINT FK_3964F356DB38439E FOREIGN KEY (usuario_id) REFERENCES usuario (id)');
        $this->addSql('ALTER TABLE zapatilla DROP FOREIGN KEY FK_484948B3DB38439E');
        $this->addSql('DROP INDEX IDX_484948B3DB38439E ON zapatilla');
        $this->addSql('ALTER TABLE zapatilla DROP usuario_id');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE zapatilla_usuario');
        $this->addSql('ALTER TABLE zapatilla ADD usuario_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE zapatilla ADD CONSTRAINT FK_484948B3DB38439E FOREIGN KEY (usuario_id) REFERENCES usuario (id)');
        $this->addSql('CREATE INDEX IDX_484948B3DB38439E ON zapatilla (usuario_id)');
    }
}
