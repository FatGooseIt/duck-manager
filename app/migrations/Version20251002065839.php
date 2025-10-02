<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

final class Version20251002065839 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        $this->addSql('CREATE TABLE incomes (id CHAR(36) NOT NULL, currency_rate DOUBLE PRECISION NOT NULL, income DOUBLE PRECISION NOT NULL, net_income DOUBLE PRECISION NOT NULL, created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, salary_info_id CHAR(36) DEFAULT NULL, INDEX IDX_9DE2B5BDCA8F5B34 (salary_info_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE salary_info (id CHAR(36) NOT NULL, salary DOUBLE PRECISION NOT NULL, created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, user_id CHAR(36) DEFAULT NULL, INDEX IDX_9320139FA76ED395 (user_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE users (id CHAR(36) NOT NULL, email VARCHAR(255) NOT NULL, created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE incomes ADD CONSTRAINT FK_9DE2B5BDCA8F5B34 FOREIGN KEY (salary_info_id) REFERENCES salary_info (id)');
        $this->addSql('ALTER TABLE salary_info ADD CONSTRAINT FK_9320139FA76ED395 FOREIGN KEY (user_id) REFERENCES users (id)');
    }

    public function down(Schema $schema): void
    {
        $this->addSql('ALTER TABLE incomes DROP FOREIGN KEY FK_9DE2B5BDCA8F5B34');
        $this->addSql('ALTER TABLE salary_info DROP FOREIGN KEY FK_9320139FA76ED395');
        $this->addSql('DROP TABLE incomes');
        $this->addSql('DROP TABLE salary_info');
        $this->addSql('DROP TABLE users');
    }
}
