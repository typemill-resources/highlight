<?php

namespace Plugins\Highlight;

use \Typemill\Plugin;

class Highlight extends Plugin
{	
    public static function getSubscribedEvents()
    {
		return array(
			'onTwigLoaded' 			=> 'onTwigLoaded'
		);
    }
		
	public function onTwigLoaded()
	{
		# only add to frontend
		if(!$this->adminroute)
		{
			$highlightSettings = $this->getPluginSettings();
			
			/* add external CSS and JavaScript */
			$this->addCSS('/highlight/themes/reset.css');	// For theme code css reset
			if (isset($highlightSettings['theme']))
			{
				$this->addCSS('/highlight/themes/'.$highlightSettings['theme'].'.css');
			}
			else
			{
				$this->addCSS('/highlight/themes/default.css');
			}
			
			$this->addJS('/highlight/js/highlight.min.js');
			$this->addJS('/highlight/js/highlightjs-line-numbers.min.js');

			if (isset($highlightSettings['copyButton']) && $highlightSettings['copyButton'] == 'true')
			{
				/* initialize copy badge 
				https://github.com/arronhunt/highlightjs-copy
				*/
				$this->addCss('/highlight/js/highlightjs-copy.min.css');
				$this->addJS('/highlight/js/highlightjs-copy.min.js');
				$this->addInlineJs('hljs.addPlugin(new CopyButtonPlugin());');
			}
			/* initialize the script */
			$this->addInlineJS('hljs.highlightAll();');
			
			if (isset($highlightSettings['lineNumber']) && $highlightSettings['lineNumber'] == 'true')
			{
				$this->addInlineJS('hljs.initLineNumbersOnLoad({ singleLine: true });');
			}

			if (isset($highlightSettings['wordWrap']) && $highlightSettings['wordWrap'] == 'true')
			{
				$this->addInlineCSS('
					code.hljs {
						  white-space: pre-wrap;
						}
					');
			}
		}
	}
}