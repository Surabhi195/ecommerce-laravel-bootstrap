<!doctype html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width,initial-scale=1">
  <title>E-commerce SPA</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<nav class="navbar navbar-expand bg-light mb-4">
  <div class="container">
    <a class="navbar-brand" href="/">Shop</a>
    <div id="authLinks">
      <a class="btn btn-outline-primary me-2" href="/login">Login</a>
      <a class="btn btn-outline-success" href="/register">Register</a>
    </div>
  </div>
</nav>


<div class="container">
  @yield('content')
</div>
<script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
<script>
document.addEventListener('DOMContentLoaded', function(){
  const authLinks = document.getElementById('authLinks');
  const token = localStorage.getItem('token');
  if(token){
    // Replace Login/Register with Logout button
    authLinks.innerHTML = `
      <button class="btn btn-outline-danger" id="logoutBtn">Logout</button>
    `;

    document.getElementById('logoutBtn').addEventListener('click', async function(){
      try{
        // Optional: call API logout
        await axios.post('/api/logout', {}, {
          headers: { Authorization: `Bearer ${token}` }
        });
      }catch(e){
        console.log('Logout API failed, clearing token anyway');
      }
      localStorage.removeItem('token');
      window.location.href = '/';
    });
  }
});
</script>

@stack('scripts')
</body>
</html>
