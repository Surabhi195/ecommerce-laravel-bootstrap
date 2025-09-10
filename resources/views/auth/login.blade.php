@extends('layout')
@section('content')
<div class="row justify-content-center">
  <div class="col-md-6">
    <h3>Login</h3>
    <form id="loginForm">
      <div class="mb-2"><input class="form-control" name="email" placeholder="Email"></div>
      <div class="mb-2"><input type="password" class="form-control" name="password" placeholder="Password"></div>
      <button class="btn btn-primary">Login</button>
    </form>
    <div id="msg" class="mt-3 text-danger"></div>
  </div>
</div>
@endsection
@push('scripts')
<script>
document.getElementById('loginForm').addEventListener('submit', async function(e){
  e.preventDefault();
  const email = e.target.email.value;
  const password = e.target.password.value;
  try{
    const res = await axios.post('/api/login',{email,password});
    localStorage.setItem('token', res.data.access_token);
    window.location.href = '/';
  }catch(err){
    document.getElementById('msg').textContent = err.response?.data?.message || 'Login failed';
  }
});
</script>
@endpush
