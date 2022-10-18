<?php
/**
 * @package   Cenere (free) - accessibletemplate
 * @version   4.0.0
 * @author    Francesco Zaniol, accessibletemplate - http://www.accessibletemplate.com
 * @copyright Copyright (C) 2011-Present Francesco Zaniol
 * @license   http://www.gnu.org/licenses/gpl-2.0.html GNU/GPLv2 only
 **/
defined('ZHONG_FRAMEWORK') or die('Restricted access');

if($this->params['theme']['enable-top-button'] === 'true'){

    $this->helpers__viewsBuilders__wrapperOpening( array(
        'wrapper-id' => 'top-anchor-container',
        'is-encloser' => ( // same as header/footer
            $this->params['theme']['header-footer-layout-width-type'] !== 'full-width' &&
            !(
                $this->params['theme']['header-footer-layout-width-type'] === 'contained' &&
                $this->params['theme']['aside-top-bottom-layout-width-type'] === 'contained'
            )
        )
    ));

    echo '<div class="zf--top-anchor-shell"><a id="zf--top-anchor" href="#zf--page-top" rel="nofollow" title="'.$this->global_vars['language']['jump-to-top'].'"><span class="visually-hidden">'.$this->global_vars['language']['jump-to-top'].'</span><svg aria-hidden="true" id="zf--top-anchor-icon" viewBox="0 0 306 306" preserveAspectRatio="xMidYMid meet" width="1em" height="1em"><polygon points="35.7,247.35 153,130.05 270.3,247.35 306,211.65 153,58.65 0,211.65"/></svg></a></div>';

    $this->helpers__viewsBuilders__wrapperClosing( array(
        'enable-no-css-divider' => true,
        'is-encloser' => (
            $this->params['theme']['header-footer-layout-width-type'] !== 'full-width' &&
            !(
                $this->params['theme']['header-footer-layout-width-type'] === 'contained' &&
                $this->params['theme']['aside-top-bottom-layout-width-type'] === 'contained'
            )
        )
    ));

}
