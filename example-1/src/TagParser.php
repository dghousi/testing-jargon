<?php

namespace App;

class TagParser
{
    public function parse($tags) : array
    {
        // this only ignore one space or none space
        // like 'personal, work, family' or 'personal work family' or 'personal,work,family' 
        // return preg_split('/ ?[,|:] ?/', $tags);

        // this ignore multiple space or none space
        // like 'personal, work, family' or 'personal work family' or 'personal,work,family' 
        return preg_split('/\s*[,\|:]\s*/', $tags);
    }
}