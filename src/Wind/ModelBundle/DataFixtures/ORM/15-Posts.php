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
    /**
     * {@inheritDoc}
     */
    public function getOrder()
    {
        return 15;
    }

    public function load(ObjectManager $manager)
    {
        $p1 = new Post();
        $p1->setTitle('Lorem Ipsum - це текст-"риба');
        $p1->setOntop(true);
        $p1->setBody('Lorem Ipsum - це текст-"риба", що використовується в друкарстві та дизайні.
         Lorem Ipsum є, фактично, стандартною "рибою" аж з XVI сторіччя, коли невідомий друкар взяв
         шрифтову гранку та склав на ній підбірку зразків шрифтів. "Риба" не тільки успішно пережила пять
          століть, але й прижилася в електронному верстуванні, залишаючись по суті незмінною.
          Вона популяризувалась в 60-их роках минулого сторіччя завдяки виданню зразків шрифтів Letraset,
        які містили уривки з Lorem Ipsum, і вдруге - нещодавно завдяки програмам компютерного верстування
         на кшталт Aldus Pagemaker, які використовували різні версії Lorem Ipsum.');
        $p1->setAuthor($this->getAuthor($manager, "Kolya"));
        $p1->setTranslatableLocale('ua_Uk'); // Change la locale

        $p2 = new Post();
        $p2->setTitle('які використовували різні версії Lorem Ipsum.');
        $p2->setOntop(true);
        $p2->setBody(' склав на ній підбірку зразків шрифтів. "Риба" не тільки успішно пережила пять
          століть, але й прижилася в електронному верстуванні, залишаючись по суті незмінною.
          Вона популяризувалась в 60-их роках минулого сторіччя завдяки виданню зразків шрифтів Letraset,
        які містили уривки з Lorem Ipsum, і вдруге - нещодавно завдяки програмам компютерного верстування
         на кшталт Aldus Pagemaker, які використовували різні версії Lorem Ipsum  склав на ній підбірку зразків шрифтів. "Риба" не тільки успішно пережила пять
          століть, але й прижилася в електронному верстуванні, залишаючись по суті незмінною.
          Вона популяризувалась в 60-их роках минулого сторіччя завдяки виданню зразків шрифтів Letraset,
        які містили уривки з Lorem Ipsum, і вдруге - нещодавно завдяки програмам компютерного верстування
         на кшталт Aldus Pagemaker, які використовували різні версії Lorem Ipsum');
        $p2->setAuthor($this->getAuthor($manager, "David"));


        $p3 = new Post();
        $p3->setTitle('які використовували різні версії Lorem Ipsum.');
        $p3->setOntop(true);
        $p3->setBody(' склав на ній підбірку зразків шрифтів. "Риба" не тільки успішно пережила пять
          століть, але й прижилася в електронному верстуванні, залишаючись по суті незмінною.
          Вона популяризувалась в 60-их роках минулого сторіччя завдяки виданню зразків шрифтів Letraset,
        які містили уривки з Lorem Ipsum, і вдруге - нещодавно завдяки програмам компютерного верстування
         на кшталт Aldus Pagemaker, які використовували різні версії Lorem Ipsum  склав на ній підбірку зразків
          шрифтів. "Риба" не тільки успішно пережила пять
          століть, але й прижилася в електронному верстуванні, залишаючись по суті незмінною.
          Вона популяризувалась в 60-их роках минулого сторіччя завдяки виданню зразків шрифтів Letraset,
        які містили уривки з Lorem Ipsum, і вдруге - нещодавно завдяки програмам компютерного верстування
         на кшталт Aldus Pagemaker, які використовували різні версії Lorem Ipsum');
        $p3->setAuthor($this->getAuthor($manager, "Buuu"));

        $manager->persist($p1);
        $manager->persist($p2);
        $manager->persist($p3);

        $manager->flush();
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