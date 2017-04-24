<?php

namespace Code4fun\Admin\Form\Field;

use Code4fun\Admin\Form\Field;

class Hidden extends Field
{
    /**
     * Render this filed.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function render()
    {
        $this->script = <<<EOT
            var id = 1;
            $('input[name="user_id"]').attr('value', id);
EOT;

        return parent::render();
    }
}
