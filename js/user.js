// Իմ փոստերի ցուցադրումը
// let gl_id
// let gl_name
// let gl_surname
// let gl_age
// let gl_avatar
// let gl_cover
// let myinfo = []
// $.ajax({
//     url:'server.php',
//     type:'post',
//     data:{action:'showmyinfo'},
//     success:(r)=>{
//     	r = JSON.parse(r)
//     	gl_id = r[0][0]
//     	gl_name = r[0][1]
//     	gl_surname = r[0][2]
//     	gl_age = r[0][3]
//     	gl_avatar = r[0][6]
//     	gl_cover = r[0][7]
//     	myinfo.push(gl_id,gl_surname,gl_age,gl_avatar,gl_cover)
//     	// let b = $(`<b class="myinfo">${gl_id,gl_surname,gl_age,gl_avatar,gl_cover}</b>`)
//     }
// })
// console.log(myinfo)
if ($('.fr__data').attr('fr_id')) {
	let fid = $('.fr__data').attr('fr_id')
	$.ajax({
	    url:'server.php',
	    type:'post',
	    data:{action:'showposts',fid},
	    success:(r)=>{
	    	r = JSON.parse(r)
	    	console.log(r)
	    	if (r.length!=0) {
		    	for (var i = 0; i < r.length; i++) {
		    		let div = $(`<div class="post-content" data-id="${r[i][3]}">
					                <div class="post-container">
					                    <div class="post-detail">
						                <div class="mini_icon">
						                  <img src="users/${r[i][6]}" alt="user" class="profile-photo-md pull-left src__av addphoto" />
						                </div>
					                    <div class="btnpostform">
											<div class="btnpostform_body">
												<i class="fa fa-circle"></i>
												<i class="fa fa-circle"></i>
												<i class="fa fa-circle"></i>
											</div>
					                    </div>
						                  <div class="open_list">
													<div class="open_list_body">
														<ul class="open_list_body_list">
															<li class="open_list_body_list_el del_post"><i class="fa fa-trash"></i> Հեռացնել</li>
															<li class="open_list_body_list_el edit_post"><i class="fa fa-pencil"></i> Խմբագրել</li>
														</ul>
													</div>
						                  </div>
					                    <div class="user-info">
					                      <h5><a href="timeline.html" class="profile-link">${r[i][4]} ${r[i][5]}</a></h5>
					                      <p class="timecss"></p>
					                    </div>
					                    <div class="post-text">
					                      <p class="text-muted">${r[i][0]}</p>
					                    </div>
					                    <div class="reaction">
					                      <a class="btnl text-gray lcl" data-id="${r[i][3]}"><i class="icon ion-thumbsup lcl_i" style="font-size: 27px;"></i> <span class="lcls" data-toggle="modal" data-target="#exampleModal3">${r[i][7]}</span></a>
					                      <a class="btnl text-gray2 discl" data-id="${r[i][3]}"><i class="fa fa-thumbs-down discl_i" style="font-size: 23px"></i> <span class="dlcls" data-toggle="modal" data-target="#exampleModal4">${r[i][8]}</span></a>
						                    <div class="like_peoples">
											   
					                        </div>
					                        <div class="dislike_peoples">
											   
					                        </div>
					                    </div>
					                    <div class="line-divider"></div>
			                    		<p class="cntcomm" style="text-align: center; margin-left: 20px; font-size: 20px">Մեկնաբանություններ <span class="com_span"></span></p>
					                    <div class="post-comment">
						                    <div class="mini_icon" style="margin-top:5px;">
							                  <img src="users/${r[i][6]}" alt="user" class="profile-photo-md pull-left srcp__av addphoto" />
							                </div>
					                      <input style="margin-left: 60px;" type="text" class="form-control fabll" placeholder="Գրեք մեկնաբանություն">
					                      <div class="combut">
											<button class="combutcl"><i class="fa fa-comment-medical"></i></button>
					                      </div>
					                    </div>
					                  </div>
					                </div>
					              </div>`)
		    		if (r[i][15]!=0) {
		    			div.find('.com_span').append(r[i][15])
		    		}
		    		let c = r[i][13]
		    		for (var j = 0; j < c.length; j++) {
		    			div.find('.post-detail').append(`<div class="post-comment">
															<img src="" alt="" class="profile-photo-sm com__av" />
															<p class="post-comment_p"><a href="timeline.html" class="profile-link class="post-comment_a"">${c[j][0]} ${c[j][1]}</a> ${c[j][4]}</p>
														</div>`)
		    		}
		    		if (r[i][6]!="avatar.png") {
		    			div.find(".src__av").attr('src',`users/${r[i][14]}/${r[i][6]}`)
		    			div.find(".srcp__av").attr('src',`users/${r[i][14]}/${r[i][6]}`)
		    			div.find(".com__av").attr('src',`users/${c[j][3]}/${c[j][2]}`)
		    		}
		    		for (var j = 0; j < r[i][2].length; j++) {
		    			div.find('.timecss').append(r[i][2][j])
		    		}
		    		if (r[i][1].length!=0) {
		    			let img = $(`<img src="users/${r[i][14]}/${r[i][1]}" alt="post-image" class="img-responsive post-image" />`)
		    			div.find('.reaction').before(img)
		    		}
		    		if (r[i][9]=="yes") {
		    			div.find('.reaction').find('.lcl').addClass('clicked text-green')
		    			div.find('.reaction').find('.lcls').html(r[i][7]).addClass('clicked')
		    		}
		    		if (r[i][10]=="yes") {
		    			div.find('.reaction').find('.discl').addClass('clicked text-red')
		    			div.find('.reaction').find('.dlcls').html(r[i][8]).addClass('clicked')
		    		}
					let t = r[i][11]
					if (t.length!=0) {
						for (var j = 0; j < t.length; j++) {
			    			div.find('.reaction').find('.like_peoples').append(`<p class="like_peoples_list" data-id ="${t[j][2]}">${t[j][0]} ${t[j][1]}</p>`)
						}
					}else {
			    		div.find('.reaction').find('.like_peoples_list').hide()
					}

					let p = r[i][12]
					if (p.length!=0) {
						for (var j = 0; j < p.length; j++) {
			    			div.find('.reaction').find('.dislike_peoples').append(`<p class="dislike_peoples_list" data-id ="${p[j][2]}">${p[j][0]} ${p[j][1]}</p>`)
						}
					} else {
			    		div.find('.reaction').find('.dislike_peoples_list').hide()
					}
		    		$('.addposts').append(div)
		    	}	
		    		let see = $(`<div class="seemdiv">
		    						<button class="seembut">Տեսնել ավելին</button>
		    				 	 </div>`)
		    		$('.addposts').append(see)
	    	}
	    }
	})
} else {
	$.ajax({
	    url:'server.php',
	    type:'post',
	    data:{action:'showposts'},
	    success:(r)=>{
	    	r = JSON.parse(r)
	    	console.log(r)
	    	if (r.length!=0) {
		    	for (var i = 0; i < r.length; i++) {
		    		let div = $(`<div class="post-content" data-id="${r[i][3]}">
					                <div class="post-container">
					                    <div class="post-detail">
						                <div class="mini_icon">
						                  <img src="users/${r[i][6]}" alt="user" class="profile-photo-md pull-left src__av addphoto" />
						                </div>
					                    <div class="btnpostform">
											<div class="btnpostform_body">
												<i class="fa fa-circle"></i>
												<i class="fa fa-circle"></i>
												<i class="fa fa-circle"></i>
											</div>
					                    </div>
						                  <div class="open_list">
											<div class="open_list_body">
												<ul class="open_list_body_list">
													<li class="open_list_body_list_el del_post"><i class="fa fa-trash"></i> Հեռացնել</li>
													<li class="open_list_body_list_el edit_post"><i class="fa fa-pencil"></i> Խմբագրել</li>
												</ul>
											</div>
						                  </div>
					                    <div class="user-info">
					                      <h5><a href="timeline.html" class="profile-link">${r[i][4]} ${r[i][5]}</a></h5>
					                      <p class="timecss"></p>
					                    </div>
					                    <div class="post-text">
					                      <p class="text-muted">${r[i][0]}</p>
					                    </div>
					                    <div class="reaction">
					                      <a class="btnl text-gray lcl" data-id="${r[i][3]}"><i class="icon ion-thumbsup lcl_i" style="font-size: 27px;"></i> <span class="lcls" data-toggle="modal" data-target="#exampleModal3">${r[i][7]}</span></a>
					                      <a class="btnl text-gray2 discl" data-id="${r[i][3]}"><i class="fa fa-thumbs-down discl_i" style="font-size: 23px"></i> <span class="dlcls" data-toggle="modal" data-target="#exampleModal4">${r[i][8]}</span></a>
						                    <div class="like_peoples">
											   
					                        </div>
					                        <div class="dislike_peoples">
											   
					                        </div>
					                    </div>
					                    <div class="line-divider"></div>
			                    		<p class="cntcomm" style="text-align: center; margin-left: 20px; font-size: 20px">Մեկնաբանություններ <span class="com_span"></span></p>
					                    <div class="post-comment">
						                    <div class="mini_icon" style="margin-top:5px;">
							                  <img src="users/${r[i][6]}" alt="user" class="profile-photo-md pull-left srcp__av addphoto" />
							                </div>
					                      <input style="margin-left: 60px;" type="text" class="form-control fabll" placeholder="Գրեք մեկնաբանություն">
					                      <div class="combut">
											<button class="combutcl"><i class="fa fa-comment-medical"></i></button>
					                      </div>
					                    </div>
					                  </div>
					                </div>
					              </div>`)
		    		if (r[i][15]!=0) {
		    			div.find('.com_span').append(r[i][15])
		    		}
		    		let c = r[i][13]
		    		for (var j = 0; j < c.length; j++) {
		    			let url
		    			if (c[j][2]==="avatar.png") {
		    				url = `users/${c[j][2]}`
		    			} else {
		    				url = `users/${c[j][3]}/${c[j][2]}`
		    			}
		    			div.find('.post-detail').append(`<div class="post-comment">
															<img src="${url}" alt="" class="profile-photo-sm com__av" />
															<p class="post-comment_p"><a href="timeline.html" class="profile-link class="post-comment_a"">${c[j][0]} ${c[j][1]}</a> ${c[j][4]}</p>
														</div>`)
		    		}
		    		if (r[i][6]!="avatar.png") {
		    			div.find(".src__av").attr('src',`users/${r[i][14]}/${r[i][6]}`)
		    			div.find(".srcp__av").attr('src',`users/${r[i][14]}/${r[i][6]}`)
		    		}
		    		for (var j = 0; j < r[i][2].length; j++) {
		    			div.find('.timecss').append(r[i][2][j])
		    		}
		    		if (r[i][1].length!=0) {
		    			let img = $(`<img src="users/${r[i][14]}/${r[i][1]}" alt="post-image" class="img-responsive post-image" />`)
		    			div.find('.reaction').before(img)
		    		}
		    		if (r[i][9]=="yes") {
		    			div.find('.reaction').find('.lcl').addClass('clicked text-green')
		    			div.find('.reaction').find('.lcls').html(r[i][7]).addClass('clicked')
		    		}
		    		if (r[i][10]=="yes") {
		    			div.find('.reaction').find('.discl').addClass('clicked text-red')
		    			div.find('.reaction').find('.dlcls').html(r[i][8]).addClass('clicked')
		    		}
					let t = r[i][11]
					if (t.length!=0) {
						for (var j = 0; j < t.length; j++) {
			    			div.find('.reaction').find('.like_peoples').append(`<p class="like_peoples_list" data-id ="${t[j][2]}">${t[j][0]} ${t[j][1]}</p>`)
						}
					}else {
			    		div.find('.reaction').find('.like_peoples_list').hide()
					}

					let p = r[i][12]
					if (p.length!=0) {
						for (var j = 0; j < p.length; j++) {
			    			div.find('.reaction').find('.dislike_peoples').append(`<p class="dislike_peoples_list" data-id ="${p[j][2]}">${p[j][0]} ${p[j][1]}</p>`)
						}
					} else {
			    		div.find('.reaction').find('.dislike_peoples_list').hide()
					}
		    		$('.addposts').append(div)
		    	}	
		    		let see = $(`<div class="seemdiv">
		    						<button class="seembut">Տեսնել ավելին</button>
		    				 	 </div>`)
		    		$('.addposts').append(see)
	    	}
	    }
	})
}


