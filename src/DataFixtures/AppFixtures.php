<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use App\Entity\Category;
use App\Entity\Author;
use GraphQL\Validator\Rules\PossibleFragmentSpreads;
use App\Entity\Post;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $category = new Category();
        $category->setName('PHP');
        $category->setDescription('PHP the language of Web');
        $manager->persist($category);
        $manager->flush();
        
        $author = new Author();
        $author->setEmail('dpr001@gmail.com');
        $author->setName('Denis Perciliano Ribeiro');
        $manager->persist($author);
        $manager->flush();
        
        for ($x = 1; $x <=10; $x++){
            $post = new Post();
            $post->setTitle("PHP 7.2 New Features part - $x");
            $post->setPublishedAt(new \DateTime());
            $post->setContent('Lorem Ipsum é simplesmente uma simulação de texto da indústria tipográfica e de impressos, e vem sendo utilizado desde o século XVI, quando um impressor desconhecido pegou uma bandeja de tipos e os embaralhou para fazer um livro de modelos');
            $post->setAuthor($author);
            $manager->persist($post);
            $manager->flush();
        }
    }
}
