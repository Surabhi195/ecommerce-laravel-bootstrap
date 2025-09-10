@extends('layout')
@section('content')
<h3>Your Cart</h3>
<div id="cartItems"></div>
@endsection
@push('scripts')
<script>
axios.defaults.headers.common['Authorization'] = 'Bearer ' + localStorage.getItem('token');
async function loadCart(){
  const res = await axios.get('/api/cart');
  const el = document.getElementById('cartItems');
  if(res.data.length===0){ el.innerHTML = '<p>No items in cart.</p>'; return; }
  el.innerHTML = '<ul class="list-group"></ul>';
  const ul = el.querySelector('ul');
  res.data.forEach(c=>{
    ul.innerHTML += `<li class="list-group-item d-flex justify-content-between align-items-center">
      <div>
        <strong>${c.item.name}</strong><br>Qty: ${c.quantity} — ₹ ${c.item.price}
      </div>
      <div>
        <button class="btn btn-sm btn-danger" onclick="removeCart(${c.id})">Remove</button>
      </div>
    </li>`;
  });
}
async function removeCart(id){
  await axios.delete('/api/cart/'+id);
  loadCart();
}
window.addEventListener('load', loadCart);
</script>
@endpush
