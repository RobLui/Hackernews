@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <a href="..\home">← back to overview</a>
                <br><br>
                <div class="panel panel-default">
                    <div class="panel-heading">Add article</div>
                    <br>
                    <div class="panel-content">
                        @include("common.errors")
                        @include("common.messages")
                        <form action="{{ url('article/add') }}" method="POST" class="form-horizontal">
                            {{ csrf_field() }}
                            <div class="form-group">
                                <label for="titel" class="col-sm-3 control-label">Title (max 255 characters)</label>
                                <div class="col-sm-6">
                                    <input type="text" name="title" id="title" class="form-control">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="url" class="col-sm-3 control-label">URL</label>
                                <div class="col-sm-6">
                                    <input type="text" name="url" id="url" class="form-control">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-offset-3 col-sm-6">
                                    <button type="submit" class="btn btn-default">
                                        <i class="fa fa-plus"></i> Add Article
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
