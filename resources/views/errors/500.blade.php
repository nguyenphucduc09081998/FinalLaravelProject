@extends('layouts.app')

@section('title', 'BMS | Oops !')

@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>500 Error Page</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{url('/dashboard')}}">Home</a></li>
                        <li class="breadcrumb-item active">500 Error Page</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="error-page">
            <h2 class="headline text-danger">500</h2>

            <div class="error-content">
                <h3><i class="fa fa-warning text-danger"></i> Oops! Something went wrong.</h3>

                <p>
                    We will work on fixing that right away.
                    Meanwhile, you may <a href="{{url('/dashboard')}}">return to dashboard</a> or try using the search form.
                </p>

                <form class="search-form">
                    <div class="input-group">
                        <input type="text" name="search" class="form-control" placeholder="Search">

                        <div class="input-group-append">
                            <button type="submit" name="submit" class="btn btn-danger"><i class="fa fa-search"></i>
                            </button>
                        </div>
                    </div>
                    <!-- /.input-group -->
                </form>
            </div>
        </div>
        <!-- /.error-page -->

    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->
@endsection


@push('page-scripts')

@endpush
