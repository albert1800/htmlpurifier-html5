<?php

class HTMLPurifier_HTMLModule_HTML5_SafeForms_InputTest extends HTMLPurifier_HTMLModule_HTML5_AbstractTest
{
    protected function setUp()
    {
        parent::setUp();
        $this->config->set('HTML.Forms', true);
    }

    public function dataProvider()
    {
        return array(
            // text
            'input no type' => array(
                '<input>',
                '<input type="text">',
            ),
            'input empty type' => array(
                '<input type="">',
                '<input type="text">',
            ),
            'input isindex name' => array(
                '<input type="text" name="isindex">',
                '<input type="text">',
            ),

            // image
            'input image alt default' => array(
                '<input type="image">',
                '<input type="image" alt="image">',
            ),
            'input image alt from name' => array(
                '<input type="image" name="image1">',
                '<input type="image" name="image1" alt="image1">',
            ),

            // datetime (obsolete)
            'input datetime' => array(
                '<input type="datetime">',
                '<input type="datetime-local">',
            ),

            // week

            //
        );
    }

    /**
     * @param string $input
     * @param string $expected OPTIONAL
     * @dataProvider minMaxAttributeProvider
     */
    public function testMinMaxAttribute($input, $expected = null)
    {
        $this->testDataProvider($input, $expected);
    }

    public function minMaxAttributeProvider()
    {
        // Valid for date, month, week, time, datetime-local, number, and range
        return array(
            // date
            array(
                '<input type="date" min="2005-04-02" max="2010-04-10" step="1">',
            ),
            array(
                '<input type="date" min="2005-04" max="2010-04" step="1">',
                '<input type="date" step="1">',
            ),

            // month
            array(
                '<input type="month" min="2005-04" max="2010-04" step="1">',
            ),
            array(
                '<input type="month" min="2005" max="2010" step="1">',
                '<input type="month" step="1">',
            ),

            // week
            array(
                '<input type="week" min="2005-W13" max="2010-W14" step="1">',
            ),
            array(
                '<input type="week" min="2005" max="2010" step="1">',
                '<input type="week" step="1">',
            ),

            // time
            array(
                '<input type="time" min="21:37" max="23:59" step="1">',
            ),
            array(
                '<input type="time" min="21:37:00" max="23:59:59" step="1">',
            ),
            array(
                '<input type="time" min="21" max="23" step="1">',
                '<input type="time" step="1">',
            ),

            // datetime-local
            array(
                '<input type="datetime-local" min="2005-04-02 21:37" max="2010-04-10 08:41" step="1">',
                '<input type="datetime-local" min="2005-04-02T21:37" max="2010-04-10T08:41" step="1">',
            ),
            array(
                '<input type="datetime-local" min="2005-04-02" max="2010-04-10" step="1">',
                '<input type="datetime-local" step="1">',
            ),

            // number
            array(
                '<input type="number" min="1" max="10" step="1">',
            ),
            array(
                '<input type="number" min="2005-04" max="2010-04" step="1">',
                '<input type="number" step="1">',
            ),

            // range
            array(
                '<input type="range" min="1" max="10" step="1">',
            ),
            array(
                '<input type="range" min="2005-04" max="2010-04" step="1">',
                '<input type="range" step="1">',
            ),

            // invalid
            array(
                '<input type="button" min="1" max="10">',
                '<input type="button">',
            ),
            array(
                '<input type="checkbox" min="1" max="10">',
                '<input type="checkbox" value="">',
            ),
            array(
                '<input type="color" min="1" max="10">',
                '<input type="color">',
            ),
            array(
                '<input type="email" min="1" max="10">',
                '<input type="email">',
            ),
            array(
                '<input type="file" min="1" max="10">',
                '<input type="file">',
            ),
            array(
                '<input type="hidden" min="1" max="10">',
                '<input type="hidden" value="">',
            ),
            array(
                '<input type="image" min="1" max="10">',
                '<input type="image" alt="image">',
            ),
            array(
                '<input type="password" min="1" max="10">',
                '<input type="password">',
            ),
            array(
                '<input type="radio" min="1" max="10">',
                '<input type="radio" value="">',
            ),
            array(
                '<input type="reset" min="1" max="10">',
                '<input type="reset">',
            ),
            array(
                '<input type="search" min="1" max="10">',
                '<input type="search">',
            ),
            array(
                '<input type="submit" min="1" max="10">',
                '<input type="submit">',
            ),
            array(
                '<input type="tel" min="1" max="10">',
                '<input type="tel">',
            ),
            array(
                '<input min="1" max="10">',
                '<input type="text">',
            ),
            array(
                '<input type="text" min="1" max="10">',
                '<input type="text">',
            ),
            array(
                '<input type="url" min="1" max="10">',
                '<input type="url">',
            ),
        );
    }

