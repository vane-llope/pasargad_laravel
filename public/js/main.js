// Save and display text with new line saving
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

// Set page direction on load
document.addEventListener('DOMContentLoaded', function ()
{
    var direction = localStorage.getItem('direction');
    if (direction)
    {
        document.documentElement.setAttribute('dir', direction);
        updateDropdownDirection(direction);
    }
});

// Set and save direction
function setDirection(direction)
{
    document.documentElement.setAttribute('dir', direction);
    localStorage.setItem('direction', direction);
    updateDropdownDirection(direction);
}

// Temporarily set direction for testing or dynamic changes
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

// Update dropdown direction based on page direction
function updateDropdownDirection(direction)
{
    const dropdownMenus = document.querySelectorAll('.dropdown-menu');
    dropdownMenus.forEach(menu =>
    {
        if (direction === 'rtl')
        {
            menu.style.textAlign = 'right';
            menu.style.left = 'auto';
            menu.style.right = '0';
        } else if (direction === 'ltr')
        {
            menu.style.textAlign = 'left';
            menu.style.right = 'auto';
            menu.style.left = '0';
        }
    });
}

/**
 * Animation on scroll function and init
 */
document.addEventListener('DOMContentLoaded', function ()
{
    // Show the loader
    document.getElementById('loader').style.display = 'block';

    // Initialize AOS (Animation on Scroll)
    AOS.init({
        duration: 500,
        easing: 'ease-in-out',
        once: true,
        mirror: false
    });

    // Hide the loader when everything is loaded
    window.addEventListener('load', function ()
    {
        document.getElementById('loader').style.display = 'none';
    });
});
