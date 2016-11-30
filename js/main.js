$(document).ready(function(){
    $.ajax({
        url:"/gettables",
        type:'GET',
        dataType:'json',
    }).done(function(result){

    });
}
);
