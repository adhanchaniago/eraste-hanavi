@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <div class="row">
                        <div class="col-md-12">
                            <div class="panel">
                                <div class="panel-head py-3">
                                    <h3>Orders</h3>
                                </div>
                                <div class="panel-body no-padding">
                                    <table class="table table-bordered table-hover table-striped" id="dt">
                                        <thead>
                                        <tr>
                                            <th>Order Code</th>
                                            <th>Product</th>
                                            <th>Total Order</th>
                                            <th>Action</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        {{-- @php
                                            $total = 0;
                                            $n = 1;
                                        @endphp --}}
                                        @foreach($order as $o)
                                            <tr>
                                                <td>{{ $o->order_code }}</td>
                                                <td>{{ $o['product']['name'] }}</td>
                                                <td>Rp. {{ $o->total }}</td>
                                                <td>
                                                    <div class="column">
                                                        <a href="{{ route('orders.edit', $o->id) }}" class="btn btn-warning" >Edit</a>
                                                        <a class="btn btn-danger" style="color: white;" data-toggle="modal" data-target="#modelId" onclick="prepare({{$o->id}})">Hapus</a>
                                                    </div>
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
        </div>
    </div>
</div>

<div class="modal fade" id="modelId" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Konfirmasi Hapus</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{route('orders.delete', $o->id)}}" method="post">
                {{ csrf_field() }}
                {{ method_field('delete') }}
                <input type="hidden" name="id" id="menuid" readonly>
                <div class="modal-body">
                    Apakah anda yakin ingin menghapus order <b><span id="nomer">{{$o['product']['name']}}</span></b>? Aksi ini tidak dapat di-<i>undo</i>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Tidak</button>
                    <input type="submit" value="Hapus" class="btn btn-danger">
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
