<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240305104909 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE category CHANGE img img VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE customer CHANGE house_number house_number NUMERIC(5, 2) NOT NULL');
        $this->addSql('ALTER TABLE `order` DROP INDEX IDX_F5299398AE945C60, ADD UNIQUE INDEX UNIQ_F5299398AE945C60 (size_id_id)');
        $this->addSql('ALTER TABLE `order` ADD total_price NUMERIC(5, 2) NOT NULL, CHANGE product_id_id product_id_id INT NOT NULL, CHANGE customer_id_id customer_id_id INT NOT NULL, CHANGE size_id_id size_id_id INT NOT NULL');
        $this->addSql('ALTER TABLE product DROP FOREIGN KEY FK_D34A04ADAE945C60');
        $this->addSql('ALTER TABLE product DROP FOREIGN KEY FK_D34A04AD9777D11E');
        $this->addSql('ALTER TABLE product DROP FOREIGN KEY FK_D34A04ADBE6903FD');
        $this->addSql('ALTER TABLE product DROP FOREIGN KEY FK_D34A04AD9F6BE52F');
        $this->addSql('DROP INDEX IDX_D34A04AD9F6BE52F ON product');
        $this->addSql('DROP INDEX IDX_D34A04ADAE945C60 ON product');
        $this->addSql('DROP INDEX IDX_D34A04ADBE6903FD ON product');
        $this->addSql('DROP INDEX IDX_D34A04AD9777D11E ON product');
        $this->addSql('ALTER TABLE product ADD category_id INT NOT NULL, DROP product_category_id, DROP category_id_id, DROP size_product_id, DROP size_id_id');
        $this->addSql('ALTER TABLE product ADD CONSTRAINT FK_D34A04AD12469DE2 FOREIGN KEY (category_id) REFERENCES category (id)');
        $this->addSql('CREATE INDEX IDX_D34A04AD12469DE2 ON product (category_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE category CHANGE img img VARCHAR(255) DEFAULT NULL');
        $this->addSql('ALTER TABLE customer CHANGE house_number house_number VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE `order` DROP INDEX UNIQ_F5299398AE945C60, ADD INDEX IDX_F5299398AE945C60 (size_id_id)');
        $this->addSql('ALTER TABLE `order` DROP total_price, CHANGE product_id_id product_id_id INT DEFAULT NULL, CHANGE customer_id_id customer_id_id INT DEFAULT NULL, CHANGE size_id_id size_id_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE product DROP FOREIGN KEY FK_D34A04AD12469DE2');
        $this->addSql('DROP INDEX IDX_D34A04AD12469DE2 ON product');
        $this->addSql('ALTER TABLE product ADD category_id_id INT NOT NULL, ADD size_product_id INT DEFAULT NULL, ADD size_id_id INT DEFAULT NULL, CHANGE category_id product_category_id INT NOT NULL');
        $this->addSql('ALTER TABLE product ADD CONSTRAINT FK_D34A04ADAE945C60 FOREIGN KEY (size_id_id) REFERENCES size (id)');
        $this->addSql('ALTER TABLE product ADD CONSTRAINT FK_D34A04AD9777D11E FOREIGN KEY (category_id_id) REFERENCES category (id)');
        $this->addSql('ALTER TABLE product ADD CONSTRAINT FK_D34A04ADBE6903FD FOREIGN KEY (product_category_id) REFERENCES category (id)');
        $this->addSql('ALTER TABLE product ADD CONSTRAINT FK_D34A04AD9F6BE52F FOREIGN KEY (size_product_id) REFERENCES size (id)');
        $this->addSql('CREATE INDEX IDX_D34A04AD9F6BE52F ON product (size_product_id)');
        $this->addSql('CREATE INDEX IDX_D34A04ADAE945C60 ON product (size_id_id)');
        $this->addSql('CREATE INDEX IDX_D34A04ADBE6903FD ON product (product_category_id)');
        $this->addSql('CREATE INDEX IDX_D34A04AD9777D11E ON product (category_id_id)');
    }
}
