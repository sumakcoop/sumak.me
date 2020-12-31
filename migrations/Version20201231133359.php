<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20201231133359 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE product DROP FOREIGN KEY fk_id_parent');
        $this->addSql('CREATE TABLE sumak_product (id INT AUTO_INCREMENT NOT NULL, id_parent INT DEFAULT NULL, id_default_category INT NOT NULL, id_seller INT NOT NULL, type VARCHAR(10) NOT NULL, reference VARCHAR(100) DEFAULT NULL, ean13 VARCHAR(100) DEFAULT NULL, on_sale INT NOT NULL, active INT NOT NULL, id_tax_group INT NOT NULL, quantity INT NOT NULL, low_stock_alert INT DEFAULT 1 NOT NULL, min_quantity INT DEFAULT 1 NOT NULL, weight DOUBLE PRECISION DEFAULT NULL, width DOUBLE PRECISION DEFAULT NULL, height DOUBLE PRECISION DEFAULT NULL, depth DOUBLE PRECISION DEFAULT NULL, INDEX fk_id_parent (id_parent), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE sumak_product ADD CONSTRAINT FK_DD0319D1BB9D5A2 FOREIGN KEY (id_parent) REFERENCES sumak_product (id)');
        $this->addSql('DROP TABLE product');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE sumak_product DROP FOREIGN KEY FK_DD0319D1BB9D5A2');
        $this->addSql('CREATE TABLE product (id INT NOT NULL, id_parent INT NOT NULL, id_default_category INT NOT NULL, id_seller INT NOT NULL, type VARCHAR(10) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, reference VARCHAR(100) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, ean13 VARCHAR(100) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, on_sale INT NOT NULL, active INT NOT NULL, id_tax_group INT NOT NULL, quantity INT DEFAULT 0 NOT NULL, low_stock_alert INT DEFAULT 1 NOT NULL, min_quantity INT DEFAULT 1 NOT NULL, weight DOUBLE PRECISION DEFAULT NULL, width DOUBLE PRECISION DEFAULT NULL, height DOUBLE PRECISION DEFAULT NULL, depth DOUBLE PRECISION DEFAULT NULL, INDEX fk_id_parent (id_parent), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('ALTER TABLE product ADD CONSTRAINT fk_id_parent FOREIGN KEY (id_parent) REFERENCES product (id)');
        $this->addSql('DROP TABLE sumak_product');
    }
}
