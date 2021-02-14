<?php

namespace Models;

class PhytotherapiePost extends \Timber\Post
{
    var $_nom_latin;

    public function nom_latin()
    {
        if (!$this->_nom_latin) {
            $parsed_content = parse_blocks($this->post_content);

            $identite = array_filter($parsed_content, function ($block) {
                return $block["blockName"] === "lazyblock/identite";
            });

            if (count($identite) > 0) {
                $this->_nom_latin = $identite[0]["attrs"]["nom_latin"];
            }
        }

        return $this->_nom_latin;
    }
}
