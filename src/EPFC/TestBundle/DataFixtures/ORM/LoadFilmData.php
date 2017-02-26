<?php
namespace TestBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\Persistence\ObjectManager;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use EPFC\TestBundle\Entity\Film;


/**
 * Description of LoadFilmData
 *
 * @author user
 */
class LoadFilmData extends AbstractFixture implements OrderedFixtureInterface {
    
    public function load(ObjectManager $manager) {    
        $bladeRunner = new Film();
        $bladeRunner->setTitre('Blade Runner');
        $bladeRunner->setDescription("L'histoire se déroule en novembre 2019, "
                . "à Los Angeles, au climat pluvieux et où la quasi-totalité de "
                . "la faune a disparu. La population est encouragée à émigrer "
                . "vers les colonies situées sur d'autres planètes. Les animaux "
                . "sont artificiels et il existe également des androïdes, des "
                . "robots à l'apparence humaine aussi appelés « réplicants » "
                . "(parfois orthographié « répliquants »). Ceux-ci sont plus ou "
                . "moins considérés comme des esclaves modernes, qui sont "
                . "utilisés pour les travaux pénibles ou dangereux, dans les "
                . "forces armées ou comme objets de plaisir.");
        $bladeRunner->setGenre($this->getReference('genre-sf'));
        $bladeRunner->addActeur($this->getReference('acteur-HarrisonFord'));
        $bladeRunner->addActeur($this->getReference('acteur-RutgerHauer'));
        $bladeRunner->addActeur($this->getReference('acteur-SeanYoung'));
        
        $lastActionHero = new Film();
        $lastActionHero->setTitre('Last Action Hero');
        $lastActionHero->setDescription("Danny Madigan, un jeune garçon, sèche "
                . "l'école pour aller au cinéma. Il est un grand fan de la série "
                . "des Jack Slater qui met en scène un héros de films d'action "
                . "— incarné par Arnold Schwarzenegger — qui rappelle "
                . "l'inspecteur Harry. Le projectionniste du cinéma est un ami "
                . "de Danny et il lui propose de venir voir Jack Slater IV en "
                . "avant-première. À cette occasion, il lui remet un billet "
                . "magique qui lui a été donné jadis par le grand magicien "
                . "Harry Houdini. Grâce à ce ticket, Danny entre dans le film...");
        $lastActionHero->setGenre($this->getReference('genre-action'));
        $lastActionHero->addActeur($this->getReference('acteur-ArnoldSchwarzenegger'));
        $lastActionHero->addActeur($this->getReference('acteur-AustinOBrien'));
        
        $manager->persist($bladeRunner);
        $manager->persist($lastActionHero);

        $manager->flush();
    }

    public function getOrder() {
        // the order in which fixtures will be loaded
        // the lower the number, the sooner that this fixture is loaded
        return 3;
    }
}
