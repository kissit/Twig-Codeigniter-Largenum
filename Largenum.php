<?php defined('BASEPATH') OR exit('No direct script access allowed');
/*
 * Largenum.php
 *
 * A simple filter for Twig/Codeigniter to format a number with a textual suffix 
 * based on size.
 *
 * Requires: https://github.com/bmatschullat/Twig-Codeigniter
 * 
 * See the readme for usage: https://github.com/kissit/Twig-Codeigniter-Largenum/blob/master/README.md
 *
 * Copyright (C) 2016 KISS IT Consulting <http://www.kissitconsulting.com/>
 * Redistribution and use in source and binary forms, with or without
 * modification, are permitted provided that the following conditions
 * are met:
 * 
 * 1. Redistributions of source code must retain the above copyright
 *    notice, this list of conditions and the following disclaimer.
 * 2. Redistributions in binary form must reproduce the above
 *    copyright notice, this list of conditions and the following
 *    disclaimer in the documentation and/or other materials
 *    provided with the distribution.
 * 
 * THIS SOFTWARE IS PROVIDED BY THE COPYRIGHT HOLDERS AND CONTRIBUTORS
 * "AS IS" AND ANY EXPRESS OR IMPLIED WARRANTIES, INCLUDING, BUT NOT
 * LIMITED TO, THE IMPLIED WARRANTIES OF MERCHANTABILITY AND FITNESS FOR
 * A PARTICULAR PURPOSE ARE DISCLAIMED.  IN NO EVENT SHALL ANY
 * CONTRIBUTORS BE LIABLE FOR ANY DIRECT, INDIRECT, INCIDENTAL, SPECIAL,
 * EXEMPLARY, OR CONSEQUENTIAL DAMAGES (INCLUDING, BUT NOT LIMITED TO,
 * PROCUREMENT OF SUBSTITUTE GOODS OR SERVICES; LOSS OF USE, DATA, OR
 * PROFITS; OR BUSINESS INTERRUPTION) HOWEVER CAUSED AND ON ANY THEORY
 * OF LIABILITY, WHETHER IN CONTRACT, STRICT LIABILITY, OR TORT (INCLUDING
 * NEGLIGENCE OR OTHERWISE) ARISING IN ANY WAY OUT OF THE USE OF THIS
 * SOFTWARE, EVEN IF ADVISED OF THE POSSIBILITY OF SUCH DAMAGE.
*/
class Twig_Extensions_Extension_Largenum extends Twig_Extension {
       
    public function getFilters() {
        return array(
            new Twig_SimpleFilter('largenum_format', 'twig_largenum_format_filter'),
        );
    }

    public function getName() {
        return 'Largenum';
    }
}

function twig_largenum_format_filter($value) {
    if($value >= 1000000) {
        return round($value / 1000000, 1) . " M";
    } elseif($value >= 1000) {
        return round($value / 1000, 1) . " K";
    } else {
        return number_format(round($value, 1), 1);
    }
}
