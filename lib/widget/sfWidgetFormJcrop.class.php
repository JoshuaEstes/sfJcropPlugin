<?php

/**
 * Description
 *
 * @package
 * @subpackage
 * @author     Joshua Estes <Joshua.Estes@iostudio.com>
 * @copyright  iostudio 2012
 * @version    0.1.0
 * @category
 * @license
 *
 */
class sfWidgetFormJcrop extends sfWidgetForm {

    /**
     * Configures the current widget.
     *
     * This method allows each widget to add options or HTML attributes
     * during widget creation.
     *
     * If some options and HTML attributes are given in the sfWidget constructor
     * they will take precedence over the options and HTML attributes you configure
     * in this method.
     *
     * @param array $options     An array of options
     * @param array $attributes  An array of HTML attributes
     *
     * @see __construct()
     */
    protected function configure($options = array(), $attributes = array()) {

    }

    /**
     * Renders the widget as HTML.
     *
     * All subclasses must implement this method.
     *
     * @param  string $name       The name of the HTML widget
     * @param  mixed  $value      The value of the widget
     * @param  array  $attributes An array of HTML attributes
     * @param  array  $errors     An array of errors
     *
     * @return string A HTML representation of the widget
     */
    public function render($name, $value = null, $attributes = array(), $errors = array()) {
$js = <<<EOF
<script type="text/javascrip">
    jQuery(function($){
        $('#%ID%').Jcrop();
    });
</script>
EOF;
        return strtr($js,array(
            '%ID%' => $name
        ));
    }

    /**
     * Gets the stylesheet paths associated with the widget.
     *
     * The array keys are files and values are the media names (separated by a ,):
     *
     *   array('/path/to/file.css' => 'all', '/another/file.css' => 'screen,print')
     *
     * @return array An array of stylesheet paths
     */
    public function getStylesheets() {
        return array(
            sfConfig::get('app_jcrop_path') . '/css/jquery.Jcrop.css'
        );
    }

    /**
     * Gets the JavaScript paths associated with the widget.
     *
     * @return array An array of JavaScript paths
     */
    public function getJavaScripts() {
        return array(
            sfConfig::get('app_jcrop_path') . '/js/jquery.Jcrop.min.js'
        );
    }

}