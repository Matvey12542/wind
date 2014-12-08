<?php
/**
 * Created by PhpStorm.
 * User: kolya
 * Date: 13.08.14
 * Time: 0:07
 */

namespace Wind\ModelBundle\DataFixtures\ORM;


use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\Doctrine;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Wind\ModelBundle\Entity\Generator;

class Generators extends AbstractFixture implements OrderedFixtureInterface {

    protected $generator = array(
        array(
            'title' => 'Товар 1',
            'logo' => '63b16-smile1.jpg',
            'body' => 'Lorem Ipsum - це текст-"риба", що використовується в друкарстві та дизайні.
                  Lorem Ipsum є, фактично, стандартною "рибою" аж з XVI сторіччя, коли невідомий друкар взяв
                  шрифтову гранку та склав на ній підбірку зразків шрифтів. "Риба" не тільки успішно пережила пять
                  століть, але й прижилася в електронному верстуванні, залишаючись по суті незмінною.
                  Вона популяризувалась в 60-их роках минулого сторіччя завдяки виданню зразків шрифтів Letraset,
                  які містили уривки з Lorem Ipsum, і вдруге - нещодавно завдяки програмам компютерного верстування
                 на кшталт Aldus Pagemaker, які використовували різні версії Lorem Ipsum.',
            'performance' => '63b160-400',
            'initialSpeed' => '1',
            'ratedSpeed' => '30',
            'weight' => '120',
            'price' => '1200',
            'author' => 'Kolya',
            'en' => array(
                'title' => 'Product 1',
                'body' => 'English body1 Aldus Pagemaker Aldus PagemakerAldus PagemakerAldus PagemakerAldus Pagemaker
                      Aldus PagemakerAldus PagemakerAldus PagemakerAldus PagemakerAldus PagemakerAldus PagemakerAldus Pagemaker
                      Aldus PagemakerAldus PagemakerAldus PagemakerAldus PagemakerAldus PagemakerAldus PagemakerAldus Pagemaker',
            ),
        ),
        array(
            'title' => 'Товар 2',
            'logo' => '123.jpeg',
            'body' => 'Lorem Ipsum - це текст-"риба", що використовується в друкарстві та дизайні.
                  Lorem Ipsum є, фактично, стандартною "рибою" аж з XVI сторіччя, коли невідомий друкар взяв
                  шрифтову гранку та склав на ній підбірку зразків шрифтів. "Риба" не тільки успішно пережила пять
                  століть, але й прижилася в електронному верстуванні, залишаючись по суті незмінною.
                  Вона популяризувалась в 60-их роках минулого сторіччя завдяки виданню зразків шрифтів Letraset,
                  які містили уривки з Lorem Ipsum, і вдруге - нещодавно завдяки програмам компютерного верстування
                 на кшталт Aldus Pagemaker, які використовували різні версії Lorem Ipsum.',
            'performance' => '635160-400',
            'initialSpeed' => '10',
            'ratedSpeed' => '10',
            'weight' => '200',
            'price' => '2000',
            'author' => 'David',
            'en' => array(
                'title' => 'Product 2',
                'body' => 'English body1 Aldus Pagemaker Aldus PagemakerAldus PagemakerAldus PagemakerAldus Pagemaker
                      Aldus PagemakerAldus PagemakerAldus PagemakerAldus PagemakerAldus PagemakerAldus PagemakerAldus Pagemaker
                      Aldus PagemakerAldus PagemakerAldus PagemakerAldus PagemakerAldus PagemakerAldus PagemakerAldus Pagemaker',
            ),
        ),
        array(
            'title' => 'Товар 3',
            'logo' => 'drua_logo.png',
            'body' => 'Lorem Ipsum - це текст-"риба", що використовується в друкарстві та дизайні.
                  Lorem Ipsum є, фактично, стандартною "рибою" аж з XVI сторіччя, коли невідомий друкар взяв
                  шрифтову гранку та склав на ній підбірку зразків шрифтів. "Риба" не тільки успішно пережила пять
                  століть, але й прижилася в електронному верстуванні, залишаючись по суті незмінною.
                  Вона популяризувалась в 60-их роках минулого сторіччя завдяки виданню зразків шрифтів Letraset,
                  які містили уривки з Lorem Ipsum, і вдруге - нещодавно завдяки програмам компютерного верстування
                 на кшталт Aldus Pagemaker, які використовували різні версії Lorem Ipsum.',
            'performance' => '45160-400',
            'initialSpeed' => '5',
            'ratedSpeed' => '50',
            'weight' => '300',
            'price' => '500',
            'author' => 'Buuu',
            'en' => array(
                'title' => 'Product 3',
                'body' => 'English body1 Aldus Pagemaker Aldus PagemakerAldus PagemakerAldus PagemakerAldus Pagemaker
                      Aldus PagemakerAldus PagemakerAldus PagemakerAldus PagemakerAldus PagemakerAldus PagemakerAldus Pagemaker
                      Aldus PagemakerAldus PagemakerAldus PagemakerAldus PagemakerAldus PagemakerAldus PagemakerAldus Pagemaker',
            ),
        ),
        array(
            'title' => 'Товар 4',
            'logo' => '1404307772_file-roller.png',
            'body' => 'Lorem Ipsum - це текст-"риба", що використовується в друкарстві та дизайні.
                  Lorem Ipsum є, фактично, стандартною "рибою" аж з XVI сторіччя, коли невідомий друкар взяв
                  шрифтову гранку та склав на ній підбірку зразків шрифтів. "Риба" не тільки успішно пережила пять
                  століть, але й прижилася в електронному верстуванні, залишаючись по суті незмінною.
                  Вона популяризувалась в 60-их роках минулого сторіччя завдяки виданню зразків шрифтів Letraset,
                  які містили уривки з Lorem Ipsum, і вдруге - нещодавно завдяки програмам компютерного верстування
                 на кшталт Aldus Pagemaker, які використовували різні версії Lorem Ipsum.',
            'performance' => '7160-400',
            'initialSpeed' => '3',
            'ratedSpeed' => '25',
            'weight' => '2000',
            'price' => '3000',
            'author' => 'Kolya',
            'en' => array(
                'title' => 'Product 4',
                'body' => 'English body1 Aldus Pagemaker Aldus PagemakerAldus PagemakerAldus PagemakerAldus Pagemaker
                      Aldus PagemakerAldus PagemakerAldus PagemakerAldus PagemakerAldus PagemakerAldus PagemakerAldus Pagemaker
                      Aldus PagemakerAldus PagemakerAldus PagemakerAldus PagemakerAldus PagemakerAldus PagemakerAldus Pagemaker',
            ),
        ),
        array(
            'title' => 'Товар 5',
            'logo' => 'wind-04.jpg',
            'body' => 'Lorem Ipsum - це текст-"риба", що використовується в друкарстві та дизайні.
                  Lorem Ipsum є, фактично, стандартною "рибою" аж з XVI сторіччя, коли невідомий друкар взяв
                  шрифтову гранку та склав на ній підбірку зразків шрифтів. "Риба" не тільки успішно пережила пять
                  століть, але й прижилася в електронному верстуванні, залишаючись по суті незмінною.
                  Вона популяризувалась в 60-их роках минулого сторіччя завдяки виданню зразків шрифтів Letraset,
                  які містили уривки з Lorem Ipsum, і вдруге - нещодавно завдяки програмам компютерного верстування
                 на кшталт Aldus Pagemaker, які використовували різні версії Lorem Ipsum.',
            'performance' => '8160-400',
            'initialSpeed' => '7',
            'ratedSpeed' => '80',
            'weight' => '321',
            'price' => '250',
            'author' => 'Buuu',
            'en' => array(
                'title' => 'Product 5',
                'body' => 'English body1 Aldus Pagemaker Aldus PagemakerAldus PagemakerAldus PagemakerAldus Pagemaker
                      Aldus PagemakerAldus PagemakerAldus PagemakerAldus PagemakerAldus PagemakerAldus PagemakerAldus Pagemaker
                      Aldus PagemakerAldus PagemakerAldus PagemakerAldus PagemakerAldus PagemakerAldus PagemakerAldus Pagemaker',
            ),
        ),
        array(
            'title' => 'Товар 6',
            'logo' => 'wind-02.jpg',
            'body' => 'Lorem Ipsum - це текст-"риба", що використовується в друкарстві та дизайні.
                  Lorem Ipsum є, фактично, стандартною "рибою" аж з XVI сторіччя, коли невідомий друкар взяв
                  шрифтову гранку та склав на ній підбірку зразків шрифтів. "Риба" не тільки успішно пережила пять
                  століть, але й прижилася в електронному верстуванні, залишаючись по суті незмінною.
                  Вона популяризувалась в 60-их роках минулого сторіччя завдяки виданню зразків шрифтів Letraset,
                  які містили уривки з Lorem Ipsum, і вдруге - нещодавно завдяки програмам компютерного верстування
                 на кшталт Aldus Pagemaker, які використовували різні версії Lorem Ipsum.',
            'performance' => '633160-400',
            'initialSpeed' => '1',
            'ratedSpeed' => '30',
            'weight' => '1230',
            'price' => '12020',
            'author' => 'Kolya',
            'en' => array(
                'title' => 'Product 6',
                'body' => 'English body1 Aldus Pagemaker Aldus PagemakerAldus PagemakerAldus PagemakerAldus Pagemaker
                      Aldus PagemakerAldus PagemakerAldus PagemakerAldus PagemakerAldus PagemakerAldus PagemakerAldus Pagemaker
                      Aldus PagemakerAldus PagemakerAldus PagemakerAldus PagemakerAldus PagemakerAldus PagemakerAldus Pagemaker',
            ),
        ),
        array(
            'title' => 'Товар 7',
            'logo' => '345345.jpeg',
            'body' => 'Lorem Ipsum - це текст-"риба", що використовується в друкарстві та дизайні.
                  Lorem Ipsum є, фактично, стандартною "рибою" аж з XVI сторіччя, коли невідомий друкар взяв
                  шрифтову гранку та склав на ній підбірку зразків шрифтів. "Риба" не тільки успішно пережила пять
                  століть, але й прижилася в електронному верстуванні, залишаючись по суті незмінною.
                  Вона популяризувалась в 60-их роках минулого сторіччя завдяки виданню зразків шрифтів Letraset,
                  які містили уривки з Lorem Ipsum, і вдруге - нещодавно завдяки програмам компютерного верстування
                 на кшталт Aldus Pagemaker, які використовували різні версії Lorem Ipsum.',
            'performance' => '635160-400',
            'initialSpeed' => '4',
            'ratedSpeed' => '23',
            'weight' => '1220',
            'price' => '1500',
            'author' => 'David',
            'en' => array(
                'title' => 'Product 7',
                'body' => 'English body1 Aldus Pagemaker Aldus PagemakerAldus PagemakerAldus PagemakerAldus Pagemaker
                      Aldus PagemakerAldus PagemakerAldus PagemakerAldus PagemakerAldus PagemakerAldus PagemakerAldus Pagemaker
                      Aldus PagemakerAldus PagemakerAldus PagemakerAldus PagemakerAldus PagemakerAldus PagemakerAldus Pagemaker',
            ),
        ),
        array(
            'title' => 'Товар 8',
            'logo' => 'wind-04.jpg',
            'body' => 'Lorem Ipsum - це текст-"риба", що використовується в друкарстві та дизайні.
                  Lorem Ipsum є, фактично, стандартною "рибою" аж з XVI сторіччя, коли невідомий друкар взяв
                  шрифтову гранку та склав на ній підбірку зразків шрифтів. "Риба" не тільки успішно пережила пять
                  століть, але й прижилася в електронному верстуванні, залишаючись по суті незмінною.
                  Вона популяризувалась в 60-их роках минулого сторіччя завдяки виданню зразків шрифтів Letraset,
                  які містили уривки з Lorem Ipsum, і вдруге - нещодавно завдяки програмам компютерного верстування
                 на кшталт Aldus Pagemaker, які використовували різні версії Lorem Ipsum.',
            'performance' => '5160-400',
            'initialSpeed' => '21',
            'ratedSpeed' => '70',
            'weight' => '430',
            'price' => '7100',
            'author' => 'Kolya',
            'en' => array(
                'title' => 'Product 8',
                'body' => 'English body1 Aldus Pagemaker Aldus PagemakerAldus PagemakerAldus PagemakerAldus Pagemaker
                      Aldus PagemakerAldus PagemakerAldus PagemakerAldus PagemakerAldus PagemakerAldus PagemakerAldus Pagemaker
                      Aldus PagemakerAldus PagemakerAldus PagemakerAldus PagemakerAldus PagemakerAldus PagemakerAldus Pagemaker',
            ),
        ),
        array(
            'title' => 'Товар 9',
            'logo' => 'wind-03.jpg',
            'body' => 'Lorem Ipsum - це текст-"риба", що використовується в друкарстві та дизайні.
                  Lorem Ipsum є, фактично, стандартною "рибою" аж з XVI сторіччя, коли невідомий друкар взяв
                  шрифтову гранку та склав на ній підбірку зразків шрифтів. "Риба" не тільки успішно пережила пять
                  століть, але й прижилася в електронному верстуванні, залишаючись по суті незмінною.
                  Вона популяризувалась в 60-их роках минулого сторіччя завдяки виданню зразків шрифтів Letraset,
                  які містили уривки з Lorem Ipsum, і вдруге - нещодавно завдяки програмам компютерного верстування
                 на кшталт Aldus Pagemaker, які використовували різні версії Lorem Ipsum.',
            'performance' => '76160-400',
            'initialSpeed' => '12',
            'ratedSpeed' => '30',
            'weight' => '120',
            'price' => '1200',
            'author' => 'Kolya',
            'en' => array(
                'title' => 'Product 9',
                'body' => 'English body1 Aldus Pagemaker Aldus PagemakerAldus PagemakerAldus PagemakerAldus Pagemaker
                      Aldus PagemakerAldus PagemakerAldus PagemakerAldus PagemakerAldus PagemakerAldus PagemakerAldus Pagemaker
                      Aldus PagemakerAldus PagemakerAldus PagemakerAldus PagemakerAldus PagemakerAldus PagemakerAldus Pagemaker',
            ),
        ),
        array(
            'title' => 'Товар 10',
            'logo' => 'wind-05.jpg',
            'body' => 'Lorem Ipsum - це текст-"риба", що використовується в друкарстві та дизайні.
                  Lorem Ipsum є, фактично, стандартною "рибою" аж з XVI сторіччя, коли невідомий друкар взяв
                  шрифтову гранку та склав на ній підбірку зразків шрифтів. "Риба" не тільки успішно пережила пять
                  століть, але й прижилася в електронному верстуванні, залишаючись по суті незмінною.
                  Вона популяризувалась в 60-их роках минулого сторіччя завдяки виданню зразків шрифтів Letraset,
                  які містили уривки з Lorem Ipsum, і вдруге - нещодавно завдяки програмам компютерного верстування
                 на кшталт Aldus Pagemaker, які використовували різні версії Lorem Ipsum.',
            'performance' => '5160-400',
            'initialSpeed' => '5',
            'ratedSpeed' => '35',
            'weight' => '320',
            'price' => '5000',
            'author' => 'Buuu',
            'en' => array(
                'title' => 'Product 10',
                'body' => 'English body1 Aldus Pagemaker Aldus PagemakerAldus PagemakerAldus PagemakerAldus Pagemaker
                      Aldus PagemakerAldus PagemakerAldus PagemakerAldus PagemakerAldus PagemakerAldus PagemakerAldus Pagemaker
                      Aldus PagemakerAldus PagemakerAldus PagemakerAldus PagemakerAldus PagemakerAldus PagemakerAldus Pagemaker',
            ),
        ),
    );
    /**
     * Get the order of this fixture
     *
     * @return integer
     */
    function getOrder()
    {
        return 25;
    }
    /**
     * Load data fixtures with the passed EntityManager
     *
     */
    function load(ObjectManager $manager)
    {
        $repository = $manager->getRepository('\\Gedmo\\Translatable\\Entity\\Translation');

        $imagesDestinationDir = getcwd().'/web/upload/documents';
//        $imagesSourceDir = getcwd().'/web/img/projects';
//        if (! file_exists($imagesDestinationDir)) {
//            mkdir($imagesDestinationDir, 0777, true);
//        }

        foreach ($this->generator as $data) {
            $generator = new Generator();
            $generator->setTitle($data['title']);
            $generator->setLogo($data['logo']);
            $generator->setBody($data['body']);
            $generator->setPerformance($data['performance']);
            $generator->setInitialSpeed($data['initialSpeed']);
            $generator->setRatedSpeed($data['ratedSpeed']);
            $generator->setWeight($data['weight']);
            $generator->setPrice($data['price']);
            $generator->setAuthor($this->getAuthor($manager, $data['author']));

            $repository
              ->translate($generator, 'title', 'en', $data['en']['title'])
              ->translate($generator, 'body', 'en', $data['en']['body']);

            $manager->persist($generator);
            $manager->flush();
        }
//        $g1 = new Generator();
//        $g1->setTitle('Lorem');
////        $g1->setPath($g1->getAbsolutePath().'/63b16-smile1.jpg');
//        $g1->setLogo('63b16-smile1.jpg');
//        $g1->setBody('Lorem 300M рассчитан на сильные ветра и может быть установлен, к примеру, на яхту, телекоммуникационные вышки и прочие объекты.');
//        $g1->setPerformance('0-400');
//        $g1->setInitialSpeed('3');
//        $g1->setRatedSpeed('30');
//        $g1->setWeight('30');
//        $g1->setPrice(525);
//        $g1->setAuthor($this->getAuthor($manager,"Kolya"));
//        $g1->setTranslatableLocale('ua_Uk'); // Change la locale
//
//        $g2 = new Generator();
//        $g2->setTitle('Test');
////        $g2->setPath($g2->getAbsolutePath().'/123.jpeg');
//        $g2->setLogo('123.jpeg');
//
//        $g2->setBody('TEst test tste сильные ветра и может быть установлен, к примеру, на яхту, телекоммуникационные вышки и прочие объекты.');
//        $g2->setPerformance('0-300');
//        $g2->setInitialSpeed('1');
//        $g2->setRatedSpeed('70');
//        $g2->setWeight('100');
//        $g2->setPrice(100);
//        $g2->setAuthor($this->getAuthor($manager, "David"));
//
//        $g3 = new Generator();
//        $g3->setTitle('Test test ');
////        $g3->setPath($g3->getAbsolutePath().'/drua_logo.png');
//        $g3->setLogo('drua_logo.png');
//
//        $g3->setBody('buuuuu TEst test tste сильные ветра и может быть установлен, к примеру, на яхту, телекоммуникационные вышки и прочие объекты.');
//        $g3->setPerformance('0-500');
//        $g3->setInitialSpeed('6');
//        $g3->setRatedSpeed('70');
//        $g3->setWeight('800');
//        $g3->setPrice(10700);
//        $g3->setAuthor($this->getAuthor($manager, "Buuu"));
//
//        $manager->persist($g1);
//        $manager->persist($g2);
//        $manager->persist($g3);
//        $manager->flush();
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