// Ընկերներիս փոստերի ցուցադրումը

$.ajax({
    url:'server.php',
    type:'post',
    data:{action:'showfrposts'},
    success:(r)=>{
    	r = JSON.parse(r)
    	// console.log(r)
    	for (var i = 0; i < r.length; i++) {
    		let div = $(`<div class="post-content" data-id="${r[i][7]}">
			                <div class="post-container">
			                  <div class="mini_icon">
			                  	<img src="users/${r[i][5]}" alt="user" class="profile-photo-md pull-left addphoto" />
			                  </div>
			                    <div class="post-detail">
			                    <div class="btnpostform">
									<div class="btnpostform_body">
										<i class="fa fa-circle"></i>
										<i class="fa fa-circle"></i>
										<i class="fa fa-circle"></i>
									</div>
			                    </div>
				                  <div class="open_list">
									<div class="open_list_body">
										<ul class="open_list_body_list">
											<li class="open_list_body_list_el"><i class="fa fa-save"></i> Պահպանել</li>
											<li class="open_list_body_list_el"><i class="fas fa-eye-slash"></i> Ցույց չտալ</li>
										</ul>
									</div>
				                  </div>
			                    <div class="user-info">
			                      <p><a href="timeline.html" class="profile-link">${r[i][3]} ${r[i][4]}</a></p>
			                      <p class="timecss"></p>
			                    </div>
			                    <div class="post-text">
			                      <p class="text-muted">${r[i][2]}</p>
			                    </div>
			                    <div class="reaction">
			                      <a class="btnl text-gray lcl" data-id="${r[i][7]}"><i class="icon ion-thumbsup lcl_i" style="font-size: 27px;"></i> <span class="lcls" data-toggle="modal" data-target="#exampleModal3">${r[i][8]}</span></a>
			                      <a class="btnl text-gray2 discl" data-id="${r[i][7]}"><i class="fa fa-thumbs-down discl_i"></i> <span class="dlcls" data-toggle="modal" data-target="#exampleModal4">${r[i][9]}</span></a>
				                    <div class="like_peoples">
									   
			                        </div>
			                        <div class="dislike_peoples">
									   
			                        </div>
			                    </div>
			                    <div class="line-divider"></div>
			                    <p class="cntcomm" style="text-align: center; margin-left: 20px; font-size: 20px">Մեկնաբանություններ <span class="com_span"></span></p>
			                    <div class="post-comment add_comm">
			                      <img src="users/${r[0][16]}" alt="" class="profile-photo-sm adcom_img" />
			                      <input type="text" class="form-control fabll" placeholder="Գրեք մեկնաբանություն">
			                      <div class="combut">
									<button class="combutcl"><i class="fa fa-comment-medical"></i></button>
			                      </div>
			                    </div>
			                  </div>
			                </div>
			              </div>`)
    		if (r[i][5]!="avatar.png") {
    			div.find(".addphoto").attr('src',`users/${r[i][0]}/${r[i][5]}`)
    		}
    		if (r[0][16]!="avatar.png") {
    			div.find(".adcom_img").attr('src',`users/${r[0][14]}/${r[0][16]}`)
    		}
    		if (r[i][17]!=0) {
    			div.find('.com_span').append(r[i][17])
    		}
    		let c = r[i][15]
    		// console.log(c.length)
    		for (var j = 0; j < c.length; j++) {
    			let url
    			if (c[j][2]==="avatar.png") {
    				url = `users/${c[j][2]}`
    			} else {
    				url = `users/${c[j][3]}/${c[j][2]}`
    			}
    			div.find('.post-detail').append(`<div class="post-comment">
													<img src="${url}" style="margin-top: 0" alt="" class="profile-photo-sm" />
													<p class="post-comment_p"><a href="timeline.html" class="profile-link class="post-comment_a"">${c[j][0]} ${c[j][1]}</a> ${c[j][4]}</p>
												</div>`)
    		}
    		for (var j = 0; j < r[i][6].length; j++) {
    			div.find('.timecss').append(r[i][6][j])
    		}
    		if (r[i][1].length!=0) {
    			let img = $(`<img src="users/${r[i][0]}/${r[i][1]}" alt="post-image" class="img-responsive post-image" />`)
    			div.find('.reaction').before(img)
    		}
    		if (r[i][10]=="yes") {
    			div.find('.reaction').find('.lcl').addClass('clicked text-green')
    			div.find('.reaction').find('.lcls').html(r[i][8]).addClass('clicked')
    		}
    		if (r[i][11]=="yes") {
    			div.find('.reaction').find('.discl').addClass('clicked text-red')
    			div.find('.reaction').find('.dlcls').html(r[i][9]).addClass('clicked')
    		}
			let t = r[i][12]
			if (t.length!=0) {
				for (var j = 0; j < t.length; j++) {
	    			div.find('.reaction').find('.like_peoples').append(`<p class="like_peoples_list" data-id ="${t[j][2]}" ch1 = "${r[i][14]}" ch2 = "${t[j][3]}">${t[j][0]} ${t[j][1]}</p>`)
				}
			}else {
	    		div.find('.reaction').find('.like_peoples_list').hide()
			}

			let p = r[i][13]
			if (p.length!=0) {
				for (var j = 0; j < p.length; j++) {
	    			div.find('.reaction').find('.dislike_peoples').append(`<p class="dislike_peoples_list" data-id ="${p[j][2]}" ch1 = "${r[i][14]}" ch2 = "${p[j][3]}">${p[j][0]} ${p[j][1]}</p>`)
				}
			} else {
	    		div.find('.reaction').find('.dislike_peoples_list').hide()
			}
			if (c.length!=0) {
	    		let seeCom = $(`<div class="seediv">
		    						<button class="seecom">Տեսնել ավելին</button>
		    				 	 </div>`)
	    		div.find('.post-detail').append(seeCom)
			}
    		$('.addfrpost').append(div)
    	}	
    		let see = $(`<div class="seemdiv">
    						<button class="seembut">Տեսնել ավելին</button>
    				 	 </div>`)
    		$('.addfrpost').append(see)
    }
})

