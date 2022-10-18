<?php
/**
 * @package   Cenere (free) - accessibletemplate
 * @version   4.0.0
 * @author    Francesco Zaniol, accessibletemplate - http://www.accessibletemplate.com
 * @copyright Copyright (C) 2011-Present Francesco Zaniol
 * @license   http://www.gnu.org/licenses/gpl-2.0.html GNU/GPLv2 only
 **/
defined('ZHONG_FRAMEWORK') or die('Restricted access');

if($this->params['theme']['enable-google-analytics'] === 'true'){

    echo '<script type="text/javascript">/*<![CDATA[*/';

    echo "(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){(i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)})(window,document,'script','https://www.google-analytics.com/analytics.js','ga');ga('create','UA-".$this->params['theme']['google-analytics-id']."','auto');";

    // Is the anonymization enabled?
    // To test the feature: an additional parameter is added to the pixel request: "&aip=1" (see network tab in inspector)
    if($this->params['theme']['google-analytics-anonymization-enabled'] === 'true'){
        echo "ga('set','anonymizeIp',true);";
    }

    echo "ga('send','pageview');";

    echo '/*]]>*/</script>';

}
