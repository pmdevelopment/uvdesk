<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

final class Version20230131075403 extends AbstractMigration
{
    public function getDescription() : string
    {
        return 'Add conversation';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE uv_ticket_conversation (id INT AUTO_INCREMENT NOT NULL, ticket_id INT DEFAULT NULL, conversation_id VARCHAR(255) NOT NULL, INDEX IDX_EF87AA59700047D2 (ticket_id), INDEX IDX_EF87AA599AC0396 (conversation_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE uv_ticket_conversation ADD CONSTRAINT FK_EF87AA59700047D2 FOREIGN KEY (ticket_id) REFERENCES uv_ticket (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('DROP TABLE uv_ticket_conversation');
    }
}
