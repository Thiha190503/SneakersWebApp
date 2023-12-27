import "./bootstrap";
import { createApp } from "vue";

import ExampleComponent from "./components/ExampleComponent.vue";
import AddToCartButton from "./components/AddToCartButton.vue";
import BadgeIcon from "./components/BadgeIcon.vue";
import Cart from "./components/Cart.vue";

const app = createApp();

app.component("example-component", ExampleComponent);
app.component("add-to-cart-button", AddToCartButton);
app.component("badge-icon", BadgeIcon);
app.component("cart-page", Cart);

app.mount("#app");

//To do move to other file
app.config.filter("formatPrice", function (value) {
    return "$" + parseFloat(value).toFixed(2);
});
