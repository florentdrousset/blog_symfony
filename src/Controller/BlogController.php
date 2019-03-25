<?php
namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use App\Entity\Article;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

class BlogController extends AbstractController {
    /**
     * @Route ("/blog/add")
     */
    function add_article() {
        //1 - Créer un article
        //2 - Le stocker en bdd

        // you can fetch the EntityManager via $this->getDoctrine()
        // or you can add an argument to your action: index(EntityManagerInterface $entityManager)
        $entityManager = $this->getDoctrine()->getManager();

        $article = new Article();
        $article->setTitle('Titre');
        $article->setContent('Wouhou');
        $article->setIs_published(true);

        // tell Doctrine you want to (eventually) save the Product (no queries yet)
        $entityManager->persist($article);

        // actually executes the queries (i.e. the INSERT query)
        $entityManager->flush();

        return new Response('Saved new product with id '.$article->getId());
    }


        public function new()
        {
            $article = new Article();

            $form = $this->createFormBuilder($article)
                ->add('title', TextType::class)
                ->add('name', TextType::class)
                ->add('dueDate', DateType::class)
                ->add('save', SubmitType::class, ['label' => 'Create Task'])
                ->getForm();

            return $this->render('task/new.html.twig', [
                'form' => $form->createView(),
            ]);
        }

    /**
     * @Route("/blog")
     */
        public function index() {
            //Récupérer tous les articles stockés en base de données
            //Les transmettre à la vue
            //Les afficher
            $abc = 3;
            $repo = $this->getDoctrine()->getRepository(Article::class);
            $articles = $repo->findAll();
            return $this->render("pages/articles.html.twig", [
                'articles' => $articles
            ]);
        }

    /**
     * @Route("/blog/{id}", name = "blog.single")
     */
    public function single($id) {
        $repo = $this->getDoctrine()->getRepository(Article::class);
        $article = $repo->find($id);
        return $this->render("pages/single.html.twig", [
            'article' => $article
        ]);
    }

    }
