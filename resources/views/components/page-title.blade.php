<div class="row mt-2">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                @if (Session::has('client'))
                    <h4 class="card-title">{{ session('client') }} </h4>
                @else
                    <h4 class="card-title">{{ session('title') }} </h4>
                @endif
            </div>
            <!--end card-header-->

        </div>
    </div> <!-- end col -->
</div> <!-- end row -->
