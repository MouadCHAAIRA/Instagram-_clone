@extends('layouts.master')
@section('content')
          <form action="{{route('storePost')}}"  method="POST" class="edit-profile__form" enctype="multipart/form-data">
                    @csrf
                    <div class="edit-profile__form-row">
                        <label for="username" class="edit-profile__label">
                            Title
                        </label>
                        <input 
                            type="text"
                            id="username"
                            name="title"
                            class="edit-profile__input"
                            autofocus
                        />
                    </div>

                    <div class="edit-profile__form-row">
                        <label  class="edit-profile__label">Photo 
                        </label>
                        <input 
                            id="name"
                            name="photoPost"
                            type="file"
                            class="edit-profile__input"
                        />
                    </div>
                    <div class="edit-profile__form-row">
                        <label class="edit-profile__label"></label>
                        <input type="submit" value="Submit">
                    </div>
    </form>
@endsection