
$('#admin-modal').on('show.bs.modal', function(e) {

    $.ajax({
        type: 'get',
        cache: false,
        url: 'admin/camps/notifications',
        beforeSend: function() {
            $("#loadingData").show();
        },
        // data: {id:campaignId},
        success: function (response) {
            /*hide loader*/
            $("#loadingData").hide();
            // alert(response)
            var data = JSON.parse(response);
            for(var i=0; i<=data.length; i++)
            {
                if(data[i].updated_at>data[i].created_at)
                {
                    var txt = 'has updated'
                }
                else
                {
                    var txt = 'has created'
                }
                var date = data[i].created_at;
                var fullDate = date.slice(0,10);
                var fullTime = date.slice(11,19);
                $('#result').append('<div class="direct-chat-msg right">\n' +
                    '                        <div class="direct-chat-infos clearfix">\n' +
                    '                            <span class="direct-chat-timestamp float-left">'+fullDate+' &nbsp '+fullTime+'</span>\n' +
                    '                        </div>\n' +
                    '                        <div class="direct-chat-text">\n' +
                    '                            '+(i+1)+'. <b>'+data[i].user.name+'</b> '+txt+' <b>'+data[i].title+'</b> \n' +
                    '                        </div>\n' +
                    '                    </div>');
            }
        }
    })
});

$('#admin-modal').on('hidden.bs.modal', function () {
    $('#result').empty();
})

