<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230504154846 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE reservation (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, nb_guests INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE dishe DROP FOREIGN KEY FK_2AF53C68CCD7E912');
        $this->addSql('DROP INDEX IDX_2AF53C68CCD7E912 ON dishe');
        $this->addSql('ALTER TABLE dishe ADD menus_id INT NOT NULL, DROP menu_id');
        $this->addSql('ALTER TABLE dishe ADD CONSTRAINT FK_2AF53C6814041B84 FOREIGN KEY (menus_id) REFERENCES menu (id)');
        $this->addSql('CREATE INDEX IDX_2AF53C6814041B84 ON dishe (menus_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE reservation');
        $this->addSql('ALTER TABLE dishe DROP FOREIGN KEY FK_2AF53C6814041B84');
        $this->addSql('DROP INDEX IDX_2AF53C6814041B84 ON dishe');
        $this->addSql('ALTER TABLE dishe ADD menu_id INT DEFAULT NULL, DROP menus_id');
        $this->addSql('ALTER TABLE dishe ADD CONSTRAINT FK_2AF53C68CCD7E912 FOREIGN KEY (menu_id) REFERENCES menu (id) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('CREATE INDEX IDX_2AF53C68CCD7E912 ON dishe (menu_id)');
    }
}