// Քոմենթների + ցուցադրում
let count_com = 0
let comC = 3
$(document).on('click','.seecom',function(){
	count_com+=6
	let pid = $(this).parents('.post-content').data('id')
	// var all = $(this).parents('.post-content').find(".cntcom_my").map(function() {
	//     comC++
	// }).get();
	// console.log(comC)
	$.ajax({
	    url:'server.php',
	    type:'post',
	    data:{action:'openmorecomm',count_com,pid},
	    success:(r)=>{
	    	r = JSON.parse(r)
			if (r[0][5]-count_com<=0) {
				$(this).text(`Տեսնել ավելին`)
			} else {
				$(this).text(`Տեսնել ավելին ${r[0][5]-count_com}`)
			}
	    	for (var i = comC; i < r.length; i++) {
	    		let div = $(`<div class="post-comment">
						<img src="users/${r[i][2]}" alt="" class="profile-photo-sm morcom__av" />
						<p class="post-comment_p"><a href="timeline.html" class="profile-link post-comment_p">${r[i][0]} ${r[i][1]}</a> ${r[i][4]}</p>
					</div>`)
				$(this).parent('.seediv').before(div)
				if (r[i][2]!="avatar.png") {
	    			div.find(".morcom__av").attr('src',`users/${r[i][3]}/${r[i][2]}`)
	    		}
			}
			comC+=6
		}
	})
})

