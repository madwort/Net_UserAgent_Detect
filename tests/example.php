<?php
require_once '../Detect.php';

// {{{ some functions for printing

if (!function_exists('println')) {
    function println($in_string) {
        static $linefeed;

        if (!isset($linefeed)) {
            if (($sapi = php_sapi_name()) == 'apache' || $sapi == 'cgi') {
                $linefeed = '<br />';
            }
            else {
                $linefeed = "\n";
            }
        }

        echo $in_string . $linefeed;
    }
}

// }}}

$_SERVER['HTTP_USER_AGENT'] = $GLOBALS['HTTP_USER_AGENT'] = 'Mozilla/5.0 (X11; U; Linux i686; en-US; rv:1.0rc1) Gecko/20020417'; 
$_SERVER['HTTP_ACCEPT_LANGUAGE'] = 'fr;';

$browserSearch = array('ie6up', 'ie5', 'ie4', 'gecko', 'ns6up', 'ns4', 'nav');
$o_net =& Net_UserAgent_Detect::singleton();
println('User Agent String: ' . $o_net->getUserAgent());
println('Browser String: ' . $o_net->getBrowserString());
println('OS String: ' . $o_net->getOSString());
println('Browser flag: ' . $o_net->getBrowser($browserSearch));
$languages = array('fr', 'de', 'en');
println('Accept Language: ' . $o_net->getAcceptType($languages, 'language'));
?>
