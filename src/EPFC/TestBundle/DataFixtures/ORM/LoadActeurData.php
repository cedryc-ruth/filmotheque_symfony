<?php
namespace TestBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\Persistence\ObjectManager;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use EPFC\TestBundle\Entity\Acteur;


/**
 * Description of LoadActeurData
 *
 * @author user
 */
class LoadActeurData extends AbstractFixture implements OrderedFixtureInterface {
    
    public function load(ObjectManager $manager) {

        $harrisonFord = new Acteur();
        $harrisonFord->setNom('Harrison');
        $harrisonFord->setPrenom('Ford');
        $harrisonFord->setDateNaissance(new \DateTime('1942-07-13'));
        $harrisonFord->setSexe('M');
        
        $rutgerHauer = new Acteur();
        $rutgerHauer->setNom('Hauer');
        $rutgerHauer->setPrenom('Rutger');
        $rutgerHauer->setDateNaissance(new \DateTime('1944-01-23'));
        $rutgerHauer->setSexe('M');
        
        $seanYoung = new Acteur();
        $seanYoung->setNom('Young');
        $seanYoung->setPrenom('Sean');
        $seanYoung->setDateNaissance(new \DateTime('1959-11-20'));
        $seanYoung->setSexe('F');
        
        $arnoldSchwarzenegger = new Acteur();
        $arnoldSchwarzenegger->setNom('Schwarzenegger');
        $arnoldSchwarzenegger->setPrenom('Arnold');
        $arnoldSchwarzenegger->setDateNaissance(new \DateTime('1947-07-30'));
        $arnoldSchwarzenegger->setSexe('M');
        
        $austinOBrien = new Acteur();
        $austinOBrien->setNom('O\'Brien');
        $austinOBrien->setPrenom('Austin');
        $austinOBrien->setDateNaissance(new \DateTime('1981-05-11'));
        $austinOBrien->setSexe('M');

        
        $manager->persist($harrisonFord);
        $manager->persist($rutgerHauer);
        $manager->persist($seanYoung);
        $manager->persist($arnoldSchwarzenegger);
        $manager->persist($austinOBrien);
        

        $manager->flush();

        $this->addReference('acteur-HarrisonFord', $harrisonFord);
        $this->addReference('acteur-RutgerHauer', $rutgerHauer);
        $this->addReference('acteur-SeanYoung', $seanYoung);
        $this->addReference('acteur-ArnoldSchwarzenegger', $arnoldSchwarzenegger);
        $this->addReference('acteur-AustinOBrien', $austinOBrien);
    }

    public function getOrder() {
        // the order in which fixtures will be loaded
        // the lower the number, the sooner that this fixture is loaded
        return 2;
    }
}
