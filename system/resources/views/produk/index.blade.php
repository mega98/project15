@inject('timeService', 'App\Services\TimeServices')

@extends('template.base')

@section('content')

	<div class="container">
        <div class="row">
            <div class="col-md-12 mt-5">
                <div class="card">
                    <div class="card-header">
                        <div class="float-right">
                            Jam : {{$timeService->showTimeNow()}}
                        </div>
                        Filter

                    </div>
                    <div class="card-body">
                        <form action="{{url('admin/produk/filter')}}" method="post">
                            @csrf
                            <div class="form-group">
                                <label for="" class="control-label" >Nama</label>
                                <input type="text" class="form-control" name="nama" value="{{$nama ?? ''}}">
                            </div>
                            <div class="form-group">
                                <label for="" class="control-label" >Stok</label>
                                <input type="text" class="form-control" name="stok" value="{{$nama ?? ''}}">
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                    <label for="" class="control-label" >Harga Min</label>
                                    <input type="text" class="form-control" name="harga_min" value="{{$nama ?? ''}}">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                    <label for="" class="control-label" >Harga Max</label>
                                    <input type="text" class="form-control" name="harga_max" value="{{$nama ?? ''}}">
                                </div>
                            </div>
                        </div>
                    </div>
                            <button class="btn btn-dark float-right"><i class="fa fa-search"></i> Filter</button>
                        </form>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header">
                        Data Produk
                        <a href="{{url('admin/produk/create')}}" class="btn btn-dark float-right"><i class="fa fa-plus"></i> Tambah Data</a>
                    </div>
                    <div class="card-body">
                        <table class="table table-datatable">
                            <thead>
                                <th>No</th>
                                <th>Aksi</th>
                                <th>Nama</th>
                                <th>Harga</th>
                                <th>Stok</th>
                            </thead>
                           <tbody>
                                @foreach($list_produk as $produk)
                                <tr>
                                    <td>{{$loop->iteration}}</td>
                                    <td>
                                        <div class="btn-group">
                                            <a href="{{url('admin/produk', $produk->id)}}" class="btn btn-dark float-right"><i class="fa fa-info"></i></a>
                                            <a href="{{url('admin/produk', $produk->id)}}/edit" class="btn btn-warning float-right"><i class="fa fa-edit"></i></a>
                                            @include('template.utils.delete', ['url' => url('admin/produk', $produk->id)])
                                        </div>
                                    </td>
                                    <td>{{$produk->nama}}</td>
                                    <td>{{$produk->harga}}</td>
                                    <td>{{$produk->stok}}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>  
            </div>
        </div>
    </div>
@endsection