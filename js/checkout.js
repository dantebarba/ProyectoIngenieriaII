function newTable(elementData, indexes) {
    var data = '';
    for (j=0; j < elementData.length; j++) {
        data += '<tr>';
        for (i=0; i < indexes.length; i++) {
            data += '<td>'+elementData[j][indexes[i]]+'</td>';
        }
        data += '</tr>';
    }
    return data;
}
 
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

function nextStep(e, target) {
        e.preventDefault();
        alert($(target).closest('li a .active').attr('href'));
        var $target = $($(target).closest('li a').attr('href')),
            $item = $target.closest('li .active');
            $item.closest('li .active').removeClass('active');
            $target.addClass('active');
        }




