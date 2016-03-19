<?php

namespace AppBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="result")
 */
class Result
{

    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @ORM\Column(type="string")
     */
    protected $userId;


    /**
     * @ORM\Column(type="string")
     */
    protected $testId;

    /**
     * @ORM\ManyToMany(targetEntity="Question", cascade={"persist"})
     */
    protected $questions;

    public function __construct()
    {
        $this->questions = new ArrayCollection();
    }

    /**
     * @ORM\Column(type="string")
     */
    protected $answerId;

    /**
     * @ORM\Column(type="datetime")
     */
    protected $date_time;

    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }


    /**
     * Set date_time
     *
     * @param \DateTime $dateTime
     * @return Result
     */
    public function setDateTime($dateTime)
    {
        $this->date_time = $dateTime;

        return $this;
    }

    /**
     * Get date_time
     *
     * @return \DateTime 
     */
    public function getDateTime()
    {
        return $this->date_time;
    }

    /**
     * Set userId
     *
     * @param string $userId
     * @return Result
     */
    public function setUserId($userId)
    {
        $this->userId = $userId;

        return $this;
    }

    /**
     * Get userId
     *
     * @return string 
     */
    public function getUserId()
    {
        return $this->userId;
    }

    /**
     * Set testId
     *
     * @param string $testId
     * @return Result
     */
    public function setTestId($testId)
    {
        $this->testId = $testId;

        return $this;
    }

    /**
     * Get testId
     *
     * @return string 
     */
    public function getTestId()
    {
        return $this->testId;
    }

    /**
     * Set questionId
     *
     * @param string $questions
     * @return Result
     */
    public function setQuestions($questions)
    {
        $this->questions = $questions;

        return $this;
    }

    public function addQuestion(Question $question)
    {
        $question->addTest($this);
        $this->questions->add($question);
    }

    /**
     * Get questionId
     *
     * @return string 
     */
    public function getQuestions()
    {
        return $this->questions;
    }

    /**
     * Set answerId
     *
     * @param string $answerId
     * @return Result
     */
    public function setAnswerId($answerId)
    {
        $this->answerId = $answerId;

        return $this;
    }

    /**
     * Get answerId
     *
     * @return string 
     */
    public function getAnswerId()
    {
        return $this->answerId;
    }
}
