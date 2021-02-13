<?php

namespace Models;

class AromatherapiePost extends \Timber\Post
{
    var $_nom_latin;

    var $precautions_he = [
        "Ne pas appliquer près des yeux, des oreilles et du nez (sauf indication spécifique)",
        'Ne pas diffuser en continu, ni en présence d\'un jeune enfant',
        "Ne pas laisser à la portée des enfants",
        'Ne pas utiliser chez l\'enfant de moins de 7 ans sans avis médical',
        "Ne pas utiliser chez la femme enceinte ou allaitante",
        "Ne pas utiliser chez les personnes âgées sans avis médical",
        'Ne pas utiliser en cas d\'épilepsie, d\'allergie aux molécules aromatiques',
        "Ne pas utiliser en continu",
        "Ne pas utiliser plus de 2 ou 3 huiles essentielles en même temps",
        "Ne pas utiliser une huile essentielle pure, sauf mention contraire",
        'Se laver les mains à l\'eau et au savon après application',
    ];

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
