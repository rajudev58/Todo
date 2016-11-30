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
            url:"/index.php/task/remove/"+id,
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

    $('.check-task-button').on('click',function() {
        var id =$(this).attr('data-id');
        var btn= $(this);
        console.log(id);
        var status=$(this).hasClass('checked')?0:1;//we want the opposite of current status to send
        console.log(status);
        $.ajax({
            url:"/index.php/task/editDone/"+id,
            type:'POST',
            data:{'done':status}
        }).done(function(result){
            console.log(result);
            btn.toggleClass('checked');
        });

    });

    $('.edit-task-button').on('click',function(){
        var id=$(this).attr('data-id');
        var title = $(this).parent().parent().parent().parent().find('.panel-heading').html();
        var description = $(this).parent().parent().parent().find('.description').html();
        console.log(description);
        var form = $('.edit-modal').find('form');
        console.log(form + title);
        form.attr('action',"/index.php/task/edit/"+id)
        form.find('#title').attr('value',title);
        form.find('#description').val(description);
        $('.edit-modal').modal('show');
    });

}
);
