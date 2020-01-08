function listthreads(){
	$.post("listthreads.php",
                        function (data) {
                              var data = JSON.parse(data);     
							var users = "";
							var th = "<tr><th>thread id</th><th>user id</th><th>category name</th><th>content</th><th>date created</th><th>Delete!</th></tr>";
							$("#output1").append(th);
                            for (var i = 0; (i < data.length); i++)
                            {
								var thrid1 = data[i]['thr_id']
								
								users = "<tr><td>"+data[i]['thr_id']+"</td><td>"+data[i]['user_id']+"</td><td>"+data[i]['cat_name']+"</td><td>"+data[i]['thr_content']+"</td><td>"+data[i]['date_created']+"</td><td><button onClick='deletethr("+thrid1+")'>Delete!</button></td></tr>"
								$("#output1").append(users);
								
                            }
                        });
}
function listusers1(str){
	
                $.post("listusers.php",{str: str},
                        function (data) {
                            var data = JSON.parse(data);     
							var users = "";
							var th = "<tr><th>user id</th><th>name</th><th>email</th><th>username</th><th>isAdmin</th><th>created date</th><th>isActive</th><th>make admin</th><th>remeove admin</th><th>Activate</th><th>Deactivate</th></tr>";
							$("#output1").append(th);
                            for (var i = 0; (i < data.length); i++)
                            {
								var thrid = data[i]['thr_id']
								var uid = data[i]['user_id']
								
								users = "<tr><td>"+data[i]['user_id']+"</td><td>"+data[i]['name']+"</td><td>"+data[i]['email']+"</td><td>"+data[i]['username']+"</td><td>"+data[i]['isAdmin']+"</td><td>"+data[i]['created_date']+"</td><td>"+data[i]['isActive']+"<td><button onClick='makeadmin("+uid+")'>make admin</button></td><td><button onClick='removeadmin("+uid+")'>remove admin</button></td><td><button onClick='activate("+uid+")'>Activate</button></td><td><button onClick='deactivate("+uid+")'>Deactivate</button></td></tr>"
								$("#output1").append(users);
                            }
                        });
}
function listusers(){
                $.post("listusers.php",
                        function (data) {
                              var data = JSON.parse(data);     
							var users = "";
							var th = "<tr><th>user id</th><th>name</th><th>email</th><th>username</th><th>isAdmin</th><th>created date</th><th>isActive</th><th>make admin</th><th>remeove admin</th><th>Activate</th><th>Deactivate</th></tr>";
							$("#output1").append(th);
                            for (var i = 0; (i < data.length); i++)
                            {
								var thrid = data[i]['thr_id']
								var uid = data[i]['user_id']
								
								users = "<tr><td>"+data[i]['user_id']+"</td><td>"+data[i]['name']+"</td><td>"+data[i]['email']+"</td><td>"+data[i]['username']+"</td><td>"+data[i]['isAdmin']+"</td><td>"+data[i]['created_date']+"</td><td>"+data[i]['isActive']+"<td><button onClick='makeadmin("+uid+")'>make admin</button></td><td><button onClick='removeadmin("+uid+")'>remove admin</button></td><td><button onClick='activate("+uid+")'>Activate</button></td><td><button onClick='deactivate("+uid+")'>Deactivate</button></td></tr>"
								$("#output1").append(users);
                            }
                        });
}
function makeadmin(uid){
	$.ajax({
		url: "action.php",
		type: 'post',
    data: {uid:uid,action:"make"},
		success: function(response) {
			var result = eval('(' + response+')');
                        if (response)
                        {
							alert("is admin");
							location.reload();
						}
				else {
					alert("NOT Admin");
					location.reload();
				}
			
		},
		error: function(response) {
			console.log(response);
		}

	});
	}
function removeadmin(uid){
	$.ajax({
		url: "action.php",
		type: 'post',
    data: {uid:uid,action:"remove"},
		success: function(response) {
			var result = eval('(' + response+')');
                        if (response)
                        {
							alert("not admin");
							location.reload();
						}
				else {
					alert("error");
					location.reload();
				}
			
		},
		error: function(response) {
			console.log(response);
		}

	});
	}
function activate(uid){
	$.ajax({
		url: "action.php",
		type: 'post',
    data: {uid:uid,action:"activate"},
		success: function(response) {
			var result = eval('(' + response+')');
                        if (response)
                        {
							alert("activated");
							location.reload();
						}
				else {
					alert("error");
					location.reload();
				}
			
		},
		error: function(response) {
			console.log(response);
		}

	});
	}
function deactivate(uid){
	$.ajax({
		url: "action.php",
		type: 'post',
    data: {uid:uid,action:"deactivate"},
		success: function(response) {
			var result = eval('(' + response+')');
                        if (response)
                        {
							alert("deactivated");
							location.reload();
						}
				else {
					alert("error");
					location.reload();
				}
			
		},
		error: function(response) {
			console.log(response);
		}

	});
	}
function deletethr(thrid1){
	$.ajax({
		url: "testdel.php",
		type: 'post',
    data: {thrid1:thrid1,action:"removethr"},
		success: function(response) {
			var result = eval('(' + response+')');
                        if (response)
                        {
							alert("Deleted");
							location.reload();
						}
				else {
					alert("NOT deleted");
					location.reload();
				}
			
		},
		error: function(response) {
			console.log(response);
		}

	});	
	}