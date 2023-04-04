<?php

namespace Xitara\SupportWidget;

use Backend;
use Backend\Models\UserRole;
use System\Classes\PluginBase;
use System\Classes\PluginManager;

/**
 * SupportWidget Plugin Information File
 */
class Plugin extends PluginBase
{
    /**
     * Returns information about this plugin.
     */
    public function pluginDetails(): array
    {
        return [
            'name'        => 'xitara.supportwidget::lang.plugin.name',
            'description' => 'xitara.supportwidget::lang.plugin.description',
            'author'      => 'Xitara',
            'icon'        => 'icon-leaf'
        ];
    }

    /**
     * Register method, called when the plugin is first registered.
     */
    public function register(): void
    {
    }

    /**
     * Boot method, called right before the request route.
     */
    public function boot(): void
    {
    }

    /**
     * Registers any frontend components implemented in this plugin.
     */
    public function registerComponents(): array
    {
        return []; // Remove this line to activate

        return [
            'Xitara\SupportWidget\Components\MyComponent' => 'myComponent',
        ];
    }

    /**
     * Registers any backend permissions used by this plugin.
     */
    public function registerPermissions(): array
    {
        return [
            'xitara.supportwidget.show_widget' => [
                'tab' => 'xitara.supportwidget::lang.plugin.name',
                'label' => 'xitara.supportwidget::lang.permissions.show_widget',
                'roles' => [UserRole::CODE_DEVELOPER, UserRole::CODE_PUBLISHER],
            ],
        ];
    }

    /**
     * Registers backend navigation items for this plugin.
     */
    public function registerNavigation(): array
    {
        return []; // Remove this line to activate

        return [
            'supportwidget' => [
                'label'       => 'xitara.supportwidget::lang.plugin.name',
                'url'         => Backend::url('xitara/supportwidget/mycontroller'),
                'icon'        => 'icon-leaf',
                'permissions' => ['xitara.supportwidget.*'],
                'order'       => 500,
            ],
        ];
    }

    public function registerReportWidgets()
    {
        return [
            'Xitara\SupportWidget\ReportWidgets\Support' => [
                'label'   => 'xitara..supportwidget::lang.widget.label',
                'context' => 'dashboard',
                'permissions' => [
                    'xitara.supportwidget.show_widget',
                ],
            ],
        ];
    }

    public function registerSettings()
    {
        $category = 'xitara.supportwidget::lang.settings.label';

        if (PluginManager::instance()->exists('Xitara.Nexus') === true) {
            if (($category = \Xitara\Nexus\Models\Settings::get('menu_text')) == '') {
                $category = 'xitara.nexus::core.settings.name';
            }
        }

        return [
        'settings' => [
            'category' => $category,
            'label' => 'xitara.supportwidget::lang.submenu.label',
            'description' => 'xitara.supportwidget::lang.submenu.description',
            'icon' => 'icon-comments-o',
            'class' => 'Xitara\SupportWidget\Models\Settings',
            'order' => 20,
        ],
    ];
    }
}
