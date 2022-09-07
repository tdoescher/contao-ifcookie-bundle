<?php

/**
 * This file is part of IfCookie Bundle for Contao
 *
 * @package     tdoescher/ifcookie-bundle
 * @author      Torben Döscher <mail@tdoescher.de>
 * @license     LGPL
 * @copyright   tdoescher.de - WEB und IT <https://tdoescher.de>
 */

namespace tdoescher\IfCookieBundle\EventListener;

use Contao\CoreBundle\ServiceAnnotation\Hook;
use Contao\ContentModel;

/**
 * @Hook("getContentElement")
 */
class GetContentElementListener
{
    public function __invoke(ContentModel $model, string $buffer, $element): string
    {
        if(TL_MODE == 'FE')
        {
            if($element->ifcookie_cookie != '' && in_array($element->ifcookie_show, ['show', 'hide']))
            {
                if(\Input::cookie($element->ifcookie_cookie) == 'true')
                {
                    if($element->ifcookie_show == 'hide') {
                        return '';
                    }
                }
                else
                {
                    if($element->ifcookie_show == 'show') {
                        return '';
                    }
                }
            }
        }

        return $buffer;
    }
}
