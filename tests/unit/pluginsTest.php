<?php


class pluginsTest extends \Codeception\TestCase\Test
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

    public function testActivePlugins()
    {
        $this->assertTrue( is_plugin_active('json-api/json-api.php'), 'JSON API plugin should be active.' );
    }

}