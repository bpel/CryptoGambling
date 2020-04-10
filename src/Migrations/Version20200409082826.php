<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200409082826 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE withdrawal DROP FOREIGN KEY FK_6D2D3B45786A81FB');
        $this->addSql('DROP INDEX IDX_6D2D3B45786A81FB ON withdrawal');
        $this->addSql('ALTER TABLE withdrawal CHANGE iduser_id user_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE withdrawal ADD CONSTRAINT FK_6D2D3B45A76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('CREATE INDEX IDX_6D2D3B45A76ED395 ON withdrawal (user_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE withdrawal DROP FOREIGN KEY FK_6D2D3B45A76ED395');
        $this->addSql('DROP INDEX IDX_6D2D3B45A76ED395 ON withdrawal');
        $this->addSql('ALTER TABLE withdrawal CHANGE user_id iduser_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE withdrawal ADD CONSTRAINT FK_6D2D3B45786A81FB FOREIGN KEY (iduser_id) REFERENCES user (id) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('CREATE INDEX IDX_6D2D3B45786A81FB ON withdrawal (iduser_id)');
    }
}
