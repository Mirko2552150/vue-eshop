<template>
    <div class="cart-component" v-if="products.length > 0">
        <i class="fas fa-shopping-cart"></i>
        <span>{{products.length}}</span>
        <div v-for="(product, index) in products" :key="index">
            {{product.name}}
        </div>

        <!-- restituisce la somma della funzione addPrice -->
        <span v-number="addPrice(products)"> {{price}}</span>

        <!-- AL CLICK SU CheckOut invio i ARRAY DI OGGETTI ad UN FUNZIONE al CUI INTERNO PARTIRA UN CHIAMATA POST AXIOS -->

        <button @click='sendCartApi(products)' type="button" name="button">
          <a href="upr/checkout">CHECKOUT</a>
        </button>

    </div>
</template>

<style>
.cart-component {
    position: fixed;
    right: 0;
    top: 0;
    padding-top: 75px;
    height: 100%;
}
</style>

<script>
    export default {
        data() {
            return {
                price: 0,
                stringa: 'ciao'

            }

        },

        props: ['products'], // PRENDIAMO I PRODOTTI PASSATI DALL'ELEMENTO PADRE

        mounted() {                                                             //Si avvia solo alla creazione o montaggio del componente



              // RIPRENDERE DA QUI
              // axios({
              //     "method": "POST",
              //     "url": "api/products",
              // }).then((response) => {
              //     // console.log(response);
              //     this.products = response.data;
              //     // console.log(this.products[0].description);
              //
              // }).catch((error) => {
              //     console.log('APi ' + error)
              // });
        },

        methods: {
            addPrice(products) {
                // this.price = parseInt(this.price + prezzo);
                // console.log(parseInt(prezzo));
                this.price = 0;
                for (var i = 0; i < products.length; i++) {
                    this.price += products[i].price; // RIEMPIE LA VAR PRICE CON UN CICLO, SOMMANDO IL VALORE ALL'INTERNO DELL OGGETTO

                }
            },

            sendCartApi(products) {
                  console.log(products);
                  axios({
                      "method": "POST",
                      "url": "upr/checkout", // endpoint URI
                      // "url": "upr/checkout/{products}",
                      data: {
                        products,

                      },
                  }).then((response) => {
                      console.log(response);

                  }).catch((error) => {
                      console.log('APi ' + error)
                  });


            }


        }
    }
</script>
