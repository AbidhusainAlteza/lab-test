@include('partials.header')
<main>
    <div class="breadcrumb-area breadcrumb-bg-two">
        <div class="container custom-container">
            <div class="row">
                <div class="col-12">
                    <div class="breadcrumb-content">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="/">Home</a></li>
                                <li class="breadcrumb-item active" aria-current="page">{{$title}}</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Popular Health Checkup Packages -->
    <section class="special--products-area pt-20 pb-50" >
        <div class="container custom-container">
            <div class="row">
                <div class="col-12">
                    <div class=" pt-10">
                        @if ($page->title_active == 'yes')
                        <h2 class="title">{{$title}}</h2>
                        @endif
                    </div>
                </div>
            </div>
            <div class="row popular_health_row">
                <div class="col-12">
                    @php
                       echo $page->page_content;
                    @endphp
                </div>
            </div>
        </div>
    </section>
    <!-- end Popular Health Checkup Packages -->
</main>
@include('partials.footer')
