@extends('layout.app')
 @section('content')
     <section class="home-slider owl-carousel">
      <div class="slider-item" style="background-image:url({{ asset ('template/images/bg_1.jpg')}});">
      	<div class="overlay"></div>
        <div class="container">
          <div class="row no-gutters slider-text align-items-center justify-content-center" data-scrollax-parent="true">
          <div class="col-md-8 text-center ftco-animate">
            <h1 class="mb-4">Kids Are The Best <span>Explorers In The World</span></h1>
            <p><a href="#" class="btn btn-secondary px-4 py-3 mt-3">Read More</a></p>
          </div>
        </div>
        </div>
      </div>

      <div class="slider-item" style="background-image:url({{ asset ('template/images/bg_2.jpg')}});">
      	<div class="overlay"></div>
        <div class="container">
          <div class="row no-gutters slider-text align-items-center justify-content-center" data-scrollax-parent="true">
          <div class="col-md-8 text-center ftco-animate">
            <h1 class="mb-4">Perfect Learned<span> For Your Child</span></h1>
            <p><a href="#" class="btn btn-secondary px-4 py-3 mt-3">Read More</a></p>
          </div>
        </div>
        </div>
      </div>
    </section>

    <section class="ftco-services ftco-no-pb">
			<div class="container-wrap">
				<div class="row no-gutters">
          <div class="col-md-3 d-flex services align-self-stretch pb-4 px-4 ftco-animate bg-primary">
            <div class="media block-6 d-block text-center">
              <div class="icon d-flex justify-content-center align-items-center">
            		<span class="flaticon-teacher"></span>
              </div>
              <div class="media-body p-2 mt-3">
                <h3 class="heading">Seni Budaya Nusantara</h3>
                <p>Seni budaya Nusantara adalah kekayaan yang memancarkan keindahan dan kearifan lokal, mencerminkan jiwa bangsa.</p>
              </div>
            </div>      
          </div>
          <div class="col-md-3 d-flex services align-self-stretch pb-4 px-4 ftco-animate bg-tertiary">
            <div class="media block-6 d-block text-center">
              <div class="icon d-flex justify-content-center align-items-center">
            		<span class="flaticon-reading"></span>
              </div>
              <div class="media-body p-2 mt-3">
                <h3 class="heading">Tokoh Lokal Nusantara</h3>
                <p>Tokoh lokal Nusantara menginspirasi masyarakat dengan perjuangan dan dedikasi yang menciptakan perubahan positif.</p>
              </div>
            </div>    
          </div>
          <div class="col-md-3 d-flex services align-self-stretch pb-4 px-4 ftco-animate bg-fifth">
            <div class="media block-6 d-block text-center">
              <div class="icon d-flex justify-content-center align-items-center">
            		<span class="flaticon-books"></span>
              </div>
              <div class="media-body p-2 mt-3">
                <h3 class="heading">Kuliner Khas Nusantara</h3>
                <p>Kuliner khas Nusantara menyajikan cita rasa unik, menggugah selera, dan memadukan rempah-rempah yang kaya.</p>
              </div>
            </div>      
          </div>
          <div class="col-md-3 d-flex services align-self-stretch pb-4 px-4 ftco-animate bg-quarternary">
            <div class="media block-6 d-block text-center">
              <div class="icon d-flex justify-content-center align-items-center">
            		<span class="flaticon-diploma"></span>
              </div>
              <div class="media-body p-2 mt-3">
                <h3 class="heading">Busana Tradisional Nusantara</h3>
                <p>Busana tradisional Nusantara memancarkan keindahan dan keberagaman, melestarikan warisan nenek moyang yang kaya.</p>
              </div>
            </div>      
          </div>
        </div>
			</div>
		</section>
		
		@include('layout.start')
