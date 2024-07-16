function addToCart(name, price, image) {
  const product = {
      name: name,
      price: price,
      image: image
  };
};
 
// logout pop up

function logout() {
  // Display a pop-up message
  alert('Successfully logged out');
}



 // Function to handle adding a product to the cart
function addToCart(event) {
    // Get product details from the clicked button's parent element
    const product = event.target.parentElement;
    const name = product.dataset.name;
    const price = product.dataset.price;
    const image = product.dataset.image;

    // Create a new cart item element
    const cartItem = document.createElement('div');
    cartItem.classList.add('cart-item');
    cartItem.innerHTML = `
        <img src="${image}" alt="${name}">
        <div>
            <h3>${name}</h3>
            <p>$${price}</p>
        </div>
    `;

    // Add the cart item to the cart page
    const cartContainer = document.getElementById('cart-items');
    cartContainer.appendChild(cartItem);
}

// Attach event listeners to all "Add to Cart" buttons
const addToCartButtons = document.querySelectorAll('.add-to-cart');
addToCartButtons.forEach(button => {
    button.addEventListener('click', addToCart);
});

