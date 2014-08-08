<?php
namespace Codeception\Module;

// here you can define custom actions
// all public methods declared in helper class will be available in $I

class AcceptanceHelper extends \Codeception\Module
{

    /**
     * Print variable to terminal
     * This exists because Codeception doesn't let you echo or var_dump
     * @param mixed
     * @return print
     */
	public function log($var) {
		var_dump($var);
		print PHP_EOL;
		ob_flush();
	}

    /**
     * Parse XML with Sitemap schema and return its URLs
     * @param string
     * @return array
     */
    public function parseSitemap($string) {
        $urls = array();
        $x = new \SimpleXMLElement($string);
        foreach ($x->url as $n) {
            $urls[] = $n->loc->__toString();
        }

        return $urls;
    }

}