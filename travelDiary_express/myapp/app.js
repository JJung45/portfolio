var createError = require('http-errors');
var fs = require('fs');
var express = require('express');
var path = require('path');
var cookieParser = require('cookie-parser');
var logger = require('morgan');
var session = require('express-session');
var FileStore = require('session-file-store')(session);
// var MySQLStore = require('express-mysql-session')(session);

var app = express();

// view engine setup
  // app.set('views', path.join(__dirname, 'data'));
  // app.set('view engine','jade');

  app.use(logger('dev'));
  app.use(express.json());
  app.use(express.urlencoded({ extended: false }));
  app.use(cookieParser());
  app.use(express.static(path.join(__dirname, 'public')));
  app.use('/contents/show',express.static('uploads'));
  app.use('/contents/update',express.static('uploads'));

  app.use(session({
    secret:'wjdfasfdasdf',
    resave: false,
    saveUninitialized: true,
    store: new FileStore()
  }))

 var passport = require('./lib/passport')(app);

  // var options ={
  //   host: 'localhost',
  //   port: 2018,
  //   user: 'root',
  //   password: '1111',
  //   database: 'traveldiary',
  //   connectTimeout: 100000
  // }
  // var sessionStore = new MySQLStore(options);
  // app.use(session({
  //   secret: '04wjdgkrud05',
  //   resave: false,
  //   saveUninitialized: false,
  //   store: sessionStore
  // }));

  app.get('*',function(request,response,next){
    fs.readdir('./subdata', function(error, filelist){
      request.list = filelist;
      next();
    });
 });

var indexRouter = require('./routes/index');
var usersRouter = require('./routes/users');
var contentsRouter = require('./routes/contents');
var authRouter = require('./routes/auth')(passport);

app.use('/', indexRouter);
app.use('/users', usersRouter);
app.use('/contents',contentsRouter);
app.use('/auth',authRouter);

// catch 404 and forward to error handler
app.use(function(req, res, next) {
  next(createError(404));
});

// error handler
app.use(function(err, req, res, next) {
  // set locals, only providing error in development
  res.locals.message = err.message;
  res.locals.error = req.app.get('env') === 'development' ? err : {};

  // render the error page
  // res.status(err.status || 500);
  // res.render('error');
  res.status(500).json({
    message: err.message,
    error: err
  });
  
});

module.exports = app;
