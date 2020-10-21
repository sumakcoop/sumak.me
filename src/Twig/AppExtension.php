<?php
// This file is part of Sumak.me
// Copyright (C) 2020 Asociación SUMAK <info (at) sumakcoop (dot) org
// 
// Sumak.me is free software: you can redistribute it and/or modify
// it under the terms of the GNU Affero General Public License as
// published by the Free Software Foundation, either version 3 of the
// License, or (at your option) any later version.
// 
// Sumak.me is distributed in the hope that it will be useful,
// but WITHOUT ANY WARRANTY; without even the implied warranty of
// MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
// GNU Affero General Public License for more details.
// 
// You should have received a copy of the GNU Affero General Public License
// along with Sumak.me.  If not, see <http://www.gnu.org/licenses/>.

namespace App\Twig;

use Symfony\Component\Intl\Locales;
use Twig\Extension\AbstractExtension;
use Twig\TwigFunction;

/**
 * See https://symfony.com/doc/current/templating/twig_extension.html.
 *
 * @author Ryan Weaver <weaverryan@gmail.com>
 * @author Javier Eguiluz <javier.eguiluz@gmail.com>
 * @author Julien ITARD <julienitard@gmail.com>
 */
class AppExtension extends AbstractExtension
{
    private $localeCodes;
    private $locales;

    public function __construct(string $locales)
    {
        $localeCodes = explode('|', $locales);
        sort($localeCodes);
        $this->localeCodes = $localeCodes;
    }

    /**
     * {@inheritdoc}
     */
    public function getFunctions(): array
    {
        return [
            new TwigFunction('locales', [$this, 'getLocales']),
        ];
    }

    /**
     * Takes the list of codes of the locales (languages) enabled in the
     * application and returns an array with the name of each locale written
     * in its own language (e.g. English, Français, Español, etc.).
     */
    public function getLocales(): array
    {
        if (null !== $this->locales) {
            return $this->locales;
        }

        $this->locales = [];
        foreach ($this->localeCodes as $localeCode) {
            $this->locales[] = ['code' => $localeCode, 'name' => Locales::getName($localeCode, $localeCode)];
        }

        return $this->locales;
    }
}
