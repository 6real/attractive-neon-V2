@php
  $orderby = 'date';
  $hide_empty = true ;

  $term_args = array(
      'orderby'    => $orderby,
      'hide_empty' => $hide_empty,
  );
  $terms = get_terms( 'category', $term_args );

  $name = explode("<span>", App::title());
  if (is_home()){
        $name = str_replace("</span>", "", $name);
  }
  else{
        $name = str_replace("</span>", "", $name)[1];
  }
@endphp

<div class="posts-header">
  <h1>{{ is_category() === true ? $name : App::title() }}</h1>

  @if($terms)
    <ul class="termList">
      @foreach($terms as $category)
        <li class="categoriesList-item {{$category->name === $name ? "active" : ""}}">
          <a class="categoriesList-item-link" href="{{get_term_link($category->term_id)}}">
            {{$category->name}}
          </a>
        </li>
      @endforeach
    </ul>
  @endif
</div>
