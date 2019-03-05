<?php 
require 'functions.php';

$id = $_GET["id"];


if (delete($id)>0) {
	echo "
			<script>
				alert('Selamat anda berhasil menghapus data!');
				document.location.href = 'index.php';
			</script>
		";
}else {
	echo "
			<script>
				alert('Maaf anda tidak dapat menghapus data!');
				document.location.href = 'index.php';
			</script>
		";
}


 ?>