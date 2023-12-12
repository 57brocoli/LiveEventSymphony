<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20231110105015 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE sponsor_event DROP FOREIGN KEY FK_9B444A9C12F7FB51');
        $this->addSql('ALTER TABLE sponsor_event DROP FOREIGN KEY FK_9B444A9C71F7E88B');
        $this->addSql('DROP TABLE sponsor_event');
        $this->addSql('ALTER TABLE sponsor ADD event_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE sponsor ADD CONSTRAINT FK_818CC9D471F7E88B FOREIGN KEY (event_id) REFERENCES event (id)');
        $this->addSql('CREATE INDEX IDX_818CC9D471F7E88B ON sponsor (event_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE sponsor_event (sponsor_id INT NOT NULL, event_id INT NOT NULL, INDEX IDX_9B444A9C12F7FB51 (sponsor_id), INDEX IDX_9B444A9C71F7E88B (event_id), PRIMARY KEY(sponsor_id, event_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('ALTER TABLE sponsor_event ADD CONSTRAINT FK_9B444A9C12F7FB51 FOREIGN KEY (sponsor_id) REFERENCES sponsor (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE sponsor_event ADD CONSTRAINT FK_9B444A9C71F7E88B FOREIGN KEY (event_id) REFERENCES event (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE sponsor DROP FOREIGN KEY FK_818CC9D471F7E88B');
        $this->addSql('DROP INDEX IDX_818CC9D471F7E88B ON sponsor');
        $this->addSql('ALTER TABLE sponsor DROP event_id');
    }
}
