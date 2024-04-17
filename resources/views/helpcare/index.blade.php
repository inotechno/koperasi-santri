@extends('layout-app.pusat')
@section('css')
<link rel="stylesheet" href="{{ asset('assets/libs/glightbox/css/glightbox.min.css') }}">
@endsection

@section('content')
{{-- <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0">Pusat Bantuan</h4>
            </div>
        </div>
    </div> --}}

<div class="container">
    <h2>Hai, Ada yang bisa kami bantu?</h2>
    <br>
    @if (auth()->user()->id == null )
    <h5>Apakah kamu mengalami kendala pada transaksimu?</h5>
    <div class="card">
        <div class="card-body">
            <div class="d-flex bd-highlight">
                <div class="p-2 flex-grow-1 bd-highlight">
                    <h5>Login yuk, agar komplain transaksimu jadi lebih mudah.</h5>
                </div>
                <div class="p-2 bd-highlight">
                    <a href="{{ route('login') }}" class="btn btn-info">
                        Login
                    </a>
                </div>
                <div class="p-2 bd-highlight">
                    <a href="index.html" class="btn btn-warning">
                        Tidak Bisa Login
                    </a>
                </div>
            </div>
        </div>
    </div>
    @endif
    {{-- <div class="container">
        <h4 style="text-align: center">Yang sering ditanyakan</h4>
        <div class="card">
            <div class="card-body">
                <div class="accordion accordion-border-box" id="genques-accordion">
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="genques-headingOne">
                            <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                data-bs-target="#genques-collapseOne" aria-expanded="true"
                                aria-controls="genques-collapseOne">
                                What is Lorem Ipsum ?
                            </button>
                        </h2>
                        <div id="genques-collapseOne" class="accordion-collapse collapse show"
                            aria-labelledby="genques-headingOne" data-bs-parent="#genques-accordion">
                            <div class="accordion-body">
                                If several languages coalesce, the grammar of the resulting language is more simple and
                                regular than that of the individual languages. The new common language will be more
                                simple and regular than the existing European languages. It will be as simple their most
                                common words.
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="genques-headingTwo">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                data-bs-target="#genques-collapseTwo" aria-expanded="false"
                                aria-controls="genques-collapseTwo">
                                Why do we use it ?
                            </button>
                        </h2>
                        <div id="genques-collapseTwo" class="accordion-collapse collapse"
                            aria-labelledby="genques-headingTwo" data-bs-parent="#genques-accordion">
                            <div class="accordion-body">
                                The new common language will be more simple and regular than the existing European
                                languages. It will be as simple as Occidental; in fact, it will be Occidental. To an
                                English person, it will seem like simplified English, as a skeptical Cambridge friend of
                                mine told me what Occidental is.
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="genques-headingThree">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                data-bs-target="#genques-collapseThree" aria-expanded="false"
                                aria-controls="genques-collapseThree">
                                Where does it come from ?
                            </button>
                        </h2>
                        <div id="genques-collapseThree" class="accordion-collapse collapse"
                            aria-labelledby="genques-headingThree" data-bs-parent="#genques-accordion">
                            <div class="accordion-body">
                                he wise man therefore always holds in these matters to this principle of selection: he
                                rejects pleasures to secure other greater pleasures, or else he endures pains to avoid
                                worse pains.But I must explain to you how all this mistaken idea of denouncing pleasure
                                and praising pain was born and I will give you a complete.
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="genques-headingFour">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                data-bs-target="#genques-collapseFour" aria-expanded="false"
                                aria-controls="genques-collapseFour">
                                Where can I get some ?
                            </button>
                        </h2>
                        <div id="genques-collapseFour" class="accordion-collapse collapse"
                            aria-labelledby="genques-headingFour" data-bs-parent="#genques-accordion">
                            <div class="accordion-body">
                                Cras ultricies mi eu turpis hendrerit fringilla. Vestibulum ante ipsum primis in
                                faucibus orci luctus et ultrices posuere cubilia Curae; In ac dui quis mi consectetuer
                                lacinia. Nam pretium turpis et arcu arcu tortor, suscipit eget, imperdiet nec, imperdiet
                                iaculis aliquam ultrices mauris.
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div> --}}
</div>
@endsection
