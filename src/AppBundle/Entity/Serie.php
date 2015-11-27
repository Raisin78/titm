<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Asserts;
/**
 * Serie
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="AppBundle\Entity\SerieRepository")
 */
class Serie
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=50)
     * @Asserts\NotBlank()
     * @Asserts\Length(
     *      min = 2,
     *      max = 30,
     *      minMessage = "La nom de la serie doit au moins posseder {{ limit }} characteres !",
     *      maxMessage = "La nom de la serie ne peut pas exceder {{ limit }} characteres !"
     * )
     */
    private $name;

    /**
     * @var string
     *
     * @ORM\Column(name="type", type="string", length=50)
     * @Asserts\NotBlank()
     * @Asserts\Length(
     *      min = 2,
     *      max = 30,
     *      minMessage = "La type de la serie doit au moins posseder {{ limit }} characteres !",
     *      maxMessage = "La type de la serie ne peut pas exceder {{ limit }} characteres !"
     * )
     */
    private $type;

    /**
     * @var integer
     *
     * @ORM\Column(name="year", type="integer")
     * @Asserts\Range(
     *      min = 1980,
     *      max = 2030,
     *      minMessage = "Année minimum : {{ limit }} !",
     *      maxMessage = "Année maximum : {{ limit }} !",
     * )
     */
    private $year;


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
     * Set name
     *
     * @param string $name
     *
     * @return Serie
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set type
     *
     * @param string $type
     *
     * @return Serie
     */
    public function setType($type)
    {
        $this->type = $type;

        return $this;
    }

    /**
     * Get type
     *
     * @return string
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * Set year
     *
     * @param integer $year
     *
     * @return Serie
     */
    public function setYear($year)
    {
        $this->year = $year;

        return $this;
    }

    /**
     * Get year
     *
     * @return integer
     */
    public function getYear()
    {
        return $this->year;
    }
}
