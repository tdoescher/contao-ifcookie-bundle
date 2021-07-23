<?php

namespace tdoescher\IfCookieBundle\EventListener\DataContainer;

use Contao\CoreBundle\DataContainer\PaletteManipulator;
use Contao\CoreBundle\ServiceAnnotation\Callback;
use Contao\DataContainer;

/**
 * @Callback(table="tl_content", target="config.onload")
 */
class AddPalleteCallback
{
    public function __invoke(DataContainer $dc = null): void
    {
        $palette = PaletteManipulator::create()
            ->addLegend('ifcookie_legend', 'invisible_legend', PaletteManipulator::POSITION_BEFORE)
            ->addField('ifcookie_cookie', 'ifcookie_legend', PaletteManipulator::POSITION_APPEND)
            ->addField('ifcookie_show', 'ifcookie_legend', PaletteManipulator::POSITION_APPEND);

        foreach($GLOBALS['TL_DCA']['tl_content']['palettes'] as $key => $value)
        {
            if($key === '__selector__')
            {
                continue;
            }

            $palette->applyToPalette($key, 'tl_content');
        }
    }
}
