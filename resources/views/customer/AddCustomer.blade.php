@extends('layouts.app')

@section('title', 'BMS | Customer Addnew')

@push('page-styles')
<link rel="stylesheet" href="{{asset('lib/datepicker/datepicker3.css')}}">
@endpush


<!-- http://bms.test/lib/font-awesome/css/fontawesome.min.css
https://bms.test/lib/font-awesome/css/fontawesome.min.css
 -->

@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>{{ __('messages.customer.screen_name_add_new') }}</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="">Home</a></li>
                        <li class="breadcrumb-item active">{{ __('messages.customer.screen_name_add_new') }}</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </div>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card card-primary card-outline">
                        <!-- <div class="card-header  d-flex p-0">
                            <h3 class="card-title  p-3">Add New Customer</h3>
                        </div> -->
                        <!-- /.card-header -->

                        <div class="card-body">
                            <form class="form" id="customerForm" action="{{url('addnewcustomer')}}" method="POST">
                                @csrf
                                <div class="row">
                                    <div class="col-md-5">
                                        <div class="form-group required">
                                            <label class="control-label">{{ __('messages.customer.code') }}</label>
                                            <div>
                                                <input id="customer_code" name="customer_code" type="text" class="form-control
                                                       @if($errors->has('customer_code')) border border-danger @endif" value="{{old('customer_code')}}" placeholder="{{ __('messages.customer.code') }}">
                                                <!-- @if ($errors->has('customer_code')) <span class="text-danger">{{$errors->first('customer_code')}}</span> @endif -->
                                            </div>
                                        </div>
                                        <!-- /input-group -->
                                    </div>
                                    <!-- /.col-md-5 -->

                                    <div class="col-md-2"></div>

                                    <div class="col-md-5">
                                        <div class="form-group required">
                                            <label class="control-label">{{ __('messages.customer.name') }}</label>
                                            <div>
                                                <input id="customer_name" name="customer_name" type="text" class="form-control
                                                       @if($errors->has('customer_name')) border border-danger @endif" maxlength="255" value="{{old('customer_name')}}" placeholder="{{ __('messages.customer.name') }}">
                                                <!-- @if ($errors->has('customer_name')) <span class="text-danger">{{$errors->first('customer_name')}}</span> @endif -->
                                            </div>
                                        </div>
                                        <!-- /input-group -->
                                    </div>
                                    <!-- /.col-md-5 -->
                                </div>
                                <!-- /.row -->

                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group required">
                                            <label class="control-label">{{ __('messages.customer.address') }}</label>
                                            <div>
                                                <input id="address" name="address" type="text" class="form-control
                                                       @if($errors->has('address')) border border-danger @endif" maxlength="255" value="{{old('address')}}" placeholder="{{ __('messages.customer.address') }}">
                                                <!-- @if ($errors->has('address')) <span class="text-danger">{{$errors->first('address')}}</span> @endif -->
                                            </div>
                                        </div>
                                        <!-- /input-group -->
                                    </div>
                                    <!-- /.col-md-12 -->
                                </div>
                                <!-- /.row -->

                                <div class="row">
                                    <div class="col-md-5">
                                        <div class="form-group required">
                                            <label class="control-label">{{ __('messages.customer.country') }}</label>
                                            <div>
                                               
                                                <!-- @if ($errors->has('country')) <span class="text-danger">{{$errors->first('country')}}</span> @endif -->
                                            </div>
                                        </div>
                                        <!-- /input-group -->
                                    </div>
                                    <!-- /.col-md-5 -->

                                    <div class="col-md-7"></div>

                                </div>
                                <!-- /.row -->

                                <div class="row">
                                    <div class="col-md-5">
                                        <div class="form-group">
                                            <label>{{ __('messages.customer.phone') }}</label>
                                       
                                        </div>
                                        <!-- /input-group -->
                                    </div>
                                    <!-- /.col-md-5 -->

                                    <div class="col-md-2"></div>

                                    <div class="col-md-5">
                                        <div class="form-group required">
                                            <label class="control-label">{{ __('messages.customer.manage_side') }}</label>
                                            <div>
                                            
                                            </div>
                                        </div>
                                        <!-- /input-group -->
                                    </div>
                                    <!-- /.col-md-5 -->
                                </div>
                                <!-- /.row -->

                                <div class="row">
                                    <div class="col-md-5">
                                        <div class="form-group">
                                            <label>{{ __('messages.customer.person_in_charge') }}</label>
                                            <div>
                                                <!-- <input id="person_in_charge" name="person_in_charge" type="text" class="form-control
                                                       @if($errors->has('person_in_charge')) border border-danger @endif" maxlength="255" value="{{old('person_in_charge')}}" placeholder="{{ __('messages.customer.person_in_charge') }}">
                                                @if ($errors->has('person_in_charge')) <span class="text-danger">{{$errors->first('person_in_charge')}}</span> @endif -->
                                            </div>
                                        </div>
                                        <!-- /input-group -->
                                    </div>
                                    <!-- /.col-md-5 -->

                                    <div class="col-md-2"></div>

                                    <div class="col-md-5">
                                        <div class="form-group required">
                                            <label class="control-label">{{ __('messages.customer.pic_mail') }}</label>
                                            <div>
                                                <!-- <input id="pic_mail" name="pic_mail" type="text" class="form-control
                                                       @if($errors->has('pic_mail')) border border-danger @endif" maxlength="255" value="{{old('pic_mail')}}" placeholder="{{ __('messages.customer.pic_mail') }}">
                                                @if ($errors->has('pic_mail')) <span class="text-danger">{{$errors->first('pic_mail')}}</span> @endif -->
                                            </div>
                                        </div>
                                        <!-- /input-group -->
                                    </div>
                                    <!-- /.col-md-5 -->
                                </div>
                                <!-- /.row -->

                                <div class="row">
                                    <div class="col-md-5">
                                        <div class="form-group required">
                                            <label class="control-label">{{ __('messages.customer.relation_from') }}</label>
                                            <div>
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text">
                                                            <i class="fa fa-calendar"></i>
                                                        </span>
                                                    </div>
                                                    <!-- <input id="relation_from" name="relation_from" type="text" class="form-control
                                                           @if($errors->has('relation_from')) border border-danger @endif" placeholder="{{ __('messages.customer.relation_from') }}" maxlength="10" value="{{old('relation_from')}}" autocomplete="nope" readonly> -->
                                                </div>
                                                <!-- @if ($errors->has('relation_from')) <span class="text-danger">{{$errors->first('relation_from')}}</span> @endif -->
                                            </div>
                                        </div>
                                        <!-- /input-group -->
                                    </div>
                                    <!-- /.col-md-5 -->

                                    <div class="col-md-7"></div>

                                </div>
                                <!-- /.row -->

                                <div class="row">
                                    <div class="col-md-5">
                                        <div class="form-group required">
                                            <label class="control-label">{{ __('messages.customer.sales_person') }}</label>
                                            <div>
                                                <input id="sales_person" name="sales_person" type="text" class="form-control
                                                       @if($errors->has('sales_person')) border border-danger @endif" maxlength="255" value="{{old('sales_person')}}" placeholder="{{ __('messages.customer.sales_person') }}">
                                                @if ($errors->has('sales_person')) <span class="text-danger">{{$errors->first('sales_person')}}</span> @endif
                                            </div>
                                        </div>
                                        <!-- /input-group -->
                                    </div>
                                    <!-- /.col-md-5 -->

                                    <div class="col-md-7"></div>

                                </div>
                                <!-- /.row -->

                                <div class="row">
                                    <div class="col-md-6 col-6">
                                        <div class="form-group">
                                            <a href="{{url('listcustomer')}}">
                                                <button type="button" class="btn btn-outline-danger">{{ __('messages.cancel') }}</button>
                                            </a>
                                        </div>
                                        <!-- /input-group -->
                                    </div>
                                    <!-- /.col-lg-6 -->

                                    <div class="col-md-6 col-6">
                                        <button type="submit" class="btn  btn-primary">{{ __('messages.create') }}</button>
                                        <!-- /input-group -->
                                    </div>
                                    <!-- /.col-lg-6 -->
                                </div>
                                <!-- /.row -->

                            </form>
                            <!-- /.form -->
                        </div><!-- /.card-body -->

                    </div>
                    <!-- /.card -->
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
            <!-- Modal -->
            <div class="modal fade" id="eModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLongTitle">Message</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            ...
                        </div>
                        <div class="modal-footer">
                            <button type="button" id="Cancel" class="btn  btn-primary" data-dismiss="modal">Close</button>
                            <!-- <button type="button" id="OK" class="btn btn-primary">Save changes</button> -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- /.content -->
    <!-- Modal -->
    <div class="modal fade" id="eModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Message</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    ...
                </div>
                <div class="modal-footer">
                    <button type="button" id="Cancel" class="btn  btn-primary" data-dismiss="modal">Close</button>
                    <!-- <button type="button" id="OK" class="btn btn-primary">Save changes</button> -->
                </div>
            </div>
        </div>
    </div>
</div>
<!-- /.content-wrapper -->
@endsection


@push('page-scripts')

<!-- SlimScroll -->
<script src="{{asset('lib/slimScroll/jquery.slimscroll.min.js')}}"></script>
<!-- FastClick -->
<script src="{{asset('lib/fastclick/fastclick.js')}}"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{asset('js/right-bar.js')}}"></script>
<!-- date-picker -->
<script src="{{asset('lib/datepicker/bootstrap-datepicker.js')}}"></script>
<!-- page script -->
<script>
    // $(function() {
    //     //Date picker
    //     $('#relation_from').datepicker({
    //         autoclose: true,
    //         todayHighlight: true,
    //         toggleActive: true,
    //         format: 'yyyy/mm/dd',
    //     });
    //     @if(session('message_success'))
    //     $('#eModalCenter').modal();
    //     $('.modal-body').html('Customer Name: ' + "{{session('message_success')}}" + '<br> <span >was created.</span>');
    //     @endif
    //     @isset($message_error)
    //     $('#eModalCenter').modal();
    //     $('.modal-body').html({
    //         {
    //             $message_error
    //         }
    //     });
    //     @endisset
    // });
</script>
@endpush