var distance = $('#divPagar').offset().top; 

$(window).scroll(function ()
{
    if ($(window).scrollTop() >= distance)
    {
        $('#divPagar').addClass("affix");
    } 
    else
    {
        $('#divPagar').removeClass("affix");
    }
});