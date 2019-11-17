@extends('template_blog.content')
@section('isi')
<!-- post -->
@foreach($data as $data_list)
<div class="post post-row">
	<a class="post-img" href="{!! route('blog.isi', $data_list->slug) !!}"><img src="{{ asset($data_list->gambar) }}" alt="image"></a>
	<div class="post-body">
		<div class="post-category">
			<a href="category.html">{!! $data_list->category->name !!}</a>
		</div>
		<h3 class="post-title"><a href="blog-post.html">{!! $data_list->judul !!}</a></h3>
		<ul class="post-meta">
			<li><a href="author.html">{!! $data_list->users->name !!}</a></li>
			<li>{!! $data_list->created_at !!}</li>
		</ul>
		
	</div>
</div>
@endforeach
<center>
{{ $data->links() }}
</center>
<!-- /post -->

@stop