// Ընկերներիս փոստերի +10 ցուցադրում

let count_post = 10
$(document).on('click','.seembut',function(){
	count_post+=10
	$(this).remove()
	$.ajax({
	    url:'server.php',
	    type:'post',
	    data:{action:'openmoreposts',count_post},
	    success:(r)=>{
	    	r = JSON.parse(r)
	    	console.log(r)
	    	for (var i = count_post-10; i < r.length; i++) {
    		let div = $(`<div class="post-content" data-id="${r[i][7]}">
			                <div class="post-container">
			                  <img src="users/${r[i][0]}/${r[i][5]}" alt="user" class="profile-photo-md pull-left addphoto" />
			                    <div class="post-detail">
			                    <div class="btnpostform">
										<div class="btnpostform_body">
											<i class="fa fa-circle"></i>
											<i class="fa fa-circle"></i>
											<i class="fa fa-circle"></i>
										</div>
			                    </div>
				                  <div class="open_list">
									<div class="open_list_body">
										<ul class="open_list_body_list">
											<li class="open_list_body_list_el"><i class="fa fa-save"></i> Պահպանել</li>
											<li class="open_list_body_list_el"><i class="fas fa-eye-slash"></i> Ցույց չտալ</li>
										</ul>
									</div>
				                  </div>
			                    <div class="user-info">
			                      <p><a href="timeline.html" class="profile-link">${r[i][3]} ${r[i][4]}</a></p>
			                      <p class="timecss"></p>
			                    </div>
			                    <div class="post-text">
			                      <p class="text-muted">${r[i][2]}</p>
			                    </div>
			                    <div class="reaction">
			                      <a class="btnl text-gray lcl" data-id="${r[i][7]}"><i class="icon ion-thumbsup lcl_i" style="font-size: 27px;"></i> <span class="lcls">${r[i][8]}</span></a>
			                      <a class="btnl text-gray2 discl" data-id="${r[i][7]}"><i class="fa fa-thumbs-down discl_i"></i> <span class="dlcls">${r[i][9]}</span></a>
				                    <div class="like_peoples">
									   <p class="like_peoples_list"></p>
			                        </div>
			                        <div class="dislike_peoples">
									   <p class="dislike_peoples_list"></p>
			                        </div>
			                    </div>
			                    <div class="line-divider"></div>
			                    <p class="cntcomm" style="text-align: center; margin-left: 20px; font-size: 20px">Մեկնաբանություններ <span class="com_span"></span></p>
			                    <div class="post-comment add_comm">
			                      <img src="users/${r[i][13][0]}/${r[i][13][1]}" alt="" class="profile-photo-sm marg__img" />
			                      <input type="text" class="form-control fabll" placeholder="Գրեք մեկնաբանություն">
			                      <div class="combut">
									<button class="combutcl"><i class="fa fa-comment-medical"></i></button>
			                      </div>
			                    </div>
			                  </div>
			                </div>
			              </div>`)
    		let c = r[i][12]
    		if (r[i][15]!=0) {
    			div.find('.com_span').append(r[i][15])
    		}
    		for (var j = 0; j < c.length; j++) {
    			div.find('.post-detail').append(`<div class="post-comment">
													<img src="users/${c[j][3]}/${c[j][2]}" alt="" class="profile-photo-sm" />
													<p class="post-comment_p"><a href="timeline.html" class="profile-link class="post-comment_a"">${c[j][0]} ${c[j][1]}</a> ${c[j][4]}</p>
												</div>`)
    		}
    		for (var j = 0; j < r[i][6].length; j++) {
    			div.find('.timecss').append(r[i][6][j])
    		}
    		if (r[i][1].length!=0) {
    			let img = $(`<img src="users/${r[i][0]}/${r[i][1]}" alt="post-image" class="img-responsive post-image" />`)
    			div.find('.reaction').before(img)
    		}
    		if (r[i][10]=="yes") {
    			div.find('.reaction').find('.lcl').addClass('clicked text-green')
    			div.find('.reaction').find('.lcls').html(r[i][8]).addClass('clicked')
    		}
    		if (r[i][11]=="yes") {
    			div.find('.reaction').find('.discl').addClass('clicked text-red')
    			div.find('.reaction').find('.dlcls').html(r[i][9]).addClass('clicked')
    		}
    		if (c.lenth!=0) {
	    		let seeCom = $(`<div class="seediv">
		    						<button class="seecom">Տեսնել ավելին</button>
		    				 	 </div>`)
	    		div.find('.post-detail').append(seeCom)
    		}
    		$('.addfrpost').append(div)
    	}	
    		let see = $(`<div class="seemdiv">
    						<button class="seembut">Տեսնել ավելին</button>
    				 	 </div>`)
    		$('.addfrpost').append(see)
	    }
	})
})

