@extends('layouts.app')

@section('content')

<div class="content">
    <form method="get" action="{{ route('publicaciones.index')}}">
        <div class="row">
            <div class="col-md-4 col-md-offset-4">
                <div class="input-group custom-search-form">
                    <input type="text" class="form-control" name="buscar" placeholder="Buscar...">
                    <span class="input-group-btn">
                        <button class="btn btn-default-sm" type="submit">
                            <i class="fas fa-search"></i>
                        </button>
                    </span>
                </div>
            </div>
        </div>
    </form>
</div>
@endsection
