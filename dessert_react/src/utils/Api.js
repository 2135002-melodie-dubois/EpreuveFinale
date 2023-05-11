import axios from "axios";

const apiKey = '12345';

export default axios.create({
    baseURL: "http://localhost/Dessert/DessertApi",
    headers: {
        Authorization : 'Bearer ' + apiKey
    }
})