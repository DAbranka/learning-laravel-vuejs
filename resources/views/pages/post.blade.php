@extends('/layouts/my-blog-layout')

@section('post')
    <article>
        <?= $post ?>
    </article>

    <a href="/posts">Go Back</a>
@endsection
