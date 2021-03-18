@extends("base")

@section("content")
    <div class="jumbotron" style="margin-bottom: 0;">
        <h3>{{$question->title}}</h3>
    </div>

    <div class="row align-items-center section-overlay">

        <div class="col-xxl-5 col-xl-7 col-lg-6 col-md-12 container pt-20">
            <div class="about-caption about-caption1">

                <div class="section-tittle">
                    <div
                        class="d-flex justify-content-between align-items-center border-bottom pb-3 mb-3">
                        <h3>Answers</h3>
                        <span class="badge badge-success"><a
                                href="#answers-form">Post Answer</a></span>
                    </div>

                </div>
            </div>

        </div>


        @foreach($answers as $answer)
            <div class="col-xxl-5 col-xl-7 col-lg-6 col-md-12 container pt-20">
                <div class="about-caption about-caption1">
                    <h5>Posted At: {{$answer->created_at->diffForHumans()}}</h5>
                    <div class="section-tittle">
                        <div
                            class="d-flex justify-content-between align-items-center border-bottom pb-3 mb-3">
                            <p>{{$answer->content}}</p>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach

        <div class="col-xxl-5 col-xl-7 col-lg-6 col-md-12 container pt-20">
            {{$answers->links()}}
        </div>


        <div class="mt-4 container" id="answers-form">

            @if(Session::has('success'))
                <div class="alert alert-success">
                    {{ Session::get('success') }}
                    @php
                        Session::forget('success');
                    @endphp
                </div>
            @endif

            @if(Session::has('err'))
                <div class="alert alert-error">
                    {{ Session::get('err') }}
                    @php
                        Session::forget('err');
                    @endphp
                </div>
            @endif


            <form class="form-contact contact_form"
                  action="/questions/{{$question->id}}/answers#answers-form"
                  method="post"
                  novalidate="novalidate">
                @csrf

                <div class="row">

                    <div class="col-12">
                        <div class="form-group">
                            <label for="content">Content</label>
                            <textarea class="form-control w-100" name="content"
                                      id="content" cols="30" rows="9"
                                      placeholder="Enter Content">{{request()->get("content",null) ?? ""}}</textarea>

                            @if ($errors->has('content'))
                                <span
                                    class="text-danger">{{ $errors->first('content') }}</span>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="form-group mt-3">
                    <button type="submit"
                            class="button button-contactForm boxed-btn">Submit
                    </button>
                </div>
            </form>
        </div>


    </div>

@endsection




