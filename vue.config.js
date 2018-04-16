const path = require('path')
//@vue/cli-service/webpack.config.js
module.exports = {
  // Project deployment base
  // By default we assume your app will be deployed at the root of a domain,
  // e.g. https://www.my-app.com/
  // If your app is deployed at a sub-path, you will need to specify that
  // sub-path here. For example, if your app is deployed at
  // https://www.foobar.com/my-app/
  // then change this to '/my-app/'
  baseUrl: '/',
  
  // where to output built files
  outputDir: './public/',
  
  // whether to use eslint-loader for lint on save.
  // valid values: true | false | 'error'
  // when set to 'error', lint errors will cause compilation to fail.
  lintOnSave: true,
  
  // use the full build with in-browser compiler?
  // https://vuejs.org/v2/guide/installation.html#Runtime-Compiler-vs-Runtime-only
  compiler: false,
  
  // tweak internal webpack configuration.
  // see https://github.com/vuejs/vue-cli/blob/dev/docs/webpack.md
  //INDEX_PATH: path.resolve(__dirname, '../../views/app.blade.php'),
  //ASSETS_ROOT_PATH: path.resolve(__dirname, '../../../public/')
  chainWebpack: (config) => {
    // config
    // Interact with entry points
    //   .entry('index')
    //   .add('./resources/vueapp/src/main.js')
    //   .end()
    // console.log(process.env.API_BASE_URL)
    
    // console.log(config.plugin('env'))
    
    config
      .context(path.resolve(__dirname, './resources/vueapp/'))
    
    config.resolve.alias
      .set('@', path.resolve(__dirname, './resources/vueapp/src'))

// config.resolve.alias
    /*config
      .entry('app')
      .clear()
      .add('./resources/vueapp/src/main.js')
      .end()*/
    
    if (['production'].indexOf(process.env.NODE_ENV) !== -1) {
      
      config.output
        .path(path.resolve(__dirname, './public/assets/'))
        .publicPath('/assets/')
      //    .filename('[name].bundle.js')
      
      
      config.plugin('html')
        .tap(args => {
          return [
            {
              title: process.env.APP_NAME,
              template: path.resolve(__dirname, './resources/vueapp/public/index.html'),
              filename: path.resolve(__dirname, './resources/views/index.blade.php')
            }
          ]
        })
    } else {
      config.plugin('html')
        .tap(args => {
          return [
            {
              title: process.env.APP_NAME,
              template: path.resolve(__dirname, './resources/vueapp/public/index.html'),
            }
          ]
        })
    }
  },
  configureWebpack: (config) => {
    // console.log(config);
  },
  
  // vue-loader options
  // https://vue-loader.vuejs.org/en/options.html
  vueLoader: {},
  
  // generate sourceMap for production build?
  productionSourceMap: true,
  
  // CSS related options
  css: {
    // extract CSS in components into a single CSS file (only in production)
    extract: true,
    
    // enable CSS source maps?
    sourceMap: false,
    
    // pass custom options to pre-processor loaders. e.g. to pass options to
    // sass-loader, use { sass: { ... } }
    loaderOptions: {},
    
    // Enable CSS modules for all css / pre-processor files.
    // This option does not affect *.vue files.
    modules: false
  },
  
  // use thread-loader for babel & TS in production build
  // enabled by default if the machine has more than 1 cores
  parallel: require('os').cpus().length > 1,
  
  // split vendors using autoDLLPlugin?
  // can also be an explicit Array of dependencies to include in the DLL chunk.
  // See https://github.com/vuejs/vue-cli/blob/dev/docs/cli-service.md#dll-mode
  dll: false,
  
  // options for the PWA plugin.
  // see https://github.com/vuejs/vue-cli/tree/dev/packages/%40vue/cli-plugin-pwa
  pwa: {},
  
  // configure webpack-dev-server behavior
  devServer: {
    open: process.platform === 'darwin',
    host: '0.0.0.0',
    port: 8080,
    https: false,
    hotOnly: false,
    // See https://github.com/vuejs/vue-cli/blob/dev/docs/cli-service.md#configuring-proxy
    // proxy: null, // string | Object
    proxy: {
      '/api': {
        // target: process.env.API_PROXY_URL,
        target: 'http://fundev.xx',
        changeOrigin: true,
        pathRewrite: {
          //   '^/api': '/api'
        }
      }
    },
    before: app => {
    }
  },
  
  // options for 3rd party plugins
  pluginOptions: {}
}