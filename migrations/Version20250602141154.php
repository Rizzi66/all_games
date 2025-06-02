<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20250602141154 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql(<<<'SQL'
            ALTER TABLE wishlist_item_game DROP FOREIGN KEY FK_517B0CE68D638424
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE wishlist_item_game DROP FOREIGN KEY FK_517B0CE6E48FD905
        SQL);
        $this->addSql(<<<'SQL'
            DROP TABLE wishlist_item_game
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE wishlist_item ADD game_id INT DEFAULT NULL
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE wishlist_item ADD CONSTRAINT FK_6424F4E8E48FD905 FOREIGN KEY (game_id) REFERENCES game (id)
        SQL);
        $this->addSql(<<<'SQL'
            CREATE INDEX IDX_6424F4E8E48FD905 ON wishlist_item (game_id)
        SQL);
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql(<<<'SQL'
            CREATE TABLE wishlist_item_game (wishlist_item_id INT NOT NULL, game_id INT NOT NULL, INDEX IDX_517B0CE6E48FD905 (game_id), INDEX IDX_517B0CE68D638424 (wishlist_item_id), PRIMARY KEY(wishlist_item_id, game_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = '' 
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE wishlist_item_game ADD CONSTRAINT FK_517B0CE68D638424 FOREIGN KEY (wishlist_item_id) REFERENCES wishlist_item (id) ON DELETE CASCADE
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE wishlist_item_game ADD CONSTRAINT FK_517B0CE6E48FD905 FOREIGN KEY (game_id) REFERENCES game (id) ON DELETE CASCADE
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE wishlist_item DROP FOREIGN KEY FK_6424F4E8E48FD905
        SQL);
        $this->addSql(<<<'SQL'
            DROP INDEX IDX_6424F4E8E48FD905 ON wishlist_item
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE wishlist_item DROP game_id
        SQL);
    }
}
