@extends('layouts.master')

@section('css')

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{ asset('assets/plugins/fontawesome-free/css/all.min.css') }}">
  <!-- DataTables -->
  <link rel="stylesheet" href="{{ asset('assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">

  <link rel="stylesheet" href="{{ asset('assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">

  <link rel="stylesheet" href="{{ asset('assets/plugins/datatables-buttons/css/buttons.bootstrap4.min.css') }}">



@endsection

@section('title', 'المصاريف')

@section('page_title', 'لوحة التحكم')

@section('content')


@php
    $total = 0;
@endphp

    <!-- Main content -->
    <section class="content">

      <div class="container-fluid  ">
        <a class="btn btn-primary mb-4" href="{{route('expenses.create')}}"><i class="fa-solid fa-money-bill"></i> اضافة المصاريف</a>

        <div class="row">
          <div class="col-12 ">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">المصاريف</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>المصاريف</th>
                    <th>المبلغ</th>
                    <th>التاريخ</th>
                    <th>ادارة</th>
                  </tr>
                  </thead>
                  <tbody>
                    @foreach ($expenses as $expense)

                  <tr>
                    <td>{{$expense->name}}</td>
                    <td>{{$expense->price}} SR</td>
                    <td>{{$expense->created_at->format('Y-m-d')}}</td>
                        <td>
                            <a class="btn btn-primary" href="{{route('expenses.edit', $expense->id)}}"><i class="fa-solid fa-pen-to-square"></i></a>
                            <form style="display: inline-block" action="{{route('expenses.destroy', $expense->id)}}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger"><i class="fa-solid fa-delete-left"></i></button>
                            </form>
                        </td>

                  </tr>
                    @php $total +=  $expense->price @endphp
                    @endforeach
                  </tbody>
                  <tr>
                    <td></td>
                    <td><b class="text-success">{{$total}} SR</b></td>
                    <td><b class="text-success">:الاجمالي</b></td>
                    <td></td>
                  </tr>
                </table>

              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>

@endsection

@section('scripts')
<script src="{{ URL::asset('assets/plugins/jquery/jquery.min.js') }}"></script>
<!-- Bootstrap 4 -->
<script src="{{ URL::asset('assets/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

<!-- DataTables  & Plugins -->
<script src="{{ URL::asset('assets/plugins/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ URL::asset('assets/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
<script src="{{ URL::asset('assets/plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
<script src="{{ URL::asset('assets/plugins/datatables-responsive/js/responsive.bootstrap4.min.js') }}"></script>
<script src="{{ URL::asset('assets/plugins/datatables-buttons/js/dataTables.buttons.min.js') }}"></script>
<script src="{{ URL::asset('assets/plugins/datatables-buttons/js/buttons.bootstrap4.min.js') }}"></script>
<script src="{{ URL::asset('assets/plugins/jszip/jszip.min.js') }}"></script>
<script src="{{ URL::asset('assets/plugins/pdfmake/pdfmake.min.js') }}"></script>
<script src="{{ URL::asset('assets/plugins/pdfmake/vfs_fonts.js') }}"></script>
<script src="{{ URL::asset('assets/plugins/datatables-buttons/js/buttons.html5.min.js') }}"></script>
<script src="{{ URL::asset('assets/plugins/datatables-buttons/js/buttons.print.min.js') }}"></script>
<script src="{{ URL::asset('assets/plugins/datatables-buttons/js/buttons.colVis.min.js') }}"></script>


<!-- Page specific script -->
<script>
  $(function () {
    $("#example1").DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": false,
      "buttons": [ "excel", "print"]
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });
  });
</script>

@endsection
