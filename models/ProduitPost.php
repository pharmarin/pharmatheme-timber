<?php

namespace Models;

class ProduitPost extends \Timber\Post
{
    var $_laboratoire;

    public function laboratoire()
    {
        if (!$this->_laboratoire) {
            $this->_laboratoire = $this->get_terms("laboratoire");
        }

        return $this->_laboratoire;
    }
}
