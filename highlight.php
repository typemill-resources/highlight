<?php

namespace Plugins\Highlight;

use \Typemill\Plugin;

class Highlight extends Plugin
{
	protected $settings;
	
    public static function getSubscribedEvents()
    {
		return array(
			'onSettingsLoaded'		=> 'onSettingsLoaded',		
			'onTwigLoaded' 			=> 'onTwigLoaded'
		);
    }
	
	public function onSettingsLoaded($settings)
	{
		$this->settings = $settings->getData();
	}
	
	
	public function onTwigLoaded()
	{
		$highlightSettings = $this->settings['settings']['plugins']['highlight'];
		
		/* add external CSS and JavaScript */
		$this->addCSS('/highlight/public/reset.css');	// For theme code css reset
		if (isset($highlightSettings['theme'])) {
			$this->addCSS('/highlight/public/'.$highlightSettings['theme'].'.css');
		} else {
			$this->addCSS('/highlight/public/default.css');
		}
		
		$this->addJS('/highlight/public/highlight.pack.js');
		$this->addJS('/highlight/public/highlightjs-line-numbers.min.js');

		if (isset($highlightSettings['copyButton']) && $highlightSettings['copyButton'] == 'true') {
		/* initialize copy badge 
		https://github.com/arronhunt/highlightjs-copy
		*/
		$this->addCss('/highlight/public/highlightjs-copy.min.css');
		$this->addJS('/highlight/public/highlightjs-copy.min.js');
		$this->addInlineJs('hljs.addPlugin(new CopyButtonPlugin());');
		}
		/* initialize the script */
		$this->addInlineJS('hljs.highlightAll();');
		
		
		if (isset($highlightSettings['lineNumber']) && $highlightSettings['lineNumber'] == 'true') {
			$this->addInlineJS('hljs.initLineNumbersOnLoad({ singleLine: true });');
		}
	}
}