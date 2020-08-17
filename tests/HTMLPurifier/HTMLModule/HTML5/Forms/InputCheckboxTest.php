<?php

class HTMLPurifier_HTMLModule_HTML5_Forms_InputCheckboxTest extends HTMLPurifier_HTMLModule_HTML5_Forms_InputTest
{
    public function dataProvider()
    {
        return array(
            'input checkbox' => array(
                '<input type="checkbox" name="foo" value="foo">',
            ),
            'input checkbox empty value' => array(
                '<input type="checkbox" name="foo" value="">',
            ),
            'input checkbox no value' => array(
                '<input type="checkbox" name="foo" value="">',
            ),
            'input checkbox valid attributes' => array(
                '<input type="checkbox" checked disabled inputmode="text" required value="">',
            ),
            'input checkbox invalid attributes' => array(
                '<input type="checkbox" accept="text/plain" alt="foo" dirname="foo.dir" height="10" max="10" maxlength="64" min="0" minlength="0" multiple pattern="[a-z]+" placeholder="foo" readonly size="10" src="foo.png" step="1" width="10">',
                '<input type="checkbox" value="">',
            ),
        );
    }
}
