<?php

namespace CODE4FUN\Admin\Form\Field;

use CODE4FUN\Admin\Form\Field;

class Text extends Field
{
    use PlainInput;

    /**
     * Render this filed.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function render()
    {
        $this->initPlainInput();

        $this->prepend('<i class="fa fa-pencil"></i>')
            ->defaultAttribute('type', 'text')
            ->defaultAttribute('id', $this->id)
            ->defaultAttribute('name', $this->elementName ?: $this->formatName($this->column))
            ->defaultAttribute('value', old($this->column, $this->value()))
            ->defaultAttribute('class', 'form-control '.$this->getElementClassString())
            ->defaultAttribute('placeholder', $this->getPlaceholder());

        $this->script = <<<EOT

        $('#title').change(function() {

    $.ajax({
        method: 'post',
        url: '/admin/api/slug',
        beforeSend: function (xhr) {
            var token = $('input[name="_token"]').val();

            if (token) {
              return xhr.setRequestHeader('X-CSRF-TOKEN', token);
            }
        },
        data: {
            post_name: $("#title").val(),
        },
        success: function (data) {

            var slug = $('input[name="slug"]');

            if (data.message == 0) {
                $('#title').css('border-color', '#d2d6de');
                $('span.error').remove();
                slug.attr('value', data.post_name);
                $('button[type="submit"]').prop('disabled', false);
            } else {
                $('#title').css('border-color', 'red');
                $("#title").focus();
                $("#title").before('<span class="label label-danger error" style="position:absolute;top: -23px;">Already Exist!</span>');
                $('button[type="submit"]').prop('disabled', true);
            }


        }
    });
});

EOT;

        return parent::render()->with([
            'prepend' => $this->prepend,
            'append'  => $this->append,
        ]);
    }
}
