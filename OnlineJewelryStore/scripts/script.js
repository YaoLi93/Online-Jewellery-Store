$("document").ready(function(){
	initial();
	$("#slider").fadeIn();
	$("#paging").fadeIn();



// *************** event *************
	$("#loginBtn").click(function(){	// click login button
		$("#loginModal").css("display","block");
		$("#loginModal p.error").hide();
		$("#loginModal input").val("");
	});

	$("#loginModal span.close").click(function(){	// close login modal
		$("#loginModal").fadeOut();
	});

	$("#registerBtn").click(function(){	// click register button
		$("#registerModal p.error").hide();
		$("#registerModal input").val("");
		$("#registerModal span.info").text("");
		$("#registerModal").css("display","block");
	});

	$("#registerModal span.close").click(function(){	// close register modal
		$("#registerModal").fadeOut();
	});

	$("#shoppingCartBtn").click(function(){	// click shopping chart button
		$("#slider").hide();
		$("div.addJewelry").hide();
		$("div.home").hide();
		$("div.history").hide();
		$("div.shoppingCart").fadeIn();


	});
	$("#purchaseHistoryBtn").click(function(){	// click purchase history button
		$("#slider").hide();
		$("div.home").hide();
		$("div.shoppingCart").hide();
		$("div.addJewelry").hide();
		$("div.history").fadeIn();

	});
	$("#homeBtn").click(function(){	// click home button
		$("div.addJewelry").hide();
		$("div.shoppingCart").hide();
		$("div.history").hide();
		$("input").val("");	

		$("#filter-panel").collapse("hide");
		$("#slider").fadeIn();
		load();
		$("div.home").fadeIn();
	});	

	$("#loginModal button").click(function(){	// login
		login();
	});

	// $("#userInfoBtn").show();
	// $(".admin").show();



	$("#addJewelryBtn").click(function(){	// admin add Jewelry
		$("#slider").hide();
		$("div.home").hide();
		$("div.shoppingCart").hide();
		$("div.history").hide();	
		$("div.addJewelry").fadeIn();	
	});

	// $(".admin").show();
	// $("#userInfoBtn").show();


	
});

function initial(){
	$("div.shoppingCart").hide();
	$("div.history").hide();	
	$(".admin").hide();
	$("#userInfoBtn").hide();

	$("div.home").fadeIn();

}

function login(){
	var username = $("#loginModal input[name='username']").val();
	var password = $("#loginModal input[name='password']").val();
	if(username == ""){
		$("#loginModal p.error").show().html("Please enter your user name or email address.");	
	}else if(password == ""){
		$("#loginModal p.error").show().html("Please enter your password.");
	}else{
		$.ajax({
			url:"login.php",
			data: {"username":username,"password":password},
			method: "post",
			dataType: "json",
			success: function(response){
				if(response.err == ""){
					alert("Welcome back, "+username);
					$("#userInfoBtn").text(response.username);
					$("#loginBtn").hide();
					$("#registerBtn").hide();
					$("#userInfoBtn").show();
					$("#loginModal").fadeOut();
					if(response.usertype == "admin"){
						$(".admin").show();
						$("div.addJewelry").hide();
					}else{
						$(".admin").hide();
					}
				}else{
					$("#loginModal p.error").show().html(response.err);
				}
			},
			error: function(){
				alert("Error: cannot link login.php.");
			}
		});		
	}
}

function load(){
		var Jewelry_name = "";
		var category = "";
		$("#listing").html("");
		$("#paging").hide().html("");
		$.ajax({
			url:"filterJewelry.php",
			data: {"Jewelry_name":Jewelry_name,"category":category},
			method: "post",
			dataType: "json",
			success: function(response){
				if(response.err == ""){
					$("div.home p.error").html("").hide();
				}else{
					$("div.home p.error").html(response.err).show();
				}

				var list = response.list;
				
				if(list.length == 0){
					$("div.home p.error").text("No search result.");
					$("div.home p.error").fadeIn();
				}

				// create paging
				var count = response.list.length;
				var page = Math.ceil(count /8);
				for(i=1;i<=page;i++){
					var p = $("<span></span>").addClass("btn btn-danger").text(i);
					$("#paging").append(p);
				}
				for(i=0;i<page;i++){
					var block = $("<div class = 'block'></div>").attr('id','page'+(i+1));
					
					for(offset=0;offset<8;offset++){
						var index = 8*i + offset;
						if(index == list.length){
							break;
						}
						var element = list[index];			
						(function(element,block){
							var id = element.id;
							var name = element.name;
							var price = element.price;
							var category=element.category;	
							$.ajax({
								url:"readimage.php",
								data: {"Jewelry_id":id},
								method: "post",
								success: function(img){
									var display = $("<article></article>").addClass("Jewelry panel panel-default").attr('id',id);
									var head = $("<div></div>").addClass("panel-heading");
									var body = $("<div></div>").addClass("panel-body");
									var foot = $("<div></div>").addClass("panel-foot");
									var showprice = $("<span></span>").addClass("price").append("$").append(price);
									var catdiv = $("<div></div>").addClass("category");
									
									head.append(name);
									var image = $("<img>").attr('src',img);
								
									body.append(image);
							
									foot.append(category);

									foot.append(showprice);
									display.append(head).append(body).append(foot);
									block.append(display);	
								
								},
								error: function(img){
									alert("cannot read image.")
								}
							});
						})(element,block);
					}
					$("#listing").append(block);
					block.hide();
				}
				
				$("#page1").fadeIn();	
				$("#paging").fadeIn();
			},
			error: function(){
				alert("Error: cannot link filterJewelry.php.");
			}

		});	
}
