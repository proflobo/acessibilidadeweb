<?php
/**
 * @package   Cenere (free) - accessibletemplate
 * @version   4.0.0
 * @author    Francesco Zaniol, accessibletemplate - http://www.accessibletemplate.com
 * @copyright Copyright (C) 2011-Present Francesco Zaniol
 * @license   http://www.gnu.org/licenses/gpl-2.0.html GNU/GPLv2 only
 **/
defined('_JEXEC') or die( 'Restricted access' );

//If >Joomla3, add bootstrap
if(substr(JPlatform::getShortVersion(), 0, 2) === '12' || substr(JPlatform::getShortVersion(), 0, 2) === '13'){
    JFactory::getDocument()->addStyleSheet($this->baseurl . '/media/jui/css/bootstrap.min.css');
    JHtml::_('bootstrap.framework');
}
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="<?php echo $this->language; ?>" lang="<?php echo $this->language; ?>" dir="<?php echo $this->direction; ?>">
<head>
	<jdoc:include type="head" />
</head>
<body class="contentpane" style="padding:10px">
	<jdoc:include type="message" />
	<jdoc:include type="component" />
</body>
</html>