@extends('dashboard')

@section('title','Quản lý học viên')

@section('content')

@if(!empty($students))
<br><br>
<div class="row">
    <div class="col-md-6">
        <h3> Danh sách học viên</h3>
    </div>
    <div class="col-md-6">
        <a href="{{route('students.create')}}" class="btn btn-success float-right m-2">
            Thêm mới
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus-lg" viewBox="0 0 16 16">
                <path d="M8 0a1 1 0 0 1 1 1v6h6a1 1 0 1 1 0 2H9v6a1 1 0 1 1-2 0V9H1a1 1 0 0 1 0-2h6V1a1 1 0 0 1 1-1z" />
            </svg>
        </a>
    </div>
</div>
<br>
<table class="table table-striped">
    <thead class="thead-dark">
        <tr>
            <td>#</td>
            <td>Tên</td>
            <td>Ngày sinh</td>
            <td>Giới tính</td>
            <td>Chuyên ngành</td>
            <td>Học vấn</td>
            <td colspan="2">Action</td>
        </tr>
    </thead>
    <tbody>
        @foreach($students as $item)
        <tr>
            <td>{{$loop->iteration}}</td>
            <td>
                <a href="#">{{$item->name}}</a>
            </td>
            <td>{{date('d-m-Y', strtotime($item->birthday))}}</td>
            <td>{{$item->gender}}</td>
            <td>{{$item->specialized}}</td>
            <td>{{$item->academic}}</td>
            <td>
                <a href="#" class="btn btn-primary">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                        <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z" />
                        <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z" />
                    </svg>
                </a>
                <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
<div class="row">
    <div class="col-sm-7 text-right text-center-xs">
        {{$students->appends(request()->all())->links()}}
    </div>
</div>
@else
<h2>Không có dữ liệu</h2>
@endif


@endsection