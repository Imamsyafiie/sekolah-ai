  @extends('layout.app')
 @section('content')
  <section class="hero-wrap hero-wrap-2" style="background-image: url('{{ asset ('template/images/bg_2.jpg')}}');">
      <div class="overlay"></div>
      <div class="container">
        <div class="row no-gutters slider-text align-items-center justify-content-center">
          <div class="col-md-9 ftco-animate text-center">
            <h1 class="mb-2 bread">Kuliner Single</h1>
             <p class="breadcrumbs"><span class="mr-2"><a href="/">Home <i class="ion-ios-arrow-forward"></i></a></span> <span class="mr-2"><a href="index.html">Kuliner <i class="ion-ios-arrow-forward"></i></a></span> <span>Kuliner Single <i class="ion-ios-arrow-forward"></i></span></p>
          </div>
        </div>
      </div>
    </section>
		
		<section class="ftco-section">
			<div class="container">
				<div class="row">
          <div class="col-lg-8 ftco-animate">
            <h2 class="mb-3">{{ $kuliners->title }} Rp.{{ number_format($kuliners->price, 0, ',', '.') }}</h2>
            <p>{!! strip_tags($kuliners->text) !!}</p>
             <!-- Menambahkan iframe YouTube di bawah deskripsi -->
    {{-- <div class="embed-responsive embed-responsive-16by9">
         <iframe class="w-100" height="315" src="https://www.youtube.com/embed/{{ $kuliners->nilai->text }}" 
		frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" 
		allowfullscreen>
</iframe>
    </div> --}}
          </div> <!-- .col-md-8 -->

          <div class="col-lg-4 sidebar ftco-animate">
            <div class="sidebar-box">
              <h3>Contact Penjual</h3>
             
              <ul>
                <div class="text-center mt-3">
                     <a href="https://wa.me/{{ '62' . ltrim($kuliners->nomor_hp, '0') }}?text={{ urlencode('Halo, saya tertarik dengan kuliner ini') }}" class="btn btn-primary float-left">
                    <i class="fa fa-whatsapp"></i> WhatsApp 
                      </a>
                  </div>
              </ul>
            </div>
            <div class="sidebar-box ftco-animate">
            	<h3>Category</h3>
              <ul class="categories">
                        @foreach($categories as $category)
                           
                      <li><a href="{{ route('kuliner.category', $category->id) }}">{{ $category->title }}</a></li>
                         
                        @endforeach
              </ul>
            </div>

            <div class="sidebar-box ftco-animate">
              <h3>Post Terbaru</h3>
              @foreach ($recentKuliners as $kuliner)
              <div class="block-21 mb-4 d-flex">
                <a class="blog-img mr-4" style="background-image: url({{ Storage::url($kuliner->image) }});"></a>
                <div class="text">
                  <h3 class="heading"><a href="{{ route('kuliner.show', ['id' => $kuliner->id]) }}">{{ $kuliner->title }}</</a></h3>
                  <div class="meta">
                    <div><a href="{{ route('kuliner.show', ['id' => $kuliner->id]) }}"><span class="icon-calendar"></span> {{ date('d F Y', strtotime($kuliner->published_at)) }}</a></div>
                    <div><a href="{{ route('kuliner.show', ['id' => $kuliner->id]) }}"><span class="icon-person"></span>{{ $kuliner->user->name }}</a></div>
                  </div>
                </div>
              </div>
            @endforeach
            </div> 
          </div><!-- END COL -->
        </div>
			</div>
		</section>
         @endsection