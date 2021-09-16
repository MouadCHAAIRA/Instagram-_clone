@extends('layouts.master')
@section('content')
<h1 class='text-center'>Create your profile</h1>
<main class="edit-profile">
            <section class="profile-form">
                <header class="profile-form__header">
                    <div class="profile-form__avatar-container">
                        <img 
                            src="images/avatar.jpg"
                            class="profile-form__avatar"
                        />
                    </div>
                    <h4 class="profile-form__title">{{Auth::user()->name}}</h4>
                </header>
                <form action="{{route('store')}}"  method="POST" class="edit-profile__form" enctype="multipart/form-data">
                    @csrf
                    <div class="edit-profile__form-row">
                        <label  class="edit-profile__label">Photo 
                        </label>
                        <input 
                            id="name"
                            name="photo"
                            type="file"
                            class="edit-profile__input"
                        />
                    </div>
                    <div class="edit-profile__form-row">
                        <label for="username" class="edit-profile__label">
                            Username
                        </label>
                        <input 
                            type="text"
                            id="username"
                            name="username"
                            class="edit-profile__input"
                        />
                    </div>
                    <div class="edit-profile__form-row">
                        <label for="website" class="edit-profile__label">
                            Website
                        </label>
                        <input
                            type="url"
                            id="website"
                            name="website"
                            class="edit-profile__input"
                        />
                    </div>
                    <div class="edit-profile__form-row">
                        <label for="bio" class="edit-profile__label">
                            Bio
                        </label>
                        <textarea id="bio" name="bio" class="edit-profile__textarea"></textarea>
                    </div>
                      <div class="edit-profile__form-row">
                        <label for="phone-number" class="edit-profile__label">
                            Phone Number
                        </label>
                        <input 
                            type="text"
                            class="edit-profile__input"
                            id="phone-number"
                            name="phone"
                        />
                    </div>
                    
                    <div class="edit-profile__form-row">
                        <label for="gender" class="edit-profile__label">Gender</label>
                        <select id="gender" name="gender">
                            <option value="male">Male</option>
                            <option value="female">Female</option>
                        </select>
                    </div>
                    <div class="edit-profile__form-row">
                        <span class="edit-profile__label">Similar Account Suggestions</span>
                        <input type="checkbox" id="similar" checked>
                        <label for="similar">Include your account when recommending similar accounts people might want to follow. <a href="#">[?]</a></label>
                    </div>
                    <div class="edit-profile__form-row">
                        <label class="edit-profile__label"></label>
                        <input type="submit" value="Submit">
                    </div>
                </form>
            </section>
        </main>
    
@endsection