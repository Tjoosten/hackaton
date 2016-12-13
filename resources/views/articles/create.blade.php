@extends('layouts.app')

@section('content')
    @if (isset($_SESSION['class']) && isset($_SESSION['message']))
        <div class="col-sm-12">
            <div class="{{ $_SESSION['class'] }}">
                {{ $_SESSION['message'] }}
            </div>
        </div>
    @endif

    <div class="col-sm-12">
        <div class="panel panel-default">
            <div class="panel-heading">Create new document</div>

            <div class="panel-body">
                {{-- CRSF Token --}}
                {{ csrf_field() }}

                <form class="form-horizontal" action="{{ route('document.store') }}" method="POST">
                    {{-- Document heading form-group --}}
                    <div class="form-group {{ $errors->has('heading') ? ' has-error' : '' }}">
                        <div class="col-md-6">
                            <input type="text" name="heading" class="form-control" placeholder="Document heading">

                            @if ($errors->has('heading'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('heading') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>

                    {{-- Document description --}}
                    <div class="form-group {{ $errors->has('description') ? 'has-error' : '' }}">
                        <div class="col-md-12">
                            <textarea name="description" class="form-control" rows="7" placeholder="Document content"></textarea>

                            @if ($errors->has('description'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('description') }}</strong>
                                </span>
                            @else
                                <span class="help-block">Markdown supported</span>
                            @endif
                        </div>
                    </div>

                    {{-- Submit and reset button --}}
                    <div class="form-group">
                        <div class="col-md-4">
                            <button type="submit" class="btn btn-success">Insert</button>
                            <button type="reset" class="btn btn-danger">Reset</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection