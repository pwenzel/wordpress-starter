<?php

class submodulesTest extends \Codeception\TestCase\Test
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

    public function testTgmPluginActivatorExists()
    {
        $this->assertTrue( class_exists( 'TGM_Plugin_Activation' ) );
    }

}