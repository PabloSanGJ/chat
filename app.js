$(document).ready(function(){
    
    messages();
    
    $('#btn-send').on('click',function(){
        var user = $("#ping").prop("disabled") === true ? 0 : 1;
        var message = $('#message').val().trim();
        if (message.length === 0) {
            alert("Your meesage is empty!");
            return false;
        }
        
        $.post("API/query.php?action=new", {user: user, message: message}, function(response){
            if (response === 'ok') {
                $('#message').val('');
                $("#btn-send").prop("disabled", false );
                messages();
            } else {
                console.log(response);
            }
        }, "json");
    });
    
    $('#ping').on('click',function(){
        $("#ping").prop("disabled", true );
        $("#pong").prop("disabled", false );
        $("#btn-send").removeClass("btn-danger");
        $("#btn-send").addClass("btn-primary");
    });
    
    $('#pong').on('click',function(){
        $("#pong").prop( "disabled", true );
        $("#ping").prop( "disabled", false );
        $("#btn-send").removeClass("btn-primary");
        $("#btn-send").addClass("btn-danger");
    });
});

function messages() {
    $.post("API/query.php?action=list", function(response){
        var messages = response;
        var html = '';
        
        if (messages !== null) {
            for (var i = 0; i < messages.length; i++) {
                var pingPong = messages[i].user === "Ping" ? 'text-primary' : 'text-danger';
                html += '<div class="clearfix message-unit">';
                html += '<div class="col-sm-1 float-left"><strong class="' + pingPong + '">' + messages[i].user + ':</strong></div>';
                html += '<div class="col-sm-8 float-left">' + messages[i].message + '</div>';
                html += '<div class="col-sm-3 float-right text-right font-italic">' + messages[i].date + '</div>';
                html += '</div>';
            }
        } else {
            console.log('There are no messages');
        }
        
        $("#messages").html(html);
    
    }, "json");   
}