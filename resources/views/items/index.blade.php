@extends('layout')
@section('content')
<div class="d-flex justify-content-between align-items-center mb-3">
  <h3>Items</h3>
  <div>
    <a href="/cart" class="btn btn-outline-secondary">Cart</a>
  </div>
</div>
<div class="row mb-3">
  <div class="col-md-3">
    <select id="category" class="form-select">
      <option value="">All categories</option>
      <option value="clothing">Clothing</option>
      <option value="footwear">Footwear</option>
      <option value="home">Home</option>
    </select>
  </div>
  <div class="col-md-3">
    <input id="min_price" class="form-control" placeholder="Min price">
  </div>
  <div class="col-md-3">
    <input id="max_price" class="form-control" placeholder="Max price">
  </div>
  <div class="col-md-3">
    <button id="filterBtn" class="btn btn-primary">Filter</button>
  </div>
</div>
<div id="items" class="row"></div>
@endsection
@push('scripts')
<script>
axios.defaults.headers.common['Authorization'] = 'Bearer ' + localStorage.getItem('token');
async function loadItems(){
  const params = {};
  const cat = document.getElementById('category').value;
  const min = document.getElementById('min_price').value;
  const max = document.getElementById('max_price').value;
  if(cat) params.category = cat;
  if(min) params.min_price = min;
  if(max) params.max_price = max;
  const res = await axios.get('/api/items',{params});
  const el = document.getElementById('items');
  el.innerHTML = '';
  res.data.forEach(i=>{
    el.innerHTML += `
<div class="col-md-4 mb-4">
  <div class="card h-100 shadow-sm">
    
    <div class="card-body d-flex flex-column">
      <h5 class="card-title">${i.name}</h5>
      <p class="card-text text-truncate">${i.description || 'No description available'}</p>
      <div class="mt-auto">
        <div class="d-flex justify-content-between align-items-center mb-2">
          <span class="fw-bold">₹ ${i.price}</span>
          <button class="btn btn-sm btn-primary" onclick="addToCart(${i.id})">
            <i class="bi bi-cart-plus"></i> Add to cart
          </button>
        </div>
      </div>
    </div>
  </div>
</div>`;
  });
  // <img src="${i.image || 'https://via.placeholder.com/300x200?text=No+Image'}" class="card-img-top" alt="${i.name}">
}
async function addToCart(itemId){
  try{
    await axios.post('/api/cart/add',{item_id:itemId,quantity:1});
    alert('Added to cart');
  }catch(e){ alert('Add failed'); }
}
document.getElementById('filterBtn').addEventListener('click', loadItems);
window.addEventListener('load', loadItems);
</script>
@endpush
