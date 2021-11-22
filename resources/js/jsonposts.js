alert('hello');
window.Vue=require('vue');
import Prova from './Prova';
const app=new Vue({
    el:'#app',
    render: h=>h(Prova)
});
// new Vue({
//     el: '#app',
//     data () {
//       return {
//         info: null
//       }
//     },
//     mounted () {
//       axios
//         .get('http://127.0.0.1:8000/api/posts')
//         .then(response => (this.info = response))
//     }
// })