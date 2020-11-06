<?php namespace Thrive\MenugatorExtension\Http\Controller\Admin;

use Anomaly\NavigationModule\Menu\Contract\MenuRepositoryInterface;
use Anomaly\NavigationModule\Menu\Form\MenuFormBuilder;
use Anomaly\NavigationModule\Menu\Table\MenuTableBuilder;
use Anomaly\Streams\Platform\Http\Controller\AdminController;

/**
 * Class MenusController
 *
 * @link          http://pyrocms.com/
 * @author        PyroCMS, Inc. <support@pyrocms.com>
 * @author        Ryan Thompson <ryan@pyrocms.com>
 */
class MenusController extends AdminController
{
    /**
     * Return an index of existing navigation menus.
     *
     * @param  MenuTableBuilder                           $table
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function index(MenuTableBuilder $table)
    {
        $table->setOptions(
            [
                'sortable' => true,
            ]
        );
        $table->setColumns(
            [
                'name',
                'slug'=> [
                    'sort_column' => 'slug',
                    'wrapper'     => '<code>{entry.slug}</code>',
                ],
                'description',
                'menu_group'=> [
                    'sort_column' => 'menu_group',
                    'wrapper'     => '<code>{entry.menu_group}</code> | <small>ID: {entry.id}</small>',
                ]
            ]
        );

        $authorizer = app(\Anomaly\Streams\Platform\Support\Authorizer::class);

        if (!$authorizer->authorize('anomaly.module.navigation::menus.delete', auth()->user())) {
            $table->setActions([]);
        }
        
        return $table->render();
    }

   
}
