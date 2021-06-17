const HttpRequest = require("../services/HttpRequest");
const { formatMoney,replaceStoragePath,randomSort } = require("../helpers");

module.exports = {
  
  home: async (req, res) => {
    try {
      const { data } = await new HttpRequest().get("/veiculo/all");
      const veiculosAleatorios = data.sort(() => {return 0.5 - Math.random()}).slice(0, 12);
      const titulo = "Chery Veículos";

      return res.render("veiculo", {data: veiculosAleatorios,formatMoney,replaceStoragePath,titulo});
    } catch (error) {
      return res.render("error", { error });
    }
  },

  getVeiculoById: async (req, res) => {
    try {
      const { data } = await new HttpRequest().get(`/veiculo/${req.params.id}`);
      
      return res.render("detalhes", {veiculo: data, formatMoney, replaceStoragePath});
    } catch (error) {
      return res.render("error", { error });
    }
  },

  getVeiculosNovos: async (req, res) => {
    try {
      const { data } = await new HttpRequest().get("/veiculo/findnew");
      console.log("Entrou no getveiculos");
      const titulo = "Veículos Novos";

      return res.render("veiculo", {data, formatMoney,replaceStoragePath,titulo});
    } catch (error) {

      return res.render("error", { error });
    }
  },

  getVeiculoUsados: async (req, res) => {
    try {
      const { data } = await new HttpRequest().get("/veiculo/findused");
      const titulo = "Veículos Usados";

      return res.render("veiculo", {data, formatMoney,replaceStoragePath,titulo});
    } catch (error) {
      return res.render("error", { error });
    }
  },
};
