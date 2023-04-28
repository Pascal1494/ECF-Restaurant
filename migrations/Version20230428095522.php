<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230428095522 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE open_day CHANGE morning_open morning_open DATE NOT NULL, CHANGE morning_close morning_close DATE NOT NULL, CHANGE evening_open evening_open DATE NOT NULL, CHANGE evening_close evening_close DATE NOT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE open_day CHANGE morning_open morning_open TIME NOT NULL, CHANGE morning_close morning_close TIME NOT NULL, CHANGE evening_open evening_open TIME NOT NULL, CHANGE evening_close evening_close TIME NOT NULL');
    }
}
