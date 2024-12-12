(function ()
{
    "use strict";

    /**
     * Scroll top button
     */
    let scrollTop = document.querySelector('.scroll-top');

    function toggleScrollTop()
    {
        if (scrollTop)
        {
            window.scrollY > 100 ? scrollTop.classList.add('active') : scrollTop.classList.remove('active');
        }
    }
    scrollTop.addEventListener('click', (e) =>
    {
        e.preventDefault();
        window.scrollTo({
            top: 0,
            behavior: 'smooth'
        });
    });

    window.addEventListener('load', toggleScrollTop);
    document.addEventListener('scroll', toggleScrollTop);

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

    function toggleSidebar(event)
    {
        event.stopPropagation(); // Prevent the event from propagating to the wrapper
        var sidebar = document.getElementById('sidebar');
        sidebar.classList.toggle('sidebar-visible');
    }

    function closeSidebar(event)
    {
        if (!event.target.closest('.sidebar') && !event.target.closest('.navbar-toggler'))
        {
            var sidebar = document.getElementById('sidebar');
            sidebar.classList.remove('sidebar-visible');
        }
    }
})();

