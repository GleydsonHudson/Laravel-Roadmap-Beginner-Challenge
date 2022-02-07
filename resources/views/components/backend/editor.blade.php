<div x-data="editor('<p>This is where the content goes</p>')">
    <div class="editor-menu-fixed">
        <button
            @click="toggleBold()"
            :class="{ 'is-active' : isActive('bold', updatedAt) }"
        >
            Bold
        </button>
        <button
            @click="toggleHeading(1)"
            :class="{ 'is-active' : isActive('heading', { level: 1 }, updatedAt) }"
        >
            H1
        </button>
        <button
            @click="toggleHeading(2)"
            :class="{ 'is-active' : isActive('heading', { level: 2 }, updatedAt) }"
        >
            H2
        </button>
        <button
            @click="toggleHeading(3)"
            :class="{ 'is-active' : isActive('heading', { level: 3 }, updatedAt) }"
        >
            H3
        </button>
    </div>

    <div x-ref="editorReference"></div>
</div>

<style>
    .ProseMirror {
        padding: 0.5rem 1rem;
        margin: 1rem 0;
        border: 1px solid #ccc;
    }
</style>
