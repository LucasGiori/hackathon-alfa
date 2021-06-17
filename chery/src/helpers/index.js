module.exports = {
  shuffle: (array) => {
    var currentIndex = array.length,  randomIndex;
  
    while (0 !== currentIndex) {
      randomIndex = Math.floor(Math.random() * currentIndex);
      currentIndex--;
      [array[currentIndex], array[randomIndex]] = [array[randomIndex], array[currentIndex]];
    }
  
    return array;
  },
  formatMoney: (number) => {
    return number.toLocaleString("pt-br", {
      style: "currency",
      currency: "BRL",
    });
  },
  replaceStoragePath: (path) => {
    return path.replace("~", "http://localhost:8083");
  }
};
