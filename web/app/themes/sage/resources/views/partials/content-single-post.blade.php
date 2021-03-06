<article @php post_class() @endphp>
  <header>
    <h1 class="entry-title">{!! get_the_title() !!}</h1>
    @include('partials/entry-meta')
  </header>
  <div class="entry-content">
    <figure class="thumbnail">
      <img src="{{get_the_post_thumbnail_url(get_the_ID(), 'post-thumbnail')}}" alt="">
    </figure>
    @php the_content() @endphp
  </div>
{{--  @php comments_template('/partials/comments.blade.php') @endphp--}}
</article>
