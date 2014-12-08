<?php

namespace Wind\ModelBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Gedmo\Translatable\Translatable;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Symfony\Component\Validator\Constraints as Assert;
use Doctrine\Common\Collections\ArrayCollection;
use Gedmo\Mapping\Annotation as Gedmo;
use Symfony\Component\HttpFoundation\File\File;
use Vich\UploaderBundle\Mapping\Annotation as Vich;

/**
 * generator
 *
 * @ORM\Table()
 * @ORM\Entity
 * @Vich\Uploadable
 */
class Generator extends Timestampable implements Translatable
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
     * @Gedmo\Slug(fields={"title"}, unique=false)
     * @ORM\Column(length=255)
     */
    private $slug;
    
    /**
     * @var string
     * @Gedmo\Translatable()
     * @ORM\Column(name="title", type="string", length=255)
     */
    private $title;
    /**
     * @ORM\Column(name="logo", type="string", length=255, nullable=true)
     */
    private $logo;
    /**
     * @Assert\File(
     *  maxSize="6000000",
     *  mimeTypes={"image/png", "image/jpeg", "image/pjpeg"}
     * )
     * @Vich\UploadableField(mapping="generator_image", fileNameProperty="logo")
     */
    private $file;
    /**
     * @var string
     * @Gedmo\Translatable()
     * @ORM\Column(name="body", type="text")
     */
    private $body;

    /**
     * @var string
     *
     * @ORM\Column(name="performance", type="string", length=255)
     */
    private $performance;

    /**
     * @var string
     *
     * @ORM\Column(name="initial_speed", type="string", length=255)
     */
    private $initialSpeed;

    /**
     * @var string
     *
     * @ORM\Column(name="rated_speed", type="string", length=255)
     */
    private $ratedSpeed;

    /**
     * @var string
     *
     * @ORM\Column(name="weight", type="string", length=255)
     */
    private $weight;

    /**
     * @var integer
     *
     * @ORM\Column(name="price", type="integer")
     */
    private $price;

    /**
     * @var Author
     *
     * @ORM\ManyToOne(targetEntity="Author", inversedBy="generator")
     * @ORM\JoinColumn(name="author_id", referencedColumnName="id", nullable=false)
     * @Assert\NotBlank()
     */
    private $author;

    /**
     * @Gedmo\Locale()
     */
    private $locale;

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
     * Set title
     *
     * @param string $title
     * @return generator
     */
    public function setTitle($title)
    {
        $this->title = $title;
    
        return $this;
    }

    /**
     * Set logo
     *
     * @param string $logo
     */
    public function setLogo($logo)
    {
        $this->logo = $logo;
        return $this;
    }

    /**
     * Get logo
     *
     * @return string
     */
    public function getLogo()
    {
        return $this->logo;
    }
    /*public function getAbsolutePath() {
        return null === $this->path
            ? null
            : $this->getUploadRootDir() . '/' . $this->path;
    }

    public function getWebPath() {
        return null === $this->path
            ? null
            : $this->getUploadDir()  . '/' . $this->path;
    }

    protected function getUploadRootDir() {
        return __DIR__ . '/../../../../web/' . $this->getUploadDir();
    }

    protected function getUploadDir(){
        return 'upload/documents';
    }*/

    /**
     * Set file
     *
     * @param string $file
     */
    public function setFile($file)
    {
        /*if (!empty($file)) {
            // It is required that at least one field changes if you are using doctrine
            // otherwise the event listeners won't be called and the file is lost
            $this->updatedAt = new \DateTime('now');
        }*/
        $this->file = $file;
        return $this;
    }

    /**
     * Get file
     *
     * @return string
     */
    public function getFile()
    {
        return $this->file;
    }

    /*public function upload()
    {
        // the file property can be empty if the field is not required
        if (null === $this->getFile()) {
            return;
        }

        // use the original file name here but you should
        // sanitize it at least to avoid any security issues

        // move takes the target directory and then the
        // target filename to move to
        $this->getFile()->move(
            $this->getUploadRootDir(),
            $this->getFile()->getClientOriginalName()
        );

        // set the path property to the filename where you've saved the file
        $this->path = $this->getFile()->getClientOriginalName();

        // clean up the file property as you won't need it anymore
        $this->file = null;
    }*/


    /**
     * Get title
     *
     * @return string 
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Set body
     *
     * @param string $body
     * @return generator
     */
    public function setBody($body)
    {
        $this->body = $body;
    
        return $this;
    }

    /**
     * Get body
     *
     * @return string 
     */
    public function getBody()
    {
        return $this->body;
    }

    /**
     * Set performance
     *
     * @param string $performance
     * @return generator
     */
    public function setPerformance($performance)
    {
        $this->performance = $performance;
    
        return $this;
    }

    /**
     * Get performance
     *
     * @return string 
     */
    public function getPerformance()
    {
        return $this->performance;
    }

    /**
     * Set initialSpeed
     *
     * @param string $initialSpeed
     * @return generator
     */
    public function setInitialSpeed($initialSpeed)
    {
        $this->initialSpeed = $initialSpeed;
    
        return $this;
    }

    /**
     * Get initialSpeed
     *
     * @return string 
     */
    public function getInitialSpeed()
    {
        return $this->initialSpeed;
    }

    /**
     * Set ratedSpeed
     *
     * @param string $ratedSpeed
     * @return generator
     */
    public function setRatedSpeed($ratedSpeed)
    {
        $this->ratedSpeed = $ratedSpeed;
    
        return $this;
    }

    /**
     * Get ratedSpeed
     *
     * @return string 
     */
    public function getRatedSpeed()
    {
        return $this->ratedSpeed;
    }

    /**
     * Set weight
     *
     * @param string $weight
     * @return generator
     */
    public function setWeight($weight)
    {
        $this->weight = $weight;
    
        return $this;
    }

    /**
     * Get weight
     *
     * @return string 
     */
    public function getWeight()
    {
        return $this->weight;
    }

    /**
     * Set price
     *
     * @param integer $price
     * @return generator
     */
    public function setPrice($price)
    {
        $this->price = $price;
    
        return $this;
    }

    /**
     * Get price
     *
     * @return integer 
     */
    public function getPrice()
    {
        return $this->price;
    }

    /**
     * Set author
     *
     * @param \Wind\ModelBundle\Entity\Author $author
     * @return Generator
     */
    public function setAuthor(Author $author)
    {
        $this->author = $author;
    
        return $this;
    }

    /**
     * Get author
     *
     * @return \Wind\ModelBundle\Entity\Author 
     */
    public function getAuthor()
    {
        return $this->author;
    }

    /**
     * Set path
     *
     * @param string $path
     * @return Generator
     */
    public function setPath($path)
    {
        $this->path = $path;
    
        return $this;
    }

//    /**
//     * Get path
//     *
//     * @return string
//     */
//    public function getPath()
//    {
//        return $this->path;
//    }

    /**
     * Set slug
     *
     * @param string $slug
     * @return Generator
     */
    public function setSlug($slug)
    {
        $this->slug = $slug;
    
        return $this;
    }

    /**
     * Get slug
     *
     * @return string 
     */
    public function getSlug()
    {
        return $this->slug;
    }

//    public function setTranslatableLocale($locale) {
//        $this->locale = $locale;
//    }
}