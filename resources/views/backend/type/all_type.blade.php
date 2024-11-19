@extends('admin.admin_dashboard')
@section('admin')
    <div class="page-content">

        <nav class="page-breadcrumb">
            <ol class="breadcrumb">
                <a href="{{ route('add.type') }}" class="btn btn-inverse-info">Add Property Type</a>

            </ol>
        </nav>

        <div class="row">
            <div class="col-md-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h6 class="card-title">Property Type All</h6>
                        <div class="table-responsive">
                            <table id="propertyDataTable" class="table">
                                <thead>
                                    <tr>
                                        <th>SI No</th>
                                        <th>Type Name</th>
                                        <th>Type Icon</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
    @push('body-scripts')
        <script>
            $(document).ready(function() {
                $('#propertyDataTable').DataTable({
                    processing: true,
                    serverSide: true,
                    ajax: '{{ route('fetch.types') }}',
                    columns: [{
                            data: 'row_number',
                            name: 'row_number'
                        },
                        {
                            data: 'type_name',
                            name: 'type_name'
                        },
                        {
                            data: 'type_icon',
                            name: 'type_icon'
                        },
                        {
                            data: 'action',
                            name: 'action',
                            orderable: false,
                            searchable: false
                        }
                    ],
                    "aLengthMenu": [
                        [10, 30, 50, -1],
                        [10, 30, 50, "All"]
                    ],
                    "iDisplayLength": 10,
                    "language": {
                        search: "_INPUT_",
                        searchPlaceholder: "Search..."
                    },
                    "pagingType": "full_numbers",
                    "drawCallback": function() {
                        // Custom styling or JS interactions with theme
                        var search_input = $('#dataTableExample_filter input');
                        search_input.addClass('form-control'); // Add theme's input style class
                        search_input.removeClass(
                            'form-control-sm'); // Remove if default small size doesn't fit

                        var length_sel = $('#dataTableExample_length select');
                        length_sel.addClass('form-control'); // Add theme's select style class
                        length_sel.removeClass('form-control-sm');
                    }


                });
                //});
            });
        </script>
    @endpush
@endsection
