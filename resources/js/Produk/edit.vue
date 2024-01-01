<script setup>
    import { onMounted, ref } from 'vue';
    import { useRouter } from 'vue-router';
    const router = useRouter()
    let form = ref({ id: ''})
    const props = defineProps({
        id: {
            type: String,
            default: '',
        }
    })
    onMounted(async () => {
        createForm()
        getProduct()
    })
    const createForm = async () => {
        let response = await axios.get('/api/product_form')
        //console.log('form', form.data)
        form.value = response.data
    }
    const getProduct = async () => {
        let response = await axios.get(`/api/product/${props.id}`)
        //console.log(response)
        form.value = response.data
    }
    const onUpdate = async () => {
        const formData = new FormData()
        formData.append('api_product', form.value.product)
        formData.append('api_price', form.value.price)
        formData.append('api_stock', form.value.stock)
        axios.post(`/api/product_update/${props.id}`, formData)
        router.push('/product_vue')
    }
    const onBack = () => {
        router.push('/product_vue')
    }
</script>
<template>
    <h1>Edit Product</h1>
    <hr>
    <table>
        <tr>
            <td>Product</td>
            <td><input type="text" v-model="form.product" required></td>
        </tr>
        <tr>
            <td>Price</td>
            <td><input type="number" v-model="form.price" required></td>
        </tr>
        <tr>
            <td>Stock</td>
            <td><input type="number" v-model="form.stock" required></td>
        </tr>
        <tr>
            <td>
                <button @click="onUpdate">Update</button>
            </td>
            <td>
                <button @click="onBack">Back</button>
            </td>
        </tr>
    </table>
</template>