module.exports = {
  formatMoney: (number) => {
    return number.toLocaleString("pt-br", {
      style: "currency",
      currency: "BRL",
    });
  },
  replaceStoragePath: (path) => {
    return path.replace("~", "https://run.mocky.io/v3/8a4586eb-bc98-403f-ad2d-4e9bf765bdc4");
  },
  randomSort: () => {
    return Math.random() - 0.5;
  },
  verifyVehicleType: (tipo) => {
    const config = {
      new: "NOVO",
      used: "SEMINOVO",
    };
    return config[tipo];
  },
};
