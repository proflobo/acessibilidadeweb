<?php
/**
 * @package   Cenere (free) - accessibletemplate
 * @version   4.0.0
 * @author    Francesco Zaniol, accessibletemplate - http://www.accessibletemplate.com
 * @copyright Copyright (C) 2011-Present Francesco Zaniol
 * @license   http://www.gnu.org/licenses/gpl-2.0.html GNU/GPLv2 only
 **/
defined('ZHONG_FRAMEWORK') or die('Restricted access');

echo "<!DOCTYPE html>".

'<html id="zf__html" class="no-js zf--keyboard-outline" '.
    'xmlns="http://www.w3.org/1999/xhtml" '.
    'xml:lang="'.substr($this->params['site']['site-language'],0,2).'" '.
    'lang="'.substr($this->params['site']['site-language'],0,2).'" '.
    'dir="'.$this->params['site']['site-text-direction'].'" '.
    'data-zf--mq="lg"'. // Default media-query is desktop
'>';
