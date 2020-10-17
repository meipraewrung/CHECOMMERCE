const express = require('express');
const mongoose = require('mongoose');
const bodyParser = require('body-parser');

const app = express();

//CHECOMMERCE -- Database
const url = 'mongodb://localhost/CHECOMMERCE';
mongoose.connect(url, { useNewUrlParser:true }, () => {
    console.log('connected to DB!')
});
const con = mongoose.connection;

con.on('open', () => {
    console.log('connected...');
});

app.use(express.json());

const productRouter = require('./routes/products');
app.use('/products', productRouter);

app.listen(9000, () => {
    console.log('Server started');
});
