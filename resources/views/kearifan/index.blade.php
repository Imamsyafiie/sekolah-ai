  @extends('layout.app')
 @section('content')
  <section class="hero-wrap hero-wrap-2" style="background-image: url('{{ asset ('template/images/2.jpg')}}');">
      <div class="overlay"></div>
      <div class="container">
        <div class="row no-gutters slider-text align-items-center justify-content-center">
          <div class="col-md-9 ftco-animate text-center">
            <h1 class="mb-2 bread">Kearifan Nusantara</h1>
            <p class="breadcrumbs"><span class="mr-2"><a href="/">Home <i class="ion-ios-arrow-forward"></i></a></span> <span>Kearifan Nusantara <i class="ion-ios-arrow-forward"></i></span></p>
          </div>
        </div>
      </div>
    </section>
		
		<section class="container my-5">
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
                <p class="mb-2">{!! ($ke->description) !!}</p>
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
</section>
   @endsection