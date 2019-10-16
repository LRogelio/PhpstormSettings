<?php

namespace TpeServiceBundle\Controller;

use FOS\RestBundle\Controller\Annotations as Rest;
use FOS\RestBundle\Controller\FOSRestController;
use FOS\RestBundle\Request\ParamFetcherInterface;
use Nelmio\ApiDocBundle\Annotation as Doc;
use Symfony\Component\Validator\ConstraintViolationList;
use AppBundle\Exception\BadCredentialException;
use AppBundle\Exception\ResourceValidationException;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Hateoas\Representation\PaginatedRepresentation;


class EcheancierController extends FOSRestController
{


//    /**
//     * @Rest\Get("/false/portefuille/tontine/tpe", name="false_tpe_echeancier_tontine_e")
//     * @Doc\ApiDoc(
//     *     resource=true,
//     *     description="Récupérer les echeancier tontine .",
//     *      filters={
//     *      {"name"="codeContrat", "dataType"="string"},
//     * }
//     * )
//     *
//     * @Rest\View()
//     */


    /**
     * @Rest\Get("/echeancier/tontine/tpe", name="tpe_echeancier_tontine-tepep")
     *      * @Rest\QueryParam(
     *     name="codeContrat",
     *     description="Le numero de compte du colllecteur"
     * )
     * @Doc\ApiDoc(
     *     resource=true,
     *     description="Récupérer les echeancier tontine .",
     *      filters={
     *      {"name"="codeContrat", "dataType"="string"},
     * }
     * )
     *
     * @Rest\View()
     */
    public function getEcheancierTontineAction(ParamFetcherInterface $paramFetcher, Request $request)
    {

//        $this->get('user.authenticatorservice')->checExistCollecteur();


        $codeContrat = $paramFetcher->get('codeContrat');
        $echeancier = $this->getDoctrine()->getManager()->getRepository('ProduitBundle:EcheancierTontine')->findBy(['codeContratTontine' => $codeContrat]);


        if ($echeancier == null) {

            $message = array("message" => "Pas d'écheancier pour ce compte", "code" => " 001");
            return $message;
        }

//        return $echeancier;
        return $this->json(['requete réussi'], 500);
    }


}
