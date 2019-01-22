@extends('layouts.app')

@section('title')
    <title>Create thread</title>
@endsection
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header bg-dark text-light">Create a new thread</div>
                <div class="card-body">
                    <form action="/threads" method='POST'>
                        @csrf
                        @include('threads.category_dropdown')
                        <div class="form-group">
                            <label for="title">Subject:</label>
                            <input type="text" 
                                   class="form-control" 
                                   id="title" 
                                   placeholder="title" 
                                   name='title' 
                                   value='{{ old('title') }}'
                                   required>
                        </div>
                        <div class="form-group">
                            <label for="message">Message</label>
                            <textarea class='form-control' 
                                      name="body" 
                                      id="body" 
                                      rows='12' 
                                      placeholder='Say something profound' 
                                      required
                                      > {{ old('body') }}
                            </textarea>
                        </div>
                            @if ($errors->first())
                                @foreach($errors->all() as $error)
                                    <div class="alert alert-danger" role='alert'>
                                        {{ $error }}
                                    </div>
                                @endforeach
                            @endif
                        <div class="form-group">
                            <button class="btn btn-primary" type='submit'>Post</button>
                        </div>
                    </form>


                </div>
            </div>
        </div>
    </div>
</div>
@endsection
