@extends ('users.app')
@section('content')
   <header class="masthead" style="background-image: url('users/img/home-bg.jpg')">
      <div class="overlay"></div>
      <div class="container">
        <div class="row">
          <div class="col-lg-8 col-md-10 mx-auto">
            <div class="site-heading">
              <h1>Clean Blog</h1>
              <span class="subheading">A Blog Theme by Start Bootstrap</span>
            </div>
          </div>
        </div>
      </div>
    </header>

    <!-- Main Content -->
    <div class="container">
      <div class="row">
        <div class="col-lg-8 col-md-10 mx-auto">
          @foreach($posts as $post)
          <hr>
          <div class="post-preview">
              <a href="{{route('post',$post->slug)}}">
                  <h2 class="post->title">
                      {{$post->title}}
                  </h2>
                  <h3 class="post-title">
                      {{$post->sub_title}}
                  </h3>
            
            </a>
            <p class="post-meta">Posted by
              <a href="#">Start Bootstrap</a>
              {{$post->created_at->diffForHumans()}}</p>
          </div>
          <hr>
          @endforeach
          <!-- Pager -->
          
          <nav aria-label="Page navigation example">
                   {{$pagination}}
                   <a class="btn btn-primary float-right" href="#">Older Posts &rarr;</a>
              
         </nav>
        </div>
      </div>
    </div>

    <hr>

@endsection

