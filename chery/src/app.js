const createError = require("http-errors");
const express = require("express");
const path = require("path");
const cookieParser = require("cookie-parser");
const logger = require("morgan");

const veiculoRouter = require("./routes/veiculo");
const sobreRouter = require("./routes/sobre");

const app = express();

app.use("/public", express.static(path.resolve("public/")));
app.use(
  "/styles/css",
  express.static(path.resolve("node_modules/bootstrap/dist/css"))
);
app.use(
  "/styles/icons",
  express.static(path.resolve("node_modules/bootstrap-icons/font"))
);

// view engine setup
app.set("views", path.resolve("src/views"));
app.set("view engine", "ejs");

app.use(logger("dev"));
app.use(express.json());
app.use(express.urlencoded({ extended: false }));
app.use(cookieParser());

app.use("/veiculo", veiculoRouter);
app.use("/sobre", sobreRouter);
app.use("*", veiculoRouter);

// catch 404 and forward to error handler
app.use(function (req, res, next) {
  next(createError(404));
});

// error handler
app.use(function (err, req, res, next) {
  // set locals, only providing error in development
  res.locals.message = err.message;
  res.locals.error = req.app.get("env") === "development" ? err : {};

  // render the error page
  res.status(err.status || 500);
  res.render("error");
});

module.exports = app;
