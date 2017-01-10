@extends('layouts.app')

@section('content')
<title>Hackernews</title>
<div class="container">
  <div class="row">
    <div class="col-md-10 col-md-offset-1">
      <div class="panel panel-default">
        <div class="panel-heading">Article overview</div>
          <div class="panel-body">
            @if (count($articles) > 0)
              @foreach($articles as $article)
              <ul class="article-overview">
               <li>
                <div class="vote">
                 <tr>
                  <th>
                    <div class="url">
                      <div class="form-inline upvote"><button class="up-down">
                         <i class="fa fa-caret-up"></i></button>&nbsp;
                         <a href="{{$article->url}}" class="urlTitle">{{$article->title}}</a>
                         <a href="article/edit/{{$article->id}}" class="btn btn-primary btn-xs edit-btn">edit</a>
                      </div>
                    </div>
                    <div class="info">
                      <div class="form-inline downvote"><button class="up-down">
                         <i class="fa fa-caret-down"></i></button>&nbsp;
                          3 points  | posted by {{$article->posted_by}} |
                         <a href="comments/{{$article->id}}">2 comments</a>
                      </div>
                    </div>
                   </th>
                  </tr>
                 </div>
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
