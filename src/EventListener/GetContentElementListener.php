<?php

namespace tdoescher\IfCookieBundle\EventListener;

use Contao\CoreBundle\ServiceAnnotation\Hook;
use Contao\ContentElement;
use Contao\ContentModel;

/**
 * @Hook("getContentElement")
 */
class GetContentElementListener
{
    public function __invoke(ContentModel $model, string $buffer, ContentElement $element): string
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
