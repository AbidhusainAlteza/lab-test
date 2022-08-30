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
                <div class=col-12>
                    <div class=" pt-10">
                        <h2 class="title">{{$title}}</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <form  action="{{url('upload-prescription-post')}}" method="POST" enctype="multipart/form-data" >

                        @csrf
                        <div class="card">
                            <div class="card-body">
                                <h6>
                                    Upload Prescription
                                </h6>
                                <input id="prescription_image_uploadify" type="file" name="files" accept=".jpg, .png, image/jpeg, image/png,pdf" multiple required>
                                <button type="submit" class="btn mt-10"> Submit</button>
                            </div>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </section>
    <div class="img_modal">

    </div>
    <!-- end Popular Health Checkup Packages -->
</main>
@include('partials.footer')

