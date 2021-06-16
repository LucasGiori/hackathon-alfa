const api = require("../services/api");
const {
  formatMoney,
  replaceStoragePath,
  randomSort,
  verifyVehicleType,
} = require("../utils");

module.exports = {
  index: async (req, res) => {
    try {
      const { data } = await api.get("/veiculo");
      const sortedVehicles = data.sort(randomSort).slice(0, 15);
      const title = "Veículos Chery";
      return res.render("veiculo", {
        data: sortedVehicles,
        formatMoney,
        replaceStoragePath,
        verifyVehicleType,
        title,
      });
    } catch (error) {
      return res.render("error", { error });
    }
  },

  show: async (req, res) => {
    try {
      const { data } = await api.get(`/veiculo/id/${req.params.id}`);
      console.log(data)
      return res.render("detail", {
        veiculo: data[0],
        formatMoney,
        replaceStoragePath,
        verifyVehicleType,
      });
    } catch (error) {
      return res.render("error", { error });
    }
  },

  findNews: async (req, res) => {
    try {
      const { data } = await api.get("/veiculo/new");
      const title = "Veículos Novos";
      return res.render("veiculo", {
        data,
        formatMoney,
        replaceStoragePath,
        verifyVehicleType,
        title,
      });
    } catch (error) {
      return res.render("error", { error });
    }
  },

  findUseds: async (req, res) => {
    try {
      const { data } = await api.get("/veiculo/used");
      const title = "Veículos Usados";
      return res.render("veiculo", {
        data,
        formatMoney,
        replaceStoragePath,
        verifyVehicleType,
        title,
      });
    } catch (error) {
      return res.render("error", { error });
    }
  },
};
