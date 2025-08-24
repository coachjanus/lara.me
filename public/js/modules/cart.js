"use strict";

import Store from "./store.js";


class CartItem {
    constructor(id, amount) {
        this.id = id;
        this.amount = amount;
    }
}

export default class Cart {

    cart = [];

    constructor (key = 'basket') {
        this.cart = Store.init(key);
        this.cartItemsAmount();
    }

    saveCart(key = 'basket') {
        Store.set(key, this.cart);
        this.cartItemsAmount();
    }

    addProductToCart(cartItem, amount = 1) {
        let inCart = this.cart.some(element => element.id==cartItem.id);

        if (inCart) {
            for(let item of this.cart) {
                if (+item.id == cartItem.id) {
                    item.amount += amount;
                    this.saveCart();
                    return;
                }
            }
        }else{
            let newCartItem = {...cartItem};
            this.cart = [...this.cart, newCartItem];
            this.saveCart();
        }
    }

    addProductToCartButton(buttons, amount) {
        buttons.forEach(element => {
            element.addEventListener('click', event => {
                event.preventDefault();
                let productId = event.target.closest('.card').dataset.id;
                let cartItem = new CartItem(productId, amount);
                this.addProductToCart(cartItem, amount);
            })
        });
    }

    findItem = (items, id) => items.find(element => element.id == id);

    cartItemTemplate = (product) => `
    <tr class="cart-item" id="${'id'+product.id}">
        <td>${product.name}</td>
        <td class="product-price">${product.price}</td>
        <td>
        <div class="number-input quantity" data-id="${product.id}">
        <button class="btn btn-dec" data-id="${product.id}">-</button>
        <input 
            class="quantity-result" 
            type="number" 
            value="${product.amount}"
            min="1"
            max="21"
        >
        <button class="btn btn-inc" data-id="${product.id}">+</button>
        
        </td>
        <td class="product-subtotal">0</td>
        <td><i class="fas fa-trash-alt" data-id="${product.id}"></i></td>
    </tr>
    `;

    populateShoppingCart (products) {

        let result = "";
        this.cart.forEach(
            item => {
                let product = this.findItem(products, item.id);
                product = {...product, amount: item.amount};
                console.log(product);
                result += this.cartItemTemplate(product);
            }
        )
        return result;
    }

    filterItem = (items, id) => items.filter(item => item.id != id);

    setCartTotal(shoppingCartItems) {
        let tmpTotal = 0;
        let subTotal = 0;
        this.cart.map(item => {
            let ids = "#id"+item.id;
            let price = shoppingCartItems.querySelector(`${ids} .product-price`).textContent;
            tmpTotal = +price * item.amount;
            shoppingCartItems.querySelector(`${ids} .product-subtotal`).textContent = parseFloat(tmpTotal.toFixed(2));

            subTotal += tmpTotal;
        });

        let cartTax = subTotal * 0.2;
        document.querySelector('.cart-subtotal').textContent = subTotal.toFixed(2);
        document.querySelector('.cart-tax').textContent = cartTax.toFixed(2);
        document.querySelector('.cart-total').textContent = subTotal + cartTax;

    }

    renderCart(shoppingCartItems) {
        this.setCartTotal(shoppingCartItems);
        shoppingCartItems.addEventListener('click', event => {
            if(event.target.classList.contains('fa-trash-alt')) {
                this.cart = this.filterItem(this.cart, event.target.dataset.id);
                this.setCartTotal(shoppingCartItems);
                this.saveCart();
                event.target.closest(".cart-item").remove();
            } else if (event.target.classList.contains('btn-inc')) {
                let tmp = this.findItem(this.cart, event.target.closest('.quantity').dataset.id);
                // console.log(tmp)
                tmp.amount += 1;
                event.target.previousElementSibling.value = tmp.amount;
                this.setCartTotal(shoppingCartItems);
                this.saveCart();
            } else if (event.target.classList.contains('btn-dec')) {
                let tmp = this.findItem(this.cart, event.target.closest('.quantity').dataset.id);
                // console.log(tmp)
                if(tmp !== undefined && tmp.amount > 1) {
                    tmp.amount -= 1;
                    event.target.nextElementSibling.value = tmp.amount;
                
                } else {
                    this.cart = this.filterItem(this.cart, event.target.dataset.id);
                    event.target.closest(".cart-item").remove();
                }
                this.setCartTotal(shoppingCartItems);
                this.saveCart();
                
            }
        })
    }

    cartItemsAmount() {
        const totalInCart = document.getElementById('total-in-cart');
        totalInCart.textContent = this.cart.reduce((p, c) => p + c.amount, 0);
    }
}
