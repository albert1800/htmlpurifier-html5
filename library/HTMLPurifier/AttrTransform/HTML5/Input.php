<?php

/**
 * Performs miscellaneous cross attribute validation and filtering for
 * HTML5 input elements. This is meant to be a post-transform.
 */
class HTMLPurifier_AttrTransform_HTML5_Input extends HTMLPurifier_AttrTransform
{
    /**
     * Allowed attributes vs input type lookup
     * @var array
     * @see https://html.spec.whatwg.org/dev/input.html#input-type-attr-summary
     * @note Generated by maintenance/generate-input-allowed.php script
     */
    protected static $allowed = array(
        'accept' => array(
            'file' => true,
        ),
        'alt' => array(
            'image' => true,
        ),
        'autocomplete' => array(
            'color' => true,
            'date' => true,
            'datetime-local' => true,
            'email' => true,
            'month' => true,
            'number' => true,
            'password' => true,
            'range' => true,
            'search' => true,
            'tel' => true,
            'text' => true,
            'time' => true,
            'url' => true,
            'week' => true,
        ),
        'checked' => array(
            'checkbox' => true,
            'radio' => true,
        ),
        'dirname' => array(
            'search' => true,
            'text' => true,
        ),
        'formaction' => array(
            'image' => true,
            'submit' => true,
        ),
        'formenctype' => array(
            'image' => true,
            'submit' => true,
        ),
        'formmethod' => array(
            'image' => true,
            'submit' => true,
        ),
        'formnovalidate' => array(
            'image' => true,
            'submit' => true,
        ),
        'formtarget' => array(
            'image' => true,
            'submit' => true,
        ),
        'height' => array(
            'image' => true,
        ),
        'list' => array(
            'color' => true,
            'date' => true,
            'datetime-local' => true,
            'email' => true,
            'month' => true,
            'number' => true,
            'range' => true,
            'search' => true,
            'tel' => true,
            'text' => true,
            'time' => true,
            'url' => true,
            'week' => true,
        ),
        'max' => array(
            'date' => true,
            'datetime-local' => true,
            'month' => true,
            'number' => true,
            'range' => true,
            'time' => true,
            'week' => true,
        ),
        'maxlength' => array(
            'email' => true,
            'password' => true,
            'search' => true,
            'tel' => true,
            'text' => true,
            'url' => true,
        ),
        'min' => array(
            'date' => true,
            'datetime-local' => true,
            'month' => true,
            'number' => true,
            'range' => true,
            'time' => true,
            'week' => true,
        ),
        'minlength' => array(
            'email' => true,
            'password' => true,
            'search' => true,
            'tel' => true,
            'text' => true,
            'url' => true,
        ),
        'multiple' => array(
            'email' => true,
            'file' => true,
        ),
        'pattern' => array(
            'email' => true,
            'password' => true,
            'search' => true,
            'tel' => true,
            'text' => true,
            'url' => true,
        ),
        'placeholder' => array(
            'email' => true,
            'number' => true,
            'password' => true,
            'search' => true,
            'tel' => true,
            'text' => true,
            'url' => true,
        ),
        'readonly' => array(
            'date' => true,
            'datetime-local' => true,
            'email' => true,
            'month' => true,
            'number' => true,
            'password' => true,
            'search' => true,
            'tel' => true,
            'text' => true,
            'time' => true,
            'url' => true,
            'week' => true,
        ),
        'required' => array(
            'checkbox' => true,
            'date' => true,
            'datetime-local' => true,
            'email' => true,
            'file' => true,
            'month' => true,
            'number' => true,
            'password' => true,
            'radio' => true,
            'search' => true,
            'tel' => true,
            'text' => true,
            'time' => true,
            'url' => true,
            'week' => true,
        ),
        'size' => array(
            'email' => true,
            'password' => true,
            'search' => true,
            'tel' => true,
            'text' => true,
            'url' => true,
        ),
        'src' => array(
            'image' => true,
        ),
        'step' => array(
            'date' => true,
            'datetime-local' => true,
            'month' => true,
            'number' => true,
            'range' => true,
            'time' => true,
            'week' => true,
        ),
        'value' => array(
            'button' => true,
            'checkbox' => true,
            'color' => true,
            'date' => true,
            'datetime-local' => true,
            'email' => true,
            'hidden' => true,
            'month' => true,
            'number' => true,
            'password' => true,
            'radio' => true,
            'range' => true,
            'reset' => true,
            'search' => true,
            'submit' => true,
            'tel' => true,
            'text' => true,
            'time' => true,
            'url' => true,
            'week' => true,
        ),
        'width' => array(
            'image' => true,
        ),
    );

