import 'froala-editor/css/froala_editor.min.css'
import 'froala-editor/css/froala_style.min.css'
import 'froala-editor/css/plugins/code_view.min.css'

import FroalaEditor from 'froala-editor/js/froala_editor.min'
import 'froala-editor/js/plugins/align.min'
import 'froala-editor/js/plugins/code_view.min'
import 'froala-editor/js/plugins/entities.min'
import 'froala-editor/js/plugins/font_size.min'
import 'froala-editor/js/plugins/inline_class.min'
import 'froala-editor/js/plugins/link.min'
import 'froala-editor/js/plugins/lists.min'
import 'froala-editor/js/plugins/paragraph_format.min'
import 'froala-editor/js/plugins/special_characters.min'
import 'froala-editor/js/plugins/url.min'

import 'froala-editor/js/languages/de'

const callbacks = {
    onHtmlEditorLoaded: [],
}

window.onHtmlEditorLoaded = (callback) => callbacks.onHtmlEditorLoaded.push(callback)

document.addEventListener('DOMContentLoaded', function() {
    let required = 0
    let loaded = 0

    $('.html-editor').each(function() {
        if ($(this).hasClass('fr-box')) return

        required++
        const elementId = $(this).attr('id')
        const textarea = document.querySelector(`#${elementId}-textarea`)
        const jTextarea = $(textarea)

        const editor = new FroalaEditor(`#${elementId}`, {
            language: 'de',
            height: 220,
            inlineClasses:  {
                'text-accent-400': 'Accent',
            },
            events: {
                contentChanged: function() {
                    if (textarea !== undefined) {
                        jTextarea.val(editor.html.get())
                        textarea.dispatchEvent(new Event('input'))
                    }
                }
            }
        }, function () {
            loaded++
            if (loaded === required) callbacks.onHtmlEditorLoaded.forEach(callback => callback())
            if (textarea !== undefined) editor.html.set(jTextarea.val())
        })
    })
})

