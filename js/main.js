$(document).ready(function(){
    $.ajax({
        url:"/",
        type:'GET',
        dataType:'json',
    }).done(function(result){

    });
    console.log("initiliased");

    $('.add-task-button').on('click',function(){
        console.log("triggered");
        $('.add-modal').modal("show");

    });

    $('.remove-task-button').on('click',function(){
        var id =$(this).attr('data-id');
        $.ajax({
            url:"/task/remove/"+id,
            type:'POST',
        }).done(function(result){
            window.location.reload();
        });

    });
    // auto resize textarea
    $('textarea').each(function () {
      this.setAttribute('style','overflow-y:hidden;');
    }).on('input', function () {
      this.style.height = 'auto';
      this.style.height = (this.scrollHeight) + 'px';
    });

}
);
