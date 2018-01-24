<?php
namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\File\File;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Component\HttpFoundation\Request;
class BlogController extends Controller
{
  /**
  * @Route("/blog/{page}", name="blog_list", requirements={"page"="\d+"}, defaults={"page"=1})
  */
    public function list(SessionInterface $session, $page)
    {
      $session->set('foo', 'bar');
      $foobar = $session->get('foobar');
      $filters = $session->get('filters', array());
      return $this->file('../static/hola.txt');
      return $this->json(array('username' => 'jane.doe'));
      throw $this->createNotFoundException('Este producto está fuera de existencias.');
      return $this->redirectToRoute('lucky_number');
      $page;
      $content = "<strong>Página $page:</strong> <ul>";
      for($i = 1; $i <= 10; $i++){
        $content .= "<li>Entrada $i </li>";
      }
      $content .= "</ul>";
        return new Response(
            "<html><body>$content</body></html>"
        );
    }
    /**
    * @Route("/blog/{entryName}", name="blog_show")
    */
    public function show($entryName)
    {
      // $entryName will equal the dynamic part of the URL
      // e.g. at /blog/yay-routing, then $entryName='yay-routing'
      $url = $this->generateUrl(
      'lucky_number',
      array('entryName' => $entryName)
      );
        return new Response(
            '<html><body>Entrada ' . $entryName . ' url ' . $url . '</body></html>'
        );
    }
    /**
   * @Route("/blog/{entryName}/{entryId}", name="blog_show_by_id")
   */
   public function showById($entryId)
   {
     $url = $this->generateUrl('blog_list', array(
       'page' => 2,
       'category' => 'Symfony',
     ), UrlGeneratorInterface::ABSOLUTE_URL);
       return new Response(
           '<html><body>Entrada ' . $entryId . ' url:' .$url . '</body></html>'
       );
       //http://127.0.0.1:8000/blog/2?category=Symfony
   }
}
?>
