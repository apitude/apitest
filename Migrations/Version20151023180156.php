<?php

namespace DoctrineMigrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20151023180156 extends AbstractMigration
{
    /**
     * @param Schema $schema
     */
    public function up(Schema $schema)
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() != 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE oauth_client CHANGE id id VARCHAR(64) NOT NULL COLLATE ascii_general_ci');
        $this->addSql('ALTER TABLE oauth_client_redirect_uri CHANGE client_id client_id VARCHAR(64) NOT NULL COLLATE ascii_general_ci');
        $this->addSql('ALTER TABLE oauth_session CHANGE client_id client_id VARCHAR(64) NOT NULL COLLATE ascii_general_ci');
    }

    /**
     * @param Schema $schema
     */
    public function down(Schema $schema)
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() != 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE oauth_client CHANGE id id VARCHAR(32) NOT NULL COLLATE ascii_general_ci');
        $this->addSql('ALTER TABLE oauth_client_redirect_uri CHANGE client_id client_id VARCHAR(255) NOT NULL COLLATE ascii_general_ci');
        $this->addSql('ALTER TABLE oauth_session CHANGE client_id client_id VARCHAR(255) NOT NULL COLLATE ascii_general_ci');
    }
}
