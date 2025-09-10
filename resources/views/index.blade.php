@extends('layout')

@section('content')
<div class="container py-5">
    <h1 class="mb-4">Welcome to My E-commerce App</h1>
    <div id="homeButtons">
        <!-- Buttons will be injected by JS based on JWT -->
    </div>
</div>
@endsection

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function(){
    const homeButtons = document.getElementById('homeButtons');
    const token = localStorage.getItem('token');

    if(token){
        // Logged in: show Browse Items button only
        homeButtons.innerHTML = `
            <a href="/items" class="btn btn-info">Browse Items</a>
        `;
    } else {
        // Not logged in: show Register / Login / Browse Items
        // <a href="/register" class="btn btn-primary me-2">Register</a>
            // <a href="/login" class="btn btn-success me-2">Login</a>
            // <a href="/items" class="btn btn-info">Browse Items</a>
           
        homeButtons.innerHTML = `
            
        `;

    }
});
</script>
@endpush
