<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Online Testing Chating Bot</title>
    <link rel="stylesheet" href="css/bot.css">
</head>
<body>
    <div id="container">
        <div id="dot1">
           <img id=chat src="css/chat.png">
           <img id=codes src="css/codes.jpg">
        </div>
        <div id="dot2"><img id=robot2 src="css/robot2.png"></div>
        <div id="screen">
            <img id=robot src="css/robot.png">
            <div id="header">PRATICE CHATBOT</div>
            <div id="messageDisplaySection">
        </div>
            <!-- messages input field -->
            <div id="userInput">
                <input type="text" name="messages" id="messages" autocomplete="OFF" placeholder="Escreva sua mensagem aqui." required>
                <input type="submit" value="Send" id="send" name="send">
            </div>
        </div>
    </div>

    <!-- jQuery CDN -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    
    <!-- Jquery Start -->
    <script>
        $(document).ready(function(){
            $("#messages").on("keyup",function(){

                if($("#messages").val()){
                    $("#send").css("display","block");
                }else{
                    $("#send").css("display","none");
                }
            });
        });
        // when send button clicked
        $("#send").on("click",function(e){
            $userMessage = $("#messages").val();
            $appendUserMessage = '<div class="chat usersMessages">'+ $userMessage +'</div>';
            $("#messageDisplaySection").append($appendUserMessage);

            // ajax start
            $.ajax({
                url: "bot.php",
                type: "POST",
                // sending data
                data: {messageValue: $userMessage},
                // response text
                success: function(data){
                    // show response
                    $appendBotResponse = '<div id="messagesContainer"><div class="chat botMessages">'+data+'</div></div>';
                    $("#messageDisplaySection").append($appendBotResponse);
                }
            });
            $("#messages").val("");
            $("#send").css("display","none");
        });
    </script>
</body>
</html>