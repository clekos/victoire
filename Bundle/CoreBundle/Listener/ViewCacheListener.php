<?php
namespace Victoire\Bundle\CoreBundle\Listener;

use Symfony\Component\HttpKernel\Event\GetResponseEvent;
use Victoire\Bundle\CoreBundle\Helper\ViewCacheHelper;
use Victoire\Bundle\CoreBundle\Helper\ViewHelper;

/**
 * This class regenerates the page cache if debug mode is enabled
 *
 **/
class ViewCacheListener
{
    /**
     * @param ViewHelper      $viewHelper      victoire_core.view_helper
     * @param ViewCacheHelper $viewCacheHelper victoire_core.view_cache_helper
     * @param boolean         $debug           %kernel.debug%
     * @param boolean         $watchViewCache  %victoire_core.watch_view_cache%
     */
    public function __construct(ViewHelper $viewHelper, ViewCacheHelper $viewCacheHelper, $debug, $watchViewCache)
    {
        $this->viewHelper = $viewHelper;
        $this->viewCacheHelper = $viewCacheHelper;
        $this->debug = $debug;
        $this->watchViewCache = $watchViewCache;

    }

    /**
     * If we are in debug mode, recompute the page cache for each request
     *
     * @param GetResponseEvent $event
     *
     */
    public function onKernelRequest(GetResponseEvent $event)
    {
        if ($this->debug && $this->watchViewCache) {
            $viewsReferences = $this->viewHelper->getAllViewsReferences();
            $this->viewCacheHelper->write($viewsReferences);
        }
    }
}
