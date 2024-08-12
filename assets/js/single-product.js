// agrega botones para el input de números en el producto
const inputQty = document.getElementsByClassName("input-text qty text")[0];
inputQty.setAttribute("id", "input-qty");

const buttonLess = document.createElement("button");
const buttonPlus = document.createElement("button");
buttonLess.type = "button";
buttonPlus.type = "button";
buttonLess.id = "button-less";
buttonPlus.id = "button-plus";
buttonLess.innerText = "-";
buttonPlus.innerText = "+";

function down(){ this.parentNode.querySelector('[type=number]').stepDown(); }
buttonLess.onclick = down

function up(){ this.parentNode.querySelector('[type=number]').stepUp(); }
buttonPlus.onclick = up

inputQty.insertAdjacentElement("afterend", buttonPlus);
inputQty.insertAdjacentElement("beforebegin", buttonLess);



document.addEventListener('DOMContentLoaded', function() {
    // Buscar la <ul> con las clases 'products' y 'columns-4'
    var productList = document.querySelector('ul.products.columns-1');

    // Verificar si se encontró la <ul>
    if (productList) {
        // Reemplazar las clases existentes con 'product-list'
        productList.classList.remove('products', 'columns-1');
        productList.classList.add('products');
    }
});