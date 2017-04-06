<?php
/*
 * Copyright 2016 SPCVN.
 * All right reserved.
*/

/**
 * @Author: Nguyen Chat Hien
 * @Date:   2017-04-02 10:52:09
 * @Last Modified by:   Nguyen Chat Hien
 * @Last Modified time: 2017-04-06 01:15:38
 */

namespace Encore\Admin\Form\Field;

use Encore\Admin\Form;

class Slug extends Text
{
    protected $action;

    public function __construct($action = 1)
    {
        $this->action = $action;
    }

    public function setForm(Form $form = null)
    {
        $this->form = $form;

        $this->form->ignore($this->column);

        return $this;
    }

    public function script()
    {
        return <<<EOT

$('#title').focusout(function() {

    alert('aaaaaaaaaaaa');

    $.ajax({
        method: 'get',
        url: '/api/slug',
        data: {
            _token:'{$this->getToken()}',
            post_name: $("#title").val(),
            // action: {$this->action}
        },
        success: function (data) {
            console.log(data);
            // $.pjax.reload('#pjax-container');
            toastr.success('111111111111');
        }
    });
});

EOT;

    }
}
