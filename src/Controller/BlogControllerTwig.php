<?php
namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class BlogControllerTwig extends Controller
{
    public function list()
    {
      return $this->render('blog/list.html.twig');
    }
    public function show($entryId)
    {
      return $this->render('blog/entry.html.twig', array('entryId' => $entryId));
    }

}
?>
