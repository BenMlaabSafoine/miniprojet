<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220426213041 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE adherant_reservation (adherant_id INT NOT NULL, reservation_id INT NOT NULL, INDEX IDX_492BE3D8BE612E45 (adherant_id), INDEX IDX_492BE3D8B83297E7 (reservation_id), PRIMARY KEY(adherant_id, reservation_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE bibliothecaire_emprunt (bibliothecaire_id INT NOT NULL, emprunt_id INT NOT NULL, INDEX IDX_BF22E470C5B7CBAD (bibliothecaire_id), INDEX IDX_BF22E470AE7FEF94 (emprunt_id), PRIMARY KEY(bibliothecaire_id, emprunt_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE bibliothecaire_adherant (bibliothecaire_id INT NOT NULL, adherant_id INT NOT NULL, INDEX IDX_DFE10C62C5B7CBAD (bibliothecaire_id), INDEX IDX_DFE10C62BE612E45 (adherant_id), PRIMARY KEY(bibliothecaire_id, adherant_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE bibliotheque_adherant (bibliotheque_id INT NOT NULL, adherant_id INT NOT NULL, INDEX IDX_289C173E4419DE7D (bibliotheque_id), INDEX IDX_289C173EBE612E45 (adherant_id), PRIMARY KEY(bibliotheque_id, adherant_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE bibliotheque_emprunt (bibliotheque_id INT NOT NULL, emprunt_id INT NOT NULL, INDEX IDX_A06EE5E44419DE7D (bibliotheque_id), INDEX IDX_A06EE5E4AE7FEF94 (emprunt_id), PRIMARY KEY(bibliotheque_id, emprunt_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE emprunt_reservation (emprunt_id INT NOT NULL, reservation_id INT NOT NULL, INDEX IDX_C86C1403AE7FEF94 (emprunt_id), INDEX IDX_C86C1403B83297E7 (reservation_id), PRIMARY KEY(emprunt_id, reservation_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE livre_reservation (livre_id INT NOT NULL, reservation_id INT NOT NULL, INDEX IDX_90F3608437D925CB (livre_id), INDEX IDX_90F36084B83297E7 (reservation_id), PRIMARY KEY(livre_id, reservation_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE adherant_reservation ADD CONSTRAINT FK_492BE3D8BE612E45 FOREIGN KEY (adherant_id) REFERENCES adherant (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE adherant_reservation ADD CONSTRAINT FK_492BE3D8B83297E7 FOREIGN KEY (reservation_id) REFERENCES reservation (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE bibliothecaire_emprunt ADD CONSTRAINT FK_BF22E470C5B7CBAD FOREIGN KEY (bibliothecaire_id) REFERENCES bibliothecaire (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE bibliothecaire_emprunt ADD CONSTRAINT FK_BF22E470AE7FEF94 FOREIGN KEY (emprunt_id) REFERENCES emprunt (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE bibliothecaire_adherant ADD CONSTRAINT FK_DFE10C62C5B7CBAD FOREIGN KEY (bibliothecaire_id) REFERENCES bibliothecaire (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE bibliothecaire_adherant ADD CONSTRAINT FK_DFE10C62BE612E45 FOREIGN KEY (adherant_id) REFERENCES adherant (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE bibliotheque_adherant ADD CONSTRAINT FK_289C173E4419DE7D FOREIGN KEY (bibliotheque_id) REFERENCES bibliotheque (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE bibliotheque_adherant ADD CONSTRAINT FK_289C173EBE612E45 FOREIGN KEY (adherant_id) REFERENCES adherant (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE bibliotheque_emprunt ADD CONSTRAINT FK_A06EE5E44419DE7D FOREIGN KEY (bibliotheque_id) REFERENCES bibliotheque (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE bibliotheque_emprunt ADD CONSTRAINT FK_A06EE5E4AE7FEF94 FOREIGN KEY (emprunt_id) REFERENCES emprunt (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE emprunt_reservation ADD CONSTRAINT FK_C86C1403AE7FEF94 FOREIGN KEY (emprunt_id) REFERENCES emprunt (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE emprunt_reservation ADD CONSTRAINT FK_C86C1403B83297E7 FOREIGN KEY (reservation_id) REFERENCES reservation (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE livre_reservation ADD CONSTRAINT FK_90F3608437D925CB FOREIGN KEY (livre_id) REFERENCES livre (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE livre_reservation ADD CONSTRAINT FK_90F36084B83297E7 FOREIGN KEY (reservation_id) REFERENCES reservation (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE bibliothecaire ADD bibliotheque_id INT NOT NULL');
        $this->addSql('ALTER TABLE bibliothecaire ADD CONSTRAINT FK_F74495A44419DE7D FOREIGN KEY (bibliotheque_id) REFERENCES bibliotheque (id)');
        $this->addSql('CREATE INDEX IDX_F74495A44419DE7D ON bibliothecaire (bibliotheque_id)');
        $this->addSql('ALTER TABLE livre ADD bibliotheque_id INT NOT NULL, ADD emprunt_id INT NOT NULL, ADD adherant_id INT NOT NULL');
        $this->addSql('ALTER TABLE livre ADD CONSTRAINT FK_AC634F994419DE7D FOREIGN KEY (bibliotheque_id) REFERENCES bibliotheque (id)');
        $this->addSql('ALTER TABLE livre ADD CONSTRAINT FK_AC634F99AE7FEF94 FOREIGN KEY (emprunt_id) REFERENCES emprunt (id)');
        $this->addSql('ALTER TABLE livre ADD CONSTRAINT FK_AC634F99BE612E45 FOREIGN KEY (adherant_id) REFERENCES adherant (id)');
        $this->addSql('CREATE INDEX IDX_AC634F994419DE7D ON livre (bibliotheque_id)');
        $this->addSql('CREATE INDEX IDX_AC634F99AE7FEF94 ON livre (emprunt_id)');
        $this->addSql('CREATE INDEX IDX_AC634F99BE612E45 ON livre (adherant_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE adherant_reservation');
        $this->addSql('DROP TABLE bibliothecaire_emprunt');
        $this->addSql('DROP TABLE bibliothecaire_adherant');
        $this->addSql('DROP TABLE bibliotheque_adherant');
        $this->addSql('DROP TABLE bibliotheque_emprunt');
        $this->addSql('DROP TABLE emprunt_reservation');
        $this->addSql('DROP TABLE livre_reservation');
        $this->addSql('ALTER TABLE bibliothecaire DROP FOREIGN KEY FK_F74495A44419DE7D');
        $this->addSql('DROP INDEX IDX_F74495A44419DE7D ON bibliothecaire');
        $this->addSql('ALTER TABLE bibliothecaire DROP bibliotheque_id');
        $this->addSql('ALTER TABLE livre DROP FOREIGN KEY FK_AC634F994419DE7D');
        $this->addSql('ALTER TABLE livre DROP FOREIGN KEY FK_AC634F99AE7FEF94');
        $this->addSql('ALTER TABLE livre DROP FOREIGN KEY FK_AC634F99BE612E45');
        $this->addSql('DROP INDEX IDX_AC634F994419DE7D ON livre');
        $this->addSql('DROP INDEX IDX_AC634F99AE7FEF94 ON livre');
        $this->addSql('DROP INDEX IDX_AC634F99BE612E45 ON livre');
        $this->addSql('ALTER TABLE livre DROP bibliotheque_id, DROP emprunt_id, DROP adherant_id');
    }
}
