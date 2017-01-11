@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
          <a href="/../home">← back to overview</a>
          <br><br>
          <!--  display errors -->
        @include("common.errors")
        <div class="panel panel-default">
          <div class="panel-heading">
            Article: @foreach($articles as $a) @if($a->id == $comments->post_id) {{$a->title}} @endif @endforeach
            <a href="/article/edit/{{$articles->id}}" class="btn btn-danger btn-xs pull-right">
              <i class="fa fa-btn fa-trash" title="delete"></i> delete article
            </a>
          </div>
          <div class="panel-body">
            <ul class="article-overview">
             <li>
              <div class="vote">
               <tr>
                <th>
                  <div class="url">
                    <div class="form-inline upvote"><button class="up-down">
                       <i class="fa fa-caret-up"></i></button>&nbsp;
                       <a href="{{$articles->url}}" class="urlTitle">{{$articles->title}}</a>
                       <a href="/article/edit/{{$articles->id}}" class="btn btn-primary btn-xs edit-btn">edit</a>
                    </div>
                  </div>
                  <div class="info">
                    <div class="form-inline downvote"><button class="up-down">
                       <i class="fa fa-caret-down"></i></button>&nbsp;
                        3 points  | posted by {{$articles->posted_by}} |
                       <a href="comments/{{$articles->id}}">2 comments</a>
                    </div>
                  </div>
                 </th>
                </tr>
               </div>
              </li>
            </ul>
            <!--  If comments on the post are available -->
            @if(count($comments) > 0)
              <div class="comments">
                <ul>
                  <li>
                    <div class="comment-body">
                      {{$comments->comment}}
                    </div>
                  </li>
                </ul>
              </div>
            <!--  If there are no comments -->
            @else
              <div class="comments">
                <div>
                  <p>No comments yet</p>
                </div>
              </div>
            @endif
              <!-- ADD comment -->
            <form action="/comments/add/<?= basename($_SERVER["PHP_SELF"]); ?>" method="POST" class="form-horizontal">
              {{ csrf_field() }}
              <input type="hidden" name="_token" value="{{ csrf_token() }}"> <!-- mismatch token error fix -->
              <!-- Comment data -->
              <div class="form-group">
                <label for="body" class="col-sm-3 control-label">Comment</label>
                <div class="col-sm-6">
                  <textarea type="text" name="comment" id="comment" class="form-control"></textarea>
                </div>
              </div>
              <!-- Add comment -->
              <div class="form-group">
                  <div class="col-sm-offset-3 col-sm-6">
                      <button type="submit" class="btn btn-default">
                          <i class="fa fa-plus"></i> Add comment
                      </button>
                  </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
