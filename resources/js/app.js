import { createApp } from 'vue';
import { Datepicker } from 'vanillajs-datepicker';
require('./bootstrap');

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))

const elem = document.getElementById('datepicker');

if (elem) {
    const datepicker = new Datepicker(elem, {
        buttonClass: 'btn',
    });
}

const app = createApp({
    data: () => {
        return {
            type: (typeof registerForm !== "undefined") ? registerForm.type : null
        }
    },
    methods: {
        isNumber: function(evt) {
            var charCode = evt.keyCode;
            if ((charCode > 31 && (charCode < 48 || charCode > 57)) && charCode !== 46) {
                evt.preventDefault();
            } else {
                return true;
            }
        }
    }
});
app.mount('#app')
