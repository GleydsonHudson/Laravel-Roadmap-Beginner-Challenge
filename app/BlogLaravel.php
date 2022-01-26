<?php

namespace App;


use Prophecy\Doubler\Generator\Node\ReturnTypeNode;

class BlogLaravel {

    /**
     * Return a valid host URL or null.
     *
     * @param  string|null  $url
     * @return string|null
     */
    public static function parseReferer(?string $url): ?string
    {
        if(filter_var($url, FILTER_VALIDATE_URL))
        {
            return parse_url($url)['host'];
        }

        return null;
    }
}
