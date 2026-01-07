@extends('layouts.admin')

@section('title', 'Dashboard')

@section('content')
<div class="row">
    <div class="col-lg-3 col-6">
        <div class="small-box bg-info">
            <div class="inner">
                <h3>{{ $totalDemandas }}</h3>
                <p>Total de Demandas</p>
            </div>
            <div class="icon">
                <i class="fas fa-tasks"></i>
            </div>
            <a href="{{ route('demandas.index') }}" class="small-box-footer">
                Ver todas <i class="fas fa-arrow-circle-right"></i>
            </a>
        </div>
    </div>
    <div class="col-lg-3 col-6">
        <div class="small-box bg-danger">
            <div class="inner">
                <h3>{{ $demandasUrgentes }}</h3>
                <p>Prazo Curto (-72h)</p>
            </div>
            <div class="icon">
                <i class="fas fa-exclamation-circle"></i>
            </div>
            <a href="{{ route('demandas.index') }}" class="small-box-footer">
                Ver lista <i class="fas fa-arrow-circle-right"></i>
            </a>
        </div>
    </div>
    <div class="col-lg-3 col-6">
        <div class="small-box bg-success">
            <div class="inner">
                <h3>Novo</h3>
                <p>Criar Demanda</p>
            </div>
            <div class="icon">
                <i class="fas fa-plus"></i>
            </div>
            <a href="{{ route('demandas.create') }}" class="small-box-footer">
                Acessar <i class="fas fa-arrow-circle-right"></i>
            </a>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Bem-vindo ao Sistema, {{ Auth::user()->name }}!</h3>
            </div>
            <div class="card-body">
                Utilize os cartões acima para navegar ou gerencie suas tarefas pelo menu lateral.
            </div>
        </div>
    </div>
</div>
@endsection