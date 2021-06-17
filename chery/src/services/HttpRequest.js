'use strict';

const axios = require("axios").default;

const api = axios.create({
  baseURL: "http://localhost:8083",
});

module.exports = class HttpRequest {
  async get(url,query={}) {
      return await api.get(url,{
          params: query,
          headers: {
              'Access-Control-Allow-Origin': '*'
          }
      })
  }
}
