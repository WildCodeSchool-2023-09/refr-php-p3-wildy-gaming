<?php

namespace App\DataFixtures;

use App\Entity\Lot;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class LotsFixtures extends Fixture
{
    public const TITLES = [
        'Porte clés',
        'Pins',
        'Mug',
        'Casquette',
        'Peluches',
        'Lampe',
        'Mini borne d\'arcade',
        'Réveil',
        'POP',
        'Clavier',
        'Souris',
        'Casque',
        'Tapis de souris XL',
        'PS5',
        'Xbox série X',
        'Smartphone',
        'PC portable',
    ];

    public const PRICES = [
        67,
        911,
        2010,
        4038,
        10001,
    ];

    public function load(ObjectManager $manager): void
    {
        foreach (self::TITLES as $object) {
            $lot = new Lot();
            $lot->setTitle($object);
            $lot->setPrice(self::PRICES[
                rand(0, count(self::PRICES) - 1)
                ]);

            $manager->persist($lot);
        }
        $manager->flush();
    }
}
