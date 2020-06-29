
@extends('index')

@section('content')

    @push('css')
        <link rel="stylesheet" href="{{ url('css/jquery.dataTables.min.css') }}" />
        <link rel="stylesheet" href="{{ url('css/style_modals.css') }}" />
        <link rel="stylesheet" href="{{ url('css/style_sweet_alerts.css') }}" />
        <link rel="stylesheet" href="{{ url('css/style_UI_Elements.css') }}" />
        <link rel="stylesheet" href="{{ url('css/style_Tables.css') }}" />
    @endpush

    <h2>الأصناف</h2>
    <button class="btn btn-primary modal-click" data-modal="createNewItem">إضافة صنف جديد</button>
    <div class="modal-custom createNewItem">
        <div class="modal-section">
            <div class="modal-head">
                <h4><i class="fas fa-star"></i> إضافة صنف جديد</h4>
                <div class="close closing">
                    <i class="fas fa-times"></i>
                </div>
            </div>
            <div class="modal-body">
                <form id="store" method="post" action="{{ route('items.store') }}">
                    @csrf
                    <div class="form-group row">
                        <label class="col-sm-3">إسم الصنف</label>
                        <div class="col-sm-9">
                            <input type="text" name="name" class="form-control">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-3">الكمية</label>
                        <div class="col-sm-9">
                            <input type="text" name="quantity" class="form-control">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-3">سعر الشراء</label>
                        <div class="col-sm-9">
                            <input type="text" name="buy_price" class="form-control">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-3">سعر البيع</label>
                        <div class="col-sm-9">
                            <input type="text" name="sell_price" class="form-control">
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
                                        <th>الإسم</th>
                                        <th>الكمية</th>
                                        <th>سعر الشراء</th>
                                        <th>سعر البيع</th>
                                        <th>الربح</th>
                                        <th>التحكم</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @if(!empty($items))
                                        @foreach($items as $item)
                                            <tr role="row">
                                                <td class="sorting_1">{{ $item->name }}</td>
                                                <td>{{ $item->quantity }}</td>
                                                <td>{{ $item->buy_price }}</td>
                                                <td>{{ $item->sell_price }}</td>
                                                <td>{{ $item->earning }}</td>
                                                <td>
                                                    <button class="btn btn-warning btn-sm modal-click" data-modal="editItem{{ $item->id }}">تعديل</button>
                                                    <button class="btn btn-danger btn-sm modal-click" data-modal="deleteItem{{ $item->id }}">حذف</button>
                                                    <form id="deleteForm{{ $item->id }}" action="{{ route('items.destroy', $item->id) }}" method="POST">
                                                        @method('delete')
                                                        @csrf
                                                    </form>
                                                    <div class="modal-custom editItem{{ $item->id }}">
                                                        <div class="modal-section">
                                                            <div class="modal-head">
                                                                <h4><i class="fas fa-star"></i> تعديل {{ $item->name }}</h4>
                                                                <div class="close closing">
                                                                    <i class="fas fa-times"></i>
                                                                </div>
                                                            </div>
                                                            <div class="modal-body">
                                                                <form id="edit{{ $item->id }}" method="post" action="{{ route('items.update', $item->id) }}">
                                                                    @method('put')
                                                                    @csrf
                                                                    <div class="form-group row">
                                                                        <label class="col-sm-3">الكمية</label>
                                                                        <div class="col-sm-9">
                                                                            <input type="text" name="quantity" class="form-control" value="{{ $item->quantity }}">
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-group row">
                                                                        <label class="col-sm-3">سعر الشراء</label>
                                                                        <div class="col-sm-9">
                                                                            <input type="text" name="buy_price" class="form-control" value="{{ $item->buy_price }}">
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-group row">
                                                                        <label class="col-sm-3">سعر البيع</label>
                                                                        <div class="col-sm-9">
                                                                            <input type="text" name="sell_price" class="form-control" value="{{ $item->sell_price }}">
                                                                        </div>
                                                                    </div>
                                                                </form>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button class="btn btn-secondary closing"><i class="fas fa-times"></i> غلق</button>
                                                                <button type="submit" class="btn btn-primary" onclick="document.getElementById('edit{{ $item->id }}').submit();">
                                                                    <i class="far fa-check-square"></i> تعديل
                                                                </button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="modal-custom small deleteItem{{ $item->id }}">
                                                        <div class="modal-section sweet-alert">
                                                            <div class="modal-body">
                                                                <div class="circle">
                                                                    <i class="fas fa-exclamation text-warning"></i>
                                                                </div>
                                                                <h3>هل ترغب فى حذف {{ $item->name }} ؟؟</h3>
                                                                <p>فى حالة الحذف فلن تسطيع استرجاع البيانات الخاصة بالصنف</p>
                                                                <button class="btn btn-primary modal-click closing" data-modal="deleteItem{{ $item->id }}-cancel">لا</button>
                                                                <button class="btn btn-primary" onclick="document.getElementById('deleteForm{{ $item->id }}').submit();">نعم</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="modal-custom small deleteItem{{ $item->id }}-cancel">
                                                        <div class="modal-section sweet-alert">
                                                            <div class="modal-body">
                                                                <p>بيانات الصنف فى امان</p>
                                                                <button class="btn btn-primary closing">حسنا</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </td>
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
