<?php

namespace Wind\CoreBundle\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class SliderControllerTest extends WebTestCase
{
    public function testSliderapload()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/slider-upload');
    }

}
