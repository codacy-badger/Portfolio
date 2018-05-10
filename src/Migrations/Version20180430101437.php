<?php declare(strict_types = 1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20180430101437 extends AbstractMigration
{
    public function up(Schema $schema)
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE skills ADD category_id INT NOT NULL, CHANGE percent percent VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE skills ADD CONSTRAINT FK_D531167012469DE2 FOREIGN KEY (category_id) REFERENCES skills_category (id)');
        $this->addSql('CREATE INDEX IDX_D531167012469DE2 ON skills (category_id)');
    }

    public function down(Schema $schema)
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE skills DROP FOREIGN KEY FK_D531167012469DE2');
        $this->addSql('DROP INDEX IDX_D531167012469DE2 ON skills');
        $this->addSql('ALTER TABLE skills DROP category_id, CHANGE percent percent INT NOT NULL');
    }
}
