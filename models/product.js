const mongoose = require("mongoose");

const productSchema = mongoose.Schema({
  proGroupN: {
    type: String,
    required: true
  },
  proName: {
    type: String,
    required: true
  },
  number: {
    type: String,
    required: true
  },
  priceUnit: {
    type: String,
    required: true
  },
  proType: {
    type: String,
    required: true
  },
});

module.exports = mongoose.model("Product", productSchema);
