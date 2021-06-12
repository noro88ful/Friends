if ($('.fr__data').attr('fr_id')) {
	let fid = $('.fr__data').attr('fr_id')
	$.ajax({
		url:'server.php',
		type:'post',
		data:{action:'show_user_image',fid},
		success:(r)=>{
			if (r.length!=0) {
				r = JSON.parse(r)
				for (var i = 0; i < r.length; i++) {
					let div = $(`<a href="users/${r[0][1]}/${r[i][0]}" class="album__column" >
								    <img src="users/${r[0][1]}/${r[i][0]}" class="change_eq" width="300">
								  </a>`)
					$('.album-photos').append(div)
				}
			}
		}
	})
} else {
	$.ajax({
		url:'server.php',
		type:'post',
		data:{action:'show_user_image'},
		success:(r)=>{
			if (r.length!=0) {
				r = JSON.parse(r)
				for (var i = 0; i < r.length; i++) {
					let div = $(`<a href="users/${r[0][1]}/${r[i][0]}" class="album__column" >
								    <div class="album__hover">
								    	<div class="ph_icon">
											<span><i class="fa fa-pencil-alt photo_icon"></i></span>
										</div>
										<div class="pencil_div">
											<button class="modal_btn_del modbtncl" data-id="${r[i][0]}">Ջնջել</button>
											<button class="modal_btn_SetAv modbtncl" data-id="${r[i][0]}">Դարձնել ավատար</button>
											<button class="modal_btn_SetCo modbtncl" data-id="${r[i][0]}">Դարձնել ետնանկար</button>
										</div>
								    </div>
								    <img src="users/${r[0][1]}/${r[i][0]}" class="change_eq" width="300">
								  </a>`)
					$('.album-photos').append(div)
				}
			}
		}
	})
}


$(document).on("mouseenter", ".ph_icon", function() {
	let coord = $(this).parent('div').parent('a').position()
	let top = coord.top+10,left = coord.left+10
	$(this).parent('div').insertBefore($(this).parent('div').parent('a')).css('top',top+'px').css('left',left+'px')
	$(this).parent('div').find('.pencil_div').show()
});
$(document).on("mouseleave", ".pencil_div", function() {
	$(this).parent('div').find('.pencil_div').hide()
	$(this).parent('div').css('top',0).css('left',0).next().prepend($(this).parent('div'))
});

$(document).on('click','.modal_btn_SetAv',function(){
	// let imgurl = $(this).parent('div').parent('div').find('img').attr('src')
	let imgurl = $(this).attr('data-id')
	$.ajax({
		url:'server.php',
		type:'post',
		data:{action:'change_av_this',imgurl},
		success:(r)=>{
			window.location.reload(true)
		}
	})
})

$(document).on('click','.modal_btn_del',function(){
	let imgurl = $(this).attr('data-id')
	$.ajax({
		url:'server.php',
		type:'post',
		data:{action:'delete_av_this',imgurl},
		success:(r)=>{
			window.location.reload(true)
		}
	})
})

$(document).on('click','.modal_btn_SetCo',function(){
	let imgurl = $(this).attr('data-id')
	$.ajax({
		url:'server.php',
		type:'post',
		data:{action:'change_co_this',imgurl},
		success:(r)=>{
			window.location.reload(true)
		}
	})
})

// $('.timeline').on('click',function(){
//     $('.photo-av').load('timeline.php',function(){
//         $('#modalforavatar').modal({show:true});
//     });
// });

// $('.openn_avatar').on('click',function(){
//     $('.photo-av').load('timeline.php',function(){
//         $('#modalforavatar').modal({show:true});
//     });
// });

$('.img__zoom').click(function() {
let url = $(this).find('img').attr('src')
  $('#overlay__img')
    .css({backgroundImage: `url(${url})`})
    .addClass('open')
    .one('click', function() { $(this).removeClass('open'); });
});