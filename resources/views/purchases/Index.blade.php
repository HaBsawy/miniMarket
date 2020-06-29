
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

    <h2>المشتريات</h2>
    <button class="btn btn-primary modal-click" data-modal="createNewPurchase">إضافة عملية شراء</button>
    <div class="modal-custom createNewPurchase">
        <div class="modal-section">
            <div class="modal-head">
                <h4><i class="fas fa-star"></i> إضافة عملية شراء</h4>
                <div class="close closing">
                    <i class="fas fa-times"></i>
                </div>
            </div>
            <div class="modal-body">
                <form id="store" method="post" action="{{ route('purchases.store') }}">
                    @csrf
                    <div class="form-group row">
                        <label class="col-sm-3">الصنف</label>
                        <div class="col-sm-9">
                            <select class="selectpicker" name="item_id" data-style="form-control btn-default btn-outline" data-live-search="true">                                        <option>Select</option>
                                @if(!empty($items))
                                    @foreach($items as $item)
                                        <option value="{{ $item->id }}">{{ $item->name }}</option>
                                    @endforeach
                                @endif
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-3">الكمية</label>
                        <div class="col-sm-9">
                            <input type="number" name="quantity" class="form-control">
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button class="btn btn-secondary closing"><i class="fas fa-times"></i> غلق</button>
                <button type="submit" class="btn btn-primary" onclick="document.getElementById('store').submit();">
                    <i class="far fa-check-square"></i> إضافة
                </button>
            </div>
        </div>
    </div>
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
                                        <th>سعر الشراء</th>
                                        <th>التاريخ</th>
                                        <th>التحكم</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @if(!empty($purchases))
                                        @foreach($purchases as $purchase)
                                            <tr role="row">
                                                <td class="sorting_1">{{ $purchase->item->name }}</td>
                                                <td>{{ $purchase->quantity }}</td>
                                                <td>{{ $purchase->buy_price }}</td>
                                                <td>{{ date('Y-m-d', strtotime($purchase->created_at)) }}</td>
                                                <td>
                                                    @if (date('Y-m-d', strtotime(now())) == date('Y-m-d', strtotime($purchase->created_at)))
                                                    <button class="btn btn-danger btn-sm modal-click" data-modal="deleteItem{{ $purchase->id }}">حذف</button>
                                                    <form id="deleteForm{{ $purchase->id }}" action="{{ route('purchases.destroy', $purchase->id) }}" method="POST">
                                                        @method('delete')
                                                        @csrf
                                                    </form>
                                                    <div class="modal-custom small deleteItem{{ $purchase->id }}">
                                                        <div class="modal-section sweet-alert">
                                                            <div class="modal-body">
                                                                <div class="circle">
                                                                    <i class="fas fa-exclamation text-warning"></i>
                                                                </div>
                                                                <h3>هل ترغب فى حذف عملية الشراء ؟؟</h3>
                                                                <p>فى حالة الحذف فلن تسطيع استرجاع البيانات الخاصة بالعملية</p>
                                                                <button class="btn btn-primary modal-click closing" data-modal="deleteItem{{ $purchase->id }}-cancel">لا</button>
                                                                <button class="btn btn-primary" onclick="document.getElementById('deleteForm{{ $purchase->id }}').submit();">نعم</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="modal-custom small deleteItem{{ $purchase->id }}-cancel">
                                                        <div class="modal-section sweet-alert">
                                                            <div class="modal-body">
                                                                <p>بيانات العملية فى امان</p>
                                                                <button class="btn btn-primary closing">حسنا</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    @endif
                                                </td>
                                            </tr>
                                        @endforeach
                                    @else
                                        <tr>
                                            <td colspan="4">عفوا لا يوجد أصناف مسجلة</td>
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
