<?php

namespace Fisharebest\Localization\Script;

/**
 * Class ScriptSogd - Representation of the Sogdian script.
 *
 * @author    Greg Roach <greg@subaqua.co.uk>
 * @copyright (c) 2022 Greg Roach
 * @license   GPL-3.0-or-later
 */
class ScriptSogd extends AbstractScript implements ScriptInterface
{
    public function code()
    {
        return 'Sogd';
    }

    public function number()
    {
        return '141';
    }

    public function unicodeName()
    {
        return 'Sogdian';
    }
}
