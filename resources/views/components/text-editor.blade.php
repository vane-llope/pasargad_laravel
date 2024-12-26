@props(['description'])

<div class="container">
    <div class="bg-white my-5 border rounded-3">
        <div class="toolbar p-3 bg-light rounded-3 border-bottom">
            <div class="head d-flex flex-wrap mb-4">
                <select class="me-2" onchange="formatDoc('formatBlock', this.value); this.selectedIndex=0;">
                    <option value="" selected="" hidden="" disabled="">Format</option>
                    <option value="h1">Heading 1</option>
                    <option value="h2">Heading 2</option>
                    <option value="h3">Heading 3</option>
                    <option value="h4">Heading 4</option>
                    <option value="h5">Heading 5</option>
                    <option value="h6">Heading 6</option>
                    <option value="p">Paragraph</option>
                </select>
                <select class="me-2" onchange="formatDoc('fontSize', this.value); this.selectedIndex=0;">
                    <option value="" selected="" hidden="" disabled="">Font size</option>
                    <option value="1">Extra small</option>
                    <option value="2">Small</option>
                    <option value="3">Regular</option>
                    <option value="4">Medium</option>
                    <option value="5">Large</option>
                    <option value="6">Extra Large</option>
                    <option value="7">Big</option>
                </select>
            </div>
            <div class="btn-toolbar">
                <button type="button" onclick="formatDoc('undo')"><i class='bx bx-undo'></i></button>
                <button type="button" onclick="formatDoc('redo')"><i class='bx bx-redo'></i></button>
                <button type="button" onclick="formatDoc('bold')"><i class='bx bx-bold'></i></button>
                <button type="button" onclick="formatDoc('underline')"><i class='bx bx-underline'></i></button>
                <button type="button" onclick="formatDoc('italic')"><i class='bx bx-italic'></i></button>
                <button type="button" onclick="formatDoc('strikeThrough')"><i class='bx bx-strikethrough'></i></button>
                <button type="button" onclick="formatDoc('justifyLeft')"><i class='bx bx-align-left'></i></button>
                <button type="button" onclick="formatDoc('justifyCenter')"><i class='bx bx-align-middle'></i></button>
                <button type="button" onclick="formatDoc('justifyRight')"><i class='bx bx-align-right'></i></button>
                <button type="button" onclick="formatDoc('justifyFull')"><i class='bx bx-align-justify'></i></button>
                <button type="button" onclick="formatDoc('insertOrderedList')"><i class='bx bx-list-ol'></i></button>
                <button type="button" onclick="formatDoc('insertUnorderedList')"><i class='bx bx-list-ul'></i></button>
                <button type="button" onclick="addLink()"><i class='bx bx-link'></i></button>
                <button type="button" onclick="formatDoc('unlink')"><i class='bx bx-unlink'></i></button>
                <button type="button" id="show-code" data-active="false">&lt;/&gt;</button>
            </div>
        </div>
        <div id="content" contenteditable="true" spellcheck="false"></div>
    </div>
    <input type="hidden" name="description" id="hidden-description" value="{{ $description }}">
    @error('description') 
    <p class="text-danger">{{ $message }}</p> 
    @enderror
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const content = document.getElementById('content');
        const hiddenDescription = document.getElementById('hidden-description');

        // Set content if description is provided
        if (hiddenDescription.value) {
            content.innerHTML = hiddenDescription.value;
        }

        // Log content on input and update hidden field
        content.addEventListener('input', function() {
            hiddenDescription.value = content.innerHTML;
        });

        // Update hidden input before form submission
        document.querySelector('form').addEventListener('submit', function(event) {
            hiddenDescription.value = content.innerHTML;
            console.log('Content on submit:', content.innerHTML);
        });
    });

    function formatDoc(cmd, value = null) {
        if (value) {
            document.execCommand(cmd, false, value);
        } else {
            document.execCommand(cmd);
        }
    }

    function addLink() {
        const url = prompt('Insert url');
        formatDoc('createLink', url);
    }

    const content = document.getElementById('content');

    content.addEventListener('mouseenter', function() {
        const a = content.querySelectorAll('a');
        a.forEach(item => {
            item.addEventListener('mouseenter', function() {
                content.setAttribute('contenteditable', false);
                item.target = '_blank';
            });
            item.addEventListener('mouseleave', function() {
                content.setAttribute('contenteditable', true);
            });
        });
    });

    const showCode = document.getElementById('show-code');
    let active = false;

    showCode.addEventListener('click', function() {
        showCode.dataset.active = !active;
        active = !active;
        if (active) {
            content.textContent = content.innerHTML;
            content.setAttribute('contenteditable', false);
        } else {
            content.innerHTML = content.textContent;
            content.setAttribute('contenteditable', true);
        }
    });
</script>



<style>

.toolbar .head>input {
    max-width: 100px;
    padding: 6px 10px;
    border-radius: 6px;
    border: 2px solid #ddd;
    outline: none;
}

.toolbar .head select {
    background: #fff;
    border: 2px solid #ddd;
    border-radius: 6px;
    outline: none;
    cursor: pointer;
}

.toolbar .head .color {
    background: #fff;
    border: 2px solid #ddd;
    border-radius: 6px;
    outline: none;
    cursor: pointer;
    display: flex;
    align-items: center;
    grid-gap: 6px;
    padding: 0 10px;
}

.toolbar .head .color span {
    font-size: 14px;
}

.toolbar .head .color input {
    border: none;
    padding: 0;
    width: 26px;
    height: 26px;
    background: #fff;
    cursor: pointer;
}

.toolbar .head .color input::-moz-color-swatch {
    width: 20px;
    height: 20px;
    border: none;
    border-radius: 50%;
}

.toolbar .btn-toolbar {
    display: flex;
    flex-wrap: wrap;
    align-items: center;
    grid-gap: 10px;
}

.toolbar .btn-toolbar button {
    background: #fff;
    border: 2px solid #ddd;
    border-radius: 6px;
    cursor: pointer;
    width: 40px;
    height: 40px;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 18px;
}

.toolbar .btn-toolbar button:hover {
    background: #f3f3f3;
}

#content {
    padding: 16px;
    outline: none;
    min-height: 50vh;
    overflow: auto;
}

#show-code[data-active="true"] {
    background: #eee;
}
</style>
