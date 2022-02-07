require('./bootstrap');

import Alpine from 'alpinejs';
import {Editor} from '@tiptap/core'
import StarterKit from '@tiptap/starter-kit'

// Tiptap editor on alpine init
document.addEventListener("alpine:init", () => {
    Alpine.data("editor", (content) => {
        let editor;

        return {
            // Passing updatedAt here to make Alpine
            // rerender the menu buttons.
            //
            // The value of updatedAt will be updated
            // on every Tiptap transaction.
            //
            isActive(type, opts = {}, updatedAt) {
                return editor.isActive(type, opts);
            },
            toggleBold() {
                editor.chain().toggleBold().focus().run();
            },
            toggleHeading(level) {
                editor.chain().toggleHeading({level: level}).focus().run();
            },
            updatedAt: Date.now(),
            init() {
                const _this = this;

                editor = new Editor({
                    element: this.$refs.editorReference,
                    extensions: [StarterKit],
                    content: content,
                    onCreate({editor}) {
                        _this.updatedAt = Date.now();
                    },
                    onUpdate({editor}) {
                        _this.updatedAt = Date.now();
                    },
                    onSelectionUpdate({editor}) {
                        _this.updatedAt = Date.now();
                    },
                    onTransaction: () => {
                        this.updatedAt = Date.now()
                    },
                });
            }
        };
    });
});


window.Alpine = Alpine;

Alpine.start();
