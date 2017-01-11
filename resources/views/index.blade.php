@extends('layouts.app')

@section('content')
<title>Hackernews</title>
<div class="container">
  <div class="row">
    <div class="col-md-10 col-md-offset-1">
      <div class="panel panel-default">
        <div class="panel-heading">Article overview</div>
        <div class="panel-content">
            @if (count($articles) > 0)
              @foreach($articles as $article)
              <ul class="article-overview">
                 <li>
                   <tr>
                    <th>
                   <div class="vote">
                     <div class="form-inline upvote"><button class="up-down">
                         <i class="fa fa-caret-up"></i></button>&nbsp;
                     </div>
                     <div class="form-inline downvote"><button class="up-down">
                        <i class="fa fa-caret-down"></i></button>&nbsp;
                     </div>
                   </div>
                   <div class="url">
                     <a href="{{$article->url}}" class="urlTitle">{{$article->title}}</a>
                      @if(isset(Auth::user()->name))
                        <a href="article/edit/{{$article->id}}" class="btn btn-primary btn-xs edit-btn">edit</a>
                      @endif
                   </div>
                   <div class="info">  -1 point  | posted by
                     @if(isset($article->posted_by))
                      {{{$article->posted_by}}}
                      @else not set
                     @endif
                     <a href="comments/{{$article->id}}">2 comments</a>
                   </div>
                  </th>
                 </tr>
               </li>
              </ul>
            @endforeach
          @endif
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
