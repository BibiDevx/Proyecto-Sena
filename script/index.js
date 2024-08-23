const addToShoppingCartButtons = document.querySelectorAll('.fa-cart-plus');
addToShoppingCartButtons.forEach(addToCartButton =>{
    addToCartButton.addEventListener('click',addToCartClicked);
});

function addToCartClicked(event){
    const  button = event.target;
    const item = button.closest('.cajaproducto');
    console.log('addToCartClicked -> .cajaproducto',item);
}