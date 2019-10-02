function resize()
{
    let navbar = document.getElementById("navbar");
    let demo = document.getElementById("demo");
    let newHeight = window.innerHeight - navbar.clientHeight;

    demo.setAttribute("style", "height: " + newHeight + "px;");
}

resize();
window.addEventListener('resize', resize, true);
