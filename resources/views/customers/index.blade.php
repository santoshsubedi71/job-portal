@extends('adminlte::page')



@section('content')
    <div class="content-header">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>CLIENT LISTS</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item">Home</li>
                    <li class="breadcrumb-item active">Client List</li>
                </ol>
            </div>
        </div>
        <div class="col-md-6 mt-5">
            <a href="{{ route('customers.registration') }}" class="btn btn-primary">Create Client</a>
            
        </div>
    </div>
</section>

<div>
    <table id="example1" class="table table-bordered table-hover text-center">
        <thead>
        <tr>
            <th>reg id</th>
            <th>Name/Surname</th>
            <th>Age</th>
            <th>NEW/CHANGE</th>
            <th>Process</th>
            <th></th>
        </tr>
        </thead>
       
        <tbody>
            @foreach($customers as $customers)
            
       
            <tr>
            <td>{{ $customers->registration_number}}</td>
            <td>{{$customers->first_name}} {{ $customers->last_name}}</td>
            <td></td>
            <td>{{ \App\Enums\WorkingStatus::from ($customers->status)->label() }}</td>
            <td>{{ \App\Enums\Process::from($customers->process)->label() }}</td>
            <td>
                <a type="button" oneclick="showDetail()" class="link-icon"><i class="fa fa-info-circle"
                    aria-hidden="true"></i></a>
                    <button class="btn btn-primary" onclick="showUserDetail({{ $customers->id}})">View Details</button>
            </td>
            </tr>
            @endforeach
        </tbody>
       
    </table>
</div>

@stop

@section('js')


<script>
    $(function () {
      $("#example1").DataTable({
        "responsive": true, "lengthChange": false, "autoWidth": false,
      }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
      $('#example2').DataTable({
        "paging": true,
        "lengthChange": false,
        "searching": true,
        // "ordering": true,
        // "info": true,
        // "autoWidth": false,
        "responsive": true,
      });
    });
  </script>
   <script>
    function showUserDetail(id) {
        window.location.href = '/detail/' + id;
    }
</script>


@stop

