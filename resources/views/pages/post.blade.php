@extends('/layouts/my-blog-layout')

@section('post')
    <article>
        {{-- * My First Post --}}
        <?= $post ?>
        <h1>hello</h1>
    </article>
@endsection
