import 'froala-editor/css/froala_editor.min.css'
import 'froala-editor/css/froala_style.min.css'
import 'froala-editor/css/plugins/code_view.min.css'

import FroalaEditor from 'froala-editor/js/froala_editor.min'
import 'froala-editor/js/plugins/align.min'
import 'froala-editor/js/plugins/code_view.min'
import 'froala-editor/js/plugins/entities.min'
import 'froala-editor/js/plugins/font_size.min'
import 'froala-editor/js/plugins/link.min'
import 'froala-editor/js/plugins/lists.min'
import 'froala-editor/js/plugins/paragraph_format.min'
import 'froala-editor/js/plugins/special_characters.min'
import 'froala-editor/js/plugins/url.min'

import 'froala-editor/js/languages/de'

function addWysiwygEditor(element) {
    const elementId = element.attr('id')
    const textarea = document.querySelector(`#${elementId}-textarea`)
    const jTextarea = $(textarea)

    const accordionContainer = element.data('accordion-container')
    const accordionTarget = element.data('accordion-target')

    const editor = new FroalaEditor(`#${elementId}`, {
        language: 'de',
        height: 220,
        events: {
            contentChanged: function() {
                if (textarea !== undefined) {
                    jTextarea.val(editor.html.get())
                    textarea.dispatchEvent(new Event('input'))
                }
            }
        }
    }, function () {
        if (textarea !== undefined) editor.html.set(jTextarea.val())
        if (accordionContainer !== undefined && accordionTarget !== undefined) {
            Livewire.emit('accordion', 'updateSize', accordionContainer, accordionTarget)
        }
    })
}

document.addEventListener('DOMContentLoaded', function() {
    $('.html-editor').each(function() {
        if ($(this).hasClass('fr-box')) return

        addWysiwygEditor($(this))
    })
})

Livewire.on('addHtmlEditor', (id) => {
    addWysiwygEditor($(`#${id}`))
});

