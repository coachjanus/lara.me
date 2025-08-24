"use strict";

import Cart from "./modules/cart.js";
// import Store from "./modules/store.js";
import Home from "./modules/home.js";
import Catalog from "./modules/catalog.js";

import Footer from "./components/footer.js";

customElements.define('footer-component', Footer);
import Store from "./modules/store.js";
const appNav = document.querySelector('.app-nav');
const appNavHide = document.querySelector('.app-nav--hide');
const appNavShow = document.querySelector('.app-nav--show');

const hamburger = document.getElementById('hamburger');




const hideNav = () => {
    appNav.classList.add('app-nav__hide');
    appNav.classList.remove('app-nav__show');
    appNavShow.classList.toggle('hamburger');
}

const showNav = () => {
    appNav.classList.toggle('app-nav__hide');
    appNav.classList.toggle('app-nav__show');
    appNavShow.classList.toggle('hamburger');
}


function initNav() {
    appNavHide.addEventListener('click', hideNav);
    appNavHide.addEventListener('touchted', hideNav);

    hamburger.addEventListener('click', showNav);
    hamburger.addEventListener('touchted', showNav);
}


async function fetchData(url) {
    return await fetch(url, {
        method: "GET",
        headers: {'Content-Type': 'application/json'}
    })
    .then(response =>  {
        if (response.status >= 400) {
            return  response.json()
            .then(err => {
                const error = new Error("Something went wrong!")
                error.data = err
                throw error;
            })
        }
        return response.json();
    })
}



function main() {
    // const URL = "https://my-json-server.typicode.com/coachjanus/db/";
    const URL = "http://php.my/api"
    initNav();

    let shoppingCart = new Cart();
    
    const homePage = document.getElementById("home-page");
    const shopPage = document.getElementById("shop-page");
    const cartPage = document.getElementById("cart-page");

    async function isAuth(url) {
        return await fetch(`${url}/api/auth`, {
                method: 'GET',
                headers: {'Content-Type': 'application/json'}
            })
            .then(response => response.json());
    }
    

    fetchData(`${URL}/products`)
    .then(products => {
        
        // console.log(homePage)
        if(homePage !== null) {
            const home = new Home();
            const productContainer = document.querySelector('.product-container');
            productContainer.innerHTML = home.populateProductList(products);
            const addToCartButtons = productContainer.querySelectorAll('.add-to-cart');
            shoppingCart.addProductToCartButton(addToCartButtons, 1);
        }
        
        if(shopPage) {
            const catalog = new Catalog();
            const productContainer = document.querySelector('.product-container');
            productContainer.innerHTML = catalog.populateProductList(products);
            const addToCartButtons = productContainer.querySelectorAll('.add-to-cart');
            shoppingCart.addProductToCartButton(addToCartButtons, 1);

            const categoryContainer = document.getElementById('category-container');


            fetchData(`${URL}/categories`)
            .then(categories => {

                catalog.populateCategories(categoryContainer, categories);
                let categoryItems = categoryContainer.querySelectorAll(".categories a");

                categoryItems.forEach(element => element.addEventListener('click', e => {
                        e.preventDefault();
                        if (e.target.classList.contains('category-item')) {
                            let category = e.target.dataset.id;
                            const categoryFilter = items => items.filter(item => item.category == category);
                            productContainer.innerHTML = catalog.populateProductList(categoryFilter(products));
                        } else {
                            productContainer.innerHTML = catalog.populateProductList(products);
                        }
                }
                ));

            })

            const showOnly = document.getElementById('show-only');

            showOnly.innerHTML = catalog.populateBadges(products);

            let checkbox = showOnly.querySelectorAll('input[name="badge"]');

            

            let values = [];

            checkbox.forEach(item => {
                item.addEventListener('change', e => {
                    if(e.target.checked) {
                        values.push(item.value);
                    } else {
                        if(values.length != 0) {
                            values.pop(item.value);
                        }
                    }
                    productContainer.innerHTML = values.map(
                        value => catalog.renderList(products, value)
                    ).join('');
                    if (values.length == 0) {
                        productContainer.innerHTML = catalog.populateProductList(products);
                    }
                })
            })


        }

        


        if(cartPage) {
            const shoppingCartItems = document.querySelector(".shopping-cart-items");

            console.log(shoppingCartItems)
            shoppingCartItems.innerHTML = shoppingCart.populateShoppingCart(products);

            shoppingCart.renderCart(shoppingCartItems);

            document.getElementById('checkout').addEventListener("click", () => {
                let inCart = [];
                Store.get("basket").forEach(item =>{
                    inCart.push({
                        id:parseInt(item.id),
                        amount: parseInt(item.amount)
                    });
                    // console.log(inCart);
                });

                // console.log(inCart);

                // console.log(JSON.stringify({
                //     cart: inCart
                // }));

                fetch(`${URL}/checkout`, {
                    method: "POST",
                    headers: {
                        "Content-Type": "application/json"
                    },
                    body: JSON.stringify({
                        cart: inCart
                    })
                })
                .then(
                    response => {
                        console.log(response);
                        // Store.clear();
                        localStorage.clear()
                        document.location.replace("/profile");
                    }
                )
                .catch(error => console.log(error));


            }) //checkout

        }

    } )
}

(
    () => {
        if (document.readyState === "loading") {
            document.addEventListener('DOMContentLoaded', main);
        } else {
            main();
        }
    }

)();
