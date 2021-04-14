@extends('adminlte::page')

@section('content')
<div class="container">

    <div class="row justify-content-center">
        <div class="col-md-8 bg-light">
            <div class="mt-5">
                @if(session()->exists('message'))
                    @component('components.message', ['type' => session()->get('type')])
                    {{ session()->get('message') }}
                    @endcomponent
                @endif
                <div class="d-flex justify-content-between align-self-center">
                    <h3>Usuários</h3>
                    <a class="btn btn-info bg-gradient-primary" href="{{ route('admin.users.create') }}">Novo
                        Cadastro</a>
                </div>

                <div class="mt-4">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif
                    <table class="table">

                        @if (!empty($users))
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Nome Completo</th>
                                <th>Email</th>
                                <th>Ações</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($users as $user)
                            <tr>
                                <td>{{$user->id}}</td>
                                <td>{{$user->name}}</td>
                                <td>{{ $user->email}}</td>
                                <td>
       
                                    <form action="{{ route('admin.users.destroy', $user->id) }}" method="POST">

                                        <a href="{{ route('admin.users.edit', ['user' => $user->id]) }}"><i
                                            class="fas fa-edit pr-1"></i></a>

                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" style="border: none; background-color:transparent;"><i class="far fa-trash-alt text-danger"></i></button>
                                    </form>
                                </td>

                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    @else
                    <p>Não existem usuários cadastrados</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>


@endsection