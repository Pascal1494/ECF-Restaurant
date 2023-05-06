<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230504193123 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE dishe DROP FOREIGN KEY FK_2AF53C6814041B84');
        $this->addSql('DROP INDEX IDX_2AF53C6814041B84 ON dishe');
        $this->addSql('ALTER TABLE dishe DROP menus_id');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE dishe ADD menus_id INT NOT NULL');
        $this->addSql('ALTER TABLE dishe ADD CONSTRAINT FK_2AF53C6814041B84 FOREIGN KEY (menus_id) REFERENCES menu (id) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('CREATE INDEX IDX_2AF53C6814041B84 ON dishe (menus_id)');
    }
}
