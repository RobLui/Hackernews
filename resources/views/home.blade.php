@extends('layouts.app')

@section('content')
<title>Hackernews</title>
<div class="container">
  <div class="row">
    <div class="col-md-8 col-md-offset-2">
      <div class="panel panel-default">
        <div class="panel-heading">Article overview</div>
          <div class="panel-body">
            @if (count($articles) > 0)
              @foreach($articles as $article)
              <ul class="article-overview">
                <li>
                    <tr>
                      <th>
                        <div class="url">
                            <a href="{{$article->url}}" class="urlTitle">{{$article->title}}</a>
                            <a href="article/edit/{{$article->id}}" class="btn btn-primary btn-xs edit-btn">edit</a>
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
