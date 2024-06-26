@extends('adminlte::page')

@section('template_title')
    Rating
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Rating') }}
                            </span>

                            {{-- <div class="float-right">
                                <a href="{{ route('ratings.create') }}" class="btn btn-primary btn-sm float-right"
                                    data-placement="left">
                                    {{ __('Create New') }}
                                </a>
                            </div> --}}
                        </div>
                    </div>
                    @if ($message = Session::get('success'))
                        <div class="alert alert-success">
                            <p>{{ $message }}</p>
                        </div>
                    @endif

                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-hover">
                                <thead class="thead">
                                    <tr>
                                        <th>No</th>

                                        <th>Usuario</th>
                                        <th>Producto</th>
                                        <th>Calificaión</th>
                                        <th>Comentario</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($ratings as $rating)
                                        <tr>
                                            <td>{{ $rating->id }}</td>

                                            <td>{{ $rating->user->name }}</td>
                                            <td>{{ $rating->producto->nombre }}</td>
                                            <td>{{ $rating->rating }}</td>
                                            <td>{{ $rating->comment }}</td>

                                            <td>
                                                <form action="{{ route('ratings.destroy', $rating->id) }}" method="POST">
                                                    <a class="btn btn-sm btn-primary "
                                                        href="{{ route('ratings.show', $rating->id) }}"><i
                                                            class="fa fa-fw fa-eye"></i> {{ __('Ver') }}</a>
                                                    {{-- <a class="btn btn-sm btn-success"
                                                        href="{{ route('ratings.edit', $rating->id) }}"><i
                                                            class="fa fa-fw fa-edit"></i> {{ __('Edit') }}</a> --}}
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm"><i
                                                            class="fa fa-fw fa-trash"></i> {{ __('Eliminar') }}</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
