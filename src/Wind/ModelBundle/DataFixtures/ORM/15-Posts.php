<?php
namespace Wind\ModelBundle\DataFixtures\ORM;

use Wind\ModelBundle\Entity\Post;
use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;

/**
 * Fixtures for Author Entity
 */
class Posts extends AbstractFixture implements OrderedFixtureInterface
{
  protected $posts = array(
    array(
      'title' => 'Lorem Ipsum - це текст-"риба',
      'onTop' => true,
      'body' => 'Lorem Ipsum - це текст-"риба", що використовується в друкарстві та дизайні.
          Lorem Ipsum є, фактично, стандартною "рибою" аж з XVI сторіччя, коли невідомий друкар взяв
          шрифтову гранку та склав на ній підбірку зразків шрифтів. "Риба" не тільки успішно пережила пять
          століть, але й прижилася в електронному верстуванні, залишаючись по суті незмінною.
          Вона популяризувалась в 60-их роках минулого сторіччя завдяки виданню зразків шрифтів Letraset,
          які містили уривки з Lorem Ipsum, і вдруге - нещодавно завдяки програмам компютерного верстування
         на кшталт Aldus Pagemaker, які використовували різні версії Lorem Ipsum.',
      'author' => 'Kolya',
      'en' => array(
        'title' => 'english title 1',
        'body' => 'English body1 Aldus Pagemaker Aldus PagemakerAldus PagemakerAldus PagemakerAldus Pagemaker
          Aldus PagemakerAldus PagemakerAldus PagemakerAldus PagemakerAldus PagemakerAldus PagemakerAldus Pagemaker
          Aldus PagemakerAldus PagemakerAldus PagemakerAldus PagemakerAldus PagemakerAldus PagemakerAldus Pagemaker',
      ),
    ),
    array(
      'title' => 'які використовували різні версії Lorem Ipsum.',
      'onTop' => true,
      'body' => ' склав на ній підбірку зразків шрифтів. "Риба" не тільки успішно пережила пять
          століть, але й прижилася в електронному верстуванні, залишаючись по суті незмінною.
          Вона популяризувалась в 60-их роках минулого сторіччя завдяки виданню зразків шрифтів Letraset,
          які містили уривки з Lorem Ipsum, і вдруге - нещодавно завдяки програмам компютерного верстування
          на кшталт Aldus Pagemaker, які використовували різні версії Lorem Ipsum  склав на ній підбірку зразків шрифтів. "Риба" не тільки успішно пережила пять
          століть, але й прижилася в електронному верстуванні, залишаючись по суті незмінною.
          Вона популяризувалась в 60-их роках минулого сторіччя завдяки виданню зразків шрифтів Letraset,
          які містили уривки з Lorem Ipsum, і вдруге - нещодавно завдяки програмам компютерного верстування
         на кшталт Aldus Pagemaker, які використовували різні версії Lorem Ipsum',
      'author' => 'David',
      'en' => array(
        'title' => 'english title 2',
        'body' => 'English body2  Aldus Pagemaker Aldus PagemakerAldus PagemakerAldus PagemakerAldus Pagemaker
          Aldus PagemakerAldus PagemakerAldus PagemakerAldus PagemakerAldus PagemakerAldus PagemakerAldus Pagemaker
          Aldus PagemakerAldus PagemakerAldus PagemakerAldus PagemakerAldus PagemakerAldus PagemakerAldus Pagemaker',
      ),
    ),
    array(
      'title' => 'які використовували різні версії Lorem Ipsum.',
      'onTop' => true,
      'body' => ' склав на ній підбірку зразків шрифтів. "Риба" не тільки успішно пережила пять
          століть, але й прижилася в електронному верстуванні, залишаючись по суті незмінною.
          Вона популяризувалась в 60-их роках минулого сторіччя завдяки виданню зразків шрифтів Letraset,
        які міснаем с создания объекта Blog и установки знтили уривки з Lorem Ipsum, і вдруге - нещодавно завдяки програмам компютерного верстування
         на кшталт Aldus Pagemaker, які використовували різні версії Lorem Ipsum  склав на ній підбірку зразків
          шрифтів. "Риба" не тільки успішно пережила пять
          століть, але й прижилася в електронному верстуванні, залишаючись по суті незмінною.
          Вона популяризувалась в 60-их роках минулого сторіччя завдяки виданню зразків шрифтів Letraset,
        які містили уривки з Lorem Ipsum, і вдруге - нещодавно завдяки програмам компютерного верстування
         на кшталт Aldus Pagemaker, які використовували різні версії Lorem Ipsum',
      'author' => 'Buuu',
      'en' => array(
        'title' => 'english title 3',
        'body' => 'English body3  Aldus Pagemaker Aldus PagemakerAldus PagemakerAldus PagemakerAldus Pagemaker
            Aldus PagemakerAldus PagemakerAldus PagemakerAldus PagemakerAldus PagemakerAldus PagemakerAldus Pagemaker
            Aldus PagemakerAldus PagemakerAldus PagemakerAldus PagemakerAldus PagemakerAldus PagemakerAldus Pagemaker',
      ),
    ),
  );

  /**
   * {@inheritDoc}
   */
  public function getOrder()
  {
    return 15;
  }

  public function load(ObjectManager $manager)
  {
    $repository = $manager->getRepository('\\Gedmo\\Translatable\\Entity\\Translation');

    foreach ($this->posts as $postData) {
      $post = new Post();
      $post->setTitle($postData['title']);
      $post->setOntop($postData['onTop']);
      $post->setBody(trim($postData['body']));

      $post->setAuthor($this->getAuthor($manager, $postData['author']));
      $repository
        ->translate($post, 'title', 'en_EN', $postData['en']['title'])
        ->translate($post, 'body', 'en_EN', $postData['en']['body']);

      $manager->persist($post);
      $manager->flush();
    }
  }

  /**
   * Get an Autthor
   *
   * @param Object $manager
   * @param $name
   */
  private function getAuthor(ObjectManager $manager, $name)
  {
    return $manager->getRepository('WindModelBundle:Author')->findOneBy(
      array(
        'name' => $name
      )
    );
  }
}