const axios = require("axios").default;

const api = axios.create({
  baseURL: "https://run.mocky.io/v3/8a4586eb-bc98-403f-ad2d-4e9bf765bdc4",
});

module.exports = api;
