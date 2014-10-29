<?php

namespace WhereGroup\Training\CoreBundle\Test\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
use Symfony\Component\Security\Core\Authentication\Token\UsernamePasswordToken;
use Symfony\Component\BrowserKit\Cookie;

class ProjectControllerTest extends WebTestCase
{

    public function testNew()
    {
        $client = static::createClient();
        $crawler = $client->request('GET', '/new');
        $crawler = $client->submit(
            $crawler->selectButton('login')->form(array(
                'project[name]' => 'TestXXX',
                'project[description]' => 'test',
                'project[leader]' => 'test',
            ))
        );

        $this->assertTrue($client->getResponse()->isRedirect('/'));
        $crawler = $client->followRedirect();
        $this->assertEquals(1, $crawler->filter('html:contains("TestXXX")')->count());
    }
}
