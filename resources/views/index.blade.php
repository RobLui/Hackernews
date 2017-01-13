@extends('layouts.app')

@section('content')
<title>Hackernews</title>
<div class="container">
  <div class="row">
    <div class="col-md-10 col-md-offset-1">
      <div class="panel panel-default">
        <div class="panel-heading">Article overview</div>
        <div class="panel-content">
          <ul class="article-overview">
            @if (count($articles) > 0)
              @foreach($articles as $article)
                 <li>
                   <tr>
                    <th>
                    @if(isset(Auth::user()->name))
                    <div class="vote">
                    @else
                    <div class="vote disabled">
                    @endif
                     <div class="form-inline upvote"><button class="up-down">
                         <i class="fa fa-caret-up"></i></button>
                     </div>
                     <div class="form-inline downvote"><button class="up-down">
                        <i class="fa fa-caret-down"></i></button>
                     </div>
                   </div>
                   <div class="url">&nbsp;
                     <a href="{{$article->url}}" class="urlTitle">{{$article->title}}</a>
                      @if(isset(Auth::user()->name))
                        @if(Auth::user()->name == $article->posted_by)
                          <a href="article/edit/{{$article->id}}" class="btn btn-primary btn-xs edit-btn">edit</a>
                        @endif
                      @endif
                   </div>
                   <div class="info"> &nbsp;&nbsp;&nbsp;&nbsp;{{$article->votes}} point
                     @if($article->votes > 1) s @endif
                      | posted by
                     @if(isset($article->posted_by))
                      {{{$article->posted_by}}}
                      | <a href="comments/{{$article->id}}">{{$comments->count($comments)}} comments</a>
                     @else not set @endif
                   </div>
                  </th>
                 </tr>
               </li>
            @endforeach
          </ul>
          @endif
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
