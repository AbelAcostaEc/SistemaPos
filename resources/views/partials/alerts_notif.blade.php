@if (session('success_notif'))
    <script>
        notif({
            type: "success",
            msg: "{{ session('success_notif') }}",
            position: "center",
            opacity: 0.8,
            multiline: true,
        });
    </script>
@endif
@if (session('error_notif'))
    <script>
        notif({
            type: "error",
            msg: "{{ session('error_notif') }}",
            position: "center",
            opacity: 0.8,
            multiline: true,
        });
    </script>
@endif
@if (session('alert_notif'))
    <script>
        notif({
            type: "warning",
            msg: "{{ session('alert_notif') }}",
            position: "center",
            opacity: 0.8,
            multiline: true,
        });
    </script>
@endif

{{-- SIDE NOTIFICATION GROW --}}
{{-- $.growl.error({
title: "Error",
message: "{{ session('error') }}",
type: "danger",
duration: 5000
}); --}}
