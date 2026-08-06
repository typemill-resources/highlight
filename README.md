This plugin integrates the famous javascript-library [highlight](https://highlightjs.org/) from Ivan Sagalaev and it hightlights your code examples wrapped in `<pre>` or `<code>` tags.

Activate the plugin and you are ready to go. The highlight library detects the language automatically. You can also choose a theme and activate options like line numbers, a copy button or word wrap in the plugin settings.

The plugin integrates a minimal version of Highlight and supports only some common languages. If you miss any language, then [download your own package](https://highlightjs.org/download/) and paste it into the plugin. The pugin is just a simple wrapper.

## Write Code with Markdown

You can use the visual editor mode of Typemill to write inline-code and code-blocks in markdown. Just use the `<>` buttons. 

If you want to determine the language of your code manually, then you can use the raw mode and add the language directly after the code block. For example:

````
```javascript
   alert("hello")
```
````

This will produce a class like `<code class="language-javascript">alert("hello")</code>`. The highlight-library will not autodetect your code-language and instead use the defined language from your class.

## Updates

### Version 2.2.0

* Added explicit default settings for the plugin form.
* Removed non-existing theme `brown-papersq` from theme options.
* Added missing theme `1c-light` to theme options.
* Fixed inconsistent method casing for asset registration.

### Version 2.1.0

* Updated themes.
* Removed word-wrap and other styles from reset.css

### Version 2.0.0

* Updated to Version 2 of Typemill

