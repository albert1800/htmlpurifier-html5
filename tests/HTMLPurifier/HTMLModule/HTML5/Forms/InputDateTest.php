<?php

class HTMLPurifier_HTMLModule_HTML5_Forms_InputDateTest extends HTMLPurifier_HTMLModule_HTML5_Forms_InputTest
{
    public function dataProvider()
    {
        return array(
            'input date' => array(
                '<input type="date" name="foo" value="2005-04-02">',
            ),
            'input date empty value' => array(
                '<input type="date" name="foo" value="">',
            ),
            'input date no value' => array(
                '<input type="date" name="foo" value="">',
            ),
            'input date datetime value' => array(
                '<input type="date" name="foo" value="2005-04-02 21:37">',
                '<input type="date" name="foo" value="2005-04-02">',
            ),
            'input date invalid value' => array(
                '<input type="date" name="foo" value="foo">',
                '<input type="date" name="foo">',
            ),
            'input date valid attributes' => array(
                '<input type="date" disabled inputmode="text" min="2004-04-10" max="2010-04-10" readonly required step="1">',
            ),
            'input date step any' => array(
                '<input type="date" step="any">',
            ),
            'input date invalid attributes' => array(
                '<input type="date" accept="text/plain" alt="foo" checked dirname="foo.dir" height="10" max="10" maxlength="64" min="0" minlength="0" multiple pattern="[a-z]+" placeholder="foo" size="10" src="foo.png" width="10">',
                '<input type="date">',
            ),
        );
    }
}
