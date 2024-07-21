<?php

namespace Fisharebest\Localization\Locale;

use Fisharebest\Localization\Language\LanguageDv;

/**
 * Class LocaleDv - Divehi
 *
 * @author    Greg Roach <greg@subaqua.co.uk>
 * @copyright (c) 2022 Greg Roach
 * @license   GPL-3.0-or-later
 */
class LocaleDv extends AbstractLocale implements LocaleInterface
{
    public function endonym()
    {
        return 'ތާނަ';
    }

    public function language()
    {
        return new LanguageDv();
    }
}
