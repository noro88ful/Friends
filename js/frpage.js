$.ajax({
    url:'server.php',
    type:'post',
    data:{action:'fr_page_info'},
    success:(r)=>{
    	r = JSON.parse(r)
    	console.log(r)
        $('.fr__name').html(`${r[0][1]} ${r[0][2]}`)
        if (r[0][3]!='avatar.png') {
            $('.profile-photo').attr('src',`users/${r[0][0]}/${r[0][3]}`)
        } else {
            $('.profile-photo').attr('src',`users/${r[0][3]}`)
        }
        if (r[0][4]!='cover.jpg') {
            $('.hidden__img img').attr('src',`users/${r[0][0]}/${r[0][4]}`)
            $('.timeline-cover').css('background-image',`url(users/${r[0][0]}/${r[0][4]})`).css(
                                     'background-position','center').css(
                                     'background-size','cover').css(
                                     'background-repeat','no-repeat')
        } else {
            $('.hidden__img img').attr('src',`users/${r[0][4]}`)
            $('.timeline-cover').css('background-image',`url(users/${r[0][4]})`).css(
                                     'background-position','center').css(
                                     'background-size','cover').css(
                                     'background-repeat','no-repeat')
        }

    }
})