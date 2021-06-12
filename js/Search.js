$.ajax({
    url:'server.php',
    type:'post',
    data:{action:'peopcount'},
    success:(r)=>{
    	r = JSON.parse(r)
    	if (r!=0) {
    		$('.reqcount').append(r[0][0])
    	}
    }
})

$('.reqcount').click(function(){
	$('.req_peoples').empty()
	$.ajax({
	    url:'server.php',
	    type:'post',
	    data:{action:'peoples'},
	    success:(r)=>{
	    	r = JSON.parse(r)
	    	for (var i = 0; i < r.length; i++) {
				let div = $(` <div class="request_body">
								<div class="request_peoples">
									<div class="req_img">
										<img src="users/${r[i][6]}" class="rq_ava" alt="" width="80" />
										<div class="div_span">
											<span class="name_pep">${r[i][1]}</span>
											<span class="surname_pep">${r[i][2]}</span>
										</div>
									</div>
									<div class="request_form">
										<button class="req_btn" id="accept" data-id="${r[i][0]}">Ընդունել</button>
										<button class="req_btn req_btn2" id="declare" data-id="${r[i][0]}">Մերժել</button>
									</div>
									
								</div>
							  </div>`)
				$('.req_peoples').append(div)
				if (r[i][6]!="avatar.png") {
	    			div.find(".rq_ava").attr('src',`users/${r[i][0]}/${r[i][6]}`)
	    		}
	    	}
	    }
	})
	$('.req_peoples').toggleClass('req_hidden')
	$(document).mouseup(function (e) {
	    var container = $(".request_body");
	    if (container.has(e.target).length === 0){
	        container.hide();
	    }
	});
})

function Search_something() {
	$('.Search_div').remove()
	$('.Search_result').remove()
	var x = $(".Search_some").val()
	if (x.length>0) {
		$.ajax({
		    url:'server.php',
		    type:'post',
		    data:{action:'searchpeoples',x},
		    success:(r)=>{
		    	r = JSON.parse(r)
				let div = $(`<div class="Search_div"></div>`)
		    	for (var i = 0; i < r.length; i++) {
		    		$('.p_btn').empty()
		    		let p = $(`
			    			<div class="sea_p">
				    			<div class="sea_p_div">
					    			<div class="p_img">
										<img src="users/${r[i][3]}" class="srch_ava" alt="" width="80" />
										<div class="div_span">
											<span class="p_name">${r[i][1]}</span>
											<span class="p_surname">${r[i][2]}</span>
										</div>
									</div>
									<div class="div_btns">
										<button class="req_btn req_check1" data-id="${r[i][0]}"></button>
										<button class="req_btn req_check2" data-id="${r[i][0]}"></button>
									</div>
				    			</div>
			    			</div>
							`)
		    		if (r[i][3]!="avatar.png") {
		    			p.find(".srch_ava").attr('src',`users/${r[i][0]}/${r[i][3]}`)
		    		}
			    	div.append(p)
			    	// դեպք1
		    		if (r[i][4]=="Ընդունել") {
			    		p.find(".req_check1").html('<i class="fas fa-check-circle"></i>').addClass('accept_friend').attr('title','Ընդունել հայտը')
		    			p.find(".req_check2").html('<i class="fas fa-times-circle"></i>').addClass('declare_friend').attr('title','Մերժել')
		    		} 
		    		// դեպք2
		    		else if(r[i][4]=="Ուղարկված է") {
		    			p.find(".req_check1").html('<i class="fa fa-vote-yea"></i>').attr('title','Ուղարկված է')
		    			p.find(".req_check2").html('<i class="fa fa-times"></i>').addClass('declare_request').attr('title','Չեղարկել')
		    		} 
		    		// դեպք3
		    		else if (r[i][4]=="Ընկերներ"){
		    			p.find(".req_check1").html('<i class="fa fa-user-check"></i>').attr('title','Ընկերներ')
		    			p.find(".req_check2").html('<i class="fa fa-trash"></i>').addClass('delete_friend').attr('title','Հեռացնել')
		    		} 
		    		// դեպք4
		    		else {
		    			p.find(".req_check1").html('<i class="fa fa-share-square"></i>').addClass('send_request').attr('title','Ուղարկել')
		    			p.find(".req_check2").remove()
		    		}
		    	}
		    	if (!div.find('.srch_ava').attr('src')=="avatar.png") {
			    	div.find('.srch_ava').attr('src',`users/${r[i][0]}/${r[i][6]}`)
			    }
				$('.searchdiv').append(div)
		    }
		})
	}
	$(document).mouseup(function (e) {
	    var container = $(".Search_div");
	    if (container.has(e.target).length === 0){
	        container.hide();
	    }
	});
}


