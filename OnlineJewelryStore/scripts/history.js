$("document").ready(function(){


	//// init history 
	$("#purchaseHistoryBtn").click(function(){
		$("div.history p.error").hide();
		history();

	});




function history(){
		$("#historyListing").hide();
		$("#historyListing").html("");

		$.ajax({
			url:"history.php",
			method: "post",
			dataType: "json",
			success: function(response){

				if(response.err != ""){
					$("div.history p.error").html(response.err);
					$("div.history p.error").fadeIn();
				}else{
					$("div.history p.error").hide();
				}
				var list = response.list;
				if(list.length == 0){
					$("div.history h2").text("No purchase history.");
					$("#historyListing").hide();
				}else{
					$("div.history h2").text("You have "+list.length+" item(s) in your purchase history.");
					$("#historyListing").fadeIn();

				}
				for(i=0;i<list.length;i++){
					var element = list[i];

					(function(element){	
						var id = element.id;
						var name = element.name;
						var rating = element.rating;
						var year = element.year;
						var price = element.price;	
						var date = element.date;
						
						$.ajax({
							url:"readimage.php",
							data: {"Jewelry_id":id},
							method: "post",
							success: function(img){

								var divitem = $("<div></div>").addClass("item");
								var divimage = $("<div></div>").addClass("image");
								var divinfo = $("<div></div>").addClass("info");
								var divprice = $("<div></div>").addClass("price");
								var divfunction = $("<div></div>").addClass("date");

								var image = $("<img>").attr('src',img);
								var title = $("<span></span>").addClass("title").html(name+"<hr/>");
								var detail = $("<span></span>").addClass("detail").text("Year: "+ year + "     "+"Rating: "+rating);
								var pricenum = $("<span></span>").addClass("price").text("$"+price);
								var showdate = $("<span></span>").addClass("date").html("purchase date: "+date);
								
								

								divimage.append(image);
								divinfo.append(title).append(detail);
								divprice.append(pricenum);
								divfunction.append(showdate);

								divitem.attr("id","history"+id).append(divimage).append(divinfo).append(divprice).append(divfunction);
								$("#historyListing").append(divitem);
							},
							error: function(img){
								alert("cannot read image.")
							}
						});
					})(element);
				}
			$("#historyListing").fadeIn();
			},
			error: function(){
				alert("Error: cannot link history.php");
			}		
		});


}




});