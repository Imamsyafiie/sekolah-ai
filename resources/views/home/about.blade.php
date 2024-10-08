@extends('layout.app')
 @section('content')
     <section class="hero-wrap hero-wrap-2" style="background-image: url('{{ asset ('template/images/4.jpeg')}}');">
      <div class="overlay"></div>
      <div class="container">
        <div class="row no-gutters slider-text align-items-center justify-content-center">
          <div class="col-md-9 ftco-animate text-center">
            <h1 class="mb-2 bread">About Us</h1>
            <p class="breadcrumbs"><span class="mr-2"><a href="index.html">Home <i class="ion-ios-arrow-forward"></i></a></span> <span>About us <i class="ion-ios-arrow-forward"></i></span></p>
          </div>
        </div>
      </div>
    </section>
		@include('layout.start')

<section class="container my-5">
    <div class="row justify-content-center mb-5">
        <div class="col-md-8 text-center heading-section ftco-animate">
            <h2 class="mb-4"><span>Tema </span> Nusantara</h2>
            <p>SPesona Nusantara memikat hati, menggugah rasa ingin tahu setiap pengunjung. Dengan keindahan alam yang melimpah dan budaya yang kaya, Nusantara adalah tempat di mana tradisi dan modernitas berpadu harmonis.</p>
        </div>
    </div>
<div class="row">
    @foreach ($tema as $abot)
        <div class="col-md-6 d-flex align-items-start flex-column mb-4">
            <div class="d-flex align-items-center mb-3">
                <img src="{{ Storage::url($abot->gambar) }}" alt="{{ $abot->judul }}" class="img-fluid mr-3" style="max-width: 150px;">
                <div>
                    <h5 class="mb-1">{{ $abot->judul }}</h5>
                    <p class="mb-2">{!! strip_tags($abot->text) !!}</p>
                </div>
            </div>
            <div class="w-100">
                <iframe width="100%" height="315" src="https://www.youtube.com/embed/{{ $abot->link }}" 
                    title="YouTube video player" frameborder="0" 
                    allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" 
                    allowfullscreen>
                </iframe>
            </div>
        </div>
    @endforeach
</div>
    </div>
</section>

         <section class="ftco-section ftco-counter img" id="section-counter" style="background-image: url({{ asset ('template/images/bg_4.jpg')}});" data-stellar-background-ratio="0.5">
    	<div class="container">
    		<div class="row justify-content-center mb-5 pb-2">
          <div class="col-md-8 text-center heading-section heading-section-black ftco-animate">
            <h2 class="mb-4"><span>Dengan kekayaan sejarah</span> dan Budaya selama berabad-abad</h2>
            <p>Nusantara terdiri dari ribuan pulau yang dipisahkan oleh laut luas, namun tetap bersatu oleh tradisi dan kekayaan alam yang melimpah. Ini adalah surga penuh keberagaman.</p>
          </div>
        </div>	
    		<div class="row d-md-flex align-items-center justify-content-center">
    			<div class="col-lg-10">
    				<div class="row d-md-flex align-items-center">
		          <div class="col-md d-flex justify-content-center counter-wrap ftco-animate">
		            <div class="block-18">
		            	<div class="icon"><span class="flaticon-doctor"></span></div>
		              <div class="text">
		                <strong class="number" data-number="{{ $totalUsers }}">{{ $totalUsers }}</strong>
		                <span>Total Pengguna</span>
		              </div>
		            </div>
		          </div>
		          <div class="col-md d-flex justify-content-center counter-wrap ftco-animate">
		            <div class="block-18">
		            	<div class="icon"><span class="flaticon-doctor"></span></div>
		              <div class="text">
		                <strong class="number" data-number="{{ $totalRolesSiswa }}">{{ $totalRolesSiswa }}</strong>
		                <span>Total Siswa</span>
		              </div>
		            </div>
		          </div>
		          <div class="col-md d-flex justify-content-center counter-wrap ftco-animate">
		            <div class="block-18">
		            	<div class="icon"><span class="flaticon-doctor"></span></div>
		              <div class="text">
		                <strong class="number" data-number="{{ $totalRolesGuru }}">{{ $totalRolesGuru }}</strong>
		                <span>Total Guru</span>
		              </div>
		            </div>
		          </div>
		          <div class="col-md d-flex justify-content-center counter-wrap ftco-animate">
		            <div class="block-18">
		            	<div class="icon"><span class="flaticon-doctor"></span></div>
		              <div class="text">
		                <strong class="number" data-number="{{ $totalAktivitas }}">{{ $totalAktivitas }}</strong>
		                <span>Total Jumlah Materi</span>
		              </div>
		            </div>
		          </div>
	          </div>
          </div>
        </div>
    	</div>
    </section>
	{{-- <section class="container my-5">
    <div class="row justify-content-center mb-5">
        <div class="col-md-8 text-center heading-section ftco-animate">
            <h2 class="mb-4"><span>Kearifan </span> Nusantara</h2>
            <p>Pesona Nusantara memikat hati, menggugah rasa ingin tahu setiap pengunjung. Dengan keindahan alam yang melimpah dan budaya yang kaya, Nusantara adalah tempat di mana tradisi dan modernitas berpadu harmonis.</p>
        </div>
    </div>
<div class="row justify-content-center">
    @foreach ($kearifan as $index => $ke)
        <div class="col-lg-10 col-md-12 d-flex flex-column flex-md-{{ $index % 2 == 0 ? 'row' : 'row-reverse' }} align-items-center mb-4">
            <!-- Bagian Teks -->
            <div class="flex-grow-1 px-4 text-center">
                <h5 class="mb-1">{{ $ke->title }}</h5>
                <p class="mb-2">{!! strip_tags($ke->description) !!}</p>
            </div>

            <!-- Bagian Iframe YouTube -->
            <div class="w-100">
                <iframe width="100%" height="315" src="https://www.youtube.com/embed/{{ $ke->link }}" 
                    title="YouTube video player" frameborder="0" 
                    allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" 
                    allowfullscreen>
                </iframe>
            </div>
        </div>
    @endforeach
</div>
</section> --}}



         @endsection