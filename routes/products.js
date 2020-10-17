const express = require('express');
const router = express.Router();
const Product = require('../models/product');

router.get('/', async(req,res) => {
    try {
        const products = await Product.find();
        res.json(products);
    } catch(err) {
        res.send('Error ' + err);
    }
})

router.post('/', async(req, res) => {
    const product = new Product({
        proGroupN: req.body.proGroupN,
        proName: req.body.proName,
        number: req.body.number,
        priceUnit: req.body.priceUnit,
        proType: req.body.proType
    });

    try {
        const proD = await product.save();
        res.json(proD);
    } catch(err) {
        res.json({ message: err });
        res.send('Error ' + err);
    }
})

router.get('/:id', async(req,res) => {
    try {
        const products = await Product.findById(req.params.id);
        res.json(products);
    } catch(err) {
        res.send('Error ' + err);
    }
})

// router.get('/:proName', async(req,res) => {
//     try {
//         const products = await Product.findOne(req.params.proName)
//         res.json(products)
//     } catch(err) {
//         res.send('Error ' + err)
//     }
// })

// router.get('/:type', async(req,res) => {
//     try {
//         const products = await Product.findByType()
//         res.json(products)
//     } catch(err) {
//         res.send('Error ' + err)
//     }
// })


// router.patch('/:id', async(req,res) => {
//     try {
//         const product = await Product.findById(req.params.id)
//         product.proGroupN = req.body.proGroupN
//         // products.proName = req.body.proName
//         // products.number = req.body.number
//         // products.priceUnit = req.body.priceUnit
//         // products.proType = req.body.proType
//         const proD = await product.save()
//         res.json(proD)
//     } catch(err) {
//         res.send('Error ' + err)
//     }
// })

module.exports = router
