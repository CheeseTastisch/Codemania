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
import {addScopeToNode} from "alpinejs/src/scope";

function addWysiwygEditor(element) {
    const elementId = element.id
    const textarea = document.querySelector(`#${elementId}-textarea`)

    const editor = new FroalaEditor(`#${elementId}`, {
        language: 'de',
        height: 220,
        events: {
            contentChanged: function() {
                if (textarea !== undefined) {
                    textarea.value = editor.html.get()
                    textarea.dispatchEvent(new Event('input'))
                }
            }
        }
    }, function () {
        if (textarea !== undefined) editor.html.set(textarea.value)

        element.dispatchEvent(new Event('froala-loaded'))
    })
}

document.addEventListener('DOMContentLoaded', function() {
    document.querySelectorAll('.html-editor').forEach(function(element) {
        if (element.classList.contains('fr-box')) return

        addWysiwygEditor(element)
    });

    onDomChange(function(list) {
        for (const mutation of list) {
            for (const added of mutation.addedNodes) {
                if (!(added instanceof Element)) continue

                const nodes = [added, ...added.querySelectorAll('*')]

                for (const node of nodes) {
                    if (node.classList !== undefined && node.classList.contains('html-editor') && !node.classList.contains('fr-box'))
                        addWysiwygEditor(node)
                }
            }
        }
    });
})
