$('.swal').click(function(){
	swal({
	  title: "Համոզվա՞ծ եք",
	  text: "Ցանկանո՞ւմ եք դուրս գալ կայքից",
	  icon: "warning",
	  buttons: true,
	  dangerMode: true,
	})
	.then((willDelete) => {
	  if (willDelete) {
	     window.location.href='index.php';
	  }
	});
	$('.swal-button--confirm').html('Այո,դուրս գալ!').css('background-color','#d33')
	$('.swal-button--cancel').html('Ոչ, մնալ կայքում!').css('background-color','#3085d6').css('color','white')
})
