@extends('admin.layout.base')

@section('title', 'Subscription Plans ')

@section('content')
<div class="content-area py-1">
    <div class="container-fluid">

        <div class="row bg-title">
            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                <h4 class="page-title">Plans</h4>
                <!-- <a href="{{ route('admin.plans.create') }}" class="btn btn-outline-warning btn-rounded w-min-sm m-l-0-75 waves-effect waves-light">Create New Plan</a> -->
            </div>
            <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                
                <ol class="breadcrumb">
                    <li><a href="{{ route('admin.dashboard') }}">@lang('admin.dashboard')</a></li>
                    <li class="active">List Plans</li>
                </ol>
            </div>
        </div>

        <div class="box box-block bg-white">
        <table class="table">
        <thead>
            <tr>
                <th>Name</th>
                <th>Price</th>
                <th>Interval</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($plans as $plan)
            <tr>
                <td>{{ $plan->name }}</td>
                <td>{{ $plan->price }} ₱</td>
                <td>{{ ucfirst($plan->interval) }}</td>
                <td>
                    <a href="{{ route('admin.plans.edit', $plan->id) }}" class="btn btn-warning">Edit</a>
                    <!-- <form action="{{ route('admin.plans.destroy', $plan->id) }}" method="POST" style="display: inline-block;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form> -->
                </td>
            </tr>
            @endforeach
        </tbody> 
    </table>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script>
    function update_content(){
        $('#user-list').DataTable({
            "destroy": true,
            "responsive": true,
            "scrollX": false,
            "dom": 'Bfrtip',
            "buttons": [
                'copyHtml5',
                'excelHtml5',
                'csvHtml5',
                'pdfHtml5'
            ],
            "oLanguage": {
                'sProcessing': '<i class="fa fa-circle-o-notch fa-spin" style="font-size:24px;color:#a377b1;"></i>'
            },
            "lengthMenu": [[10, 25, 50, 100, 1000000], [10, 25, 50, 100, "All"]],
            "processing": true,
            "serverSide": true,
            "ajax":{
                     "url": "{{ route('admin.user.row') }}",
                     "dataType": "json",
                     "type": "POST",
                     "data":{ _token: "{{csrf_token()}}"}
                   },
            "columns": [
                { "data": "id" },
                { "data": "name" },
                { "data": "email" },
                { "data": "mobile" },
                { "data": "rating" },
                { "data": "corporate" },
                { "data": "action" },
            ]    

        });
    }

    $(window).load(function(){
        update_content();
    });
</script>
@endsection