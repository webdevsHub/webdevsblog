<?php

namespace Webdev\BlogBundle\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class PostControllerTest extends WebTestCase
{
	/*
	 * correct post loaded
	 */
    public function testPostLoaded()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/post/symfony2-tutorial');
        $this->assertEquals($crawler->filterXPath('html/body/div/div[2]/h2')->text(), 'symfony2 Tutorial');

        $this->assertEquals($crawler->filterXPath('html/body/div/div[2]/div[3]/ul/li/a')->text(), 'symfony 2');
    }
    
    /*
     * clicks update behavior
     */
    public function testClicksBehavior()
    {
    	$client = static::createClient();
    	
    	// no update while post in session (PostLoaded Test increments clicks!)
    	$crawler = $client->request('GET', '/post/symfony2-tutorial');
    	$this->assertEquals($crawler->filterXPath('html/body/div/div[2]/div[2]/table/tbody/tr[3]/td[2]')->text(), '2'); 
    	$crawler = $client->reload();
    	$this->assertEquals($crawler->filterXPath('html/body/div/div[2]/div[2]/table/tbody/tr[3]/td[2]')->text(), '2');
    	
    	// update with new session
    	$client->restart();
    	$crawler = $client->request('GET', '/post/symfony2-tutorial');
    	$this->assertEquals($crawler->filterXPath('html/body/div/div[2]/div[2]/table/tbody/tr[3]/td[2]')->text(), '3');
    }
}
