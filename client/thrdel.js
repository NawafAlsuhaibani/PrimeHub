function listThread(){
                $.post("cont.php",
                        function (data) {
                            var data = JSON.parse(data);     
							var thrad = "";
                            for (var i = 0; (i < data.length); i++)
                            {
								var thrid = data[i]['thr_id']
								thrad = "<tr><td>"+data[i]['cat_name']+"</td><td><a class='tablelink' href='thread.php?thr_id="+thrid+"' id="+thrid+">"+data[i]['thr_content']+"</a></td><td>"+data[i]['date_created']+"</td><td><button onClick='call1("+thrid+")'>Remove</button></td></tr>";
								$("#output").append(thrad);
								
                            }
                        });
            }
	function call1(thrid){
		$.ajax({
		url: "thread-delete.php",
		method: "post",
    data: {thrid:thrid},
		success: function(response) {
			if(response){
				 var result = eval('(' + response + ')');
                        if (response)
                        {
							alert("thread deleted");
							location.reload();
						}
				else {
					alert("thread is NOT deteled");
					location.reload();
				}
			}
		},
		error: function(response) {
			console.log(response);
		}

	});
	}