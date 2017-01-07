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
                  <!--  Placeholders for later buttons, wont work yet -->
                  <!-- <div class="vote">
                    <div class="form-inline upvote">
                      <button name="article_id" value="1">
                        <i class="fa fa-btn fa-caret-up disabled upvote"</i>
                      </button>
                    </div>
                    <div class="form-inline upvote">
                      <button name="article_id" value="1">
                        <i class="fa fa-btn fa-caret-down disabled downvote" </i>
                      </button>
                    </div>
                  </div> -->
                    <tr>
                      <th>
                        <div class="url">
                          <a href="{{$article->url}}" class="urlTitle">{{$article->title}}</a>
                          <a href="article/edit/{{$article->id}}" class="btn btn-primary btn-xs edit-btn">edit</a>
                          <div class="test">

                          </div>

                        </div>
                        <div class="info">
                          <!--  Placeholder for later data -->
                          3 points  | posted by <?= $article->id  ?> | <a href="comments/{{$article->id}}">2 comments</a>
                        </div>
                      </th>
                    </tr>
                </li>
              </ul>
              @endforeach
            @endif
          </div>
        </div>
        <!-- {{ $article }} -->
      </div>
    </div>
  </div>

@endsection
