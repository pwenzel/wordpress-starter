<?php


class variablesTest extends \Codeception\TestCase\Test
{

   /**
    * @var \UnitTester
    */
    protected $tester;

    protected function _before()
    {
    }

    protected function _after()
    {
    }

    public function testConstants()
    {
        $this->assertTrue( defined('WP_DEBUG') );
    }

    public function testForPermalinkStructure()
    {
        $this->assertNotEmpty( get_option('permalink_structure'), 'Permalink structure should be defined.' );
    }

}