// Փոստի ... մենյուն

$(document).on('click','.btnpostform',function(){
  $(this).parent('.post-detail').find('.open_list').toggle();
});
$(document).on('click', function(e) {
  if (!$(e.target).closest(".btnpostform").length) {
    $(this).parent('.post-detail').find('.open_list').hide();
  }
  e.stopPropagation();
});

// Լայքի ֆունկցիան

$(document).on('click','.lcl_i',function(){
	let like = $(this).parent('.lcl').find('span').html()
	like++
	let idpost = $(this).parent('.lcl').attr('data-id')
	$(this).parent('.lcl').toggleClass('text-green')
	if (!$(this).parent('.lcl').find('span').hasClass('clicked')) {
		$(this).parent('.lcl').find('span').html(like).addClass('clicked')
		let idis = $(this).parent('.lcl').parent('.reaction').find('.discl').find('span')
		if (idis.hasClass('clicked')) {
			let dislike = idis.html()
			dislike--
			idis.removeClass('clicked').html(dislike)
			$(this).parent('.lcl').parent('.reaction').find('.discl').removeClass('text-red')
		}
		$.ajax({
		    url:'server.php',
		    type:'post',
		    data:{action:'likethispost',idpost},
		})
	} else {
		like-=2
		$(this).parent('.lcl').find('span').html(like).removeClass('clicked text-green')
		$.ajax({
		    url:'server.php',
		    type:'post',
		    data:{action:'likethispost_undo',idpost},
		})
	}
	$(this).parent('.reaction').find('.like_peoples')
})

