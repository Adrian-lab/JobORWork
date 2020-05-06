<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200502194455 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE oferta_empresa (id INT AUTO_INCREMENT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE candidato (id INT AUTO_INCREMENT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE oferta ADD id_empresa_id INT DEFAULT NULL, ADD candidato_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE oferta ADD CONSTRAINT FK_7479C8F2F7949946 FOREIGN KEY (id_empresa_id) REFERENCES empresa (id)');
        $this->addSql('ALTER TABLE oferta ADD CONSTRAINT FK_7479C8F2FE0067E5 FOREIGN KEY (candidato_id) REFERENCES candidato (id)');
        $this->addSql('CREATE INDEX IDX_7479C8F2F7949946 ON oferta (id_empresa_id)');
        $this->addSql('CREATE INDEX IDX_7479C8F2FE0067E5 ON oferta (candidato_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE oferta DROP FOREIGN KEY FK_7479C8F2FE0067E5');
        $this->addSql('DROP TABLE oferta_empresa');
        $this->addSql('DROP TABLE candidato');
        $this->addSql('ALTER TABLE oferta DROP FOREIGN KEY FK_7479C8F2F7949946');
        $this->addSql('DROP INDEX IDX_7479C8F2F7949946 ON oferta');
        $this->addSql('DROP INDEX IDX_7479C8F2FE0067E5 ON oferta');
        $this->addSql('ALTER TABLE oferta DROP id_empresa_id, DROP candidato_id');
    }
}
