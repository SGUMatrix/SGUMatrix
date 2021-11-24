<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20211123231817 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SEQUENCE statistic_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE TABLE statistic (id INT NOT NULL, user_profile_id INT DEFAULT NULL, all_planet INT DEFAULT 0 NOT NULL, my_planet INT DEFAULT 0 NOT NULL, all_comet INT DEFAULT 0 NOT NULL, my_comet INT DEFAULT 0 NOT NULL, first_line_planet INT DEFAULT 0 NOT NULL, structure_planet INT DEFAULT 0 NOT NULL, my_inviter_income INT DEFAULT 0 NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_649B469C6B9DD454 ON statistic (user_profile_id)');
        $this->addSql('ALTER TABLE statistic ADD CONSTRAINT FK_649B469C6B9DD454 FOREIGN KEY (user_profile_id) REFERENCES user_profile (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('DROP INDEX uniq_d95ab4053ccaa4b7');
        $this->addSql('ALTER TABLE user_profile ADD statistic_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE user_profile ADD finance_password VARCHAR(255) DEFAULT NULL');
        $this->addSql('ALTER TABLE user_profile ADD instagram VARCHAR(255) DEFAULT NULL');
        $this->addSql('ALTER TABLE user_profile ADD telegram VARCHAR(255) DEFAULT NULL');
        $this->addSql('ALTER TABLE user_profile ADD vkontakte VARCHAR(255) DEFAULT NULL');
        $this->addSql('ALTER TABLE user_profile ADD description VARCHAR(255) DEFAULT NULL');
        $this->addSql('ALTER TABLE user_profile ADD balance INT DEFAULT 0 NOT NULL');
        $this->addSql('ALTER TABLE user_profile ADD transit_balance INT DEFAULT NULL');
        $this->addSql('ALTER TABLE user_profile ADD registration_date TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL');
        $this->addSql('ALTER TABLE user_profile ADD activation_date TIMESTAMP(0) WITHOUT TIME ZONE DEFAULT NULL');
        $this->addSql('ALTER TABLE user_profile ADD CONSTRAINT FK_D95AB40553B6268F FOREIGN KEY (statistic_id) REFERENCES statistic (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('CREATE INDEX IDX_D95AB4053CCAA4B7 ON user_profile (referral_id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_D95AB40553B6268F ON user_profile (statistic_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('ALTER TABLE user_profile DROP CONSTRAINT FK_D95AB40553B6268F');
        $this->addSql('DROP SEQUENCE statistic_id_seq CASCADE');
        $this->addSql('DROP TABLE statistic');
        $this->addSql('DROP INDEX IDX_D95AB4053CCAA4B7');
        $this->addSql('DROP INDEX UNIQ_D95AB40553B6268F');
        $this->addSql('ALTER TABLE user_profile DROP statistic_id');
        $this->addSql('ALTER TABLE user_profile DROP finance_password');
        $this->addSql('ALTER TABLE user_profile DROP instagram');
        $this->addSql('ALTER TABLE user_profile DROP telegram');
        $this->addSql('ALTER TABLE user_profile DROP vkontakte');
        $this->addSql('ALTER TABLE user_profile DROP description');
        $this->addSql('ALTER TABLE user_profile DROP balance');
        $this->addSql('ALTER TABLE user_profile DROP transit_balance');
        $this->addSql('ALTER TABLE user_profile DROP registration_date');
        $this->addSql('ALTER TABLE user_profile DROP activation_date');
        $this->addSql('CREATE UNIQUE INDEX uniq_d95ab4053ccaa4b7 ON user_profile (referral_id)');
    }
}
