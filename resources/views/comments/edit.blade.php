@extends('layouts.app')

@section('content')
<!-- Bootstrap Boilerplate... -->
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">

          <!--DELETE BUTTON  -->
          <a href="../{{$comment->post_id}}">← back to overview</a>
            <br><br>
            @include("common.messages")
              <div class="panel panel-default">
                <div class="panel-heading clearfix">Edit comment
                  <!--  Delete comment button -->
                  <a href="../delete/{{$comment->id}}" class="btn btn-danger btn-xs pull-right">
                    <i class="fa fa-btn fa-trash"></i> delete comment</a>
                </div>
                <div class="panel-content">

                <!--  display errors -->
                @include("common.errors")
                <!-- Edit -->
                <form action="/comments/edit/{{$comment->id}}" method="POST" class="form-horizontal">
                  <div class="form-group">
                    <div class="col-sm-6">
                      <textarea type="text" name="comment" id="comment" class="form-control">{{$comment->comment}}</textarea>
                    </div>
                  </div>
                    <!-- Edit comment Button -->
                    <div class="form-group">
                        <div class="col-sm-offset-3 col-sm-6">
                            <button type="submit" class="btn btn-default">
                                <i class="fa fa-plus"></i> Edit comment
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
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
