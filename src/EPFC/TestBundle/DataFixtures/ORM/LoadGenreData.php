<?php
namespace TestBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\Persistence\ObjectManager;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use EPFC\TestBundle\Entity\Genre;


/**
 * Description of LoadGenreData
 *
 * @author user
 */
class LoadGenreData extends AbstractFixture implements OrderedFixtureInterface {
    
    public function load(ObjectManager $manager) {
        $sf = new Genre();
        $sf->setNom('Science-Fiction');
        
        $fantastique = new Genre();
        $fantastique->setNom('Fantastique');
        
        $action = new Genre();
        $action->setNom('Action');
        
        $comedie = new Genre();
        $comedie->setNom('Comédie');
        
        $romance = new Genre();
        $romance->setNom('Romance');
        
        $drame = new Genre();
        $drame->setNom('Drame');
        
        $horreur = new Genre();
        $horreur->setNom('Horreur');
        
        $manager->persist($sf);
        $manager->persist($fantastique);
        $manager->persist($action);
        $manager->persist($comedie);
        $manager->persist($romance);
        $manager->persist($drame);
        $manager->persist($horreur);

        $manager->flush();

        $this->addReference('genre-sf', $sf);
        $this->addReference('genre-fantastique', $fantastique);
        $this->addReference('genre-action', $action);
        $this->addReference('genre-comedie', $comedie);
        $this->addReference('genre-romance', $romance);
        $this->addReference('genre-drame', $drame);
        $this->addReference('genre-horreur', $horreur);
    }

    public function getOrder() {
        // the order in which fixtures will be loaded
        // the lower the number, the sooner that this fixture is loaded
        return 1;
    }
}
