<?php

namespace App\DataFixtures;

use App\Entity\Article;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Faker;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        // $product = new Product();
        // $manager->persist($product);
        $faker = Faker\Factory::create("fr_FR");

        // ajouter 30 articles
        for ($i = 0; $i <30; $i++){
         $Voitures = new Voitures();
         $Voitures->setTitre($faker->sentence(6, true))
             ->setContent($faker->paragraph(5, true))
             ->setDateArt(new \DateTime($faker->date("Y-m-d", 'now')))
             ->setAuteur($faker->name);

         $manager->persist($Voitures);
        }

        $manager->flush();


    }
}
