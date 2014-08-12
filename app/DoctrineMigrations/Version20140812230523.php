<?php

namespace Application\Migrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20140812230523 extends AbstractMigration
{
    public function up(Schema $schema)
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() != "mysql", "Migration can only be executed safely on 'mysql'.");
        
        $this->addSql("ALTER TABLE Generator ADD author_id INT NOT NULL, ADD created_at DATETIME NOT NULL, ADD update_at DATETIME DEFAULT NULL");
        $this->addSql("ALTER TABLE Generator ADD CONSTRAINT FK_485FF9D3F675F31B FOREIGN KEY (author_id) REFERENCES Author (id)");
        $this->addSql("CREATE INDEX IDX_485FF9D3F675F31B ON Generator (author_id)");
    }

    public function down(Schema $schema)
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() != "mysql", "Migration can only be executed safely on 'mysql'.");
        
        $this->addSql("ALTER TABLE Generator DROP FOREIGN KEY FK_485FF9D3F675F31B");
        $this->addSql("DROP INDEX IDX_485FF9D3F675F31B ON Generator");
        $this->addSql("ALTER TABLE Generator DROP author_id, DROP created_at, DROP update_at");
    }
}
