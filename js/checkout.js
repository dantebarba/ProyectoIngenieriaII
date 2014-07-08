function getTemplate(temp, data)
{
    
    $.get(
             temp,
             function(d){
                     var renderedPage = Mustache.to_html( temp, data);
                     $("#stepiFrame").html(renderedPage);
                 }
     );
}

function nextStep(e) {
    e.preventDefault();
        var $target = $($(this).closest('li a').attr('href')),
            $item = $(this).closest('li .active');
            $item.closest('li .active').removeClass('active');
            $("target").addClass('active');
            getTemplate('checkout_1.html', []);
        }
    
}

function resetSteps() {}


$(document).ready(function() {
    
    getTemplate('checkout_1.html', []);
    var navListItems = $('ul.setup-panel li a');
    $("#nextStep").on("click", nextStep);
 });