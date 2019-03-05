$(document).ready(function() {
	// menghilangkan tombil search
	$('#tombolsearch').hide();

	// buat event ketika keyword ditulis
	$('#keyword').on('keyup', function() {

		// munculkan icon loading
		$('.loader').show();


		// ajax menggunakan load
		// $('#container').load('ajax/anime.php?keyword=' + $('#keyword').val());

		// $.get()
		$.get('ajax/anime.php?keyword=' + $('#keyword').val(), function(data) {
			$('#container').html(data);

			$('.loader').hide();
		});
	});
});