    /**
     * @var HTMLPurifier_AttrDef[]
     */
    protected static $validators;

    public function __construct()
    {
        if (!self::$validators) {
            self::$validators = array(
                'datetime-local' => new HTMLPurifier_AttrDef_HTML5_Datetime('DatetimeLocal'),
                'week'   => new HTMLPurifier_AttrDef_HTML5_Week(),
                'month'  => new HTMLPurifier_AttrDef_HTML5_Datetime('Month'),
                'date'   => new HTMLPurifier_AttrDef_HTML5_Datetime('Date'),
                'time'   => new HTMLPurifier_AttrDef_HTML5_Datetime('Time'),
                'range'  => new HTMLPurifier_AttrDef_HTML5_Float(),
                'number' => new HTMLPurifier_AttrDef_HTML5_Float(),
                'color'  => new HTMLPurifier_AttrDef_HTML_Color(),
                'url'    => new HTMLPurifier_AttrDef_HTML5_AbsoluteURI(),
                'email'  => new HTMLPurifier_AttrDef_HTML5_Email(),
            );
        }
    }

    /**
     * @param array $attr
     * @param HTMLPurifier_Config $config
     * @param HTMLPurifier_Context $context
     * @return array|bool
     */
    public function transform($attr, $config, $context)
    {
        $t = isset($attr['type']) ? $attr['type'] : 'text';

        // Type failed Attr.AllowedInputTypes validation - the element has to be removed
        if ($t === false) {
            return false;
        }

        $t = strtolower($t);
        $attr['type'] = $t;

        // For historical reasons, the name isindex is not allowed
        // https://html.spec.whatwg.org/multipage/form-control-infrastructure.html#attr-fe-name
        if (isset($attr['name']) && $attr['name'] === 'isindex') {
            unset($attr['name']);
        }

        // Non-empty 'alt' attribute is required for 'image' input
        if ($t === 'image' && !isset($attr['alt'])) {
            $alt = trim($config->get('Attr.DefaultImageAlt'));
            if ($alt === '') {
                $name = isset($attr['name']) ? trim($attr['name']) : '';
                $alt = $name !== '' ? $name : 'image';
            }
            $attr['alt'] = $alt;
        }

        // Remove attributes not allowed for provided input type
        foreach (self::$allowed as $a => $types) {
            if (isset($attr[$a]) && !isset($types[$t])) {
                unset($attr[$a]);
            }
        }

        // An empty string is a valid value
        if (isset($attr['value']) && $attr['value'] !== '') {
            $value = $this->validate($t, $config, $context, $attr['value']);
            if ($value === false) {
                unset($attr['value']);
            } else {
                $attr['value'] = $value;
            }
        }

        if (isset($attr['min'])) {
            $min = $this->validate($t, $config, $context, $attr['min']);
            if ($min === false) {
                unset($attr['min']);
            } else {
                $attr['min'] = $min;
            }
        }

        if (isset($attr['max'])) {
            $max = $this->validate($t, $config, $context, $attr['max']);
            if ($max === false) {
                unset($attr['max']);
            } else {
                $attr['max'] = $max;
            }
        }

        // The value attribute is always optional, though should be considered
        // mandatory for checkbox, radio, and hidden.
        // https://developer.mozilla.org/en-US/docs/Web/HTML/Element/input#attr-value
        // Nu Validator diverges from the WHATWG spec, as it defines 'value'
        // attribute as required, see:
        // https://github.com/validator/validator/blob/master/schema/html5/web-forms.rnc
        if (!isset($attr['value']) && ($t === 'checkbox' || $t === 'radio' || $t === 'hidden')) {
            $attr['value'] = '';
        }

        return $attr;
    }

    /**
     * @param string $type
     * @param HTMLPurifier_Config $config
     * @param HTMLPurifier_Context $context
     * @param mixed $value
     * @return bool|string
     */
    protected function validate($type, HTMLPurifier_Config $config, HTMLPurifier_Context $context, $value)
    {
        $validator = isset(self::$validators[$type]) ? self::$validators[$type] : null;
        if (!$validator) {
            return $value;
        }
        if (($validated = $validator->validate($value, $config, $context)) === true) {
            return $value;
        }
        return $validated;
    }
}