// Լայքի հովեր

$(document).on("mouseenter", ".lcl", function() {
    $(this).parent('.reaction').find('.like_peoples').show()
});
$(document).on("mouseleave", ".lcl", function() {
    $(this).parent('.reaction').find('.like_peoples').hide()
});

// Լայք դնողների ցուցակի բացում

$(document).on("click", ".lcls", function() {
	let val = $(this).parents('.reaction').find('.like_peoples_list')
	$('.likepeoples').empty()
	val.each(function(){
			let div = $(`
				<div class="likp">
					<div class="likpform">
						<img src="users/${$(this).attr('ch2')}/${$(this).attr('data-id')}" class="likpimg" width="80" alt="" />
						<p class="like_peoples_list2">${$(this).text()}</p>
					</div>
					<div class="likpbut">
						<button class="likpbtn">Նամակ</button>
					</div>
				</div>
				`)
			$('.likepeoples').append(div)
		if ($(this).attr("ch1")==$(this).attr("ch2")) {
			$('.likpbtn').remove()
		}
	});
});

// Դիսլայքի ֆունկցիան

$(document).on('click','.discl_i',function(){
	let dislike = $(this).parent('.discl').find('span').html()
	dislike++
	$(this).parent('.discl').toggleClass('text-red')
	let idpost = $(this).parent('.discl').attr('data-id')
	if (!$(this).parent('.discl').find('span').hasClass('clicked')) {
		$(this).parent('.discl').find('span').html(dislike).addClass('clicked')
		let il = $(this).parent('.discl').parent('.reaction').find('.lcl').find('span')
		if (il.hasClass('clicked')) {
			let like = il.html()
			like--
			il.removeClass('clicked').html(like)
			$(this).parent('.discl').parent('.reaction').find('.lcl').removeClass('text-green')
		}
		$.ajax({
		    url:'server.php',
		    type:'post',
		    data:{action:'dislikethispost',idpost},
		})
	} else {
		dislike-=2
		$(this).parent('.discl').find('span').html(dislike).removeClass('clicked text-red')
		$.ajax({
		    url:'server.php',
		    type:'post',
		    data:{action:'dislikethispost_undo',idpost},
		})
	}
})

