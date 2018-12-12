<?php
namespace App\Service;

use Doctrine\ORM\EntityManagerInterface;
use App\Entity\Post;

class PostService
{

    /**
     *
     * @var EntityManagerInterface
     */
    private $entityManager;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    public function listPosts()
    {
        $posts = $this->entityManager->getRepository(Post::class)->findAll();
        
        return $posts;
    }
}