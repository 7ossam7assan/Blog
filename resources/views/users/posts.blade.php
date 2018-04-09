@extends ('users.app')
@section('content')
<!--<div id="fb-root"></div>-->
<script>(function (d, s, id) {
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id))
            return;
        js = d.createElement(s);
        js.id = id;
        js.src = 'https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.12&appId=628182124180534&autoLogAppEvents=1';
        fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));</script>
<header class="masthead" style="background-image: url('http://localhost/blgpro/public/imgs/{{$slug->img}}')">
    <div class="overlay"></div>
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-10 mx-auto">
                <div class="post-heading">
                    <h1>{{$slug->title}}</h1>
                    <h2 class="subheading">{{$slug->sub_title}}</h2>
                    <span class="meta">Posted by
                        <a href="#">Start Bootstrap</a>
                        {{$slug->created_at->diffForHumans()}}</span>
                </div>
            </div>
        </div>
    </div>
</header>

<!-- Post Content -->
<article>
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-10 mx-auto">
                <h3>Categories</h3>
                @foreach($slug->categories as $category)
                <a href="{{route('category',$category->slug)}}">
                    <small class="pull-left" style="margin: 6px;border: 1px solid gray;padding: 3px;border-radius: 5px">
                        {{$category->name}}
                    </small>
                </a>
                @endforeach
                <br>
                {!!$slug->body!!}
                <br>
                <h3>Tags</h3>
                @foreach($slug->tags as $tag)
                <a href="{{route('tag',$tag->slug)}}">
                    <small class="pull-left" style="margin: 6px;border: 1px solid gray;padding: 3px;border-radius: 5px">
                        {{$tag->name}}
                    </small>
                </a>
                @endforeach
            </div>
            <div class="fb-comments" data-href="{{Request::url()}}" data-numposts="10"></div>
        </div>
    </div>
</article>

<hr>
@endsection
