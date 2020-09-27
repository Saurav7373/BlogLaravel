@extends('user/app')

@section('bg-img',Storage::disk('local')->url($slug->image))
@section('title',$slug->title )
@section('sub-heading', $slug->subtitle)

@section('main-content')
<div id="fb-root"></div>
<script async defer crossorigin="anonymous" src="https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v8.0&appId=252760922692454&autoLogAppEvents=1" nonce="3cTAsdiG"></script>
<article>
  <div class="container">
    <div class="row">

      <div class="col-lg-8 col-md-10 mx-auto">

        <i><small style="margin-right: 15px"> <b>Created at {{ $slug->created_at->diffForHumans() }}</b></small></i>
        <br>
        <h5>Categories</h5>
        @foreach($slug->categories as $category)

        <i><small style="margin-right: 5px"> <b>
              <a href="{{ route('category',$category->slug) }}">{{ $category->name }}</a>
            </b>
          </small>
        </i>

        @endforeach
        <br>
        {!! htmlspecialchars_decode($slug->body) !!}

        <!-- Tags -->
        <h5>Tag Clouds</h5>
        @foreach($slug->tags as $tag)

        <i> <a href="{{ route('tag',$tag->slug) }}"><small style="margin-right: 5px;border-radius:5px;border:1px solid grey;padding: 5px"> <b>{{ $tag->name }}</b></small></a></i>

        @endforeach

      </div>
      <div class="fb-comments" data-href={{ Request::url()}}"" data-numposts="5" data-width=""></div>
    </div>
  </div>
</article>

<hr>
@endsection