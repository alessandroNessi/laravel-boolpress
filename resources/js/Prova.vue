<template>
    <div>
        <Header></Header>
        <Main></Main>
        <Footer></Footer>
    </div>
</template>
<script>
    import Header from './components/Header.vue';
    import Main from './components/Main.vue';
    import Footer from './components/Footer.vue';
// import { defineComponent } from '@vue/composition-api'
    export default{
        name:'App',
        components:{
            Header,
            Main,
            Footer
        }
    }
</script>
