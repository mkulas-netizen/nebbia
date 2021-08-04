require('./bootstrap');


$(document).ready(function () {
    $('.js-link').click(function () {
        let dataId = $(this).attr('data-id');
        myform('post','postReady',{read:'Success', id:dataId })
    });
    $('.js-status').click(function () {
        let dataId = $(this).attr('data-id');
        myform('post','postCategory',{category:'Popular', id:dataId })
    });
    $('.js-no-status').click(function () {
        let dataId = $(this).attr('data-id');
        myform('post','postCategory',{category:null, id:dataId })
    });
})

function myform(method,url,data,success = null) {
    $.ajax({
        method: method,
        url: url,
        data: data,
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        success: function (data) {
            console.log(data)
            location.reload();
        }
    });
}
