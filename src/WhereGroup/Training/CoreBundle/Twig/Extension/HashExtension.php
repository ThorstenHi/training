<?php

namespace WhereGroup\Training\CoreBundle\Twig\Extension;

class HashExtension extends \Twig_Extension
{
    public function getFilters()
    {
        return array(
            'hash' => new \Twig_Filter_Method($this, 'hash')
        );
    }

    public function getName()
    {
        return 'hash_extension';
    }


    public function hash($var)
    {
        return md5($var);
    }
}
