@extends("base")

@section("content")

    <div class="jumbotron" style="margin-bottom: 0;">
        <h3>Ask a Question:</h3>


    </div>


    <div class="mt-4 container">

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


        <form class="form-contact contact_form" action="/questions"
              method="post">
            @csrf

            <div class="row">
                <div class="col-12">
                    <div class="form-group">
                        <label for="title">Question Title</label>
                        <input class="form-control" name="title" id="title"
                               type="text"
                               placeholder="Enter title"
                               value="{{$title ?? ""}}">

                        @if ($errors->has('title'))
                            <span
                                class="text-danger">{{ $errors->first('title') }}</span>
                        @endif

                    </div>
                </div>

                <div class="col-12">
                    <div class="form-group">
                        <label for="content">Content</label>
                        <textarea class="form-control w-100" name="content"
                                  id="content" cols="30" rows="9"
                                  placeholder="Enter Content">{{$content??""}}</textarea>

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

@endsection




