@extends('layouts.app')

@section('title')
    Boolpress
@endsection

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="p-5 border border-3 border-primary m-4 bg-light rounded">
                <div class="container-fluid py-5">
                    <h1 class="display-5 fw-bold">Boolpress</h1>
                    <div class="col-md-12 fs-4">
                        <p>Benvenuto nel fantastico blog di boolpress, non so bene cosa scrivere quindi ci piazzerò qualche lorem:</p>
                        <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Neque facere, quaerat atque itaque consectetur aperiam doloribus iste dicta quos recusandae eveniet, sit debitis iusto obcaecati labore in distinctio eaque nobis.</p>
                    </div>
                    <a class="nav-link" aria-current="page" href="/posts">
                        <button class="btn btn-primary btn-lg" type="button">Visualizza tutti gli articoli</button>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
