
<?php
// src/UserBundle/DataFixtures/ORM/LoadUserData.php



use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use UserBundle\Entity\User;
use MaitreOeuvreBundle\Entity\Certification;


class LoadUserData implements FixtureInterface
{
    public function load(ObjectManager $manager)
    {
        $entity = new User();
        $entity->setUsername('patron');
        $entity->setPlainPassword('patron');
        $entity->setEmail('patron@maitreoeuvre.fr');
        $role = array('ROLE_PATRON');
        $entity->setEnabled(1);
        $entity->setRoles($role);
        $manager->persist($entity);
        $manager->flush();

        $entity = new User();
        $entity->setUsername('Secretaire1');
        $entity->setPlainPassword('Secretaire1');
        $entity->setEmail('Secretaire1@maitreoeuvre.fr');
        $role = array('ROLE_SECRETAIRE');
        $entity->setRoles($role);
        $entity->setEnabled(1);
        $manager->persist($entity);
        $manager->flush();

        $entity = new User();
        $entity->setUsername('secretaire2');
        $entity->setPlainPassword('secretaire2');
        $entity->setEmail('secretaire2@maitreoeuvre.fr');
        $entity->setEnabled(1);
        $role = array('ROLE_SECRETAIRE');
        $entity->setRoles($role);
        $manager->persist($entity);
        $manager->flush();

        $entity = new User();
        $entity->setUsername('secretaire3');
        $entity->setPlainPassword('secretaire3');
        $entity->setEnabled(1);
        $entity->setEmail('secretaire3@maitreoeuvre.fr');
        $role = array('ROLE_SECRETAIRE');
        $entity->setRoles($role);
        $manager->persist($entity);
        $manager->flush();

        $entity = new User();
        $entity->setUsername('client1');
        $entity->setPlainPassword('client1');
        $entity->setEnabled(1);
        $entity->setEmail('client1@maitreoeuvre.fr');
        $entity->setPrenom('Polo');
        $entity->setTelPort('0612345678');
        $entity->setTelFixe('0112345678');
        $role = array('ROLE_CLIENT');
        $entity->setRoles($role);
        $manager->persist($entity);
        $manager->flush();

        $entity = new User();
        $entity->setUsername('client2');
        $entity->setPlainPassword('client2');
        $entity->setEnabled(1);
        $entity->setEmail('client2@maitreoeuvre.fr');
        $entity->setPrenom('Robert');
        $entity->setTelPort('0612345678');
        $entity->setTelFixe('0112345678');
        $role = array('ROLE_CLIENT');
        $entity->setRoles($role);
        $manager->persist($entity);
        $manager->flush();

        $entity = new User();
        $entity->setUsername('client3');
        $entity->setPlainPassword('client3');
        $entity->setEnabled(1);
        $entity->setEmail('client3@maitreoeuvre.fr');
        $entity->setPrenom('Mouloud');
        $entity->setTelPort('0612345678');
        $entity->setTelFixe('0112345678');
        $role = array('ROLE_CLIENT');
        $entity->setRoles($role);
        $manager->persist($entity);
        $manager->flush();

        $entity = new User();
        $entity->setUsername('client4');
        $entity->setPlainPassword('client4');
        $entity->setEnabled(1);
        $entity->setEmail('client4@maitreoeuvre.fr');
        $entity->setPrenom('Booba');
        $entity->setTelPort('0612345678');
        $entity->setTelFixe('0112345678');
        $role = array('ROLE_CLIENT');
        $entity->setRoles($role);
        $manager->persist($entity);
        $manager->flush();

        $entity = new User();
        $entity->setUsername('client5');
        $entity->setPlainPassword('client5');
        $entity->setEnabled(1);
        $entity->setEmail('client5@maitreoeuvre.fr');
        $entity->setPrenom('Alfred');
        $entity->setTelPort('0612345678');
        $entity->setTelFixe('0112345678');
        $role = array('ROLE_CLIENT');
        $entity->setRoles($role);
        $manager->persist($entity);
        $manager->flush();

        $entity = new User();
        $entity->setUsername('client6');
        $entity->setPlainPassword('client6');
        $entity->setEnabled(1);
        $entity->setEmail('client6@maitreoeuvre.fr');
        $entity->setPrenom('Ibrahim');
        $entity->setTelPort('0612345678');
        $entity->setTelFixe('0112345678');
        $role = array('ROLE_CLIENT');
        $entity->setRoles($role);
        $manager->persist($entity);
        $manager->flush();

        $entity = new User();
        $entity->setUsername('artisan1');
        $entity->setPlainPassword('artisan1');
        $entity->setTelPort('01 30 35 36 18');
        $entity->setVille('Tataouine');
        $entity->setRue('rue des jedi');
        $entity->setCp('95270');
        $entity->setEnabled(1);
        $entity->setDateCrea(new \DateTime (2150-11-16));
        $entity->setNumPolice('fdb4fq4ger5g5');
        $entity->setNumAssureur('erg+54g65g4er');
        $entity->setSite('www.test.com');
        $entity->setEmail('artisan1@maitreoeuvre.fr');
        $role = array('ROLE_ARTISAN');
        $entity->setRoles($role);
        $manager->persist($entity);
        $manager->flush();

        $entity = new User();
        $entity->setUsername('artisan2');
        $entity->setPlainPassword('artisan2');
        $entity->setTelPort('06 60 80 20 45');
        $entity->setVille('Amsterdam');
        $entity->setRue('Quartier rouge');
        $entity->setCp('3025');
        $entity->setEnabled(1);
        $entity->setDateCrea(new \DateTime (2000-05-17));
        $entity->setNumPolice('qfdsfdsf6f59s8f#');
        $entity->setNumAssureur('r8eg46s4gqsd54fs');
        $entity->setSite('www.test2.com');
        $entity->setEnabled(1);
        $entity->setEmail('artisan2@maitreoeuvre.fr');
        $role = array('ROLE_ARTISAN');
        $entity->setRoles($role);
        $manager->persist($entity);
        $manager->flush();

        $entity = new User();
        $entity->setUsername('artisan3');
        $entity->setPlainPassword('artisan3');
        $entity->setTelPort('07 20 26 84 60');
        $entity->setVille('Orléan');
        $entity->setRue('rue des avions');
        $entity->setCp('70850');
        $entity->setEnabled(1);
        $entity->setDateCrea(new \DateTime (1996-03-20));
        $entity->setNumPolice('hkfjdf8j4r');
        $entity->setNumAssureur('956fdqfqfsqeg');
        $entity->setSite('www.test3.com');
        $entity->setEnabled(1);
        $entity->setEmail('artisan3@maitreoeuvre.fr');
        $role = array('ROLE_ARTISAN');
        $entity->setRoles($role);
        $manager->persist($entity);
        $manager->flush();

        $entity = new User();
        $entity->setUsername('artisan4');
        $entity->setPlainPassword('artisan4');
        $entity->setTelPort('06 60 64 23 19');
        $entity->setVille('Paris');
        $entity->setRue('boulevard voltaire');
        $entity->setCp('75150');
        $entity->setEnabled(1);
        $entity->setDateCrea(new \DateTime (2017-01-19));
        $entity->setNumPolice('+9qf5s6d5f');
        $entity->setNumAssureur('#qs4f5sg5qsdgsqd');
        $entity->setSite('www.test4.com');
        $entity->setEnabled(1);
        $entity->setEmail('artisan4@maitreoeuvre.fr');
        $role = array('ROLE_ARTISAN');
        $entity->setRoles($role);
        $manager->persist($entity);
        $manager->flush();


    }
}
?>
