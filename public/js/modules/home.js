export default class Home {
    productItemTemplate = (product) => `
        <div class="card card-badge badge-${product.badge}" data-id="${product.id}">
            <div class="card-figure">
                <div class="icons">
                    <a href="#!" class="fas fa-shopping-cart add-to-cart"></a>
                    <a href="#" class="fas fa-heart"></a>
                    <a href="#" class="fas fa-eye"></a>
                </div>
                <figure class="image">
                    <img src="${product.image}" alt="${product.name}">
                </figure>
            </div>
            <div class="card-body" data-title="Black Cat">
                <div class="card-title">${product.name}</div>
                <span class="card-price">${product.price}</span>
            </div>
        </div>`;
    
    populateProductList = (products) => {
        let content = "";
        products.forEach(item => content += this.productItemTemplate(item));
        return content;
    }
}