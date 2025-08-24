"use strict";
import Home from './home.js';


export default class Catalog extends Home
{
    liElement = obj => `<li><a class="category-item" href="#!" data-id="${obj.id}">${obj.name}</a></li>`;

    ulElement = items => {
        let ul = document.createElement('ul');
        ul.setAttribute('class', 'unstyled, categories');
        let result = ""; 
        for (let item of items) {
            result += this.liElement(item);
        }
        ul.innerHTML = result;
        return ul;
    }

    sectionName = section => {
        let div = document.createElement('div');
        div.setAttribute('class', 'py-2 px-4 text-whte mb-3 categories');
        div.innerHTML = `<strong class="text-uppercase fw-bold"><a href="#!">${section}</a></strong>`;
        return div;
    }

    distinctSection(categories) {
        let mapped = [...categories.map(item => item.section)];
        let uniqe = [...new Set(mapped)];
        return uniqe;
    }

    categoriesCollation(distinct, categories) {
        let result = [];
        let i = 0;
        for (let section of distinct) {
            result[i] = categories.filter(item => item.section === section);
            i++;
        }
        return result;

    }


    populateCategories(container, categories) {
        let distinct = this.distinctSection(categories);
        let collation = this.categoriesCollation(distinct, categories);



        for(let i = 0; i < distinct.length; i++) {
            container.append(this.sectionName(distinct[i]))
            container.append(this.ulElement(collation[i]))
        }
    } 

    badgeTemplate = item => `
    <div class="form-check mb-1">
        <input type="checkbox" class="form-check-input" id="di-${item}" value="${item}" name="badge">
        <label class="form-check-label" for="di-${item}">${item}</label>
    </div>`;



    populateBadges (products) {
        let badges = [...new Set([...products.map(item => item.badge)].filter(item => item != ""))];
        return badges.map(item => this.badgeTemplate(item)).join('');

    }

    renderList = (products, value) => this.populateProductList(products.filter(product => product.badge.includes(value)));

}
