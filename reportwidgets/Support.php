<?php

namespace Xitara\SupportWidget\ReportWidgets;

use Backend\Classes\ReportWidgetBase;
use Exception;
use Xitara\TwigExtender\Classes\TwigFilter;
use Backend\Models\AccessLog;
use Backend\Models\BrandSetting;
use BackendAuth;

/**
 * Support Report Widget
 */
class Support extends ReportWidgetBase
{
    /**
     * @var string The default alias to use for this widget
     */
    protected $defaultAlias = 'XitaraSupportReportWidget';

    /**
     * Defines the widget's properties
     * @return array
     */
    public function defineProperties()
    {
        return [
            'title' => [
                'title'             => 'backend::lang.widget.label',
                'default'           => 'Support',
                'type'              => 'string',
                'validationPattern' => '^.+$',
                'validationMessage' => 'backend::lang.dashboard.widget_title_error',
            ],
        ];
    }

    /**
     * Adds widget specific asset files. Use $this->addJs() and $this->addCss()
     * to register new assets to include on the page.
     * @return void
     */
    protected function loadAssets()
    {
        $this->addCss('css/support.css');
    }

    /**
     * Renders the widget's primary contents.
     * @return string HTML markup supplied by this widget.
     */
    public function render()
    {
        try {
            $this->prepareVars();
        } catch (Exception $ex) {
            $this->vars['error'] = $ex->getMessage();
        }

        return $this->makePartial('support');
    }

    /**
     * Prepares the report widget view data
     */
    public function prepareVars()
    {
        $this->vars['filter'] = new TwigFilter();
        $this->vars['user'] = $user = BackendAuth::getUser();
        $this->vars['appName'] = BrandSetting::get('app_name');
        $this->vars['lastSeen'] = AccessLog::getRecent($user);
    }
}
