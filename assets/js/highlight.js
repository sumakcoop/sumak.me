/*
* This file is part of Sumak.me
* Copyright (C) 2020 Asociación SUMAK <info (at) sumakcoop (dot) org
* 
* Sumak.me is free software: you can redistribute it and/or modify
* it under the terms of the GNU Affero General Public License as
* published by the Free Software Foundation, either version 3 of the
* License, or (at your option) any later version.
* 
* Sumak.me is distributed in the hope that it will be useful,
* but WITHOUT ANY WARRANTY; without even the implied warranty of
* MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
* GNU Affero General Public License for more details.
* 
* You should have received a copy of the GNU Affero General Public License
* along with Sumak.me.  If not, see <http://www.gnu.org/licenses/>.
*/

import hljs from 'highlight.js/lib/highlight';
import php from 'highlight.js/lib/languages/php';
import twig from 'highlight.js/lib/languages/twig';

hljs.registerLanguage('php', php);
hljs.registerLanguage('twig', twig);

hljs.initHighlightingOnLoad();
