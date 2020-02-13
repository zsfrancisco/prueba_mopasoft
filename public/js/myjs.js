Vue.component('todo-item', {
    props: ['todo'],
    template: '<li>{{ todo.text }}</li>'
})

var app7 = new Vue({
    el: '#app-7',
    data: {
        groceryList: [
            { id: 0, text: 'Vegetables' },
            { id: 1, text: 'Cheese' },
            { id: 2, text: 'Whatever else humans are supposed to eat' }
        ]
    }
})

var boton_inicio = new Vue({
    el: '#boton_inicio',
    data: {
        message: 'Ir a la página de inicio de la aplicación'
    }
})

var opciones_usuario = new Vue({
    el: '#opciones_usuario',
    data: {
        message: 'Desplegar para ver opciones del usuario'
    }
})

var info_disponible = new Vue({
    el: '#info_disponible',
    data: {
        seen: true,
    },
    methods: {
        informacion: function() {
            this.seen = !this.seen;
        }
    }
})

var admin_cli = new Vue({
    el: '#admin_cli',
    data: {
        message: 'Administrar todos los clientes registrados'
    }
})

var admin_sal = new Vue({
    el: '#admin_sal',
    data: {
        message: 'Administrar todas las salas registradas'
    }
})

var admin_res = new Vue({
    el: '#admin_res',
    data: {
        message: 'Administrar todas las reservas registradas'
    }
})

var crear = new Vue({
    el: '#crear',
    data: {
        message: 'Usted acaba de realizar el registro'
    },
    // definir métodos bajo el objeto `methods`
    methods: {
        visualizar: function(event) {
            // `this` dentro de los métodos apunta a la instancia de Vue
            alert(this.message + '!')
        }
    }
})