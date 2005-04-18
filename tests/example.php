<?php
require_once '../Detect.php';
error_reporting(E_ALL);
// {{{ some functions for printing

if (!function_exists('println')) {
    function println($in_string) {
        static $linefeed;

        if (!isset($linefeed)) {
            if (in_array(php_sapi_name(), array('cli', 'cgi')) && empty($_SERVER['REMOTE_ADDR'])) {
                $linefeed = "\n";
            }
            else {
                $linefeed = '<br />';
            }
        }

        echo $in_string . $linefeed;
    }
}

// }}}

if (in_array(php_sapi_name(), array('cli', 'cgi')) && empty($_SERVER['REMOTE_ADDR'])) {
    $_SERVER['HTTP_ACCEPT_LANGUAGE'] = 'fr;';
    Net_UserAgent_Detect::setOption('userAgent', 'Mozilla/5.0 (X11; U; Linux i686; en-US; rv:1.0rc1) Gecko/20020417'); 
}

$browserSearch = array('ie6up', 'ie5', 'ie4', 'gecko', 'ns6up', 'ns4', 'nav', 'safari');
println('User Agent String: ' . Net_UserAgent_Detect::getUserAgent());
println('Browser String: ' . Net_UserAgent_Detect::getBrowserString());
println('OS String: ' . Net_UserAgent_Detect::getOSString());
println('Browser flag: ' . Net_UserAgent_Detect::getBrowser($browserSearch));
println('Has "popups disabled" quirk: ' . (Net_UserAgent_Detect::hasQuirk('popups_disabled') ? 'Yes' : 'No'));
println('Has "dom" feature: ' . (Net_UserAgent_Detect::hasFeature('dom') ? 'Yes' : 'No'));
println('Javascript version: ' . Net_UserAgent_Detect::getFeature('javascript'));
$languages = array('fr', 'de', 'en');
println('Accept Language: ' . Net_UserAgent_Detect::getAcceptType($languages, 'language'));
?>
