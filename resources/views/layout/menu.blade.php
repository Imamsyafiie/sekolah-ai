<nav class="navbar navbar-expand-lg navbar-dark bg-dark ftco_navbar ftco-navbar-light" id="ftco-navbar">
	    <div class="container d-flex align-items-center">
	    	<a class="navbar-brand" href="/"> Nusantara</a>
				<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
	        <span class="oi oi-menu"></span> Menu
	      </button>
	      <div class="collapse navbar-collapse" id="ftco-nav">
	        <ul class="navbar-nav ml-auto">
	        	<li class="nav-item active"><a href="/" class="nav-link pl-0">Home</a></li>
	        	<li class="nav-item"><a href="/about" class="nav-link">Tema Proyek Nusantara</a></li>
	        	{{-- <li class="nav-item"><a href="/kuliner" class="nav-link">Produk Nusantara</a></li> --}}
				 <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="kulinerDropdown" role="button" 
                           data-bs-toggle="dropdown" aria-expanded="false">
                            Produk Nusantara
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="kulinerDropdown">
                            @foreach($categories as $category)
                                <li>
									 <div class="dropdown-divider"></div>
                                    <a class="dropdown-item" href="{{ route('kuliner.category', $category->id) }}">
                                        {{ $category->title }}
                                    </a>
                                </li>
                            @endforeach
                        </ul>
                    </li>
	        	{{-- <li class="nav-item"><a href="/kearifan" class="nav-link">Kearifan</a></li>
	        	<li class="nav-item"><a href="/jurnal" class="nav-link">Jurnal</a></li> --}}
	        	{{-- <li class="nav-item"><a href="/blog" class="nav-link">Proyek Siswa</a></li> --}}
<li class="nav-item dropdown">
  <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
    Proyek Nusantara
  </a>
  <div class="dropdown-menu" aria-labelledby="navbarDropdown">
    <a class="dropdown-item" href="/blog">Proyek Siswa</a>
    <div class="dropdown-divider"></div> <!-- Garis pemisah -->
    <a class="dropdown-item" href="/kearifan">Kearifan Nusantara</a>
    <div class="dropdown-divider"></div> <!-- Garis pemisah -->
    <a class="dropdown-item" href="/jurnal">Jurnal Nusantara</a>
  </div>
</li>




	          <li class="nav-item"><a href="/admin/login" class="nav-link">Register</a></li>
	        </ul>
	      </div>
	    </div>
	  </nav>