@if(session()->has('success'))
    <div class="alert success">
        <div class="icon">
            <i class="fas fa-check-circle"></i>
        </div>
        <div class="alert-body">
            <h5>{{ session()->get('success') }}</h5>
        </div>
        <div class="close">
            <i class="fas fa-times"></i>
        </div>
    </div>
@endif
@if(session()->has('info'))
    <div class="alert info">
        <div class="icon">
            <i class="fas fa-info-circle"></i>
        </div>
        <div class="alert-body">
            <h5>{{ session()->get('info') }}</h5>
        </div>
        <div class="close">
            <i class="fas fa-times"></i>
        </div>
    </div>
@endif
@if(session()->has('warning'))
    <div class="alert warning">
        <div class="icon">
            <i class="fas fa-exclamation-circle"></i>
        </div>
        <div class="alert-body">
            <h5>{{ session()->get('warning') }}</h5>
        </div>
        <div class="close">
            <i class="fas fa-times"></i>
        </div>
    </div>
@endif
@if(session()->has('danger'))
    <div class="alert danger">
        <div class="icon">
            <i class="fas fa-times-circle"></i>
        </div>
        <div class="alert-body">
            <h5>{{ session()->get('danger') }}</h5>
        </div>
        <div class="close">
            <i class="fas fa-times"></i>
        </div>
    </div>
@endif
@if(!empty($errors))
    @foreach ($errors->all() as $error)
        <div class="alert danger">
            <div class="icon">
                <i class="fas fa-times-circle"></i>
            </div>
            <div class="alert-body">
                <h5>{{ $error }}</h5>
            </div>
            <div class="close">
                <i class="fas fa-times"></i>
            </div>
        </div>
    @endforeach
@endif

