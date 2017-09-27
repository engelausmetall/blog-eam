@extends('layouts.app')
@section('content')

<div class="col-lg-10 col-lg-offset-1">
<div class="thumbnail">
        <img style="with:100%;height: 200px;" class="thumbnail"
            src="{{route('blog.imagenes',$objBook->picture)}}" 
        alt="Imagen No Encontrada">
        <div class="caption">
            <h3>{{$objBook->title}}</h3>
            <p> {{$objBook->category->name}}</p>
            <p>{{$objBook->description}}</p>
            <p>
                <a href="/home" class="btn btn-primary" role="button">Regresar</a> 
                    &nbsp;<i class="fa fa-clock-o fa-spin"></i>
                    {{$objBook->created_at->diffForHumans()}}
            </p>
        </div>
</div>
<div id="disqus_thread"></div>
</div>


<script>
(function() { 
var d = document, s = d.createElement('script');
s.src = 'https://http-blog-dev-1.disqus.com/embed.js';
s.setAttribute('data-timestamp', +new Date());
(d.head || d.body).appendChild(s);
})();
</script>
<noscript>Please enable JavaScript to view the <a href="https://disqus.com/?ref_noscript">Powered Engel aus Metall</a></noscript>

@endsection