@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Edit Profile</div>

                <div class="panel-body">
                   
                    <form action="{{route('profile.update')}}" method="POST" enctype="multipart/form-data">
                        {{csrf_field()}}

                        <div class="form-group">
                            <label for="avatar">Upload Avatar</label>
                            <input type="file" name="avatar" id="avatar" class="form-control" accept="image/*">
                        </div>

                        <div class="form-group">
                            <label for="location">Location</label>
                            <input type="text" name="location" id="location" class="form-control" value="{{$profile->location}}" required>
                        </div>

                         <div class="form-group">
                            <label for="about">About Me</label>
                            <textarea name="about" id="about" cols="30" rows="5" class="form-control" required>{{$profile->about}}</textarea>
                        </div>
                        <div class="form-group text-center" >

                            <button class="btn btn-lg btn-primary" type="submit">
                                Save
                            </button>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