    /**
     * @param string $input
     * @param string $expected OPTIONAL
     * @dataProvider stepAttributeProvider
     */
    public function testStepAttribute($input, $expected = null)
    {
        $this->testDataProvider($input, $expected);
    }

    public function stepAttributeProvider()
    {
        // date, month, week, time, datetime-local, number, or range
        return array(
            // date
            array(
                '<input type="date" min="2005-04-02" max="2010-04-10" step="1">',
            ),
            array(
                '<input type="date" min="2005-04-02" max="2010-04-10" step="any">',
            ),

            // month


            // week


            // time



            // datetime-local


            // number

            // range


            // invalid
            array(
                '<input type="button" step="1">',
                '<input type="button">',
            ),
            array(
                '<input type="checkbox" step="1">',
                '<input type="checkbox" value="">',
            ),
            array(
                '<input type="color" step="1">',
                '<input type="color">',
            ),
            array(
                '<input type="email" step="1">',
                '<input type="email">',
            ),
            array(
                '<input type="file" step="1">',
                '<input type="file">',
            ),
            array(
                '<input type="hidden" step="1">',
                '<input type="hidden" value="">',
            ),
            array(
                '<input type="image" step="1">',
                '<input type="image" alt="image">',
            ),
            array(
                '<input type="password" step="1">',
                '<input type="password">',
            ),
            array(
                '<input type="radio" step="1">',
                '<input type="radio" value="">',
            ),
            array(
                '<input type="reset" step="1">',
                '<input type="reset">',
            ),
            array(
                '<input type="search" step="1">',
                '<input type="search">',
            ),
            array(
                '<input type="submit" step="1">',
                '<input type="submit">',
            ),
            array(
                '<input type="tel" step="1">',
                '<input type="tel">',
            ),
            array(
                '<input step="1">',
                '<input type="text">',
            ),
            array(
                '<input type="text" step="1">',
                '<input type="text">',
            ),
            array(
                '<input type="url" step="1">',
                '<input type="url">',
            ),
        );
    }

    /**
     * @param string $input
     * @param string $expected OPTIONAL
     * @dataProvider provideButton
     */
    public function testButton($input, $expected = null)
    {
        $this->testDataProvider($input, $expected);
    }

    public function provideButton()
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

    /**
     * @param string $input
     * @param string $expected OPTIONAL
     * @dataProvider provideCheckbox
     */
    public function testCheckbox($input, $expected = null)
    {
        $this->testDataProvider($input, $expected);
    }

    public function provideCheckbox()
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

    /**
     * @param string $input
     * @param string $expected OPTIONAL
     * @dataProvider provideColor
     */
    public function testColor($input, $expected = null)
    {
        $this->testDataProvider($input, $expected);
    }

    public function provideColor()
    {
        return array(
            'input color' => array(
                '<input type="color" name="foo" value="#ff0000">',
            ),
            'input color empty value' => array(
                '<input type="color" name="foo" value="">',
            ),
            'input color no value' => array(
                '<input type="color" name="foo" value="">',
            ),

            'input color invalid value 1' => array(
                '<input type="color" name="foo" value="foo">',
                '<input type="color" name="foo">',
            ),
            'input color invalid value 2' => array(
                '<input type="color" name="foo" value="#f00">',
                '<input type="color" name="foo" value="#ff0000">',
            ),
            'input color invalid value 3' => array(
                '<input type="color" name="foo" value="#ff000000">',
                '<input type="color" name="foo">',
            ),

            'input color valid attributes' => array(
                '<input type="color" disabled inputmode="text">',
            ),
            'input color invalid attributes' => array(
                '<input type="color" accept="text/plain" alt="foo" checked dirname="foo.dir" height="10" max="10" maxlength="64" min="0" minlength="0" multiple pattern="[a-z]+" placeholder="foo" readonly required size="10" src="foo.png" step="1" width="10">',
                '<input type="color">',
            ),
        );
    }

    public function testDate()
    {}

    public function testDatetimeLocal()
    {}

    /**
     * @param string $input
     * @param string $expected OPTIONAL
     * @dataProvider provideEmail
     */
    public function testEmail($input, $expected = null)
    {
        $this->testDataProvider($input, $expected);
    }

