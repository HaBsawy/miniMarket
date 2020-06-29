
@extends('index')

@section('content')

    @push('css')
        <link rel="stylesheet" href="{{ url('css/jquery.dataTables.min.css') }}" />
        <link rel="stylesheet" href="{{ url('css/bootstrap-select.min.css') }}" />
        <link rel="stylesheet" href="{{ url('css/select2.min.css') }}" />
        <link rel="stylesheet" href="{{ url('css/style_modals.css') }}" />
        <link rel="stylesheet" href="{{ url('css/style_sweet_alerts.css') }}" />
        <link rel="stylesheet" href="{{ url('css/style_UI_Elements.css') }}" />
        <link rel="stylesheet" href="{{ url('css/style_Tables.css') }}" />
    @endpush

    <h2>التقرير {{ $reportType }}</h2>
    <div class="row">
        <div class="col-sm-12">
            <div class="panel panel-default">
                <div class="panel-wrapper">
                    <div class="panel-body">
                        <div class="table-wrap">
                            <div class="table-responsive">
                                <table id="datable_1" class="table table-hover display  pb-30">
                                    <thead>
                                    <tr role="row">
                                        <th>الصنف</th>
                                        <th>الكمية</th>
                                        <th>سعر البيع</th>
                                        <th>الربح</th>
                                        <th>التاريخ</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @if(!empty($sales))
                                        @foreach($sales as $sale)
                                            <tr role="row">
                                                <td class="sorting_1">{{ $sale->item->name }}</td>
                                                <td>{{ $sale->quantity }}</td>
                                                <td>{{ $sale->sell_price }}</td>
                                                <td>{{ $sale->earning }}</td>
                                                <td>{{ date('Y-m-d', strtotime($sale->created_at)) }}</td>
                                            </tr>
                                        @endforeach
                                    @else
                                        <tr>
                                            <td colspan="5">عفوا لا يوجد أصناف مسجلة</td>
                                        </tr>
                                    @endif
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @push('js')
        <script src="{{ url('js/plugin_ulElements.js') }}"></script>
        <script src="{{ url('js/jquery.dataTables.min.js') }}"></script>
        <script src="{{ url('js/bootstrap-select.min.js') }}"></script>
        <script src="{{ url('js/select2.min.js') }}"></script>
        <script src="{{ url('js/dataTables.buttons.min.js') }}"></script>
        <script src="{{ url('js/buttons.flash.min.js') }}"></script>
        <script src="{{ url('js/jszip.min.js') }}"></script>
        <script src="{{ url('js/pdfmake.min.js') }}"></script>
        <script src="{{ url('js/vfs_fonts.js') }}"></script>
        <script src="{{ url('js/buttons.html5.min.js') }}"></script>
        <script src="{{ url('js/buttons.print.min.js') }}"></script>
        <script>
            $(document).ready(function() {
                $('#datable_1').DataTable( {
                    dom: 'Bfrtip',
                    buttons: ['print']
                } );

                $(".dt-button").addClass("btn btn-success");
                $(".buttons-print span").html('طباعة');
            } );
        </script>
    @endpush

@endsection
