<!DOCTYPE html>
<html>
	<head>

		<title>Soal 1</title>
		
	</head>
	<body class="container">
		<center><h4><big>Soal 1</big></h4><h3><small>One To Many</small></h3></center>
			@foreach ($dosen as $temp)
				<li><strong>Nama Dosen : </strong>{{$temp->nama}}</li><br>
				@foreach ($temp->mahasiswa as $tampung)
				<li><strong>Nama Mahasiswa : </strong>{{$tampung->nama_mahasiswa}}</li>
				@endforeach
			@endforeach
		</div>
	</body>
</html>