<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20231110101659 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE classroom_enseignant (classroom_id INT NOT NULL, enseignant_id INT NOT NULL, INDEX IDX_AFA21CF66278D5A8 (classroom_id), INDEX IDX_AFA21CF6E455FCC0 (enseignant_id), PRIMARY KEY(classroom_id, enseignant_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE classroom_enseignant ADD CONSTRAINT FK_AFA21CF66278D5A8 FOREIGN KEY (classroom_id) REFERENCES classroom (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE classroom_enseignant ADD CONSTRAINT FK_AFA21CF6E455FCC0 FOREIGN KEY (enseignant_id) REFERENCES enseignant (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE classroom_enseignant DROP FOREIGN KEY FK_AFA21CF66278D5A8');
        $this->addSql('ALTER TABLE classroom_enseignant DROP FOREIGN KEY FK_AFA21CF6E455FCC0');
        $this->addSql('DROP TABLE classroom_enseignant');
    }
}
