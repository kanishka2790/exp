<html lang="en"><head>    <meta charset="UTF-8">    <meta http-equiv="X-UA-Compatible" content="IE=edge">    <meta name="viewport" content="width=device-width, initial-scale=1.0">    <title>Demo - Ajax Based registration form using PHP and MYSQL</title>    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">    <link rel="stylesheet" href="custom.css"></head> <body class="text-center"><main class="form-signin">  <form class="mt-5" id="registrationFrm" action="" method="POST">       <div id="response"></div>          <input type="text" class="form-control" id="floatingName" placeholder="username" name="name">                  <input type="password" class="form-control" id="floatingPassword" placeholder="Password" name="password">             <button class="w-100 btn btn-lg btn-primary" type="submit" id="registerSubmit">Register</button>      </form></main></body> <script  src="https://code.jquery.com/jquery-3.6.0.min.js"  integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script> <script>    $(document).ready(function(){        $("#registerSubmit").click(function(e){            e.preventDefault();            let emptyInputCount=0;                        $("#registrationFrm input").each(function(){                var input = $(this);                if(input.val() == ''){                    input.css('border-color','red');                    emptyInputCount = 1;                }                else{                    input.css('border-color','#ced4da');                }            });                         if(emptyInputCount == 0){                let getName = $("#floatingName").val();                               let getPassword = $("#floatingPassword").val();                 postObj = {                    name: getName,                    password: getPassword,                }				$sjax({					type: 'post',					url:'form_ajax.php',					data:postObj,					success: function(data){					// console.log(data);					if(parseJson.success_msg) 					{						$("#response").html('<div class="alert alert-success">'+parseJson.success_msg+'</div>');							}					else					{						if(parseJson.error_count==1)						{							$("#response").html('<div class="alert alert-success"> '+parseJson.success_msg+'</div>							else							{					$ajax({type:'post',url:'form_ajax.php',data:postobj,success: function(data){//cosole.log(data)'parse(Json= json_parse(data){if									                                       $.ajax({                    type: 'POST',                    url:'form_ajax.php',                    data:postObj,                    success: function(data){                        //console.log(data);                        parseJson = JSON.parse(data);                         if(parseJson.success_msg)                        {                            $("#response").html('<div class="alert alert-success">'+parseJson.success_msg+'</div>');                        }                        else                        {                            if(parseJson.error_count == 1)                            {                              $("#response").html('<div class="alert alert-danger">'+parseJson.error_msg+'</div>');                            }                            else                            {                                let msg='';                                for(i=0;i<parseJson.error_count;i++)                                {                                  msg +='<div class="alert alert-danger">'+parseJson.error_msg[i]+'</div>';                                }                                 $("#response").html(msg);                            }                        }                    }                })            }        });    });</script><form  method="post"><label>username</label><input type="text" id="username" class="form control" name="username" placeholder="Enter  your username"><label>password</label><input type="text" id="password" class="form control" name="password" placeholder="Enter your password"><label> email</label><input type="text" id="email" class="form control" name="email" placeholder="Enter your email"><label> confirm password</label><input type="text" id="confirm password " class="form control"  placeholder="Enter your confrim password">