    public function provideEmail()
    {
        return array(
            'input email empty value' => array(
                '<input type="email" value="">',
            ),
            'input email single value' => array(
                '<input type="email" value="foo@example.com">',
            ),
            'input email multiple values' => array(
                '<input type="email" value="foo@example.com, bar@example.com" multiple>',
                '<input type="email" value="foo@example.com,bar@example.com" multiple>',
            ),

            'input email invalid value' => array(
                '<input type="email" value="foo">',
                '<input type="email">',
            ),
            'input email invalid multiple values' => array(
                '<input type="email" value="foo,bar@example.com,baz" multiple>',
                '<input type="email" value="bar@example.com" multiple>',
            ),

            'input email valid attributes' => array(
                '<input type="email" disabled inputmode="email" maxlength="64" minlength="0" multiple name="email" pattern="[a-z]+@example\.com" placeholder="foo" readonly required size="10">',
            ),
            'input email invalid attributes' => array(
                '<input type="email" accept="text/plain" alt="email" checked dirname="foo.dir" height="10" max="10" min="0" src="foo.png" step="1" width="10">',
                '<input type="email">',
            ),
        );
    }

    public function testFile()
    {}

    public function testHidden()
    {}

    public function testImage()
    {}

    public function testMonth()
    {}

    public function testNumber()
    {}

    public function testPassword()
    {}

    public function testRadio()
    {}

    public function testRange()
    {}

    /**
     * @param string $input
     * @param string $expected OPTIONAL
     * @dataProvider provideReset
     */
    public function testReset($input, $expected = null)
    {
        $this->testDataProvider($input, $expected);
    }

    public function provideReset()
    {
        return array(
            'input reset' => array(
                '<input type="reset" name="foo" value="foo">',
            ),
            'input reset empty value' => array(
                '<input type="reset" name="foo" value="">',
            ),
            'input reset valid attributes' => array(
                '<input type="reset" disabled inputmode="text">',
            ),
            'input reset invalid attributes' => array(
                '<input type="reset" accept="text/plain" alt="foo" checked dirname="foo.dir" height="10" max="10" maxlength="64" min="0" minlength="0" multiple pattern="[a-z]+" placeholder="foo" readonly required size="10" src="foo.png" step="1" width="10">',
                '<input type="reset">',
            ),
        );
    }

    public function testSearch()
    {}

    /**
     * @param string $input
     * @param string $expected OPTIONAL
     * @dataProvider provideSubmit
     */
    public function testSubmit($input, $expected = null)
    {
        $this->testDataProvider($input, $expected);
    }

    public function provideSubmit()
    {
        return array(
            'input submit' => array(
                '<input type="submit" name="foo" value="foo">',
            ),
            'input submit empty value' => array(
                '<input type="submit" name="foo" value="">',
            ),
            'input submit valid attributes' => array(
                '<input type="submit" disabled inputmode="text">',
            ),
            'input submit invalid attributes' => array(
                '<input type="submit" accept="text/plain" alt="foo" checked dirname="foo.dir" height="10" max="10" maxlength="64" min="0" minlength="0" multiple pattern="[a-z]+" placeholder="foo" readonly required size="10" src="foo.png" step="1" width="10">',
                '<input type="submit">',
            ),
        );
    }

    public function testTel()
    {}

    public function testText()
    {}

    public function testTime()
    {}

    /**
     * @param string $input
     * @param string $expected OPTIONAL
     * @dataProvider provideUrl
     */
    public function testUrl($input, $expected = null)
    {
        $this->testDataProvider($input, $expected);
    }

    public function provideUrl()
    {
        return array(
            'input url empty value' => array(
                '<input type="url" value="">',
            ),
            'input url absolute uri' => array(
                '<input type="url" value="https://foo-bar.com/file.txt">',
            ),
            'input url relative uri' => array(
                '<input type="url" value="file.txt">',
                '<input type="url">',
            ),

            'input url valid attributes' => array(
                '<input type="url" disabled inputmode="url" maxlength="64" minlength="0" name="url" pattern="http://.*" placeholder="foo" readonly required size="10">',
            ),
            'input url invalid attributes' => array(
                '<input type="url" accept="text/plain" alt="foo" checked dirname="foo.dir" height="10" max="10" min="0" multiple src="foo.png" step="1" width="10">',
                '<input type="url">',
            ),
        );
    }

    public function testWeek()
    {}
}
