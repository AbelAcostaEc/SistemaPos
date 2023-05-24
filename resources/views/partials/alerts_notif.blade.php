@if (session('success'))
    <script>
        notif({
            type: "success",
            msg: "{{ session('success') }}",
            position: "center",
            opacity: 0.8,
            multiline: true,
        });
    </script>
@endif
@if (session('error'))
    <script>
        notif({
            type: "error",
            msg: "{{ session('error') }}",
            position: "center",
            opacity: 0.8,
            multiline: true,
        });
    </script>
@endif
@if (session('alert'))
    <script>
        notif({
            type: "warning",
            msg: "{{ session('alert') }}",
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
