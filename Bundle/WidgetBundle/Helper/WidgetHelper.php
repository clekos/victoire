<?php

namespace Victoire\Bundle\WidgetBundle\Helper;

use Symfony\Component\DependencyInjection\Container;
use Victoire\Bundle\WidgetBundle\Model\Widget;

class WidgetHelper
{

    private $container;

    public function __construct(Container $container)
    {
        $this->container = $container;
    }

    /**
     * The name of the widget
     *
     * @return string
     */
    public function getWidgetName(Widget $widget)
    {
        $widgets = $this->container->getParameter('victoire_core.widgets');
         foreach ($widgets as $widgetParams) {
             if ($widgetParams['class'] === get_class($widget)) {
                return $widgetParams['name'];
             }
         }

         throw new \Exception("Widget name not found for widget " . get_class($widget));

    }

    /**
     * check if widget is allowed for slot
     * @param Widget $widget
     * @param string $slot
     *
     * @return bool
     */
    public function isWidgetAllowedForSlot(Widget $widget, $slot)
    {
        $widgetName = $this->getWidgetName($widget);
        $slots = $this->slots;

        return !empty($slots[$slot]) && (array_key_exists($widgetName, $slots[$slot]['widgets']));
    }

    /**
     * create a new WidgetRedactor
     * @param string $type
     * @param View   $view
     * @param string $slot
     *
     * @return $widget
     */
    public function newWidgetInstance($type, $view, $slot)
    {
        $widgetAlias = 'victoire.widget.'. strtolower($type);
        $widget = $this->container->get($widgetAlias);

        $widget->setView($view);
        $widget->setSlot($slot);

        return $widget;
    }

    /**
     * Get the name of the template to display for an action
     * @param string $action
     * @param Widget $widget
     *
     * @todo find a better way to get the requested template
     *
     * @return string
     */
    public function getTemplateName($action, Widget $widget)
    {
        //the template displayed is in the widget bundle
        $templateName = 'VictoireWidget' . $this->getWidgetName($widget) . 'Bundle::' . $action . '.html.twig';

        return $templateName;
    }
}
