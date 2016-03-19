<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Result;
use AppBundle\Entity\Test;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Validator\ValidatorExtension;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;


use AppBundle\Entity\Question;
use AppBundle\Form\Type\ResultType;



class TestController extends Controller
{
    /**
     * @Route("/test/{id}", name="test")
     */

    public function indexAction(Request $request, $id)
    {
        $test = $this->getDoctrine()
            ->getRepository('AppBundle:Test')
            ->findOneById($id);
        $questions = $test->getQuestions();
        $name = $test->getId();

        $result = new Result();
        $form = $this->createFormBuilder(ResultType::class,$result, array(
            'id' => $name)
        );
        return $this->render('test/index.html.twig', array(
            'form' => $form->getForm()->createView(),
        ));


//        $form = $this->createFormBuilder($result);
//        foreach ($questions as $question){
//            $text = $question->getText();
//            $answers = $question->getAnswers();
//            $type = $question->getType();
//            $id = $question->getId();
//            $textOfAnswer = array();
//            foreach ($answers as $answer){
//                $textOfAnswer[]=$answer->getText();
//            }
//            $result = new Result();
//            $result->setTestId($name);
//
//            $result->setDateTime(new \DateTime('now'));
//
//            switch($type){
//                case 'checkbox':
//                    $form->add('answer', ChoiceType::class, array(
//                        'choices' => $textOfAnswer,
//                        'label' => "$text",
//                        'multiple' =>true,
//                        'expanded'=> true,
//                    ));
//                    break;
//                case 'radiobutton':
//                    $form->add('answer', ChoiceType::class, array(
//                        'choices' => $textOfAnswer,
//                        'label' => "$text",
//                        'expanded'=> true,
//                    ));
//                    break;
//                case 'textarea':
//                    $form->add('answer', TextareaType::class, array(
//                        'label' => "$text"
//                    ));
//                    break;
//            }
//
//
//
//        }
//
//
//        $form->add('save', SubmitType::class, array('label' => 'Submit'));
//        $form->getForm();
//        $data = $form->getData();
//
//        return $this->render('test\index.html.twig', array(
//            'form'=>$form->getForm()->createView(),
//            'dump3'=>var_dump($data)
//        ));





    }
}