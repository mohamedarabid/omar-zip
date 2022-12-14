@extends('layout.default')

@section('styles')
    <link href="{{ asset('plugins/custom/datatables/datatables.bundle.css') }}" rel="stylesheet" type="text/css" />
@endsection

@section('styles')
    <style>

    </style>
@endsection


@section('content')





    <!--begin::Card-->
    <div class="card card-custom">
        <div class="card-header flex-wrap border-0 pt-6 pb-0">
            <div class="card-title">
                <h3 class="card-label"> {{ __('admins') }}
                    <span class="d-block text-muted pt-2 font-size-sm"> </span>
                </h3>
            </div>
            {{-- @can('create-admins') --}}
            <div class="card-toolbar">
                <!--begin::Dropdown-->
                <a href="{{ route('admins.create') }}" class="btn btn-primary font-weight-bolder">
                    <i class="la la-plus"></i>
                    {{ __('create') }}
                </a>
                <!--end::Button-->
            </div>
            {{-- @endcan --}}
        </div>

        

        <div class="card-body">
            <!--begin: Datatable-->
            <table class="table table-separate table-head-custom table-checkable"  id="dataTable" style="width: 100%;" id="kt_datatable_2">
                <thead>

                    <tr>
                        <th scope="col" style="width: 50px;">
                            #
                        </th>
                        <th>{{ __('First Name') }}</th>
                        <th>{{ __('Last Name') }}</th>
                        <th>{{ __('Type') }}</th>
                        <th>{{ __('Email') }}</th>
                        <th>{{ __('Image') }}</th>
                        <th>{{ __('Status') }}</th>
                        <th>{{ __('Settings') }}</th>
                    </tr>
                </thead>
                <tbody>
           
                </tbody>
            </table>
            {{-- <span class="span">
                {!! $admins->links() !!}
            </span> --}}
            <!--end: Datatable-->
        </div>
    </div>
    <!--end::Card-->


    <!-- Modal-->
@endsection



@section('scripts')
    <script src="{{ asset('plugins/custom/datatables/datatables.bundle.js') }}"></script>

    <script src="{{ asset('js/app.js') }}" type="text/javascript"></script>

    <script src="{{ asset('crudjs/crud.js') }}"></script>
    <script>
        function performDestroy(id, reference) {

            let url = '/cms/admin/admins/' + id;

            confirmDestroy(url, reference);

        }

        var table = '';
            $(document).ready(function() {

                table = $('#dataTable').removeAttr('width').DataTable({
                    "processing": true,
                    "serverSide": true,
                    // "bFilter": false,
                    responsive: true,
                    autoWidth: false,
                    // "scrollX":true,
               
                    "ajax": "{{ route('admins.getData') }}",
                    language: {
                        search: "",
                        searchPlaceholder: "?????? ????????",
                        processing: "<span style='background-color: #0a9e87;color: #fff;padding: 25px;'>?????????? ???? ???????? ?? ?????? ?????? ???????????????? ...</span>",
                        lengthMenu: " _MENU_ ",
                        info: "???? _START_ ?????? _END_ ???? ?????? _TOTAL_ ????????",
                        infoEmpty: "???? ???????? ????????????",
                        loadingRecords: "?????? ?????????? ????????????????",
                        zeroRecords: "<p style='text-align: center'>???? ???????? ????????????</p>",
                        emptyTable: "<p style='text-align: center'>???? ???????? ????????????</p>",
                        paginate: {
                            first: "??????????",
                            previous: "????????????",
                            next: "????????????",
                            last: "????????????"
                        },
                        aria: {
                            sortAscending: ": ?????????? ????????????",
                            sortDescending: ": ?????????? ????????????"
                        }
                    },

                    "columnDefs": [{
                            className: "white_space",
                            targets: [1, 2, 3, 4]
                        },
                   
                   
                    ],
                    "aoColumns": [{
                            "mData": "id"
                        },
                        {
                            "mData": "first_name"
                        },
                        {
                            "mData": "last_name"
                        },
                        {
                            "mData": "email"
                        },
                        {
                            "mData": "image"
                        },
                        {
                            "mData": "status"
                        },
                        
                        {
                            "mData": "actions"
                        },
                 
                  
                    ]
                });
            });
    </script>
@endsection
