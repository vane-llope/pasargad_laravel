@props(['description', 'inputName'])

<div class="container">
    <div class="bg-white my-5 border rounded-3">
        <div class="toolbar p-3 bg-light rounded-3 border-bottom">
            <div class="head d-flex flex-wrap mb-4">
                <select class="me-2" onchange="formatDoc('formatBlock', this.value, '{{ $inputName }}'); this.selectedIndex=0;">
                    <option value="" selected="" hidden="" disabled="">{{__('messages.format')}}</option>
                    <option value="h1">Heading 1</option>
                    <option value="h2">Heading 2</option>
                    <option value="h3">Heading 3</option>
                    <option value="h4">Heading 4</option>
                    <option value="h5">Heading 5</option>
                    <option value="h6">Heading 6</option>
                    <option value="p">Paragraph</option>
                </select>
                <select class="me-2" onchange="formatDoc('fontSize', this.value, '{{ $inputName }}'); this.selectedIndex=0;">
                    <option value="" selected="" hidden="" disabled="">{{__('messages.fontSize')}}</option>
                    <option value="1">{{__('messages.extraSmall')}}</option>
                    <option value="2">{{__('messages.small')}}</option>
                    <option value="3">{{__('messages.regular')}}</option>
                    <option value="4">{{__('messages.medium')}}</option>
                    <option value="5">{{__('messages.large')}}</option>
                    <option value="6">{{__('messages.extraLarge')}}</option>
                    <option value="7">{{__('messages.big')}}</option>
                </select>
            </div>
            <div class="btn-toolbar">
                <button type="button" onclick="formatDoc('undo', null, '{{ $inputName }}')"><i class='bx bx-undo'></i></button>
                <button type="button" onclick="formatDoc('redo', null, '{{ $inputName }}')"><i class='bx bx-redo'></i></button>
                <button type="button" onclick="formatDoc('bold', null, '{{ $inputName }}')"><i class='bx bx-bold'></i></button>
                <button type="button" onclick="formatDoc('underline', null, '{{ $inputName }}')"><i class='bx bx-underline'></i></button>
                <button type="button" onclick="formatDoc('italic', null, '{{ $inputName }}')"><i class='bx bx-italic'></i></button>
                <button type="button" onclick="formatDoc('strikeThrough', null, '{{ $inputName }}')"><i class='bx bx-strikethrough'></i></button>
                <button type="button" onclick="formatDoc('justifyLeft', null, '{{ $inputName }}')"><i class='bx bx-align-left'></i></button>
                <button type="button" onclick="formatDoc('justifyCenter', null, '{{ $inputName }}')"><i class='bx bx-align-middle'></i></button>
                <button type="button" onclick="formatDoc('justifyRight', null, '{{ $inputName }}')"><i class='bx bx-align-right'></i></button>
                <button type="button" onclick="formatDoc('justifyFull', null, '{{ $inputName }}')"><i class='bx bx-align-justify'></i></button>
                <button type="button" onclick="formatDoc('insertOrderedList', null, '{{ $inputName }}')"><i class='bx bx-list-ol'></i></button>
                <button type="button" onclick="formatDoc('insertUnorderedList', null, '{{ $inputName }}')"><i class='bx bx-list-ul'></i></button>
                <button type="button" onclick="addLink('{{ $inputName }}')"><i class='bx bx-link'></i></button>
                <button type="button" onclick="formatDoc('unlink', null, '{{ $inputName }}')"><i class='bx bx-unlink'></i></button>
                <button type="button" id="show-code-{{ $inputName }}" data-active="false" onclick="toggleCode('{{ $inputName }}')">&lt;/&gt;</button>
            </div>
        </div>
        <div id="{{ $inputName }}" class="p-4 content" contenteditable="true" spellcheck="false"></div>
    </div>
    <input type="hidden" name="{{$inputName}}" id="hidden-description-{{ $inputName }}" value="{{ $description }}">
    @error('{{$inputName}}') 
    <p class="text-danger">{{ $messages }}</p> 
    @enderror
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const content = document.getElementById('{{ $inputName }}');
        const hiddenDescription = document.getElementById('hidden-description-{{ $inputName }}');

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
            console.log('Content on submit ({{ $inputName }}):', content.innerHTML);
        });
    });

    function formatDoc(cmd, value = null, inputName) {
        const content = document.getElementById(inputName);
        content.focus();
        if (value) {
            document.execCommand(cmd, false, value);
        } else {
            document.execCommand(cmd);
        }
    }

    function addLink(inputName) {
        const content = document.getElementById(inputName);
        content.focus();
        const url = prompt('Insert url');
        formatDoc('createLink', url, inputName);
    }

    function toggleCode(inputName) {
        const content = document.getElementById(inputName);
        const showCode = document.getElementById('show-code-' + inputName);
        let active = showCode.dataset.active === "true";
        showCode.dataset.active = !active;
        active = !active;
        if (active) {
            content.textContent = content.innerHTML;
            content.setAttribute('contenteditable', false);
        } else {
            content.innerHTML = content.textContent;
            content.setAttribute('contenteditable', true);
        }
    }
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

.content {
    outline: none;
    min-height: 50vh;
    overflow: auto;
}

#show-code[data-active="true"] {
    background: #eee;
}
</style>
