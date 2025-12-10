@extends('front-view.layout.front-layout-master')

@section('title', 'Home')

@section('content')
<section id="Portfolio" class="hero">

    <section class="ftco-section ftco-hireme img margin-top"
        style="background-image: url({{ asset('fornt-style/images/bg_1.jpg') }}">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-7 ftco-animate text-center">
                    <h2>Creating Next Level
                        Digital Products</h2>
                    <p>Properly set processes. Transparent cooperation. Predictable delivery.</p>
                    {{-- <p class="mb-0"><a href="#" class="btn btn-primary py-3 px-5">Hire me</a></p> --}}
                </div>
            </div>
        </div>
        <div class="py-5 mt-5">



    </section>


    <div class="sss">
        @foreach ($workItems as $project)
        <div class="card ">
            <img src="{{ Storage::url($project->image) }}" alt="Image" />
            {{-- <h3>{{ $project->title }}</h3> --}}
            {{-- <p>{{ $project->details->Description }}</p> --}}
        </div>
        @endforeach
    </div>

</section>


@endsection
