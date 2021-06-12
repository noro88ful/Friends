$.ajax({
    url:'server.php',
    type:'post',
    data:{action:'showmessages'},
    success:(r)=>{
    	r = JSON.parse(r)
    	console.log(r)
    	for (var i = 0; i < r.length; i++) {
    		// դնել user-ի կարգավիճակը online,offline,inactive
	    	let div = $(`<li class="contact">
							<div class="wrap">
								<span class="contact-status online"></span>
								<img src="users/${r[i][3]}" class="take_user_img" alt="" data-id="${r[i][0]}" />
								<div class="meta">
									<p class="name">${r[i][1]} ${r[i][2]}</p>
									<p class="preview">Message_preview</p>
								</div>
							</div>
						</li>`)
	    	if (r[i][3]==="avatar.png") {
				div.find('.take_user_img').attr('src',`users/${r[i][3]}`)
	    	} else {
				div.find('.take_user_img').attr('src',`users/${r[i][0]}/${r[i][3]}`)
	    	}
	  //   	let url
			// if (c[j][2]==="avatar.png") {
			// 	url = `users/${c[j][2]}`
			// } else {
			// 	url = `users/${c[j][3]}/${c[j][2]}`
			// }
	    	$('#contacts').find('ul').append(div)
    	}
    	$('#contacts').find('ul').find('li:first-child').addClass('active')
    }
})

$(window).on('load', function() {
    let val = $('#contacts').find('.contact')
	val.each(function(){
		if ($(this).hasClass('active')) {
			$('.contact-profile').find('p').html($(this).find('.name').html())
			$('.contact-profile').find('img').attr('src',$(this).find('img').attr('src')).attr('data-id',$(this).find('img').attr('data-id'))
		}
	});
	let pid = $('.contact-profile').find('img').attr('data-id')
	$.ajax({
	    url:'server.php',
	    type:'post',
	    data:{action:'showmessages_with_p',pid},
	    success:(r)=>{
	    	r = JSON.parse(r)
			let id = r[0][4]
			if (r[0].length==5) {
		    	for (var i = 0; i < r.length; i++) {
		    		if (r[i][2]==id) {
		    			let li = $(`<li class="sent">
										<img src="${$('#sidepanel').find('#profile img').attr('src')}" alt="" />
										<p>${r[i][1]}</p>
									</li>`)
		    			$('#messages_ul').append(li)
		    		} else {
		    			let li = $(`<li class="replies">
										<img src="${$('.contact-profile').find('img').attr('src')}" alt="" />
										<p>${r[i][1]}</p>
									</li>`)
		    			$('#messages_ul').append(li)
		    		}
		    	}
				let items = document.querySelectorAll('#messages_ul li')
				if (items.length!=0) {
					let scr = items[items.length-1];
					scr.scrollIntoView();
				}
			}
	    }
	})
})

let gint 
$(document).on('click','.contact .wrap',function(){
	clearInterval(gint)
	let ul = $(`<ul id="messages_ul"></ul>`)
	$('.messages').empty()
	$('.messages').append(ul)
	if ($('.contact').hasClass('active')) {
		$('.contact').not($(this)).removeClass('active')
	}
	$(this).parent('.contact').toggleClass('active')
	$('.contact-profile').find('p').html($(this).find('.name').html())
	$('.contact-profile').find('img').attr('src',$(this).find('img').attr('src')).attr('data-id',$(this).find('img').attr('data-id'))
	let pid = $('.contact-profile').find('img').attr('data-id')
	function interval(){
		$.ajax({
		    url:'server.php',
		    type:'post',
		    data:{action:'showmessages_with_p',pid},
		    success:(r)=>{
		    	$('#messages_ul').empty()
		    	r = JSON.parse(r)
				let id = r[0][4]
				if (r[0].length==5) {
			    	for (var i = 0; i < r.length; i++) {
			    		if (r[i][2]==id) {
			    			let li = $(`<li class="sent">
											<img src="${$('.take_url').attr('src')}" alt="" />
											<p>${r[i][1]}</p>
										</li>`)
			    			$('#messages_ul').append(li)
			    		} else {
			    			let li = $(`<li class="replies">
											<img src="${$('.take_user_img').attr('src')}" alt="" />
											<p>${r[i][1]}</p>
										</li>`)
			    			$('#messages_ul').append(li)
			    		}
			    	}
				}
		    }
		})
	}
	interval()
	gint = setInterval(interval,1000)
})

function newMessage() {
	let message = $(".message-input input").val();
	let ava = $('#profile .wrap img').attr('src')
	let pid = $('.contact-profile img').attr('data-id')
	if($.trim(message) == '') {
		return false;
	}
	$(`<li class="sent"><img src="${ava}" alt="" /><p>${message}</p></li>`).appendTo($('#messages_ul'));
	$('.message-input input').val(null);
	$('.contact.active .preview').html('<span>You: </span>' + message);
	let items = document.querySelectorAll('#messages_ul li')
	if (items.length!=0) {
		let scr = items[items.length-1];
		scr.scrollIntoView();
	}
};
$('.send_mess').click(function(){
	let message = $('.message-input input').val()
	let pid = $('.contact-profile img').attr('data-id')
	newMessage();
	if (!$.trim(message) == '') {
		$.ajax({
		    url:'server.php',
		    type:'post',
		    data:{action:'send_mess_p',message,pid},
		})
	}
})
$(window).on('keydown', function(e) {
	let message = $('.message-input input').val()
	let pid = $('.contact-profile img').attr('data-id')
	if (e.which == 13) {
		newMessage();
		$.ajax({
		    url:'server.php',
		    type:'post',
		    data:{action:'send_mess_p',message,pid},
		})
	}
});
