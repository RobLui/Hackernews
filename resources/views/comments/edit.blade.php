@extends('layouts.app')

@section('content')
<!-- Bootstrap Boilerplate... -->
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
          <!--  Deze true moet nog een vergelijking worden die ervoor zorgt dat de data enkel te zien is wanneer de andere delete knop is ingedrukt -->
          <div class="bg-danger clearfix">
            <br>
              Are you sure you want to delete this comment?
              <!--  DELETE CONFIRM -->
              <form action="../delete/{{$comment->id}}" method="POST" class="pull-right">
                {{ csrf_field() }}
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <button name="delete" class="btn btn-danger" value="7">
                    <i class="fa fa-btn fa-trash" title="delete"></i> confirm delete
                </button>
                <button name="cancel" class="btn" value="7">
                    <i class="fa fa-btn fa-trash" title="cancel"></i> cancel
                </button>
              </form>
            </div>
          <br>
          <!--DELETE BUTTON  -->
          <a href="../{{$comment->post_id}}">← back to overview</a>
            <br><br>
              <div class="panel panel-default">
                <div class="panel-heading clearfix">Edit comment
                  <!--  Delete comment button -->
                  <a href="../delete/{id}" class="btn btn-danger btn-xs pull-right">
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
