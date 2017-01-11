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
          <div class="panel-heading clearfix">
            Article: @foreach($articles as $a) @if($a->id == $comments->post_id) {{$a->title}} @endif @endforeach
            <!-- @if(isset(Auth::user()->name)) -->
              <!-- @if(Auth::user()->name == $articles->posted_by)) -->
              <!-- @endif -->
            <!-- @endif -->
            <a href="/article/edit/{{$articles->id}}" class="btn btn-danger btn-xs pull-right">
              <i class="fa fa-btn fa-trash" title="delete"></i> delete article
            </a>
          </div>
          <div class="panel-content">

          <div class="panel-body">
            <ul class="article-overview">
             <li>
               <tr>
                <th>
                 <div class="vote">
                   <div class="form-inline upvote"><button class="up-down">
                       <i class="fa fa-caret-up"></i></button>
                   </div>
                   <div class="form-inline downvote"><button class="up-down">
                      <i class="fa fa-caret-down"></i></button>
                   </div>
                 </div>
                 <div class="url">&nbsp;
                    <a href="{{$articles->url}}" class="urlTitle">
                      @foreach($articles as $article)
                        @if($article->id == $comments->post_id)
                          {{$article->title}}
                        @endif
                      @endforeach</a>
                    <a href="/article/edit/{{$articles->id}}" class="btn btn-primary btn-xs edit-btn">edit</a>
                 </div>
                 <div class="info">
                    &nbsp;&nbsp;
                    {{$articles->votes}} point
                    @if($articles->votes > 1)
                      s
                    @endif
                      | posted by
                    @foreach($articles as $article)
                      @if($article->id == $comments->post_id)
                        {{$article->posted_by}}
                      @endif
                    @endforeach
                     | {{$comments->count()}} comments
                 </div>
                 </th>
                </tr>
              </li>
            </ul>
            <!--  If comments on the post are available -->
              <div class="comments">
                @if(count($comments) > 0)
                <ul>
                  <div class="comment-body">
                      @if(count($articles) > 0 && count($comments) > 0)
                        @foreach($comments as $c)
                          @if($c->post_id == $articles->id)
                            <li>
                              {{$c->comment}}
                              <div class="comment-info">
                                Posted by
                                @if(isset($c->name))
                                 {{{$c->name}}}
                                @endif
                                on
                                {{$c->created_at}}
                              </div>
                            </li>
                          @endif
                        @endforeach
                      @endif
                    </div>
                </ul>
            <!--  If there are no comments -->
            @else
              <div class="comments">
                <div>
                  <p>No comments yet</p>
                </div>
              </div>
            @endif            <div class="panel-content">

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
</div>

@endsection


<!--
{{$articles->votes}} points | posted by
@foreach($comments as $comment)
{{$comment->name}}
  @endforeach
{{$comments->count()}} | comments -->
