<?php
/**
 * @package   Cenere (free) - accessibletemplate
 * @version   4.0.0
 * @author    Francesco Zaniol, accessibletemplate - http://www.accessibletemplate.com
 * @copyright Copyright (C) 2011-Present Francesco Zaniol
 * @license   http://www.gnu.org/licenses/gpl-2.0.html GNU/GPLv2 only
 **/
defined('ZHONG_FRAMEWORK') or die('Restricted access');

// Note: ids start with "zf__" (and not "zf--") because double dashes are not allowed inside comments by HTML validators

echo '<!--[if lte IE 7]><div id="zf__obsolete-browser-alert" style="display:none;" class="highlight-yellow">'.$this->global_vars['language']['iemessage-download-firefox-content'].'<a href="#" role="button" id="zf__hide-obsolete-browser-alert-button">'.$this->global_vars['language']['hide-this-message'].'</a></div>'.'<script type="text/javascript">if(!window.zhongFramework.helpers.getCookie("ObsoleteBrowserAlert")){document.getElementById("zf__obsolete-browser-alert").style.display="block";document.getElementById("zf__hide-obsolete-browser-alert-button").onclick=function(){document.getElementById("zf__obsolete-browser-alert").style.display="none";window.zhongFramework.helpers.setCookie("ObsoleteBrowserAlert","closed","session-cookie");};}</script>'.'<![endif]-->';
