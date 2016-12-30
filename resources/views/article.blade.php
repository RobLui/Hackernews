@extends('layouts.app')

@section('content')

    <!-- Bootstrap Boilerplate... -->

    <div class="panel-body">
        <!-- New article Form -->
        <form action="/add" method="POST" class="form-horizontal">
            {{ csrf_field() }}

            <!-- Task Name -->
            <div class="form-group">
                <label for="article_name" class="col-sm-3 control-label">Title (max 255 chars)</label>
                <div class="col-sm-6">
                    <input type="text" name="name" id="article_name" class="form-control">
                </div>
              </div>
              <div class="form-group">
                <label for="article_url" class="col-sm-3 control-label">URL</label>
                <div class="col-sm-6">
                    <input type="url" name="url" id="article_url" class="form-control">
                </div>
              </div>

            <!-- Add Task Button -->
            <div class="form-group">
                <div class="col-sm-offset-3 col-sm-6">
                    <button type="submit" class="btn btn-default">
                        <i class="fa fa-plus"></i> Add Article
                    </button>
                </div>
            </div>
        </form>
    </div>

@endsection
