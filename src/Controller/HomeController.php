<?php
namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Service\PostService;

class HomeController extends Controller
{

    private $postService;

    public function __construct(PostService $postService)
    {
        $this->postService = $postService;
    }

    /**
     *
     * @return \Symfony\Component\HttpFoundation\Response @Route("home")
     *        
     */
    public function index()
    {
        $posts = $this->postService->listPosts();

        return $this->render("home/index.html.twig", [
            'posts' => $posts
        ]);
    }
}