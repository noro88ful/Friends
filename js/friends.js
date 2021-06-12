if ($('.fr__data').attr('fr_id')) {
	let fid = $('.fr__data').attr('fr_id')
	$.ajax({
	    url:'server.php',
	    type:'post',
	    data:{action:'showfriends',fid},
	    success:(r)=>{
	    	r = JSON.parse(r)
	    	console.log(r)
	    	for (var i = 0; i < r.length; i++) {
		    	let div = $(`<div class="col-md-6 col-sm-6 frndcrd">
			                    <div class="friend-card">
			                      <img src="users/${r[i][4]}" alt="profile-cover" class="img-responsive cover srch_cov" />
			                      <div class="card-info">
			                        <img src="users/${r[i][3]}" alt="user" class="profile-photo-lg srch_ava" />
			                        <div class="friend-info">
			                          <h5><a href="" class="profile-link add_link" target="_blank" data-id="${r[i][0]}">${r[i][1]} ${r[i][2]}</a></h5>
			                        </div>
			                      </div>
			                    </div>
			                  </div>`)
		    	if ($('.my_id').attr('id_my')==r[i][0]) {
		    		div.find('.add_link').attr('href',`http://localhost/Web/timeline.php`)
		    	} else {
		    		div.find('.add_link').attr('href',`http://localhost/Web/friend.php?id=${r[i][0]}`)
		    	}
		    	// console.log(div.find('.srch_ava').attr('src'))
			    if (div.find('.srch_cov').attr('src')!="users/cover.jpg") {
			    	div.find('.srch_cov').attr('src',`users/${r[i][0]}/${r[i][4]}`)
			    }
		    	if (div.find('.srch_ava').attr('src')!="users/avatar.png") {
			    	div.find('.srch_ava').attr('src',`users/${r[i][0]}/${r[i][3]}`)
			    }
		    	$('.friendshow').append(div)
	    	}
	    }
	})
} else {
	$.ajax({
	    url:'server.php',
	    type:'post',
	    data:{action:'showfriends'},
	    success:(r)=>{
	    	r = JSON.parse(r)
	    	console.log(r)
	    	for (var i = 0; i < r.length; i++) {
		    	let div = $(`<div class="col-md-6 col-sm-6 frndcrd">
			                    <div class="friend-card">
			                      <img src="users/${r[i][4]}" alt="profile-cover" class="img-responsive cover srch_cov" />
			                      <div class="card-info">
			                        <img src="users/${r[i][3]}" alt="user" class="profile-photo-lg srch_ava" />
			                        <div class="friend-info">
			                          <button class="pull-right frndbutt" data-id="${r[i][0]}">Հեռացնել</button>
			                          <h5><a href="" class="profile-link add_link" target="_blank" data-id="${r[i][0]}">${r[i][1]} ${r[i][2]}</a></h5>
			                        </div>
			                      </div>
			                    </div>
			                  </div>`)
		    	div.find('.add_link').attr('href',`http://localhost/Web/friend.php?id=${r[i][0]}`)
		    	// console.log(div.find('.srch_ava').attr('src'))
			    if (div.find('.srch_cov').attr('src')!="users/cover.jpg") {
			    	div.find('.srch_cov').attr('src',`users/${r[i][0]}/${r[i][4]}`)
			    }
		    	if (div.find('.srch_ava').attr('src')!="users/avatar.png") {
			    	div.find('.srch_ava').attr('src',`users/${r[i][0]}/${r[i][3]}`)
			    }
		    	$('.friendshow').append(div)
	    	}
	    }
	})
}


$(document).on('click','.frndbutt',function(){
	let id = $(this).data('id')
	$.ajax({
	    url:'server.php',
	    type:'post',
	    data:{action:'delfriend',id},
	    success:(r)=>{
	    	$(this).parents('.frndcrd').remove()
	    }
	})
})

// FRIENDS PAGES

// $(document).on('click','.add_link',function(){
// 	let fid = $(this).attr('data-id')
// 	$(window).ready(function() {
// 		$.ajax({
// 		    url:'server.php',
// 		    type:'post',
// 		    data:{action:'take_friend_info',fid},
// 		    success:(r)=>{
// 		    	r = JSON.parse(r)
// 		    	// console.log(r)
// 		    	// $(this).parents('.frndcrd').remove()
// 		    }
// 		})
//     });
// })