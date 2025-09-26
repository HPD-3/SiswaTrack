@extends('layouts.app')

@section('content')
<div class="py-12  min-h-screen text-white">
    <div class="max-w-4xl mx-auto space-y-8">

        <!-- Update Profile Information -->
       
            <h2 class="text-xl font-bold text-blue-300 mb-4">Update Profile</h2>
            <div class="space-y-4">
                @include('profile.partials.update-profile-information-form')
            </div>


        <!-- Update Password -->
        
            <div class="space-y-4">
                @include('profile.partials.update-password-form')
            </div>


        <!-- Delete Account -->
        <div class="p-6 sm:p-8 bg-gradient-to-r from-red-700/80 to-red-900/80 text-white backdrop-blur-md shadow-lg sm:rounded-2xl border border-red-600 hover:shadow-red-400/30 transition">
            <h2 class="text-xl font-bold text-red-300 mb-4">Delete Account</h2>
            <div class="space-y-4">
                @include('profile.partials.delete-user-form')
            </div>
        </div>

    </div>
</div>
@endsection
