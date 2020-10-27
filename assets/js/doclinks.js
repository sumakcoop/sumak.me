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

'use strict';

// Wraps some elements in anchor tags referencing to the Symfony documentation
$(function() {
    var $modal = $('#sourceCodeModal');
    var $controllerCode = $modal.find('code.php');
    var $templateCode = $modal.find('code.twig');

    function anchor(url, content) {
        return '<a class="doclink" target="_blank" href="' + url + '">' + content + '</a>';
    };

    // Wraps links to the Symfony documentation
    $modal.find('.hljs-comment').each(function() {
        $(this).html($(this).html().replace(/https:\/\/symfony.com\/doc\/[\w/.#-]+/g, function(url) {
            return anchor(url, url);
        }));
    });

    // Wraps Symfony's annotations
    var annotations = {
        '@Cache': 'https://symfony.com/doc/current/bundles/SensioFrameworkExtraBundle/annotations/cache.html',
        '@IsGranted': 'https://symfony.com/doc/current/bundles/SensioFrameworkExtraBundle/annotations/security.html#isgranted',
        '@ParamConverter': 'https://symfony.com/doc/current/bundles/SensioFrameworkExtraBundle/annotations/converters.html',
        '@Route': 'https://symfony.com/doc/current/routing.html#creating-routes-as-annotations',
        '@Security': 'https://symfony.com/doc/current/bundles/SensioFrameworkExtraBundle/annotations/security.html#security'
    };

    $controllerCode.find('.hljs-doctag').each(function() {
        var annotation = $(this).text();

        if (annotations[annotation]) {
            $(this).html(anchor(annotations[annotation], annotation));
        }
    });

    // Wraps Twig's tags
    $templateCode.find('.hljs-template-tag > .hljs-name').each(function() {
        var tag = $(this).text();

        if ('else' === tag || tag.match(/^end/)) {
            return;
        }

        var url = 'https://twig.symfony.com/doc/3.x/tags/' + tag + '.html#' + tag;

        $(this).html(anchor(url, tag));
    });

    // Wraps Twig's functions
    $templateCode.find('.hljs-template-variable > .hljs-name').each(function() {
        var func = $(this).text();

        var url = 'https://twig.symfony.com/doc/3.x/functions/' + func + '.html#' + func;

        $(this).html(anchor(url, func));
    });
});
