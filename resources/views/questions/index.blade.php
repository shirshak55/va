@extends("base")

@section("content")
    <div class="jumbotron" style="margin-bottom: 0;">
        <h3> Welcome to VH Questions Answers Sections:</h3>

        <div class="row w-100">
            <div class="col-md-4">
                <div class="card border-info mx-sm-1 p-3">
                    <div class="text-info text-center mt-3"><h4>Questions</h4></div>
                    <div class="text-info text-center mt-2"><h1>{{$questions_count}}+</h1></div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card border-success mx-sm-1 p-3">
                    <div class="text-success text-center mt-3"><h4>Answers</h4></div>
                    <div class="text-success text-center mt-2"><h1>{{$answers_count}}+</h1></div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card border-danger mx-sm-1 p-3">
                    <div class="text-danger text-center mt-3"><h4>Views</h4></div>
                    <div class="text-danger text-center mt-2"><h1>100k+</h1></div>
                </div>
            </div>
        </div>
    </div>



    <div class="row align-items-center section-overlay">

        <div class="col-xxl-5 col-xl-7 col-lg-6 col-md-12 container pt-20">
            <div class="about-caption about-caption1">

                <div class="section-tittle">
                    <div class="d-flex justify-content-between align-items-center border-bottom pb-3 mb-3">
                        <h3>Questions and Answers</h3>
                        <span class="badge badge-success"><a
                                href="/questions/create">Ask Question</a></span>
                    </div>

                </div>
            </div>

        </div>


        @foreach($questions as $question)
            <div class="col-xxl-5 col-xl-7 col-lg-6 col-md-12 container pt-20">
                <div class="about-caption about-caption1">
                    <div class="section-tittle">
                        <div class="d-flex justify-content-between align-items-center border-bottom pb-3 mb-3">
                            <h5><a href="/questions/{{$question->id}}">{{$question->title}}</a></h5>
                            <span class="badge badge-primary"><a
                                    href="/questions/{{$question->id}}#answers">{{ $question->answers()->count() }} answers</a></span>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach

        <div class="col-xxl-5 col-xl-7 col-lg-6 col-md-12 container pt-20">
            {{$questions->links()}}
        </div>

    </div>

@endsection




