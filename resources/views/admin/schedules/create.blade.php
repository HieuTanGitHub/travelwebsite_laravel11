@extends('layouts.app')

@section('content')
    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">Create Schedule</h3>

        </div>
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <!-- /.card-header -->
        <!-- form start -->
        <form method="POST" action="{{ route('schedule.store') }}" enctype="multipart/form-data"
            onsubmit="return validateForm()">
            @csrf
            <div class="card-body">
                <div class="form-group">
                    <label for="exampleInputPassword1">Tour</label>
                    <select class="form-control" name="tour_id">
                        <option value="{{ $tour->id }}">{{ $tour->title }}</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="exampleInputEmail1">Lịch trình</label>
                    <textarea class="form-control" id="lichtrinh" name="lichtrinh" id="exampleInputEmail1" placeholder="....">{{ $schedule->lichtrinh }}</textarea>

                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Chính sách</label>
                    <textarea class="form-control" id="chinhsach" name="chinhsach" id="exampleInputEmail1" placeholder="....">{{ $schedule->chinhsach }}</textarea>

                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Bao gồm</label>
                    <textarea class="form-control" id="baogom" name="baogom" id="exampleInputEmail1" placeholder="....">{{ $schedule->baogom }}</textarea>

                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Không bao gồm</label>
                    <textarea class="form-control" id="khongbaogom" name="khongbaogom" id="exampleInputEmail1" placeholder="....">{{ $schedule->khongbaogom }}</textarea>

                </div>
            </div>
            <!-- /.card-body -->

            <div class="card-footer">
                <button type="submit" class="btn btn-primary">Cập nhật</button>
            </div>
        </form>
        <table class="table table-striped" id="myTable">
            <thead>
                <tr>
                    <th scope="col">#</th>

                    <th scope="col">Lịch trình</th>
                    <th scope="col">Chính sách</th>
                    <th scope="col">Bao gồm</th>
                    <th scope="col">Không bao gồm</th>
                    <th scope="col">Manage</th>
                </tr>
            </thead>
            <tbody>
                {{-- @foreach ($galleries as $key => $gal)
                    <tr>
                        <th scope="row">{{ $key }}</th>
                        <td>{{ $gal->title }}</td>
                        <td><img height="120" width="120" src="{{ asset('uploads/galleries/' . $gal->image) }}">
                        </td>

                        <td>


                        </td>
                    </tr>
                @endforeach --}}

            </tbody>
        </table>
    </div>


@endsection