<section class="ftco-section ftco-no-pb">
			<div class="container">
				<div class="row justify-content-center mb-5 pb-2">
          <div class="col-md-8 text-center heading-section ftco-animate">
            <h2 class="mb-4"><span>Daftar</span> Guru Nusantara</h2>
            {{-- <p>Separated they live in. A small river named Duden flows by their place and supplies it with the necessary regelialia. It is a paradisematic country</p> --}}
          </div>
        </div>	
				<div class="row">
					@foreach ($gurus as $guru)
					<div class="col-md-6 col-lg-3 ftco-animate">
						<div class="staff">
							<div class="img-wrap d-flex align-items-stretch">
								<div class="img align-self-stretch" style="background-image: url({{ Storage::url($guru->user->avatar_url) }});"></div>
							</div>
							<div class="text pt-3 text-center">
								<h3>{{ $guru->user->name }}</h3>
								<span class="position mb-2">{{ $guru->user->getRoleNames()->implode(', ') }}</span>
								<div class="faded">
									<p>Nusantara adalah negeri kaya budaya, alam indah, dan keragaman suku bangsa.</p>
									<ul class="ftco-social text-center">
		                <li class="ftco-animate"><a href="#"><span class="icon-twitter"></span></a></li>
		                <li class="ftco-animate"><a href="#"><span class="icon-facebook"></span></a></li>
		                <li class="ftco-animate"><a href="#"><span class="icon-google-plus"></span></a></li>
		                <li class="ftco-animate"><a href="#"><span class="icon-instagram"></span></a></li>
		              </ul>
	              </div>
							</div>
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
            <h2 class="mb-4"><span>Dengan kekayaan sejarah</span> dan budaya selama berabad-abad</h2>
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
     <section class="ftco-section">
    	<div class="container">
    		<div class="row justify-content-center mb-5 pb-2">
          <div class="col-md-8 text-center heading-section ftco-animate">
            <h2 class="mb-4"><span>Tema</span> Proyek Nusantara</h2>
            <p>Tema proyek Nusantara kumpulan karya siswa yang disesuaikan dengan beberapa pilihan judul tema nusantara.</p>
          </div>
        </div>
    		<div class="row">
        	<div class="col-md-6 col-lg-3 ftco-animate">
        		<div class="pricing-entry bg-light pb-4 text-center">
        			<div>
	        			<h3 class="mb-3">Seni Budaya Nusantara</h3>
	        			{{-- <p><span class="price">$24.50</span> <span class="per">/ 5mos</span></p> --}}
	        		</div>
	        		<div class="img" style="background-image: url({{ asset ('template/images/bg_1.jpg')}});"></div>
	        		<div class="px-4">
	        			<p>Seni budaya Nusantara adalah kekayaan yang memancarkan keindahan, keragaman, dan kearifan lokal, mencerminkan jiwa bangsa serta warisan nenek moyang kita.</p>
        			</div>
        			<p class="button text-center"><a href="{{ route('blogs.category', ['tema' => 'Seni Budaya Nusantara']) }}" class="btn btn-primary px-4 py-3">Lihat Karya</a></p>
        		</div>
        	</div>
        	<div class="col-md-6 col-lg-3 ftco-animate">
        		<div class="pricing-entry bg-light pb-4 text-center">
        			<div>
	        			<h3 class="mb-3">Kuliner Khas Nusantara</h3>
	        			{{-- <p><span class="price">$34.50</span> <span class="per">/ 5mos</span></p> --}}
	        		</div>
	        		<div class="img" style="background-image: url({{ asset ('template/images/bg_2.jpg')}});"></div>
        			<div class="px-4">
	        			<p>Kuliner khas Nusantara menyajikan cita rasa unik, menggugah selera, dan memadukan rempah-rempah, mencerminkan kekayaan budaya serta tradisi yang beragam di setiap daerah.</p>
        			</div>
        			<p class="button text-center"><a href="{{ route('blogs.category', ['tema' => 'Kuliner Khas Nusantara']) }}" class="btn btn-secondary px-4 py-3">Lihat Karya</a></p>
        		</div>
        	</div>
        	<div class="col-md-6 col-lg-3 ftco-animate">
        		<div class="pricing-entry bg-light active pb-4 text-center">
        			<div>
	        			<h3 class="mb-3">Tokoh Lokal Nusantara</h3>
	        			{{-- <p><span class="price">$54.50</span> <span class="per">/ 5mos</span></p> --}}
	        		</div>
	        		<div class="img" style="background-image: url({{ asset ('template/images/bg_3.jpg')}});"></div>
        			<div class="px-4">
	        			<p>Tokoh lokal Nusantara menginspirasi masyarakat dengan perjuangan dan dedikasi, memperkuat identitas budaya serta menciptakan perubahan positif bagi komunitas dan bangsa.</p>
        			</div>
        			<p class="button text-center"><a href="{{ route('blogs.category', ['tema' => 'Tokoh Lokal Nusantara']) }}" class="btn btn-tertiary px-4 py-3">Lihat Karya</a></p>
        		</div>
        	</div>
        	<div class="col-md-6 col-lg-3 ftco-animate">
        		<div class="pricing-entry bg-light pb-4 text-center">
        			<div>
	        			<h3 class="mb-3">Busana Tradisional Nusantara</h3>
	        			{{-- <p><span class="price">$89.50</span> <span class="per">/ 5mos</span></p> --}}
	        		</div>
	        		<div class="img" style="background-image: url({{ asset ('template/images/bg_5.jpg')}});"></div>
        			<div class="px-4">
	        			<p>Busana tradisional Nusantara memancarkan keindahan dan keberagaman, mencerminkan identitas budaya setiap daerah, serta melestarikan warisan nenek moyang yang penuh makna.</p>
        			</div>
        			<p class="button text-center"><a href="{{ route('blogs.category', ['tema' => 'Busana Tradisional Nusantara']) }}" class="btn btn-quarternary px-4 py-3">Lihat Karya</a></p>
        		</div>
        	</div>
        </div>
    	</div>
    </section>

		<section class="ftco-section bg-light">
			<div class="container">
				<div class="row justify-content-center mb-5 pb-2">
          <div class="col-md-8 text-center heading-section ftco-animate">
            <h2 class="mb-4"><span>Recent</span> Proyek</h2>
            <p>Melalui perpaduan teknologi modern dan pelestarian tradisi, kami membantu siswa-siswi mengembangkan keterampilan abad ke-21 yang mereka butuhkan untuk menghadapi dunia global, tanpa melupakan identitas dan warisan budaya mereka.</p>
          </div>
        </div>
				<div class="row">
					@foreach ($blogs as $blog)
          <div class="col-md-6 col-lg-4 ftco-animate">
            <div class="blog-entry">
              <a href="blog-single.html" class="block-20 d-flex align-items-end" style="background-image: url('{{ Storage::url($blog->image) }}');">
								<div class="meta-date text-center p-2">
                  <span class="mos"> {{ date('d F Y', strtotime($blog->publish_date)) }}</span>
                </div>
              </a>
              <div class="text bg-white p-4">
                <h3 class="heading"><a href="{{ route('blogs.show', ['id' => $blog->id]) }}">{{ $blog->nilai->judul }}</a></h3>
                <p>{!! strip_tags(Str::limit($blog->nilai->deskripsi, 94)) !!}</p>
                <div class="d-flex align-items-center mt-4">
	                <p class="mb-0"><a href="{{ route('blogs.show', ['id' => $blog->id]) }}" class="btn btn-secondary">Read More <span class="ion-ios-arrow-round-forward"></span></a></p>
	                <p class="ml-auto mb-0">
	                	<a href="#" class="mr-2">{{ $blog->nilai->siswa->name }}</a>
	                </p>
                </div>
              </div>
            </div>
          </div>
            @endforeach
         
          </div>
        </div>
			</div>
		</section>
		<section class="ftco-services ftco-no-pb bg-light">
			<div class="row justify-content-center mb-5">
        <div class="col-md-8 text-center heading-section ftco-animate">
            <h2 class="mb-4"><span>Mitra </span> Nusantara</h2>
            <p>Pesona Nusantara memikat hati, menggugah rasa ingin tahu setiap pengunjung. Dengan keindahan alam yang melimpah dan budaya yang kaya, Nusantara adalah tempat di mana tradisi dan modernitas berpadu harmonis.</p>
        </div>
    </div>
    <div class="container-wrap">
        <div class="row no-gutters">
            @foreach ($mitras as $mitra)
            <div class="col-md-3 col-sm-6 d-flex services align-self-stretch pb-4 px-4 ftco-animate mb-4">
                <div class="media block-6 d-block text-center" 
                     style="height: 100%; background-color: #3889da; border-radius: 10px; box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);">
                    <div class="icon d-flex justify-content-center align-items-center">
                        <img src="{{ Storage::url($mitra->image) }}" alt="Logo" style="max-width: 100px;">
                    </div>
                    <div class="media-body p-2 mt-3">
                        <h3>{{ $mitra->title }}</h3>
                        <p>{{ $mitra->description }}</p>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>
<section class="ftco-section bg-light">
	<div class="row justify-content-center mb-5">
        <div class="col-md-8 text-center heading-section ftco-animate">
            <h2 class="mb-4"><span>Agenda </span> Proyek Nusantara</h2>
           
        </div>
    </div>
    <div class="container">
        <div id="calendar" style="max-width: 800px; margin: auto; height: 400px;"></div>
    </div>
</section>
<script src="https://cdn.jsdelivr.net/npm/fullcalendar@5.10.1/main.js"></script>
  <script>
        document.addEventListener('DOMContentLoaded', function() {
            var calendarEl = document.getElementById('calendar');
            var calendar = new FullCalendar.Calendar(calendarEl, {
                initialView: 'dayGridMonth',
                events: @json($events), // Gunakan data acara yang dikirim dari controller
            });
            calendar.render();
        });
    </script>
         @endsection