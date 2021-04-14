@extends('adminlte::page')

@section('content')
<div class="container">
  <div class="card card-primary">
    <div class="card-header">
      <h3 class="card-title">Atualizar Usuário</h3>
    </div>
    <!-- /.card-header -->
    <!-- form start -->
    <form action="{{ route('admin.users.update', ['user' => $user->id]) }}" method="post" role="form" id="quickForm">
      @csrf
      @method('PUT')
      <input type="hidden" name="id" value="{{ $user->id }}">
      
      <div class="card-body">
        @if ($errors->any())
        <div class="alert alert-danger">
          <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
          </ul>
        </div>
        @endif

        @if(session()->exists('message'))
          @component('components.message', ['type' => session()->get('type')])
          {{ session()->get('message') }}
          @endcomponent
        @endif
        
        <div class="form-group">
          <label for="exampleInputEmail1">Nome</label>
          <input type="text" name="name" class="form-control" placeholder="Nome Completo" value="{{ old('name') ?? $user->name }}">
        </div>
        <div class="form-group">
          <label for="exampleInputEmail1">E-mail</label>
          <input type="email" name="email" class="form-control" placeholder="Seu email" value="{{ old('email') ?? $user->email }}">
        </div>
        <div class="form-group">
          <label for="exampleInputPassword1">Senha</label>
          <input type="password" name="password" class="form-control" placeholder="Senha">
        </div>
        <div class="form-group mb-0">
        </div>
      </div>
      <!-- /.card-body -->
      <div class="card-footer">
        <button type="submit" class="btn btn-primary">Atualizar</button>
      </div>
    </form>
  </div>
  <!-- /.card -->
</div>
@endsection