// Դիսլայքի հովեր

$(document).on("mouseenter", ".discl", function() {
    $(this).parent('.reaction').find('.dislike_peoples').show()
});
$(document).on("mouseleave", ".discl", function() {
    $(this).parent('.reaction').find('.dislike_peoples').hide()
});

// Դիսլայք դնողների ցուցակի բացում

$(document).on("click", ".dlcls", function() {
	let val = $(this).parents('.reaction').find('.dislike_peoples_list')
	$('.dislikepeoples').empty()
	val.each(function(){
		let div = $(`
			<div class="dislikp">
				<div class="dislikpform">
					<img src="users/${$(this).attr('ch1')}/${$(this).attr('data-id')}" class="likpimg" width="80" alt="" />
					<p class="dislike_peoples_list2">${$(this).text()}</p>
				</div>
				<div class="dislikpbut">
					<button class="dislikpbtn">Նամակ</button>
				</div>
			</div>
			`)
		$('.dislikepeoples').append(div)
		if ($(this).attr("ch1")==$(this).attr("ch2")) {
			$('.dislikpbtn').remove()
		}
	});
});

// Քոմենթի ավելացում կոճակի միջոցով
$(document).on("click", ".combutcl", function() {
	let com = $(this).parents('.post-comment').find('input').val()
	let pid = $(this).parents('.post-content').data('id')
	if (com.length!=0) {
		$.ajax({
		    url:'server.php',
		    type:'post',
		    data:{action:'commentpost',com,pid},
		    success:(r)=>{
		    	r = JSON.parse(r)
		    	let url
    			if (r[0][3]==="avatar.png") {
    				url = `users/${r[0][3]}`
    			} else {
    				url = `users/${r[0][0]}/${r[0][3]}`
    			}
		    	let div = $(`<div class="post-comment">
								<img src="${url}" alt="" class="profile-photo-sm entcomm" />
								<p class="post-comment_p"><a href="timeline.html" class="profile-link class="post-comment_a"">${r[0][1]} ${r[0][2]}</a> ${com}</p>
							</div>`)
				$(this).parents('.post-detail').find('.add_comm').after(div)
				$(this).parents('.post-comment').find('input').val("")
				let comcnt = $(this).parent('.post-comment').parent('.post-detail').find('.cntcomm').find('.com_span').html()
				comcnt++
				$(this).parent('.post-comment').parent('.post-detail').find('.cntcomm').find('.com_span').html(comcnt)
		    }
		})
	}
})

