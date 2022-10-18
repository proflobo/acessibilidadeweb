<?php
defined('_JEXEC') or die( 'Restricted access' );

// This custom field is used in the template's administration page to
// ensure that only Super Users can modify the template's configuration

if( !JFactory::getUser()->authorise('core.admin') ){
    ob_end_clean();ob_end_clean();ob_end_clean();ob_end_clean(); // Dumb way to make extra-sure that Joomla's output buffer is cleared
    throw new Exception('Access denied: This page can be accessed only by Super Users', 401);
}

class JFormFieldZfuseraccess extends JFormField {
 
    protected $type = 'zfuseraccess';
 
    protected function getLabel(){ return ''; }
    protected function getInput(){ return ''; }

}
