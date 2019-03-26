<?php

namespace App\Controller;
use App\Form\ArticleType;
use App\Entity\Article;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;


class AdminBlogController extends AbstractController {
    /**
     * @Route("/admin/blog/create", name="admin.blog.create")
     */
    public function create(Request $request, ObjectManager $em) {
        $article =  new Article();
        $form = $this->createForm(ArticleType::class, $article); //méthode héritée de AbstractController
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $em->persist($article);
            $em->flush();
        }
        return $this->render("admin/blog/create.html.twig", [
            "form" => $form->createView()
        ]);
    }
}
