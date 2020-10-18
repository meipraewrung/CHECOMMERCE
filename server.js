const express = require('express');

const app = express();

const bodyParser = require('body-parser');
app.use(bodyParser.json());
app.use(bodyParser.urlencoded({ extended: true }));

app.use(express.json());

//CHECOMMERCE -connect- Database
const MongoClient = require('mongodb').MongoClient;
const url = 'mongodb://localhost:27017/';
const options = { useUnifiedTopology: true, useNewUrlParser: true };

//Import Routes//
//productRoute
// const productRoute = require('./routes/products');
// app.use('/products', productRoute);

app.get("/products", function (req, res) {
    MongoClient.connect(url, options, function (err, db) {
        if (err) throw err;
        var dbo = db.db("CHECOMMERCE");
        var query = {};
        dbo.collection("products").find(query).toArray(function (err, result) {
            if (err) throw err;
            console.log(result);
            res.json(result);
            // res.render('pages/Laptops', { Laptops: result });
            db.close();
        });
    });
});

app.get("/products/:id", function (req, res) {
    var id = req.params.id;
    MongoClient.connect(url, options, function (err, db) {
        if (err) throw err;
        var dbo = db.db("CHECOMMERCE");
        var query = {
            _id: id
        };
        console.log(query);
        dbo.collection("products").findOne(query, function (err, result) {
            console.log(query);
            if (err) throw err;
            console.log(result);
            res.json(result);
            res.send('Error ' + err);
            db.close();
        });
    });
});

app.get("/products/:proName", function (req, res) {
    var name = req.params.proName;
    MongoClient.connect(url, options, function (err, db) {
        if (err) throw err;
        var dbo = db.db("CHECOMMERCE");
        var query = {
            "proName": name
        };
        console.log(query);
        dbo.collection("products").findOne(query, function (err, result) {
            console.log(query);
            if (err) throw err;
            console.log(result);
            res.json(result);
            res.send('Error ' + err);
            db.close();
        });
    });
});

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