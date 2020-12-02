<?php namespace Thrive\MenugatorExtension;

use Anomaly\NavigationModule\Menu\Contract\MenuRepositoryInterface;
use Anomaly\Streams\Platform\Addon\Plugin\Plugin;


class MenugatorExtensionPlugin extends Plugin
{

    public function __construct(MenuRepositoryInterface $menus)
    {
        $this->menus     = $menus;
    }

    /**
     * Get the functions.
     *
     * @return array
     */
    public function getFunctions()
    {
        return [
            new \Twig_SimpleFunction(
                'menu_group',
                function ($menugroup = null) {
                    if($menu = $this->menus->getModel()->where( 'menu_group', $menugroup )->get()) {
                        return $menu;
                    }
                    return NULL;
                },
                [
                    'is_safe' => ['html'],
                ]                
            ),
        ];
    }

}



