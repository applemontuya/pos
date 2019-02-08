<?php
    namespace App\Controller;

    use App\Entity\Article;
    use Symfony\Component\HttpFoundation\Response;
    use Symfony\Component\Routing\Annotation\Route;
    use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
    use Symfony\Bundle\FrameworkBundle\Controller\Controller;

    class ArticleController extends Controller{
        /**
         * @Route("/")
         * @Method({"GET"})
         */
        public function index(){

            $articles = array("Article A", "Article B");
            // return new Response('<html><body>Hello</body></html>');
            return $this->render('articles/index.html.twig', array('articles' => $articles));
        }

        /**
         * @Route("/article/save")
         */
        public function save(){

            $entityManager = $this->getDoctrine()->getManager();

            $article = new Article();
            $article->setTitle('Article One');
            $article->setBody('This is body for first article');

            //To indicate we want to eventually save it
            $entityManager->persist($article);

            //To execute
            $entityManager->flush();

            return new Response('Saved an article with id of '.$article->getId());

        }
    }