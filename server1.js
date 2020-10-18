const express = require('express');
const mongoose = require('mongoose');
const bodyParser = require('body-parser');

const app = express();

app.use(bodyParser.json());
app.use(express.json());

//CHECOMMERCE -connect- Database
const url = 'mongodb://localhost:27017/CHECOMMERCE';
const options = { useUnifiedTopology: true, useNewUrlParser: true };
mongoose.connect(url, options, () => {
    console.log('connected to DB!')
});
const con = mongoose.connection;

con.on('open', () => {
    console.log('connected...');
});

//Import Routes//
//productRoute
const productRoute = require('./routes/products');
app.use('/products', productRoute);

// //ROUTES
// app.get('/', (req, res) => {
//     res.send('Test');
// });
// app.get('/products', (req, res) => {
//     res.send('TestProduct');
// });

//Listen Start
app.listen(27017, () => {
    console.log('Server started');
});