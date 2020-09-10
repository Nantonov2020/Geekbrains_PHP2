$(document).on('click', '.add-to-cart', function(){
    $.ajax({
        url: '/index.php?page=basket&action=add&id=1&asAjax=true',
        type: 'GET',
        dataType: 'json'
    }).done(function(data) {
        alert(111);
    });
    return false;
});