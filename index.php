<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Ping Pong Chat</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous"> 
        <link rel="stylesheet" href="app.css"> 
    </head>
    
    <body>
        
        <div id="app" class="container">
            <div class="jumbotron">
                
                <h1 class="text-center">Ping Pong Chat</h1>
                
                <div id="selector" class="clearfix">
                    <div class="col-sm-6 float-left">
                        <button id="ping" type="button" class="btn btn-primary btn-lg btn-block" disabled>I am Ping</button>
                    </div>
                    <div class="col-sm-6 float-right">
                        <button id="pong" type="button" class="btn btn-danger btn-lg btn-block">I am Pong</button>
                    </div>
                </div>  
                
                <div id="messages">
                </div>

                <div style="height:20px;clear:both;"></div>

                <form name="frmMessage" class="form-horizontal" novalidate="">
                    <div class="col-sm-12 text-right">
                        <textarea class="form-control" id="message" name="message" maxlength="1024" placeholder="Type a message..." ></textarea>
                    </div>

                    <div style="height:20px;clear:both;"></div>

                    <div class="col-sm-12 text-right">
                        <button type="button" class="btn btn-primary" id="btn-send">
                            Send
                        </button>
                    </div>
                </form>
            </div>
        </div>
        
        <script
            src="https://code.jquery.com/jquery-3.1.1.min.js"
            integrity="sha256-hVVnYaiADRTO2PzUGmuLJr8BLUSjGIZsDYGmIJLv2b8="
            crossorigin="anonymous"></script>
        <script type="text/javascript" src="app.js"></script>
    </body>
</html>
