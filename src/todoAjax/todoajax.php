<!DOCTYPE html>
<html>
    <head>
    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
        <script>
            $(document).ready(function(){
                
                $("#res").on("click",".delete",function(){
                    var arr = $(this).attr('arr');
                    var key = $(this).attr('key');
                    $.ajax({
                        type:'post',
                        url:'todoserver.php',
                        data:{
                            delete: "delete",
                            arr: arr,
                            key: key   
                        },
                        success:function(response) {
                            document.getElementById("res").innerHTML=response;
                        }
                    });
                });
                $("#res").on("click","#ADD",function(){
                    var key = document.getElementById('new-task').value;
                    if(key!=""){
                        $.ajax({
                            type:'post',
                            url:'todoserver.php',
                            data:{
                                add: "add",
                                key: key   
                            },
                            success:function(response) {
                                document.getElementById("res").innerHTML=response;
                            }
                        });
                    }            
                });
                $("#res").on("click","#edit",function(){
                    var key = $(this).attr('key');
                    var arr = $(this).attr('arr');
                    document.getElementById("btn").innerHTML="Update";
                    document.getElementById("new-task").value=key;
                    document.getElementById("ADD").id="update";
                    $.ajax({
                        type:'post',
                        url:'todoserver.php',
                        data:{
                            edit: "edit",
                            key: key,
                            arr: arr   
                        },
                        success:function(response) {
                            document.getElementById("res").value=response;
                        }
                    });
                });
                $("#res").on("click","#update",function(){
                    var key = document.getElementById('new-task').value;
                    if(key!=""){
                        document.getElementById("btn").innerHTML="ADD";
                        document.getElementById("new-task").value="";
                        document.getElementById("update").id="ADD";
                        $.ajax({
                            type:'post',
                            url:'todoserver.php',
                            data:{
                                update: "update",
                                key: key   
                            },
                            success:function(response) {
                                document.getElementById("res").innerHTML=response;
                            }
                        });
                    }
                                
                });
                $("#res").on("click","#incomplete_check",function(){
                    var key = $(this).attr('key');
                    $.ajax({
                            type:'post',
                            url:'todoserver.php',
                            data:{
                                check: "complete",
                                key: key   
                            },
                            success:function(response) {
                                document.getElementById("res").innerHTML=response;
                            }
                        });
                });
                $("#res").on("click","#complete_check",function(){
                    var key = $(this).attr('key');
                    $.ajax({
                            type:'post',
                            url:'todoserver.php',
                            data:{
                                uncheck: "complete",
                                key: key   
                            },
                            success:function(response) {
                                document.getElementById("res").innerHTML=response;
                            }
                        });
                });
                show();
                    
            });


            function show(){
                $.ajax({
                    type:'post',
                    url:'todoserver.php',
                    data:{
                        show_data:"show"
                    },
                    success:function(response) {
                        document.getElementById("res").innerHTML=response;
                    }
                });

            }
            
        </script>
        <title>TODO List</title>
        <link href="style.css" type="text/css" rel="stylesheet">
        </head>
        <body>
            <div id="res"></div>
            <h3><a href="initial.php">go to default page</a></h3>
        </body>
    </html>