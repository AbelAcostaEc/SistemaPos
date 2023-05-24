
{{-- ALERT BOOTSTRAP --}}

<div class="col-md-12">
    @if (session('success_bs'))
        <div class="alert alert-success alert-dismissible fade show mb-0" role="alert">
            <span class="alert-inner--icon"><i class="fe fe-thumbs-up"></i></span>
            <span class="alert-inner--text"><strong>Correcto!</strong><br>{{ session('success_bs') }}</span>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">×</span>
            </button>
        </div>
    @endif
    @if (session('error_bs'))
        <div class="alert alert-danger alert-dismissible fade show mb-0" role="alert">
            <span class="alert-inner--icon"><i class="fe fe-slash"></i></span>
            <span class="alert-inner--text"><strong>Error!</strong><br>{{ session('error_bs') }}</span>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">×</span>
            </button>
        </div>
    @endif
    @if (session('alert_bs'))
        <div class="alert alert-warning alert-dismissible fade show mb-0" role="alert">
            <span class="alert-inner--icon"><i class="fe fe-info"></i></span>
            <span class="alert-inner--text"><strong>Alerta!</strong><br>{{ session('alert_bs') }}</span>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">×</span>
            </button>
        </div>
    @endif
</div>
