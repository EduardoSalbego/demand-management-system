@extends('layouts.admin')

@section('title', 'Editar Demanda')

@section('content')
    <div class="card card-warning">
        <div class="card-header">
            <h3 class="card-title">Alterar Tarefa #{{ $demanda->id }}</h3>
        </div>

        <form action="{{ route('demandas.update', $demanda->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="card-body">
                <div class="form-group">
                    <label>Título</label>
                    <input type="text" name="titulo" class="form-control @error('titulo') is-invalid @enderror"
                        value="{{ old('titulo', $demanda->titulo) }}">
                    @error('titulo') <span class="text-danger">{{ $message }}</span> @enderror
                </div>

                <div class="form-group">
                    <label>Descrição</label>
                    <textarea name="descricao" class="form-control"
                        rows="3">{{ old('descricao', $demanda->descricao) }}</textarea>
                </div>

                <div class="form-group">
                    <label>Data de Entrega</label>
                    <input type="datetime-local" name="data_entrega"
                        class="form-control @error('data_entrega') is-invalid @enderror"
                        value="{{ $demanda->data_entrega->format('Y-m-d\TH:i') }}">
                    @error('data_entrega') <span class="text-danger">{{ $message }}</span> @enderror
                </div>
                <div class="form-group">
                    <label>Status da Tarefa</label>
                    <select name="status" class="form-control">
                        <option value="1" {{ $demanda->status == 1 ? 'selected' : '' }}>
                            Em andamento
                        </option>

                        <option value="0" {{ $demanda->status == 0 ? 'selected' : '' }}>
                            Finalizada
                        </option>
                    </select>
                </div>
            </div>

            <div class="card-footer">
                <button type="submit" class="btn btn-warning">Atualizar Demanda</button>
                <a href="{{ route('demandas.index') }}" class="btn btn-default">Cancelar</a>
            </div>
        </form>
    </div>
@endsection