
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
//set diraction
document.addEventListener('DOMContentLoaded', function ()
{
    var direction = localStorage.getItem('direction');
    if (direction)
    {
        document.documentElement.setAttribute('dir', direction);
    }
});

function setDirection(direction)
{
    document.documentElement.setAttribute('dir', direction);
    localStorage.setItem('direction', direction);
}

//setDirectionTemperary
function setDirectionTemperary(direction, element)
{
    document.documentElement.setAttribute('dir', direction);

    // Reset styles for all links
    const links = document.querySelectorAll('.nav-link');
    links.forEach(link =>
    {
        link.style.color = ''; // Reset color
        link.style.fontSize = ''; // Reset size
    });

    // Change style of the clicked link
    element.style.color = 'black'; // Set the active link to black
}

/**
  * Animation on scroll function and init
  */
function aosInit()
{
    AOS.init({
        duration: 500,
        easing: 'ease-in-out',
        once: true,
        mirror: false
    });
}
window.addEventListener('load', aosInit);
