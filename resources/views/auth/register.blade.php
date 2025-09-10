@extends('layout')
@section('content')
<div class="row justify-content-center">
  <div class="col-md-6">
    <h3>Register</h3>
    <form id="regForm">
      <div class="mb-2"><input class="form-control" name="name" placeholder="Name"></div>
      <div class="mb-2"><input class="form-control" name="email" placeholder="Email"></div>
      <div class="mb-2"><input type="password" class="form-control" name="password" placeholder="Password"></div>
      <button class="btn btn-success">Register</button>
    </form>
    <div id="msg" class="mt-3 text-danger"></div>
  </div>
</div>
@endsection
@push('scripts')
<script>
document.getElementById('regForm').addEventListener('submit', async function(e){
  e.preventDefault();
  const name = e.target.name.value;
  const email = e.target.email.value;
  const password = e.target.password.value;
  try{
    const res = await axios.post('/api/register',{name,email,password});
    localStorage.setItem('token', res.data.access_token);
    window.location.href = '/';
  }catch(err){
    document.getElementById('msg').textContent = err.response?.data?.message || 'Register failed';
  }
});
</script>
@endpush
