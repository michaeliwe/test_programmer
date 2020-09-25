@extends('layout.app')

@section('title')
Learning Activity
@endsection

@section('content')
<div class="container mt-5">
    <div class="row">
        <!-- Tambah Metode -->
        <div class="modal fade" id="add_method" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLongTitle">Tambah Metode</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form action="{{ route('method.store') }}" method="POST">
                        @csrf
                        <div class="modal-body">
                                <div class="form-group">
                                    <label class="control-label">Nama Metode : </label>
                                    <input type="text" class="form-control" name="name" required>
                                </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal <i class="ni ni-fat-remove"></i></button>
                            <button type="submit" class="btn btn-success">Tambah <i class="ni ni-check-bold"></i></button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="col md-auto">
            <button type="button" class="btn btn-primary float-left" data-toggle="modal" data-target="#add_method">
                <i class="fa fa-plus-circle"></i>
                Tambah Metode
            </button>
        </div>

        <!-- Tambah Aktivitas -->
        <div class="modal fade" id="add_activity" role="dialog">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLongTitle">Tambah Aktivitas</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form action="{{ route('activity.store') }}" method="POST">
                        @csrf
                        <div class="modal-body">
                                <div class="form-group">
                                    <label class="control-label">Nama Aktivitas : </label>
                                    <input type="text" class="form-control" name="name" required>
                                </div>
                                <div class="form-group">
                                    <label for="metode">Metode</label>
                                    <select class="form-control" id="metode" name="method_id">
                                        @foreach ($methods as $item)
                                            <option value="{{ $item->id }}">{{ $item->name }}</option>
                                        @endforeach
                                    </select>
                                  </div>
                                <div class="form-group">
                                    <label class="control-label">Tanggal Mulai : </label>
                                    <input type="date" class="form-control" name="start_date" required>
                                </div>
                                <div class="form-group">
                                    <label class="control-label">Tanggal Selesai : </label>
                                    <input type="date" class="form-control" name="end_date" required>
                                </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal <i class="ni ni-fat-remove"></i></button>
                            <button type="submit" class="btn btn-success">Tambah <i class="ni ni-check-bold"></i></button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="col md-auto">
            <button type="button" class="btn btn-success float-right" data-toggle="modal" data-target="#add_activity">
                <i class="fa fa-plus-circle"></i>
                Tambah Aktivitas
            </button>
        </div>
    </div>

    <div class="row">
        <div class="col-12 text-center">
            <h3>Learning Activity - Year-1 (Januari s/d Juni 2019)</h3>
        </div>
    </div>

    <table border="1">
        <tr>
            <td> 
                <div class="col text-center font-weight-bold">METODE</div>
            </td>
            @foreach ($data as $key => $activity)
            <td>
                <div class="col text-center font-weight-bold">{{ $key }}</div>
            </td>
            @endforeach
        </tr>
    

    @foreach ($methods as $item)
        <!-- Edit Metode -->
        <div class="modal fade" id="edit_method_{{$item->id}}" role="dialog">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLongTitle">Edit Metode</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form id="form_edit_method_{{$item->id}}" action="{{ route('method.update', $item->id) }}" method="POST">
                    <div class="modal-body">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}" form="form_edit_method_{{$item->id}}" />
                            <input type="hidden" name="_method" value="PUT" form="form_edit_method_{{$item->id}}" />

                            <div class="form-group">
                                <label class="control-label">Nama Metode : </label>
                                <input type="text" class="form-control" name="name" value="{{$item->name}}" required>
                            </div>

                    </div>
                    <div class="modal-footer">
                        <button type="submit" form="form_edit_method_{{$item->id}}" class="btn btn-primary">Update</button>
                        <button type="button" class="btn btn-danger" data-dismiss="modal" data-toggle="modal" data-target="#delete_method_{{ $item->id }}">Delete</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>

        <!-- Hapus Metode -->
        <div class="modal fade" id="delete_method_{{ $item->id }}" role="dialog">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Data akan dihapus</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        Data yang dihapus tidak dapat dikembalikan!
                    </div>
                    <div class="modal-footer">
                        <form id="form_delete_method_{{$item->id}}" action="{{ route('method.destroy', $item->id) }}" method="POST">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}" form="form_delete_method_{{$item->id}}" />
                            <input type="hidden" name="_method" value="DELETE" form="form_delete_method_{{$item->id}}" />
                            <button type="submit" form="form_delete_method_{{$item->id}}" class="btn btn-danger">Delete</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <tr>
            <td align='center'>
                {{ $item->name }}
                <a href="#" data-toggle="modal" data-target="#edit_method_{{ $item->id }}"><i class="fa fa-edit"></i></a>
            </td>
            @foreach ($months as $month)
            <td valign='top'>
                <ul>
                    @foreach ($data as $month_key => $permethod)
                        @foreach ($permethod as $method_key => $activities)
    
                            @foreach ($activities as $activity)
                                @if (trim($month->month) == $month_key AND $activity->method_id == $item->id)
                                    <!-- Edit Aktifitas -->
                                    <div class="modal fade" id="edit_activity_{{$activity->id}}" role="dialog">
                                        <div class="modal-dialog modal-dialog-centered" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLongTitle">Edit Aktifitas</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <form id="form_edit_activity_{{$activity->id}}" action="{{ route('activity.update', $activity->id) }}" method="POST">
                                                <div class="modal-body">
                                                        <input type="hidden" name="_token" value="{{ csrf_token() }}" form="form_edit_activity_{{$activity->id}}" />
                                                        <input type="hidden" name="_method" value="PUT" form="form_edit_activity_{{$activity->id}}" />
    
                                                        <div class="form-group">
                                                            <label class="control-label">Nama Aktifitas : </label>
                                                            <input type="text" class="form-control" name="name" value="{{$activity->name}}" required>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="control-label">Metode : </label>
                                                            <select name="method_id" id="method_id" class="form-control">
                                                                @foreach($methods as $method_item)
                                                                    <option value="{{ $method_item->id }}" {{ ($method_item->id == $activity->method_id ? 'selected' : '') }}>{{ $method_item->name }}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="control-label">Tanggal Mulai : </label>
                                                            <input type="date" class="form-control" name="start_date" value="{{$activity->start_date}}" required>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="control-label">Tanggal Selesai : </label>
                                                            <input type="date" class="form-control" name="end_date" value="{{$activity->end_date}}" required>
                                                        </div>
    
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="submit" form="form_edit_activity_{{$activity->id}}" class="btn btn-primary">Update</button>
                                                    <button type="button" class="btn btn-danger" data-dismiss="modal" data-toggle="modal" data-target="#delete_activity_{{ $activity->id }}">Delete</button>
                                                </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
    
                                    <!-- Hapus Aktifitas -->
                                    <div class="modal fade" id="delete_activity_{{ $activity->id }}" role="dialog">
                                        <div class="modal-dialog modal-dialog-centered" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title">Data akan dihapus</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    Data yang dihapus tidak dapat dikembalikan!
                                                </div>
                                                <div class="modal-footer">
                                                    <form id="form_delete_activity_{{$activity->id}}" action="{{ route('activity.destroy', $activity->id) }}" method="POST">
                                                        <input type="hidden" name="_token" value="{{ csrf_token() }}" form="form_delete_activity_{{$activity->id}}" />
                                                        <input type="hidden" name="_method" value="DELETE" form="form_delete_activity_{{$activity->id}}" />
                                                        <button type="submit" form="form_delete_activity_{{$activity->id}}" class="btn btn-danger">Delete</button>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <li>
                                        <div>{{ $activity->name }}</div>
                                        <a href="#" data-toggle="modal" data-target="#edit_activity_{{ $activity->id }}"><i class="fa fa-edit"></i></a>
                                        <br>
                                        <div class="text-primary small">({{ $activity->start_date }} - {{ $activity->end_date }})</div>
                                    </li>
                                @endif
                            @endforeach
                        @endforeach
                    @endforeach
                </ul>
            </td>
            @endforeach
        </tr>
    @endforeach
    </table>
</div>
@endsection
