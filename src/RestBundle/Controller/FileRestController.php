<?php

namespace RestBundle\Controller;

use CoreBundle\Entity\File;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;

class FileRestController extends Controller
{
    /**
     * @Route("/rest/files")
     * @Method({"GET"})
     */
    public function getFilesAction($name)
    {
        $em = $this->get('doctrine.orm.default_entity_manager');
        $list = $em->getRepository('CoreBundle:File')->findAll();
        return new JsonResponse($list);
    }

    /**
     * @Route("/rest/files")
     * @Method({"POST"})
     */
    public function postFileAction(Request $request)
    {
        $file = new File();
        $form = $this->createFormBuilder($file)
            ->add('file')
            ->add('title')
            ->add('description')
            ->add('posLat')
            ->add('posLon')
            ->getForm();

        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();

            $em->persist($file);
            $em->flush();

            return new JsonResponse('ok', 200);
        }

        return new JsonResponse();
    }



}