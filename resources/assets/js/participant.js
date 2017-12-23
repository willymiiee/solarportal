require('./bootstrap');

window.Vue = require('vue');

Vue.component('services', require('./components/Services.vue'));

Array.prototype.unique = function() {
    var a = this.concat();
    for(var i=0; i<a.length; ++i) {
        for(var j=i+1; j<a.length; ++j) {
            if(a[i] === a[j])
                a.splice(j--, 1);
        }
    }

    return a;
};

const app = new Vue({
    el: '#app-participant'
});

require("./utilities/link-method");