
//new line saving
function saveAndDisplayText()
{
    const textareas = document.querySelectorAll('.myTextarea');
    let savedText = "";
    textareas.forEach(textarea =>
    {
        savedText += textarea.value + "\n";
    });
    displayText(savedText);
}

function displayText(text)
{
    const displayElement = document.getElementById('displayText');
    displayElement.innerHTML = text.replace(/\n/g, '<br>'); // Replace line breaks with <br> tags
}

document.querySelectorAll('.myTextarea').forEach(textarea =>
{
    textarea.addEventListener('keypress', function (event)
    {
        if (event.key === 'Enter')
        {
            event.preventDefault();
            saveAndDisplayText();
        }
    });
});
