<?php

namespace DoctrineMigrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20150719090530 extends AbstractMigration
{
    /**
     * @param Schema $schema
     */
    public function up(Schema $schema)
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() != 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE persons ADD create_user_id INT DEFAULT NULL, ADD modify_user_id INT DEFAULT NULL, ADD created DATETIME NOT NULL, ADD modified DATETIME NOT NULL');
        $this->addSql('ALTER TABLE persons ADD CONSTRAINT FK_A25CC7D385564492 FOREIGN KEY (create_user_id) REFERENCES users (id)');
        $this->addSql('ALTER TABLE persons ADD CONSTRAINT FK_A25CC7D3F52F9A2C FOREIGN KEY (modify_user_id) REFERENCES users (id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_A25CC7D385564492 ON persons (create_user_id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_A25CC7D3F52F9A2C ON persons (modify_user_id)');
    }

    /**
     * @param Schema $schema
     */
    public function down(Schema $schema)
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() != 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE persons DROP FOREIGN KEY FK_A25CC7D385564492');
        $this->addSql('ALTER TABLE persons DROP FOREIGN KEY FK_A25CC7D3F52F9A2C');
        $this->addSql('DROP INDEX UNIQ_A25CC7D385564492 ON persons');
        $this->addSql('DROP INDEX UNIQ_A25CC7D3F52F9A2C ON persons');
        $this->addSql('ALTER TABLE persons DROP create_user_id, DROP modify_user_id, DROP created, DROP modified');
    }
}
