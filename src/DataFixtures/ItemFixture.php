<?php

namespace App\DataFixtures;

use App\Entity\Item;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

class ItemFixture extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $item = new Item();
        $item->setCode('BN1');
        $item->setName('Bananas');
        $item->setPrice(2.43);
        $manager->persist($item);

        $item = new Item();
        $item->setCode('LE1');
        $item->setName('Lemon');
        $item->setPrice(1.00);
        $manager->persist($item);

        $item = new Item();
        $item->setCode('PG1');
        $item->setName('Pomegranates');
        $item->setPrice(10.57);
        $manager->persist($item);

        $manager->flush();
    }
}
