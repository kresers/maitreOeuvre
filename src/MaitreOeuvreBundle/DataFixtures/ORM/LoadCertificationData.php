
<?php
// src/UserBundle/DataFixtures/ORM/LoadUserData.php



use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use UserBundle\Entity\User;
use MaitreOeuvreBundle\Entity\Certification;


class LoadCertificationData implements FixtureInterface
{
    public function load(ObjectManager $manager)
    {
        // Certification

        $certification = new Certification();
        $certification->setLibelle('Acotherm');
        $manager->persist($certification);
        $manager->flush();

        $certification = new Certification();
        $certification->setLibelle('Ademe');
        $manager->persist($certification);
        $manager->flush();

        $certification = new Certification();
        $certification->setLibelle('AFAQ AFNOR Certification');
        $manager->persist($certification);
        $manager->flush();

        $certification = new Certification();
        $certification->setLibelle('APSAD');
        $manager->persist($certification);
        $manager->flush();

        $certification = new Certification();
        $certification->setLibelle('BBC');
        $manager->persist($certification);
        $manager->flush();

        $certification = new Certification();
        $certification->setLibelle('CEKAL');
        $manager->persist($certification);
        $manager->flush();

        $certification = new Certification();
        $certification->setLibelle('CSTB');
        $manager->persist($certification);
        $manager->flush();

        $certification = new Certification();
        $certification->setLibelle('Eco artisan');
        $manager->persist($certification);
        $manager->flush();

        $certification = new Certification();
        $certification->setLibelle('Ecopass');
        $manager->persist($certification);
        $manager->flush();

        $certification = new Certification();
        $certification->setLibelle('Eurovent');
        $manager->persist($certification);
        $manager->flush();

        $certification = new Certification();
        $certification->setLibelle('Flamme verte');
        $manager->persist($certification);
        $manager->flush();

        $certification = new Certification();
        $certification->setLibelle('ô solaire');
        $manager->persist($certification);
        $manager->flush();

        $certification = new Certification();
        $certification->setLibelle('Promotelec');
        $manager->persist($certification);
        $manager->flush();

        $certification = new Certification();
        $certification->setLibelle('Qualibat');
        $manager->persist($certification);
        $manager->flush();

        $certification = new Certification();
        $certification->setLibelle('Qualibois');
        $manager->persist($certification);
        $manager->flush();

        $certification = new Certification();
        $certification->setLibelle('Qualicert');
        $manager->persist($certification);
        $manager->flush();

        $certification = new Certification();
        $certification->setLibelle('Qualiclimafroid');
        $manager->persist($certification);
        $manager->flush();

        $certification = new Certification();
        $certification->setLibelle('Qualifelec');
        $manager->persist($certification);
        $manager->flush();

        $certification = new Certification();
        $certification->setLibelle('QualiPAC');
        $manager->persist($certification);
        $manager->flush();

        $certification = new Certification();
        $certification->setLibelle('Qualipaysage');
        $manager->persist($certification);
        $manager->flush();

        $certification = new Certification();
        $certification->setLibelle('QualiPV');
        $manager->persist($certification);
        $manager->flush();

        $certification = new Certification();
        $certification->setLibelle('Qualisol');
        $manager->persist($certification);
        $manager->flush();

        $certification = new Certification();
        $certification->setLibelle('RGE');
        $manager->persist($certification);
        $manager->flush();

        $certification = new Certification();
        $certification->setLibelle('UNEP');
        $manager->persist($certification);
        $manager->flush();
    }
}
?>
