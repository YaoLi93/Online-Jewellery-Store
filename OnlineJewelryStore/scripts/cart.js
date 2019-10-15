$("document").ready(function(){
	$("#checkout span.price").hide();

	/// delete from shopping cart
	$("body").on("click","#cartListing div.item span.delete",function(){
		var itemClass = $(this).parent().parent().attr('id');
		var id = itemClass.substring(4,itemClass.length);
		var order_id=$(this).attr('id');
		$.ajax({
			url:"deleteCart.php",
			data: {"Jewelry_id":id,
					"order_id":order_id},
			method: "post",
			success: function(response){
				alert(response);
				cart();
			},
			error: function(){
				alert("Error: cannot delete from shopping cart.");
			}
		});


	});

	/// select item
	var totalprice = 0.0;
	$("body").on("change","div.item input[type='checkbox']",function(){	
		
		var itemClass = $(this).parent().parent().parent().attr('id');
		var id = itemClass.substring(4,itemClass.length);
		var checked = $(this).is(':checked');
		var pricetemp = $("#cart"+id+" span.price").html();
		var price = parseFloat(pricetemp.substring(1,pricetemp.length));

		if(checked == true){
			totalprice += price;
		}else{
			totalprice -= price;
		}
		if(totalprice!=0){
			$("#checkout span.price").html("Total Price: $"+totalprice.toFixed(2));
			$("#checkout span.price").fadeIn();
		}else{
			$("#checkout span.price").fadeOut(function(){
				$("#checkout span.price").html("Total Price: $"+totalprice.toFixed(2));
			});
			
		}
	});




	/// check out
	$("body").on("click","#checkout button",function(){	
		var pricetemp = $("#checkout span.price").html();
		var price = parseFloat(pricetemp.substring(14,pricetemp.length));
		if(price == 0){
			alert("Please select an item to check out.");
		}else{

			var ids = [];
			var ids2=[];
			$("div.item input[type='checkbox']").each(function(){
				if($(this).is(':checked')){
					var itemClass = $(this).parent().parent().parent().attr('id');
					var id = itemClass.substring(4,itemClass.length);
					var itemClass2=$(this).attr('id');
					var order_id = itemClass2.substring(4,itemClass2.length);
					ids.push(id); 
					ids2.push(order_id);
				}

			});
			alert("Checking out "+ids.length+" Jewelrys, your charge is totally $"+price+".");
			var err = "";
			for(i=0;i<ids.length;i++){
				var Jewelry_id = ids[i];
				var order_id=ids2[i];
				
				$.ajax({
					url:"checkout.php",
					method: "post",
					data: {'Jewelry_id':Jewelry_id,
						'order_id':order_id
					},
					success: function(response){
						err += response;
					},
					error: function(){
						alert("Error at checking out.");
						cart();
					}
				});
			}

			if(err == ""){
				alert("Check out successfully.");
				cart();
			}else{
				alert(err);
			}
		}


	});


	//// init shopping cart
	$("#shoppingCartBtn").click(function(){
		$("div.shoppingCart p.error").hide();
		cart();

	});




function cart(){
		totalprice = 0;
		$("#cartListing").hide();
		$("#cartListing").html("");
		$("div.item input[type='checkbox']").each(function(){
			$(this).attr('checked',false);
		});
		$("#checkout span.price").html("Total Price: $0.00");
		$("#checkout span.price").hide();
		$.ajax({
			url:"cart.php",
			method: "post",
			dataType: "json",
			success: function(response){
				if(response.err != ""){
					$("div.shoppingCart p.error").html(response.err);
					$("div.shoppingCart p.error").fadeIn();
				}else{
					$("div.shoppingCart p.error").hide();
				}
				var list = response.list;
				if(list.length == 0){
					$("div.shoppingCart h2").text("No item in your shopping cart.");
					$("#cartBlock").hide();
					$("#checkout").hide();
				}else{
					$("div.shoppingCart h2").text("You have "+list.length+" item(s) in your shopping cart.");
					$("#cartBlock").fadeIn();
					$("#checkout").fadeIn();
				}
				for(i=0;i<list.length;i++){
					var element = list[i];

					(function(element){	
						var id = element.id;
						var name = element.name;
						var rating = element.rating;
						var year = element.year;
						var price = element.price;	
						var order_id=element.order_id;
						$.ajax({
							url:"readimage.php",
							data: {"Jewelry_id":id},
							method: "post",
							success: function(img){

								var divitem = $("<div></div>").addClass("item");
								var divimage = $("<div></div>").addClass("image");
								var divinfo = $("<div></div>").addClass("info");
								var divprice = $("<div></div>").addClass("price");
								var divfunction = $("<div></div>").addClass("function");

								var image = $("<img>").attr('src',img);
								var title = $("<span></span>").addClass("title").html(name+"<hr/>");
								var detail = $("<span></span>").addClass("detail").text("Year: "+ year + "     "+"Rating: "+rating);
								var pricenum = $("<span></span>").addClass("price").text("$"+price);
								var deletebtn = $("<span></span>").addClass("delete btn btn-danger").html('<i class="material-icons" style="font-size: 30px">delete_forever</i>');
								var input = $("<input>").attr("type","checkbox").attr("name","select").css("zoom",1.5).val(order_id);
								var select = $("<span></span>").addClass("select").text("Select: ").append(input);
								deletebtn.attr("id",order_id);
								divimage.append(image);
								divinfo.append(title).append(detail);
								divprice.append(pricenum);
								divfunction.append(deletebtn).append(select);
								input.attr("id", "cart"+order_id);
								divitem.attr("id","cart"+id).append(divimage).append(divinfo).append(divprice).append(divfunction);
								$("#cartListing").append(divitem);
							},
							error: function(img){
								alert("cannot read image.")
							}
						});
					})(element);
				}
			$("#cartListing").fadeIn();
			},
			error: function(){
				alert("Error: cannot link cart.php");
			}		
		});


}




});