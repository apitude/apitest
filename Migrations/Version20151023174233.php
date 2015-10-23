<?php

namespace DoctrineMigrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20151023174233 extends AbstractMigration
{
    /**
     * @param Schema $schema
     */
    public function up(Schema $schema)
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() != 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE persons (id INT AUTO_INCREMENT NOT NULL, firstName VARCHAR(64) NOT NULL, lastName VARCHAR(64) NOT NULL, created DATETIME NOT NULL, modified DATETIME NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user_security_group (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, UNIQUE INDEX UNIQ_EAF978365E237E06 (name), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user_user (id INT AUTO_INCREMENT NOT NULL, create_user_id INT DEFAULT NULL, modify_user_id INT DEFAULT NULL, username VARCHAR(255) NOT NULL, password VARCHAR(255) NOT NULL, roles LONGTEXT NOT NULL COMMENT \'(DC2Type:array)\', created DATETIME NOT NULL, modified DATETIME NOT NULL, UNIQUE INDEX UNIQ_F7129A80F85E0677 (username), UNIQUE INDEX UNIQ_F7129A8085564492 (create_user_id), UNIQUE INDEX UNIQ_F7129A80F52F9A2C (modify_user_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE users_securitygroups (user_id INT NOT NULL, securitygroup_id INT NOT NULL, INDEX IDX_E851AFF3A76ED395 (user_id), INDEX IDX_E851AFF3E7F73327 (securitygroup_id), PRIMARY KEY(user_id, securitygroup_id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE oauth_access_token (access_token VARCHAR(64) NOT NULL COLLATE ascii_general_ci, session_id INT UNSIGNED NOT NULL, expire_time INT UNSIGNED NOT NULL, PRIMARY KEY(access_token)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE oauth_access_token_scope (id INT UNSIGNED AUTO_INCREMENT NOT NULL, access_token VARCHAR(64) DEFAULT NULL COLLATE ascii_general_ci, scope VARCHAR(32) DEFAULT NULL COLLATE ascii_general_ci, INDEX IDX_6FEC3C13B6A2DD68 (access_token), INDEX IDX_6FEC3C13AF55D3 (scope), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE oauth_auth_code (auth_code VARCHAR(128) NOT NULL COLLATE ascii_general_ci, session_id INT UNSIGNED DEFAULT NULL, expire_time INT UNSIGNED NOT NULL, client_redirect_uri VARCHAR(255) NOT NULL, UNIQUE INDEX UNIQ_4D12F0E0613FECDF (session_id), PRIMARY KEY(auth_code)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE oauth_auth_code_scope (id INT UNSIGNED AUTO_INCREMENT NOT NULL, auth_code VARCHAR(128) DEFAULT NULL COLLATE ascii_general_ci, oauth_scope VARCHAR(32) DEFAULT NULL COLLATE ascii_general_ci, INDEX IDX_56B573175933D02C (auth_code), UNIQUE INDEX UNIQ_56B5731787ACBFC2 (oauth_scope), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE oauth_client (id VARCHAR(32) NOT NULL COLLATE ascii_general_ci, secret VARCHAR(255) NOT NULL COLLATE ascii_general_ci, name VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE oauth_client_redirect_uri (id INT UNSIGNED AUTO_INCREMENT NOT NULL, client_id VARCHAR(255) NOT NULL COLLATE ascii_general_ci, redirect_uri VARCHAR(255) NOT NULL COLLATE ascii_general_ci, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE oauth_refresh_token (refresh_token VARCHAR(64) NOT NULL, access_token VARCHAR(64) DEFAULT NULL COLLATE ascii_general_ci, expire_time INT UNSIGNED NOT NULL, UNIQUE INDEX UNIQ_55DCF755B6A2DD68 (access_token), PRIMARY KEY(refresh_token)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE oauth_scope (id VARCHAR(32) NOT NULL COLLATE ascii_general_ci, description VARCHAR(255) NOT NULL COLLATE ascii_general_ci, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE oauth_session (id INT UNSIGNED AUTO_INCREMENT NOT NULL, client_redirect_uri INT UNSIGNED DEFAULT NULL, owner_type VARCHAR(255) NOT NULL COLLATE ascii_general_ci, owner_id VARCHAR(255) NOT NULL COLLATE ascii_general_ci, client_id VARCHAR(255) NOT NULL COLLATE ascii_general_ci, UNIQUE INDEX UNIQ_C3427AA1561B6B19 (client_redirect_uri), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE oauth_session_scope (id INT UNSIGNED AUTO_INCREMENT NOT NULL, session_id INT UNSIGNED DEFAULT NULL, scope VARCHAR(32) DEFAULT NULL COLLATE ascii_general_ci, INDEX IDX_49413BC5613FECDF (session_id), UNIQUE INDEX UNIQ_49413BC5AF55D3 (scope), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE user_user ADD CONSTRAINT FK_F7129A8085564492 FOREIGN KEY (create_user_id) REFERENCES user_user (id)');
        $this->addSql('ALTER TABLE user_user ADD CONSTRAINT FK_F7129A80F52F9A2C FOREIGN KEY (modify_user_id) REFERENCES user_user (id)');
        $this->addSql('ALTER TABLE users_securitygroups ADD CONSTRAINT FK_E851AFF3A76ED395 FOREIGN KEY (user_id) REFERENCES user_user (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE users_securitygroups ADD CONSTRAINT FK_E851AFF3E7F73327 FOREIGN KEY (securitygroup_id) REFERENCES user_security_group (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE oauth_access_token_scope ADD CONSTRAINT FK_6FEC3C13B6A2DD68 FOREIGN KEY (access_token) REFERENCES oauth_access_token (access_token)');
        $this->addSql('ALTER TABLE oauth_access_token_scope ADD CONSTRAINT FK_6FEC3C13AF55D3 FOREIGN KEY (scope) REFERENCES oauth_scope (id)');
        $this->addSql('ALTER TABLE oauth_auth_code ADD CONSTRAINT FK_4D12F0E0613FECDF FOREIGN KEY (session_id) REFERENCES oauth_session (id)');
        $this->addSql('ALTER TABLE oauth_auth_code_scope ADD CONSTRAINT FK_56B573175933D02C FOREIGN KEY (auth_code) REFERENCES oauth_auth_code (auth_code)');
        $this->addSql('ALTER TABLE oauth_auth_code_scope ADD CONSTRAINT FK_56B5731787ACBFC2 FOREIGN KEY (oauth_scope) REFERENCES oauth_scope (id)');
        $this->addSql('ALTER TABLE oauth_refresh_token ADD CONSTRAINT FK_55DCF755B6A2DD68 FOREIGN KEY (access_token) REFERENCES oauth_access_token (access_token)');
        $this->addSql('ALTER TABLE oauth_session ADD CONSTRAINT FK_C3427AA1561B6B19 FOREIGN KEY (client_redirect_uri) REFERENCES oauth_client_redirect_uri (id)');
        $this->addSql('ALTER TABLE oauth_session_scope ADD CONSTRAINT FK_49413BC5613FECDF FOREIGN KEY (session_id) REFERENCES oauth_session (id)');
        $this->addSql('ALTER TABLE oauth_session_scope ADD CONSTRAINT FK_49413BC5AF55D3 FOREIGN KEY (scope) REFERENCES oauth_scope (id)');
    }

    /**
     * @param Schema $schema
     */
    public function down(Schema $schema)
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() != 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE users_securitygroups DROP FOREIGN KEY FK_E851AFF3E7F73327');
        $this->addSql('ALTER TABLE user_user DROP FOREIGN KEY FK_F7129A8085564492');
        $this->addSql('ALTER TABLE user_user DROP FOREIGN KEY FK_F7129A80F52F9A2C');
        $this->addSql('ALTER TABLE users_securitygroups DROP FOREIGN KEY FK_E851AFF3A76ED395');
        $this->addSql('ALTER TABLE oauth_access_token_scope DROP FOREIGN KEY FK_6FEC3C13B6A2DD68');
        $this->addSql('ALTER TABLE oauth_refresh_token DROP FOREIGN KEY FK_55DCF755B6A2DD68');
        $this->addSql('ALTER TABLE oauth_auth_code_scope DROP FOREIGN KEY FK_56B573175933D02C');
        $this->addSql('ALTER TABLE oauth_session DROP FOREIGN KEY FK_C3427AA1561B6B19');
        $this->addSql('ALTER TABLE oauth_access_token_scope DROP FOREIGN KEY FK_6FEC3C13AF55D3');
        $this->addSql('ALTER TABLE oauth_auth_code_scope DROP FOREIGN KEY FK_56B5731787ACBFC2');
        $this->addSql('ALTER TABLE oauth_session_scope DROP FOREIGN KEY FK_49413BC5AF55D3');
        $this->addSql('ALTER TABLE oauth_auth_code DROP FOREIGN KEY FK_4D12F0E0613FECDF');
        $this->addSql('ALTER TABLE oauth_session_scope DROP FOREIGN KEY FK_49413BC5613FECDF');
        $this->addSql('DROP TABLE persons');
        $this->addSql('DROP TABLE user_security_group');
        $this->addSql('DROP TABLE user_user');
        $this->addSql('DROP TABLE users_securitygroups');
        $this->addSql('DROP TABLE oauth_access_token');
        $this->addSql('DROP TABLE oauth_access_token_scope');
        $this->addSql('DROP TABLE oauth_auth_code');
        $this->addSql('DROP TABLE oauth_auth_code_scope');
        $this->addSql('DROP TABLE oauth_client');
        $this->addSql('DROP TABLE oauth_client_redirect_uri');
        $this->addSql('DROP TABLE oauth_refresh_token');
        $this->addSql('DROP TABLE oauth_scope');
        $this->addSql('DROP TABLE oauth_session');
        $this->addSql('DROP TABLE oauth_session_scope');
    }
}
