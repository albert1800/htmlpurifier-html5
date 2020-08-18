<?php

class HTMLPurifier_HTMLModule_HTML5_Forms_Input_ButtonTest
    extends HTMLPurifier_HTMLModule_HTML5_Forms_InputTest
{
    public function dataProvider()
    {
        return array(
            'input button' => array(
                '<input type="button" name="foo" value="foo">',
            ),
            'input button empty value' => array(
                '<input type="button" name="foo" value="">',
            ),
            'input button valid attributes' => array(
                '<input type="button" disabled inputmode="text">',
            ),
            'input button invalid attributes' => array(
                '<input type="button" accept="text/plain" alt="foo" dirname="foo.dir" height="10" max="10" maxlength="64" min="0" minlength="0" multiple pattern="[a-z]+" placeholder="foo" readonly required size="10" src="foo.png" step="1" width="10">',
                '<input type="button">',
            ),
        );
    }
}
