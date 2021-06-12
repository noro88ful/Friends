// FRIENDS REQUEST
$(document).on('click','#accept',function(){
	let count = $('.reqcount').html()
	count--
	$('.reqcount').html(count)
	if ($('.reqcount').html()==0) {
		$('.reqcount').html(" ")
	}
	let pid = $(this).attr('data-id')
	$.ajax({
	    url:'server.php',
	    type:'post',
	    data:{action:'accreq',pid},
	    success:(r)=>{
	        $(this).parents('.request_body').remove()
	    }
	})
})
$(document).on('click','#declare',function(){
	let pid = $(this).attr('data-id')
	let count = $('.reqcount').html()
	count--
	$('.reqcount').html(count)
	if ($('.reqcount').html()==0) {
		$('.reqcount').html(" ")
	}
	$.ajax({
	    url:'server.php',
	    type:'post',
	    data:{action:'decreq',pid},
	    success:(r)=>{
	    	$(this).parents('.request_body').remove()
	    }
	})
})

$(document).on('click','#send',function(){
	let pid = $(this).attr('data-id')
	$.ajax({
	    url:'server.php',
	    type:'post',
	    data:{action:'sendreq',pid},
	    success:(r)=>{
	    	$(this).html('Ուղարկված է')
	    }
	})
})

$(document).on('click','#declare2',function(){
	let pid = $(this).attr('data-id')
	$.ajax({
	    url:'server.php',
	    type:'post',
	    data:{action:'decreq2',pid},
	    success:(r)=>{
	    	$(this).html("Ուղարկել")
	        $(this).parent('div').find('#accept2').remove()
	    }
	})
})

$(document).on('click','#accept2',function(){
	let pid = $(this).attr('data-id')
	$.ajax({
	    url:'server.php',
	    type:'post',
	    data:{action:'accreq2',pid},
	    success:(r)=>{
	        $(this).html("Ընկերներ")
	        $(this).parent('div').find('#declare2').remove()
	    }
	})
})

// SEARCH FRIENDS
// Դեպք1

$(document).on('click','.accept_friend',function(){
	let pid = $(this).attr('data-id')
	$.ajax({
	    url:'server.php',
	    type:'post',
	    data:{action:'case1',pid},
	    success:(r)=>{
	        $(this).html('<i class="fa fa-user-check"></i>').removeClass('accept_friend').attr('title','Ընկերներ')
	        $(this).parent('div').find('.req_check2').html('<i class="fa fa-trash"></i>').removeClass('declare_friend').addClass('delete_friend').attr('title','Հեռացնել')
	    }
	})
})

$(document).on('click','.declare_friend',function(){
	let pid = $(this).attr('data-id')
	$.ajax({
	    url:'server.php',
	    type:'post',
	    data:{action:'case11',pid},
	    success:(r)=>{
	        $(this).html('<i class="fa fa-share-square"></i>').removeClass('declare_friend').addClass('send_request').attr('title','Ուղարկել')
	        $(this).parent('div').find('.req_check1').remove()
	    }
	})
})

// Դեպք2

$(document).on('click','.declare_request',function(){
	let pid = $(this).attr('data-id')
	$.ajax({
	    url:'server.php',
	    type:'post',
	    data:{action:'case2',pid},
	    success:(r)=>{
	        $(this).html('<i class="fa fa-share-square"></i>').removeClass('declare_friend').addClass('send_request').attr('title','Ուղարկել')
	        $(this).parent('div').find('.req_check1').remove()
	    }
	})
})

// Դեպք3

$(document).on('click','.delete_friend',function(){
	let pid = $(this).attr('data-id')
	$.ajax({
	    url:'server.php',
	    type:'post',
	    data:{action:'case3',pid},
	    success:(r)=>{
	    	$(this).html('<i class="fa fa-share-square"></i>').removeClass('delete_friend').addClass('send_request').attr('title','Ուղարկել')
	        $(this).parent('div').find('.req_check1').remove()
	    }
	})
})

// Դեպք4

$(document).on('click','.send_request',function(){
	let pid = $(this).attr('data-id')
	$.ajax({
	    url:'server.php',
	    type:'post',
	    data:{action:'case4',pid},
	    success:(r)=>{
	        $(this).html('<i class="fa fa-vote-yea"></i>').removeClass('send_request req_check2').addClass('req_check1').attr('title','Ուղարկված է')
	        let button = $(`<button class="req_btn req_check2 declare_request" data-id="" title="Չեղարկել"><i class="fa fa-times"></i></button>`)
	        $(this).parent('div').append(button)
	    }
	})
})

