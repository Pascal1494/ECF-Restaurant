<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230516133224 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE reservation ADD open_day_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE reservation ADD CONSTRAINT FK_42C84955E0EA5933 FOREIGN KEY (open_day_id) REFERENCES open_day (id)');
        $this->addSql('CREATE INDEX IDX_42C84955E0EA5933 ON reservation (open_day_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE reservation DROP FOREIGN KEY FK_42C84955E0EA5933');
        $this->addSql('DROP INDEX IDX_42C84955E0EA5933 ON reservation');
        $this->addSql('ALTER TABLE reservation DROP open_day_id');
    }
}
