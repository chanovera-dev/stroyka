jQuery(document).ready(function($) {
    // Función para agregar los botones a un elemento de entrada de cantidad
    function addQuantityButtons(input) {
        const buttonLess = document.createElement("button");
        const buttonPlus = document.createElement("button");
        buttonLess.type = "button";
        buttonPlus.type = "button";
        buttonLess.innerText = "-";
        buttonPlus.innerText = "+";

        function updateQuantity() {
            const quantityInput = $(this).parent().find('[type=number]');
            const currentQuantity = parseInt(quantityInput.val(), 10);

            if (this === buttonLess) {
                quantityInput[0].stepDown();
            } else if (this === buttonPlus) {
                quantityInput[0].stepUp();
            }

            // Actualiza la cantidad utilizando las funciones de WooCommerce
            quantityInput.trigger('change');
        }

        buttonLess.onclick = updateQuantity;
        buttonPlus.onclick = updateQuantity;

        // Inserta los botones solo si no se han insertado previamente
        if (!input.data('buttons-added')) {
            // Inserta el botón de decremento antes del input de cantidad
            input.before(buttonLess);
            // Inserta los botones después del input de cantidad
            input.after(buttonPlus);

            // Marca el elemento como que los botones ya se han agregado
            input.data('buttons-added', true);
        }
    }

    // Encuentra todos los elementos input de tipo número dentro del carrito de WooCommerce
    const numberInputs = $('.woocommerce-cart-form input[type="number"]');

    // Agrega los botones inicialmente
    numberInputs.each(function() {
        addQuantityButtons($(this));
    });

    // Observa el evento 'updated_cart_totals' de WooCommerce
    $(document.body).on('updated_cart_totals', function() {
        // Encuentra todos los elementos input de tipo número dentro del carrito de WooCommerce después de la actualización
        const updatedNumberInputs = $('.woocommerce-cart-form input[type="number"]');

        // Agrega los botones a los elementos de entrada de cantidad actualizados
        updatedNumberInputs.each(function() {
            addQuantityButtons($(this));
        });
    });
});