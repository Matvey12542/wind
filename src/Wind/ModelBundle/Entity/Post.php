<?php

namespace Wind\ModelBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Gedmo\Translatable\Translatable;
use Symfony\Component\Validator\Constraints as Assert;
use Doctrine\Common\Collections\ArrayCollection;
use Gedmo\Mapping\Annotation as Gedmo;
//use Wind\ModelBundle\Entity\PostTranslation;

/**
 * Post
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Wind\ModelBundle\Repository\PostRepository")
 * @Gedmo\TranslationEntity(class="Wind\ModelBundle\Entity\PostTranslation")
 */
class Post extends Timestampable implements Translatable
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
   * @ORM\Column(name="ontop", type="boolean", nullable=true)
   *
   */
  private $ontop = false;

  /**
   * @var string
   * @Gedmo\Translatable()
   * @ORM\Column(name="title", type="string", length=150)
   * @Assert\NotBlank()
   */
  private $title;

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
   * @ORM\Column(name="body", type="text")
   */
  private $body;

  /**
   * @var Author
   *
   * @ORM\ManyToOne(targetEntity="Author", inversedBy="posts")
   * @ORM\JoinColumn(name="author_id", referencedColumnName="id", nullable=false)
   * @Assert\NotBlank()
   */
  private $author;

  /**
   * @var ArrayCollection
   *
   * @ORM\OneToMany(targetEntity="Comment", mappedBy="post", cascade={"remove"})
   */
  private $comments;

  /**
   * @Gedmo\Locale()
   */
//    private $locale;

  /**
   * @ORM\OneToMany(
   *   targetEntity="PostTranslation",
   *   mappedBy="object",
   *   cascade={"persist", "remove"}
   * )
   */
  private $translations;

  /**
   * Constructor
   */
  public function __construct()
  {
    $this->comments = new ArrayCollection();
    $this->translations = new ArrayCollection();
//      $this->ontop = false;
  }

  public function getTranslations()
  {
    return $this->translations;
  }

  public function addTranslation(PostTranslation $t)
  {
    if (!$this->translations->contains($t)) {
      $this->translations[] = $t;
      $t->setObject($this);
    }
  }

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
   * Set ontop
   *
   * @param boolean $ontop
   * @return Post
   */
  public function setOntop($ontop = 0)
  {
    $this->ontop = $ontop;

    return $this;
  }

  /**
   * Get ontop
   *
   * @return boolean
   */
  public function getOntop()
  {
    return $this->ontop;
  }

  /**
   * Set title
   *
   * @param string $title
   * @return Post
   */
  public function setTitle($title)
  {
    $this->title = $title;

    return $this;
  }

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
   * Set slug
   *
   * @param string $slug
   * @return Post
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

  /**
   * Set body
   *
   * @param string $body
   * @return Post
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
   * Set author
   *
   * @param \Wind\ModelBundle\Entity\Author $author
   * @return Post
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
   * Add comments
   *
   * @param \Wind\ModelBundle\Entity\Comment $comments
   * @return Post
   */
  public function addComment(Comment $comments)
  {
    $this->comments[] = $comments;

    return $this;
  }

  /**
   * Remove comments
   *
   * @param \Wind\ModelBundle\Entity\Comment $comments
   */
  public function removeComment(Comment $comments)
  {
    $this->comments->removeElement($comments);
  }

  /**
   * Get comments
   *
   * @return \Doctrine\Common\Collections\Collection
   */
  public function getComments()
  {
    return $this->comments;
  }

  public function setTranslatableLocale($locale)
  {
    $this->locale = $locale;
  }
}