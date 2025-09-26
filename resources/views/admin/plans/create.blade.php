@extends('admin.layout.base')

@section('title', 'Create New Plan ')

@section('content')

<div class="content-area py-1">
    <div class="container-fluid">
    	
    	<div class="row bg-title">
            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                <h4 class="page-title">Create New Plan</h4><a href="{{ route('admin.plans.index') }}" class="btn btn-outline-warning btn-rounded w-min-sm m-l-0-75 waves-effect waves-light">List Subscriptions</a>
            </div>
            <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                
                <ol class="breadcrumb">
                    <li><a href="{{ route('admin.dashboard') }}">@lang('admin.dashboard')</a></li>
                    <li class="active">Create New Plan</li>
                </ol>
            </div>
        </div>

    	<div class="box box-block bg-white">
			<h5 style="margin-bottom: 2em;">Create New Plan</h5>
            <form action="{{ route('admin.plans.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="name">Plan Name</label>
            <input type="text" name="name" id="name" class="form-control" required>
        </div>

		<div class="form-group">
            <label for="name">Slug</label>
            <input type="text" name="slug" id="slug" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="price">Price (₱)</label>
            <input type="number" step="0.01" name="price" id="price" class="form-control" required>
        </div>


        <input type="hidden" name="signup_fee" id="signup_fee" class="form-control" required value="0">
 


        <input type="hidden" name="currency" id="currency" class="form-control" value="PHP" required>


        <div class="form-group">
            <label>Interval</label>
            <select name="interval" id="interval1" class="form-control" required>
                <option value="day">Day</option>
                <option value="week">Week</option>
                <option value="month">Month</option>
            </select>
        </div>

        <div class="form-group">
            <label for="interval_count">Interval Count</label>
            <input type="number" name="interval_count" id="interval_count" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="description">Description</label>
            <textarea name="description" id="description" class="form-control"></textarea>
        </div>

        <button type="submit" class="btn btn-success">Create Plan</button>
    </form>
		</div>
    </div>
</div>

@endsection
