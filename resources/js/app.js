require('./bootstrap');


$(document).ready(function () {
    $('.link').click(function () {
        let dataId = $(this).attr('data-id');
        myform('post','postReady',{read:'Success', id:dataId })
    })
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
        }
    });
}
