@if ($message = Session::get('success'))
    <script>
        Swal.fire({
            html: '<div class="mt-3"><lord-icon src="https://cdn.lordicon.com/lupuorrc.json" trigger="loop" colors="primary:#0ab39c,secondary:#405189" style="width:120px;height:120px"></lord-icon><div class="mt-4 pt-2 fs-15"><h4>Well done !</h4><p class="text-muted mx-4 mb-0">{{ $message }}</p></div></div>',
            showCancelButton: !0,
            showConfirmButton: !1,
            cancelButtonClass: "btn btn-primary w-xs mb-1",
            cancelButtonText: "Back",
            buttonsStyling: !1,
            showCloseButton: !0,
            timer: 1500
        })
    </script>
@endif

@if ($message = Session::get('error'))
    <script>
        Swal.fire({
            html: '<div class="mt-3"><lord-icon src="https://cdn.lordicon.com/tdrtiskw.json" trigger="loop" colors="primary:#f06548,secondary:#f7b84b" style="width:120px;height:120px"></lord-icon><div class="mt-4 pt-2 fs-15"><h4>Oops...! Something went Wrong !</h4><p class="text-muted mx-4 mb-0">{{ $message }}</p></div></div>',
            showCancelButton: !0,
            showConfirmButton: !1,
            cancelButtonClass: "btn btn-primary w-xs mb-1",
            cancelButtonText: "Back",
            buttonsStyling: !1,
            showCloseButton: !0,
            timer: 1500
        })
    </script>
@endif

@if (session()->has('warning'))
    <script>
        Swal.fire({
            html: '<div class="mt-3"><lord-icon src="https://cdn.lordicon.com/gsqxdxog.json" trigger="loop" colors="primary:#f7b84b,secondary:#f06548" style="width:100px;height:100px"></lord-icon><div class="mt-4 pt-2 fs-15 mx-5"><h4>Are you Sure ?</h4><p class="text-muted mx-4 mb-0">Are you Sure You want to Delete this Account ?</p></div></div>',
            showCancelButton: !0,
            confirmButtonClass: "btn btn-primary w-xs me-2 mb-1",
            confirmButtonText: "Yes, Delete It!",
            cancelButtonClass: "btn btn-danger w-xs mb-1",
            buttonsStyling: !1,
            showCloseButton: !0
        })
    </script>
@endif

<script>
    function notification(type, message) {
        if (type == 'success') {
            Swal.fire({
                html: '<div class="mt-3"><lord-icon src="https://cdn.lordicon.com/lupuorrc.json" trigger="loop" colors="primary:#0ab39c,secondary:#405189" style="width:120px;height:120px"></lord-icon><div class="mt-4 pt-2 fs-15"><h4>Well done !</h4><p class="text-muted mx-4 mb-0">' +
                    message + '</p></div></div>',
                showCancelButton: !0,
                showConfirmButton: !1,
                cancelButtonClass: "btn btn-primary w-xs mb-1",
                cancelButtonText: "Back",
                buttonsStyling: !1,
                showCloseButton: !0,
                timer: 1500
            })
        } else {
            Swal.fire({
                html: '<div class="mt-3"><lord-icon src="https://cdn.lordicon.com/tdrtiskw.json" trigger="loop" colors="primary:#f06548,secondary:#f7b84b" style="width:120px;height:120px"></lord-icon><div class="mt-4 pt-2 fs-15"><h4>Oops...! Something went Wrong !</h4><p class="text-muted mx-4 mb-0">' +
                    message + '</p></div></div>',
                showCancelButton: !0,
                showConfirmButton: !1,
                cancelButtonClass: "btn btn-primary w-xs mb-1",
                cancelButtonText: "Back",
                buttonsStyling: !1,
                showCloseButton: !0,
                timer: 1500
            })
        }
    }
</script>