// Քոմենթի ավելացում Enter-ի միջոցով
$(document).on('keyup','.fabll',function(e){
	if(e.which == 13) {
		let com = $(this).val()
		let pid = $(this).parents('.post-content').data('id')
		if (com.length!=0) {
			$.ajax({
			    url:'server.php',
			    type:'post',
			    data:{action:'commentpost',com,pid},
			    success:(r)=>{
			    	r = JSON.parse(r)
			    	let url
	    			if (r[0][3]==="avatar.png") {
	    				url = `users/${r[0][3]}`
	    			} else {
	    				url = `users/${r[0][0]}/${r[0][3]}`
	    			}
			    	let div = $(`<div class="post-comment">
									<img src="${url}" alt="" class="profile-photo-sm entcomm" />
									<p class="post-comment_p"><a href="timeline.html" class="profile-link class="post-comment_a"">${r[0][1]} ${r[0][2]}</a> ${com}</p>
								</div>`)
					$(this).parents('.post-detail').find('.add_comm').after(div)
					$(this).parents('.post-comment').find('input').val("")
					let comcnt = $(this).parent('.post-comment').parent('.post-detail').find('.cntcomm').find('.com_span').html()
					comcnt++
					$(this).parent('.post-comment').parent('.post-detail').find('.cntcomm').find('.com_span').html(comcnt)
			    }
			})
		}
	}
})


// Ընկերներիս քանակը

$.ajax({
    url:'server.php',
    type:'post',
    data:{action:'myfrcount'},
    success:(r)=>{
    	r = JSON.parse(r)
		$('.friend__count').html(r+' ընկեր')
    }
})

// Փոստի հեռացում
$(document).on('click','.del_post',function(){
	let pid = $(this).parents('.post-content').data('id')
	$.ajax({
	    url:'server.php',
	    type:'post',
	    data:{action:'del_this_post',pid}
	})
	$(this).parents('.post-content').remove()
})

// Փոստի խմբագրում
$(document).on('click','.edit_post',function(){
	let pid = $(this).parents('.post-content').data('id')
	$.ajax({
	    url:'server.php',
	    type:'post',
	    data:{action:'edit_this_post',pid}
	})
})




